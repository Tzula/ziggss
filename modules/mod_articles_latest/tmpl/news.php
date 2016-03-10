<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div class="clear"></div>
<div class="latestnews">
					<div class="ccfbox bgred"><span class="ccfboxo"><span class="ccfboxi"><a href="index.php/news?view=news" class="title">Latest GameTeaser News</a></span></span></div>
						<div class="ccfboxcon">
						<?php if (count($list) > 0) :?>
							<?php 
								if ($list[0]->game_id > 0){
									$image =$list[0]->game_image;	
									$link = JRoute::_('index.php?option=com_game&view=new&id=' . $list[0]->game_id . '&newsid=' . $list[0]->id);
								}else{
									$image = "media/other/generic.png";
									$link = $list[0]->link;
								}
							?>
								<div class="fitem">
									<img src="/<?php echo $image;?>" class="icon" style="height:105px; width:104px;">
									<span class="bod">
										<span class="title"><a href="<?php echo $link;?>" class="flink"><?php echo $list[0]->title;?></a></span>
										<?php echo substr(strip_tags($list[0]->introtext), 0, 250) ;?>
										<!-- <a href="<?php echo $link;?>" class="flink">Read more...</a> -->
									</span>
									<div class="clear"></div>
								</div>
							<?php unset($list[0]);?>
								
								
								<div class="clear"></div>
								
								
								<table cellspacing="0" cellpadding="0" border="0">
							

								<tbody>
								
								<?php foreach ($list as $item) :  ?>
									<?php 
										if ($item->game_id > 0){
											$image =$item->game_image;	
											$link = JRoute::_('index.php?option=com_game&view=new&id=' . $item->game_id . '&newsid=' . $item->id);
										}else{
											$image = "media/other/generic.png";
											$link = $item->link;
										}
									?>
									<tr class="second" style="border-bottom: 1px solid #EEEEEE;">
									<td valign="middle" align="left"><img src="<?php echo $image;?>" class="smicon" style="height:26px; width:26px;"></td><td valign="middle" align="left"><a href="<?php echo $link;?>" class="item" title="" alt="<?php echo $item->title;?>"><?php echo $item->title;?></a></td>
									</tr>
								<?php endforeach; ?>
							

								
							
						</tbody></table>
						<a href="/index.php/news?view=news" class="tzula_more moreposts">&nbsp;&nbsp;More News...</a>
						<?php endif;?>
					</div>
				</div>
<div class="clear"></div>
