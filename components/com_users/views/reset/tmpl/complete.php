<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.formvalidator');
?>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="lostpass" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">
<div id="sectionHeader"><span>
	<h1>Account Tools</h1>
</span></div>
<div class="lost">
	
	<div class="notice">
		<p>To complete the password reset process, please enter a new password.</p>
	</div>
	
			<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.complete'); ?>" method="post" class="form commonform">		
				
				<div class="row break">
					<label for="jform[password1]">Password<span class="req">*</span></label>
					<p>
					<input type="password" name="jform[password1]" id="jform_password1" value="" autocomplete="off" class="validate-password required" size="30" maxlength="75" required="" aria-required="true">
					<br><span></span></p>
					<span class="clear"></span>
				</div>	
				
				<div class="row break">
					<label for="jform[password2]">Confirm Password<span class="req">*</span></label>
					<p>
					<input type="password" name="jform[password2]" id="jform_password2" value="" autocomplete="off" class="validate-password required" size="30" maxlength="75" required="" aria-required="true">
					<br><span></span></p>
					<span class="clear"></span>
				</div>	
					
				
				<div class="finish break row">
					<input type="submit" class="submit" name="submit" value="submit">
				</div> 
				<?php echo JHtml::_('form.token'); ?>
			</form>
		
	
</div>
</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
