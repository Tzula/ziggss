<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

if (!class_exists('CMComponentRouterBase'))
{
	if (class_exists('JComponentRouterBase'))
	{
		/**
		 * The new way.
		 *
		 * @since  1.0.0
		 */
		abstract class CMComponentRouterBase extends JComponentRouterBase {}
	}
	else
	{
		/**
		 * The old way.
		 *
		 * @since  1.0.0
		 */
		class CMComponentRouterBase {}
	}
}

/**
 * Routing class from com_cmlivedeal.
 *
 * @since  1.0.0
 */
class CMLiveDealRouter extends CMComponentRouterBase
{
	/**
	 * Build the route for the com_cmlivedeal component.
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   1.0.0
	 */
	public function build(&$query)
	{
		$segments = array();

		// Get a menu item based on Itemid or currently active.
		$app = JFactory::getApplication();
		$menu = $app->getMenu();

		// We need a menu item.  Either the one specified in the query, or the current active one if none specified.
		if (empty($query['Itemid']))
		{
			$menuItem = $menu->getActive();
		}
		else
		{
			$menuItem = $menu->getItem($query['Itemid']);
		}

		if (isset($query['view']))
		{
			$view = $query['view'];

			if (empty($query['Itemid']) || empty($menuItem) || $menuItem->component != 'com_cmlivedeal')
			{
				$segments[] = $query['view'];
			}

			// We need to keep the view for the forms and the image popup since they never have their own menu item
			if ($view != 'dealform' && $view != 'customer' && $view != 'images')
			{
				unset($query['view']);
			}

			if (isset($query['deal']) && $app->getParams()->get('deal_detail', 'popup') != 'popup')
			{
				$segments[] = $query['deal'];

				unset($query['deal']);
			}

			if ($view == 'coupon' && isset($query['code']))
			{
				$segments[] = $query['code'];

				unset($query['code']);
			}
		}

		if (isset($query['layout']))
		{
			if (!empty($query['Itemid']) && isset($menuItem->query['layout']))
			{
				if ($query['layout'] == $menuItem->query['layout'])
				{
					unset($query['layout']);
				}
			}
			else
			{
				if ($query['layout'] == 'default')
				{
					unset($query['layout']);
				}
			}
		}

		if (isset($query['merchant']))
		{
			$segments[] = urlencode($query['merchant']);
			unset($query['merchant']);
		}

		if (isset($query['city']))
		{
			$segments[] = $query['city'];
			unset($query['city']);
		}

		if (isset($query['category']))
		{
			$segments[] = $query['category'];
			unset($query['category']);
		}

		if (isset($query['keyword']) && empty($query['keyword']))
		{
			unset($query['keyword']);
		}

		return $segments;
	}

	/**
	 * Parse the segments of a URL.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   1.0.0
	 */
	public function parse(&$segments)
	{
		$vars = array();

		// Get the active menu item.
		$app = JFactory::getApplication();
		$menu = $app->getMenu();
		$item = $menu->getActive();

		$segmentQuantity = count($segments);

		if ($segmentQuantity == 1)
		{
			if (isset($item))
			{
				if ($item->query['view'] == 'deals')
				{
/*
					$segment = preg_replace('/-/', ':', $segments[0], 1);

					if (strpos($segment, ':') != false)
					{
						$segmentParts = explode(':', $segment);

						if ((is_numeric($segmentParts[0]) && $segmentParts[0] > 0))
						{
							echo '<pre>'; print_r($segmentParts); jexit();
						}
					}
					*/

					// Check if the slug is a deal, city or category.
					if ($this->doesDealExist($segments[0]))
					{
						$vars['deal'] = $segments[0];
					}
					elseif ($this->doesCityExist($segments[0]))
					{
						$vars['city'] = $segments[0];
					}
					elseif ($this->doesCategoryExist($segments[0]))
					{
						$vars['category'] = $segments[0];
					}
					else
					{
						// Not a city or category, show 404 error.
						return JError::raiseError(404, JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'));
					}
				}
				elseif ($item->query['view'] == 'deal')
				{
					$vars['view'] = 'deal';
					$vars['alias'] = $segments[0];
				}
				elseif ($item->query['view'] == 'coupon')
				{
					$vars['view'] = 'coupon';
					$vars['tmpl'] = 'component';
					$vars['code'] = $segments[0];
				}
				elseif ($item->query['view'] == 'merchant')
				{
					$vars['view'] = 'merchant';
					$vars['merchant'] = urldecode($segments[0]);
				}

				return $vars;
			}
			else
			{
				$vars['view'] = $segments[0];

				if ($vars['view'] == 'coupon')
				{
					$vars['tmpl'] = 'component';
				}
			}
		}
		elseif ($segmentQuantity == 2)
		{
			if (isset($item) && $item->query['view'] == 'deals')
			{
				// The first segment must be the city. The second one is category.
				if ($this->doesCityExist($segments[0]) && $this->doesCategoryExist($segments[1]))
				{
					$vars['city'] = $segments[0];
					$vars['category'] = $segments[1];
				}
				else
				{
					return JError::raiseError(404, JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'));
				}
			}
		}

		return $vars;
	}

	/**
	 * Check if the alias belongs to an existing deal.
	 *
	 * @param   string  $alias  The city's alias.
	 *
	 * @return  boolean
	 *
	 * @since   1.6.0
	 */
	protected function doesDealExist($alias)
	{
		$count = 0;
		$slug = preg_replace('/-/', ':', $alias, 1);

		if (strpos($slug, ':') !== false)
		{
			list($id, $alias) = explode(':', $slug, 2);
		}
		else
		{
			$id = $slug;
			$alias = '';
		}

		$id = (int) $id;

		if ($id > 0)
		{
			$now = JFactory::getDate()->toSql();

			$db = JFactory::getDbo();
			$query = $db->getQuery(true)
				->select('COUNT(' . $db->qn('id') . ')')
				->from($db->qn('#__cmlivedeal_deals') . ' AS a')
				->where($db->qn('a.published') . ' = ' . $db->q('1'))
				->where($db->qn('a.approved') . ' = ' . $db->q('1'))
				->where($db->qn('a.id') . ' = ' . $db->q($id))
				->where($db->qn('a.starting_time') . ' <= ' . $db->q($now))
				->where($db->qn('a.ending_time') . ' >= ' . $db->q($now));

			if ($alias != '')
			{
				$query->where($db->qn('a.alias') . ' = ' . $db->q($alias));
			}

			$count = $db->setQuery($query)->loadResult();
		}

		return ($count == 1) ? true : false;
	}

	/**
	 * Check if the alias belongs to an existing city.
	 *
	 * @param   string  $alias  The city's alias.
	 *
	 * @return  boolean
	 *
	 * @since   1.5.0
	 */
	protected function doesCityExist($alias)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select($db->qn('id'))
			->from($db->qn('#__cmlivedeal_cities'))
			->where($db->qn('published') . ' = ' . $db->q(1))
			->where($db->qn('alias') . ' = ' . $db->q($alias));

		$cityId = (int) $db->setQuery($query)->loadResult();

		return ($cityId > 0) ? true : false;
	}

	/**
	 * Check if the alias belongs to an existing category.
	 *
	 * @param   string  $alias  The category's alias.
	 *
	 * @return  boolean
	 *
	 * @since   1.5.0
	 */
	protected function doesCategoryExist($alias)
	{
		$db = JFactory::getDbo();

		$query = $db->getQuery(true)
			->select($db->qn('id'))
			->from($db->qn('#__categories'))
			->where($db->qn('published') . ' = ' . $db->q(1))
			->where($db->qn('parent_id') . ' > ' . $db->q(0))
			->where($db->qn('extension') . ' = ' . $db->q('com_cmlivedeal'))
			->where($db->qn('alias') . ' = ' . $db->q($alias));
		$categoryId = (int) $db->setQuery($query)->loadResult();

		return ($categoryId > 0) ? true : false;
	}
}

/**
 * Build the route for the com_cmlivedeal component.
 *
 * @param   array  &$query  An array of URL arguments
 *
 * @return  array  The URL arguments to use to assemble the subsequent URL.
 *
 * @since   1.0.0
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function CMLiveDealBuildRoute(&$query)
{
	$router = new CMLiveDealRouter;

	return $router->build($query);
}

/**
 * Parse the segments of a URL.
 *
 * @param   array  $segments  The segments of the URL to parse.
 *
 * @return  array  The URL attributes to be used by the application.
 *
 * @since   1.0.0
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function CMLiveDealParseRoute($segments)
{
	$router = new CMLiveDealRouter;

	return $router->parse($segments);
}
