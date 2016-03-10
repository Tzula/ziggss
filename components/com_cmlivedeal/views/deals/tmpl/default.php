<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$doc				= JFactory::getDocument();
$params				= $this->params;
$zoomLevel			= $params->get('map_zoom', 15, 'uint');
$layout				= $params->get('layout', 'bootstrap2');
$showSortOption		= $params->get('show_pagination_sort', 0);
$showLimitOption	= $params->get('show_pagination_limit', 0);
$listOrder			= $this->escape($this->state->get('list.ordering'));
$listDirn			= $this->escape($this->state->get('list.direction'));
$listSort			= $this->escape($this->state->get('sort'));
$numOfColumns		= $params->get('deal_list_column', 1);
$showPhotos			= $params->get('display_merchant_photos', 0);
$merchantDetail		= $params->get('merchant_detail', 0);
$couponLimit		= $params->get('coupon_limit', 0, 'uint');
$discountValues		= $params->get('discount_values', 0, 'uint');
$showPriceTag		= $params->get('show_price_tag', 0, 'uint');
$showPrices			= $params->get('show_prices', 0, 'uint');
$thumbnailWidth		= $params->get('thumbnail_width', 4, 'uint');
$dealDetail			= $params->get('deal_detail', 'popup');

JHtml::_('jquery.framework');
$doc->addScriptDeclaration('var siteUrl = "' . rtrim(JURI::root(), '/') . '";');
$doc->addScriptDeclaration('var zoomLevel = ' . $zoomLevel . ';');
$doc->addScriptDeclaration('var token = "' . JSession::getFormToken() . '";');
$doc->addScript('//maps.googleapis.com/maps/api/js?sensor=false');
$doc->addScript('components/com_cmlivedeal/assets/js/jquery.history.js');
$doc->addScript('components/com_cmlivedeal/assets/js/deals.js');

if ($this->params->get('fontawesome', 1))
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/font-awesome.min.css');
}

$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style.css');

if (JFactory::getLanguage()->isRTL())
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style-rtl.css');
}

if ($layout == 'bootstrap2')
{
	JHtml::_('bootstrap.framework');
	$doc->addScript('components/com_cmlivedeal/assets/js/bootstrap-modalmanager.js');
	$doc->addScript('components/com_cmlivedeal/assets/js/bootstrap-modal.js');
}

$pageUrl = 'index.php?option=com_cmlivedeal&view=deals';
$itemId = JFactory::getApplication()->input->get('Itemid', 0, 'uint');

if ($itemId > 0)
{
	$pageUrl .= '&Itemid=' . $itemId;
}

$pageUrl = JRoute::_($pageUrl);

if ($showSortOption)
{
	$sortOptions = array(
		JHtml::_('select.option', 'newest', JText::_('COM_CMLIVEDEAL_DEALS_SORT_NEW')),
		JHtml::_('select.option', 'ending_soon', JText::_('COM_CMLIVEDEAL_DEALS_SORT_ENDING_SOON')),
	);
}

$spanDeal = 12 / (int) $numOfColumns;

if ($spanDeal == 12)
{
	if ($thumbnailWidth == 6)
	{
		$spanLeft = 6;
		$spanRight = 6;
	}
	elseif ($thumbnailWidth == 5)
	{
		$spanLeft = 5;
		$spanRight = 7;
	}
	else
	{
		$spanLeft = 4;
		$spanRight = 8;
	}
}
else
{
	$spanLeft = 12;
	$spanRight = 12;
}
?>
<?php if ($layout == 'bootstrap2') : ?>
<link rel="stylesheet" href="components/com_cmlivedeal/assets/css/bootstrap-modal.css" type="text/css" />
<?php endif; ?>



<div id="features" class="feetures">
			<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Giveaways</h3>
			</div>
		</div>
		<div id="" class="panelBody "> 
		
		<div id="sectionHeader">
			<span>
				<h1>Giveaways</h1>
			</span>
		</div>
		<div class="list">
			<?php if (empty($this->items)) : ?>
				<div class="alert alert-no-items">
					<?php echo JText::_('COM_CMLIVEDEAL_DEAL_NO_DEAL'); ?>
				</div>
			<?php else : ?>
				<?php
					foreach ($this->items as $item) :
				?>
					<div class="entry">
						<h1><a href="<?php echo $item->url; ?>" class="title"><?php echo $item->title;?></a></h1>
						<!-- <h2><a href="#">Warframe</a> - Game Keys</h2> -->
						<p class="body">
							<?php echo substr(strip_tags($item->description), 0, 500) . '...'; ?>
						</p>
					</div>
				<?php endforeach; ?>
			
			<?php endif; ?>		
		</div>
		
			<?php echo $this->pagination->getListFooter(); ?>
		
	
	<div class="clear"></div>
	</div></div></div></div></div>
</div></div></div>
</div>

		</div>





































