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
require_once __DIR__ . '/../../helpers/game.php';
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class GameViewGame extends JViewLegacy
{
	protected $lastFeatures;
	protected $popularFeatures;
	protected $latestNews;
	protected $latestGames;
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		
		$jinput = JFactory::getApplication()->input;
		$id = $jinput->get('id');

		
		// Assign data to the view
		$this->item = $this->get('Item');
		$this->lastFeatures = GameHelper::getLastFeaturesById($id);
		$this->popularFeatures = GameHelper::getPopularFeatures();
		$this->latestNews = GameHelper::getLatestNews();
		$this->latestGames = GameHelper::getLatestGames();
 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
 
			return false;
		}
		
		foreach ($this->lastFeatures as $item)
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
		}
 
		$dispatcher = JEventDispatcher::getInstance();
		
		JPluginHelper::importPlugin('content');
		
		$dispatcher->trigger('onGamePrepare', array ('com_game.game', &$this->item->overview));
		// Display the view
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
		$document->setTitle($this->item->name);
		if ($this->item->metadesc)
		{
			$document->setDescription($this->item->metadesc);
		}
			
		if ($this->item->metakey)
		{
			$document->setMetadata('keywords', $this->item->metakey);
		}
	}
}