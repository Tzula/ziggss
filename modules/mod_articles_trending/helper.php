<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

/**
 * Helper for mod_articles_featured
 *
 * @package     Joomla.Site
 * @subpackage  mod_articles_featured
 *
 * @since       1.6.0
 */
abstract class ModArticlesTrendingHelper
{
	public static function getTrending(&$params)
	{
		$db    = JFactory::getDbo();
	
		$sql = "SELECT * FROM #__content_trending as a left join #__content as b on a.content_id=b.id order by b.created desc limit 3";
	
	
	
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

		foreach ($items as &$item)
		{
			$item->slug = $item->id . ':' . $item->alias;
			$item->catslug = $item->catid;
			$item->link = '';


			// We know that user has the privilege to view the article
			if ($item->gameid > 0){
				switch($item->catid){
					case 16:
						$item->link  =  JRoute::_('index.php?option=com_game&view=feature&id=' . $item->gameid . '&newsid=' . $item->id);
						break;
					case 18:
						$item->link  =  JRoute::_('index.php?option=com_game&view=new&id=' . $item->gameid . '&newsid=' . $item->id);
						break;
					case 19:
						$item->link  =  JRoute::_('index.php?option=com_game&view=video&id=' . $item->gameid . '&videoid=' . $item->id);
						break;
					case 22:
						$item->link  =  JRoute::_('index.php?option=com_game&view=review&id=' . $item->gameid . '&reviewid=' . $item->id);
						break;
					default:
						$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
				}
			}else{
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
			}

		}
		return $items;
	}
	
}
