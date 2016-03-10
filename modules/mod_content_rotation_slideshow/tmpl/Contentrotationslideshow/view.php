<?php
/**
* @title		content rotation slideshow module
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2013 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

    // no direct access
    defined('_JEXEC') or die;
?>

<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/css/style-content-roration-slideshow.css" />
<style>
	.container-content-rotation-slideshow {
		width:<?php echo $width;?>;
		height:<?php echo $height;?>px;
	}
	.cr-container{
		height:<?php echo $height;?>px;
	}
</style>
<div class="container-content-rotation-slideshow">
<div class="content-content-rotation-slideshow">
	<div class="wrapper-content-rotation-slideshow">
		<div class="cr-container" id="cr-container">
			<div class="cr-content-wrapper" id="cr-content-wrapper">
		<?php
			$count1 =1;
				foreach($data as $index=>$value)
				{?>
					<?php if($count1 == 1) {  ?>
						<div class="cr-content-container" id="content-<?php echo $count1 ?>" style="display:block;">
							<img src="<?php echo JURI::root().$value['image'] ?>"class="cr-img"/>
							<div class="cr-content">
								<div class="cr-content-headline">
									<h2><?php echo $value['title']?></h2>
									<h3><span><?php echo $value['titleshort']?></span> 
									<a href="<?php echo $value['Link']?>" class="cr-more-link"> read more &rarr;</a></h3>
								</div>
								<div class="cr-content-text">
									<p><?php echo $value['titlelong']?>.</p>
								</div>
							</div>
						</div>
					<?php }  
					else
					{?>
						<div class="cr-content-container" id="content-<?php echo $count1 ?>">
							<img src="<?php echo JURI::root().$value['image'] ?>"class="cr-img"/>
							<div class="cr-content">
								<div class="cr-content-headline">
									<h2><?php echo $value['title']?></h2>
									<h3><span><?php echo $value['titleshort']?></span> 
									<a href="<?php echo $value['Link']?>" class="cr-more-link"> read more &rarr;</a></h3>
								</div>
								<div class="cr-content-text">
									<p><?php echo $value['titlelong']?>.</p>
								</div>
							</div>
						</div>
					<?php
					}?>
			<?php
						$count1++ ; 
				} ?>
			</div>
				
				
			<div class="cr-thumbs">
			<?php
				$count2 =1;
				foreach($data as $index=>$value)
			{?>
				<?php if($count2 == 1) {  ?>
				<div data-content="content-1" class="cr-selected">
				<img src="<?php echo JURI::root().$value['image'] ?>"/><h4><?php echo $value['title']?></h4></div>
				<?php } else { ?>
				<div data-content="content-<?php echo $count2 ?>">
				<img src="<?php echo JURI::root().$value['image'] ?>"/><h4><?php echo $value['title']?></h4></div>
				<?php }  ?>
			<?php
					$count2++ ; 
			} ?>
			</div>
		</div><!-- cr-container -->
		
		<div class="clr"></div>
	</div><!-- wrapper -->
	<div class="clr"></div>
</div><!-- content -->
</div>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/js/jquery-noconflict.js"></script>
<?php
if ($enable_jQuery == 1) {?>
	<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/js/jquery-1.9.1.min.js"></script>
<?php }?>
<script>
	var call_autoplay,call_speed,call_show_thumb;
	call_autoplay = <?php echo $autoplay;?>;
	call_speed = <?php echo $speed;?>;
	call_show_thumb = <?php echo $show_thumb;?>;
</script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/js/jquery.easing.rotation.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_content_rotation_slideshow/tmpl/Contentrotationslideshow/js/jquery.crotator.js"></script>
