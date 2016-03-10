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
abstract class ModGamesDownloadNewsHelper
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
		
		$sql = "select a.id, a.name, a.image, a.playnowlink from #__game AS a where a.playnow = 1 and a.published=1 order by a.rating desc limit 15";
 
		
 
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
