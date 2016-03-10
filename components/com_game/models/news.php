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
class GameModelNews extends JModelList
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
						'a.id, a.title, a.alias, a.catid, a.state, a.introtext, a.access, a.created, a.created_by, a.created_by_alias'
				)
		);
		$query->from('#__content AS a');
		
		
	
		// Join over the users for the author.
		$query->select('ua.name AS author_name')
		->join('LEFT', '#__users AS ua ON ua.id = a.created_by');
		
		$gameid = $jinput->get('id');
		$query->where('a.gameid =' . $gameid);
		
		
		$query->where('state = 1');
		
		$query->where('catid = 18');
		
		// Add the list ordering clause.
		$orderCol = $this->state->get('list.ordering', 'a.created');
		$orderDirn = $this->state->get('list.direction', 'desc');
		
		$query->order($db->escape($orderCol . ' ' . $orderDirn));
		
		return $query;
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
}