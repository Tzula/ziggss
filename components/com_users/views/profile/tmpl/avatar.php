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
			<a href="index.php?option=com_users&view=profile" title="Profile Overview" >Overview</a>
			<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id);?>" title="Profile Options" >Options</a>
			<a href="index.php?option=com_users&view=profile&layout=avatar" title="Avatars" class="current">Avatars</a>
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
				
				
				<form id="member-profile" action="<?php echo JRoute::_('index.php?option=com_users&task=profile.save'); ?>" method="post" class="form commonform" enctype="multipart/form-data">
	<?php // Iterate through the form fieldsets and display each one. ?>
	<?php foreach ($this->form->getFieldsets() as $group => $fieldset) : ?>
		<?php $fields = $this->form->getFieldset($group); ?>
		<?php if (count($fields)) : ?>
		<fieldset>
			<?php // If the fieldset has a label set, display it as the legend. ?>
			<?php if (isset($fieldset->label)) : ?>
			
			<?php endif;?>
			<?php // Iterate through the fields in the set and display them. ?>
			<?php foreach ($fields as $field) : ?>
			<?php // If the field is hidden, just display the input. ?>
				<?php if ($field->hidden) : ?>
					<?php echo $field->input; ?>
				<?php elseif($field->type == 'CMAvatar') : ?>
					<div class="row">
						<div class="control-label">
							<?php echo $field->label; ?>
							<?php if (!$field->required && $field->type != 'Spacer') : ?>
								<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
							<?php endif; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php else:?>
					<div class="control-group" style="display:none;">
						<div class="control-label">
							<?php echo $field->label; ?>
							<?php if (!$field->required && $field->type != 'Spacer') : ?>
								<span class="optional"><?php echo JText::_('COM_USERS_OPTIONAL'); ?></span>
							<?php endif; ?>
						</div>
						<div class="controls">
							<?php echo $field->input; ?>
						</div>
					</div>
				<?php endif;?>
			<?php endforeach;?>
		</fieldset>
		<?php endif;?>
	<?php endforeach;?>

	<?php if (count($this->twofactormethods) > 1) : ?>
		<fieldset>
			<legend><?php echo JText::_('COM_USERS_PROFILE_TWO_FACTOR_AUTH'); ?></legend>

			<div class="control-group">
				<div class="control-label">
					<label id="jform_twofactor_method-lbl" for="jform_twofactor_method" class="hasTooltip"
						   title="<strong><?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL'); ?></strong><br /><?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_DESC'); ?>">
						<?php echo JText::_('COM_USERS_PROFILE_TWOFACTOR_LABEL'); ?>
					</label>
				</div>
				<div class="controls">
					<?php echo JHtml::_('select.genericlist', $this->twofactormethods, 'jform[twofactor][method]', array('onchange' => 'Joomla.twoFactorMethodChange()'), 'value', 'text', $this->otpConfig->method, 'jform_twofactor_method', false); ?>
				</div>
			</div>
			<div id="com_users_twofactor_forms_container">
				<?php foreach($this->twofactorform as $form) : ?>
				<?php $style = $form['method'] == $this->otpConfig->method ? 'display: block' : 'display: none'; ?>
				<div id="com_users_twofactor_<?php echo $form['method']; ?>" style="<?php echo $style; ?>">
					<?php echo $form['form']; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</fieldset>

		<fieldset>
			<legend>
				<?php echo JText::_('COM_USERS_PROFILE_OTEPS'); ?>
			</legend>
			<div class="alert alert-info">
				<?php echo JText::_('COM_USERS_PROFILE_OTEPS_DESC'); ?>
			</div>
			<?php if (empty($this->otpConfig->otep)) : ?>
			<div class="alert alert-warning">
				<?php echo JText::_('COM_USERS_PROFILE_OTEPS_WAIT_DESC'); ?>
			</div>
			<?php else : ?>
			<?php foreach ($this->otpConfig->otep as $otep) : ?>
			<span class="span3">
				<?php echo substr($otep, 0, 4); ?>-<?php echo substr($otep, 4, 4); ?>-<?php echo substr($otep, 8, 4); ?>-<?php echo substr($otep, 12, 4); ?>
			</span>
			<?php endforeach; ?>
			<div class="clearfix"></div>
			<?php endif; ?>
		</fieldset>
	<?php endif; ?>
	
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
	
	


