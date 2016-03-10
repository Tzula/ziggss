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
<div class="bloggers">
					<div class="ccfbox bgblue">
						<span class="ccfboxo"><span class="ccfboxi">
							<a href="javascript:void();" class="title">Developer Blogs</a>
						</span></span>
					</div>
					<div class="ccfboxcon">

						
						<div class="large">
						
						<?php foreach ($list as $key => $item) :  ?>
							<div class="bentry">
									<i class="bavatar">
										<a href="<?php echo $item->weblink?>" class="btitle2">
										
											<img src="<?php echo json_decode($item->images)->image_first;?>" align="center" border="0">
										
										</a>
									</i>
									<p><strong><a href="<?php echo $item->weblink?>" class="btitle" style="display: block;"><?php echo $item->name;?></a></strong>
									<?php echo strip_tags($item->description);?>
									</p>
									<div class="clear"></div>
								</div>
					<?php endforeach; ?>
							
								
							
								
							
							
						
							
						</div>

						<div class="smaller">
							<div class="hbsecint">
								<a href="javascript:void();" class="title">Highlighted Blogs</a>
							</div>
							
							<?php
	if ($feed != false)
	{
		// Image handling
		$iUrl	= isset($feed->image) ? $feed->image : null;
		$iTitle = isset($feed->imagetitle) ? $feed->imagetitle : null;
		?>
	<!-- Show items -->
	<?php if (!empty($feed))
	{ ?>
		<?php for ($i = 0; $i < $params->get('rssitems', 5); $i++)
		{
			if (!$feed->offsetExists($i))
			{
				break;
			}
			?>
			<?php
				$uri  = (!empty($feed[$i]->uri) || !is_null($feed[$i]->uri)) ? $feed[$i]->uri : $feed[$i]->guid;
				$uri  = substr($uri, 0, 4) != 'http' ? $params->get('rsslink') : $uri;
				$text = !empty($feed[$i]->content) ||  !is_null($feed[$i]->content) ? $feed[$i]->content : $feed[$i]->description;
			?>
			<div class="bentry">
									<?php if(isset($rsssourse)):?>	
									<i class="bavatar"><a href="<?php echo $rsssourse->weblink;?>" class="btitle2">
										
											<img src="<?php echo json_decode($rsssourse->images)->image_first;?>">
										
										</a>
									</i>
									<?php endif;?>
									<p><strong><a href="<?php echo htmlspecialchars($uri); ?>" class="btitle" style="display: block;"><?php echo $feed[$i]->title; ?></a></strong>
									<?php if (!empty($text)) : ?>
									
									<?php
									// Strip the images.
									//$text = JFilterOutput::stripImages($text);
									$text = strip_tags($text);
									echo substr($text, 0, 100) . '...';
									?>
									
					<?php endif; ?>
									</p>
									<div class="clear"></div>
								</div>
							
			
				
		<?php } ?>
	<?php } ?>
	<?php }
?>


							
						</div>
						
						
						
						
						


						

						

						
						
						
						
					</div>


				</div>
<div class="clear"></div>