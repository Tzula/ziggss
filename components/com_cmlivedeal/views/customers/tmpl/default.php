<?php
/**
 * @package    CMLiveDeal
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

$listOrder	= $this->escape($this->state->get('list.ordering'));
$listDirn	= $this->escape($this->state->get('list.direction'));
$db			= JFactory::getDbo();
$nullDate	= $db->getNullDate();
$layout		= $this->params->get('layout', 'bootstrap2');

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


$params = $this->params;
$displayStats = $params->get('display_user_stats', 0);
$displayVisits = $params->get('display_user_visits', 0);

$colspan = 4;

if ($displayStats)
	$colspan++;

if ($displayVisits)
	$colspan++;
?>
<div class="cmlivedeal<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_cmlivedeal&view=customers'); ?>" method="post" name="adminForm" id="adminForm">
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

		<div class="clearfix"> </div>

		<?php if (empty($this->items)) : ?>
		<div class="alert alert-no-items">
			<?php echo JText::_('COM_CMLIVEDEAL_MERCHANT_NO_COUPON'); ?>
		</div>
		<?php else : ?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>
						<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_COUPON', 'a.code', $listDirn, $listOrder); ?>
					</th>
					<?php if ($displayStats) : ?>
					<th class="center">
						<?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_STATS_1') . '<br/>' . JText::_('COM_CMLIVEDEAL_CUSTOMER_STATS_2'); ?>
					</th>
					<?php endif; ?>
					<?php if ($displayVisits) : ?>
					<th class="center">
						<?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_VISITS'); ?>
					</th>
					<?php endif; ?>
					<th class="center hidden-phone">
						<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_COUPON_CAPTURED_DATE', 'a.created', $listDirn, $listOrder); ?>
					</th>
					<th class="center hidden-phone">
						<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_COUPON_EXPIRED_DATE', 'deal_ending_time', $listDirn, $listOrder); ?>
					</th>
					<th class="center hidden-phone">
						<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_COUPON_REDEEMED_DATE', 'a.redeemed_time', $listDirn, $listOrder); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="<?php echo $colspan; ?>">
						<div class="pagination">
							<?php echo $this->pagination->getPagesLinks(); ?>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
			<?php foreach ($this->items as $i => $item) : ?>
				<tr class="row<?php echo $i % 2; ?>">
					<td>
						<a href="<?php echo JRoute::_('index.php?option=com_cmlivedeal&task=customer.edit&code=' . $item->code); ?>">
							<?php echo $this->escape($item->code); ?></a>
						<div class="hidden-phone"><?php echo $item->deal_name; ?></div>
					</td>
					<?php if ($displayStats) : ?>
					<td class="center">
						<?php echo JHtml::_('cmlivedeal.userStats', $item->user_id); ?>
					</td>
					<?php endif; ?>
					<?php if ($displayVisits) : ?>
					<td class="center">
						<?php echo JHTML::_('cmlivedeal.userVisits', $item->user_id, JFactory::getUser()->id); ?>
					</td>
					<?php endif; ?>
					<td class="center hidden-phone">
						<?php echo JHtml::_('cmlivedeal.date', $item->created); ?>
					</td>
					<td class="center hidden-phone">
						<?php echo JHtml::_('cmlivedeal.date', $item->deal_ending_time); ?>
						<?php echo JHtml::_('cmlivedeal.expiredLabel', $item->deal_ending_time, '<div>', '</div>'); ?>
					</td>
					<td class="center hidden-phone">
						<?php
						if ($item->redeemed_time != $nullDate)
							echo JHtml::_('cmlivedeal.date', $item->redeemed_time);
						?>
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

		<?php if ($displayStats || $displayVisits) : ?>
		<div class="well">
			<?php if ($displayStats) : ?>
			<p class="customer-instruction-heading"><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_1'); ?></p>
			<ul>
				<li><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_2'); ?></li>
				<li><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_3'); ?></li>
			</ul>
			<p><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_4'); ?></p>
			<?php endif; ?>

			<?php if ($displayVisits) : ?>
			<p class="customer-instruction-heading"><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_5'); ?></p>
			<p><?php echo JText::_('COM_CMLIVEDEAL_CUSTOMER_INSTRUCTION_6'); ?></p>
			<?php endif; ?>
		</div>
		<?php endif; ?>
		<?php endif; ?>

		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
