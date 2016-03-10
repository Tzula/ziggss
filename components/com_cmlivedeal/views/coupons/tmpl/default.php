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

// Add CSS.
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

$guest = JFactory::getUser()->guest ? true : false;

if (!$guest)
{
	$listOrder	= $this->escape($this->state->get('list.ordering'));
	$listDirn	= $this->escape($this->state->get('list.direction'));
}

$guest = JFactory::getUser()->guest ? true : false;

if (!$guest)
{
	$listOrder	= $this->escape($this->state->get('list.ordering'));
	$listDirn	= $this->escape($this->state->get('list.direction'));
}
$user            = JFactory::getUser();

?>
<style>
.well{
	margin-bottom:10px;
}
.well h1{
	text-transform:none;
}
</style>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary profile" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Profile</h3>
			</div>
		</div>
		<div id="" class="panelBody ">

			<div id="sectionHeader"><span>
				
					<h1 class="title">Profile: <?php echo htmlspecialchars($user->username); ?></h1>

					<div class="panes">
						
							<a href="/index.php?option=com_users&view=profile" title="Profile Overview" >Overview</a>
							<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id);?>" title="Profile Options">Options</a>
							<a href="index.php?option=com_users&view=profile&layout=avatar" title="Avatars" >Avatars</a>
							<a href="/index.php?option=com_cmlivedeal&view=coupons" title="Coupons" class="current">Coupons</a>
							<!--<a href="/settings.cfm?subaction=onebigplanet" title="Member Discounts and Offers">Special Discounts / Offers</a>-->
							<!--<a href="/settings.cfm?subaction=games" title="User Game History">Games</a>  -->
							<!--<a href="/settings.cfm?subaction=friends" title="Manage Friends List">Friends List</a>  -->
						
					</div>

				
				<div class="clear"></div>

			</span></div>

			<div class="pmain" style="width:800px;">
				
				<div class="cmlivedeal<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<?php if ($this->justCaptured && $this->capturedCoupon != '') : ?>
	<?php $couponCode = '<a href="' . CMLiveDealHelper::prepareRoute('index.php?option=com_cmlivedeal&view=coupon&code=' . $this->capturedCoupon) . '" target="_blank">' . $this->capturedCoupon . '</a>'; ?>
	<div class="well">
		<h1><?php echo JText::_('COM_CMLIVEDEAL_COUPON_CAPTURED_HEADING'); ?></h1>
		<p><?php echo JText::sprintf('COM_CMLIVEDEAL_COUPON_CAPTURED_CODE', $couponCode); ?></p>
		<p><?php echo JText::sprintf('COM_CMLIVEDEAL_COUPON_CAPTURED_INSTRUCTION', $this->capturedMerchant); ?></p>
	</div>
	<?php endif; ?>

	<?php if (!$guest) : ?>
	<form action="<?php echo JRoute::_('index.php?option=com_cmlivedeal&view=coupons'); ?>" method="post" name="adminForm" id="adminForm">
		<!-- 
		<div id="filter-bar" class="btn-toolbar">
			<div class="filter-search btn-group pull-left">
				<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('COM_CMLIVEDEAL_COUPON_SEARCH'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_CMLIVEDEAL_COUPON_SEARCH'); ?>" />
			</div>
			<div class="btn-group pull-left">
				<button type="submit" class="btn btn-default hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>"><i class="fa fa-search"></i></button>
				<button type="button" class="btn btn-default hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.getElementById('filter_search').value='';this.form.submit();"><i class="fa fa-remove"></i></button>
			</div>
			<div class="btn-group pull-right hidden-phone">
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
		</div>
		 -->

		<div class="clearfix"> </div>

		<?php if (empty($this->items)) : ?>
		<div class="alert alert-no-items">
			<?php echo JText::_('COM_CMLIVEDEAL_COUPON_NO_COUPON'); ?>
		</div>
		<?php else : ?>
		<table class="table table-striped" style="width:100%;text-align:center;">
			<thead>
				<tr style="font-weight: bold;">
					<th>
						<?php echo 'Coupon'; ?>
					</th>
					<th class="center hidden-phone">
						<?php echo 'Captured date'; ?>
					</th>
					<th class="center">
						<?php echo 'Expired date'; ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3">
						<div class="pagination">
							<?php echo $this->pagination->getPagesLinks(); ?>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php $now = strtotime(JFactory::getDate()->toSql()); ?>
			<?php foreach ($this->items as $i => $item) : ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td>
						
						<strong><?php echo $this->escape($item->code); ?></strong>
						
						<div class="hidden-phone"><?php echo $item->deal_name; ?></div>
					</td>
					<td class="center hidden-phone">
						<?php echo JHtml::_('cmlivedeal.date', $item->created); ?>
					</td>
					<td class="center">
						<?php echo JHtml::_('cmlivedeal.date', $item->deal_ending_time); ?>
						<?php echo JHtml::_('cmlivedeal.expiredLabel', $item->deal_ending_time, '<div>', '</div>'); ?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
		<?php endif; ?>

		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
	<?php endif; ?>
</div>
				
				
				
				<div class="clear"></div>

				
	

			</div>
			

			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>














