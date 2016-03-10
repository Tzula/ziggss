<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

// This file contains CMLiveDealModelDeals class and CMDealListPagination class.

/**
 * Model class for list of deals.
 *
 * @since  1.0.0
 */
class CMLiveDealModelDeals extends JModelList
{
	/**
	 * Method to auto-populate the model state.
	 *
	 * Note. Calling getState in this method will result in recursion.
	 *
	 * @param   string  $ordering   An optional ordering field.
	 * @param   string  $direction  An optional direction (asc|desc).
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function populateState($ordering = null, $direction = null)
	{
		$city = $this->getUserStateFromRequest($this->context . '.city', 'city');
		$this->setState('city', $city);

		// Load the parameters.
		$params = JComponentHelper::getParams('com_cmlivedeal');
		$this->setState('params', $params);

		$sort = $this->getUserStateFromRequest($this->context . '.sort', 'sort', 'newest', 'word');

		if ($sort != 'ending_soon')
		{
			$ordering = 'a.starting_time';
			$direction = 'desc';
			$this->setState('sort', 'newest');
		}
		else
		{
			$ordering = 'ending_time';
			$direction = 'asc';
			$this->setState('sort', 'ending_soon');
		}

		// List state information.
		parent::populateState($ordering, $direction);

		$this->setState('list.ordering', $ordering);
		$this->setState('list.direction', $direction);

		$limit = $this->getUserStateFromRequest('global.list.limit', 'limit', $params->get('default_pagination'), 'uint');
		$this->setState('list.limit', $limit);

		$limitstart = JFactory::getApplication()->input->get('start', 0, 'uint');
		$this->setState('list.start', $limitstart);
	}

	/**
	 * Build an SQL query to load the list data.
	 *
	 * @return  JDatabaseQuery
	 *
	 * @since   1.0.0
	 */
	protected function getListQuery()
	{
		$params = $this->state->get('params');
		$filterContext = 'com_cmlivedeal.deals.';
		$app = JFactory::getApplication();
		$keyword = $app->getUserState($filterContext . 'keyword', '', 'string');
		$category = $app->getUserState($filterContext . 'category', '', 'string');
		$city = $app->getUserState($filterContext . 'city', '', 'string');

		$integration = $params->get('membership_integration', '');

		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$now = JFactory::getDate()->toSql();

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.alias, a.title, a.description, a.fine_print, a.user_id, ' .
				'a.discount_info, a.original_price, a.discounted_price, a.fixed_value, a.fixed_percent, ' .
				'a.image_id, a.starting_time, a.ending_time, a.coupon_quantity, a.metadesc, a.metakey'
			)
		);

		$query->from($db->qn('#__cmlivedeal_deals') . ' AS a')
			->where($db->qn('a.published') . ' = ' . $db->q('1'))
			->where($db->qn('a.approved') . ' = ' . $db->q('1'))
			->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
			->where($db->qn('a.ending_time') . ' >= ' . $db->q($now));

		// Filter by search in title.
		if (!empty($keyword))
		{
			$keyword = $db->q('%' . $db->escape($keyword, true) . '%');

			$subQuery3 = $db->getQuery(true)
				->select($db->qn('n.user_id'))
				->from($db->qn('#__cmlivedeal_merchants') . ' AS n')
				->where('(' . $db->qn('n.name') . ' LIKE ' . $keyword
						. ' OR ' . $db->qn('n.about') . ' LIKE ' . $keyword
					. ')'
				);
			$subQuery3 = $subQuery3->__toString();

			$query->where('(' .
					$db->qn('a.title') . ' LIKE ' . $keyword . ' OR ' .
					$db->qn('a.description') . ' LIKE ' . $keyword . ' OR ' .
					$db->qn('a.user_id') . ' IN (' . $subQuery3 . ')' .
				')'
			);
		}

		// Filter by category.
		if ($category != '')
		{
			$catIds = array();

			$catQuery = $db->getQuery(true)
				->select($db->qn('id'))
				->from($db->qn('#__categories'))
				->where($db->qn('published') . ' = ' . $db->q(1))
				->where($db->qn('parent_id') . ' > ' . $db->q(0))
				->where($db->qn('extension') . ' = ' . $db->q('com_cmlivedeal'))
				->where($db->qn('alias') . ' = ' . $db->q($category));
				$catId = $db->setQuery($catQuery)->loadResult();

			if ($catId > 0)
			{
				$catIds[] = $catId;
				CMLiveDealHelper::getChildrenCategories($catId, $catIds);
			}

			if (!empty($catIds))
			{
				$query->where($db->qn('a.category_id') . ' IN (' . implode(',', $catIds) . ')');
			}
			else
			{
				$query->where($db->qn('a.category_id') . ' = ' . $db->q(-1));
			}
		}

		// Filter by city.
		$distance = 0;
		$latitude = '';
		$longitude = '';

		if ($city != '')
		{
			$cityQuery = $db->getQuery(true)
				->select($db->qn(array('id', 'latitude', 'longitude', 'radius')))
				->from($db->qn('#__cmlivedeal_cities'))
				->where($db->qn('alias') . ' = ' . $db->q($city));
			$city = $db->setQuery($cityQuery)->loadObject();

			if (!empty($city->id))
			{
				$distance = $city->radius;
				$latitude = $city->latitude;
				$longitude = $city->longitude;
			}
		}
		else
		{
			$geolocation = $params->get('geolocation_service', '');
			$latitude = $app->getUserState($filterContext . 'latitude', '', 'float');
			$longitude = $app->getUserState($filterContext . 'longitude', '', 'float');

			if (($geolocation == 'html5' || $geolocation == 'maxmind')
				&& $latitude !== '' && $longitude !== '')
			{
				$distance = $params->get('search_radius', 5, 'uint');
			}
			else
			{
				$distance = 0;
				$latitude = '';
				$longitude = '';
			}
		}

		if ($latitude !== '' && $longitude !== '' && $distance > 0)
		{
			// Earth radius is about 6,371 kilometers (3,959 miles).
			$earthRadius = 6371;

			$query->select("m.user_id, ($earthRadius * acos(cos(radians($latitude)) * cos(radians(m.latitude)) * cos(radians(m.longitude) - radians($longitude)) + sin(radians($latitude)) * sin(radians(m.latitude)))) AS distance")
				->join(
					'LEFT',
					$db->qn('#__cmlivedeal_merchants') . ' AS m ON ' . $db->qn('m.user_id') . ' = ' . $db->qn('a.user_id')
				)
				->having("(distance != 0 AND distance <= $distance)");
		}

		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}

	/**
	 * Method to get a CMDealListPagination object for the data set.
	 *
	 * @return  CMDealListPagination  A CMDealListPagination object for the data set.
	 *
	 * @since   1.2.0
	 */
	public function getPagination()
	{
		// Get a storage key.
		$store = $this->getStoreId('getPagination');

		// Try to load the data from internal storage.
		if (isset($this->cache[$store]))
		{
			return $this->cache[$store];
		}

		// Create the pagination object.
		$limit = (int) $this->getState('list.limit') - (int) $this->getState('list.links');

		$page = new CMDealListPagination($this->getTotal(), $this->getStart(), $limit);

		// Add the object to the internal cache.
		$this->cache[$store] = $page;

		return $this->cache[$store];
	}

	/**
	 * Get merchant's deals
	 *
	 * @param   integer  $merchantId  The user ID of the merchant.
	 *
	 * @return  mixed
	 *
	 * @since   1.5.0
	 */
	public function getDealsOfMerchant($merchantId = 0)
	{
		$now = JFactory::getDate()->toSql();

		$db = $this->getDbo();
		$query = $db->getQuery(true);

		$query->select(
			'a.id, a.alias, a.title, a.description, a.image_id, a.starting_time, a.ending_time, a.coupon_quantity'
		);

		$query->from($db->qn('#__cmlivedeal_deals') . ' AS a')
			->where($db->qn('a.published') . ' = ' . $db->q('1'))
			->where($db->qn('a.approved') . ' = ' . $db->q('1'))
			->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
			->where($db->qn('a.ending_time') . ' >= ' . $db->q($now))
			->where($db->qn('a.user_id') . ' = ' . $db->q($merchantId));

		$deals = $db->setQuery($query)->loadObjectList();

		return $deals;
	}
}

/**
 * Helper class for customizing front-end's pagination.
 * Only used for deal list.
 *
 * @since  1.2.0
 */
class CMDealListPagination extends JPagination
{
	/**
	 * Create and return the pagination data object.
	 *
	 * @return  object  Pagination data object.
	 *
	 * @since   1.5
	 */
	protected function _buildDataObject()
	{
		$filterContext = 'com_cmlivedeal.deals.';
		$app = JFactory::getApplication();
		$keyword = $app->getUserState($filterContext . 'keyword', '', 'string');
		$category = $app->getUserState($filterContext . 'category', '', 'string');
		$city = $app->getUserState($filterContext . 'city', '', 'string');

		$pageUrl = 'index.php?option=com_cmlivedeal&view=deals';

		if (!empty($city))
		{
			$pageUrl .= '&city=' . $city;
		}

		if (!empty($category))
		{
			$pageUrl .= '&category=' . $category;
		}

		if (!empty($keyword))
		{
			$pageUrl .= '&keyword=' . $keyword;
		}

		$data = new stdClass;

		// Build the additional URL parameters string.
		$params = '';

		if (!empty($this->additionalUrlParams))
		{
			foreach ($this->additionalUrlParams as $key => $value)
			{
				$params .= '&' . $key . '=' . $value;
			}
		}

		$data->all = new JPaginationObject(JText::_('JLIB_HTML_VIEW_ALL'), $this->prefix);

		if (!$this->viewall)
		{
			$data->all->base = '0';
			$data->all->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=');
		}

		// Set the start and previous data objects.
		$data->start = new JPaginationObject(JText::_('JLIB_HTML_START'), $this->prefix);
		$data->previous = new JPaginationObject(JText::_('JPREV'), $this->prefix);

		if ($this->pagesCurrent > 1)
		{
			$page = ($this->pagesCurrent - 2) * $this->limit;

			// Set the empty for removal from route
			// @todo remove code: $page = $page == 0 ? '' : $page;

			$data->start->base = '0';
			$data->start->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=0');
			$data->previous->base = $page;
			$data->previous->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=' . $page);
		}

		// Set the next and end data objects.
		$data->next = new JPaginationObject(JText::_('JNEXT'), $this->prefix);
		$data->end = new JPaginationObject(JText::_('JLIB_HTML_END'), $this->prefix);

		if ($this->pagesCurrent < $this->pagesTotal)
		{
			$next = $this->pagesCurrent * $this->limit;
			$end = ($this->pagesTotal - 1) * $this->limit;

			$data->next->base = $next;
			$data->next->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=' . $next);
			$data->end->base = $end;
			$data->end->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=' . $end);
		}

		$data->pages = array();
		$stop = $this->pagesStop;

		for ($i = $this->pagesStart; $i <= $stop; $i++)
		{
			$offset = ($i - 1) * $this->limit;

			$data->pages[$i] = new JPaginationObject($i, $this->prefix);

			if ($i != $this->pagesCurrent || $this->viewall)
			{
				$data->pages[$i]->base = $offset;
				$data->pages[$i]->link = CMLiveDealHelper::prepareRoute($pageUrl . $params . '&' . $this->prefix . 'limitstart=' . $offset);
			}
			else
			{
				$data->pages[$i]->active = true;
			}
		}

		return $data;
	}
}
