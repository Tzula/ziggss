<?php
/**
* @title		joombig banner rotation images module
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2013 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/

    // no direct access
    defined('_JEXEC') or die;
?>
<script>
jQuery.noConflict(); 
</script>
<?php
if ($enable_jQuery == 1) {?>
   <script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/js/jquery-2.1.1.min.js"></script>
<?php }?>
    <script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/js/jssor.core.js"></script>
    <script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/js/jssor.utils.js"></script>
    <script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/js/jssor.slider.mini.js"></script>
<script>
		var  call_width, cal_height,call_autoplay,call_animationspeed,call_slider_effect,call_des_effect,call_show_nav,call_show_bullet;
		call_width = <?php echo $width_module;?>;
		cal_height = <?php echo $height_module;?>;
		call_autoplay = <?php echo $autoplay;?>;
		call_animationspeed = <?php echo $animationspeed;?>;
		call_slider_effect = <?php echo $slider_effect;?>;
		call_des_effect = <?php echo $des_effect;?>;
		call_show_nav = <?php echo $show_nav;?>;
		call_show_bullet = <?php echo $show_bullet;?>;
</script>
	<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/js/rotatorimages.js"></script>
	<link rel="stylesheet" href="<?php echo $mosConfig_live_site; ?>/modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/css/rotatorimages.css" />
	
<?php
// add your stylesheet
$document->addStyleSheet( 'modules/mod_joombig_banner_rotation_images/tmpl/Banerrotationimges/css/rotatorimages.css' );
// style declaration
$document->addStyleDeclaration( '
	#jb05_slider1_container .joombig-caption.default {
		background: '.$background_box.';
		opacity: '.$opacity_box.';
	}
' );
?>

<style type="text/css">
    .fuseNav {
        width: 100%;
    }
    .fuseNav a{
        display: block;
        float: left;
        font-family: "proxima-nova","helvetica neue",arial,sans-serif;
        font-size: 11px;
        font-weight: 700;
        line-height: 40px;
        text-transform: uppercase;
        text-decoration: none;
    }
    .fuseNav a span {
        display: block;
    }
    .fuseNav a .text {
        border-left: 1px solid #CCC;
        height: 40px;
        padding: 5px 15px 0;
    }
    .fuseNav a.active {
        color: #d3222a !important;
    }
    .fuseNav .fuse {
        background-color: #CCC;
        height: 5px;
        overflow: hidden;
    }
    .fuseNav a.previous .fuse {
        background-color: #333;
    }
    .fuseNav a.selected .fuse {
        background-color: #d3222a;
    }
    .fuseNav a .fuse .activeFuse {
        background-color: #d3222a;
        float: right;
        height: 5px;
        width: 0;
    }
    .fuseNav a.active .fuse .activeFuse {
        float: left;
    }
</style>
	
<div id="joombig_banner_rotation_images_main" value="1">	
    <div id="jb05_slider1_container" style="position: relative; width: <?php echo $width_module;?>px; height: <?php echo $height_module;?>px;left:<?php echo $left_module;?>px;margin:0 auto;">
        
        
        <div class="fuseNav clearfix">
        <?php
foreach($data as $index1=>$value1)
{?>
<?php if ($index1 > 4) {break;}?>

 <a style="width: <?php if ($index1 + 1 ==  5):?>192px<?php else:?>189px<?php endif;?>;" href="<?php echo $value1['Link']?>" class="first previous">
                <span class="text" style="overflow:hidden;">
                    <?php echo $value1['title']?>                          </span>
                <span class="fuse">
                    <span class="activeFuse" style="width: 0px;"></span>
                </span>
            </a>
            <?php
		
} ?>
           
         </div>
        
        
        <!-- Loading Screen -->
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <!-- Slides Container -->
        <div id="banner_slides" u="slides" style="cursor: move; position: absolute; left: 0px; top: 50px; width: <?php echo $width_module;?>px; height: <?php echo $height_module-50;?>px;overflow: hidden;">
			<?php
$count1 =1;
foreach($data as $index=>$value)
{?>
            <div>
                <a u=image href="<?php echo $value['Link']?>"><img src="<?php echo JURI::root().$value['image'] ?>" /></a>
				<?php if($showdes == 1){?>
					<div u="caption" t="*" class="joombig-caption default" style="left: <?php echo $left_box_des;?>px; top: <?php echo $top_box_des;?>px; width: <?php echo $width_box_des;?>px; height: <?php echo $height_box_des;?>px; -webkit-transform: rotate(0deg) scale(1) perspective(2000px);"> 
						<div style="padding: 30px; ">
							<h2 style="font-size: <?php echo $font_size_title;?>px;color:<?php echo $color_text_title;?>; line-height: normal; -webkit-transform: perspective(2000px);"> <?php echo $value['title']?></h2>
							<p style="font-size: <?php echo $font_size_des;?>px;color:<?php echo $color_text_des;?>;-webkit-transform: perspective(2000px);"><?php echo $value['introtext']?></p>
							<?php if($show_readmore == 1){?>
								<a class="link_detail" href="<?php echo $value['Link']?>" style="font-size: <?php echo $font_size_des;?>px;background:transparent;-webkit-transform: perspective(2000px);">read more</a>
							<?php }?>
						</div>
					</div>
				<?php }?>
            </div>
            <?php
		$count1++ ; 
} ?>
        </div>
        
        <!-- navigator container -->
        <div u="navigator" class="jssorn01" style="position: absolute; bottom: 10px; right: 10px;">
            <!-- navigator item prototype -->
            <div u="prototype" style="POSITION: absolute; WIDTH: 12px; HEIGHT: 12px;"></div>
        </div>
        <!-- Navigator Skin End -->

        <!-- Arrow Left -->
    <!--
        <span u="arrowleft" class="jssord05l" style="width: 40px; height: 40px; top: <?php echo ($height_module/2-27);?>px; left: 8px;">
        </span>
    -->
        <!-- Arrow Right -->
    <!--
        <span u="arrowright" class="jssord05r" style="width: 40px; height: 40px; top: <?php echo ($height_module/2-27);?>px; right: 8px">
        </span>
    -->
        <!-- Direction Navigator Skin End -->
    </div>
    <!-- Jssor Slider End -->
</div>
<script>
jQuery.noConflict(); 
// 隐藏 Copyright@ joombig.com Div
//$("#joombig_banner_rotation_images_main div:eq(1)").css("display","none");
</script>
