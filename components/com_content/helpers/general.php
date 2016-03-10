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
abstract class GeneralHelper
{
	
	/**
	 * Get gameid list in text/value format for a select field
	 *
	 * @return  array
	 */
	public static function getGameIdOptions()
	{
		$options = array();
	
		$db = JFactory::getDbo();
		$query = $db->getQuery(true)
		->select('id As value, name As text')
		->from('#__game AS a')
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
	
		// Merge any additional options in the XML definition.
		// $options = array_merge(parent::getOptions(), $options);
	
		array_unshift($options, JHtml::_('select.option', '0', 'Show all games'));
	
		return $options;
	}
}