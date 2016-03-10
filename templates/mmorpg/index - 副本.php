<?php defined( '_JEXEC' ) or die( 'Restricted access' );?>
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
		<script>
	
			function trackClick(skinId,location,subSkinId){
		var params = new Object();
		params['skinId'] = parseInt(skinId);
		params['location'] = location;
		params['subSkinId'] = parseInt(subSkinId);		
		http('post','/ajax/tools.cfc?method=trackSkinClick',trackClick_callback,params,true);
	}
	function trackClick_callback(){}
		
</script>
		
		<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1;" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<meta name="description" content="Free MMORPG List and MMO Games at MMORPG.com" /> <meta name="keywords" content="Free,MMO,MMORPG,Gamelist,Games,Reviews,Community" />
		<title>MMORPG.com</title> 
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
		
		<link rel='alternate' type='application/rss+xml' title='MMORPG.com Latest News RSS' href='http://feeds2.feedburner.com/mmorpg/news' />
		<link rel='alternate' type='application/rss+xml' title='MMORPG.com Latest Videos RSS' href='http://feeds2.feedburner.com/mmorpg/videos' />
		<link rel='alternate' type='application/rss+xml' title='MMORPG.com Latest User Blog Entries RSS' href='http://feeds2.feedburner.com/mmorpg/blogs' />
		<link rel='alternate' type='application/rss+xml' title='MMORPG.com Latest Forum Posts RSS' href='http://feeds2.feedburner.com/mmorpg/forums' />
		<link rel='alternate' type='application/rss+xml' title='MMORPG.com Latest Features RSS' href='http://feeds2.feedburner.com/mmorpg/features' />	
		
		<script type='text/javascript' src='<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/jquery.countdown.min.js' ></script>
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
	</head>
	<body onLoad="everyPage();">
		<script type="text/javascript">
		// *** Replace square bracketed placeholders with values provided to you in your implementation documentation ***

		bN_cfg = {
		// The "h" parameter whitelists this hostname for beacon initialization.
		// Note: Can be a string or an array of hostnames. Use "location.hostname" to match URL of current page
		h: location.hostname
		};

		function runOmni()
		{
			s_265.pfxID="gam";
			s_265.pageName=document.title;
			s_265.channel="us.mmorpg";
			s_265.linkInternalFilters="javascript:,mmorpg.com";
			s_265.prop1="";
			s_265.mmxgo=true; 

			var s_code=s_265.t();
		}
		s_265_account ="aolsvc"; 
		(function(){
			var d = document, s = d.createElement('script');
			s.type = 'text/javascript';
			s.src = (location.protocol == 'https:' ? 'https://s' : 'http://o') + '.aolcdn.com/os_merge/?file=/aol/beacon.min.js&file=/aol/omniture.min.js';
			d.getElementsByTagName('head')[0].appendChild(s);
		})();
		</script>

		<script language="JavaScript" type="text/JavaScript">
		//<![CDATA[
			function x() {
				if (document.searchForm.sitesearch.value != '')
					document.searchForm.submit();
			};
			
				var cookieBypass = false;
			

			function showQuickGamelistPanel(){
				if(pageLoaded === true){
					var params	= new Object();
					http('post','/ajax/tools.cfc?method=buildGameDropdownList',buildQuickGamelistPanelCallback,params);
				}
				return false;
			}
			
			function buildQuickGamelistPanelCallback(result){
				$('#gqj').html(result);
				toggle('gqj');
			}
			
			function buildFavGamesDropdown(){
				if(pageLoaded === true){
					var params	= new Object();
					params['userId']	= 0;
					http('post','/ajax/tools.cfc?method=buildFavGamesDropdown',buildFavGamesDropdownCallback,params);
				}
				return false;
			}
			
			function buildFavGamesDropdownCallback(result){
				$('#favgamepanel').html(result);
				// First figure where to make it
				var linkposition = findPos(getObj('favgameslink'));
				var panelobj = getObj('favgamepanel');
				var windowsize = getWindowSize();
				var finalpos = parseInt(linkposition[0])-parseInt((parseInt(windowsize[0])-990)/2);
				
				if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
					finalpos = finalpos - 20;
				}
				
				
				// Show it
				panelobj.style.left = finalpos+"px";
				toggle('favgamepanel');
			
				return false;
			}
			
			
			function closeQuickGamelistPanel(){
				toggle('gqj');
			}

			function setTheme(publicname){
				var params	= new Object();
				params['userId']	= 0;
				params['theme']	= publicname;
				http('post','/ajax/tools.cfc?method=setUserTheme',setThemeReq_callback,params);
			}

			function setThemeReq_callback(result){
				location.href	= '/index.cfm?';
			}

			function shadowBackdrop(state){
				if(pageLoaded === true){
					shadowy = getObj("shadowlayer");

					//Reset tip
					shadowy.style.display = 'none';
					shadowy.style.opacity = '0';
					shadowy.style.filter = 'alpha(opacity:0)';
					shadowy.style.visibility = "hidden";
					shadowy.style.top = "0px";
					shadowy.style.left = "0px";
					shadowy.style.width = "auto";
					shadowy.style.height = "auto";
					shadowy.innerHTML = "";
					shadowy.style.background = "transparent";
					if(parseInt(state) == 1){
						shadowy.style.opacity = '0.9';
						shadowy.style.filter = 'alpha(opacity:9)';
						shadowy.style.visibility = "visible";
						shadowy.innerHTML = "&nbsp;";
						shadowy.style.display = "block";
						shadowy.style.width = "100%";
						shadowy.style.height = "100%";
						shadowy.style.background = "#000";

						if (window.innerHeight && window.scrollMaxY) {// Firefox
							yWithScroll = window.innerHeight + window.scrollMaxY;
							xWithScroll = window.innerWidth + window.scrollMaxX;
						} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
							yWithScroll = document.body.scrollHeight;
							xWithScroll = document.body.scrollWidth;
						} else { // works in Explorer 6 Strict, Mozilla (not FF) and Safari
							yWithScroll = document.body.offsetHeight;
							xWithScroll = document.body.offsetWidth;
					  }

					  shadowy.style.height = yWithScroll+"px";

					}
				}
			}

		//]]>
	</script>

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
					
					
					<span class='other' style="color:#929292; padding-right:1px;">Network:&nbsp;</span>
					
					<a href="http://www.rtsguru.com/?utm_campaign=NetworkBar&utm_medium=topbar&utm_source=mmorpg" target="_blank" style="padding-left:14px; padding-right:6px; background:transparent url(http://images.mmorpg.com/images/rts_icon.gif) no-repeat center left">RTSguru</a>
					
					
				</div>
			</div>
			
			
			<div id="axTopLeaves">

				<div id="topContainer">

					<div id="userarea">
						
		<div id="userdata">
			<form action="/centrallogin.cfm" method="post" name="loginForm">
				<div id="formelements">
					<input type="hidden" name="from" value="/index.cfm?">
					<strong class="lab2">Login:&nbsp;</strong><input name="username" class="text loginbarinput" type="text" maxlength="20" tabindex="17" />
					<strong class="lab2">Password:&nbsp;</strong><input name="password" class="password loginbarinput" type="password" tabindex="18" />&nbsp;
					<strong class="lab2">Remember?&nbsp;</strong><input name="persistent" class="logincheckbox" type="checkbox" tabindex="19" title="Remember login?" />&nbsp;
					<input type="submit" class="submit loginbarbutton" value="Sign-in" tabindex="20" />
				</div>
				<div id="notmember"><a href="./register.html" class="uareg">Register Now</a> | <span>Forgot</span>&nbsp;<a href="./sendUsernameForm.html" rel="nofollow">Username</a> or <a href="./sendPasswordResetForm.html" rel="nofollow">Password</a></div>

				
				
				<div class="clear"></div>
			</form>
			
		</div>
	
					</div>

					<a href="" onclick="return showQuickGamelistPanel();" id="showQGLpanela">Show Quick Gamelist</a>
					
					
					
					<a href="http://www.mmorpg.com/gamelist.cfm/game/1095" id="showQGLRandonPanela">Jump to Random Game</a>

				</div>
			</div>
			
			
			
			
			
			<div id="secondbase"><div class="sbtopborder">
			<div id="container">

				
				<div class='tesomaytwvelvefive'><a href='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=20&mc=click&pli=12695181&PluID=0&ord=1432174642904' target='_blank' rel='nofollow'  onClick="trackClick(1521,'home',0)" ><img src='http://bs.serving-sys.com/BurstingPipe/adServer.bs?cn=tf&c=19&mc=imp&pli=12695181&PluID=0&ord=1432174642904&rtu=-1'></a></div><div class=""> 						
						<!-- SiteSkin_1x1 -->
						<div id='div-gpt-ad-1373084855440-0' style='width:1px; height:1px;'>
						<script type='text/javascript'>
						googletag.cmd.push(function() { googletag.display('div-gpt-ad-1373084855440-0'); });
						</script>
						</div>
					</div>

				<div id="origin">
					

					<div id="label">

						<div id="logo">
							<a href="./index.html"><img src="http://images.mmorpg.com/images/themes/radiance/fullmoon/frame_r4_logo.jpg" width="230" height="62" border="0" alt="" /></a> 
							
						</div>
						
							
						<div id="stats">
							<span class="label">Members:</span><span class="value">2,982,040</span>
							<span class="label">Users Online:</span><span class="value">1,977</span><br />
							<span class="label"><a href="\gamelist.cfm">Games</a>:</span><span class="value">824</span>&nbsp;
							<span class="label"><a href="\discussion2.cfm">Posts</a>:</span><span class="value">6,429,992</span>
							
						</div>

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

						
							
						

					</div>

					
					<div id="topcustomad" style="background:transparent url('http://images.mmorpg.com/images/devchats/20120410_mmo_default.jpg') no-repeat top left !important; height:40px; width:990px; display:block;">
						<div style="padding-left:1px;" class="custombar">
							<a href="http://www.mmorpg.com/gameon.cfm/cast/96" style=" height:40px; width:990px; display:block; background-image: url('http://images.mmorpg.com/images/announcements/62012/15_20120601_gameon_r0.jpg'); line-height:40px; text-indent:153px; font-size:18px; text-align: left !important; font-weight:bold; color:#fff;" id="hcilinkf">Game On #66 | WoW Subscriptions Plummet, Shroud of the Avatar Deep Dive</a>
						</div>
					</div>
					
					

					
					<div id="nav" style='position:relative;'>
					<jdoc:include type="modules" name="top"/>
						<div style=''></div>
						<div class="iside" style=''>
							<a href="./index.html" class="home current" title="MMORPG.com Home"><span>Home</span></a>
							<a href="./gamelist.html" class="gamelist " title="Best Free MMORPG List">Game&nbsp;List</a>
							<a href="./reviews.html" class="features " title="MMORPG Reviews">Reviews</a>
							<a href="./nope.html" class="streams" title="MMORPG Game Streams" target="_blank">Stream</a>
							<a href="./features.html" class="features " title="MMORPG Articles">Features</a>
							<a href="./forums.html" class="forum " title="MMORPG Forums">Forums</a>
							<a href="./news.html" class="news " title="MMORPG News">News</a>
							<a href="./videos.html" class="videos " title="MMORPG Videos">Videos</a>
							<a href="./blogs.html" class="blogs " title="MMORPG Blogs">Blogs</a>
							<a href="../columns.html" class="features " title="MMORPG Columns">Columns</a>
							
							<a href="./search.html" class="" title="Search MMORPG.com">Search</a>
							<a href="./nope.html" class="last" title="MMORPG.com Store" target="_blank">Store</a>
							<div class="navspacer">
								<a href="http://www.mmorpg.com/playnow.cfm" class="livestream" style="width:170px; text-align:center; text-indent:-4px;" title="Free MMORPGs">Play Now</a>
							</div>
							<div class="clear"></div>
						</div>
						
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

				<div id="footer"><div>
				
				<div class="breadcrumbs">
					<a href="http://www.mmorpg.com/" class="first">MMORPG.com&nbsp;&raquo;</a>
					
					<span class="clear"></span>
				</div>
				
				
					<a href="http://www.mmorpg.com/login.cfm">Login</a>&nbsp;|&nbsp;
				
				<a href="http://www.mmorpg.com/ad_policies.cfm">Advertising Policies</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/disclaimers.cfm#conduct">Rules Of Conduct</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/disclaimers.cfm#privacy">Privacy Policy</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/disclaimers.cfm#copyright">Copyright Notice</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/opportunities.cfm">Employment Opportunities</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/bio.cfm">About Us</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/faq.cfm">FAQ</a>&nbsp;|&nbsp;
				<a href="http://www.mmorpg.com/contactus.cfm">Contact Us</a><br />
				<br />

				<form action="/search.cfm" method="post" name="searchForm" class="search">
					Search&nbsp;
					<input type="text" maxlength="20" name="sitesearch" tabindex="98" id="footSrchBox" class="text" onKeyDown="charcount('footSrchBox','footSrchBtn',3)" onKeyUp="charcount('footSrchBox','footSrchBtn',3)">
					<input type="submit" value="Go" class="submit" name="search" id="footSrchBtn" class="submit" tabindex="99" disabled />
					&nbsp;					
					
						Gamelist&nbsp;
						<select name="gamelistjump" onChange="jumpToGamePage();" class="dropdown" style="width:150px;">
							<option value="">Jump to a game...</option>
							<option value="421">4Story</option><option value="795">8BitMMO</option><option value="235">9Dragons</option><option value="22">A Tale in the Desert</option><option value="178">A3</option><option value="842">Aberoth</option><option value="453">Absolute Terror</option><option value="357">ACE Online</option><option value="722">Achaea</option><option value="1201">AD2460</option><option value="379">AdventureQuest Worlds</option><option value="530">Aerrevan</option><option value="723">Aetolia: The Midnight Age</option><option value="380">AfterWorld</option><option value="191">Age of Conan: Unchained</option><option value="583">Age of Empires Online</option><option value="749">Age of Wushu</option><option value="626">Aida Arenas</option><option value="489">Aika</option><option value="253">Aion</option><option value="1105">Akanbar</option><option value="958">Albion Online</option><option value="388">Alganon</option><option value="414">Allods Online</option><option value="1130">Alphadia Genesis</option><option value="976">Amazing World</option><option value="10">Anarchy Online</option><option value="637">Ancients of Fasaria</option><option value="950">Andromeda 5</option><option value="319">Angels Online</option><option value="1127">Angry Birds Epic</option><option value="1192">Anime Ninja</option><option value="1191">Anime Pirates</option><option value="786">Anime Trumps</option><option value="802">Anmynor</option><option value="870">Anno Online</option><option value="202">Antilia</option><option value="358">APB: Reloaded</option><option value="744">Applo</option><option value="830">Arcane Legends</option><option value="572">ArcheAge</option><option value="989">Archeblade</option><option value="1144">Archlord 2</option><option value="596">ARGO Online</option><option value="1281">ARK: Survival Evolved</option><option value="1179">Armored Warfare</option><option value="1143">Ascend: Hand of Kul</option><option value="591">Asda 2</option><option value="133">Ashen Empires</option><option value="18">Asheron's Call</option><option value="1">Asheron's Call 2 : Fallen Kings</option><option value="1239">Asteroids: Outpost</option><option value="47">Astonia III</option><option value="1103">Astral Terra</option><option value="564">Astro Empires</option><option value="1001">Astro Lords: Oort Cloud</option><option value="905">Asura Force</option><option value="346">Atlantica Online</option><option value="967">Aura Kingdom</option><option value="397">Aurora Blade</option><option value="949">Avatar Star</option><option value="1217">Avernum 2: Crystal Souls</option><option value="1079">Azulgar</option><option value="929">Battle Dawn</option><option value="928">Battle Dawn Galaxies</option><option value="639">Battle for Graxia</option><option value="512">Battle of the Immortals</option><option value="1136">Battlecry</option><option value="538">Battlestar Galactica Online</option><option value="1234">Bionic Marine Command Online</option><option value="427">Black Aftermath</option><option value="944">Black Desert</option><option value="945">Black Gold Online</option><option value="866">Black Prophecy Tactics: Nexus Conflict</option><option value="1248">Blackfaun</option><option value="1223">Blackguards</option><option value="1220">Blackguards 2</option><option value="498">Blade & Soul</option><option value="998">Blade Hunter</option><option value="521">Blade Wars</option><option value="827">Blazing Throne</option><option value="917">Bless</option><option value="223">Blitz1941</option><option value="1106">Block Story</option><option value="1087">Blood and Jade</option><option value="1253">Bloodborne</option><option value="746">Bloodline Champions</option><option value="1138">Boot Hill Heroes</option><option value="1023">Borderlands 2</option><option value="1090">Borderlands: The Pre-Sequel</option><option value="1032">Bound by Flame</option><option value="295">Bounty Bay Online</option><option value="630">Bounty Hounds Online</option><option value="959">Brain Storm</option><option value="1107">Bravada</option><option value="1034">Bravely Default</option><option value="1035">Bravely Second</option><option value="766">Brick-Force</option><option value="495">Bright Shadow</option><option value="517">Business Tycoon Online</option><option value="1260">Cabal 2</option><option value="263">CABAL Online</option><option value="548">Caesary</option><option value="645">Call of Gods</option><option value="685">Call of Thrones</option><option value="926">Camelot Unchained</option><option value="646">Canaan Online</option><option value="988">CasinoRPG</option><option value="1154">Cast & Conquer</option><option value="696">Castlot</option><option value="608">Céiron Wars: Sound of Depths</option><option value="1008">Celtic Heroes</option><option value="934">Champions of Regnum</option><option value="335">Champions Online</option><option value="1176">Chaos Heroes Online</option><option value="1045">Child of Light</option><option value="1249">Chroma Squad</option><option value="897">Chrono Tales</option><option value="333">Citadel of Sorcery</option><option value="1129">Citizens of Earth</option><option value="850">City of Steam</option><option value="611">City Transformer Online</option><option value="966">Civilization Online</option><option value="49">Clan Lord</option><option value="859">Clash of Clans</option><option value="565">CloudNine</option><option value="359">Club Penguin</option><option value="589">Colony of War</option><option value="736">Command & Conquer Tiberium Alliances</option><option value="109">Conquer Online</option><option value="839">Conquer Online 3</option><option value="697">Continent of the Ninth Seal</option><option value="831">Core Blaze</option><option value="759">Core Exiles</option><option value="1162">Costume Quest 2</option><option value="387">CrimeCraft</option><option value="433">Crimelife 2</option><option value="143">Cronous</option><option value="919">Crota II</option><option value="1214">Crowfall</option><option value="1140">Crusaders of Solaria</option><option value="633">Crystal Saga</option><option value="647">Cultures Online</option><option value="995">Cyber Monster 2</option><option value="1022">Cyberpunk 2077</option><option value="119">Daimonin</option><option value="882">Dalethaan</option><option value="11">Dark Age of Camelot</option><option value="128">Dark Ages</option><option value="822">Dark Blood Online</option><option value="761">Dark Legends</option><option value="973">Dark Relic: Prelude</option><option value="204">Dark Solstice</option><option value="1012">Dark Souls II</option><option value="236">DarkEden</option><option value="1092">Darkest Dungeon</option><option value="875">Darkfall: Unholy Wars</option><option value="648">DarkOrbit</option><option value="144">DarkSpace</option><option value="260">Darkwind: War on Wheels</option><option value="1083">Das Tal</option><option value="587">Dawn of Fantasy: Kingdom Wars</option><option value="1101">Dawn of the Immortals</option><option value="621">Dawntide</option><option value="834">DayZ</option><option value="350">DC Universe Online</option><option value="652">DDTank</option><option value="728">Dead Earth</option><option value="437">Dead Frontier</option><option value="1156">Dead Island</option><option value="1155">Dead Island 2</option><option value="1157">Dead Island: Riptide</option><option value="1166">Dead State</option><option value="1025">Deep Down</option><option value="887">Deepworld</option><option value="602">Defiance</option><option value="321">Dekaron</option><option value="70">Deloria Legends Online</option><option value="1142">Demon Crusade</option><option value="1064">Demons at the Horizon</option><option value="676">Desert Operations</option><option value="927">Destiny</option><option value="356">Destiny Online</option><option value="1267">Deus Ex: Mankind Divided</option><option value="644">Diablo 3</option><option value="531">Digimon Masters Online</option><option value="764">Dino Storm</option><option value="42">Disney's Toontown Online</option><option value="269">Divergence Online</option><option value="783">Divina</option><option value="528">Divine Souls</option><option value="1039">Divinity: Original Sin</option><option value="838">DK Online</option><option value="209">DOFUS</option><option value="1141">Doom Warrior</option><option value="614">DOTA</option><option value="615">DOTA2</option><option value="1028">Dragon Age: Inquisition</option><option value="781">Dragon Born Online</option><option value="775">Dragon Eternity</option><option value="1073">Dragon Fin Soup</option><option value="1213">Dragon Heart Online</option><option value="487">Dragon Nest</option><option value="457">Dragon Oath</option><option value="1284">Dragon of Legends</option><option value="1088">Dragon Pals</option><option value="97">Dragon Raja Online</option><option value="650">Dragon Saga</option><option value="509">Dragon's Call</option><option value="872">Dragon's Call II</option><option value="692">Dragon's Prophet</option><option value="396">DragonFable</option><option value="342">Dragonica Online World</option><option value="1067">Dragons and Titans</option><option value="1077">Drakengard 3</option><option value="651">Drakensang Online</option><option value="309">Dream of Mirror Online</option><option value="468">Dreamland Online</option><option value="259">Dreamlords: Resurrection</option><option value="416">Drift City</option><option value="798">Dungeon Blitz</option><option value="441">Dungeon Fighter Online</option><option value="1133">Dungeon of the Endless</option><option value="727">Dungeon Overlord</option><option value="340">Dungeon Party</option><option value="868">Dungeon Rampage</option><option value="163">Dungeons & Dragons Online</option><option value="494">DUST 514</option><option value="987">DV8: Exile</option><option value="1236">Dying Light</option><option value="625">Dynastica</option><option value="904">Dynasty of the Magi</option><option value="553">Dynasty Warriors Online</option><option value="1256">Earthlock: Festival of Magic</option><option value="331">Earthrise: First Impact</option><option value="1264">Echo of Soul</option><option value="1063">Eclipse War</option><option value="923">Ecol Tactics Online</option><option value="590">Eden Eternal</option><option value="1093">Edge of Space</option><option value="733">EIN (Epicus Incognitus)</option><option value="825">Einherjar - The Viking's Blood</option><option value="821">Elder Scrolls Online</option><option value="857">Eldevin</option><option value="963">Elite: Dangerous</option><option value="653">Elsword</option><option value="1275">Elvenar</option><option value="806">Embers of Caerus</option><option value="947">Empire</option><option value="571">Empire & State</option><option value="508">Empire Craft</option><option value="324">Empire of Sports</option><option value="937">Empire Universe 3</option><option value="885">Endless Blue Moon Online</option><option value="167">Endless Online</option><option value="31">Entropia Universe</option><option value="1116">Entropy</option><option value="717">EpicDuel</option><option value="1206">Erebus 2</option><option value="807">Eredan</option><option value="748">eRepublik</option><option value="796">Eternal Blade</option><option value="73">Eternal Lands</option><option value="962">Eternal Saga</option><option value="750">Ether Fields</option><option value="374">Ether Saga Online</option><option value="1266">Etrian Mystery Dungeon</option><option value="1251">Etrian Odyssey 2 Untold: The Fafnir Knight</option><option value="256">Eudemons Online</option><option value="549">EuroGangster</option><option value="14">EVE Online</option><option value="1009">EverEmber Online</option><option value="936">Everlight</option><option value="422">Evernight</option><option value="9">EverQuest</option><option value="2">EverQuest II</option><option value="952">EverQuest Next</option><option value="1235">Evidyon: No Man's Land</option><option value="486">Evony</option><option value="975">Excalibur</option><option value="484">Exorace</option><option value="964">F.E.A.R. Online</option><option value="1246">Fable Legends</option><option value="91">Face of Mankind</option><option value="1240">Factions</option><option value="121">Fairyland Online</option><option value="420">Fall of Rome</option><option value="126">Fallen Earth</option><option value="429">Fallen Sword</option><option value="1021">Fallout 4</option><option value="691">Fantage</option><option value="1121">Fantasy Life</option><option value="577">Fantasy Realm Online: Moon Haven</option><option value="751">Fantasy Tales Online</option><option value="123">Fantasy Worlds: Rhynn</option><option value="1075">Fearless Fantasy</option><option value="419">Ferion</option><option value="310">Fiesta Online</option><option value="1122">Final Fantasy Type-0 HD</option><option value="74">Final Fantasy XI</option><option value="446">Final Fantasy XIV: A Realm Reborn</option><option value="1026">Final Fantasy XV</option><option value="566">Firefall</option><option value="532">Fists of Fu</option><option value="337">Florensia</option><option value="205">Flyff Gold</option><option value="301">Football SuperStars</option><option value="286">Force of Arms</option><option value="841">Forge</option><option value="1135">Forsaken Uprising</option><option value="518">Forsaken World</option><option value="1274">Forsaken World Mobile</option><option value="960">Fortnite</option><option value="961">Fortuna</option><option value="240">FreeWorld: Apocalypse Portal</option><option value="80">Furcadia</option><option value="373">FusionFall</option><option value="401">GalaXseeds</option><option value="381">Galaxy Online 2</option><option value="790">Game of Thrones: Seven Kingdoms</option><option value="1100">Games of Glory</option><option value="171">Gate to Heavens</option><option value="493">Gates of Andaron</option><option value="1069">Gauntlet</option><option value="229">Gekkeiju Online</option><option value="721">Ghost Recon: Phantoms</option><option value="1146">Gigantic</option><option value="418">Gladiatus</option><option value="339">Global Agenda</option><option value="823">Global Soccer</option><option value="896">Gloria Victis</option><option value="977">Glory of Gods</option><option value="412">Goal Line Blitz</option><option value="1203">Gods Rush</option><option value="288">Godswar Online</option><option value="675">Golden Age</option><option value="654">Golf Star</option><option value="38">Graal Kingdoms</option><option value="193">Granado Espada Online</option><option value="497">Grand Fantasia</option><option value="1215">Grav</option><option value="655">Grepolis</option><option value="1047">Grim Dawn</option><option value="82">Guild Wars</option><option value="473">Guild Wars 2</option><option value="243">Guild Wars Factions</option><option value="277">Guild Wars Nightfall</option><option value="1091">H1Z1</option><option value="306">Habbo</option><option value="892">Hailan Rising</option><option value="903">HaloSphere2</option><option value="1241">Hand of Fate</option><option value="779">Haven & Hearth</option><option value="867">Hawken</option><option value="1110">Heart Forth Alicia</option><option value="974">Hearthstone: Heroes of Warcraft</option><option value="69">Helbreath</option><option value="594">Hellgate</option><option value="334">Hello Kitty Online</option><option value="258">Hero Online</option><option value="880">Hero Zero</option><option value="525">Hero: 108 Online</option><option value="844">Heroes & Generals</option><option value="1147">Heroes & Legends: Conquerors of Kolhar</option><option value="657">Heroes in the Sky</option><option value="1078">Heroes of Atlan</option><option value="492">Heroes of Gaia</option><option value="629">Heroes Of Newerth</option><option value="1002">Heroes of the Storm</option><option value="716">HeroSmash</option><option value="955">Hex</option><option value="1272">Highlands</option><option value="135">Hostile Space</option><option value="1160">Icewind Dale: Enhanced Edition</option><option value="658">Ikariam</option><option value="111">Illutia</option><option value="797">Illyriad</option><option value="1148">Immortal Day</option><option value="1255">Immune</option><option value="724">Imperian</option><option value="1000">Inferno Legend</option><option value="856">Infestation: Survivor Stories</option><option value="1054">Infinite Crisis</option><option value="241">Infinity: The Quest for Earth</option><option value="884">Iron Grip: Marauders</option><option value="804">Island Forge</option><option value="546">Islands of War</option><option value="17">Istaria: Chronicles of the Gifted</option><option value="447">Jade Dynasty</option><option value="742">Jagged Alliance Online</option><option value="595">Juggernaut</option><option value="771">Kakele Online</option><option value="172">KAL Online</option><option value="932">Kartuga</option><option value="1210">Kill Strain</option><option value="543">King of Kings 3</option><option value="99">Kingdom of Drakkar</option><option value="920">Kingdom Under Fire II</option><option value="526">Kingory</option><option value="898">Kings and Legends</option><option value="1182">Kings Era</option><option value="1099">Kings of the Realm</option><option value="1015">KingsRoad</option><option value="672">Kiwarriors</option><option value="845">Knight Age</option><option value="132">Knight Online</option><option value="1244">Knights Fable</option><option value="1149">Kyn</option><option value="458">La Tale</option><option value="1270">Land of Britain</option><option value="765">Land of Chaos Online</option><option value="982">Landmark</option><option value="776">Lands of Hope: Redemption</option><option value="238">Last Chaos</option><option value="985">League of Angels</option><option value="436">League of Legends</option><option value="1259">Leap of Fate</option><option value="889">Legend of Edda: Vengeance</option><option value="1195">Legend of Grimrock 2</option><option value="1120">Legends of Persia</option><option value="983">Lego Minifigures Online</option><option value="1159">Lichdom: Battlemage</option><option value="631">Life is Feudal</option><option value="741">Light of Nova</option><option value="1081">Lightbringers: Saviors of Raia</option><option value="618">Lime Odyssey</option><option value="570">Line of Defense</option><option value="46">Lineage 2</option><option value="710">Lineage Eternal: Twilight Resistance</option><option value="791">Linkrealms</option><option value="1282">Little Devil Inside</option><option value="784">Living After War</option><option value="659">Loong</option><option value="45">Lord of the Rings Online</option><option value="1280">Lord's Road</option><option value="1030">Lords of The Fallen</option><option value="1211">Lords of the Fallen 2</option><option value="500">Lords Online</option><option value="1250">Lost Dimension</option><option value="762">Lost Saga</option><option value="603">Lucent Heart</option><option value="212">Luminary: Rise of the GoonZu</option><option value="725">Lusternia: Age of Ascension</option><option value="638">Luvinia World</option><option value="330">Mabinogi</option><option value="785">Maestia: Rise of Keledus</option><option value="1005">Magic Barrage</option><option value="338">Magic World Online</option><option value="1273">Magicka Wizard Wars</option><option value="166">MapleStory</option><option value="969">Margonem</option><option value="660">Martial Empires</option><option value="693">Marvel Heroes 2015</option><option value="533">Marvel Super Hero Squad Online</option><option value="1027">Mass Effect 4</option><option value="694">MechWarrior Online</option><option value="55">Meridian 59 : Evolution</option><option value="881">Merlin</option><option value="810">MetalMercs</option><option value="291">Metin 2</option><option value="688">Microvolts</option><option value="1061">Middle-earth: Shadow of Mordor</option><option value="726">Midkemia Online</option><option value="1193">Might & Magic Heroes Online</option><option value="1007">Might and Magic X: Legacy</option><option value="755">MilMo</option><option value="939">Minecraft</option><option value="225">Minions of Mirth</option><option value="551">Ministry of War</option><option value="862">Monarch: Heroes of a New Age</option><option value="1080">Monkey King Online</option><option value="808">Monkey Quest</option><option value="1124">Monster Hunter 4: Ultimate</option><option value="731">MonsterMMORPG</option><option value="1151">Moonrise</option><option value="812">Mordavia</option><option value="361">Mortal Online</option><option value="103">MU Online</option><option value="720">My Lands</option><option value="261">Myst Online: URU Live</option><option value="347">Myth War 2</option><option value="1163">Mythborne</option><option value="924">Mythic Saga</option><option value="285">Mythos</option><option value="686">Naviage: The Power of Capital</option><option value="313">Navy Field</option><option value="1237">Nebula Online</option><option value="1247">Necropolis</option><option value="539">Need for Speed World</option><option value="663">Nemexia</option><option value="970">Neo's Land</option><option value="29">Neocron 2</option><option value="1004">Nether</option><option value="634">Neverwinter</option><option value="76">Nexus: The Kingdom Of The Winds</option><option value="1265">Nosgoth</option><option value="371">NosTale</option><option value="1212">Nova Genesis</option><option value="871">Novus Aeterno</option><option value="93">Oberin</option><option value="853">Odin Quest</option><option value="1089">Odyssey RPG</option><option value="190">Ogre Island</option><option value="462">Omerta 3</option><option value="1233">OnePiece Online</option><option value="991">Online Boxing Manager</option><option value="1060">Online Tennis Manager</option><option value="466">Onverse</option><option value="1184">Oort Online</option><option value="1261">Orcs Must Die: Unchained</option><option value="580">Order & Chaos Online</option><option value="907">Order of Magic</option><option value="978">Original Blood</option><option value="679">Origins Of Malu</option><option value="768">Origins Return</option><option value="485">Orion's Belt</option><option value="643">Otherland</option><option value="394">Outwar</option><option value="612">Overkings</option><option value="899">OverSoul</option><option value="1202">Overwatch</option><option value="843">Oz Online</option><option value="569">Pandora Saga</option><option value="1006">Pantheon: Rise of the Fallen</option><option value="990">Panzar</option><option value="483">Parallel Kingdom</option><option value="747">Path of Exile</option><option value="719">Pathfinder Online</option><option value="282">Perfect World International</option><option value="438">Perpetuum</option><option value="1042">Persona 5</option><option value="1126">Persona Q: Shadow of the Labyrinth</option><option value="811">Phantasy Star Online 2</option><option value="1029">Pillars of Eternity</option><option value="411">Pirate Galaxy</option><option value="268">Pirate King Online</option><option value="774">Pirate Storm</option><option value="816">Pirate101</option><option value="68">Pirates of the Burning Sea</option><option value="30">PlaneShift</option><option value="942">Planet Arkadia</option><option value="941">Planet Calypso</option><option value="1086">Planets³</option><option value="71">PlanetSide</option><option value="599">PlanetSide 2</option><option value="556">Pocket Legends</option><option value="665">Pockie Ninja</option><option value="863">Pockie Pirates</option><option value="971">Pockie Saints</option><option value="1036">Pokemon X/Y</option><option value="756">PoxNora</option><option value="772">Prime World</option><option value="399">Prison Struggle</option><option value="35">Priston Tale</option><option value="266">Priston Tale II: 2nd Engima</option><option value="1053">Prodigy</option><option value="664">Project Blackout</option><option value="1169">Project Gorgon</option><option value="417">Project Powder</option><option value="953">Project Titan</option><option value="1044">Project Zomboid</option><option value="1057">Quest for Infamy</option><option value="448">QuickHit Football</option><option value="607">R2 Online: Reign of Revolution</option><option value="860">Rage of 3 Kingdoms</option><option value="96">Ragnarok Online</option><option value="902">Ragnarok Online II</option><option value="604">RaiderZ</option><option value="1180">Rail Nation</option><option value="220">Rakion</option><option value="214">RAN Online</option><option value="274">Rappelz</option><option value="739">RappelzSEA</option><option value="1098">Ravenmarch: Empire in Flames</option><option value="1173">Realm of Sierra</option><option value="780">Realm of the Mad God</option><option value="826">Realm of the Titans</option><option value="579">Realms Online</option><option value="1188">Rebel Galaxy</option><option value="289">Red Stone</option><option value="279">Regnum Online</option><option value="586">Remnant Knights</option><option value="695">Repulse</option><option value="325">Requiem: Memento Mori</option><option value="1262">Revelation: Fire and Ice</option><option value="1242">Revival</option><option value="210">RF Online</option><option value="431">Rift</option><option value="757">RiotZone</option><option value="254">Rise</option><option value="729">Rise of Dragonian Era</option><option value="901">Rise of the Tycoon</option><option value="1097">Risen 3: Titan Lords</option><option value="682">Rising of King</option><option value="666">Rivality</option><option value="392">Roblox</option><option value="249">Rohan: Blood Feud</option><option value="809">Roll n Rock</option><option value="677">Romadoria</option><option value="183">ROSE Online</option><option value="735">ROSH Online</option><option value="787">Roto X</option><option value="1117">Royal Quest</option><option value="459">Rumble Fighter</option><option value="351">Runes of Magic</option><option value="37">Runescape</option><option value="999">Rust</option><option value="600">Rusty Hearts</option><option value="36">Ryzom</option><option value="435">S4 League</option><option value="1152">Sacred 3</option><option value="443">SAGA</option><option value="707">Sagramore</option><option value="582">Salem</option><option value="1219">Savage Lands</option><option value="992">SaySayGirls</option><option value="922">Scarlet Blade</option><option value="578">Scarlet Legacy</option><option value="275">Scions of Fate (Yulgang)</option><option value="730">SD Gundam Capsule Fighter Online</option><option value="501">Seal Online: Evolution</option><option value="1052">Second Chance Heroes</option><option value="83">Second Life</option><option value="832">Serenia Fantasy</option><option value="979">Seven Seas Saga</option><option value="769">Sevencore</option><option value="1031">Shadow of the Beast</option><option value="1145">Shadowbound</option><option value="1187">Shadowgate</option><option value="965">Shadowrun Chronicles</option><option value="1058">Shadowrun Returns</option><option value="1216">Shadowrun: Hong Kong</option><option value="320">Shaiya</option><option value="1082">Shards Online</option><option value="32">Shattered Galaxy</option><option value="1277">Shin Megami Tensei Devil Survivor 2 Record Breaker</option><option value="168">Shot Online</option><option value="935">Shroud of the Avatar</option><option value="879">SideQuest</option><option value="1279">Siegelord</option><option value="218">Silkroad Online</option><option value="1071">Skyforge</option><option value="778">SmashMuck Champions</option><option value="642">SMITE</option><option value="829">Smoo Online</option><option value="1167">Soldiers Inc.</option><option value="534">Soul Master</option><option value="854">Soul of Guardian</option><option value="763">Soul Order Online</option><option value="1040">South Park Stick of Truth</option><option value="622">Space Heroes Universe</option><option value="1139">Sparta: War of Empires</option><option value="161">Spellcasters: The Last Mage</option><option value="674">Spiral Knights</option><option value="1268">Spirit Lords</option><option value="760">Spirit Tales</option><option value="383">Splash Fighters</option><option value="814">Squad Wars</option><option value="883">Star Citizen</option><option value="938">Star Conflict</option><option value="635">Star Legends</option><option value="1269">Star Ocean 5: Integrity and Faithlessness</option><option value="160">Star Sonata 2</option><option value="877">Star Stable</option><option value="610">Star Supremacy</option><option value="352">Star Trek Online</option><option value="535">Star Wars: Clone Wars Adventures</option><option value="367">Star Wars: The Old Republic</option><option value="1013">Starbound</option><option value="925">Starlight Story</option><option value="933">Starpires</option><option value="145">Starport: Galactic Empires</option><option value="227">StarQuest Online</option><option value="1072">State of Decay</option><option value="740">SteelWar Online</option><option value="1094">Stormfall: Age of War</option><option value="1178">Stormthrone</option><option value="1104">Strife</option><option value="799">Stronghold Kingdoms</option><option value="1095">Styx - Master of Shadows</option><option value="456">Sudden Attack</option><option value="1153">Sudden Crisis</option><option value="667">Supremacy 1914</option><option value="177">Supreme Destiny</option><option value="1238">Sword Coast Legends</option><option value="1068">Swordsman</option><option value="847">SwordX</option><option value="393">Taikodom</option><option value="515">Tales of Fantasy</option><option value="529">Tales of Pirates II</option><option value="994">Tales of Solaris</option><option value="1038">Tales of Symphonia: Chronicles</option><option value="317">Talisman Online</option><option value="794">Tamer Saga</option><option value="170">Tantra Online</option><option value="477">TERA</option><option value="668">Terra Militaris</option><option value="1019">Terraria</option><option value="105">TerraWorld Online</option><option value="179">Thang Online</option><option value="106">The 4th Coming</option><option value="908">The Aurora World</option><option value="1137">The Banner Saga</option><option value="1209">The Banner Saga 2</option><option value="1085">The Black Watchmen</option><option value="1049">The Crew</option><option value="957">The Division</option><option value="1172">The Epic Might</option><option value="956">The Hammers End</option><option value="1096">The Incredible Adventures of Van Helsing</option><option value="1062">The Incredible Adventures of Van Helsing 2</option><option value="1271">The Incredible Adventures of Van Helsing III</option><option value="894">The Lost Titans</option><option value="1055">The Mighty Quest for Epic Loot</option><option value="708">The Missing Ink</option><option value="714">The Mummy Online</option><option value="805">The Pride of Taern</option><option value="56">The Realm Online</option><option value="738">The Repopulation</option><option value="404">The Secret World</option><option value="649">The Settlers Online</option><option value="673">The Stratagems</option><option value="869">The West</option><option value="1011">The Witcher 3: Wild Hunt</option><option value="1231">The Witcher Battle Arena</option><option value="1134">The World 2</option><option value="876">Theralon</option><option value="115">There</option><option value="1065">Therian Saga</option><option value="85">Tibia</option><option value="213">Tibia Micro Edition</option><option value="1066">Tiger Knight</option><option value="836">Titan Siege</option><option value="1016">Titans of Time</option><option value="432">Torchlight 2</option><option value="1020">Torment: Tides of Numenera</option><option value="951">Total Domination</option><option value="1033">Transistor</option><option value="1164">Transverse</option><option value="1258">Trapped Dead: Lockdown</option><option value="782">Traveller AR</option><option value="490">Travian</option><option value="1263">Tree of Savior</option><option value="1199">Triad Wars</option><option value="100">Trials of Ascension</option><option value="789">Tribal Hero</option><option value="669">Tribal Wars</option><option value="561">Tribes: Ascend</option><option value="984">Trove</option><option value="1010">TUG</option><option value="840">Tynon</option><option value="712">UFO Online</option><option value="12">Ultima Online</option><option value="1278">Umbra</option><option value="555">Uncharted Waters Online</option><option value="793">Unification Wars</option><option value="993">Unlimited Ninja</option><option value="1254">Utherous</option><option value="858">Utopia</option><option value="1165">Vainglory</option><option value="1024">Valdis Story - Abyssal City</option><option value="232">Valhyre</option><option value="1243">Valiance Online</option><option value="833">Vampire Lord Online</option><option value="400">Vanquish Space</option><option value="154">Vendetta Online</option><option value="449">Victory: Age of Racing</option><option value="592">Villagers and Heroes</option><option value="523">Vindictus</option><option value="510">Virtonomics Economics Game Online</option><option value="801">Visions of Zosimos</option><option value="1084">VoidExpanse</option><option value="278">Voyage Century Online</option><option value="345">Wakfu</option><option value="557">War of 2012</option><option value="503">War of Legends</option><option value="946">War of Mercenaries</option><option value="690">War of the Immortals</option><option value="734">War of Thrones</option><option value="623">War Thunder</option><option value="895">WAR2 Glory</option><option value="813">Waren Story</option><option value="1181">Warflare</option><option value="683">WarFlow</option><option value="1017">Warframe</option><option value="773">Wargame1942</option><option value="954">Warhammer 40.000: Eternal Crusade</option><option value="837">Warkeepers</option><option value="865">Wartune</option><option value="1014">Wasteland 2</option><option value="632">WildStar</option><option value="852">Wind of Luck: Arena</option><option value="891">Wings of Destiny</option><option value="296">With Your Destiny</option><option value="362">Wizard101</option><option value="681">Wizardry Online</option><option value="318">Wonderland Online</option><option value="670">World Golf Tour</option><option value="1113">World of Aidos</option><option value="818">World of Battles</option><option value="684">World of Heroes</option><option value="114">World of Pirates</option><option value="1048">World of Speed</option><option value="544">World of Tanks</option><option value="864">World of Tanks Generals</option><option value="948">World of Trinketz</option><option value="15">World of Warcraft</option><option value="624">World of WarPlanes</option><option value="1194">World of Warriors</option><option value="636">World of Warships</option><option value="754">WorldAlpha</option><option value="129">Wurm Online</option><option value="34">WWII Online: Battleground Europe</option><option value="1257">Xenoblade Chronicles 3D</option><option value="1115">Xenoblade Chronicles: X</option><option value="890">Xenocell</option><option value="182">Xiah</option><option value="514">Xsyon: Prelude</option><option value="886">Xulu</option><option value="940">Yitien</option><option value="131">Yohoho! Puzzle Pirates</option><option value="1174">Zodiac</option><option value="478">Zodiac Online</option><option value="1070">Zombies Ate My Pizza</option>
						</select>
					
				</form>
				<br /><span class="notmember">
					Friends:&nbsp;<a href="http://www.vgchartz.com" target="_blank">vgchartz.com</a><br />
				
					Not a member? You can still subscribe to our newsletters and daily updates <a href="http://www.mmorpg.com/subscribe.cfm">here</a>!
					<br />
				
				<br />
				</span>
				<div class='gamescom' style='text-align:center; padding-bottom:7px;'>
					<a href="http://www.games.com/" target="_blank"><img src='http://images.mmorpg.com/images/themes/radiance/gamescom_r0.gif' width="120" height="19" border="0" alt="" /></a>
				</div>
				Copyright &#169; 2001-2015 Cyber Creations Inc.<br /><span class="datetime">May 20, 2015 9:17 PM</span>
				<p>
					<span class="generationtime">- Page Created in 0.281 seconds -</span>
				</p>

				</div></div>
				
				<div id="favgamepanel" style="display:none;"></div>	
				<div id="gqj" class="gqj" style="display:none;"></div>

		</div>
		</div></div>
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
