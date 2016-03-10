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

$user			= JFactory::getUser();
$canCreate		= $user->authorise('core.create', 'com_cmlivedeal');
$canCheckin		= false;
$canChange		= $user->authorise('core.edit.own', 'com_cmlivedeal') && $canCheckin;
$listOrder		= $this->escape($this->state->get('list.ordering'));
$listDirn		= $this->escape($this->state->get('list.direction'));
$integration	= $this->params->get('membership_integration', '');

if ($integration != '')
{
	$limit = CMLiveDealHelper::getMerchantLimit($user->id, $integration);
	$current = CMLiveDealHelper::getMerchantDealQuantity($user->id);
}
?>
<div class="cmlivedeal<?php echo $this->pageclass_sfx?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
		<h1><?php echo $this->escape($this->params->get('page_heading')); ?></h1>
	<?php endif; ?>

	<?php if ($integration != '' && $limit != -1) : ?>
	<div class="alert alert-info">
		<?php
		if ($current < $limit)
		{
			echo JText::sprintf('COM_CMLIVEDEAL_DEAL_MERCHANT_LIMIT', $current, $limit);
		}
		else
		{
			$upgradeForm = $this->params->get('membership_form', 0);

			if ($upgradeForm > 0)
			{
				$upgrade = '<a href="' . JRoute::_('index.php?Itemid=' . $upgradeForm) . '">' . JText::_('COM_CMLIVEDEAL_UPGRADE') . '</a>';
			}
			else
			{
				$upgrade = JText::_('COM_CMLIVEDEAL_UPGRADE');
			}

			echo JText::sprintf('COM_CMLIVEDEAL_DEAL_MERCHANT_LIMIT_REACHED', $current, $limit, $upgrade);
		}
		?>
	</div>
	<?php endif; ?>

	<?php if ($integration == '' || ($integration != '' && $limit == -1) || ($integration != '' && $current < $limit)) : ?>
	<div class="btn-toolbar">
		<a href="<?php echo JRoute::_('index.php?option=com_cmlivedeal&task=dealform.add', false); ?>" class="btn btn-primary">
			<?php echo JText::_('COM_CMLIVEDEAL_NEW_DEAL'); ?>
		</a>
	</div>
	<?php endif; ?>

	<form action="<?php echo htmlspecialchars(JUri::getInstance()->toString()); ?>" method="post" name="adminForm" id="adminForm">
		<div class="btn-group pull-right hidden-phone">
			<?php echo $this->pagination->getLimitBox(); ?>
		</div>

		<div class="clearfix"> </div>

		<?php if (empty($this->items)) : ?>
		<div class="alert alert-no-items">
			<?php echo JText::_('COM_CMLIVEDEAL_MERCHANT_NO_DEAL'); ?>
		</div>
		<?php else : ?>

		<table class="table table-striped">
			<thead>
				<th>
					<?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th class="center hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_DEAL_FIELD_IMPRESSIONS_LABEL', 'a.impressions', $listDirn, $listOrder); ?>
				</th>
				<th class="center hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_DEAL_FIELD_CLICKS_LABEL', 'a.clicks', $listDirn, $listOrder); ?>
				</th>
				<th class="center">
					<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_CAPTURED', 'captured', $listDirn, $listOrder); ?>
				</th>
				<th class="center">
					<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_REDEEMED', 'redeemed', $listDirn, $listOrder); ?>
				</th>
				<th class="center">
					<?php echo JText::_('COM_CMLIVEDEAL_APPROVED'); ?>
				</th>
				<th class="center">
					<?php echo JText::_('COM_CMLIVEDEAL_PUBLISHED'); ?>
				</th>
				<th class="center hidden-phone">
					<?php echo JHtml::_('grid.sort', 'COM_CMLIVEDEAL_DEAL_FIELD_ENDING_TIME_LABEL', 'ending_time', $listDirn, $listOrder); ?>
				</th>
			</thead>
			<tfoot>
				<tr>
					<td colspan="8">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<?php foreach ($this->items as $i => $item) : ?>
			<?php
			$checkedOut	= ($item->checked_out != 0 && $item->checked_out != $user->id) ? true : false;
			$canEdit	= ($user->authorise('core.edit.own', 'com_cmlivedeal') && !$checkedOut) ? true : false;
			?>
				<tr class="row<?php echo $i % 2; ?>">
					<td>
						<?php if ($checkedOut) : ?>
							<?php echo JHtml::_('cmlivedeal.checkedOut'); ?>
						<?php endif; ?>
						<?php if ($canEdit) : ?>
							<a href="<?php echo JRoute::_('index.php?option=com_cmlivedeal&task=dealform.edit&id=' . (int) $item->id); ?>">
								<?php echo $this->escape($item->title); ?></a>
						<?php else : ?>
								<?php echo $this->escape($item->title); ?>
						<?php endif; ?>
						<?php if (!empty($item->category_title)) : ?>
							<p class="small"><?php echo $item->category_title; ?></p>
						<?php endif; ?>
					</td>
					<td class="center hidden-phone">
						<?php echo $item->impressions; ?>
					</td>
					<td class="center hidden-phone">
						<?php echo $item->clicks; ?>
					</td>
					<td class="center">
						<?php echo $item->captured; ?>
					</td>
					<td class="center">
						<?php echo $item->redeemed; ?>
					</td>
					<td class="center">
						<?php if ($item->approved) : ?>
							<span class="fa fa-check"></span>
						<?php endif; ?>
					</td>
					<td class="center">
						<?php if ($item->published == '1') : ?>
							<span class="fa fa-check"></span>
						<?php endif; ?>
					</td>
					<td class="center">
						<?php
						if ($item->approved)
						{
							echo JHtml::_('cmlivedeal.date', $item->ending_time);
						}
						?>
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
</div>
