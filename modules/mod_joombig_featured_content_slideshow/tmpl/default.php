<?php
/*------------------------------------------------------------------------
# "joombig featured content slideshow" Joomla module
# Copyright (C) 2013 All rights reserved by joombig.com
# License: GNU General Public License version 2 or later; see LICENSE.txt
# Author: joombig.com
# Website: http://www.joombig.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); // no direct access 
?>
<script>
	var $jb01 = jQuery.noConflict();
	var call_autoplay = <?php echo $autoplay;?>;
	var call_pausetime = <?php echo $pausetime;?>;
</script>
<?php if($enable_jQuery == 1){?>
	<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_featured_content_slideshow/js/jquery-1.8.2.js"></script>
<?php }?>
<?php if($enable_jQuery_ui == 1){?>
	<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_featured_content_slideshow/js/jquery-ui-1.9.0.custom.min.js"></script>
<?php }?>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_featured_content_slideshow/js/jquery-ui-tabs-rotate.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_featured_content_slideshow/js/style-featured-content-slideshow.css" />

<style>
	#featured-content-slideshow1 {
		width: <?php echo ($moduleWidth-9);?>px;
		height: <?php echo $imageHeight;?>px;
		margin: 0 auto;
	}
	#featured-content-slideshow1 ul.ui-tabs-nav{ 
		left:<?php echo $imageWidth;?>px;
		width:<?php echo ($moduleWidth-$imageWidth-10);?>px; 
		height:<?php echo $imageHeight;?>px;
	}
	#featured-content-slideshow1 .ui-tabs-panel{ 
		width:<?php echo $imageWidth;?>px; 
		height:<?php echo $imageHeight;?>px; 
	}
	#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
		height:<?php echo $imagethumbheight;?>px; 
	}
</style>
<style>
	@media screen and (max-width: <?php echo $screen_width1;?>px) {
		#featured-content-slideshow1 {
			width: <?php echo ($width_module1-9);?>px;
			height: <?php echo $imageHeight1;?>px;
		}
		#featured-content-slideshow1 ul.ui-tabs-nav{ 
			left:<?php echo $imageWidth1;?>px;
			width:<?php echo ($width_module1-$imageWidth1-10);?>px; 
			height:<?php echo $imageHeight1;?>px;
		}
		#featured-content-slideshow1 .ui-tabs-panel{ 
			width:<?php echo $imageWidth1;?>px; 
			height:<?php echo $imageHeight1;?>px; 
		}
		#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
			height:<?php echo $imagethumbheight1;?>px; 
		}
		#featured-content-slideshow1 .ui-tabs-panel img{
			width:<?php echo $imageWidth1; ?>px !important;
			height:<?php echo $imageHeight1; ?>px !important;
		}
		.ui-tabs-nav-item a img{
			width:<?php echo ($imagethumbwidth1-10);?>px !important;
			height:<?php echo ($imagethumbheight1-10);?>px !important;
		}
		<?php if($width_module1 < 500){?>
			#featured-content-slideshow1 ul.ui-tabs-nav li span{
				line-height: 11px !important;
			}
		<?php } ?>
	}
	@media screen and (max-width: <?php echo $screen_width2;?>px) {
		#featured-content-slideshow1 {
			width: <?php echo ($width_module2-9);?>px;
			height: <?php echo $imageHeight2;?>px;
		}
		#featured-content-slideshow1 ul.ui-tabs-nav{ 
			left:<?php echo $imageWidth2;?>px;
			width:<?php echo ($width_module2-$imageWidth2-10);?>px; 
			height:<?php echo $imageHeight2;?>px;
		}
		#featured-content-slideshow1 .ui-tabs-panel{ 
			width:<?php echo $imageWidth2;?>px; 
			height:<?php echo $imageHeight2;?>px; 
		}
		#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
			height:<?php echo $imagethumbheight2;?>px; 
		}
		#featured-content-slideshow1 .ui-tabs-panel img{
			width:<?php echo $imageWidth2; ?>px !important;
			height:<?php echo $imageHeight2; ?>px !important;
		}
		.ui-tabs-nav-item a img{
			width:<?php echo ($imagethumbwidth2-10);?>px !important;
			height:<?php echo ($imagethumbheight2-10);?>px !important;
		}
		<?php if($width_module2 < 500){?>
			#featured-content-slideshow1 ul.ui-tabs-nav li span{
				line-height: 11px !important;
			}
		<?php } ?>
	}
	@media screen and (max-width: <?php echo $screen_width3;?>px) {
		#featured-content-slideshow1 {
			width: <?php echo ($width_module3-9);?>px;
			height: <?php echo $imageHeight3;?>px;
		}
		#featured-content-slideshow1 ul.ui-tabs-nav{ 
			left:<?php echo $imageWidth3;?>px;
			width:<?php echo ($width_module3-$imageWidth3-10);?>px; 
			height:<?php echo $imageHeight3;?>px;
		}
		#featured-content-slideshow1 .ui-tabs-panel{ 
			width:<?php echo $imageWidth3;?>px; 
			height:<?php echo $imageHeight3;?>px; 
		}
		#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
			height:<?php echo $imagethumbheight3;?>px; 
		}
		#featured-content-slideshow1 .ui-tabs-panel img{
			width:<?php echo $imageWidth3; ?>px !important;
			height:<?php echo $imageHeight3; ?>px !important;
		}
		.ui-tabs-nav-item a img{
			width:<?php echo ($imagethumbwidth3-10);?>px !important;
			height:<?php echo ($imagethumbheight3-10);?>px !important;
		}
		<?php if($width_module3 < 500){?>
			#featured-content-slideshow1 ul.ui-tabs-nav li span{
				line-height: 11px !important;
			}
		<?php } ?>
	}
	@media screen and (max-width: <?php echo $screen_width4;?>px) {
		#featured-content-slideshow1 {
			width: <?php echo ($width_module4-9);?>px;
			height: <?php echo $imageHeight4;?>px;
		}
		#featured-content-slideshow1 ul.ui-tabs-nav{ 
			left:<?php echo $imageWidth4;?>px;
			width:<?php echo ($width_module4-$imageWidth4-10);?>px; 
			height:<?php echo $imageHeight4;?>px;
		}
		#featured-content-slideshow1 .ui-tabs-panel{ 
			width:<?php echo $imageWidth4;?>px; 
			height:<?php echo $imageHeight4;?>px; 
		}
		#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
			height:<?php echo $imagethumbheight4;?>px; 
		}
		#featured-content-slideshow1 .ui-tabs-panel img{
			width:<?php echo $imageWidth4; ?>px !important;
			height:<?php echo $imageHeight4; ?>px !important;
		}
		.ui-tabs-nav-item a img{
			width:<?php echo ($imagethumbwidth4-10);?>px !important;
			height:<?php echo ($imagethumbheight4-10);?>px !important;
		}
		<?php if($width_module4 < 500){?>
			#featured-content-slideshow1 ul.ui-tabs-nav li span{
				line-height: 11px !important;
			}
		<?php } ?>
	}
	@media screen and (max-width: <?php echo $screen_width5;?>px) {
		#featured-content-slideshow1 {
			width: <?php echo ($width_module5-9);?>px;
			height: <?php echo $imageHeight5;?>px;
		}
		#featured-content-slideshow1 ul.ui-tabs-nav{ 
			left:<?php echo $imageWidth5;?>px;
			width:<?php echo ($width_module5-$imageWidth5-10);?>px; 
			height:<?php echo $imageHeight5;?>px;
		}
		#featured-content-slideshow1 .ui-tabs-panel{ 
			width:<?php echo $imageWidth5;?>px; 
			height:<?php echo $imageHeight5;?>px; 
		}
		#featured-content-slideshow1 li.ui-tabs-nav-item a{ 
			height:<?php echo $imagethumbheight5;?>px; 
		}
		#featured-content-slideshow1 .ui-tabs-panel img{
			width:<?php echo $imageWidth5; ?>px !important;
			height:<?php echo $imageHeight5; ?>px !important;
		}
		.ui-tabs-nav-item a img{
			width:<?php echo ($imagethumbwidth5-10);?>px !important;
			height:<?php echo ($imagethumbheight5-10);?>px !important;
		}
		<?php if($width_module5 < 500){?>
			#featured-content-slideshow1 ul.ui-tabs-nav li span{
				line-height: 11px !important;
			}
		<?php } ?>
	}
</style>
<div class="main-featured-content-slideshow">
    <div id="featured-content-slideshow1">
        <ul class="ui-tabs-nav">
			<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1) { 
			?>
				<li class="ui-tabs-nav-item" id="nav-fragment-<?php echo $loop;?>">
					<a href="#fragment-<?php echo $loop;?>">
						<img src="<?php echo $mosConfig_live_site; ?>/<?php echo $imagethumb[$loop];?>" style="width:<?php echo ($imagethumbwidth-10);?>px; height:<?php echo ($imagethumbheight-10);?>px;"/>
						<?php if($style_view == 0){?>
							<span><?php echo $title[$loop]; ?></span>
						<?php }?>
					</a>
				</li>
			<?php
			}  
			?>
        </ul>
        <!-- First Content -->
		<?php for ($loop2 = 1; $loop2 <= $tabNumber; $loop2 += 1) 
		{ 
					if ($loop2 == 1)
					{?>
						<div id="fragment-1" class="ui-tabs-panel">
							<img src="<?php echo $mosConfig_live_site; ?>/<?php echo $image[$loop2];?>" style="width:<?php echo $imageWidth; ?>px; height:<?php echo $imageHeight; ?>px;"/>
							<?php if(($display_title ==1)&&($display_des ==1)){?>
								<div class="info-feature-content-slideshow">
									<h2><a href="<?php echo $readmorelink[$loop2]; ?>"><?php echo $title[$loop2]; ?></a></h2>
									<?php if($display_readmore == 1){?>
										<p><?php echo $info[$loop2]; ?>...<a href="<?php echo $readmorelink[$loop2]; ?>">read more</a></p>
									<?php } else {?>
										<p><?php echo $info[$loop2]; ?></p>
									<?php }?>
								</div>
							<?php } else {?>
									<?php if($display_title ==1){?>
										<div class="info-feature-content-slideshow">
											<h2><a href="<?php echo $readmorelink[$loop2]; ?>"><?php echo $title[$loop2]; ?></a></h2>
										</div>
									<?php }?>
									<?php if($display_des ==1){?>
										<div class="info-feature-content-slideshow">
											<?php if($display_readmore == 1){?>
												<p><?php echo $info[$loop2]; ?>...<a href="<?php echo $readmorelink[$loop2]; ?>">read more</a></p>
											<?php } else {?>
												<p><?php echo $info[$loop2]; ?></p>
											<?php }?>
										</div>
									<?php }?>
							<?php }?>
						</div>
					<?php
					}
					else
					{
					?>
						<div id="fragment-<?php echo $loop2;?>" class="ui-tabs-panel">
							<img src="<?php echo $mosConfig_live_site; ?>/<?php echo $image[$loop2];?>" style="width:<?php echo $imageWidth; ?>px; height:<?php echo $imageHeight; ?>px;"/>
							<?php if(($display_title ==1)&&($display_des ==1)){?>
								<div class="info-feature-content-slideshow">
									<h2><a href="<?php echo $readmorelink[$loop2]; ?>"><?php echo $title[$loop2]; ?></a></h2>
									<?php if($display_readmore == 1){?>
										<p><?php echo $info[$loop2]; ?>...<a href="<?php echo $readmorelink[$loop2]; ?>">read more</a></p>
									<?php } else {?>
										<p><?php echo $info[$loop2]; ?></p>
									<?php }?>
								</div>
							<?php } else {?>
									<?php if($display_title ==1){?>
										<div class="info-feature-content-slideshow">
											<h2><a href="<?php echo $readmorelink[$loop2]; ?>"><?php echo $title[$loop2]; ?></a></h2>
										</div>
									<?php }?>
									<?php if($display_des ==1){?>
										<div class="info-feature-content-slideshow">
											<?php if($display_readmore == 1){?>
												<p><?php echo $info[$loop2]; ?>...<a href="<?php echo $readmorelink[$loop2]; ?>">read more</a></p>
											<?php } else {?>
												<p><?php echo $info[$loop2]; ?></p>
											<?php }?>
										</div>
									<?php }?>
							<?php }?>
						</div>
					<?php
					}
					?>
			<?php
		}
			?>
    </div>
</div>