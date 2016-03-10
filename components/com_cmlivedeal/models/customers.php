<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Model class for list of merchant's coupons.
 *
 * @since  1.0.0
 */
class CMLiveDealModelCustomers extends JModelList
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
				'code', 'a.code',
				'redeemed', 'a.redeemed',
				'redeemed_time', 'a.redeemed_time',
				'created', 'a.created',
				'deal_ending_time'
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

		$redeemed = $this->getUserStateFromRequest($this->context . '.filter.redeemed', 'filter_redeemed', '', 'string');
		$this->setState('filter.redeemed', $redeemed);

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
		$id .= ':' . $this->getState('filter.redeemed');

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

		// Select deals of merchant.
		$subQuery = $db->getQuery(true);
		$subQuery->select($db->qn('d.id'))
			->from($db->qn('#__cmlivedeal_deals') . ' AS d')
			->where($db->qn('d.user_id') . ' = ' . $db->q(JFactory::getUser()->id));

		// Select the required fields from the table.
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.code, a.user_id, a.deal_id, a.redeemed, a.redeemed_time, a.created'
			)
		);

		$query->from($db->qn('#__cmlivedeal_coupons') . ' AS a');

		$query->where($db->qn('a.deal_id') . ' IN (' . $subQuery->__toString() . ')');

		// Get deal name.
		$query->select($db->qn('b.title') . ' AS deal_name')
			->select($db->qn('b.ending_time') . ' AS deal_ending_time')
			->join(
				'LEFT',
				$db->qn('#__cmlivedeal_deals') . ' AS b ON ' . $db->qn('b.id') . ' = ' . $db->qn('a.deal_id')
			);

		// Filter by search in title.
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
				$search = $db->q('%' . $db->escape($search, true) . '%');
				$query->where($db->qn('a.code') . ' LIKE ' . $search . ' OR ' . $db->qn('b.title') . ' LIKE ' . $search);
		}

		// Filter by redeemed state.
		$redeemed = $this->getState('filter.redeemed');

		if (is_numeric($redeemed))
		{
			$query->where($db->qn('a.redeemed') . ' = ' . (int) $redeemed);
		}
		elseif ($redeemed === '')
		{
			$query->where($db->qn('a.redeemed') . ' IN (0, 1)');
		}

		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering');
		$orderDirn = $this->state->get('list.direction');
		$query->order($db->escape($orderCol . ' ' . $orderDirn));

		return $query;
	}
}
