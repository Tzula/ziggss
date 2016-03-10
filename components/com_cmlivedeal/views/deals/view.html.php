<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

/**
 * View class for a list of deals.
 *
 * @since  1.0.0
 */
class CMLiveDealViewDeals extends JViewLegacy
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

		$dealModel = JModelLegacy::getInstance('Deal', 'CMLiveDealModel');

		// Used to mark loaded data to speed up the process.
		$this->loadedProfile = array();
		$this->loadedImages = array();
		$this->siteUrl = str_replace(JURI::root(true), '', substr(JURI::root(), 0, -1));

		// Get a specific deal if requested.
		$dealSlug = JFactory::getApplication()->input->get('deal', '', 'html');
		$this->deal = $dealModel->getDeal($dealSlug);
		$this->user = JFactory::getUser();

		if (!empty($this->deal->id))
		{
			$dealModel->increaseImpression($this->deal->id);

			$this->_prepareDeal($this->deal);

			$siteName = JFactory::getConfig()->get('sitename');
			$doc = JFactory::getDocument();
			$doc->addCustomTag('<meta property="og:site_name" content="' . htmlspecialchars($siteName) . '" />');
			$doc->addCustomTag('<meta property="og:url" content="' . htmlspecialchars($this->deal->url) . '" />');
			$doc->addCustomTag('<meta property="og:title" content="' . htmlspecialchars($this->deal->title) . '" />');
			$doc->addCustomTag('<meta property="og:type" content="product" />');
			$doc->addCustomTag('<meta property="og:image" content="' . htmlspecialchars($this->deal->thumbnail) . '" />');
			$doc->addCustomTag('<meta property="og:description" content="' . htmlspecialchars($this->deal->title) . '" />');

			$this->deal->merchant = $this->loadedProfile[$this->deal->user_id];

			if ($this->params->get('deal_detail', 'popup') == 'page')
			{
				$this->_setPath('template', JPATH_SITE . '/components/com_cmlivedeal/views/deal/tmpl');
			}
		}

		if (!empty($this->items))
		{
			foreach ($this->items as &$item)
			{
				// Only increase impression once if requested deal is also in the list.
				if (empty($this->deal->id) || $this->deal->id != $item->id)
				{
					$dealModel->increaseImpression($item->id);
				}

				$this->_prepareDeal($item);
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
	 * @since   1.2.0
	 */
	protected function _prepareDeal(&$item)
	{
		$showPhotos = $this->params->get('display_merchant_photos', 0);
		$item->images = array();
		$item->thumbnail = '';

		// Check if user already got coupon for the deal.
		if ($this->user->guest)
		{
			$item->captured = false;
		}
		else
		{
			$item->captured = CMLiveDealHelper::doesUserHaveCoupon($this->user->id, $item->id);
		}

		// Get all merchant's photos for the slideshow.
		if ($showPhotos)
		{
			if (!isset($this->loadedImages[$item->user_id]))
			{
				$item->images = JModelLegacy::getInstance('Images', 'CMLiveDealModel')->getImages($item->user_id);
				$this->loadedImages[$item->user_id] = $item->images;
			}
			else
			{
				$item->images = $this->loadedImages[$item->user_id];
			}

			// Get the thumbnail image which is displayed in deal list.
			if (!empty($item->images))
			{
				foreach ($item->images as $image)
				{
					if ($image->id == $item->image_id)
					{
						$item->thumbnail = $image->file_path;
					}
				}
			}
		}
		// Only get thumbnail photo.
		else
		{
			$image = JModelLegacy::getInstance('Image', 'CMLiveDealModel')->getImage($item->image_id);

			if (!empty($image->file_path))
			{
				$item->thumbnail = $image->file_path;
			}
		}

		if (!in_array($item->user_id, $this->loadedProfile))
		{
			$item->merchant = new CMLDMerchant($item->user_id);
			$this->loadedProfile[$item->user_id] = $item->merchant;
		}
		else
		{
			$item->merchant = $this->loadedProfile[$item->user_id];
		}

		$item->url_param = 'deal=' . $item->id . '-' . $item->alias;
		$dealUrl = CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deal&' . $item->url_param);
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

		$head = JText::_('COM_CMLIVEDEAL_DEAL_LIST');

		if ($menu)
		{
			$this->params->def('page_heading', $this->params->get('page_title', $menu->title));
		}
		else
		{
			$this->params->def('page_heading', $head);
		}

		$meta = CMLiveDealHelper::getDealListMeta();

		if (isset($this->deal->id))
		{
			$metadesc = $this->deal->metadesc;
		}
		elseif ($meta['metadesc'])
		{
			$metadesc = $meta['metadesc'];
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

		if (isset($this->deal->id))
		{
			$metakey = $this->deal->metakey;
		}
		elseif ($meta['metakey'])
		{
			$metakey = $meta['metakey'];
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

		if (isset($this->deal->id))
		{
			$title = $this->deal->title;
		}
		elseif ($meta['title'])
		{
			$title = $meta['title'];
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

		if ($this->params->get('robots'))
		{
			$this->document->setMetadata('robots', $this->params->get('robots'));
		}

		$defaultUrl = $this->siteUrl . CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=deals');
		$this->document->addScriptDeclaration('var defaultTitle = "' . $title . '"');
		$this->document->addScriptDeclaration('var defaultUrl = "' . $defaultUrl . '"');

		if (isset($this->deal->id))
		{
			$pathway = $app->getPathway();
			$pathway->addItem($this->deal->title, $this->deal->url);
		}
	}
}
