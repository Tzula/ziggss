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
class GameViewPlaynowgames extends JViewLegacy
{
	protected $genres;
	protected $genre;
	protected $platform;
	protected $paytype;
	protected $playnowsfront;
	
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
		$context = "game.list";
		// Get data from the model
		$this->items			= $this->get('Items');
		$this->genres           = GameHelper::getGameGenres();
		$this->playnowsfront    = $this->get('playnowfront');
		//print_r($this->playnowsfront);
		//die();
		$this->genre             = $this->get('genre');
		$this->platform             = $this->get('platform');
		$this->paytype             = $this->get('paytype');
		$this->pagination		= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'name', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		//$this->filterForm    	= $this->get('FilterForm');
		//$this->activeFilters 	= $this->get('ActiveFilters');
		$user	                = JFactory::getUser();

 
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
		$document->setTitle("Play now game");
	}
}