<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$item			= $this->deal;
$params			= $this->params;
$zoomLevel		= $params->get('map_zoom', 15, 'uint');
$layout			= $params->get('layout', 'bootstrap2');
$couponLimit	= $params->get('coupon_limit', 0, 'uint');
$discountValues	= $params->get('discount_values', 0, 'uint');
$merchantDetail	= $params->get('merchant_detail', 0);

if ($item->thumbnail != '')
{
	$thumbnailWidth = $params->get('thumbnail_width', 4, 'uint');

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
	$spanLeft = 0;
	$spanRight = 12;
}

$now = JFactory::getDate()->toSql();
$active = (strtotime($item->ending_time) >= strtotime($now)) ? true : false;

$dealUrl = urlencode($item->url);
$imageUrl = urlencode($item->thumbnail);
$description = urlencode($item->title);

$merchantName		= $item->merchant->get('name');
$merchantAbout		= $item->merchant->get('about');
$merchantAddress	= $item->merchant->get('address');
$merchantPhone		= $item->merchant->get('phone');
$merchantWebsite	= $item->merchant->get('website');
$merchantFacebook	= $item->merchant->get('facebook');
$merchantTwitter	= $item->merchant->get('twitter');
$merchantPinterest	= $item->merchant->get('pinterest');
$merchantGooglePlus	= $item->merchant->get('google_plus');

if ($layout == 'bootstrap2')
{
	JHtml::_('bootstrap.framework');
}

$doc = JFactory::getDocument();
$doc->addScriptDeclaration('var siteUrl = "' . rtrim(JURI::root(), '/') . '";');
$doc->addScriptDeclaration('var zoomLevel = ' . $zoomLevel . ';');
$doc->addScriptDeclaration('var token = "' . JSession::getFormToken() . '";');
$doc->addScript('//maps.googleapis.com/maps/api/js?sensor=false');

if ($params->get('fontawesome', 1))
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/font-awesome.min.css');
}

$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style.css');

if (JFactory::getLanguage()->isRTL())
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style-rtl.css');
}

$lat = $item->merchant->get('latitude');
$lng = $item->merchant->get('longitude');

$js = <<<JS
jQuery(document).ready(function() {
		lat = {$lat};
		lng = {$lng};

		latlng = new google.maps.LatLng(lat, lng);

		mapOptions = {
			zoom: zoomLevel,
			center: latlng
		};

		map = new google.maps.Map(
			document.getElementById('mapCanvas'),
			mapOptions
		);

		marker = new google.maps.Marker({
			position: latlng,
			map: map,
		});
});

//function getCoupon(dealId) {
//	window.location = siteUrl + '/index.php?option=com_cmlivedeal&task=coupon.capture&deal_id=' + dealId;
//}

//function getCoupon1(dealId) {
//	window.location = siteUrl + '/index.php?option=com_cmlivedeal&task=coupon.capture&deal_id=' + dealId;
//}
JS;

$doc->addScriptDeclaration($js);
?>
<script>
function getCoupon1(dealId) {
	window.location = '/index.php?option=com_cmlivedeal&task=coupon.capture&deal_id=' + dealId;
}
</script>

<div class="cmlivedeal<?php echo $this->pageclass_sfx?>">
	<div class="deal-detail">
		<h1><?php echo $item->title; ?></h1>

		<div class="<?php echo ($layout == 'bootstrap3') ? 'row' : 'row-fluid'; ?>">
			<?php if ($item->thumbnail != '') : ?>
			<div class="span<?php echo $spanLeft; ?> col-md-<?php echo $spanLeft; ?>" style="text-align: center;">
				<img class="img-responsive" src="<?php echo $item->thumbnail; ?>">
			</div>
			<?php endif; ?>

			<div class="span<?php echo $spanRight; ?> col-md-<?php echo $spanRight; ?>">
				<div class="get-button" style="margin-top:10px;">
				<?php
				if ($item->user_id != JFactory::getUser()->id && !$item->captured && $active)
				{
					if (!$couponLimit || ($couponLimit && $item->coupon_quantity == 0) || ($couponLimit && $item->coupon_quantity > 0 && $item->coupon_left > 0))
					{
				?>
						<button class="btn btn-large btn-lg btn-primary capture-button" onclick="getCoupon1(<?php echo $item->id; ?>);"><?php echo JText::_('COM_CMLIVEDEAL_DEAL_GET_BUTTON'); ?></button>
				<?php
					}
					elseif ($couponLimit && $item->coupon_quantity > 0 && $item->coupon_left <= 0)
					{
					?>
						<button class="btn btn-large btn-lg btn-primary disabled"><?php echo JText::_('COM_CMLIVEDEAL_NO_COUPON_LEFT'); ?></button>
					<?php
					}
				}
				elseif ($item->user_id != JFactory::getUser()->id && $item->captured && $active)
				{
				?>
						<button class="btn btn-large btn-lg btn-primary capture-button disabled"><?php echo JText::_('COM_CMLIVEDEAL_DEAL_GET_BUTTON_DISABLED'); ?></button>
				<?php
				}
				elseif ($item->user_id != JFactory::getUser()->id && !$active)
				{
				?>
						<button class="btn btn-large btn-lg btn-primary disabled"><?php echo JText::_('COM_CMLIVEDEAL_EXPIRED'); ?></button>
				<?php
				}
				?>
				</div>

				<?php if ($discountValues && $item->discount_info == 'prices' && $item->discounted_price > 0 && $item->original_price > $item->discounted_price) : ?>
				<div>
					<i class="cmld-fa fa fa-shopping-cart"></i> 
					<?php echo JText::sprintf('COM_CMLIVEDEAL_VALUE_ORIGINAL_PRICE',
						'<span class="original-price">' . JHtml::_('cmlivedeal.formatPrice',
							$item->original_price, $this->params) . '</span>'); ?> - 
					<?php echo JText::sprintf('COM_CMLIVEDEAL_VALUE_DISCOUNTED_PRICE',
						'<span class="discounted-price">' . JHtml::_('cmlivedeal.formatPrice',
							$item->discounted_price, $this->params) . '</span>'); ?> - 
					<?php echo JText::sprintf('COM_CMLIVEDEAL_VALUE_DISCOUNTED_VALUE',
						'<span class="discounted-value">' . JHtml::_('cmlivedeal.formatPrice',
							$item->original_price -  $item->discounted_price, $this->params) . '</span>'); ?>
				</div>
				<?php endif; ?>

				<div><i class="cmld-fa fa fa-clock-o"></i> <?php echo JHtml::_('cmlivedeal.getTimeRemaining', $item->ending_time); ?></div>

				<?php if ($item->quantity_message != '') : ?>
				<div><i class="cmld-fa fa fa-tag"></i> <?php echo $item->quantity_message; ?></div>
				<?php endif; ?>
				
				<!--  
				<div class="share">
					<?php echo JText::_('COM_CMLIVEDEAL_SHARE_INSTRUCTION_2'); ?>
					<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $dealUrl; ?>" target="_blank" class="btn btn-default <?php echo ($layout == 'bootstrap3') ? 'btn-share-3' : 'btn-share-2'; ?>" title="<?php echo htmlspecialchars(JText::_('COM_CMLIVEDEAL_SHARE_FACEBOOK')); ?>"><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/share?url=<?php echo $dealUrl; ?>&text=<?php echo $description; ?>" target="_blank" class="btn btn-default <?php echo ($layout == 'bootstrap3') ? 'btn-share-3' : 'btn-share-2'; ?>" title="<?php echo htmlspecialchars(JText::_('COM_CMLIVEDEAL_SHARE_TWITTER')); ?>"><i class="fa fa-twitter"></i></a>
					<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $dealUrl; ?>&media=<?php echo $imageUrl; ?>&description=<?php echo $description; ?>" target="_blank" class="btn btn-default <?php echo ($layout == 'bootstrap3') ? 'btn-share-3' : 'btn-share-2'; ?>" title="<?php echo htmlspecialchars(JText::_('COM_CMLIVEDEAL_SHARE_PINTEREST')); ?>"><i class="fa fa-pinterest"></i></a>
					<a href="https://plus.google.com/share?url=<?php echo $dealUrl; ?>" target="_blank" class="btn btn-default <?php echo ($layout == 'bootstrap3') ? 'btn-share-3' : 'btn-share-2'; ?>" title="<?php echo htmlspecialchars(JText::_('COM_CMLIVEDEAL_SHARE_GOOGLE_PLUS')); ?>"><i class="fa fa-google-plus"></i></a>
				</div>
				-->
			</div>
		</div>
		<br/>
		<div class="<?php echo ($layout == 'bootstrap3') ? 'row' : 'row-fluid'; ?>">
			<?php if ($item->description != '') : ?>
			<!-- <h4><?php echo JText::_('COM_CMLIVEDEAL_DEAL_DESCRIPTION'); ?></h4>-->
			<?php echo $item->description; ?>
			<?php endif; ?>

			<?php if ($item->fine_print != '') : ?>
			<!-- <h4><?php echo JText::_('COM_CMLIVEDEAL_DEAL_FINE_PRINT'); ?></h4>
			<?php echo $item->fine_print; ?>-->
			<?php endif; ?>

			<!-- <h4><?php echo $merchantName; ?></h4> -->

			<?php if ($merchantAbout != '') : ?>
			<!-- <div class="merchant-about"><?php echo $merchantAbout; ?></div>-->
			<?php endif; ?>
		</div>

		<div class="<?php echo ($layout == 'bootstrap3') ? 'row' : 'row-fluid'; ?>">
			<div class="span6 col-md-6">
				<!-- <div id="mapCanvas" class="merchant-map"></div>-->
			</div>

			<div class="span6 com-md-6">
				<?php if ($merchantAddress != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-map-marker"></i> <?php echo $merchantAddress; ?></div>-->
				<?php endif; ?>

				<?php if ($merchantPhone != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-phone"></i> <?php echo $merchantPhone; ?></div>-->
				<?php endif; ?>

				<?php if ($merchantWebsite != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-home"></i> <a href="<?php echo $merchantWebsite; ?>" target="_blank"><?php echo $merchantWebsite; ?></a></div>-->
				<?php endif; ?>

				<?php if ($merchantFacebook != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-facebook"></i> <a href="<?php echo $merchantFacebook; ?>" target="_blank"><?php echo $merchantFacebook; ?></a></div>-->
				<?php endif; ?>

				<?php if ($merchantTwitter != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-twitter"></i> <a href="<?php echo $merchantTwitter; ?>" target="_blank"><?php echo $merchantTwitter; ?></a></div>-->
				<?php endif; ?>

				<?php if ($merchantPinterest != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-pinterest"></i> <a href="<?php echo $merchantPinterest; ?>" target="_blank"><?php echo $merchantPinterest; ?></a></div>-->
				<?php endif; ?>

				<?php if ($merchantGooglePlus != '') : ?>
				<!-- <div><i class="cmld-fa fa fa-google-plus"></i> <a href="<?php echo $merchantGooglePlus; ?>" target="_blank"><?php echo $merchantGooglePlus; ?></a></div>-->
				<?php endif; ?>
			</div>
		</div>

		<?php if ($merchantDetail) : ?>
		<!-- <div class="merchant-view-more">
			<a href="<?php echo CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=merchant&merchant=' . $item->merchant->get('username')); ?>"><?php echo JText::sprintf('COM_CMLIVEDEAL_MERCHANT_DEAL_LIST_MORE_DEALS', $merchantName); ?></a>
		</div>-->
		<?php endif; ?>
	</div>
</div>
