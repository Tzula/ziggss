<?php 
/*------------------------------------------------------------------------
# mod_SocialLoginandSocialShare
# ------------------------------------------------------------------------
# author    LoginRadius inc.
# copyright Copyright (C) 2013 loginradius.com. All Rights Reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.loginradius.com
# Technical Support:  Forum - http://community.loginradius.com/
-------------------------------------------------------------------------*/

//no direct access
defined( '_JEXEC' ) or die('Restricted access');
JHtml::_('behavior.keepalive');?>

<?php 
// Check for plugin enabled.
  jimport('joomla.plugin.helper');
  if(!JPluginHelper::isEnabled('system','socialloginandsocialshare')) :
    JError::raiseNotice ('sociallogin_plugin', JText::_ ('MOD_LOGINRADIUS_PLUGIN_ERROR')); 
   endif; ?>
<style>
<!--

.lr_social_login_basic_150{	width:150px;background:transparent;}
.lr_social_login_basic_150 #lr_providers .lr_icons_box{width:128px;float:left;margin:0 0 0px 0;}
.lr_social_login_basic_150  #lr_providers .lr_icons_box div{float:left;margin:0 3px 4px 0;cursor:pointer;}
.lr_social_login_basic_150 #lr_providers .lr_providericons { width: 60px; height: 26px; background-image: url('/modules/mod_socialloginandsocialshare/images/lr_provider_sprite.png'); cursor: pointer;
  display: block; margin: 0 auto; position: relative; z-index: 9998; outline: 0;}
/*icons sprite */
.lr_social_login_basic_150 #lr_providers .lr_facebook:hover { width: 60px; height: 26px; background-position: 0px -78px; }
.lr_social_login_basic_150 #lr_providers .lr_facebook { width: 60px; height: 26px; background-position: 0px -52px; }
.lr_social_login_basic_150 #lr_providers .lr_google:hover { width: 60px; height: 26px; background-position: 0px -26px; }
.lr_social_login_basic_150 #lr_providers .lr_google  { width: 60px; height: 26px; background-position: 0px 0px; }

-->
</style>
<?php
if ($type == 'logout') : ?>
<?php $session = JFactory::getSession();?>
  <form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
  <div>
	   <?php $user_picture = $session->get('user_picture');?>
     <div style="float:left;">
<img src="<?php if (!empty($user_picture)) { echo $session->get('user_picture');} else {echo JURI::root().'media/com_socialloginandsocialshare/images/noimage.png';}?>" alt="<?php echo $user->get('name');?>" style="width:50px; height:auto;background: none repeat scroll 0 0 #FFFFFF; border: 1px solid #CCCCCC; display: block; margin: 2px 4px 4px 0; padding: 2px;">
     </div>
     <div>
       <div class="login-greeting" >
	   	<div style=" font-weight:bold;">
			<?php 
				$name = $user->get('name');
				if(!empty($name)):
                  echo JText::sprintf('MOD_LOGINRADIUS_HINAME', $name);
                else :
                  echo JText::sprintf('MOD_LOGINRADIUS_HINAME', $user->get('username'));
                endif;
				?>
            </div>
       </div>
       <div style="clear:both"></div>
	   <div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token');?>		
	   </div>
	</div>
  </div>
   </form>
<?php else : ?>
<?php echo $sociallogin;
endif;?>