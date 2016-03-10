<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * Controller for coupon.
 *
 * @since  1.0.0
 */
class CMLiveDealControllerCoupon extends JControllerLegacy
{
	/**
	 * Get coupon.
	 *
	 * @return  boolean
	 *
	 * @since   1.0.0
	 */
	public function capture()
	{
		$app = JFactory::getApplication();
		$jinput = $app->input;
		$params = JComponentHelper::getParams('com_cmlivedeal');
		$dealListUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals');

		$user = JFactory::getUser();

		$guestGetCoupon = (int) $params->get('guest_get_coupon', '0');

		if ($user->guest && $guestGetCoupon == 0)
		{
			$returnUrl = base64_encode(JURI::getInstance()->toString());
			$redirectUrl = JRoute::_('index.php?option=com_users&view=login&return=' . $returnUrl, false);
			$this->setMessage(JText::_('COM_CMLIVEDEAL_LOGIN_GET_COUPON'));
			$this->setRedirect($redirectUrl);

			return false;
		}

		$dealId = $jinput->get('deal_id', 0, 'uint');

		// Get deal and check if it exists.
		$deal = JModelLegacy::getInstance('Deal', 'CMLiveDealModel')->getDeal($dealId);

		if (!isset($deal->id))
		{
			$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'), 'error');
			$this->setRedirect($dealListUrl);

			return false;
		}

		// Make sure the deal is published and approved.
		if ($deal->published == 0 || $deal->approved == 0)
		{
			$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'), 'error');
			$this->setRedirect($dealListUrl);

			return false;
		}

		// Make sure the deal is active.
		$now = JFactory::getDate()->toSql();
		$active = (strtotime($deal->ending_time) >= strtotime($now)) ? true : false;

		if (!$active)
		{
			$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'), 'error');
			$this->setRedirect($dealListUrl);

			return false;
		}

		// Current user owns the deal.
		if (!$user->guest && $deal->user_id == $user->id)
		{
			$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_NOT_CAPTURE_OWN'), 'error');
			$this->setRedirect($dealListUrl);

			return false;
		}

		// Check if user has already got a coupon for this deal.
		$captured = CMLiveDealHelper::doesUserHaveCoupon($user->id, $deal->id);

		if (!$user->guest && $captured)
		{
			$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_COUPON_ALREADY_GOT'), 'error');
			$this->setRedirect($dealListUrl);

			return false;
		}

		// Check if there is any coupon left to get (coupon quantity limit is enabled).
		$couponLimit = (int) $params->get('coupon_limit', 0, 'uint');

		if ($couponLimit && $deal->coupon_quantity > 0)
		{
			$couponLeft = CMLiveDealHelper::getCouponQuantityLeft($deal->id, $deal->coupon_quantity);

			if ($couponLeft <= 0)
			{
				$this->setMessage(JText::_('COM_CMLIVEDEAL_ERROR_COUPON_OUT_OF_STOCK'), 'error');
				$this->setRedirect($dealListUrl);

				return false;
			}
		}

		$couponCode = JModelLegacy::getInstance('Coupon', 'CMLiveDealModel')->getCoupon($user->id, $deal->id);

		if ($couponCode !== false)
		{
			// Set coupon code and merchant name to session to retrieve in view.
			$merchant = new CMLDMerchant($deal->user_id);
			$app->setUserState('com_cmlivedeal.captured.coupon', $couponCode);
			$app->setUserState('com_cmlivedeal.captured.merchant', $merchant->get('name'));

			$emailNotification = (int) $params->get('merchant_coupon_notification', 0, 'uint');

			if ($emailNotification == 1)
			{
				$emailSubject = JText::sprintf(
					'COM_CMLIVEDEAL_NEW_MERCHANT_COUPON_SUBJECT',
					$deal->title,
					$app->get('sitename')
				);

				$emailBody = JText::sprintf(
					'COM_CMLIVEDEAL_NEW_MERCHANT_COUPON_EMAIL_BODY',
					$merchant->get('name'),
					$deal->title,
					$app->get('sitename'),
					$couponCode
				);

				$mail = JFactory::getMailer()
					->setSender(
						array(
							$app->get('mailfrom'),
							$app->get('fromname')
						)
					)
					->addRecipient(JFactory::getUser($deal->user_id)->get('email'))
					->setSubject($emailSubject)
					->setBody($emailBody);

				$mail->Send();
			}

			$redirectUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=coupons');
			$this->setRedirect($redirectUrl);

			return true;
		}
		else
		{
			$this->setRedirect(JRoute::_('index.php'));

			return false;
		}
	}
}
