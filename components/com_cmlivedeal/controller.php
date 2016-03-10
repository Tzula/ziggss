<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * CM Live Deal component controller.
 *
 * @since  1.0.0
 */
class CMLiveDealController extends JControllerLegacy
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   array    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return  JController  This object to support chaining.
	 *
	 * @since   1.0.0
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$app = JFactory::getApplication();
		$filterContext = 'com_cmlivedeal.deals.';
		$cachable = true;
		$user = JFactory::getUser();

		// Set the default view name and format from the Request.
		$id = $this->input->getInt('id');
		$vName = $this->input->get('view', 'deals');
		$this->input->set('view', $vName);
		$dealSlug = $this->input->get('deal', '');

		if ($user->get('id') || ($this->input->getMethod() == 'POST' && $vName = 'deals'))
		{
			$cachable = false;
		}

		$safeurlparams = array(
			'id'				=> 'INT',
			'limit'				=> 'UINT',
			'limitstart'		=> 'UINT',
			'filter_order'		=> 'CMD',
			'filter_order_Dir'	=> 'CMD',
			'lang'				=> 'CMD',
			'deal'				=> 'HTML',
			'keyword'			=> 'STRING',
			'category'			=> 'STRING',
			'city'				=> 'STRING',
		);

		// Check for edit form.
		// Somehow the person just went to the form - we don't allow that.
		if (($vName == 'dealform' && !$this->checkEditId('com_cmlivedeal.edit.dealform', $id))
			|| ($vName == 'customer' && !$this->checkEditId('com_cmlivedeal.edit.customer', $id)))
		{
			return JError::raiseError(403, JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
		}

		// Disable cache for deal detail request.
		if ($vName == 'deals' && !empty($dealSlug))
		{
			$cachable = false;
		}

		// Deal list with filters.
		if ($vName == 'deals')
		{
			// Slashes cause errors, <> get stripped anyway later on. # causes problems.
			$badChars = array('#', '>', '<', '\\');

			$keyword = trim(str_replace($badChars, '', $this->input->getString('keyword', null, 'get')));

			// If keyword enclosed in double quotes, strip quotes.
			if (substr($keyword, 0, 1) == '"' && substr($keyword, -1) == '"')
			{
				$keyword = substr($keyword, 1, -1);
			}
			else
			{
				$keyword = $keyword;
			}

			$categoryAlias = $this->input->getString('category', '', 'get');
			$cityAlias = $this->input->getString('city', '', 'get');

			$app->setUserState($filterContext . 'keyword', $keyword);
			$app->setUserState($filterContext . 'category', $categoryAlias);
			$app->setUserState($filterContext . 'city', $cityAlias);
		}

		// Check for merchant's management pages.
		$pages = array('customer', 'customers', 'dealform', 'dealmanagement');

		if (in_array($vName, $pages) && CMLiveDealHelper::isMerchant() !== true)
		{
			$app->enqueueMessage(JText::_('JERROR_ALERTNOAUTHOR'));
			$app->redirect('index.php');
		}

		return parent::display($cachable, $safeurlparams);
	}

	/**
	 * Search deals.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function search()
	{
		$app = JFactory::getApplication();
		$filterContext = 'com_cmlivedeal.deals.';
		$menu = $app->getMenu();
		$dealListLink = 'index.php?option=com_cmlivedeal&view=deals';

		$post = array(
			'keyword'	=> $this->input->getString('keyword', '', 'post'),
			'category'	=> $this->input->getString('category', '', 'post'),
			'city'		=> $this->input->getString('city', '', 'post'),
			'view'		=> 'deals',
		);

		if ($post['city'] != '*')
		{
			$latitude = '';
			$longitude = '';
		}
		else
		{
			$params = JComponentHelper::getParams('com_cmlivedeal');
			$geolocation = $params->get('geolocation_service', 'html5');

			if ($geolocation == 'html5')
			{
				$latitude = $this->input->getFloat('latitude', 0, 'post');
				$longitude = $this->input->getFloat('longitude', 0, 'post');
			}
			elseif ($geolocation == 'maxmind')
			{
				$latitude = $app->getUserState($filterContext . 'latitude', 0, 'float');
				$longitude = $app->getUserState($filterContext . 'longitude', 0, 'float');

				if ($latitude == 0 && $longitude == 0)
				{
					$coordinate = CMLiveDealHelper::getUserLocation();
					$latitude = $coordinate['latitude'];
					$longitude = $coordinate['longitude'];
				}

				if ($latitude == '')
				{
					$latitude = 0;
				}

				if ($latitude == '')
				{
					$longitude = 0;
				}
			}

			unset($post['city']);
		}

		$app->setUserState($filterContext . 'latitude', $latitude);
		$app->setUserState($filterContext . 'longitude', $longitude);

		$params = JComponentHelper::getParams('com_cmlivedeal');

		$itemId = $this->input->getUInt('Itemid', 0);

		if ($itemId == 0)
		{
			$items = $menu->getItems('link', $dealListLink);

			if (isset($items[0]))
			{
				$itemId = $items[0]->id;
			}
		}
		else
		{
			$item = $menu->getItem($itemId);

			if ($item->link != $dealListLink)
			{
				$items = $menu->getItems('link', $dealListLink);

				if (isset($items[0]))
				{
					$itemId = $items[0]->id;
				}
			}
		}

		$post['Itemid'] = $itemId;

		$uri = JUri::getInstance();
		$uri->setQuery($post);
		$uri->setVar('option', 'com_cmlivedeal');

		$redirectLink = CMLiveDealHelper::prepareRoute('index.php' . $uri->toString(array('query', 'fragment')));

		$this->setRedirect($redirectLink);
	}
}
