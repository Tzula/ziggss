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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class GameViewVideo extends JViewLegacy
{
	protected $popularFeatures;
	protected $latestNews;
	protected $latestGames;
	protected $videosOfThisGame;
	protected $videosOfThisCategory;
	
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public  $video;
	
	function display($tpl = null)
	{
 
		// Get application
		$app = JFactory::getApplication();
		$this->video			= $this->get('Video');
		$this->item = $this->get('Item');
		
		$this->popularFeatures = GameHelper::getPopularFeatures();
		$this->latestNews = GameHelper::getLatestNews();
		$this->latestGames = GameHelper::getLatestGames();
		$this->videosOfThisGame = $this->get('VideosOfThisGame');
		$this->videosOfThisCategory = $this->get('VideosOfThisCategory');
		
		$dispatcher = JEventDispatcher::getInstance();

 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		
		$video = $this->video;
		if ($video->fulltext)
		{
			$video->text = $video->fulltext;
		}
		else
		{
			$video->text = $video->introtext;
		}
		JPluginHelper::importPlugin('content');
		$dispatcher->trigger('onContentPrepare', array ('com_game.video', &$video, &$video->params));
 

 
		// Display the template
		parent::display($tpl);
 
		// Set the document
		$this->setDocument();
	}
 

	/**
	 * Method to set up the document properties
	 *
	 * @return void
	 */
	protected function setDocument() 
	{
		$document = JFactory::getDocument();
		$document->setTitle($this->video->title . ' |' . $this->item->name . " | Video");
		if ($this->video->metadesc)
		{
			$document->setDescription($this->video->metadesc);
		}
		
		if ($this->video->metakey)
		{
			$document->setMetadata('keywords', $this->video->metakey);
		}
	}
}