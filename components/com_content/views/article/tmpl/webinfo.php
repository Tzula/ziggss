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

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
?>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"><div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Our Advertising Policies</h3>
			</div>
		</div>
		<div id="disclaimers" class="panelBody ">
		<div id="sectionHeader"><span><h1><?php echo $this->escape($this->item->title); ?></h1></span></div>
		
		
		
		
		<?php echo $this->item->text; ?>
		
		
			
	</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
