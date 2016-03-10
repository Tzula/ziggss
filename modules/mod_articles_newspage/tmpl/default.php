<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$doc  = JFactory::getDocument();
?>
<div id="moreContent" class="pushc"> <div class="section"><span class="pctitle">Reviews:</span> 
						<?php if (!empty($latestReviews)) : ?>
						<?php foreach ($latestReviews as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=review&id=' . $row->gameid . '&reviewid=' . $row->id);
						?>
						<div class="item">
							<span class="title"><a href="<?php echo $link;?>"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
						</div>
								
					<?php endforeach; ?>
				<?php endif; ?>
						
					</div> <div class="section"><span class="pctitle">Popular Features:</span> 
						
						<?php if (!empty($popularFeatures)) : ?>
						<?php foreach ($popularFeatures as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=feature&id=' . $row->gameid . '&newsid=' . $row->id);
						?>
						<div class="item">
							<span class="title"><?php echo $row->name;?><br><a href="<?php echo $link;?>"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
						</div>			
					<?php endforeach; ?>
				<?php endif; ?>
						
					
						<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=features'); ?>" class="pcmorefeatures">More Features</a></div>
					
					</div> <div class="section"><span class="pctitle">Newest <a href="<?php echo JRoute::_('index.php?option=com_game&view=games');?>">Games</a>:</span>
					
					<?php if (!empty($latestGames)) : ?>
						<?php foreach ($latestGames as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=game&id=' . $row->id);
						?>	
						<div class="item">
								<span class="title"><a href="<?php echo $link;?>"><?php echo $row->name;?></a></span>
							</div>		
							<?php endforeach; ?>
						<?php endif; ?>
						

						
						</div>
					<br class="clear"></div>
<div class="clear"></div>