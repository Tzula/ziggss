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
class GameModelFeature extends JModelItem
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
	 * Method to build an SQL query to load the new item data.
	 *
	 * @return      string  An SQL query
	 */
	public function getNew()
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
						'a.*'
				)
		);
		$query->from('#__content AS a');
		
		
	
		// Join over the users for the author.
		$query->select('ua.name AS author_name')
		->join('LEFT', '#__users AS ua ON ua.id = a.created_by');
		
		$newsid = $jinput->get('newsid');
		$query->where('a.id =' . $newsid);
		
		
		$db->setQuery($query);
	
		$item = $db->loadObject();
	
		return $item;
	}
	
	/**
	 * Get the game
	 * @return object The game to be displayed to the user
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
	
	public function getFeaturesOfThisGame(){
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser();
		$app = JFactory::getApplication();
		$jinput = JFactory::getApplication()->input;
	
		// Select the required fields from the table.
	
		$gameid = $jinput->get('id');
		$sql = "select * from #__content as a where a.state=1 and a.catid in(16, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38) and a.gameid=$gameid  order by a.created desc limit 4";
	
		// Get the options.
		$db->setQuery($sql);
	
		try
		{
			$options = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
	
		return $options;
	}
	
	public function getFeaturesOfThisCategory(){
		// Create a new query object.
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$user = JFactory::getUser();
		$app = JFactory::getApplication();
	
		$gameCid = 0;
		$game = $this->getItem();
		if (isset($game)){
			$gameCid = $game->genres;
		}
		// Select the required fields from the table.
	
		$sql = "select * from #__content as a where a.state=1 and a.catid in(16, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38) and a.gameid in (select b.id from #__game as b  where b.genres=$gameCid )  order by a.created desc limit 4";
	
		// Get the options.
		$db->setQuery($sql);
	
		try
		{
			$options = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
	
		return $options;
	}
	
	
}