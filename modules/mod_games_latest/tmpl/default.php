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
<div class="upcomgame">
			<div class="ccfbox bgblue" style="background-image: none;"><span class="ccfboxo"><span class="ccfboxi">Newly Listed Games</span></span></div>
							<div class="ccfboxcon">

				<ul>
				
				<?php foreach ($list as $item) :  ?>
					<?php 
						$img = '';
						if ($item->image != ''){
							$img = $item->image;
						}else{
							$img = $doc->baseurl . '/media/other/generic.png';
						}
						$link = JRoute::_('index.php?option=com_game&view=game&id=' . $item->id);
					?>
					<li style="background:transparent url(<?php echo $img;?>) no-repeat center left;background-size:26px 26px;"><a href="<?php echo $link; ?>" target="_blank" rel="nofollow"><?php echo $item->name;?></a></li>
				<?php endforeach; ?>
					<li style="background:transparent url(<?php echo $doc->baseurl . '/media/other/generic.png';?>) no-repeat center left;background-size:26px 26px;"><a href="<?php echo JRoute::_('index.php?option=com_game&view=games');; ?>" target="_blank" rel="nofollow">Our Game List...</a></li>	
				</ul>

			</div>
		</div>
<div class="clear"></div>