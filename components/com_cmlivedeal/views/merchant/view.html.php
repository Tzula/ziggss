<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View for merchant detail.
 *
 * @since  1.5.0
 */
class CMLiveDealViewMerchant extends JViewLegacy
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
		$this->params = JFactory::getApplication()->getParams();

		if (!$this->params->get('merchant_detail'))
		{
			return JError::raiseError(404, JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'));
		}

		$app = JFactory::getApplication();

		if ($app->input->get('merchant', '') == '')
		{
			$app->redirect(CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals'));
		}

		$this->merchant_id		= JModelLegacy::getInstance('Merchant', 'CMLiveDealModel')->getMerchantIdByUsername();
		$this->pageclass_sfx	= htmlspecialchars($this->params->get('pageclass_sfx'));
		$this->pageUrl			= str_replace(JURI::root(true), '', substr(JURI::root(), 0, -1));

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode("\n", $errors));

			return false;
		}

		if (empty($this->merchant_id))
		{
			return JError::raiseError(404, JText::_('COM_CMLIVEDEAL_ERROR_MERCHANT_NOT_FOUND'));
		}
		else
		{
			$this->merchant = new CMLDMerchant($this->merchant_id);
			$this->deals = JModelLegacy::getInstance('Deals', 'CMLiveDealModel')->getDealsOfMerchant($this->merchant_id);

			if (!empty($this->deals))
			{
				$dealModel = JModelLegacy::getInstance('Deal', 'CMLiveDealModel');

				foreach ($this->deals as &$item)
				{
					$dealModel->increaseImpression($item->id);

					$this->_prepareDeal($item);
				}
			}
		}

		$this->_prepareDocument();
		parent::display($tpl);
	}

	/**
	 * Prepare deal.
	 *
	 * @param   object  &$item  The deal object.
	 *
	 * @return  void
	 *
	 * @since   1.5.0
	 */
	protected function _prepareDeal(&$item)
	{
		$image = JModelLegacy::getInstance('Image', 'CMLiveDealModel')->getImage($item->image_id);

		if (!empty($image->file_path))
		{
			$item->thumbnail = $image->file_path;
		}
		else
		{
			$item->thumbnail = '';
		}

		$item->url_param = 'deal=' . $item->id . '-' . $item->alias;
		$dealUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals&' . $item->url_param);
		$item->url = $this->pageUrl . $dealUrl;

		$couponLimit = (int) $this->params->get('coupon_limit', 0, 'uint');

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
	}

	/**
	 * Prepare document.
	 *
	 * @return  void
	 *
	 * @since   1.5.0
	 */
	protected function _prepareDocument()
	{
		$app	= JFactory::getApplication();
		$menus	= $app->getMenu();

		// Because the application sets a default page title,
		// we need to get it from the menu item itself.
		$menu = $menus->getActive();

		$merchantName = $this->merchant->get('name');

		if (!empty($merchantName))
		{
			$title = $merchantName;
		}
		else
		{
			$title = $this->params->def('page_title', $head);
		}

		if ($app->getCfg('sitename_pagetitles', 0) == 1)
		{
			$title = JText::sprintf('JPAGETITLE', $app->getCfg('sitename'), $title);
		}
		elseif ($app->getCfg('sitename_pagetitles', 0) == 2)
		{
			$title = JText::sprintf('JPAGETITLE', $title, $app->getCfg('sitename'));
		}

		$this->document->setTitle($title);

		$merchantMetadesc = $this->merchant->get('metadesc');

		if (!empty($merchantMetadesc))
		{
			$metadesc = $merchantMetadesc;
		}
		elseif ($this->params->get('menu-meta_description'))
		{
			$metadesc = $this->params->get('menu-meta_description');
		}
		else
		{
			$metadesc = '';
		}

		$this->document->setDescription($metadesc);

		$merchantMetakey = $this->merchant->get('metakey');

		if (!empty($merchantMetakey))
		{
			$metakey = $merchantMetakey;
		}
		elseif ($this->params->get('menu-meta_keywords'))
		{
			$metakey = $this->params->get('menu-meta_keywords');
		}
		else
		{
			$metakey = '';
		}

		$this->document->setMetadata('keywords', $metakey);

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}
	}
}
