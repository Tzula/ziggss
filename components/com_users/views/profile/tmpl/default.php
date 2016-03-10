<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_users
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once JPATH_PLUGINS . '/user/cmavatar/helper.php';
$avatar = PlgUserCMAvatarHelper::getAvatar($this->data->id);
?>

<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary profile" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Profile</h3>
			</div>
		</div>
		<div id="" class="panelBody ">

			<div id="sectionHeader"><span>
				
					<h1 class="title">Profile: <?php echo htmlspecialchars($this->data->username); ?></h1>

					<div class="panes">
						
							<a href="/index.php?option=com_users&view=profile" title="Profile Overview" class="current">Overview</a>
							<a href="<?php echo JRoute::_('index.php?option=com_users&task=profile.edit&user_id=' . (int) $this->data->id);?>" title="Profile Options">Options</a>
							<a href="index.php?option=com_users&view=profile&layout=avatar" title="Avatars" >Avatars</a>
							<a href="/index.php?option=com_cmlivedeal&view=coupons" title="Coupons">Coupons</a>
							<!--<a href="/settings.cfm?subaction=onebigplanet" title="Member Discounts and Offers">Special Discounts / Offers</a>-->
							<!--<a href="/settings.cfm?subaction=games" title="User Game History">Games</a>  -->
							<!--<a href="/settings.cfm?subaction=friends" title="Manage Friends List">Friends List</a>  -->
						
					</div>

				
				<div class="clear"></div>

			</span></div>

			<div class="pmain">
				<div class="poverview">
					<div class="icon">
						<?php if ($avatar != ''):?>
						<img src="<?php echo $avatar;?>" width="160" height="160" alt="" class="avatar" style="position:relative; top:20px; left:20px;">
						<?php endif;?>
					</div>
					<div class="data">

						<span class="username"><?php echo htmlspecialchars($this->data->username); ?> - Novice Member</span>
						
						<span class="join">Member since <?php echo JHtml::_('date', $this->data->registerDate); ?></span>
						<span class="last">Last Visit:&nbsp;<strong>
						
						<?php if ($this->data->lastvisitDate != '0000-00-00 00:00:00'){?>
			
						<?php echo JHtml::_('date', $this->data->lastvisitDate); ?>
			
						<?php }
						else
						{?>
		
							<?php echo JText::_('COM_USERS_PROFILE_NEVER_VISITED'); ?>
			
						<?php } ?>
						
						</strong></span>

						<!--  <span class="stars"><div class="rankstars32"><div class="got" style="width:3px;"></div></div></span>-->

						<!--  <span class="extra">30 year old Male from chengdu, China</span>-->
						<span class="email">Email:&nbsp;<?php echo htmlspecialchars($this->data->email); ?>; <!-- send a <a href="/discussion2.cfm/mail/compose/nomailcheck/true/recipient/mmorpgtomh">Private Message</a> --></span>
						
						<!-- 
						<span class="friends">
							<b class="title">Friends</b>
							
								<span class="none">Friend list has been set to private</span>
							
						</span>
						 -->

					</div>
					<div class="clear"></div>

				</div>
				<div class="clear"></div>

				<!--  
				<div class="pgallery">
					
		<div class="val"><div class="simpleSec"><div class="ssOne"><div class="ssTwo"><div class="ssThr ssInside"><div class="ssFake">
	

					<h2><a href="/galleries/mmorpgtomh">Latest User Gallery Images</a></h2>
					
						<div class="none">mmorpgtomh has not uploaded any photos or screenshots yet</div>
					
		</div></div></div></div></div></div>
	
				</div>
				-->

				<!--  
				<div class="pguilds">
					<h2>Guild Memberships</h2>
					
						<div class="none">mmorpgtomh is not a member of any guilds yet</div>
					
					<a href="http://www.mmorpg.com/guilds.cfm" class="more">Find guilds...</a>
				</div>
				-->

				<!--  
				<div class="pgames">
					
		<div class="val"><div class="simpleSec"><div class="ssOne"><div class="ssTwo"><div class="ssThr ssInside"><div class="ssFake">
	
					<h2>mmorpgtomhs Game Interest  - <a href="http://www.mmorpg.com/settings.cfm?subaction=games">Update Games</a></h2>
					
						<span class="none">mmorpgtomh hasn't entered any info about his gaming history or current activity</span>
					
		</div></div></div></div></div></div>
	
				</div>
				-->
				
				<!-- 
				<div class="pblogs">
					
					
						<h2>Latest User Blog Posts</h2>
						<div class="none">mmorpgtomh does not have a blog yet.</div>

					
					
				</div>
				 -->
			
			<!--  	
		<div class="linkage"><div class="simpleSec"><div class="ssOne"><div class="ssTwo"><div class="ssThr ssInside"><div class="ssFake">
	
					Jump to <a href="http://www.mmorpg.com/profile.cfm/username/mmorpgtomh">your</a> profile or edit your <a href="http://www.mmorpg.com/settings.cfm">settings</a>.
				
		</div></div></div></div></div></div>-->
	

			</div>
			

			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>



