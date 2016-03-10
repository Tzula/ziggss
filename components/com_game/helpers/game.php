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
 * HelloWorld component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class GameHelper
{
	/**
	 * Get publisher list in text/value format for a select field
	 *
	 * @return  array
	 */
	public static function getSubString($string, $pos, $length)
	{
		if (strlen($string) < $length){
			return $string;
		}else{
			return substr($string, $pos, $length) . '..';
		}
	}

	public static function blCurrent($jinput, $type){
		if ($type == 'all' && !$jinput->get('paymenttype') && !$jinput->get('status') && !$jinput->get('platform') && !$jinput->get('distribution') && !$jinput->get('genres')){
			echo 'current';	
			return;
		}
		if($jinput->get('paymenttype') ==2 && $type == 'paymenttype'){
			echo 'current';
			return;
		}elseif($jinput->get('status') ==6 && $type == 'status6'){
			echo 'current';
			return;
		}elseif($jinput->get('status') ==2 && $type == 'status2'){
			echo 'current';
			return;
		}
		elseif($jinput->get('status') ==4 && $type == 'status4'){
			echo 'current';
			return;
		}
		elseif($jinput->get('status') ==3 && $type == 'status3'){
			echo 'current';
			return;
		}
		elseif($jinput->get('platform') ==2 && $type == 'platform'){
			echo 'current';
			return;
		}
		elseif($jinput->get('distribution') ==1 && $type == 'distribution'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 44 && $type == 'genres44'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 48 && $type == 'genres48'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 47 && $type == 'genres47'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 41 && $type == 'genres41'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 46 && $type == 'genres46'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 43 && $type == 'genres43'){
			echo 'current';
			return;
		}elseif($jinput->get('genres') == 42 && $type == 'genres42'){
			echo 'current';
			return;
		}
	}
	
	public static function getGameGenres()
	{
		$options = array();
	
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('id As value, title As text')
		->from('#__categories AS c')
		->where("c.published = 1 and c.extension='com_game'")
		->order('c.title');
	
		// Get the options.
		$db->setQuery($query);
	
		try
		{
			$options = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
	
		// Merge any additional options in the XML definition.
		// $options = array_merge(parent::getOptions(), $options);
	
		array_unshift($options, JHtml::_('select.option', '0', 'Genre?'));
	
		return $options;
	}
	
	/**
	 * Get publisher list in text/value format for a select field
	 *
	 * @return  array
	 */
	public static function getPublisherOptions()
	{
		$options = array();
	
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('id As value, name As text')
		->from('#__game_publisher AS a')
		->where('a.published = 1')
		->order('a.name');
	
		// Get the options.
		$db->setQuery($query);
	
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
	
	public static function getLastFeaturesById($id){
		
		$options = array();
		
		$db    = JFactory::getDbo();
		
		$sql = "select * from #__content where state=1 and catid in(16, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38) and gameid=$id  order by created desc limit 4";
		
		
		
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
	
	public static function getPopularFeatures(){
	
		$options = array();
	
		$db    = JFactory::getDbo();
	
		$sql = "select a.id, a.title, a.gameid, b.name from #__content as a inner join nnrl6_game as b on a.gameid = b.id  where a.state=1 and a.catid in(16, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38)  order by a.hits desc limit 5";
	
	
	
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
	
	public static function getLatestNews(){
	
		$options = array();
	
		$db    = JFactory::getDbo();
	
		$sql = "select a.id, a.title, a.gameid, b.name from #__content as a inner join #__game as b on a.gameid = b.id  where a.state=1 and a.catid=18   order by a.created desc limit 5";
	
	
	
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
	
	public static function getLatestGames(){
	
		$options = array();
	
		$db    = JFactory::getDbo();
	
		$sql = "select id, name from #__game  where published=1 order by created desc limit 5";
	
	
	
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