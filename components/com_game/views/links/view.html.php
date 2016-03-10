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
class GameViewLinks extends JViewLegacy
{
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
 
		// Get application
		$app = JFactory::getApplication();
		$this->items			= $this->get('Items');
		$this->item = $this->get('Item');
		
		$this->popularFeatures = GameHelper::getPopularFeatures();
		$this->latestNews = GameHelper::getLatestNews();
		$this->latestGames = GameHelper::getLatestGames();

 
		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}
 

 
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
		$document->setTitle($this->item->name . " | Links");
	}
}