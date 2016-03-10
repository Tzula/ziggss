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
 * HelloWorldList Model
 *
 * @since  0.0.1
 */
class GameModelGames extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id',
				'a.name',
				'a.genres',
				'a.status',
				'a.developer',
				'a.publisher', 
				'a.paymenttype', 
				'a.distribution', 
				'a.releaseddate', 
				'a.pvp', 
				'a.fee', 
				'a.rating',
				'a.platform',
				'a.published'
			);
		}
 
		parent::__construct($config);
	}
 
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
		$this->setState('list.limit', 1000000);
		
 
		$query->select(
			$this->getState(
				'list.select',
				'a.id, a.name, a.alias, a.platform, a.genres, a.status' .
					', a.developer AS developer_name, a.publisher AS publisher_name, a.paymenttype, a.distribution, a.releaseddate, a.pvp, a.fee, a.rating, a.published'
			)
		);
		$query->from('#__game AS a');

		$query->select('c.title AS genres_name')
			->join('LEFT', '#__categories AS c ON c.id = a.genres');

		//$query->select('p.name AS developer_name')
		//	->join('LEFT', '#__game_publisher AS p ON p.id = a.developer');

		//$query->select('p1.name AS publisher_name')
		//	->join('LEFT', '#__game_publisher AS p1 ON p1.id = a.publisher');
 
		// Filter: like / search
		$search = $this->getState('filter.search');
 
		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('name LIKE ' . $like);
		}
 
		// Filter by published state
		$published = $this->getState('filter.published');
 
		if (is_numeric($published))
		{
			$query->where('published = ' . (int) $published);
		}
		if (isset($_POST['customFilters']) && $_POST['customFilters'] == true){
			$this->setPostWhere($query);
		}elseif(isset($_GET['all']) || isset($_GET['paymenttype']) || isset($_GET['status']) || isset($_GET['platform']) || isset($_GET['distribution']) || isset($_GET['genres'])){
			$this->setWhere($query);
		}
		else{
			//$this->setCookieWhere($query);
		}
 
		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering', 'a.name');
		$orderDirn 	= $this->state->get('list.direction', 'asc');
 
		$query->order($db->escape($orderCol) . ' ' . $db->escape($orderDirn));
 
		return $query;
	}

	public function setWhere($query){
		$jinput = JFactory::getApplication()->input;
		$paymenttype    = $jinput->get('paymenttype');
		$status = $jinput->get('status');
		$platform = $jinput->get('platform');
		$distribution = $jinput->get('distribution');
		$genres = $jinput->get('genres');
		if (is_numeric($paymenttype))
		{
			$query->where('paymenttype = ' . (int)$paymenttype);
		}
		if (is_numeric($status))
		{
			$query->where('status = ' . (int)$status);
		}
		if (is_numeric($platform))
		{
			$query->where('platform = ' . (int)$platform);
		}
		if (is_numeric($distribution))
		{
			$query->where('distribution = ' . (int)$distribution);
		}
		if (is_numeric($genres))
		{
			$query->where('genres = ' . (int)$genres);
		}
	}
	
	public function setPostWhere($query){
		if (isset($_POST['rDateStart'])){
			setcookie('rDateStart', $_POST['rDateStart'], time() - 3600);
			if ($_POST['rDateStart'] != ''){
				//setcookie('rDateStart', $_POST['rDateStart']);
				$timeStart = strtotime($_POST['rDateStart']);
				$dateStart = date('Y-m-d H:i:s', $timeStart);
				$query->where("releaseddate > '" . $dateStart . "'");
			}
		}
		if (isset($_POST['rDateEnd'])){
			setcookie('rDateEnd', $_POST['rDateEnd'], time() - 3600);
			if ($_POST['rDateEnd'] != ''){
				//setcookie('rDateEnd', $_POST['rDateEnd']);
				$timeEnd = strtotime($_POST['rDateEnd']);
				$dateEnd = date('Y-m-d H:i:s', $timeEnd);
				$query->where("releaseddate < '" . $dateEnd . "'");
			}
		}
		if (isset($_POST['maxMonthlyFee'])){
			setcookie('maxMonthlyFee', $_POST['maxMonthlyFee'], time() - 3600);
			if (is_numeric($_POST['maxMonthlyFee'])){
				//setcookie('maxMonthlyFee', $_POST['maxMonthlyFee']);
				$mf = $_POST['maxMonthlyFee'];
				$query->where("fee < " . $mf);
			}
		}
		if (isset($_POST['PvP'])){
			setcookie('PvP', $_POST['PvP'], time()-3600);
			
			if($_POST['PvP'] == 1){
				//setcookie('PvP', $_POST['PvP']);
				$query->where('pvp = 1 ');
			}
			elseif($_POST['PvP'] == 0){
				//setcookie('PvP', $_POST['PvP']);
				$query->where('pvp = 0 ');
			}
		}
		if (isset($_POST['sGenresh'])){
			setcookie('sGenresh', $_POST['sGenresh'], time() - 3600);
			$genres = json_decode($_POST['sGenresh']);
			$strwhere = '';
			$c = count($genres);
			if($c > 0){
				foreach ($genres as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sGenresh', $_POST['sGenresh']);
				$query->where('genres in (' . $strwhere . ')');
			}
		}
		if (isset($_POST['sGameStatush'])){
			setcookie('sGameStatush', $_POST['sGameStatush'], time() - 3600);
			$gameStatus = json_decode($_POST['sGameStatush']);
			$strwhere = '';
			$c = count($gameStatus);
			if($c > 0){
				foreach ($gameStatus as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sGameStatush', $_POST['sGameStatush']);
				$query->where('status in (' . $strwhere . ')');
			}
		}
		if (isset($_POST['sDevelopersh'])){
			setcookie('sDevelopersh', $_POST['sDevelopersh'], time() - 3600);
			$developers = json_decode($_POST['sDevelopersh']);
			$strwhere = '';
			$c = count($developers);
			if($c > 0){
				foreach ($developers as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sDevelopersh', $_POST['sDevelopersh']);
				//$query->where('developer in (' . $strwhere . ')');
			}
		}
		if (isset($_POST['sPublishersh'])){
			setcookie('sPublishersh', $_POST['sPublishersh'], time() - 3600);
			$publishers = json_decode($_POST['sPublishersh']);
			$strwhere = '';
			$c = count($publishers);
			if($c > 0){
				foreach ($publishers as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sPublishersh', $_POST['sPublishersh']);
				//$query->where('publisher in (' . $strwhere . ')');
			}
		}
		if (isset($_POST['sPayTypesh'])){
			setcookie('sPayTypesh', $_POST['sPayTypesh'], time() - 3600);
			$payTypes = json_decode($_POST['sPayTypesh']);
			$strwhere = '';
			$c = count($payTypes);
			if($c > 0){
				foreach ($payTypes as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sPayTypesh', $_POST['sPayTypesh']);
				$query->where('paymenttype in (' . $strwhere . ')');
			}
		}
		if (isset($_POST['sDistributionTypesh'])){
			setcookie('sDistributionTypesh', $_POST['sDistributionTypesh'], time() - 3600);
			$distributionTypes = json_decode($_POST['sDistributionTypesh']);
			$strwhere = '';
			$c = count($distributionTypes);
			if($c > 0){
				foreach ($distributionTypes as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//setcookie('sDistributionTypesh', $_POST['sDistributionTypesh']);
				$query->where('distribution in (' . $strwhere . ')');
			}
		}
	}
	
	public function setCookieWhere($query){
		if (isset($_COOKIE['rDateStart'])){
			if ($_COOKIE['rDateStart'] != ''){
				$timeStart = strtotime($_COOKIE['rDateStart']);
				$dateStart = date('Y-m-d H:i:s', $timeStart);
				$query->where("releaseddate > '" . $dateStart . "'");
			}
		}
		if (isset($_COOKIE['rDateEnd'])){
			if ($_COOKIE['rDateEnd'] != ''){
				$timeEnd = strtotime($_COOKIE['rDateEnd']);
				$dateEnd = date('Y-m-d H:i:s', $timeEnd);
				$query->where("releaseddate < '" . $dateEnd . "'");
			}
		}
		if (isset($_COOKIE['maxMonthlyFee'])){
			if (is_numeric($_COOKIE['maxMonthlyFee'])){
				$mf = $_COOKIE['maxMonthlyFee'];
				$query->where("fee < " . $mf);
			}
		}
		if (isset($_COOKIE['PvP'])){		
			if($_COOKIE['PvP'] == 1){
				$query->where('pvp = 1 ');
			}
			elseif($_COOKIE['PvP'] == 0){
				$query->where('pvp = 0 ');
			}
		}
		if (isset($_COOKIE['sGenresh'])){
			$genres = json_decode($_COOKIE['sGenresh']);
			$strwhere = '';
			$c = count($genres);
			if($c > 0){
				foreach ($genres as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				$query->where('genres in (' . $strwhere . ')');
			}
		}
		if (isset($_COOKIE['sGameStatush'])){
			$gameStatus = json_decode($_COOKIE['sGameStatush']);
			$strwhere = '';
			$c = count($gameStatus);
			if($c > 0){
				foreach ($gameStatus as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				$query->where('status in (' . $strwhere . ')');
			}
		}
		if (isset($_COOKIE['sDevelopersh'])){
			$developers = json_decode($_COOKIE['sDevelopersh']);
			$strwhere = '';
			$c = count($developers);
			if($c > 0){
				foreach ($developers as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//$query->where('developer in (' . $strwhere . ')');
			}
		}
		if (isset($_COOKIE['sPublishersh'])){
			$publishers = json_decode($_COOKIE['sPublishersh']);
			$strwhere = '';
			$c = count($publishers);
			if($c > 0){
				foreach ($publishers as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				//$query->where('publisher in (' . $strwhere . ')');
			}
		}
		if (isset($_COOKIE['sPayTypesh'])){
			$payTypes = json_decode($_COOKIE['sPayTypesh']);
			$strwhere = '';
			$c = count($payTypes);
			if($c > 0){
				foreach ($payTypes as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				$query->where('paymenttype in (' . $strwhere . ')');
			}
		}
		if (isset($_COOKIE['sDistributionTypesh'])){
			$distributionTypes = json_decode($_COOKIE['sDistributionTypesh']);
			$strwhere = '';
			$c = count($distributionTypes);
			if($c > 0){
				foreach ($distributionTypes as $key => $g){
					$strwhere .= $g[0] ;
					if ($key+1 < $c){
						$strwhere .= ',';
					}
				}
			}
			if($strwhere != ''){
				$query->where('distribution in (' . $strwhere . ')');
			}
		}
	}
	
	public function getLoadFilters(){
		$loadFilters = false;
		$jinput = JFactory::getApplication()->input;
		$loadFilters = $jinput->get('loadFilters');
		return $loadFilters;
	}
	
	public function  getrDateStart(){
		if (isset($_COOKIE['rDateStart'])){
			return $_COOKIE['rDateStart'];
		}
	}
	public function  getrDateEnd(){
		if (isset($_COOKIE['rDateEnd'])){
			return $_COOKIE['rDateEnd'];
		}
	}
	public function  getmaxMonthlyFee(){
		if (isset($_COOKIE['maxMonthlyFee'])){
			return $_COOKIE['maxMonthlyFee'];
		}
	}
	public function  getPvP(){
		if (isset($_COOKIE['PvP'])){
			return $_COOKIE['PvP'];
		}
		return -1;
	}
	public function  getsGenresh(){
		$newGenres = array();
		if (isset($_COOKIE['sGenresh'])){
			$newGenres = json_decode($_COOKIE['sGenresh']);
		}
		return $newGenres;
	}
	public function  getsGameStatush(){
		$newsGameStatush = array();
		if (isset($_COOKIE['sGameStatush'])){
			$newsGameStatush = json_decode($_COOKIE['sGameStatush']);
		}
		return $newsGameStatush;
	}
	public function  getsDevelopersh(){
		$newsDevelopersh = array();
		if (isset($_COOKIE['sDevelopersh'])){
			$newsDevelopersh = json_decode($_COOKIE['sDevelopersh']);
		}
		return $newsDevelopersh;
	}
	public function  getsPublishersh(){
		$newsPublishersh= array();
		if (isset($_COOKIE['sPublishersh'])){
			$newsPublishersh = json_decode($_COOKIE['sPublishersh']);
		}
		return $newsPublishersh;
	}
	public function  getsPayTypesh(){
		$newsPayTypesh= array();
		if (isset($_COOKIE['sPayTypesh'])){
			$newsPayTypesh = json_decode($_COOKIE['sPayTypesh']);
		}
		return $newsPayTypesh;
	}
	public function  getsDistributionTypesh(){
		$newsDistributionTypesh= array();
		if (isset($_COOKIE['sDistributionTypesh'])){
			$newsDistributionTypesh = json_decode($_COOKIE['sDistributionTypesh']);
		}
		return $newsDistributionTypesh;
	}
}