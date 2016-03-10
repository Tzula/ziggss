<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_news
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>

<div class="comic">
					<div class="ccfbox bgblue">
						<span class="ccfboxo"><span class="ccfboxi">
							<a href="javascript:void();" class="title"><?php echo $params->get('header_class');?></a>
						</span></span>
					</div>
					<div class="ccfboxcon">

						
						<div class="large">
						
						<?php foreach ($list as $key => $item) :  ?>
						<?php 
								if (json_decode($item->images)->image_intro != ''){
									$image = json_decode($item->images)->image_intro;	$link = JRoute::_('index.php?option=com_game&view=new&id=' . $list[0]->game_id . '&newsid=' . $list[0]->id);
								}else{
									$image = "media/other/generic.png";
								}
							?>
							<div class="bentry">
									<i class="bavatar">
										<a href="<?php echo $item->link?>" class="btitle2">
										
											<img src="<?php echo $image;?>" align="center" border="0" style="width:80px;height:80px;">
										
										</a>
									</i>
									<p><strong><a href="<?php echo $item->link?>" class="btitle" style="display: block;"><?php echo $item->title;?></a></strong>
									<?php echo substr(strip_tags($item->introtext), 0, 500) . '...';?>
									</p>
									<div class="clear"></div>
								</div>
					<?php endforeach; ?>
							
								
							
								
							
							
						
							
						</div>

						

						
					</div>


				</div>
<div class="clear"></div>
