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
		<h1>Password Reset Instructions Sent!</h1>
		<p>An email has been sent to your email address. The email contains a verification code, please paste the verification code in the field below to prove that you are the owner of this account.</p>
	</div>
	

			<form action="<?php echo JRoute::_('index.php?option=com_users&task=reset.confirm'); ?>" method="post" class="form commonform">			
				
				<div class="row break">
					<label for="jform[username]">Username<span class="req">*</span></label>
					<p>
					<input type="text" name="jform[username]" id="jform_username" value="" class="required" size="30" required="" aria-required="true" maxlength="75">
					<br><span></span></p>
					<span class="clear"></span>
				</div>	
				
				<div class="row break">
					<label for="jform[token]">Verification Code<span class="req">*</span></label>
					<p>
					<input type="text" name="jform[token]" id="jform_token" value="" class="required" size="30" required="" aria-required="true" maxlength="75">
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
