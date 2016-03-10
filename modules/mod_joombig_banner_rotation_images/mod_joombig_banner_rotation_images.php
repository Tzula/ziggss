<?php
/**
* @title		joombig banner rotation images module
* @website		http://www.joombig.com
* @copyright	Copyright (C) 2014 joombig.com. All rights reserved.
* @license		http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
*/
    // no direct access
    defined('_JEXEC') or die('Restricted access');
	$mosConfig_absolute_path = JPATH_SITE;
	$mosConfig_live_site = JURI :: base();
	if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }

    $module_name             = basename(dirname(__FILE__));
    $module_dir              = dirname(__FILE__);
    $module_id               = $module->id;
    $document                = JFactory::getDocument();
    $style                   = $params->get('sp_style');

    if( empty($style) )
    {
        JFactory::getApplication()->enqueueMessage( 'Slider style no declared. Check joombig banner rotation images configuration and save again from admin panel' , 'error');
        return;
    }

    $layoutoverwritepath     = JURI::base(true) . '/templates/'.$document->template.'/html/'. $module_name. '/tmpl/'.$style;
    $document                = JFactory::getDocument();
    require_once $module_dir.'/helper.php';
    $helper = new mod_Banerrotationimges($params, $module_id);
    $data = (array) $helper->display();
	$enable_jQuery 				= $params->get('enable_jQuery', 1);
	$width_module				= $params->get('width_module', "960");
	$height_module 				= $params->get('height_module', "380");
	$left_module 				= $params->get('left_module', "0");
	$show_nav 					= $params->get('show_nav', 1);
	$show_bullet 				= $params->get('show_bullet', 1);
	
	$showdes 					= $params->get('showdes', 1);
	$width_box_des				= $params->get('width_box_des', "270");
	$height_box_des 			= $params->get('height_box_des', "130");
	$top_box_des 				= $params->get('top_box_des', "20");
	$left_box_des 				= $params->get('left_box_des', "20");
	$background_box 			= $params->get('background_box', "#F5F5F5");
	$opacity_box 				= $params->get('opacity_box', "0.7");
	$font_size_title 			= $params->get('font_size_title', "20");
	$color_text_title 			= $params->get('color_text_title', "#000000");
	$font_size_des 				= $params->get('font_size_des', "14");
	$color_text_des 			= $params->get('color_text_des', "#000000");
	$show_readmore 				= $params->get('show_readmore', 1);
	
	$autoplay 					= $params->get('autoplay', 1);
	$slider_effect 				= $params->get('slider_effect', 0);
	$des_effect 				= $params->get('des_effect', 0);
	
	$animationspeed 			= $params->get('animationspeed', "4000");
    //$option = (array) $params->get('animation')->$style;
    if(  is_array( $helper->error() )  )
    {
        JFactory::getApplication()->enqueueMessage( implode('<br /><br />', $helper->error()) , 'error');
    } else {
        if( file_exists($layoutoverwritepath.'/view.php') )
        {
            require(JModuleHelper::getLayoutPath($module_name, $layoutoverwritepath.'/view.php') );   
        } else {
            require(JModuleHelper::getLayoutPath($module_name, $style.'/view') );   
        }

        $helper->setAssets($document, $style);
}