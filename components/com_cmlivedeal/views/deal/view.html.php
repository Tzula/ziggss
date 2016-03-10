<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View for deal detail.
 *
 * @since  1.6.0
 */
class CMLiveDealViewDeal extends JViewLegacy
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
	 * @since   1.5.0
	 */
	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->params	= &$this->state->params;

		if ($this->params->get('deal_detail', 'popup') != 'page')
		{
			return JError::raiseError(404, JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'));
		}

		$app = JFactory::getApplication();

		if ($app->input->get('alias', '') == '')
		{
			$app->redirect(CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals'));
		}

		$item = $this->get('Item');

		if (!$item->id)
		{
			return JError::raiseError(404, JText::_('COM_CMLIVEDEAL_ERROR_DEAL_NOT_FOUND'));
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}

		JModelLegacy::getInstance('Deal', 'CMLiveDealModel')->increaseImpression($item->id);

		$image = JModelLegacy::getInstance('Image', 'CMLiveDealModel')->getImage($item->image_id);

		if (!empty($image->file_path))
		{
			$item->thumbnail = $image->file_path;
		}
		else
		{
			$item->thumbnail = '';
		}

		// Check if user already got coupon for the deal.
		$user = JFactory::getUser();

		if ($user->guest)
		{
			$item->captured = false;
		}
		else
		{
			$item->captured = CMLiveDealHelper::doesUserHaveCoupon($user->id, $item->id);
		}

		$this->siteUrl = str_replace(JURI::root(true), '', substr(JURI::root(), 0, -1));
		$dealUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deal&deal=' . $item->id . '-' . $item->alias);
		$item->url = $this->siteUrl . $dealUrl;

		$couponLimit = (int) $this->params->get('coupon_limit', 0, 'uint');
		$item->quantity_message = '';

		if ($couponLimit)
		{
			if ($item->coupon_quantity > 0)
			{
				$couponLeft = CMLiveDealHelper::getCouponQuantityLeft($item->id, $item->coupon_quantity);
				$quantityMessage = JText::plural('COM_CMLIVEDEAL_COUPON_LEFT', $couponLeft);

				$item->coupon_left = $couponLeft;
			}
			elseif ($item->coupon_quantity == 0)
			{
				$quantityMessage = JText::_('COM_CMLIVEDEAL_COUPON_UNLIMITED');
			}
			else
			{
				$quantityMessage = '';
			}

			$item->quantity_message = $quantityMessage;
		}

		$item->merchant = new CMLDMerchant($item->user_id);

		$this->deal = $item;

		$this->pageclass_sfx = htmlspecialchars($this->params->get('pageclass_sfx'));

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
		$app = JFactory::getApplication();
		$item = $this->deal;
		$siteName = $app->getCfg('sitename');

		$this->document->setDescription($item->metadesc);
		$this->document->setMetadata('keywords', $item->metakey);

		$title = $item->title;

		if ($app->getCfg('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $siteName, $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2)
		{
			$title = JText::sprintf('JPAGETITLE', $title, $siteName);
		}

		$this->document->setTitle($title);

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}

		$this->document->addCustomTag('<meta property="og:site_name" content="' . htmlspecialchars($siteName) . '" />');
		$this->document->addCustomTag('<meta property="og:url" content="' . htmlspecialchars($item->url) . '" />');
		$this->document->addCustomTag('<meta property="og:title" content="' . htmlspecialchars($item->title) . '" />');
		$this->document->addCustomTag('<meta property="og:type" content="product" />');
		$this->document->addCustomTag('<meta property="og:image" content="' . htmlspecialchars($item->thumbnail) . '" />');
		$this->document->addCustomTag('<meta property="og:description" content="' . htmlspecialchars($item->title) . '" />');

		$pathway = $app->getPathway();
		$pathwayArray = $pathway->getPathway();

		for ($i = 0; $i < count($pathwayArray); $i++)
		{
			if (strpos($pathwayArray[$i]->link, 'index.php?option=com_cmlivedeal&view=deal') !== false)
			{
				unset($pathwayArray[$i]);
			}
		}

		$pathway->setPathway($pathwayArray);

		$menu = $app->getMenu();
		$dealListMenuItem = $menu->getItems('link', 'index.php?option=com_cmlivedeal&view=deals', true);

		if ($dealListMenuItem->id)
		{
			$pathway->addItem($dealListMenuItem->title, $this->siteUrl . CMLiveDealHelper::prepareRoute($dealListMenuItem->link));
		}

		$pathway->addItem($item->title, $item->url);
	}
}
