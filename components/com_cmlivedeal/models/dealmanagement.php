<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for list of merchant's deals.
 *
 * @since  1.0.0
 */
class CMLiveDealModelDealManagement extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @since   1.0.0
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'a.id',
				'title', 'a.title',
				'impressions', 'a.impressions',
				'clicks', 'a.clicks',
				'redeemed', 'captured',
				'ending_time',
			);
		}

		parent::__construct($config);
	}

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
		// Load the filter state.
		$search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
		$this->setState('filter.search', $search);

		// Load the parameters.
		$params = JFactory::getApplication()->getParams();
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.id', 'desc');
	}

	/**
	 * Method to get a store id based on model configuration state.
	 *
	 * This is necessary because the model is used by the component and
	 * different modules that might need different sets of data or different
	 * ordering requirements.
	 *
	 * @param   string  $id  A prefix for the store id.
	 *
	 * @return  string  A store id.
	 * 
	 * @since   1.0.0
	 */
	protected function getStoreId($id = '')
	{
		// Compile the store id.
		$id .= ':' . $this->getState('filter.search');

		return parent::getStoreId($id);
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
		$integration = $this->state->get('params')->get('membership_integration', '');

		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$now = JFactory::getDate()->toSql();
		$user = JFactory::getUser();

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.title, a.image_id, a.user_id, a.starting_time, a.ending_time, ' .
				'a.checked_out, a.checked_out_time, a.impressions, a.clicks, a.approved, a.published'
			)
		);

		$query->from($db->qn('#__cmlivedeal_deals') . ' AS a')
			->where($db->qn('a.user_id') . ' = ' . $db->q((int) $user->id))
			->where($db->qn('a.published') . ' IN (0,1)');

		// Join over the users for the checked out user.
		$query->select($db->qn('uc.name') . ' AS editor')
			->join(
				'LEFT',
				$db->qn('#__users') . ' AS uc ON ' . $db->qn('uc.id') . ' = ' . $db->qn('a.checked_out')
			);

		// Join over the categories.
		$query->select('c.title AS category_title')
			->join('LEFT', '#__categories AS c ON c.id = a.category_id');

		// Count captured coupons.
		$capturedQuery = $db->getQuery(true)
			->select('COUNT(c.id)')
			->from($db->qn('#__cmlivedeal_coupons') . ' AS c')
			->where($db->qn('c.deal_id') . ' = ' . $db->qn('a.id'));

		$query->select('(' . $capturedQuery->__toString() . ') AS captured');

		$redeemedQuery = $db->getQuery(true)
			->select('COUNT(c.id)')
			->from($db->qn('#__cmlivedeal_coupons') . ' AS c')
			->where($db->qn('c.deal_id') . ' = ' . $db->qn('a.id'))
			->where($db->qn('c.redeemed') . ' = ' . $db->q(1));

		$query->select('(' . $redeemedQuery->__toString() . ') AS redeemed');

		// Filter by search in title.
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$search = $db->q('%' . $db->escape($search, true) . '%');
			$query->where($db->qn('a.title') . ' LIKE ' . $search);
		}

		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}
}
