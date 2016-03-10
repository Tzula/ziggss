<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for list of coupons.
 *
 * @since  1.0.0
 */
class CMLiveDealModelCoupons extends JModelList
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
				'code', 'a.code',
				'created', 'a.created',
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
		$params = JComponentHelper::getParams('com_cmlivedeal');
		$this->setState('params', $params);

		// List state information.
		parent::populateState('a.created', 'desc');
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
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.code, a.user_id, a.deal_id, a.created'
			)
		);

		$query->from($db->qn('#__cmlivedeal_coupons') . ' AS a')
			->where($db->qn('a.user_id') . ' = ' . $db->q(JFactory::getUser()->id));

		// Get deal's name and deal's ending date.
		$query->select($db->qn('d.title') . ' AS deal_name')
			->select($db->qn('d.ending_time') . ' AS deal_ending_time')
			->join(
				'LEFT',
				$db->qn('#__cmlivedeal_deals') . ' AS d ON ' . $db->qn('d.id') . ' = ' . $db->qn('a.deal_id')
			);

		// Filter by searching in coupon code and deal name.
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$search = $db->q('%' . $db->escape($search, true) . '%');
			$query->where($db->qn('a.code') . ' LIKE ' . $search . ' OR ' . $db->qn('d.title') . ' LIKE ' . $search);
		}

		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}
}
