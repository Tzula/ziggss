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
<div class="feetures featureleftAd">
		
<div id="" class="panel panelFullWidth panelAlt panelFirst" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar ">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody "> 				

			<div class="upcomgamebox">
				<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Games to Play, Download or Pre-Order Now!</span></span></div>
					<div class="ccfboxcon">
					<ul>
					<?php foreach ($list as $item) :  ?>
					<?php 
						$img = '';
						if ($item->image != ''){
							$img = '/' . $item->image;
						}else{
							$img = '/media/other/generic.png';
						}
					?>
					<li style="background:transparent url(<?php echo $img;?>) no-repeat center left;background-size:26px 26px;"><a href="<?php echo $item->playnowlink; ?>" target="_blank" rel="nofollow"><?php echo $item->name;?></a></li>
				<?php endforeach; ?>
				<li style="background:transparent url('/media/other/generic.png') no-repeat center left;background-size:26px 26px;"><a href="<?php echo JRoute::_('index.php?option=com_game&view=playnowgames') ?>" target="_blank" rel="nofollow" title="Checkout our complete list of free to play, signup for, pre-order and download now ZIGGSS!">More Games...</a></li>	
					</ul>
				</div>
			</div>
			</div></div></div>
</div>



		</div>
<div class="clear"></div>