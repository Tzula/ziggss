<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_game
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
/**
 * HelloWorld Model
 *
 * @since  0.0.1
 */
class GameModelGame extends JModelItem
{
		/**
	 * @var object item
	 */
	protected $item;
 
 
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'Game', $prefix = 'GameTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
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
		
		$id = $jinput->get('id');
		
		//增加游戏点击数
		$hitsql = "insert into #__game_hits(gameid, hittime) value(" . $id . ", now())";
		$db->setQuery($hitsql);
		$db->execute();
		
		
		$query->select(
				$this->getState(
						'list.select',
						'a.id, a.name, a.alias, a.platform, a.genres, a.status' .
						', a.developer AS developer_name, a.publisher AS publisher_name, a.image,a.paymenttype, a.distribution, a.releaseddate, a.pvp, a.fee, a.rating, a.overview, a.published, a.metadesc, a.metakey'
				)
		);
		$query->from('#__game AS a');
		
		$query->select('c.title AS genres_name')
		->join('LEFT', '#__categories AS c ON c.id = a.genres');
		
		//$query->select('p.name AS developer_name')
		//->join('LEFT', '#__game_publisher AS p ON p.id = a.developer');
		
		//$query->select('p1.name AS publisher_name')
		//->join('LEFT', '#__game_publisher AS p1 ON p1.id = a.publisher');
		
		$query->where('a.id =' . $id);

		$query->where('a.published = 1');

		$db->setQuery($query);
		
		$item = $db->loadObject();
		
		return $item;
		
		
	}
}