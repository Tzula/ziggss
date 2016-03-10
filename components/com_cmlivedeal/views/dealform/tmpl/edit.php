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

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidation');

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

$discountValues = $this->params->get('discount_values', 0, 'uint');

?>
<script type="text/javascript">
	Joomla.submitbutton = function(task) {
		if (task == 'dealform.cancel' || document.formvalidator.isValid(document.getElementById('adminForm'))) {
			Joomla.submitform(task);
		}
	}

	jQuery(document).ready(function() {
		type = jQuery('input[name="jform[discount_info]"]:checked').val();
		discountInfo(type);

		jQuery('input[name="jform[discount_info]"]').on('click', function() {
			type = jQuery('input[name="jform[discount_info]"]:checked').val();
			discountInfo(type);
		});
	});

	function discountInfo(type) {
		switch (type) {
			case 'prices':
				jQuery('.fixed-type').hide();
				jQuery('.percent-type').hide();
				jQuery('.prices-type').show();
				break;

			case 'fixed':
				jQuery('.fixed-type').show();
				jQuery('.percent-type').hide();
				jQuery('.prices-type').hide();
				break;

			case 'percent':
				jQuery('.fixed-type').hide();
				jQuery('.percent-type').show();
				jQuery('.prices-type').hide();
				break;

			default:
				jQuery('.fixed-type').hide();
				jQuery('.percent-type').hide();
				jQuery('.prices-type').hide();
				break;
		}
	}
</script>

<div class="cmlivedeal<?php echo $this->pageclass_sfx; ?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>

	<form action="<?php echo JRoute::_('index.php?option=com_cmlivedeal&view=dealform&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
		<div class="btn-toolbar">
			<div class="btn-group">
				<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('dealform.save')">
					<span class="fa fa-check"></span> <?php echo JText::_('JSAVE') ?>
				</button>
			</div>

			<div class="btn-group">
				<button type="button" class="btn btn-default" onclick="Joomla.submitbutton('dealform.cancel')">
					<span class="fa fa-close"></span> <?php echo JText::_('JCANCEL') ?>
				</button>
			</div>
		</div>

		<hr class="hr-condensed" />
		<?php

		echo $this->form->renderField('title');
		echo $this->form->renderField('category_id');
		echo $this->form->renderField('image_id');

		if ($discountValues)
		{
			echo $this->form->renderField('discount_info');

			echo '<div class="prices-type">';
			echo $this->form->renderField('original_price');
			echo $this->form->renderField('discounted_price');
			echo '</div>';

			echo '<div class="fixed-type">';
			echo $this->form->renderField('fixed_value');
			echo '</div>';

			echo '<div class="percent-type">';
			echo $this->form->renderField('fixed_percent');
			echo '</div>';
		}

		echo $this->form->renderField('description');
		echo $this->form->renderField('fine_print');
		echo $this->form->renderField('coupon_quantity');
		echo $this->form->renderField('starting_time');
		echo $this->form->renderField('ending_time');
		echo $this->form->renderField('published');
		?>

		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
