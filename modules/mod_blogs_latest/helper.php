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
abstract class ModBlogsLatestHelper
{
	/**
	 * Retrieve a list of article
	 *
	 * @param   \Joomla\Registry\Registry  &$params  module parameters
	 *
	 * @return  mixed
	 *
	 * @since   1.6
	 */
	public static function getList(&$params)
	{
		$db    = JFactory::getDbo();
	
		$sql = "SELECT * FROM #__newsfeeds as a where a.published = 1 order by a.created asc";
	
	
	
		// Get the options.
		$db->setQuery($sql);
	
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
	
	public static function getRssContents(&$rsssourse)
	{
		$rssurl = 'http://www.gamenewshq.com/rss/news';
		
		$db    = JFactory::getDbo();
		
		$sql = "SELECT * FROM #__newsfeeds as a where a.published = 1 order by a.created asc";
		
		
		
		// Get the options.
		$db->setQuery($sql);
		
		try
		{
			$items = $db->loadObjectList();
		}
		catch (RuntimeException $e)
		{
			JError::raiseWarning(500, $e->getMessage());
		}
		
		$length = count($items);
		if ($length > 0){
			$i = rand(0, $length);
			$rssurl = $items[$i]->link;
			$rsssourse = $items[$i];
		}
		if ($rssurl == ''){
			$rssurl = 'http://www.gamenewshq.com/rss/news';
		}
		try
		{
			$feed = new JFeedFactory;
			$rssDoc = $feed->getFeed($rssurl);
		}
		catch (InvalidArgumentException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (RunTimeException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		catch (LogicException $e)
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		
		if (empty($rssDoc))
		{
			return JText::_('MOD_FEED_ERR_FEED_NOT_RETRIEVED');
		}
		
		if ($rssDoc)
		{
			return $rssDoc;
		}
	}
}
