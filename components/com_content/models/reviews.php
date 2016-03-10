<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;

/**
 * This models supports retrieving lists of articles.
 *
 * @since  1.6
 */
class ContentModelReviews extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',
				'a.name'
			);
		}
 
		parent::__construct($config);
	}
	
	protected function populateState($ordering = 'ordering', $direction = 'ASC')
	{
		$app = JFactory::getApplication();
	
		// List state information
		//$value = $app->input->get('limit', $app->get('list_limit', 0), 'uint');
		$this->setState('list.limit', 100);
	
		$value = $app->input->get('limitstart', 0, 'uint');
		$this->setState('list.start', $value);
	
		$orderCol = $app->input->get('filter_order', 'a.ordering');
	
		if (!in_array($orderCol, $this->filter_fields))
		{
			$orderCol = 'a.ordering';
		}
	
		$this->setState('list.ordering', $orderCol);
	
		$listOrder = $app->input->get('filter_order_Dir', 'ASC');
	
		if (!in_array(strtoupper($listOrder), array('ASC', 'DESC', '')))
		{
			$listOrder = 'ASC';
		}
	
		$this->setState('list.direction', $listOrder);
	
		$params = $app->getParams();
		$this->setState('params', $params);
		$user = JFactory::getUser();
	
		if ((!$user->authorise('core.edit.state', 'com_content')) && (!$user->authorise('core.edit', 'com_content')))
		{
			// Filter on published for those who do not have edit or edit.state rights.
			$this->setState('filter.published', 1);
		}
	
		$this->setState('filter.language', JLanguageMultilang::isEnabled());
	
		// Process show_noauth parameter
		if (!$params->get('show_noauth'))
		{
			$this->setState('filter.access', true);
		}
		else
		{
			$this->setState('filter.access', false);
		}
	
		$this->setState('layout', $app->input->getString('layout'));
	}
 
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser();
		$app = JFactory::getApplication();
		$jinput = JFactory::getApplication()->input;
		
		// Select the required fields from the table.
		$query->select(
				$this->getState(
						'list.select',
						'a.id, a.title, a.alias, a.catid, a.state, a.introtext, a.access, a.created, a.created_by, a.created_by_alias, a.gameid'
				)
		);
		$query->from('#__content AS a');
		
		
	
		// Join over the users for the author.
		$query->select('ua.name AS author_name')
		->join('LEFT', '#__users AS ua ON ua.id = a.created_by');
		
		//$gameid = $jinput->get('id');
		//$query->where('a.gameid =' . $gameid);
		
		
		$query->where('state = 1');
		
		$query->where('catid = 22 or catid = 32');
		
		// Add the list ordering clause.
		//$orderCol = $this->state->get('list.ordering', 'a.created');
		//$orderDirn = $this->state->get('list.direction', 'desc');
		
		$query->order('a.created desc');
		return $query;
	}
	
	
}
