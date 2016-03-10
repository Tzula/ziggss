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
?>

<div id="colTen">
	<div class="prebody">
		<div class="subbody">
			<div class="outerbody">
				<div class="innerbody">
					<div class="actualbody">
						<div id="login" class="panel panelFullWidth panelPrimary" style=" ">
							<div class="panel_inner">
								<div class="panelOuterBody">
									<div class="panelTitleBar panelTight">
										<div class="title">
											<h3 class="">Frequently Asked Questions</h3>
										</div>
									</div>
									<div id="" class="panelBody ">
										<div id="sectionHeader"><h1><span>Login</span></h1></div>
											<form action="<?php echo JRoute::_('index.php?option=com_users&task=user.login'); ?>" method="post" class="form-validate form-horizontal well">
												<div class="user">
													<label for="username">Username</label>
													<input name="username" type="text" class="input text" tabindex="1" />
												</div>
												<div class="pass">
													<label for="password">Password</label>
													<input name="password" type="password" class="input password" tabindex="2" />
												</div>
												<div class="sub">
													<label for="submit">Go</label>
													<input name="submit" type="submit" value="Login" class="input submit" tabindex="3" />
												</div>
												<p>Have you lost your username or password?<br />Use our <a href="<?php echo JRoute::_('index.php?option=com_users&view=reset'); ?>">Password</a> or <a href="<?php echo JRoute::_('index.php?option=com_users&view=remind'); ?>">Username</a> Recovery tool to retrive them.</p>
												<p>Don't have an account? <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">Register&nbsp;for&nbsp;free&nbsp;account</a> today!</p>
												<input type="hidden" name="return" value="<?php echo base64_encode($this->params->get('login_redirect_url', $this->form->getValue('return'))); ?>" />
												<?php echo JHtml::_('form.token'); ?>
												<div style="width:100%">
													<div class="social-login facebook jfbcLogin pull-left">
        												<a id="sc_fblogin" href="javascript:void(0)" onclick="jfbc.login.provider('facebook');">
            											<img src="/media/sourcecoast/images/provider/facebook/icon_label.png" alt="Login With Facebook" title="Login With Facebook"></a>
           											</div>
           											<!--  
           											<div class="social-login google scGoogleLogin pull-left">
        												<a id="sc_gologin" href="javascript:void(0)" onclick="jfbc.login.provider('google');">
            											<img src="/media/sourcecoast/images/provider/google/icon_label.png" alt="Login With Google" title="Login With Google"></a>
            										</div>
            										-->
            										<div class="social-login twitter scTwitterLogin pull-left">
        												<a id="sc_twlogin" href="javascript:void(0)" onclick="jfbc.login.provider('twitter');">
            											<img src="/media/sourcecoast/images/provider/twitter/icon_label.png" alt="Login With Twitter" title="Login With Twitter"></a>
            										</div>
            										<!-- 
            										<div class="social-login amazon scAmazonLogin pull-left">
        												<a id="sc_amazonlogin" href="javascript:void(0)" onclick="jfbc.login.provider('amazon');">
            											<img src="/media/sourcecoast/images/provider/amazon/icon_label.png" alt="Login With Amazon" title="Login With Amazon"></a>
            										</div>
            										 -->
            										<div class="social-login instagram scInstagramLogin pull-left">
        												<a id="sc_instagramlogin" href="javascript:void(0)" onclick="jfbc.login.provider('instagram');">
            											<img src="/media/sourcecoast/images/provider/instagram/icon_label.png" alt="Login With Instagram" title="Login With Instagram"></a>
           											</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
