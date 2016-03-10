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
		<meta name="description" content="<?php echo $description; ?>" />
		<meta name="keywords" content="<?php echo $description; ?>" />
		<title><?php echo $sitename; ?></title> 
		<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/radiance.css" type="text/css" media="screen,projection" title="radiance" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/fullmoon/fullmoon.css" type="text/css" media="screen,projection" />
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
					
					<a href="http://www.rtsguru.com/?utm_campaign=NetworkBar&utm_medium=topbar&utm_source=mmorpg" target="_blank" style="padding-left:14px; padding-right:6px; background:transparent url(http://images.mmorpg.com/images/rts_icon.gif) no-repeat center left">RTSguru</a>-->
				</div>
			</div>
			<div id="axTopLeaves">
				<div id="topContainer">
					<div id="userarea">
						<jdoc:include type="modules" name="top1" style="none" />
					</div>
					<!--
					<a href="" onclick="return showQuickGamelistPanel();" id="showQGLpanela">Show Quick Gamelist</a>
					<a href="http://www.mmorpg.com/gamelist.cfm/game/1095" id="showQGLRandonPanela">Jump to Random Game</a>
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
							<div id="logo">
								<a href="/"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/fullmoon/frame_r4_logo.jpg" width="230" height="62" border="0" alt="" /></a> 	
							</div>	
							<div id="stats">
								<span class="label">Members:</span><span class="value">2,982,040</span>
								<span class="label">Users Online:</span><span class="value">1,977</span><br />
								<span class="label"><a href="\gamelist.cfm">Games</a>:</span><span class="value">824</span>&nbsp;
								<span class="label"><a href="\discussion2.cfm">Posts</a>:</span><span class="value">6,429,992</span>	
							</div>
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
							
								<a href="http://www.mmorpg.com/gameon.cfm/cast/96" style=" height:40px; width:990px; display:block; background-image: url('http://images.mmorpg.com/images/announcements/62012/15_20120601_gameon_r0.jpg'); line-height:40px; text-indent:153px; font-size:18px; text-align: left !important; font-weight:bold; color:#fff;" id="hcilinkf">Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive</a>
						
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
<!--
Start of DoubleClick Floodlight Tag: Please do not remove
Activity name of this tag: Site 2 Homepage
URL of the webpage where the tag is expected to be placed: http://www.tbd.com/
This tag must be placed between the <body> and </body> tags, as close as possible to the opening tag.
Creation Date: 05/24/2011
-->
<script type="text/javascript">
var axel = Math.random() + "";
var a = axel * 10000000000000;
document.write('<iframe src="http://fls.doubleclick.net/activityi;src=2941448;type=retar140;cat=mmorp785;ord=' + a + '?" width="1" height="1" frameborder="0" style="display:none"></iframe>');
</script>
<noscript>
<iframe src="http://fls.doubleclick.net/activityi;src=2941448;type=retar140;cat=mmorp785;ord=1?" width="1" height="1" frameborder="0" style="display:none"></iframe>
</noscript>

<!-- End of DoubleClick Floodlight Tag: Please do not remove -->



	<script type="text/javascript">
		var haveFocus	= true;
		function onBlur() {
			haveFocus = false;
		};
		function onFocus(){
			haveFocus = true;
		};

		if (/*@cc_on!@*/false) { // check for Internet Explorer
			document.onfocusin = onFocus;
			document.onfocusout = onBlur;
		} else {
			window.onfocus = onFocus;
			window.onblur = onBlur;
		}

		var recentPosts = new Array();
		var tickerRunning = true;
		var recentPostsGrabCount	= 0;

		function getTickerPosts(){
			/*
			if(!tickerRunning || recentPostsGrabCount > 25 || !haveFocus){
					//alert('Not running update');
					return;
			} else recentPostsGrabCount++;
			var params = new Object();
			params['returnCount'] = 5;
			http('post','/ajax/tools.cfc?method=getRecentPostsForTickerBox',getTickerPostsReq_callback,params,true);
			*/
		}

		function getTickerPostsReq_callback(obj){
			var time = 0;
			//for(var i=obj.getRowCount()-1;i>=0;i--){
			for(var i=0;i<obj.getRowCount();i++){
				var forumId = obj.getField(i,'forumid');
				var forum = obj.getField(i,'forumtitle');
				var lastPostId = obj.getField(i,'lastpostid');
				var thread = obj.getField(i,'t_title');
				var minutesAgo = obj.getField(i,'minutesAgo');
				var categoryId = obj.getField(i,'categoryId');
				var category = obj.getField(i,'categoryTitle');
				var username = obj.getField(i,'lp_username');
				var userid = obj.getField(i,'lp_userId');
				var threadPosts = obj.getField(i,'t_posts');
				var threadId = obj.getField(i,'t_threadId');
				var tpage = 1;

				// set time
				if(minutesAgo >= 60){
					if(Math.floor(minutesAgo/60) >= 24){
						time = Math.floor(minutesAgo/60/24)+"d ago";
					}
					else {
						time = Math.floor(minutesAgo/60)+"h ago";
					}
				} else {
					time = minutesAgo+"m ago";
				}
				var cellOne = "rp"+parseInt(i+1)+"c2";
				document.getElementById(cellOne).innerHTML = time;

				// Page
				var newpage = Math.floor(threadPosts/20);
				if(newpage >= 1){ tpage = newpage; }

				// set content
				var cellTwo = "rp"+parseInt(i+1)+"c1";
				document.getElementById(cellTwo).innerHTML = '<a href="/discussion2.cfm/thread/'+threadId+'/page/1">'+thread+'</a><br /><span class="small">Posted by <a href="/profile.cfm/username/'+username+'" class="less">'+username+'</a> in <u><a href="/discussion2.cfm/category/'+categoryId+'" class="less">'+category+'</a></u> &raquo <u><a href="/discussion2.cfm/forum/'+forumId+'" class="less">'+forum+'</a></u></span>';
			}
		}
	</script>
	<style>
		div#JSMX_loading{
			display:none !important;
		}
	</style>
	<jdoc:include type="component" />
	<div class="home one">
		<div class="hmemm">

			
					<script language="Javascript">
						featuretteCards=new Array(); 
							featuretteCards[0] = new Array(3330,"Blade & Soul - Finally Coming to NA and EU","http://www.mmorpg.com/gamelist.cfm/game/498/feature/9701/Blade-Soul-Its-Finally-Coming-to-America.html","We’re happy to announce that Blade and Soul is indeed launching as a F2P MMORPG in the US and EU this winter, with a closed beta to begin this fall. The wait, as it were, is almost over.",498,20150520,true,"?201505011"); 
							featuretteCards[1] = new Array(3329,"The Witcher 3: PC Review In Progress","http://www.mmorpg.com/gamelist.cfm/game/1011/feature/9700/The-Witcher-3-Wild-Hunt-Review-in-Progress-Finally.html","PC codes for the epic RPG from CD Projekt Red just went out yesterday, so you’ll have to stomach us getting our review done after the rest of the known world. ",1011,20150519,true,"?201505011"); 
							featuretteCards[2] = new Array(3328,"WoW: The Banhammer Striketh","http://www.mmorpg.com/gamelist.cfm/game/15/feature/9694/World-of-Warcraft-The-Ban-Hammer-Swings-to-What-Effect.html","It has been quite a while since Blizzard issued a large number of World of Warcraft bans but last week saw that lull end with over 100,000 player accounts being blocked for bot usage.",15,20150518,true,"?201505011"); 
							featuretteCards[3] = new Array(3327,"MMOFTW - Tree of Savior on Steam","http://www.mmorpg.com/showVideo.cfm/videoId/4334","This week\'s MMOFTW covers everything from Darkfall\'s potential resurrection to Tree of Savior\'s Steam greenlight campaign, Blizzard\'s banhammer, and the new elite specializations of Guild Wars 2. Watch and learn! ",0,20150516,true,"?201505011"); 
							featuretteCards[4] = new Array(3326,"HEX: The Armies of Myth","http://www.mmorpg.com/gamelist.cfm/game/955/feature/9692/Hex-Say-Hello-to-the-Armies-of-Myth-Card-Set.html","The third set of cards for HEX is just around the corner, and we’re pleased to reveal to you two of the brand new cards coming in the Armies of Myth set.",955,20150515,true,"?201505011"); 
							featuretteCards[5] = new Array(3324,"Guild Wars 2: Don\'t Fear the Reaper","http://www.mmorpg.com/gamelist.cfm/game/473/view/news/read/34909/Guild-Wars-2-Dont-Fear-the-Reaper-The-Necro-Elite-Specialization.html","Called The Reaper, Necros will have the ability to wield a two-handed greatsword to become a devastating melee brawler facing off against as many foes as can be gathered.",473,20150514,true,"?201505011"); 
							featuretteCards[6] = new Array(3323,"NCSOFT: About those quarterly earnings...","http://www.mmorpg.com/showFeature.cfm/loadFeature/9683/What-We-Can-Learn-from-the-Latest-NCsoft-Earnings-.html#post","NCSoft has released their financial results for the first quarter of 2015, and the results are a mixed bag. Blade & Soul has seen continued growth, the company is in a better position, and second half releases are set to bring in an infusion of cash.",0,20150513,true,"?201505011"); 
							featuretteCards[7] = new Array(3322,"Das Tal: Kickstarter Begins and Progress Update","http://www.mmorpg.com/gamelist.cfm/game/1083/feature/9677/Das-Tal-The-Indie-Sandbox-Gets-a-Kickstarter.html","Das Tal has come a long way since my preview of it last year. Fairytale Distillery’s vision and approach for it is ambitious, with the goal of offering an accessible but hardcore sandbox MMO experience...",1083,20150512,true,"?201505011"); 
						feats = new featuretteObj("feats",featuretteCards,8000,491);
					</script>
				

			<div class="featarea">
				

					<div class="slider" onmouseover="feats.pause(true);" onmouseout="feats.pause(false)">
						<a href="http://www.mmorpg.com/gamelist.cfm/game/498/feature/9701/Blade-Soul-Its-Finally-Coming-to-America.html" class="card" style="display:block; top:0px; z-index:5; background-image:url(http://images.mmorpg.com/images/featurettes/3330.jpg?cb=201505011);" id="cardX">
							<span class="data"><span class="title" target="_self">Blade & Soul - Finally Coming to NA and EU</span>We’re happy to announce that Blade and Soul is indeed launching as a F2P MMORPG in the US and EU this winter, with a closed beta to begin this fall. The wait, as it were, is almost over.</span>
						</a>
						<a href="" class="card" id="cardY" style="top:0px; left:491px; z-index:6; display:none;"></a>
					</div>
				
			</div>
			<div class="featjump">
				
				
					<a href="javascript:feats.jump(0)" id="febtn_0" style="background-image:url(http://images.mmorpg.com/images/featurettes/3330_tn.jpg?cb=201505011);" class="current"></a>
				
				
					<a href="javascript:feats.jump(1)" id="febtn_1" style="background-image:url(http://images.mmorpg.com/images/featurettes/3329_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(2)" id="febtn_2" style="background-image:url(http://images.mmorpg.com/images/featurettes/3328_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(3)" id="febtn_3" style="background-image:url(http://images.mmorpg.com/images/featurettes/3327_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(4)" id="febtn_4" style="background-image:url(http://images.mmorpg.com/images/featurettes/3326_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(5)" id="febtn_5" style="background-image:url(http://images.mmorpg.com/images/featurettes/3324_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(6)" id="febtn_6" style="background-image:url(http://images.mmorpg.com/images/featurettes/3323_tn.jpg?cb=201505011);" ></a>
				
				
					<a href="javascript:feats.jump(7)" id="febtn_7" style="background-image:url(http://images.mmorpg.com/images/featurettes/3322_tn.jpg?cb=201505011);" ></a>
				
				
				<div class="clear"></div>
			</div>

			
			<div class="artiarea">
				<h2 class="hmeSub"><a href="http://www.mmorpg.com/features.cfm">Our Latest Features</a></h2>

				
						<div class="previe"><span>DC Universe Online - <i>Previews</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/350/feature/9706/DC-Universe-Online-Halls-of-Power-Part-II-Preview.html">Halls of Power Part II Preview</a></div> 
						<div class="lates"><span>Tales from the Neighborhood - <i>Column</i></span><a href="http://www.mmorpg.com/showFeature.cfm/feature/9705/Tales-from-the-Neighborhood-What-Made-You-a-Gamer.html">What Made You a Gamer?</a></div> 
						<div class="lates"><span>General - <i>Exclusive Video</i></span><a href="http://www.mmorpg.com/showVideo.cfm/videoId/4343">Vikingr - The Val De Saire Battle 50 vs 50</a></div> 
						<div class="lates"><span>Camelot Unchained - <i>Column</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/926/feature/9704/Camelot-Unchained-A-Pet-Class-That-Isnt-a-Pet-Class.html">A Pet Class That Isn't a Pet Class</a></div> 
						<div class="lates"><span>Elder Scrolls Online - <i>Column</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/821/feature/9703/Elder-Scrolls-Online-Is-Zenimax-Being-Secretly-Transparent.html">Is Zenimax Being Secretly Transparent?</a></div> 
						<div class="previe"><span>Blade & Soul - <i>Previews</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/498/feature/9702/Blade-Soul-Hands-On-with-Blademaster-Force-Master-and-Summoner.html">Hands On with Blademaster, Force Master and Summoner</a></div> 
						<div class="lates"><span>Blade & Soul - <i>General Article</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/498/feature/9701/Blade-Soul-Its-Finally-Coming-to-America.html">It’s Finally Coming to America</a></div> 
						<div class="lates"><span>General - <i>Exclusive Video</i></span><a href="http://www.mmorpg.com/showVideo.cfm/videoId/4339">LockSixTime: The MMO Innovation Fallacy</a></div> 
						<div class="editoria"><span>The Witcher 3: Wild Hunt - <i>Editorial</i></span><a href="http://www.mmorpg.com/gamelist.cfm/game/1011/feature/9700/The-Witcher-3-Wild-Hunt-Review-in-Progress-Finally.html">Review in Progress (Finally)</a></div> 
			</div>

			<a href="http://www.mmorpg.com/features.cfm" class="morefeat">More Features...</a>

			

		</div>

		<div class="inframe">
			<div class="three">

				
				

				<div class="recentposts">
					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com/discussion2.cfm" class="title" title="Jump to the forums">Current Forum Activity</a><br /><span class="small">Refreshed every 10 seconds</span></span></span></div>
						<div class="ccfboxcon">

						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="forumActivity">
							<tbody id="rPostTickerArea" onmouseover="tickerRunning=false;" onmouseout="tickerRunning=true;">
								
									<tr class="first">

										

										<td class="what" id="rp1c1" valign="top" align="left"><a href="http://www.mmorpg.com/discussion2.cfm/thread/432182/page/1">Another Perspective on Group PVE Gameplay (poll)</a><br /><span class="small">Posted by <a href="/profile.cfm/username/MadFrenchie" class="less">MadFrenchie</a> in <u><a href="/discussion2.cfm/category/35" class="less">General Discussion</a></u> &raquo <u><a href="/discussion2.cfm/forum/51" class="less">The Pub at MMORPG.COM</a></u></span></td>
										<td class="when" id="rp1c2" valign="middle" align="center">0m ago</td>
									</tr>
									
									<tr >

										

										<td class="what" id="rp2c1" valign="top" align="left"><a href="http://www.mmorpg.com/discussion2.cfm/thread/432192/page/1">[General Article] Blade & Soul: It’s Finally Coming to America</a><br /><span class="small">Posted by <a href="/profile.cfm/username/observer" class="less">observer</a> in <u><a href="/discussion2.cfm/category/35" class="less">General Discussion</a></u> &raquo <u><a href="/discussion2.cfm/forum/510" class="less">News & Features Discussion</a></u></span></td>
										<td class="when" id="rp2c2" valign="middle" align="center">2m ago</td>
									</tr>
									
									<tr >

										

										<td class="what" id="rp3c1" valign="top" align="left"><a href="http://www.mmorpg.com/discussion2.cfm/thread/432207/page/1">Project1999 - The real old days experience</a><br /><span class="small">Posted by <a href="/profile.cfm/username/phantomghost" class="less">phantomghost</a> in <u><a href="/discussion2.cfm/category/41" class="less">Everquest</a></u> &raquo <u><a href="/discussion2.cfm/forum/141" class="less">Hogcaller Inn (General)</a></u></span></td>
										<td class="when" id="rp3c2" valign="middle" align="center">5m ago</td>
									</tr>
									
									<tr >

										

										<td class="what" id="rp4c1" valign="top" align="left"><a href="http://www.mmorpg.com/discussion2.cfm/thread/432242/page/1">wtf is going on with mmorpg gamers...</a><br /><span class="small">Posted by <a href="/profile.cfm/username/ketzerei84" class="less">ketzerei84</a> in <u><a href="/discussion2.cfm/category/700" class="less">WildStar</a></u> &raquo <u><a href="/discussion2.cfm/forum/1149" class="less">General Discussion</a></u></span></td>
										<td class="when" id="rp4c2" valign="middle" align="center">9m ago</td>
									</tr>
									
									<tr >

										

										<td class="what" id="rp5c1" valign="top" align="left"><a href="http://www.mmorpg.com/discussion2.cfm/thread/432196/page/1">[Column] Camelot Unchained: A Pet Class That Isn't a Pet Class</a><br /><span class="small">Posted by <a href="/profile.cfm/username/meddyck" class="less">meddyck</a> in <u><a href="/discussion2.cfm/category/35" class="less">General Discussion</a></u> &raquo <u><a href="/discussion2.cfm/forum/510" class="less">News & Features Discussion</a></u></span></td>
										<td class="when" id="rp5c2" valign="middle" align="center">16m ago</td>
									</tr>
									
							</tbody>
						</table>
						<div class="clear"></div>
					</div>

					<a href="http://www.mmorpg.com/discussion2.cfm/realtime/" class="moreposts">Visit our Discussion Forums...</a>

				</div>
				

				<div class="clear"></div>

				

				<div class="exclusiveVideos">
					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="/videos.cfm" class="title">Latest Videos</a><br /><span class="small"><a href="/videos.cfm">Witness</a> the action almost live...</span></span></span></div>
					<div class="ccfboxcon">
						<div class="viddata"><div class="insidevr">
							
								<div class="vrow pass_1" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Vikingr - The Val De Saire Battle 50 vs 50</h1><p>Vikingr is hands down one of the coolest mods in Mount & Blade Warband, and each month they host new events, bringing hundreds of players into battle. This month The Val De Saire Event took place and Ripper decided to run with the bulls and with the legendary Jomsborg Crew for some PvP action.\r\n\r\nMore information can be found on the Taleworlds forums about upcoming Vikingr Events below: \r\n\r\nhttp://forums.taleworlds.com/index.php?board=202.0\r\n\r\nVisit http://www.mmorpg.com for the latest!\r\n\r\nVisit<br /><br /><span style=\'color:#70B9ED;\'>Click to watch!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="/showVideo.cfm/videoId/4343" class="vid">
										<img src="http://images.mmorpg.com/images/videos/08871256-42bb-42d2-9ed0-840ac734a686.jpg?cb=123454567" alt="Vikingr - The Val De Saire Battle 50 vs 50" width="102" height="73" border="0" />
										<div class="play" title="Play this video"></div>
										<div class="titl">Vikingr - The Val De Saire Battle 50 vs 50</div>
										<div class="over">
											<span class="views">266&nbsp;/&nbsp;</span><span class="comas">0</span><span class="clear"></span>
										</div>
									</a>
								</div>
								
								<div class="vrow pass_2" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>McCree Shoots it Up</h1><p>Check out the latest game play action in the new Overwatch video featuring 13 minutes of game play with McCree, sort of the Outlaw Josie Wales from the forthcoming shooter.<br /><br /><span style=\'color:#70B9ED;\'>Click to watch!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="/gamelist.cfm/setView/videos/gameID/1202/videoId/4344" class="vid">
										<img src="http://images.mmorpg.com/images/videos/6e824d86-7b5a-4b52-996e-924c273d6b3b.jpg?cb=123454567" alt="McCree Shoots it Up" width="102" height="73" border="0" />
										<div class="play" title="Play this video"></div>
										<div class="titl"><b>Overwatch:&nbsp;</b>McCree Shoots it Up</div>
										<div class="over">
											<span class="views">152&nbsp;/&nbsp;</span><span class="comas">1</span><span class="clear"></span>
										</div>
									</a>
								</div>
								
								<div class="vrow pass_3" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Coming to NA and EU - First Impressions</h1><p>As we announced on the site, Blade & Soul is finally coming to Europe and North America this winter, with a closed beta beginning this fall. The Free to Play MMORPG from Team Bloodsport and NCSOFT has a lot of pent up demand behind it, and we got our hands on the Force Master, Blademaster, and Summoner classes to give you our first impressions.\r\n<br /><br /><span style=\'color:#70B9ED;\'>Click to watch!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="/gamelist.cfm/setView/videos/gameID/498/videoId/4341" class="vid">
										<img src="http://images.mmorpg.com/images/videos/d2bca31c-ef41-4027-972a-375fe48c413a.jpg?cb=123454567" alt="Coming to NA and EU - First Impressions" width="102" height="73" border="0" />
										<div class="play" title="Play this video"></div>
										<div class="titl"><b>Blade & Soul:&nbsp;</b>Coming to NA and EU - First Impressions</div>
										<div class="over">
											<span class="views">357&nbsp;/&nbsp;</span><span class="comas">2</span><span class="clear"></span>
										</div>
									</a>
								</div>
								
								<div class="vrow pass_4" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Four Great Guardians - English Announcement Trailer</h1><p>Blade & Soul, NCSoft\'s Wuxia MMORPG from a few years back (in Asia) is finally making its way West with a closed beta this fall, and a full launch in Winter of 2015. This is the debut English trailer, giving the audience a little background on where the story of the game begins as players pick up the game and dive in for the first time.\r\n<br /><br /><span style=\'color:#70B9ED;\'>Click to watch!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="/gamelist.cfm/setView/videos/gameID/498/videoId/4342" class="vid">
										<img src="http://images.mmorpg.com/images/videos/f68f3c76-52ae-48fb-bd7a-02c05cb22bf4.jpg?cb=123454567" alt="Four Great Guardians - English Announcement Trailer" width="102" height="73" border="0" />
										<div class="play" title="Play this video"></div>
										<div class="titl"><b>Blade & Soul:&nbsp;</b>Four Great Guardians - English Announcement Trailer</div>
										<div class="over">
											<span class="views">418&nbsp;/&nbsp;</span><span class="comas">1</span><span class="clear"></span>
										</div>
									</a>
								</div>
								
							<div class="clear"></div>
						</div></div>
					</div>

					<a href="http://www.mmorpg.com/videos.cfm" class="morevids">More Videos...</a>

				</div>


				

				<div class="clear"></div>

				
				
				

				
				

				<div class="clear"></div>

				

				<div class="latestnews">
					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com/newsroom.cfm" class="title">Latest MMORPG.com News</a><br /><span class="small">Get more headlines in our <a href="http://www.mmorpg.com/newsroom.cfm">newsroom</a>!</span></span></span></div>
						<div class="ccfboxcon">
						
								<div class="fitem">
									<img src="http://images.mmorpg.com/images/games/logos/32/350_32.png" class="icon" />
									<span class="bod">
										<span class="title"><a href="http://www.mmorpg.com/gamelist.cfm/game/350/view/news/read/34972/DC-Universe-Online-Halls-of-Power-Part-II-Preview.html" class='flink'>DC Universe Online: Halls of Power Part II Preview</a></span>
										Halls of Power Part II is the second part of a trilogy of DLC episodes for DC Universe Online. Inspired by Jack Kirby&rsquo;s &ldquo;Fourth World&rdquo; works for DC Comics, this series introduces a number of popular cha ...
										<a href="http://www.mmorpg.com/gamelist.cfm/game/350/view/news/read/34972/DC-Universe-Online-Halls-of-Power-Part-II-Preview.html" class='flink'>Read more...</a>
									</span>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>
								<table cellspacing="0" cellpadding="0" border="0">
							

								<tr class="second" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/themes/radiance/fullmoon/generic.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Tales from the Neighborhood: What Made You a Gamer?</h1><p>The Newbie Blogger Initiative has been continuing through the month of May. One of the weekly NBI events is called the &ldquo;Talkback Challenge&rdquo; and the question for this week is an interesting one: &ldquo;What ma ...</p><span class=\'viewed\'>28 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/generic.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/newsroom.cfm/read/34970/What-Made-You-a-Gamer.html" class="item" title="" alt="What Made You a Gamer?"><u title="" alt="">Tales from the Neighborhood: </u>What Made You a Gamer?</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/1281_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>ARK: Survival Evolved: Heading to Steam on June 2nd</h1><p>Fans hungry for a great dinosaur adventure game will be happy to hear that ARK: Survival Evolved will be opening on Steam on June 2nd. Over 70 dinosaurs will inhabit the island on which the action takes place. Among them ...</p><span class=\'viewed\'>1 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/1281_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/1281/view/news/read/34981/ARK-Survival-Evolved-Heading-to-Steam-on-June-2nd.html" class="item" title="" alt="Heading to Steam on June 2nd"><u title="" alt="">ARK: Survival Evolved: </u>Heading to Steam on June 2nd</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/1202_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Overwatch: McCree Featured in Latest Gameplay Video</h1><p>Check out the latest game play action in the new Overwatch video featuring 13 minutes of game play with McCree, sort of the Outlaw Josie Wales from the forthcoming shooter. //config.playwire.com/1001557/videos/v2/3635158 ...</p><span class=\'viewed\'>7 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/1202_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/1202/view/news/read/34980/Overwatch-McCree-Featured-in-Latest-Gameplay-Video.html" class="item" title="" alt="McCree Featured in Latest Gameplay Video"><u title="" alt="">Overwatch: </u>McCree Featured in Latest Gameplay Video</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/926_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Camelot Unchained: A Pet Class That Isnt a Pet Class</h1><p>How do you make a pet class for a game that is being built for large scale open world pvp battles? As much as I love them (and have loved them since I first dabbled in &ldquo;Creature Handler&rdquo; way back in Star Wars ...</p><span class=\'viewed\'>10 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/926_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/926/view/news/read/34969/Camelot-Unchained-A-Pet-Class-That-Isnt-a-Pet-Class.html" class="item" title="" alt="A Pet Class That Isn't a Pet Class"><u title="" alt="">Camelot Unchained: </u>A Pet Class That Isn't a Pet Class</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/1091_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>H1Z1: Nearly 25,000 Players Banned</h1><p>Daybreak Game Company is taking a hard stance against hackers and cheaters in H1Z1. According to a flurry of Tweets by CEO John Smedley, nearly 25,000 players have been banned recently.  \tIf we ban 30k and unban 20 for m ...</p><span class=\'viewed\'>13 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/1091_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/1091/view/news/read/34979/H1Z1-Nearly-25000-Players-Banned.html" class="item" title="" alt="Nearly 25,000 Players Banned"><u title="" alt="">H1Z1: </u>Nearly 25,000 Players Banned</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/1100_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Games of Glory: Headed to Steam on May 27th</h1><p>Lightbulb Crew has announced that its MOBA, Games of Glory, will be headed to Steam on May 27th. The game will arrive with two distinct play modes: Conquest and Superstar.  \tThe Superstar Game Mode in Svandias Found ...</p><span class=\'viewed\'>1 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/1100_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/1100/view/news/read/34978/Games-of-Glory-Headed-to-Steam-on-May-27th.html" class="item" title="" alt="Headed to Steam on May 27th"><u title="" alt="">Games of Glory: </u>Headed to Steam on May 27th</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/738_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>The Repopulation: Targeting Q4 2015 for Release</h1><p>The Repopulation is ready for release in Q4 2015 according to a new press release from Above &amp; Beyond Technologies. Currently in Early Access on Steam, the game will be feature-complete later this summer, paving the  ...</p><span class=\'viewed\'>19 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/738_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/738/view/news/read/34977/The-Repopulation-Targeting-Q4-2015-for-Release.html" class="item" title="" alt="Targeting Q4 2015 for Release"><u title="" alt="">The Repopulation: </u>Targeting Q4 2015 for Release</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/1071_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Skyforge: New Zone Revealed in Panoramic Image</h1><p>The Skyforge site has been updated with a new interactive panorama that features a look at the Veines zone. Similar to Google Street View, users can move the camera around a static point on the ground to get a look at th ...</p><span class=\'viewed\'>0 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/1071_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/1071/view/news/read/34976/Skyforge-New-Zone-Revealed-in-Panoramic-Image.html" class="item" title="" alt="New Zone Revealed in Panoramic Image"><u title="" alt="">Skyforge: </u>New Zone Revealed in Panoramic Image</a></td>
								</tr>
							

								<tr class="" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><img src=\'http://images.mmorpg.com/images/games/logos/32/473_32.png\' class=\'lefticon\' width=\'104\' height=\'105\' /><div class=\'leftbody\'><h1>Guild Wars 2: Rumor: Heart of Thorns Preorders Coming June 30th?</h1><p>It appears that Amazon.de has leaked the preorder date and price for the upcoming Guild Wars 2: Heart of Thorns expansion. According to the image provided, HoT will release on June 30th for &euro;44.99.  Source: MMOGames ...</p><span class=\'viewed\'>24 comments</span></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,510,1,'true');" onmouseout="floatingToolTipHide();">
									<td valign="middle" align="left"><img src="http://images.mmorpg.com/images/games/logos/tiny/473_32.gif" class="smicon" /></td><td valign="middle" align="left"><a href="http://www.mmorpg.com/gamelist.cfm/game/473/view/news/read/34975/Guild-Wars-2-Rumor-Heart-of-Thorns-Preorders-Coming-June-30th.html" class="item" title="" alt="Rumor: Heart of Thorns Preorders Coming June 30th?"><u title="" alt="">Guild Wars 2: </u>Rumor: Heart of Thorns Preorders Coming June 30th?</a></td>
								</tr>
							
						</table>
					</div>
				</div>
				<a href="http://www.mmorpg.com/newsroom.cfm" class="morenews">More News...</a>

				<script>
					function popularJump(goto){
						for(var i = 1;i <= 5;i++){
							if(i == goto){
								getObj("pop"+i).style.display = "";
								getObj("poplink"+i).className = "current";
							}
							else {
								getObj("pop"+i).style.display = "none";
								getObj("poplink"+i).className = "";
							}
						}
					}
					function voteJump(goto){
						for(var i = 1;i <= 2;i++){
							if(i == goto){
								getObj("vot"+i).style.display = "";
								getObj("votlink"+i).className = "current";
							}
							else {
								getObj("vot"+i).style.display = "none";
								getObj("votlink"+i).className = "";
							}
						}
					}
				</script>


				<div class="ratehmebx">

					

					

					<div id="ratingpanelsdata" class="TabbedPanels ratings">
						<ul class="TabbedPanelsTabGroup">
							<li class="TabbedPanelsTab firsttab" tabindex="6" onclick="ratingpanels.showPanel(this);"><span>Top&nbsp;Voted&nbsp;Games</span></li>
							<li class="TabbedPanelsTab" tabindex="7" onclick="ratingpanels.showPanel(this);"><span>Most&nbsp;Popular&nbsp;Games</span></li>
						</ul>

						<div class="TabbedPanelsContentGroup">

							<div class="voted TabbedPanelsContent">

								<div class="buttons">
									<a href="javascript:voteJump(1);" onclick="voteJump(1); return false;" id="votlink1" class="current"><span>Development</span></a>
									<a href="javascript:voteJump(2);" onclick="voteJump(2); return false;" id="votlink2" class=""><span>Released</span></a>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>

								<div id="vot1" class="dev rgbox">
									
											<div class="first hy">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/1214/Crowfall.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/1214_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Crowfall</div>
												</a>
												<div class="gvscore">8.45</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b>
												<div class="bar"><span class="hype" style="width:84%">&nbsp;8.41</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/883/Star-Citizen.html">Star Citizen</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#3</b>
												<div class="bar"><span class="hype" style="width:84%">&nbsp;8.39</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/1083/Das-Tal.html">Das Tal</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#4</b>
												<div class="bar"><span class="hype" style="width:83%">&nbsp;8.28</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/896/Gloria-Victis.html">Gloria Victis</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#5</b>
												<div class="bar"><span class="hype" style="width:82%">&nbsp;8.23</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/1006/Pantheon-Rise-of-the-Fallen.html">Pantheon: Rise of the Fallen</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#6</b>
												<div class="bar"><span class="hype" style="width:82%">&nbsp;8.21</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/926/Camelot-Unchained.html">Camelot Unchained</a>
											</div>
										
											<div class="gvi last"><b class="gviplace">#7</b>
												<div class="bar"><span class="hype" style="width:82%">&nbsp;8.19</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/952/EverQuest-Next.html">EverQuest Next</a>
											</div>
										
									</div>
									<div class="clear"></div>
								</div>

								<div id="vot2" class="rel rgbox" style="display:none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/473/Guild-Wars-2.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/473_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Guild Wars 2</div>
												</a>
												<div class="gvscore">8.57</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b>
												<div class="bar"><span class="rating" style="width:86%">&nbsp;8.56</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/404/The-Secret-World.html">The Secret World</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#3</b>
												<div class="bar"><span class="rating" style="width:85%">&nbsp;8.53</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html">Final Fantasy XIV: A Realm Reborn</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#4</b>
												<div class="bar"><span class="rating" style="width:83%">&nbsp;8.28</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/821/Elder-Scrolls-Online.html">Elder Scrolls Online</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#5</b>
												<div class="bar"><span class="rating" style="width:81%">&nbsp;8.13</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/431/Rift.html">Rift</a>
											</div>
										
											<div class="gvi"><b class="gviplace">#6</b>
												<div class="bar"><span class="rating" style="width:81%">&nbsp;8.13</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/693/Marvel-Heroes-2015.html">Marvel Heroes 2015</a>
											</div>
										
											<div class="gvi last"><b class="gviplace">#7</b>
												<div class="bar"><span class="rating" style="width:81%">&nbsp;8.07</span></div>&nbsp;-&nbsp;<a href="http://www.mmorpg.com/gamelist.cfm/game/875/Darkfall-Unholy-Wars.html">Darkfall: Unholy Wars</a>
											</div>
										
									</div>
									<div class="clear"></div>
								</div>

							</div>

							<div class="TabbedPanelsContent">
								<div class="buttons">
									<a href="javascript:popularJump(1);" onclick="popularJump(1); return false;" id="poplink1" class="current"><span>Today</span></a>
									<a href="javascript:popularJump(2);" onclick="popularJump(2); return false;" id="poplink2"><span>Week</span></a>
									<a href="javascript:popularJump(3);" onclick="popularJump(3); return false;" id="poplink3"><span>1 Month</span></a>
									<a href="javascript:popularJump(4);" onclick="popularJump(4); return false;" id="poplink4"><span>6 Months</span></a>
									<a href="javascript:popularJump(5);" onclick="popularJump(5); return false;" id="poplink5"><span>Year</span></a>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>

								<div id="pop1" class="today rgbox">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/14/EVE-Online.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/14_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">EVE Online</div>
												</a>
												<div class="gvhitfirst">26,136<br />Unique<br />Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/498/Blade-Soul.html" class="gvititleother">Blade & Soul</a><i>10,114 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>8,875 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/821/Elder-Scrolls-Online.html" class="gvititleother">Elder Scrolls Online</a><i>7,477 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>4,027 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>3,399 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/1011/The-Witcher-3-Wild-Hunt.html" class="gvititleother">The Witcher 3: Wild Hunt</a><i>3,212 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>2,541 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>2,529 Hits</i><div class="clear"></div></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/404/The-Secret-World.html" class="gvititleother">The Secret World</a><i>2,116 Hits</i><div class="clear"></div></div>
										
										<div class="discl">* Results based on unique hits over previous 24 hours&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop2" class="week rgbox" style="display:none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/473/Guild-Wars-2.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/473_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Guild Wars 2</div>
												</a>
												<div class="gvhitfirst">82,805<br />Unique<br />Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/14/EVE-Online.html" class="gvititleother">EVE Online</a><i>59,235 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/821/Elder-Scrolls-Online.html" class="gvititleother">Elder Scrolls Online</a><i>51,275 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>27,189 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>25,394 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/498/Blade-Soul.html" class="gvititleother">Blade & Soul</a><i>22,401 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>22,344 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/1264/Echo-of-Soul.html" class="gvititleother">Echo of Soul</a><i>22,172 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>21,046 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/572/ArcheAge.html" class="gvititleother">ArcheAge</a><i>18,179 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous 7 days&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop3" class="month rgbox" style="display:none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/473/Guild-Wars-2.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/473_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Guild Wars 2</div>
												</a>
												<div class="gvhitfirst">223,900<br />Unique<br />Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/821/Elder-Scrolls-Online.html" class="gvititleother">Elder Scrolls Online</a><i>211,945 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/1260/Cabal-2.html" class="gvititleother">Cabal 2</a><i>118,916 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>109,700 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/14/EVE-Online.html" class="gvititleother">EVE Online</a><i>95,137 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>94,296 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>92,036 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/362/Wizard101.html" class="gvititleother">Wizard101</a><i>91,423 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/572/ArcheAge.html" class="gvititleother">ArcheAge</a><i>82,357 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>76,230 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous month&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop4" class="sixmonths rgbox" style="display:none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/821/Elder-Scrolls-Online.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/821_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Elder Scrolls Online</div>
												</a>
												<div class="gvhitfirst">1,384,551<br />Unique<br />Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>1,326,158 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>840,385 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>808,732 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/572/ArcheAge.html" class="gvititleother">ArcheAge</a><i>726,728 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>688,769 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/431/Rift.html" class="gvititleother">Rift</a><i>582,201 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/952/EverQuest-Next.html" class="gvititleother">EverQuest Next</a><i>523,794 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/1214/Crowfall.html" class="gvititleother">Crowfall</a><i>476,991 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/404/The-Secret-World.html" class="gvititleother">The Secret World</a><i>475,562 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous six months&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop5" class="year rgbox" style="display:none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/821/Elder-Scrolls-Online.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/821_32.png" class="icon" border="0" width="104" height="105" />
													<div class="gvtitle">Elder Scrolls Online</div>
												</a>
												<div class="gvhitfirst">3,516,046<br />Unique<br />Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/572/ArcheAge.html" class="gvititleother">ArcheAge</a><i>2,810,032 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>2,732,633 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>2,016,764 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>1,998,070 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>1,960,155 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>1,858,959 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/431/Rift.html" class="gvititleother">Rift</a><i>1,544,923 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/952/EverQuest-Next.html" class="gvititleother">EverQuest Next</a><i>1,256,382 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/404/The-Secret-World.html" class="gvititleother">The Secret World</a><i>1,021,249 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous year&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

							</div>

							<div class="clear"></div>
						</div>
					</div>

					<a href="http://www.mmorpg.com/gamelist.cfm" class="moregames">Our Gamelist</a>

				</div>

				<script>
					var ratingpanels = new Spry.Widget.TabbedPanels("ratingpanelsdata");

					getObj("poplink2").className = "";
					getObj("poplink3").className = "";
					getObj("poplink4").className = "";
					getObj("poplink5").className = "";
					getObj("votlink2").className = "";
				</script>

				


				<div class="clear"></div>

				<div class="giveaways">

					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com//features.cfm/view/special_offers" class="title">Contests and Special Offers</a><br /><span class="small">Keys, Items, Swag!  We have it here.</span></span></span></div>
						<div class="ccfboxcon">

					

					
					<!--Event banners-->

<div class="contest minor">
<a href="http://www.mmorpg.com/giveaways.cfm/offer/607/Supernova-Alpha-Test-Key-Giveaway.html">
<img src="http://images.mmorpg.com/images/contestimages/supernova_minor.jpg?cb=3" width="487" height="60" border="0" alt="Get Your Supernova Alpha Key!">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/contests/aa_sweeps_may2015.cfm">
<img src="http://images.mmorpg.com/images/contestimages/aa_may2015_sweeps_minor.jpg?cb=3" width="487" height="60" border="0" alt="Enter To Win Free ArcheAge Secrets Packs!">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/giveaways.cfm/offer/603/Wizard101-Socket-Wrench-Giveaway.html">
<img src="http://images.mmorpg.com/images/contestimages/w101_apr2015_minor.jpg?cb=3" width="487" height="60" border="0" alt="Get Your Free Socket Wrench For Wizard101!">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/giveaways.cfm/offer/604/Pirate101-Exclusive-Doubloons-Giveaway.html">
<img src="http://images.mmorpg.com/images/contestimages/p101_apr2015_minor.jpg?cb=3" width="487" height="60" border="0" alt="Get Your Doubloon For Pirate101!">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/contests/eso_console_sweeps.cfm">
<img src="http://images.mmorpg.com/images/contestimages/eso_console_sweeps_minor.jpg?cb=3" width="487" height="60" border="0" alt="Enter To Win a PS4 or XBox One Console!"><img src="http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=12695176&PluID=0&ord=[timestamp]&rtu=-1" width="1" height="1">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/giveaways.cfm/offer/601/Stormthrone-Open-Beta-Gift-Keys.html">
<img src="http://images.mmorpg.com/images/contestimages/stormthrone_minor.jpg?cb=3" width="487" height="60" border="0" alt="Get Your Stormthrone Open Beta Gift Key Now!">
</a>
</div>

<div class="contest minor">
<a href="http://www.mmorpg.com/giveaways.cfm/offer/600/WEBZEN-6th-Anniversary-Gift-Giveaway.html">
<img src="http://images.mmorpg.com/images/contestimages/webzen_minor.jpg?cb=3" width="487" height="60" border="0" alt="Get A WEBZEN Gift Key Now!">
</a>
</div>







					</div>

				</div>

				<div class="clear"></div>












				

			</div>

			<div class="four">


				
				<div class="squaread">
					<div class=""> 						
						<!-- MMO_MedRect -->
						<div id='div-gpt-ad-1349395187216-2' style='width:300px; height:250px;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1349395187216-2'); });
						</script>
						</div>
					</div> 
				</div>
				


				

					<div style="padding-bottom:7px; padding-top:4px; display:block; position:relative; overflow:hidden; height:123px;">
						<a href="http://twitter.com/MMORPGcom" target="_blank" class="twl">&nbsp;</a>
						<a href="http://www.facebook.com/pages/MMORPGcom/66367269162" target="_blank" class="fbl">&nbsp;</a>
						<a href="/gameon.cfm" class="mso">&nbsp;</a>
					</div>
					
				

				
				<div class="mmoftw">
					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com/mmoftw.cfm" class="title">MMOFTW: Your MMO Week in Review!</a><br /><span class="small">Our weekly show all about MMOs</span></span></span></div>
					<div class="ccfboxcon">

						<div id="mmoftwbox">
<a href="http://www.youtube.com/watch?v=6X2HXDt2PMw" target="_blank" onclick="loadYTClip('mmoftwbox','6X2HXDt2PMw',300,169); return false;">
<img src="http://images.mmorpg.com/images/mmoftw/tos_yt.jpg" width="300" height="169" border="0" alt="" />
</a>
</div>
<div class="ftwinfo">
This week's MMOFTW covers everything from Darkfall's potential resurrection to Tree of Savior's Steam greenlight campaign, Blizzard's banhammer, and the new elite specializations of Guild Wars 2. Watch and learn!
</div>





























































































						<div class="ftwinfo" style="padding-top:6px; padding-bottom:6px; text-align:center; font-size:1.2em; font-weight:bold; font-style:normal;"><a href="http://www.mmorpg.com/mmoftw.cfm">Watch Past Episodes</a></div>
						<div style="text-align:center; padding:5px;">
							<a href="//www.youtube.com/subscription_center?add_user_id=-GTQ8QGSKQwGxmAzF5jaLw&feature=creators_cornier-//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_160x27_red.png"><img src="//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_160x27_red.png" alt="Subscribe to me on YouTube"/></a><img src="//www.youtube-nocookie.com/gen_204?feature=creators_cornier-//s.ytimg.com/yt/img/creators_corner/Subscribe_to_my_videos/YT_Subscribe_160x27_red.png" style="display: none"/>
						</div>
					</div>
				</div>


				

					<div class="hmcolumns">

						<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com/features.cfm/view/columns" class="title">Columnists</a><br /><span class="small">Fresh opinion from industry insiders</span></span></span></div>
						<div class="ccfboxcon">

						

								<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>What Made You a Gamer?</h1><p>The Newbie Blogger Initiative has been continuing through the month of May. One of the weekly NBI events is called the “Talkback Challenge” and the question for this week is an interesting one: “What made you a gamer?”<br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9705/What-Made-You-a-Gamer.html" class="linker">
										<div class="icon">
											<img src="http://images.mmorpg.com/images/columns/59.jpg?cb=1" alt="" border="0" width="80" height="80" />
										</div>
										<div class="data">
											<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9705/What-Made-You-a-Gamer.html" class="title">What Made You a Gamer?</a>
											<span class="desc">May 20, 2015 - <a href="http://www.mmorpg.com/profile.cfm/username/Liores">Jessica Cook</a></span>
											<div class="overview"> The Newbie Blogger Initiative has been continuing through the month of May....<br /><a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9705/What-Made-You-a-Gamer.html" class="readmore">Read More...</a></div>
										</div>
									</a>
									<div class="clear"></div>
								</div>
							

								<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Power Rankings - MMOGs Currently In Beta </h1><p>If we were to count all the MMOGs and quasi-MMOGs presently in various stages of testing, I have no doubt that the total would have three digits. Naturally, they\'d differ widely with respect to how much interest they are generating. Frankly, we\'d find a fair number that are effectively invisible, unknown except to the most ardent industry observers.<br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9697/Power-Rankings-MMOGs-Currently-In-Beta-.html" class="linker">
										<div class="icon">
											<img src="http://images.mmorpg.com/images/columns/5.jpg?cb=1" alt="" border="0" width="80" height="80" />
										</div>
										<div class="data">
											<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9697/Power-Rankings-MMOGs-Currently-In-Beta-.html" class="title">Power Rankings - MMOGs Currently In Beta </a>
											<span class="desc">May 19, 2015 - <a href="http://www.mmorpg.com/profile.cfm/username/JonricMMO">Richard Aihoshi</a></span>
											<div class="overview"> If we were to count all the MMOGs and quasi-MMOGs presently in...<br /><a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9697/Power-Rankings-MMOGs-Currently-In-Beta-.html" class="readmore">Read More...</a></div>
										</div>
									</a>
									<div class="clear"></div>
								</div>
							

								<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Of Faith, Poetics, and Preorders</h1><p>The past two weeks have actually been quite calm in terms of big announcements, but Square Enix has made some changes to extend the bridge to more level 50 players seeking to complete the story in preparation for the expansion. <br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9689/Of-Faith-Poetics-and-Preorders.html" class="linker">
										<div class="icon">
											<img src="http://images.mmorpg.com/images/columns/44.jpg?cb=1" alt="" border="0" width="80" height="80" />
										</div>
										<div class="data">
											<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9689/Of-Faith-Poetics-and-Preorders.html" class="title">Of Faith, Poetics, and Preorders</a>
											<span class="desc">May 16, 2015 - <a href="http://www.mmorpg.com/profile.cfm/username/victorbjr">Victor Barreiro Jr.</a></span>
											<div class="overview"> The past two weeks have actually been quite calm in terms of...<br /><a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9689/Of-Faith-Poetics-and-Preorders.html" class="readmore">Read More...</a></div>
										</div>
									</a>
									<div class="clear"></div>
								</div>
							

								<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>10 Reasons to Get Hyped for The Witcher 3: The Wild Hunt</h1><p>The Witcher 3: Wild Hunt is almost upon us! Can you hear it? That’s the collective sound of millions of players chomping at the bit to get their hands on this bad boy. We here at the RPG Files are already basking in the deep, warm waters of pre-release excitement and think you should be too, so we’re dedicating this column to the reasons why you’re right to be excited. Read on and see if yours made the list!<br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9690/10-Reasons-to-Get-Hyped-for-The-Witcher-3-The-Wild-Hunt.html" class="linker">
										<div class="icon">
											<img src="http://images.mmorpg.com/images/columns/53.jpg?cb=1" alt="" border="0" width="80" height="80" />
										</div>
										<div class="data">
											<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9690/10-Reasons-to-Get-Hyped-for-The-Witcher-3-The-Wild-Hunt.html" class="title">10 Reasons to Get Hyped for The Witcher 3: The Wild Hunt</a>
											<span class="desc">May 15, 2015 - <a href="http://www.mmorpg.com/profile.cfm/username/GameByNight">Christopher Coke</a></span>
											<div class="overview"> The Witcher 3: Wild Hunt is almost upon us! Can you hear...<br /><a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9690/10-Reasons-to-Get-Hyped-for-The-Witcher-3-The-Wild-Hunt.html" class="readmore">Read More...</a></div>
										</div>
									</a>
									<div class="clear"></div>
								</div>
							

								<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>Three Things MMOs Can Learn from Isometric RPGs</h1><p>As a fan of the Shadowrun setting and isometric RPGs in general, I find it ludicrous that I’m so late to the party with playing Shadowrun Returns, but I’m loving Harebrained Schemes’ entry into the cyberpunk RPG genre.  It manages to convincingly capture the Shadowrun ethos while, somewhat surprisingly, fit the game setting’s mechanics into a modern isometric RPG mold.<br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
									<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9688/Three-Things-MMOs-Can-Learn-from-Isometric-RPGs.html" class="linker">
										<div class="icon">
											<img src="http://images.mmorpg.com/images/columns/58.jpg?cb=1" alt="" border="0" width="80" height="80" />
										</div>
										<div class="data">
											<a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9688/Three-Things-MMOs-Can-Learn-from-Isometric-RPGs.html" class="title">Three Things MMOs Can Learn from Isometric RPGs</a>
											<span class="desc">May 15, 2015 - <a href="http://www.mmorpg.com/profile.cfm/username/sominator">Som Pourfarzaneh</a></span>
											<div class="overview"> As a fan of the Shadowrun setting and isometric RPGs in general,...<br /><a href="http://www.mmorpg.com/showFeature.cfm/loadFeature/9688/Three-Things-MMOs-Can-Learn-from-Isometric-RPGs.html" class="readmore">Read More...</a></div>
										</div>
									</a>
									<div class="clear"></div>
								</div>
							

						</div>

						<a href="/features.cfm/view/columns" class="morecolumns">More Columnists and Posts...</a>

					</div>
				
				<div class="userphotos">

					<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi"><a href="http://www.mmorpg.com/galleries" class="title">Latest MMORPG Screenshots</a><br /><span class="small">Uploaded by members of MMORPG.com</span></span></span></div>
					<div class="ccfboxcon">

						<div class="browser">
							
								<table cellspacing="0" cellpadding="0" border="0" width="302"><tr>
								</tr><tr>
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/33a57dde-8354-47d1-994b-050e19f48000" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/212015/33a57dde-8354-47d1-994b-050e19f48000.jpg" width="88" height="50" border="0" class="screenshot" alt="TERA - TERA Online" title="TERA - TERA Online" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/b713ab60-4a35-42db-a0b3-7008c909b0ba" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/b713ab60-4a35-42db-a0b3-7008c909b0ba.jpg" width="88" height="50" border="0" class="screenshot" alt="ArcheAge" title="ArcheAge" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/1aaedcf9-f524-4182-9fad-36f5638409d4" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/1aaedcf9-f524-4182-9fad-36f5638409d4.jpg" width="88" height="50" border="0" class="screenshot" alt="ArcheAge - enter caption...Guild trade. outsmarted the pirates...taking them in the back way" title="ArcheAge - enter caption...Guild trade. outsmarted the pirates...taking them in the back way" /></a></td>
									</tr><tr>
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/d4a2ae29-6852-4bac-b2d4-3288441554d1" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/d4a2ae29-6852-4bac-b2d4-3288441554d1.bmp" width="88" height="50" border="0" class="screenshot" alt="Lineage 2" title="Lineage 2" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/8332350f-71d2-40da-88a6-6ba5f23777b7" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/8332350f-71d2-40da-88a6-6ba5f23777b7.bmp" width="88" height="50" border="0" class="screenshot" alt="Lineage 2" title="Lineage 2" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/10e8012a-437c-4be8-a029-212074e31c78" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/10e8012a-437c-4be8-a029-212074e31c78.bmp" width="88" height="50" border="0" class="screenshot" alt="Lineage 2" title="Lineage 2" /></a></td>
									</tr><tr>
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/2be47c0a-470e-4245-9787-b7f433f7f3db" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/202015/2be47c0a-470e-4245-9787-b7f433f7f3db.bmp" width="88" height="50" border="0" class="screenshot" alt="Lineage 2" title="Lineage 2" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/cd9d91ca-c950-4668-9819-d004c802d424" class="thumb" style="width:90px; height:49px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/192015/cd9d91ca-c950-4668-9819-d004c802d424.jpg" width="88" height="47" border="0" class="screenshot" alt="Lineage 2" title="Lineage 2" /></a></td>
									
									<td valign="middle" align="center"><a href="http://www.mmorpg.com/photo/479f7d93-5979-4da3-8709-238b9fcc6e3d" class="thumb" style="width:90px; height:52px;" ><img src="http://images.mmorpg.com/images/galleries/smallThumbs/192015/479f7d93-5979-4da3-8709-238b9fcc6e3d.jpg" width="88" height="50" border="0" class="screenshot" alt="Guild Wars 2 - Guardian specialization... GW1 Nightfall's Paragon??" title="Guild Wars 2 - Guardian specialization... GW1 Nightfall's Paragon??" /></a></td>
									
								</tr></table>
							
						</div>

					</div>

					<a href="http://www.mmorpg.com/galleries" class="moreimg">More Images</a>

				</div>

				

				<div class="clear"></div>

				

				<div class="bloggers">
					<div class="ccfbox">
						<span class="ccfboxo"><span class="ccfboxi">
							<a href="http://www.mmorpg.com/blogs" class="title">Developer Blogs</a><br />
							<span class="small">Checkout <a href="http://www.mmorpg.com/blogs">more</a> user blogs in our blogs area</span>
						</span></span>
					</div>
					<div class="ccfboxcon">

						
						<div class="large">
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/MonsterMMORPG" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/1296366_80x802.png" align="center" border="0" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/MonsterMMORPG" class="btitle">Free To Play Browser Based Online Pokemon MMORPG Game PokemonCraft</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/MonsterMMORPG" class="author">MonsterMMORPG</a>
									This blog is about best of all Pokemon MMORPGs out there PokemonCraft. PokemonCr...
									</p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/Redbana_Team" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/2525527_redbana_main.png" align="center" border="0" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/Redbana_Team" class="btitle">Redbana: Developer's Blog</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Redbana_Team" class="author">Redbana_Team</a>
									Redbana Corporation is the North American publishing arm of leading videogame de...
									</p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/DiamondGames" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/2342655_DG_logo_white.jpg" align="center" border="0" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/DiamondGames" class="btitle">Diamond Games</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/DiamondGames" class="author">DiamondGames</a>
									Diamond Games is a game publisher and developer found in 2013 by a team of game ...
									</p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/WWIIOL" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/1648595_WWII-Updated-Logo.png" align="center" border="0" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/WWIIOL" class="btitle">WWII Online: Battleground Europe News</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/XOOM-CRS" class="author">XOOM-CRS</a>
									News from the front line. WWII MMO FPS, Play For Free. www.wwiionline.com
									</p>
									<div class="clear"></div>
								</div>
							
						</div>

						<div class="smaller">
							<div class="hbsecint">
								<a href="http://www.mmorpg.com/blogs" class="title">Highlighted Blogs</a>
							</div>
							
								<div class="bentry">
									<i class="bavatar"><a href="/blogs/DaKurlzz" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/small/1161179_mzsgwLQ.jpg" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/DaKurlzz" class="btitle">The Gaming Gospel</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Limitations" class="author">Limitations</a>
									I write about everything that goes with MMORPGs
									</p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar"><a href="/blogs/TierlessTime" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/small/899462_1514657-golden_age_deadpool copy.jpg" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/TierlessTime" class="btitle">the Lonely Alter</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/TierlessTime" class="author">TierlessTime</a>
									I don't play "games", I play MMORPGs! This is where I talk about them!
									</p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar"><a href="/blogs/Teala" class="btitle2">
										
											<img src="http://images.mmorpg.com/images/avatars/small/67178_granolax2.jpg" />
										
										</a>
									</i>
									<p><strong><a href="/blogs/Teala" class="btitle">Teala's Wickedly Cool MMORPG.com Blog For The Masses</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Teala" class="author">Teala</a>
									Just my thoughts on MMO's, roleplaying, game companies, and the people that play...
									</p>
									<div class="clear"></div>
								</div>
							
						</div>

						
							<div class="smaller">
								<div class="hbsecint">
									<a href="http://www.mmorpg.com/blogs" class="title">Top Rated Blog Posts</a>
								</div>
								
									<div class="bentry">
										<i class="bavatar">
											<a href="/blogs/DaKurlzz/092009/Its-A-Rough-Road-P8" class="image">
												
													<img src="http://images.mmorpg.com/images/avatars/small/1161179_mzsgwLQ.jpg" />
												
											</a>
										</i>
										<p><strong><a href="/blogs/DaKurlzz/092009/26834_Its-A-Rough-Road-P8" class="btitle">It's A Rough Road [P8]</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Limitations" class="author">Limitations</a></p>
										<div class="clear"></div>
									</div>
								
									<div class="bentry">
										<i class="bavatar">
											<a href="/blogs/MonsterMMORPG/012011/Fan-Made-Pokemon-Online-Game-PokemonPets-News" class="image">
												
													<img src="http://images.mmorpg.com/images/avatars/small/1296366_80x802.png" />
												
											</a>
										</i>
										<p><strong><a href="/blogs/MonsterMMORPG/012011/26839_Fan-Made-Pokemon-Online-Game-PokemonPets-News" class="btitle">Fan Made Pokemon Online Game PokemonPets News</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/MonsterMMORPG" class="author">MonsterMMORPG</a></p>
										<div class="clear"></div>
									</div>
								
									<div class="bentry">
										<i class="bavatar">
											<a href="/blogs/Redbana_Team/072013/Playspot-whistles-and-FCManager-enters-the-field-in-Brazil" class="image">
												
													<img src="http://images.mmorpg.com/images/avatars/small/2525527_redbana_main.png" />
												
											</a>
										</i>
										<p><strong><a href="/blogs/Redbana_Team/072013/26838_Playspot-whistles-and-FCManager-enters-the-field-in-Brazil" class="btitle">Playspot whistles and FCManager enters the field in Brazil</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Redbana_Team" class="author">Redbana_Team</a></p>
										<div class="clear"></div>
									</div>
								
							</div>
						

						<div class="smaller">
							<div class="hbsecint">
								<a href="http://www.mmorpg.com/blogs" class="title">Recent Blog Posts</a>
							</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/MonsterMMORPG/052015/Fan-Made-Pokemon-Online-Game-PokemonPets-News" class="image">
											
												<img src="http://images.mmorpg.com/images/avatars/small/1296366_80x802.png" />
											
										</a>
									</i>
									<p><strong><a href="/blogs/MonsterMMORPG/052015/26839_Fan-Made-Pokemon-Online-Game-PokemonPets-News" class="btitle">Fan Made Pokemon Online Game PokemonPets News</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/MonsterMMORPG" class="author">MonsterMMORPG</a></p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/Redbana_Team/052015/Playspot-whistles-and-FCManager-enters-the-field-in-Brazil" class="image">
											
												<img src="http://images.mmorpg.com/images/avatars/small/2525527_redbana_main.png" />
											
										</a>
									</i>
									<p><strong><a href="/blogs/Redbana_Team/052015/26838_Playspot-whistles-and-FCManager-enters-the-field-in-Brazil" class="btitle">Playspot whistles and FCManager enters the field in Brazil</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/Redbana_Team" class="author">Redbana_Team</a></p>
									<div class="clear"></div>
								</div>
							
								<div class="bentry">
									<i class="bavatar">
										<a href="/blogs/velveeta/052015/the-first-four-part-3-dalimond" class="image">
											
												<img src="http://images.mmorpg.com/images/avatars/small/IstariaWantsYou.jpg" />
											
										</a>
									</i>
									<p><strong><a href="/blogs/velveeta/052015/26837_the-first-four-part-3-dalimond" class="btitle">the first four, part 3 - dalimond</a></strong><a href="http://www.mmorpg.com/profile.cfm/username/velveeta" class="author">velveeta</a></p>
									<div class="clear"></div>
								</div>
							
						</div>

					</div>

					<a href="/blogs" class="moreblogs">More Blogs and Posts...</a>

				</div>

				



				<div class="clear"></div>
			</div>
			<div class="inbot"></div>

		</div>
	</div>
	<div class="home two">

		
		<div id="" class="panel panelFullWidth panelAlt panelFirst" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar ">
			<div class="title">
				<h3 class="">Advertisement</h3>
			</div>
		</div>
		<div id="" class="panelBody "> <div class=""> 						
						<!-- MMO_WideSkyscraper -->
						<div id='div-gpt-ad-1349395187216-3' style='width:160px; height:600px;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1349395187216-3'); });
						</script>
						</div>
					</div> </div></div></div>
</div>


		
		<div style="padding-left:6px;">
			<div class=""> 						
						<!-- Home_Page_Button -->
						<div id='div-gpt-ad-1374774164640-0' style='width:160px; height:160px;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1374774164640-0'); });
						</script>
						</div>
					</div> 
		</div>

		
		

		


		<div class="upcomgame">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Games to Play, Download or Pre-Order Now!</span></span></div>
				<div class="ccfboxcon">
				<ul>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/166_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=116&src=homepage_playnow_box" target="_blank" rel="nofollow">MapleStory</a><img src='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=12899810&PluID=0&ord=1432174641734&rtu=-1' width='1' height='1' /></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/523_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=118&src=homepage_playnow_box" target="_blank" rel="nofollow">Vindictus</a><img src='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=13000148&PluID=0&ord=1432174641734&rtu=-1' width='1' height='1' /></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/544_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=121&src=homepage_playnow_box" target="_blank" rel="nofollow">World of Tanks</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/947_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=109&src=homepage_playnow_box" target="_blank" rel="nofollow">Empire</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/693_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=120&src=homepage_playnow_box" target="_blank" rel="nofollow">Marvel Heroes 2015</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/572_32.gif) no-repeat center left;"><a href="/adServer/promotedLinkClick.cfm?id=122&src=homepage_playnow_box" target="_blank" rel="nofollow">ArcheAge</a><img src='http://ad.doubleclick.net/ddm/trackimp/N4518.1169593.RELEASEWEEKMEDIA/B8632202.117935247;dc_trk_aid=289824621;dc_trk_cid=58237393;ord=1432174641734?' width='1' height='1' /></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1233_32.gif) no-repeat center left;"><a href="/adServer/signupLinkClick.cfm?gameId=1233&src=homepage_playnow_box" target="_blank" rel="nofollow">OnePiece Online</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1094_32.gif) no-repeat center left;"><a href="/adServer/signupLinkClick.cfm?gameId=1094&src=homepage_playnow_box" target="_blank" rel="nofollow">Stormfall: Age of War</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/477_32.gif) no-repeat center left;"><a href="/adServer/signupLinkClick.cfm?gameId=477&src=homepage_playnow_box" target="_blank" rel="nofollow">TERA</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/45_32.gif) no-repeat center left;"><a href="/adServer/signupLinkClick.cfm?gameId=45&src=homepage_playnow_box" target="_blank" rel="nofollow">Lord of the Rings Online</a></li>
					
				</ul>
			</div>
		</div>
		<div class=""> 						
						<!-- PremLinks_1x1 -->
						<div id='div-gpt-ad-1373084769174-0' style='width:1px; height:1px;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1373084769174-0'); });
						</script>
						</div>						
					</div> 

		<a href="http://www.mmorpg.com/playnow.cfm" class="moreoffers" title="Checkout our complete list of free to play, signup for, pre-order and download now MMORPGs!">Check out our complete list of free to play, signup for, pre-order and download now MMORPGs!</a>

		<div class="upcomgame">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Upcoming Games</span></span></div>
							<div class="ccfboxcon">

				<ul>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1280_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1280/Lords-Road.html">Lord's Road</a>&nbsp;<span class="date">-
						05/31/15
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1281_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1281/ARK-Survival-Evolved.html">ARK: Survival Evolved</a>&nbsp;<span class="date">-
						06/02/15
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1274_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1274/Forsaken-World-Mobile.html">Forsaken World Mobile</a>&nbsp;<span class="date">-
						06/18/15
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/582_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/582/Salem.html">Salem</a>&nbsp;<span class="date">-
						2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1073_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1073/Dragon-Fin-Soup.html">Dragon Fin Soup</a>&nbsp;<span class="date">-
						Q2 2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1264_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1264/Echo-of-Soul.html">Echo of Soul</a>&nbsp;<span class="date">-
						Q2 2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1271_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1271/The-Incredible-Adventures-of-Van-Helsing-III.html">The Incredible Adventures of Van Helsing III</a>&nbsp;<span class="date">-
						Q2 2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1092_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1092/Darkest-Dungeon.html">Darkest Dungeon</a>&nbsp;<span class="date">-
						2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1284_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1284/Dragon-of-Legends.html">Dragon of Legends</a>&nbsp;<span class="date">-
						Q3 2015
						</span></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/952_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/952/EverQuest-Next.html">EverQuest Next</a>&nbsp;<span class="date">-
						2015
						</span></li>
					
				</ul>

			</div>
		</div>

		<a href="http://www.mmorpg.com/gamelist.cfm" class="moregames2">MMORPG Gamelist</a>

		<div class="upcomgame">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Newly Listed Games</span></span></div>
							<div class="ccfboxcon">

				<ul>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1284_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1284/Dragon-of-Legends.html">Dragon of Legends</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1282_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1282/Little-Devil-Inside.html">Little Devil Inside</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1281_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1281/ARK-Survival-Evolved.html">ARK: Survival Evolved</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1280_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1280/Lords-Road.html">Lord's Road</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1279_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1279/Siegelord.html">Siegelord</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1278_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1278/Umbra.html">Umbra</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1277_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1277/Shin-Megami-Tensei-Devil-Survivor-2-Record-Breaker.html">Shin Megami Tensei Devil Survivor 2 Record Breaker</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1275_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1275/Elvenar.html">Elvenar</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1274_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1274/Forsaken-World-Mobile.html">Forsaken World Mobile</a></li>
					
						<li style="background:transparent url(http://images.mmorpg.com/images/games/logos/tiny/1273_32.gif) no-repeat center left;"><a href="gamelist.cfm/gameId/1273/Magicka-Wizard-Wars.html">Magicka Wizard Wars</a></li>
					
				</ul>

			</div>
		</div>

		<a href="http://www.mmorpg.com/gamelist.cfm" class="moregames2">MMO Gamelist</a>


			<div class="lowerMisc panelTopSpacer">
				<div class=""> </div> 
			</div>
		

		
		<div class="ranhumor">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Random Humor</span></span></div>
							<div class="ccfboxcon">

				

					<img src="http://images.mmorpg.com/images/latestLFGComic_small.jpg?cb=052015" border="0" onclick="zoombox.start('/image.cfm?image=latestLFGComic.jpg&path=images&cb=052015&width=700&height=1000&show=single');return false;"/>

			</div>
		</div>

		<a href="http://www.mmorpg.com/humor.cfm" class="morecomics">More Comics</a>

		
		


	
	<div class="clear"></div>
</div>


					<span class="clear"></span>

					

				</div>

				<div id="footer">
					<div>
						<div class="breadcrumbs">
							<a href="/" class="first"><?php echo $sitename;?>&nbsp;&raquo;</a>
							<span class="clear"></span>
						</div>
						<jdoc:include type="modules" name="footer_nav" style="none"/>
						<br />
						<br />
						<br />
						<div class='gamescom' style='text-align:center; padding-bottom:7px;'>
							<a href="http://www.games.com/" target="_blank"><img src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/images/themes/radiance/gamescom_r0.gif' width="120" height="19" border="0" alt="" /></a>
						</div>
						Copyright &#169; 2001-2015 Cyber Creations Inc.<br /><span class="datetime"><?php echo(date("M d, Y g:i A" ,time())); ?></span>
					</div>
				</div>
				<div id="favgamepanel" style="display:none;"></div>	
				<div id="gqj" class="gqj" style="display:none;"></div>
			</div>
		</div>
	</div>
</div>
<div id="shadowlayer" style="visibility:hidden;position:absolute;z-index:753;top:0px;left:0px; height:auto;"></div>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-838064-1']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);
  

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    
   	ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- Start Quantcast tag -->
<script type="text/javascript">
_qoptions={
qacct:"p-d8AA_23mKDSFo"
};
</script>
<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>
<noscript>
<a href="http://www.quantcast.com/p-d8AA_23mKDSFo" target="_blank"><img src="http://pixel.quantserve.com/pixel/p-d8AA_23mKDSFo.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/></a>
</noscript>
<!-- End Quantcast tag -->
<script type="text/javascript" src="//s.skimresources.com/js/66557X1509351.skimlinks.js"></script>

<script type="text/javascript">(function(){ var sNew = document.createElement("script"); sNew.defer = true; sNew.src = "http://tag.crsspxl.com/s1.js?d=613"; var s0 = document.getElementsByTagName('script')[0]; s0.parentNode.insertBefore(sNew, s0); })();</script>

<script src="http://cdn.slingpic.com/js/slingpic.plugin.js"></script>
<script>
	jQuery(window).load(function(){
		jQuery(".screenshot").slingPic({
			theme: "dark"
		});
	});
</script>

<!-- Start MMORPG - Adhesion -->
<div id='__kx_ad_1333'></div>
<script type="text/javascript" language="javascript">
var __kx_ad_slots = __kx_ad_slots || [];

(function () {
	var slot = 1333;
	var h = false;
	__kx_ad_slots.push(slot);
	if (typeof __kx_ad_start == 'function') {
		__kx_ad_start();
	} else {
		var s = document.createElement('script');
		s.type = 'text/javascript';
		s.async = true;
		s.src = 'http://cdn.kixer.com/ad/load.js';
		s.onload = s.onreadystatechange = function(){
			if (!h && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) {
				h = true;
				s.onload = s.onreadystatechange = null;
				__kx_ad_start();
			}
		};
		var x = document.getElementsByTagName('script')[0];
		x.parentNode.insertBefore(s, x);
	}
})();
</script>
<!-- End MMORPG - Adhesion -->

</body></html> 	
<script>		
	function onLoads(){
	pageLoaded=true; checkForZoom(); MM_preloadImages('http://images.mmorpg.com/images/themes/radiance/fullmoon/waiting_fast.gif'); zoombox.setAlpha(1); 
						eventtimerthing = -59467643;
						
						var productElement = document.getElementById('setimebox');
						if(productElement != null){
							if($('#setimebox') != 'NULL'){
								$('#setimebox').countdown({
									alwaysExpire: true,
									compact: false,
									layout: ' in {d<}{dn} {dl}, {d>}{h<}{hn} {hl}, {h>}{mn} {ml}, and {sn} {sl}',
									labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'], 
									labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'], 
									format: 'dhmS',
									compactLabels: ['y', 'm', 'w', 'd'],
									onExpiry: liftOff,
									onComplete: function(event){
										$('#hcilinkf').html('Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive');
										$('#setimebox').countdown({
											alwaysExpire: true,
											compact: false,
											layout: ' in {d<}{dn} {dl}, {d>}{h<}{hn} {hl}, {h>}{mn} {ml}, and {sn} {sl}',
											labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Minutes', 'Seconds'], 
											labels1: ['Year', 'Month', 'Week', 'Day', 'Hour', 'Minute', 'Second'], 
											format: 'dhmS',
											compactLabels: ['y', 'm', 'w', 'd'],
											onComplete: function(event) {
												$('#hcilinkf').html('Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive');
											},
											onExpiry: liftOff,
											leadingZero: false,
											until: eventtimerthing
										});
									},
									leadingZero: false,
									until: eventtimerthing
								});
							}
							else {
								//
							}
						}
						else {
							//
						}
						
						function liftOff() { 
							$('#hcilinkf').html('Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive'); 
						} 
						
					initMouseTracking(); pageLoaded=true; setInterval('getTickerPosts()',10000); pageLoaded=true; feats.init(); ExternalLinks("www.mmorpg.com"); 
		}

		document.onload = onLoads();
</script>
