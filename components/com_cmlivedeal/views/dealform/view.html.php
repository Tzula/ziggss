<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View for submitting new deal.
 *
 * @since  1.0.0
 */
class CMLiveDealViewDealForm extends JViewLegacy
{
	protected $form;

	protected $item;

	protected $state;

	/**
	 * Display the view.
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise a Error object.
	 *
	 * @since   1.0.0
	 */
	public function display($tpl = null)
	{
		$user = JFactory::getUser();

		// Get model data.
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		// Create a shortcut to the parameters.
		$params = &$this->state->params;

		if (empty($this->item->id))
		{
			$authorised = $user->authorise('core.create', 'com_cmlivedeal');
		}
		else
		{
			$authorised = $user->authorise('core.edit.own', 'com_cmlivedeal');
		}

		if ($authorised !== true)
		{
			JError::raiseError(403, JText::_('JERROR_ALERTNOAUTHOR'));

			return false;
		}

		$integration = $params->get('membership_integration', '');

		if ($integration != '')
		{
			$allowed = true;
			$limit = CMLiveDealHelper::getMerchantLimit($user->id, $integration);
			$current = CMLiveDealHelper::getMerchantDealQuantity($user->id);

			if ($limit != -1 && $current >= $limit && $this->item->id == 0)
			{
				$allowed = false;
			}

			if (!$allowed)
			{
				$redirectUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=dealmanagement');
				JFactory::getApplication()->redirect($redirectUrl);

				return false;
			}
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseWarning(500, implode("\n", $errors));

			return false;
		}

		// Escape strings for HTML output.
		$this->pageclass_sfx = htmlspecialchars($params->get('pageclass_sfx'));

		$this->params	= $params;
		$this->user		= $user;

		$this->_prepareDocument();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();

		// Because the application sets a default page title,
		// we need to get it from the menu item itself
		$menu = $menus->getActive();

		if (empty($this->item->id))
		{
			$head = JText::_('COM_CMLIVEDEAL_FORM_SUBMIT_DEAL');
		}
		else
		{
			$head = JText::_('COM_CMLIVEDEAL_FORM_EDIT_DEAL');
		}

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', $head);
		}

		$title = $this->params->def('page_title', $head);

		if ($app->getCfg('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2)
		{
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}

		$this->document->setTitle($title);

		if ($this->params->get('menu-meta_description'))
		{
			$this->document->setDescription($this->params->get('menu-meta_description'));
		}

		if ($this->params->get('menu-meta_keywords'))
		{
			$this->document->setMetadata('keywords', $this->params->get('menu-meta_keywords'));
		}

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
}
