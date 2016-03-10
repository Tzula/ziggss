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
abstract class ModGamesPopularHelper
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
	public static function getDevList(&$params)
	{
		$db    = JFactory::getDbo();
		
		$sql = "select a.* from #__game AS a where a.published=1 and a.status=4  order by a.rating desc limit 7";
 
		
 
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
	
	public static function getRelList(&$params)
	{
		$db    = JFactory::getDbo();
	
		$sql = "select a.* from #__game AS a where a.published=1 and a.status=1 or a.status=2 or a.status=5 or a.status=6  order by a.rating desc limit 7";
	
	
	
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
