<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View class for a list of merchant's coupons.
 *
 * @since  1.0.0
 */
class CMLiveDealViewCustomers extends JViewLegacy
{
	protected $items;

	protected $pagination;

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
		$this->state			= $this->get('State');
		$this->items			= $this->get('Items');
		$this->pagination		= $this->get('Pagination');
		$this->params			= &$this->state->params;
		$this->pageclass_sfx	= htmlspecialchars($this->params->get('pageclass_sfx'));

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}

		$this->_prepareDocument();
		parent::display($tpl);
	}

	/**
	 * Prepare document.
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
		// we need to get it from the menu item itself.
		$menu = $menus->getActive();

		$head = JText::_('COM_CMLIVEDEAL_CUSTOMER_LIST');

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
