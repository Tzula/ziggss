<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
$doc  = JFactory::getDocument();
?>
<!--  
<div style="display:none;">
	<form action="<?php echo JRoute::_(JUri::getInstance()->toString(), true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-vertical">
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
<div id="userdata" class="udlgin">
	<div class="avatar" style="background-image:url(<?php echo $doc->baseurl; ?>/templates/<?php echo $doc->template; ?>/images/avatars/small/theme_base_blank.gif);"></div>
	<div class="uidels">
		<strong>
		<?php if ($params->get('name') == 0) : {
			echo htmlspecialchars($user->get('name'));
		} else : {
			echo htmlspecialchars($user->get('username'));
		} endif; ?>
		</strong>&nbsp;
		<a href="/discussion2.cfm/mail/inbox" class="urmclink" sl-processed="1">0 Messages</a> 
		<a href="/index.php/component/users/profile" class="profile" sl-processed="1">Your&nbsp;Profile</a>
		<a href="/settings.cfm?subaction=favgames" onclick="return buildFavGamesDropdown();" id="favgameslink" class="favgames" sl-processed="1">Favorite Games</a>
		<a href="javascript:document.getElementById('login-form').submit();" class="logout" sl-processed="1">Logout</a>
	</div>
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

<div style="display:none;">
	<form action="<?php echo JRoute::_(JUri::getInstance()->toString(), true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-vertical">
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
<div class="dropdown" id="signDropdown" >
		        <a class="dropdown-toggle" type="button" id="signDropdownMenu" data-toggle="dropdown">
		         	<?php if ($params->get('name') == 0) : {
						echo htmlspecialchars($user->get('name'));
					} else : {
						echo htmlspecialchars($user->get('username'));
					} endif; ?>
		         	<span id="user_icon"></span>
		        </a>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="signDropdownMenu">
		          <li role="presentation"><a tabindex="-1" href="/index.php?option=com_users&view=profile&layout=edit">Profile</a></li>
		          <li role="presentation"><a tabindex="-1" href="javascript:document.getElementById('login-form').submit();">Logout</a></li>
		        </ul>
		      </div>
<div class="clear"></div>
