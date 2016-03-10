<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class GameModelLinks extends JModelList
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
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$jinput = JFactory::getApplication()->input;
		
 
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.name, a.linkurl, a.linktype, a.description'
			)
		);
		$query->from('#__game_link AS a');
		
		$gameid = $jinput->get('id');
		$query->where('a.gameid =' . $gameid);

		
		$query->where('published = 1');
 
		return $query;
	}
	
	/**
	 * Get the message
	 * @return object The message to be displayed to the user
	 */
	public function getItem()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$jinput = JFactory::getApplication()->input;
	
	
		$query->select(
				$this->getState(
						'list.select',
						'a.id, a.name, a.alias, a.platform, a.genres, a.status' .
						', a.developer, a.publisher, a.image,a.paymenttype, a.distribution, a.releaseddate, a.pvp, a.fee, a.rating, a.overview, a.published'
				)
		);
		$query->from('#__game AS a');
	
		$query->select('c.title AS genres_name')
		->join('LEFT', '#__categories AS c ON c.id = a.genres');
	
		$query->select('p.name AS developer_name')
		->join('LEFT', '#__game_publisher AS p ON p.id = a.developer');
	
		$query->select('p1.name AS publisher_name')
		->join('LEFT', '#__game_publisher AS p1 ON p1.id = a.publisher');
	
		$id = $jinput->get('id');
		$query->where('a.id =' . $id);
	
		$query->where('a.published = 1');
	
		$db->setQuery($query);
	
		$item = $db->loadObject();
	
		return $item;
	
	
	}
}