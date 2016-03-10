<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');
JHtml::_('behavior.caption');

JFactory::getDocument()->addScriptDeclaration("
jQuery(function($) {
	$('.categories-list').find('[id^=category-btn-]').each(function(index, btn) {
		var btn = $(btn);
		btn.on('click', function() {
			btn.find('span').toggleClass('icon-plus');
			btn.find('span').toggleClass('icon-minus');
		});
	});
});");
?>
<div id="features" class="feetures">
			<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Exclusive Columns</h3>
			</div>
		</div>
		<div id="" class="panelBody "> 

		<div id="sectionHeader"><span><h1>Exclusive Columnists</h1></span></div>
		<div class="list collist">
			
					
					<?php
		echo JLayoutHelper::render('joomla.content.categories_default', $this);
		echo $this->loadTemplate('items');
	?>
					
			<div class="clear"></div>
			
		</div>

		
	
	<div class="clear"></div>
	</div></div></div></div></div>
</div></div></div>
</div>

		</div>
