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
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Newsroom</h3>
			</div>
		</div>
		
		<form name="filter" class="filter">
		<div id="" class="panelBody ">
					<script>
						function filterFeature() {
						
						var theForm = document.filter;
						if(theForm.gameId.value == 0){
							var theTarget = "/index.php/component/content/?view=news";
						}
						else {
							var theTarget = "/index.php/component/content/?view=news&gameid="+theForm.gameId.value;
						}
						window.location = theTarget;
					}
					</script>
					<div id="sectionHeader"><span>
						<h1>Newsroom</h1>
						<div class="newsfilter" id="nsf6">
							
									
	
								<span class="gamelist">
									<span class="label">Filter Game</span>
									<select name="gameId">
										<?php if (!empty($this->games)) : ?>
											<?php foreach ($this->games as $i => $game) : ?>
												<option value="<?php echo $game->value;?>" <?php if($game->value == $this->gameid) echo 'selected="selected"';?>><?php echo $game->text;?></option>
											<?php endforeach; ?>
										<?php endif; ?>
	
									</select>
									
									
								</span>
								<input type="button" value="Go" class="go" onclick="filterFeature();">
							
						</div>

						

					</span></div>
					
					
					<div class="newsfeed">
					

						<?php if (!empty($this->items)) : ?>
						<?php foreach ($this->items as $i => $row) :?>
						
						
	


									
									<div class="newsitem ">
										<div class="icon"><div class="nrot"><div class="nrdn">
										<?php if ($row->gameid > 0):?>
										<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $row->gameid);?>"><img src="<?php echo $row->game_image;?>" width="104" height="105" border="0" /></a> 
										<?php else :?>
										<img src="/media/other/generic.png" width="104" height="105" border="0" />
										<?php endif?>
										</div></div></div>
	
										<div class="body"><div class="nrin"><div class="nrou"><div class="nrup">
	
											<div class="info">
												<h1><a href="<?php echo $row->link; ?>" class="title " sl-processed="1"><?php echo $row->title; ?></a></h1>
												
												<h3>Posted <?php echo JHtml::_('date', $row->created, JText::_('DATE_FORMAT_LC4')); ?> by <?php echo $row->author_name;?></h3>
											</div>
	
											
											
											<div class="news_newspost">
												<?php echo substr(strip_tags($row->text), 0, 500) . '...'; ?>
											</div>
											
											<!-- 
											<div class="forum">
												<div class="fimfo">
												<a href="http://www.mmorpg.com/newsroom.cfm/read/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html">Permalink</a>
												&nbsp;|&nbsp;<a href="http://www.mmorpg.com/newsroom.cfm/read/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html#comments">7 comments</a>
												
												</div>
												
												
												
												
												<div class="clear"></div>
												
												
													<div id="sl_34980">
														

														
														<div class="clear"></div>
														<div style="float: left; padding-right: 15px; padding-top: 10px;">
														<div class="fb-like" href="http://mmorpg.com/gamelist.cfm/loadNews/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html" data-send="false" data-layout="button_count" data-width="250" data-show-faces="false"></div>
														</div>
														<div class="pw-widget" pw:url="http://mmorpg.com/gamelist.cfm/loadNews/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html" pw:title="Overwatch McCree Featured in Latest Gameplay Video" style="float: left; padding-top: 10px;">											
														     <a class="pw-button-twitter pw-look-native"></a>
														     <a class="pw-button-googleplus pw-look-native"></a>
														</div>
														<div class="pw-widget" style="padding-top: 10px;" pw:url="http://mmorpg.com/gamelist.cfm/loadNews/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html" pw:title="Overwatch McCree Featured in Latest Gameplay Video">
														     <a class="pw-button-stumbleupon"></a>
														     <a class="pw-button-reddit"></a>
														     <a class="pw-button-post-share"></a>
														</div>
														


													</div>
													
												

	
											</div>
											
											
											
											<div class="clear"></div>
											 -->
											
	
										</div></div></div></div>
										<div class="clear"></div>
									</div>
	
									
									<?php endforeach; ?>
				<?php endif; ?>
	
									
									
									
					</div>
					
					<div class="clear"></div>
					
					

					<div class="action">
								<?php echo $this->pagination->getListFooter(); ?>
					</div>
					
						
						
						<div class="clear"></div>
					</div></div></div>
		</div>
		</form>
		

	<div class="clear"></div>
	</div></div></div></div></div>