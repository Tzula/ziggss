<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

/**
 * Helper for mod_articles_latest
 *
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 * @since       1.6
 */
abstract class ModGamesArticlesNewspageHelper
{
	
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
	
	public static function getLatestReviews(){
	
		$options = array();
	
		$db    = JFactory::getDbo();
	
		$sql = "select a.id, a.title, a.gameid, b.name from #__content as a inner join #__game as b on a.gameid = b.id  where a.state=1 and a.catid=22   order by a.created desc limit 5";
	
	
	
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
