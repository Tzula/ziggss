<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View class for user's coupons.
 *
 * @since  1.0.0
 */
class CMLiveDealViewCoupons extends JViewLegacy
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
		$this->state	= $this->get('State');
		$this->params	= &$this->state->params;
		$app			= JFactory::getApplication();
		$user			= JFactory::getUser();
		$guestGetCoupon	= (int) $this->params->get('guest_get_coupon', '0');

		if ($user->guest && $guestGetCoupon == 0)
		{
			$returnUrl = base64_encode(JURI::getInstance()->toString());
			$redirectUrl = JRoute::_('index.php?option=com_users&view=login&return=' . $returnUrl, false);
			$app->enqueueMessage(JText::_('COM_CMLIVEDEAL_LOGIN_COUPONS'));
			$app->redirect($redirectUrl);
		}

		$this->justCaptured = false;
		$this->capturedCouponCode = '';

		// This coupon code only exists right after user captures the coupon.
		$couponCode = $app->getUserState('com_cmlivedeal.captured.coupon', '');
		$merchantName = $app->getUserState('com_cmlivedeal.captured.merchant', '');

		if ($couponCode != '')
		{
			if (CMLiveDealHelper::doesUserOwnCoupon($user->id, $couponCode))
			{
				$this->justCaptured = true;
				$this->capturedCoupon = $couponCode;
				$this->capturedMerchant = $merchantName;
			}

			// Remove coupon code and merchant name from session.
			$app->setUserState('com_cmlivedeal.captured.coupon', null);
			$app->setUserState('com_cmlivedeal.captured.merchant', null);
		}
		elseif($couponCode == '' && $user->guest)
		{
			$app->redirect('index.php');
		}

		if (!$user->guest)
		{
			$this->items			= $this->get('Items');
			$this->pagination		= $this->get('Pagination');
		}

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

		$head = JText::_('COM_CMLIVEDEAL_COUPON_LIST');

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
