<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once JPATH_SITE . '/components/com_users/helpers/route.php';

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

?>
<!--  
<div id="userdata">
<form action="<?php echo JRoute::_(JUri::getInstance()->toString(), true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-inline">
	<div id="formelements">
		<strong class="lab2">Login:&nbsp;</strong>
		<input id="modlgn-username" type="text" name="username" class="text loginbarinput" maxlength="20" tabindex="17" />
		<strong class="lab2">Password:&nbsp;</strong>
		<input id="modlgn-passwd" type="password" name="password" class="password loginbarinput" tabindex="18"  />&nbsp;
		<strong class="lab2">Remember?&nbsp;</strong>
		<input id="modlgn-remember" name="persistent" class="logincheckbox" type="checkbox" tabindex="19" title="Remember login?" />&nbsp;
		<input type="submit" class="submit loginbarbutton" value="Sign-in" tabindex="20" />
	</div>
	<div id="notmember">
		<a class="uareg" href="<?php echo JRoute::_('index.php?option=com_users&view=registration&Itemid=' . UsersHelperRoute::getRegistrationRoute()); ?>">Register Now</a> | 
		<span>Forgot</span>&nbsp;<a href="<?php echo JRoute::_('index.php?option=com_users&view=remind&Itemid=' . UsersHelperRoute::getRemindRoute()); ?>" rel="nofollow">Username</a>or 
		<a href="<?php echo JRoute::_('index.php?option=com_users&view=reset&Itemid=' . UsersHelperRoute::getResetRoute()); ?>" rel="nofollow">Password</a>
	</div>
	<div class="clear"></div>
	<input type="hidden" name="option" value="com_users" />
	<input type="hidden" name="task" value="user.login" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>
</div>

<div class="social">
				<ul>
											<li><a class="twitter" href="#">Twitter</a></li>
										
											<li><a class="fb" href="#">Facebook</a></li>
										
											<li><a class="gplus" href="#">Google+</a></li>
										
																			
				</ul>
</div>
<div class="clear"></div>
-->
<!-- sign in menu-->
					<div class="dropdown" id="signDropdown" >
		        <a class="dropdown-toggle" type="button" id="signDropdownMenu" data-toggle="dropdown">
		         	Sign In
		         	<span id="user_icon"></span>
		        </a>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="signDropdownMenu">
		          <li role="presentation"><a tabindex="-1" href="/index.php?option=com_users&view=login">Login</a></li>
		          <li role="presentation"><a tabindex="-1" href="/index.php?option=com_users&view=registration">Register</a></li>
		        </ul>
		      </div>

<div class="clear"></div>