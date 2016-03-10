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
class GameModelPlaynowgames extends JModelList
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
				'a.name',
				'a.genres',
				'a.status',
				'a.developer',
				'a.publisher', 
				'a.paymenttype', 
				'a.distribution', 
				'a.releaseddate', 
				'a.pvp', 
				'a.fee', 
				'a.rating',
				'a.platform',
				'a.published',
				'a.overview'
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
		$this->setState('list.limit', 0);
		$jinput = JFactory::getApplication()->input;
		
 
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.name, a.alias, a.platform, a.genres, a.status' .
					', a.developer AS developer_name, a.image, a.publisher AS publisher_name, a.paymenttype, a.distribution, a.releaseddate, a.pvp, a.fee, a.rating, a.published, a.overview,a.playnowlink'
			)
		);
		$query->from('#__game AS a');

		$query->select('c.title AS genres_name')
			->join('LEFT', '#__categories AS c ON c.id = a.genres');

		//$query->select('p.name AS developer_name')
		//	->join('LEFT', '#__game_publisher AS p ON p.id = a.developer');

		//$query->select('p1.name AS publisher_name')
		//	->join('LEFT', '#__game_publisher AS p1 ON p1.id = a.publisher');

		
		$query->where('playnow = 1');
 
 

		$query->where('a.published = 1');

		$this->setWhere($query);
 
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'a.name');
		$orderDirn 	= $this->state->get('list.direction', 'asc');
 
		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
 
		return $query;
	}

	public function setWhere($query){
		$jinput = JFactory::getApplication()->input;
		$paytype    = $jinput->get('paytype');
		$platform = $jinput->get('platform');
		$genre = $jinput->get('genre');
		if (is_numeric($paytype))
		{
			$query->where('paymenttype = ' . (int)$paytype);
		}
		if (is_numeric($platform))
		{
			$query->where('platform like ' . "'%" . $platform . "%'");
		}
		if (is_numeric($genre))
		{
			$query->where('distribution = ' . (int)$genre);
		}
	}
	
	public function getPlaynowfront(){
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$this->setState('list.limit', 11);
		$jinput = JFactory::getApplication()->input;
		
		
		$query->select(
				$this->getState(
						'list.select',
						'a.id, a.name, a.alias, a.platform, a.genres, a.status' .
						', a.developer, a.image, a.publisher, a.paymenttype, a.distribution, a.releaseddate, a.pvp, a.fee, a.rating, a.published, a.overview,a.playnowlink, a.bigimage'
				)
		);
		$query->from('#__game AS a');
		
		$query->where('playnow = 1 and playnowfront = 1');
		
		
		$query->where('a.published = 1');
		
		$this->setWhere($query);
		
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'a.name');
		$orderDirn 	= $this->state->get('list.direction', 'asc');
		
		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
		$db->setQuery($query);
		
		try
		{
			$items = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
		
		return $items;
	}
	
	public function getGenre(){
		$jinput = JFactory::getApplication()->input;
		$genre = $jinput->get('genre');
		return $genre;
	}
	
	public function getPaytype(){
		$jinput = JFactory::getApplication()->input;
		$paytype = $jinput->get('paytype');
		return $paytype;
	}
	
	public function getPlatform(){
		$jinput = JFactory::getApplication()->input;
		$platform = $jinput->get('platform');
		return $platform;
	}
	
}