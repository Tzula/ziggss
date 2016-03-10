<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View to edit a coupon.
 *
 * @since  1.0.0
 */
class CMLiveDealViewCoupon extends JViewLegacy
{
	protected $state;

	protected $item;

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
		$this->state	= $this->get('State');
		$this->params	= &$this->state->params;
		$app			= JFactory::getApplication();
		$user			= JFactory::getUser();
		$guestGetCoupon	= (int) $this->params->get('guest_get_coupon', '0');

		if ($user->guest && $guestGetCoupon == 0)
		{
			$returnUrl = base64_encode(JURI::getInstance()->toString());
			$redirectUrl = JRoute::_('index.php?option=com_users&view=login&return=' . $returnUrl, false);
			$app->enqueueMessage(JText::_('COM_CMLIVEDEAL_LOGIN_COUPON'));
			$app->redirect($redirectUrl);

			return false;
		}

		$this->item				= $this->get('Item');
		$this->pageclass_sfx	= htmlspecialchars($this->params->get('pageclass_sfx'));

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}

		if (empty($this->item->id))
		{
			return JError::raiseError(404, JText::_('COM_CMLIVEDEAL_ERROR_COUPON_NOT_FOUND'));
		}
		else
		{
			// Check if deal and merchant still exist.
			// If deal or merchant doesn't exist, we have no data to show, throw 404 error.
			$deal = JModelLegacy::getInstance('Deal', 'CMLiveDealModel')->getItem($this->item->deal_id);
			$merchant = new CMLDMerchant($deal->user_id);

			if (empty($deal->id) || empty($merchant))
			{
				return JError::raiseError(404, JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'));
			}

			$template = JModelLegacy::getInstance('CouponTemplate', 'CMLiveDealModel')->getItem(1);

			$this->template = $template->template;
			$this->item->deal = $deal;
			$this->item->merchant = $merchant;
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

		if (empty($this->item->code))
		{
			$head = JText::_('COM_CMLIVEDEAL_COUPON_DETAIL');
		}
		else
		{
			$head = JText::sprintf('COM_CMLIVEDEAL_COUPON_DETAIL_CODE', $this->item->code);
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
