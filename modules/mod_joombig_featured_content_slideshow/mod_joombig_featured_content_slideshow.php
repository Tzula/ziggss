<?php

/*------------------------------------------------------------------------
# "joombig featured content slideshow" Joomla module
# Copyright (C) 2013 All rights reserved by joombig.com
# License: GNU General Public License version 2 or later; see LICENSE.txt
# Author: joombig.com
# Website: http://www.joombig.com
-------------------------------------------------------------------------*/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();
if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }

// get parameters from the module's configuration
$borderWidth = $params->get('borderWidth','0');

$tabNumber = 4;
$enable_jQuery 		= $params->get('enable_jQuery',1);
$enable_jQuery_ui 	= $params->get('enable_jQuery_ui',1);

$style_view 	= $params->get('style_view',0);
$moduleWidth = $params->get('moduleWidth','490');
$moduleHeight = $params->get('moduleHeight','294');
if($style_view == 0){
	$imageWidth = $moduleWidth*20/33;
	$imagethumbwidth = ($moduleWidth-$imageWidth-10)/3;
} else {
	$imageWidth = $moduleWidth*20/25;
	$imagethumbwidth = ($moduleWidth-$imageWidth-27);
}
$imageHeight =$moduleHeight-10;
$imagethumbheight = ($imageHeight-10)/4;

$autoplay 	= $params->get('autoplay',1);
$pausetime = $params->get('pausetime','5000');

$display_title 	= $params->get('display_title',1);
$display_des 	= $params->get('display_des',1);
$display_readmore 	= $params->get('display_readmore',1);

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$title[$loop] = $params->get('title'.$loop,'joombig.com');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$readmorelink[$loop] = $params->get('readmorelink'.$loop,'http://joombig.com');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$inforight[$loop] = $params->get('inforight'.$loop,'info right');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$info[$loop] = $params->get('info'.$loop,'banner images slider joombig.com.');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$image[$loop] = $params->get('image'.$loop,'image'.$loop.'joombig.jpg');
}
for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$imagethumb[$loop] = $params->get('imagethumb'.$loop,'image'.$loop.'joombig.jpg');
}

$screen_width1				= $params->get('screen_width1',"0");
$width_module1				= $params->get('width_module1',"0");
$height_module1				= $params->get('height_module1',"0");

$screen_width2				= $params->get('screen_width2',"0");
$width_module2				= $params->get('width_module2',"0");
$height_module2				= $params->get('height_module2',"0");

$screen_width3				= $params->get('screen_width3',"0");
$width_module3				= $params->get('width_module3',"0");
$height_module3				= $params->get('height_module3',"0");

$screen_width4				= $params->get('screen_width4',"0");
$width_module4				= $params->get('width_module4',"0");
$height_module4				= $params->get('height_module4',"0");

$screen_width5				= $params->get('screen_width5',"0");
$width_module5				= $params->get('width_module5',"0");
$height_module5				= $params->get('height_module5',"0");

if($style_view == 0){
	$imageWidth1 = $width_module1*20/33;
	$imagethumbwidth1 = ($width_module1-$imageWidth1-10)/3;
	
	$imageWidth2 = $width_module2*20/33;
	$imagethumbwidth2 = ($width_module2-$imageWidth2-10)/3;
	
	$imageWidth3 = $width_module3*20/33;
	$imagethumbwidth3 = ($width_module3-$imageWidth3-10)/3;
	
	$imageWidth4 = $width_module4*20/33;
	$imagethumbwidth4 = ($width_module4-$imageWidth4-10)/3;
	
	$imageWidth5 = $width_module5*20/33;
	$imagethumbwidth5 = ($width_module5-$imageWidth5-10)/3;
} else {
	$imageWidth1 = $width_module1*20/25;
	$imagethumbwidth1 = ($width_module1-$imageWidth1-27);
	
	$imageWidth2 = $width_module2*20/25;
	$imagethumbwidth2 = ($width_module2-$imageWidth2-27);
	
	$imageWidth3 = $width_module3*20/25;
	$imagethumbwidth3 = ($width_module3-$imageWidth3-27);
	
	$imageWidth4 = $width_module4*20/25;
	$imagethumbwidth4 = ($width_module4-$imageWidth4-27);
	
	$imageWidth5 = $width_module5*20/25;
	$imagethumbwidth5 = ($width_module5-$imageWidth5-27);
}

$imageHeight1 =$height_module1-10;
$imagethumbheight1 = ($imageHeight1-10)/4;

$imageHeight2 =$height_module2-10;
$imagethumbheight2 = ($imageHeight2-10)/4;

$imageHeight3 =$height_module3-10;
$imagethumbheight3 = ($imageHeight3-10)/4;

$imageHeight4 =$height_module4-10;
$imagethumbheight4 = ($imageHeight4-10)/4;

$imageHeight5 =$height_module5-10;
$imagethumbheight5 = ($imageHeight5-10)/4;

// get the document object
$doc =  JFactory::getDocument();

require(JModuleHelper::getLayoutPath('mod_joombig_featured_content_slideshow'));