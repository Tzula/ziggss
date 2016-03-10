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
class ContentModelFeatures extends JModelList
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
						'a.id, a.title, a.alias, a.catid, a.state, a.introtext,a.fulltext, a.access, a.created, a.created_by, a.created_by_alias, a.gameid'
				)
		);
		$query->from('#__content AS a');
		
		
	
		// Join over the users for the author.
		$query->select('ua.name AS author_name')
		->join('LEFT', '#__users AS ua ON ua.id = a.created_by');
		
		$gameid = $jinput->get('gameid');
		if ($gameid >0 ){
			$query->where('a.gameid =' . $gameid);
		}
		
		$catid = $jinput->get('cid');
		if ($catid >0 ){
			$query->where('catid = ' . $catid);
		}else{
			$query->where('catid in(16, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38)');
		}
		
		
		$query->where('state = 1');

		
		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering', 'a.created');
		$orderDirn = $this->state->get('list.direction', 'desc');
		
		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		
		return $query;
	}
	
	public function getCid(){
		$jinput = JFactory::getApplication()->input;
		$catid = $jinput->get('cid');
		return $catid;
	}
	
	public function getGameid(){
		$jinput = JFactory::getApplication()->input;
		$gameid = $jinput->get('gameid');
		return $gameid;
	}
	
	
}
