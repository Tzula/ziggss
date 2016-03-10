<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$layout = $this->params->get('layout', 'bootstrap2');

if ($layout == 'bootstrap2')
{
	JHtml::_('bootstrap.framework');
}

$doc = JFactory::getDocument();

if ($this->params->get('fontawesome', 1))
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/font-awesome.min.css');
}

$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style.css');

if (JFactory::getLanguage()->isRTL())
{
	$doc->addStyleSheet('components/com_cmlivedeal/assets/css/style-rtl.css');
}

$doc->addScript('components/com_cmlivedeal/assets/js/deals.js');

$name		= $this->merchant->get('name');
$about		= $this->merchant->get('about');
$phone		= $this->merchant->get('phone');
$website	= $this->merchant->get('website');
$facebook	= $this->merchant->get('facebook');
$twitter	= $this->merchant->get('twitter');
$pinterest	= $this->merchant->get('pinterest');
$googlePlus	= $this->merchant->get('google_plus');

$couponLimit = $this->params->get('coupon_limit', 0, 'uint');
$thumbnailWidth = $this->params->get('thumbnail_width', 4, 'uint');

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
?>
<div class="cmlivedeal<?php echo $this->pageclass_sfx?>">
	<h2><?php echo $name; ?></h2>

	<?php if ($about != '') : ?>
	<div class="merchant-about"><?php echo $about; ?></div>
	<?php endif; ?>

	<?php if ($this->merchant->get('address') != '') : ?>
	<div><i class="cmld-fa fa fa-map-marker"></i> <?php echo $this->merchant->get('address'); ?></div>
	<?php endif; ?>

	<?php if ($phone != '') : ?>
	<div><i class="cmld-fa fa fa-phone"></i> <?php echo $phone; ?></div>
	<?php endif; ?>

	<?php if ($website != '') : ?>
	<div><i class="cmld-fa fa fa-home"></i> <a href="<?php echo $website; ?>" target="_blank"><?php echo $website; ?></a></div>
	<?php endif; ?>

	<?php if ($facebook != '') : ?>
	<div><i class="cmld-fa fa fa-facebook"></i> <a href="<?php echo $facebook; ?>" target="_blank"><?php echo $facebook; ?></a></div>
	<?php endif; ?>

	<?php if ($twitter != '') : ?>
	<div><i class="cmld-fa fa fa-twitter"></i> <a href="<?php echo $twitter; ?>" target="_blank"><?php echo $twitter; ?></a></div>
	<?php endif; ?>

	<?php if ($pinterest != '') : ?>
	<div><i class="cmld-fa fa fa-pinterest"></i> <a href="<?php echo $pinterest; ?>" target="_blank"><?php echo $pinterest; ?></a></div>
	<?php endif; ?>

	<?php if ($googlePlus != '') : ?>
	<div><i class="cmld-fa fa fa-google-plus"></i> <a href="<?php echo $googlePlus; ?>" target="_blank"><?php echo $googlePlus; ?></a></div>
	<?php endif; ?>

	<h3><?php echo JText::sprintf('COM_CMLIVEDEAL_MERCHANT_MORE_DEALS', $name); ?></h3>
	<?php if (empty($this->deals)) : ?>
		<p><?php echo JText::_('COM_CMLIVEDEAL_MERCHANT_NO_DEALS'); ?></p>
	<?php else : ?>
		<div class="deal-list">
		<?php foreach ($this->deals as $deal) : ?>
			<div class="thumbnail">
				<div class="<?php echo ($layout == 'bootstrap3') ? 'row' : 'row-fluid'; ?>">
					<div class="span4 col-md-4">
						<?php if ($deal->thumbnail != '') : ?>
						<a href="<?php echo $deal->url; ?>" target="_blank">
							<img class="img-responsive" src="<?php echo $deal->thumbnail; ?>">
						</a>
						<?php endif; ?>
					</div>
					<div class="span8 col-md-8">
						<h3 class="deal-name">
							<a href="<?php echo $deal->url; ?>" target="_blank">
								<?php echo $deal->title; ?>
							</a>
						</h3>

						<div><i class="cmld-fa fa fa-clock-o"></i> <?php echo JHtml::_('cmlivedeal.getTimeRemaining', $deal->ending_time); ?></div>

						<?php if ($couponLimit && $deal->quantity_message != '') : ?>
						<div><i class="cmld-fa fa fa-tag"></i> <?php echo $deal->quantity_message; ?></div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>