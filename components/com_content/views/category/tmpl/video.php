<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

JHtml::_('behavior.caption');
?>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="videolist" class="panel panelFullWidth panelPrimary videolist" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Videos</h3>
			</div>
		</div>
		<div id="" class="panelBody ">

		<div id="sectionHeader"><span>
			<h1>Videos</h1>
			<!-- 
			<div class="panes">
				<a href="http://www.mmorpg.com/videos.cfm/sort/date/order/desc/view/latest" class="latest current" sl-processed="1">Latest only</a>
				<a href="http://www.mmorpg.com/videos.cfm/sort/date/order/desc/view/basic" class="basici" sl-processed="1">Basic view</a>
				<a href="http://www.mmorpg.com/videos.cfm/sort/date/order/desc/view/extended" class="extended" sl-processed="1">Extended view</a>
			</div>
			 -->
		</span></div>

		<div class="vlistover" style="background:none">

		<div class="gvpricon" style="width:100%;">

			
					<div class="vcontent">
						<div class="list">
							<?php foreach ($this->items as $i => $article) : ?>
								<div class="entry">
									<div class="thumbnail"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>" sl-processed="1"><img src="/<?php echo json_decode($article->images)->image_intro;?>" alt="" width="102" height="73" border="0"></a></div>
									<div class="details" style="width:650px;">
										<div class="title"><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>" sl-processed="1"><?php echo $this->escape($article->title); ?></a>&nbsp;<span class="info"></span></div>
										<div class="info">
										<?php 
											if ($article->game_id <= 1): ?>
												General
										<?php else:?>
												<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $article->game_id);?>"><?php echo $article->game_title; ?></a>
										<?php endif?>
										<br><?php echo $article->author;?>, added on <?php echo JHtml::_('date', $article->created, JText::_('DATE_FORMAT_LC4')); ?></div>
										<div class="desc">
											<?php echo $article->introtext; ?>
										</div>
										
										<!--  
											<div class="info">119 views&nbsp;&nbsp;<a href="http://www.mmorpg.com/showVideo.cfm/videoId/4530#vanilla-comments" vanilla-identifier="videos_4530" sl-processed="1">1 Comment</a></div>
										-->
									</div>
									<div class="clear"></div>
								</div>
							
							<?php endforeach;?>	
							<?php echo $this->pagination->getListFooter(); ?>	
							
						</div>

						
						<!--  
						<div class="action">
							<table cellspacing="0" cellpadding="0" border="0" align="center" class="pageJumpList">
								<tbody><tr>
									<td class="label"><a href="http://www.mmorpg.com/videos.cfm/view/basic/page/2" sl-processed="1">More&nbsp;videos&nbsp;»</a></td>
								</tr>
							</tbody></table>
						</div>
						-->
						
						<div class="clear"></div>
					</div>
				

		</div>

		
		
		
		

		
		
		
		
		
		
		
		<div class="clear"></div>

		</div>		

		</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>