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
JHtml::_('formbehavior.chosen', 'select');

// Load user_profile plugin language
$lang = JFactory::getLanguage();
$lang->load('plg_user_profile', JPATH_ADMINISTRATOR);

?>

<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary settings" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">
		<div id="sectionHeader"><span><h1>Settings: <?php echo htmlspecialchars($this->data->username); ?></h1>
		<div class="panes">
			<a href="/index.php?option=com_users&view=profile" title="Profile Overview" >Overview</a>
			<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id);?>" title="Profile Options" class="current">Options</a>
			<a href="index.php?option=com_users&view=profile&layout=avatar" title="Avatars" >Avatars</a>
			<a href="/index.php?option=com_cmlivedeal&view=coupons" title="Coupons">Coupons</a>
			<!--<a href="/settings.cfm?subaction=onebigplanet" title="Member Discounts and Offers">Special Discounts / Offers</a>-->
			<!--<a href="/settings.cfm?subaction=games" title="User Game History">Games</a>  -->
			<!--<a href="/settings.cfm?subaction=friends" title="Manage Friends List">Friends List</a>  -->
		</div></span></div>

		

		
		
				<div class="stats">
					<h1><?php echo htmlspecialchars($this->data->username); ?></h1>
					<!-- <div class="rankstars32"><div class="got" style="width:3px;"></div></div> -->
					<span class="first">Member Since: <?php echo JHtml::_('date', $this->data->registerDate); ?></span>
					<span>Account Status: Activated</span>
				</div>
				
				
				<form action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" name="ProfileForm" class="form commonform">
				
					
					

					
					<div class="row">
						<label for="title">username</label>
						<p><input type="text" class="text" name="jform[username]" id = "jform_username" value="<?php echo $this->data->username; ?>" size="30" maxlength="75"><br><span>4-20 characters, no spaces and must be unique</span></p>
						<span class="clear"></span>
					</div>

					<div class="row">
						<label for="pw1">Change Password<br><span class="ext">(6-20 characters, at least 1 number and 1 letter)</span></label>
						<p><input type="password" class="password" name="jform[password1]" id="jform[password1]" value="" size="15" autocomplete="off">&nbsp;<input type="password" class="password" name="jform[password2]" id="jform[password2]" value="" size="15" autocomplete="off"><br><span>If changing your password, enter the new password in both</span></p>
						<span class="clear"></span>
					</div>

					<div class="row">
						<label for="email">Change E-Mail</label>
						<p><input type="text" class="text" name="jform[email1]" id="jform[email1]" value="<?php echo $this->data->email; ?>" size="20" maxlength="75">&nbsp;<input type="text" class="text" name="jform[email2]" id="jform[email2]" value="<?php echo $this->data->email; ?>" size="20" maxlength="75"><br><span>Changing email address reqires account re-activation</span></p>
						<span class="clear"></span>
					</div>
					
					<div class="row">
						<label for="email">Change Full Name</label>
						<p><input type="text" class="text" name="jform[name]" id="jform[name]" value="<?php echo $this->data->name; ?>" size="30" maxlength="75"><br><span>4-20 characters, no spaces and must be unique</span></p>
						<span class="clear"></span>
					</div>


	
				<div class="row break">
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="profile.save" />
					<input type="submit" class="submit" name="submit" value="Save Changes">
				</div>
				<?php echo JHtml::_('form.token'); ?>
				</form>
				
				
			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
	
	
