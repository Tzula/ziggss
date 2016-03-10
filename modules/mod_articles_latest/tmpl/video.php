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
<div class="exclusiveVideos">
					<div class="ccfbox bgblue" style="padding-left:0px;"><span class="ccfboxo"><span class="ccfboxi"><a href="index.php/videos" class="title">Latest <span style="color:#d7352f">TEASER TRAILER</span></a></span></span></div>
					<div class="ccfboxcon">
						<div class="viddata"><div class="insidevr">
						
						
						<?php foreach ($list as $item) :  ?>
						
							<div class="vrow pass_1"> 
									<a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)); ?>" class="vid">
										<img src="/<?php echo json_decode($item->images)->image_intro;?>" alt="<?php echo $item->title; ?>" width="102" height="73" border="0">
										<div class="play" title="Play this video"></div>
										<div class="titl" style="color:#ffffff;"><?php echo $item->title; ?></div>
										<div class="over">
											<span class="views"><?php echo $item->hits;?>&nbsp;</span><span class="clear"></span>
										</div>
									</a>
							</div>
						<?php endforeach; ?>
						
							
								
								
							<div class="clear"></div>
						</div></div>
					<a href="/index.php/teaser-trailer" class="tzula_more morevids">&nbsp;&nbsp;More Teaser Trailers...</a>
					</div>


				</div>
