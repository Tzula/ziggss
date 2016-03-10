<?php
/**
 * @package    CMLiveDealSearch
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');

$comParams = JComponentHelper::getParams('com_cmlivedeal');

$html5 = ($comParams->get('geolocation_service', 'html5') == 'html5') ? true : false;

$script = <<<HTML
function clearFilters() {
	document.getElementById('keyword').value = '';
	document.getElementById('category').value = '';
	document.getElementById('city').value = '';
	document.searchForm.submit();
}
HTML;

if ($html5) :
	$langGeolocationFailed = JText::_('MOD_CMLIVEDEAL_SEARCH_GEOLOCATION_FAILED', true);
	$langGeolocationNotSupported = JText::_('MOD_CMLIVEDEAL_SEARCH_GEOLOCATION_NOT_SUPPORTED', true);

	$script .= <<<HTML
function submitForm() {
	city = document.getElementById('city').value;
	if (city == '*') {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				document.getElementById('latitude').value = position.coords.latitude;
				document.getElementById('longitude').value = position.coords.longitude;
				document.searchForm.submit();
			}, function() {
				alert('{$langGeolocationFailed}');
			});
		}
		else {
			alert('{$langGeolocationNotSupported}');
		}
	}
	else {
		document.getElementById('latitude').name = '';
		document.getElementById('longitude').name = '';
		document.searchForm.submit();
	}

	return;
}
HTML;
else:
	$script .= <<<HTML
function submitForm() {
	document.searchForm.submit();
}
HTML;
endif;

JFactory::getDocument()->addScriptDeclaration($script);
?>
<div class="cmlivedeal<?php echo $moduleclassSfx ?>">
	<form class="form-<?php echo $formClass; ?>" method="post" action="<?php echo JRoute::_('index.php'); ?>" id="searchForm" name="searchForm">
	<?php if ($display == 'inline'): ?>
		<div class="btn-toolbar">
			<span class="btn-group">
				<?php echo $form->getInput('keyword'); ?>
			</span>
			<span class="btn-group">
				<?php echo $form->getInput('category'); ?>
			</span>
			<span class="btn-group">
				<?php echo $form->getInput('city'); ?>
			</span>
			<span class="btn-group">
				<button type="submit" class="btn<?php echo $searchCSS; ?>" onclick="submitForm()"><?php echo $searchLabel; ?></button>
				<?php if ($clearButton) : ?>
				<button type="button" class="btn<?php echo $clearCSS; ?>" onclick="clearFilters()"><?php echo $clearLabel; ?></button>
				<?php endif; ?>
			</span>
		</div>
	<?php elseif ($display == 'horizontal') : ?>
		<div class="control-group">
			<label class="control-label" for="keyword">
				<?php echo $form->getLabel('keyword'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('keyword'); ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="category">
				<?php echo $form->getLabel('category'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('category'); ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">
				<?php echo $form->getLabel('city'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('city'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<span class="btn-group">
					<button type="submit" class="btn<?php echo $searchCSS; ?>" onclick="submitForm()"><?php echo $searchLabel; ?></button>
					<?php if ($clearButton) : ?>
					<button type="button" class="btn?php echo $clearCSS; ?>" onclick="clearFilters()"><?php echo $clearLabel; ?></button>
					<?php endif; ?>
				</span>
			</div>
		</div>
	<?php else: ?>
		<div class="control-group">
			<label class="control-label" for="keyword">
				<?php echo $form->getLabel('keyword'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('keyword'); ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="category">
				<?php echo $form->getLabel('category'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('category'); ?>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="city">
				<?php echo $form->getLabel('city'); ?>
			</label>
			<div class="controls">
				<?php echo $form->getInput('city'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<span class="btn-group">
					<button type="submit" class="btn<?php echo $searchCSS; ?>" onclick="submitForm()"><?php echo $searchLabel; ?></button>
					<?php if ($clearButton) : ?>
					<button type="button" class="btn<?php echo $clearCSS; ?>" onclick="clearFilters()"><?php echo $clearLabel; ?></button>
					<?php endif; ?>
				</span>
			</div>
		</div>
	<?php endif; ?>

	<input type="hidden" name="option" value="com_cmlivedeal">
	<input type="hidden" name="task" value="search">
	<input type="hidden" name="Itemid" value="<?php echo JFactory::getApplication()->input->get('Itemid', 0); ?>">
	<?php if ($html5) : ?>
	<input type="hidden" name="latitude" id="latitude" value="">
	<input type="hidden" name="longitude" id="longitude" value="">
	<?php endif; ?>
	</form>
</div>
