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
class GameViewGames extends JViewLegacy
{
	protected $loadFilters;
	protected $genres;
	protected $publishers;
	
	protected $rDateStart;
	protected $rDateEnd;
	protected $maxMonthlyFee;
	protected $PvP;
	protected $sGenres;
	protected $sGameStatush;
	protected $sDevelopersh;
	protected $sPublishersh;
	protected $sPayTypesh;
	protected $sDistributionTypesh;
	
	
	
	protected $tempGenres;
	protected $tempsGameStatush;
	protected $tempsDevelopersh;
	protected $tempsPublishersh;
	protected $tempsPayTypesh;
	protected $tempsDistributionTypesh;
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
		//$this->pagination		= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'name', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		//$this->filterForm    	= $this->get('FilterForm');
		//$this->activeFilters 	= $this->get('ActiveFilters');
		$user	                = JFactory::getUser();
		$this->loadFilters      = $this->get('loadFilters');
		$this->genres           = GameHelper::getGameGenres();
		$this->publishers        =GameHelper::getPublisherOptions();
		
		$this->rDateStart       =$this->get('rDateStart');
		$this->rDateEnd         = $this->get('rDateEnd');
		$this->maxMonthlyFee    = $this->get('maxMonthlyFee');
		$this->PvP              = $this->get('PvP');
		$this->sGenres         = $this->get('sGenresh');
		$this->sGameStatush    = $this->get('sGameStatush');
		$this->sDevelopersh    = $this->get('sDevelopersh');
		$this->sPublishersh    = $this->get('sPublishersh');
		$this->sPayTypesh      = $this->get('sPayTypesh');
		$this->sDistributionTypesh = $this->get('sDistributionTypesh');
		
		
		foreach ($this->sGenres as $sgenre){
			$this->tempGenres[] = $sgenre[0];
		}
		
		foreach ($this->sGameStatush as $sgamestatu){
			$this->tempsGameStatush[] = $sgamestatu[0];
		}
		
		foreach ($this->sDevelopersh as $sDeveloperh){
			$this->tempsDevelopersh[] = $sDeveloperh[0];
		}
		
		foreach ($this->sPublishersh as $sPublisherh){
			$this->tempsPublishersh[] = $sPublisherh[0];
		}
		foreach ($this->sPayTypesh as $sPayTypeh){
			$this->tempsPayTypesh[] = $sPayTypeh[0];
		}
		foreach ($this->sDistributionTypesh as $sDistributionTypeh){
			$this->tempsDistributionTypesh[] = $sDistributionTypeh[0];
		}
		

 
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
		$document->setTitle("Game list");
	}
}