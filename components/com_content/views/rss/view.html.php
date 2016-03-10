<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\Registry\Registry;
require_once __DIR__ . '/../../helpers/general.php';

/**
 * HTML View class for the Content component
 *
 * @since  1.5
 */
class ContentViewRss extends JViewLegacy
{
	protected $games;
	protected $cid;
	protected $gameid;

	/**
	 * Execute and display a template script.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 */
	public function display($tpl = null)
	{
				// Get application
		$app = JFactory::getApplication();
		$this->items			= $this->get('Items');
		

 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		
		foreach ($this->items as $item)
		{
 
			$dispatcher = JEventDispatcher::getInstance();
		
			JPluginHelper::importPlugin('content');
			
			// Old plugins: Ensure that text property is available
			if (!isset($item->text))
			{
				if ($item->fulltext == ''){
					$item->text = $item->introtext;
				}else{
					$item->text = $item->fulltext;
				}
			}
		
			$dispatcher->trigger('onContentPrepare', array ('com_content.news', &$item, &$item->params, 0));
			$item->link = 'http://www.gameteaser.com';
			
			if ($item->game_id > 0){
				switch($item->catid){
					case 16:
						$item->link  .=  JRoute::_('index.php?option=com_game&view=feature&id=' . $item->game_id . '&newsid=' . $item->id);
						break;
					case 18:
						$item->link  .=  JRoute::_('index.php?option=com_game&view=new&id=' . $item->game_id . '&newsid=' . $item->id);
						break;
					case 19:
						$item->link  .=  JRoute::_('index.php?option=com_game&view=video&id=' . $item->game_id . '&videoid=' . $item->id);
						break;
					case 22:
						$item->link  .=  JRoute::_('index.php?option=com_game&view=review&id=' . $item->game_id . '&reviewid=' . $item->id);
						break;
					default:
						$item->link .= JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
				}
			}else{
				$item->link .= JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
			}
		}
 		
		// Display the template
		
		$this->echoRss();
				
				
		//parent::display($tpl);
	}

	function echoRss(){
		$now = date("D, d M Y H:i:s T");
		
		$output = "<?xml version=\"1.0\"?>
		<rss version=\"2.0\">
		<channel>
		<title>Gameteaser Content Rss</title>
		<link>http://www.gameteaser.com/index.php?option=com_content&view=rss&layout=rss</link>
		<description>Gameteaser Content Rss</description>
		<language>en-us</language>
		<pubDate>$now</pubDate>
		<lastBuildDate>$now</lastBuildDate>
		<docs>http://someurl.com</docs>
		<managingEditor>tzula@gameteaser.com</managingEditor>
		<webMaster>tzula@gameteaser.com</webMaster>
		";
		
		foreach ($this->items as $line)
		{
		$output .= "<item><title>".htmlentities($line->title)."</title>
		<link>".$line->link."</link>
		
		<description>".htmlentities(strip_tags($line->text))."</description>
				</item>";
		}
		$output .= "</channel></rss>";
		echo $output;
		die();
	}
}
