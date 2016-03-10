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
 * HelloWorlds View
 *
 * @since  0.0.1
 */
class GameViewFeature extends JViewLegacy
{
	protected $popularFeatures;
	protected $latestNews;
	protected $latestGames;
	protected $featuresOfThisGame;
	protected $featuresOfThisCategory;
	
	/**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	public  $new;
	protected $item;
	
	function display($tpl = null)
	{
 
		// Get application
		$app = JFactory::getApplication();
		$this->new			= $this->get('New');
		$this->item = $this->get('Item');
		
		$this->popularFeatures = GameHelper::getPopularFeatures();
		$this->latestNews = GameHelper::getLatestNews();
		$this->latestGames = GameHelper::getLatestGames();
		$this->featuresOfThisGame = $this->get('FeaturesOfThisGame');
		$this->featuresOfThisCategory = $this->get('FeaturesOfThisCategory');
		
		$dispatcher = JEventDispatcher::getInstance();

 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
		
		$new = $this->new;
		if ($new->fulltext)
		{
			$new->text = $new->fulltext;
		}
		else
		{
			$new->text = $new->introtext;
		}
		JPluginHelper::importPlugin('content');
		$dispatcher->trigger('onContentPrepare', array ('com_game.feature', &$new, &$new->params));
 
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
		$document->setTitle($this->new->title . ' | ' . $this->item->name . ' | features');
		if ($this->new->metadesc)
		{
			$document->setDescription($this->new->metadesc);
		}
			
		if ($this->new->metakey)
		{
			$document->setMetadata('keywords', $this->new->metakey);
		}
		
	}

}