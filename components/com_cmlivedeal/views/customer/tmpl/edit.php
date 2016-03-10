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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'customer.cancel' || document.formvalidator.isValid(document.getElementById('adminForm'))) {
			Joomla.submitform(task);
		}
	}
</script>

<div class="cmlivedeal<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_cmlivedeal&view=customer&code=' . $this->item->code); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
		<div class="btn-toolbar">
			<div class="btn-group">
				<button type="button" class="btn btn-default btn-primary" onclick="Joomla.submitbutton('customer.save')">
					<span class="fa fa-check"></span> <?php echo JText::_('JSAVE') ?>
				</button>
			</div>
			<div class="btn-group">
				<button type="button" class="btn btn-default" onclick="Joomla.submitbutton('customer.cancel')">
					<span class="fa fa-close"></span> <?php echo JText::_('JCANCEL') ?>
				</button>
			</div>
		</div>

		<hr class="hr-condensed" />

		<?php echo $this->form->renderField('created'); ?>
		<?php echo $this->form->renderField('redeemed'); ?>
		<?php echo $this->form->renderField('redeemed_time'); ?>

		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
