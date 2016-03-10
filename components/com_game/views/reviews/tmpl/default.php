<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
?>

			<!--  <script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><script async="" type="text/javascript" src="http://www.googletagservices.com/tag/js/check_359604.js"></script><iframe src="http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html" style="visibility: hidden; display: none;"></iframe><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>-->

	<div class="gvew2">

		
		<div class="hdrtwo" style="background: #59C8FF;">
			<div class="iconarea"><a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" sl-processed="1"><img src="<?php echo $doc->baseurl . $this->item->image; ?>" width="104" height="105" border="0" class="" onerror="this.src='/media/other/generic.png'"></a></div>
			<div class="gvh_etrxtheme2"></div>
			<div class="ninfo">
				<div class="gvtitle"><div class="titleblock"><a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" sl-processed="1"><?php echo $this->item->name;?></a></div><div class="clear"></div></div>
				<div class="gvsubtitle">Funcom&nbsp;</div>
				<div class="gvstats">
					<!--  
					<span class="statHigh">
						MMORPG
					</span>&nbsp;|&nbsp;-->
					Setting:<span class="statHigh">
						<?php echo $this->item->genres_name; ?>
					</span>&nbsp;|&nbsp;
					Status:<span class="statHigh">
						<?php if ($this->item->status == 1): ?>
							<?php echo 'Alpha'; ?>
						<?php elseif ($this->item->status == 2): ?>
							<?php echo 'Beta Testing'; ?>
						<?php elseif ($this->item->status == 3): ?>
							<?php echo 'Cancelled'; ?>
						<?php elseif ($this->item->status == 4): ?>
							<?php echo 'Development'; ?>
						<?php elseif ($this->item->status == 5): ?>
							<?php echo 'Early Access'; ?>
						<?php elseif ($this->item->status == 6): ?>
							<?php echo 'Final'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					&nbsp;
					(rel <?php echo substr($this->item->releaseddate, 0, 10); ?>) 
					
					</span>&nbsp;|&nbsp;Pub:<span class="statHigh"><?php echo $this->item->publisher_name; ?></span><br>
					PVP:<span class="statHigh">
						<?php if ($this->item->pvp == 0): ?>
							<?php echo 'No'; ?>
						<?php elseif ($this->item->pvp == 1): ?>
							<?php echo 'Has'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Distribution:<span class="statHigh">
						<?php if ($this->item->distribution == 1): ?>
							<?php echo 'Browser'; ?>
						<?php elseif ($this->item->distribution == 2): ?>
							<?php echo 'Download'; ?>
						<?php elseif ($this->item->distribution == 3): ?>
							<?php echo 'Retail'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Pay&nbsp;Type:<span class="statHigh">
						<?php if ($this->item->paymenttype == 1): ?>
							<?php echo 'Buy to Play'; ?>
						<?php elseif ($this->item->paymenttype == 2): ?>
							<?php echo 'Free'; ?>
						<?php elseif ($this->item->paymenttype == 3): ?>
							<?php echo 'Hybrid'; ?>
						<?php elseif ($this->item->paymenttype == 4): ?>
							<?php echo 'Item Mall'; ?>
						<?php elseif ($this->item->paymenttype == 5): ?>
							<?php echo 'Subscription'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Monthly Fee:<span class="statHigh">
					<?php if ($this->item->fee == 0): ?>
						<span class="">Free</span>
					<?php else: ?>
						<span class=""><?php echo "$".$this->item->fee; ?></span>
					<?php endif; ?>	
					</span> <br>System Req:&nbsp;
						<?php 
								$platform = explode(',', $this->item->platform);
								if (count($platform) > 0){
									foreach ($platform as $pv){
											if ($pv == 1){
												echo 'Android' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 2){
												echo 'Ios' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 3){
												echo 'Pc' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 4){
												echo 'Amazon' . '&nbsp;&nbsp;';
												continue;
											}
									}
								}else{
									echo 'Unknown';
								}
							?>
					</div>
			</div>
		</div>

		
		<div class="navgvtwo">
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" class="overview " sl-processed="1"><span>Overview</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=features&id=' . $this->item->id); ?>" class="features " sl-processed="1"><span>Features</span></a>
			<a href="index.php/forum/<?php echo $this->item->alias; ?>" class="forums " sl-processed="1"><span>Forums</span></a> 
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=links&id=' . $this->item->id); ?>" class="links " sl-processed="1"><span>Links</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=news&id=' . $this->item->id); ?>" class="news " sl-processed="1"><span>News</span></a>
			<!--  <a href="<?php echo JRoute::_('index.php?option=com_game&view=ratings&id=' . $this->item->id); ?>" class="ratings " sl-processed="1"><span>Ratings</span></a>-->
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=reviews&id=' . $this->item->id); ?>" class="reviews current" sl-processed="1"><span>Reviews</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_phocagallery&view=category&id=1&gameid=' . $this->item->id); ?>" class="screens " sl-processed="1"><span>Screenshots</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=videos&id=' . $this->item->id); ?>" class="videos last " sl-processed="1"><span>Videos</span></a>
			
			<div class="clear"></div>
		</div>

		<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">

				<div class="gvconblock">

				
						<div class="reviews"> 
	<div id="sectionHeader" class="beefitup"><span><h1>Reviews</h1></span></div>
	<div class="gvpricon">

	
	
	
	<div class="listing" id="list">
						

					<ul>
					<?php if (!empty($this->items)) : ?>
						<?php foreach ($this->items as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=review&id=' . $this->item->id . '&reviewid=' . $row->id);
						?>
					
						
									<li>
										<h3 style="font-weight:600px;"><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->title;?></a> 
										</h3>
										<p><?php echo substr(strip_tags($row->text), 0, 500) . '...'; ?>

</p>
										<span class="date">Posted on <?php echo JHtml::_('date', $row->created, JText::_('DATE_FORMAT_LC4')); ?> by <a href="#" sl-processed="1"><?php echo $row->author_name;?></a></span>
									</li>
					<?php endforeach; ?>
			<?php endif; ?>
											
					</ul>
			<!-- 
			<div class="usrcratr">
			<?php if ($user->guest): ?>
			<a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>">Login</a> or <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">Register</a> to submit a review!
			<?php else: ?>
			<a href="http://www.mmorpg.com/settings.cfm?subaction=myFeatures" class="creategr" sl-processed="1">Submit a review!</a>
			<?php endif; ?>
			</div>
			 -->	
			
	</div>
	<?php echo $this->pagination->getListFooter(); ?>
	
	
	
	</div>
	
		<div class="rsidecon">
		
			

			
			<div class="hymt">
						<?php if ($this->item->rating > 0): ?>
						<?php 
							$classname = 'ratingx';
							if ($this->item->status == 2){
								$classname = 'betax';
							}elseif($this->item->status == 4){
								$classname = 'hypex';
							}
							$ratinPer = ($this->item->rating *10 ).'%';
						?>
						<div class="largeh3">Rating</div>
							<div class="largebar"><span class="<?php echo $classname; ?>" style="width:<?php echo $ratinPer; ?> !important;"></span></div><div class="insideh2"><?php echo $this->item->rating; ?></div>
							<!--  
							<div class="largeh3">User&nbsp;Rating:&nbsp;7.7</div>
							<div class="bar"><span class="ratingx" style="width:77% !important;"></span></div>-->
					<?php else: ?>
						<h4>Votes Req</h4>
					<?php endif; ?>
						
				<div class="clear"></div>
			</div>

			
			
				<!-- 
				<div style="padding:4px 0px 5px 0px;"><a href="/adServer/signupLinkClick.cfm?gameId=191&amp;src=gamedetails_sidebar_button" class="gamegravitylink signupandplayb" target="_blank" rel="nofollow" sl-processed="1"></a></div>
			
					<div class="socialnbox">
						<div class="tweetboxbv">
							<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.mmorpg.com/gamelist.cfm/game/191/Age-of-Conan-Unchained.html" data-via="MMORPGcom" data-text="Age of Conan: Unchained, Online MMO Game | Review, News, Forums | MMORPG" data-count="vertical" target="_blank" sl-processed="1">Tweet</a>
						</div>
						<div class="facebookboxbv"><fb:like href="http://www.mmorpg.com/gamelist.cfm/game/191/Age-of-Conan-Unchained.html" layout="box_count" show_faces="false" width="240" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fwww.mmorpg.com%2Fgamelist.cfm%2Fgame%2F191%2FAge-of-Conan-Unchained.html&amp;layout=box_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f24575bf74" width="240px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F1ldYU13brY_.js%3Fversion%3D41%23cb%3Df342b86538%26domain%3Dwww.mmorpg.com%26origin%3Dhttp%253A%252F%252Fwww.mmorpg.com%252Ff181ff2a3c%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.mmorpg.com%2Fgamelist.cfm%2Fgame%2F191%2FAge-of-Conan-Unchained.html&amp;layout=box_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></fb:like></div>
						<div class="clear"></div>
					</div>
					 -->
				

	
	<div class="gvpushcon">
		
			<div id="moreContent" class="pushc"> <div class="section"><span class="pctitle">Popular Features:</span> 

						<?php if (!empty($this->popularFeatures)) : ?>
						<?php foreach ($this->popularFeatures as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=feature&id=' . $row->gameid . '&newsid=' . $row->id);
						?>			
					<div class="item">
							<span class="title"><?php echo $row->name;?><br><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
					
						<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=features'); ?>" class="pcmorefeatures" sl-processed="1">More Features</a></div>
					
					</div> <div class="section"><span class="pctitle">Latest News:</span> 

						<?php if (!empty($this->latestNews)) : ?>
						<?php foreach ($this->latestNews as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=new&id=' . $row->gameid . '&newsid=' . $row->id);
						?>			
						<div class="item">
							<span class="title"><?php echo $row->name;?><br><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
						</div>
							<?php endforeach; ?>
						<?php endif; ?>
					<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=news'); ?>" class="pcmorenews" sl-processed="1">More News</a></div></div> 
					<div class="section"><span class="pctitle">Newest <a href="<?php echo JRoute::_('index.php?option=com_game&view=games');?>" sl-processed="1">Games</a>:</span>
						
							<?php if (!empty($this->latestGames)) : ?>
						<?php foreach ($this->latestGames as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=game&id=' . $row->id);
						?>			
						<div class="item">
								<span class="title"><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->name;?></a></span>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
						
						</div>
					<br class="clear"></div> 
	</div>

</div>
</div>
					

					<div class="clear"></div>

				</div>

			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>


			<div class="clear"></div>

			<div class="foot clear"></div>

		<div class="clear"></div>

	</div>
