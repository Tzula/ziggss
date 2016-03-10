<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$doc  = JFactory::getDocument();
?>

			<!--  <script type="text/javascript" src="http://apis.google.com/js/plusone.js"></script><script async="" type="text/javascript" src="http://www.googletagservices.com/tag/js/check_359604.js"></script><iframe src="http://tpc.googlesyndication.com/safeframe/1-0-2/html/container.html" style="visibility: hidden; display: none;"></iframe><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>-->

	<div class="gvew2">

		
		<div class="hdrtwo" style="background: #59C8FF;">
			<div class="iconarea"><a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" sl-processed="1"><img src="<?php echo $doc->baseurl . $this->item->image; ?>" width="104" height="105" border="0" class="" onerror="this.src='/media/other/generic.png'"></a></div>
			<div class="gvh_etrxtheme2"></div>
			<div class="ninfo">
				<div class="gvtitle"><div class="titleblock"><a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" sl-processed="1"><?php echo $this->item->name;?></a></div><div class="clear"></div></div>
				<div class="gvsubtitle">Funcom&nbsp;</div>
				<div class="gvstats">
					<!--  
					<span class="statHigh">
						MMORPG
					</span>&nbsp;|&nbsp;-->
					Setting:<span class="statHigh">
						<?php echo $this->item->genres_name; ?>
					</span>&nbsp;|&nbsp;
					Status:<span class="statHigh">
						<?php if ($this->item->status == 1): ?>
							<?php echo 'Alpha'; ?>
						<?php elseif ($this->item->status == 2): ?>
							<?php echo 'Beta Testing'; ?>
						<?php elseif ($this->item->status == 3): ?>
							<?php echo 'Cancelled'; ?>
						<?php elseif ($this->item->status == 4): ?>
							<?php echo 'Development'; ?>
						<?php elseif ($this->item->status == 5): ?>
							<?php echo 'Early Access'; ?>
						<?php elseif ($this->item->status == 6): ?>
							<?php echo 'Final'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					&nbsp;
					(rel <?php echo substr($this->item->releaseddate, 0, 10); ?>) 
					
					</span>&nbsp;|&nbsp;Pub:<span class="statHigh"><?php echo $this->item->publisher_name; ?></span><br>
					PVP:<span class="statHigh">
						<?php if ($this->item->pvp == 0): ?>
							<?php echo 'No'; ?>
						<?php elseif ($this->item->pvp == 1): ?>
							<?php echo 'Has'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Distribution:<span class="statHigh">
						<?php if ($this->item->distribution == 1): ?>
							<?php echo 'Browser'; ?>
						<?php elseif ($this->item->distribution == 2): ?>
							<?php echo 'Download'; ?>
						<?php elseif ($this->item->distribution == 3): ?>
							<?php echo 'Retail'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Pay&nbsp;Type:<span class="statHigh">
						<?php if ($this->item->paymenttype == 1): ?>
							<?php echo 'Buy to Play'; ?>
						<?php elseif ($this->item->paymenttype == 2): ?>
							<?php echo 'Free'; ?>
						<?php elseif ($this->item->paymenttype == 3): ?>
							<?php echo 'Hybrid'; ?>
						<?php elseif ($this->item->paymenttype == 4): ?>
							<?php echo 'Item Mall'; ?>
						<?php elseif ($this->item->paymenttype == 5): ?>
							<?php echo 'Subscription'; ?>
						<?php else: ?>
							<?php echo 'Unknown'; ?>
						<?php endif; ?>
					</span>&nbsp;|&nbsp;
					Monthly Fee:<span class="statHigh">
					<?php if ($this->item->fee == 0): ?>
						<span class="">Free</span>
					<?php else: ?>
						<span class=""><?php echo "$".$this->item->fee; ?></span>
					<?php endif; ?>	
					</span> <br>System Req:&nbsp;
						<?php 
								$platform = explode(',', $this->item->platform);
								if (count($platform) > 0){
									foreach ($platform as $pv){
											if ($pv == 1){
												echo 'Android' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 2){
												echo 'Ios' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 3){
												echo 'Pc' . '&nbsp;&nbsp;';
												continue;
											}
											if ($pv == 4){
												echo 'Amazon' . '&nbsp;&nbsp;';
												continue;
											}
									}
								}else{
									echo 'Unknown';
								}
							?>
					</div>
			</div>
		</div>

		
		<div class="navgvtwo">
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $this->item->id); ?>" class="overview " sl-processed="1"><span>Overview</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=features&id=' . $this->item->id); ?>" class="features " sl-processed="1"><span>Features</span></a>
			<a href="index.php/forum/<?php echo $this->item->alias; ?>" class="forums " sl-processed="1"><span>Forums</span></a> 
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=links&id=' . $this->item->id); ?>" class="links " sl-processed="1"><span>Links</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=news&id=' . $this->item->id); ?>" class="news current" sl-processed="1"><span>News</span></a>
			<!--  <a href="<?php echo JRoute::_('index.php?option=com_game&view=ratings&id=' . $this->item->id); ?>" class="ratings " sl-processed="1"><span>Ratings</span></a>-->
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=reviews&id=' . $this->item->id); ?>" class="reviews " sl-processed="1"><span>Reviews</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_phocagallery&view=category&id=1&gameid=' . $this->item->id); ?>" class="screens " sl-processed="1"><span>Screenshots</span></a>
			<a href="<?php echo JRoute::_('index.php?option=com_game&view=videos&id=' . $this->item->id); ?>" class="videos last " sl-processed="1"><span>Videos</span></a>
			
			<div class="clear"></div>
		</div>

		<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">

				<div class="gvconblock">

				
						<div class="news"> 
						<div id="sectionHeader"><span><h1><a href="/gamelist.cfm/game/421/view/news/page/1" sl-processed="1"><?php echo $this->item->name . ' ';?>News</a> - <?php echo $this->new->title . ' ';?></h1>
					<h2>Posted by <a href="http://www.mmorpg.com/profile.cfm/username/SBFord" sl-processed="1"><?php echo $this->new->author_name;?></a> on <?php echo JHtml::_('date', $this->new->created, JText::_('DATE_FORMAT_LC4')); ?> </h2>
					</span></div>
	
	<div class="gvpricon">
		
	<div class="newsItem">
			<div class="news_newspost">
				<?php echo $this->new->text;?>
						</div>
						
							<!--  
							<div style="padding:10px 5px 10px 0px; margin:10px 5px 0px 0px; border-top:1px solid #333;">
								<b><a href="http://www.mmorpg.com/profile.cfm/username/SBFord" sl-processed="1"></a>Suzie Ford / </b>Suzie is the Associate Editor and News Manager at <span class="skimlinks-unlinked">MMORPG.com</span>. Follow her on Twitter @MMORPGMom
							</div>
						<div><a href="http://www.mmorpg.com/discussion2.cfm/thread/333899" sl-processed="1">0 comments in our forums</a></div>
						
						
						
						<div id="sl_22799"><div class="socialnbox"><div class="tweetboxb"><iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=http://mmorpg.com/gamelist.cfm/game/421/view/news/read/22799/NewPvPAreasIncoming.html&amp;via=MMORPGcom&amp;text=4Story New PvP Areas Incoming&amp;count=horizontal" style="width:130px; height:50px;"></iframe></div><div class="facebookboxb"><iframe src="http://www.facebook.com/plugins/like.php?href=http://mmorpg.com/gamelist.cfm/game/421/view/news/read/22799/NewPvPAreasIncoming.html&amp;send=false&amp;layout=button_count&amp;width=120&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:21px;" allowtransparency="true"></iframe></div><a href="//www.reddit.com/submit?url=http://mmorpg.com/gamelist.cfm/game/421/view/news/read/22799/NewPvPAreasIncoming.html" sl-processed="1"><img src="//www.redditstatic.com/spreddit7.gif" alt="submit to reddit" border="0"></a><div class="clear"></div></div></div>
						
						<h2><a class="more" href="http://www.mmorpg.com/gamelist.cfm/game/421/view/news/page/1" sl-processed="1">Read more Exclusive News...</a></h2>


					
							
							<a name="comments">&nbsp;</a>
						
							
						
						
							<div class="commentsv2">
							
							<div id="ccframeholder"></div>
							<div id="slothLoadElement" style="height:1px; overflow:hidden;" slref="">&nbsp;</div>
							
							
								<a name="post" id="postBoxId">&nbsp;</a>
								
								
								
								
								<form name="addcomment" method="post" class="newcomment" action="http://www.mmorpg.com/gamelist.cfm/game/421/view/news/page/1/read/22799/4Story-New-PvP-Areas-Incoming.html#post">
									
	
	<input id="fpCFFC8006-3048-C53A-94634AFC0690DAB5" type="hidden" name="formfield1234567891" class="cffp_mm" value="">

	
	<input id="fpCFFC8007-3048-C53A-94DC4F0299FAC680" type="hidden" name="formfield1234567892" class="cffp_kp" value="">

	<input id="fpCFFC8008-3048-C53A-94FA15C439D3E0E8" type="hidden" name="formfield1234567893" value="39890916,19974307">

	
	<span style="display:none">Leave this field empty <input id="fpCFFC8009-3048-C53A-9498C39BECB2CC9A" type="text" name="formfield1234567894" value=""></span>

									<input type="hidden" name="postUid" value="CFFC800A3048C53A94D7AAC6AED95729">
									<input type="hidden" name="state" id="addCommentState" value="new">
									<input type="hidden" name="extrainfo" id="addCommentExtraInfo" value="0">
									<div class="cmnt2"><div class="cout"><span class="cin">
										<b class="unmae">Post Your Comment<span>:</span></b>
										<div class="parea">
											
												<div class="comiin"><a href="#" onclick="$('#inlinelogcmnt2').slideDown('fast'); return false;" sl-processed="1">Post as an existing member?</a> or <a href="/register.cfm" target="_blank" sl-processed="1">Create a new account</a></div>
												<div id="inlinelogcmnt2" style="display:none;">
												<div class="comuin"><span>Username: </span><span><input type="text" name="username" value=""></span></div>
												<div class="compin"><span>Password: </span><span><input type="password" name="password"></span></div>
												<input type="hidden" name="inline_login" value="true">
												
												<textarea name="commentbody" style="width: 92%; height: 60px; margin: 4px; padding: 5px; color: rgb(255, 255, 255); visibility: hidden; display: none; background-color: rgb(0, 0, 0);"></textarea><span id="cke_commentbody" class="cke_skin_radiance cke_1 cke_editor_commentbody" dir="ltr" title="" lang="zh-cn" tabindex="0" role="application" aria-labelledby="cke_commentbody_arialbl"><span id="cke_commentbody_arialbl" class="cke_voice_label">所见即所得编辑器</span><span class="cke_browser_webkit" role="presentation"><span class="cke_wrapper cke_ltr" role="presentation"><table class="cke_editor" border="0" cellspacing="0" cellpadding="0" role="presentation"><tbody><tr role="presentation"><td id="cke_top_commentbody" class="cke_top" role="presentation"><div class="cke_toolbox" role="group" aria-labelledby="cke_6" onmousedown="return false;"><span id="cke_6" class="cke_voice_label">工具栏</span><span id="cke_7" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_8" class="cke_button_cut cke_disabled" "="" href="javascript:void('剪切')" title="剪切" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_8_label" onkeydown="return CKEDITOR.tools.callFunction(3, event);" onfocus="return CKEDITOR.tools.callFunction(4, event);" onclick="CKEDITOR.tools.callFunction(5, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_8_label" class="cke_label">剪切</span></a></span><span class="cke_button"><a id="cke_9" class="cke_button_copy cke_disabled" "="" href="javascript:void('复制')" title="复制" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_9_label" onkeydown="return CKEDITOR.tools.callFunction(6, event);" onfocus="return CKEDITOR.tools.callFunction(7, event);" onclick="CKEDITOR.tools.callFunction(8, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_9_label" class="cke_label">复制</span></a></span><span class="cke_button"><a id="cke_10" class="cke_off cke_button_paste" "="" href="javascript:void('粘贴')" title="粘贴" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_10_label" onkeydown="return CKEDITOR.tools.callFunction(9, event);" onfocus="return CKEDITOR.tools.callFunction(10, event);" onclick="CKEDITOR.tools.callFunction(11, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_10_label" class="cke_label">粘贴</span></a></span><span class="cke_button"><a id="cke_11" class="cke_off cke_button_pastetext" "="" href="javascript:void('粘贴为无格式文本')" title="粘贴为无格式文本" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_11_label" onkeydown="return CKEDITOR.tools.callFunction(12, event);" onfocus="return CKEDITOR.tools.callFunction(13, event);" onclick="CKEDITOR.tools.callFunction(14, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_11_label" class="cke_label">粘贴为无格式文本</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_12" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_13" class="cke_button_undo cke_disabled" "="" href="javascript:void('撤消')" title="撤消" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_13_label" onkeydown="return CKEDITOR.tools.callFunction(15, event);" onfocus="return CKEDITOR.tools.callFunction(16, event);" onclick="CKEDITOR.tools.callFunction(17, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_13_label" class="cke_label">撤消</span></a></span><span class="cke_button"><a id="cke_14" class="cke_button_redo cke_disabled" "="" href="javascript:void('重做')" title="重做" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_14_label" onkeydown="return CKEDITOR.tools.callFunction(18, event);" onfocus="return CKEDITOR.tools.callFunction(19, event);" onclick="CKEDITOR.tools.callFunction(20, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_14_label" class="cke_label">重做</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_15" class="cke_off cke_button_find" "="" href="javascript:void('查找')" title="查找" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_15_label" onkeydown="return CKEDITOR.tools.callFunction(21, event);" onfocus="return CKEDITOR.tools.callFunction(22, event);" onclick="CKEDITOR.tools.callFunction(23, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_15_label" class="cke_label">查找</span></a></span><span class="cke_button"><a id="cke_16" class="cke_off cke_button_replace" "="" href="javascript:void('替换')" title="替换" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_16_label" onkeydown="return CKEDITOR.tools.callFunction(24, event);" onfocus="return CKEDITOR.tools.callFunction(25, event);" onclick="CKEDITOR.tools.callFunction(26, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_16_label" class="cke_label">替换</span></a></span><span class="cke_button"><a id="cke_17" class="cke_off cke_button_checkspell" "="" href="javascript:void('拼写检查')" title="拼写检查" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_17_label" onkeydown="return CKEDITOR.tools.callFunction(27, event);" onfocus="return CKEDITOR.tools.callFunction(28, event);" onclick="CKEDITOR.tools.callFunction(29, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_17_label" class="cke_label">拼写检查</span></a></span><span class="cke_button"><a id="cke_18" class="cke_off cke_button_scayt" "="" href="javascript:void('即时拼写检查')" title="即时拼写检查" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_18_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(30, event);" onfocus="return CKEDITOR.tools.callFunction(31, event);" onclick="CKEDITOR.tools.callFunction(32, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_18_label" class="cke_label">即时拼写检查</span><span class="cke_buttonarrow">&nbsp;</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_19" class="cke_off cke_button_selectAll" "="" href="javascript:void('全选')" title="全选" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_19_label" onkeydown="return CKEDITOR.tools.callFunction(33, event);" onfocus="return CKEDITOR.tools.callFunction(34, event);" onclick="CKEDITOR.tools.callFunction(35, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_19_label" class="cke_label">全选</span></a></span><span class="cke_button"><a id="cke_20" class="cke_off cke_button_removeFormat" "="" href="javascript:void('清除格式')" title="清除格式" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_20_label" onkeydown="return CKEDITOR.tools.callFunction(36, event);" onfocus="return CKEDITOR.tools.callFunction(37, event);" onclick="CKEDITOR.tools.callFunction(38, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_20_label" class="cke_label">清除格式</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_22" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_rcombo" role="presentation"><span id="cke_21" class="cke_font cke_off" role="presentation"><span id="cke_21_label" class="cke_label">字体</span><a hidefocus="true" title="字体" tabindex="-1" href="javascript:void('字体')" role="button" aria-labelledby="cke_21_label" aria-describedby="cke_21_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 40, event, this );" onfocus="return CKEDITOR.tools.callFunction(41, event);" onclick="CKEDITOR.tools.callFunction(39, this); return false;"><span><span id="cke_21_text" class="cke_text cke_inline_label">字体</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span><span class="cke_rcombo" role="presentation"><span id="cke_23" class="cke_fontSize cke_off" role="presentation"><span id="cke_23_label" class="cke_label">大小</span><a hidefocus="true" title="大小" tabindex="-1" href="javascript:void('大小')" role="button" aria-labelledby="cke_23_label" aria-describedby="cke_23_text" aria-haspopup="true" onkeydown="CKEDITOR.tools.callFunction( 43, event, this );" onfocus="return CKEDITOR.tools.callFunction(44, event);" onclick="CKEDITOR.tools.callFunction(42, this); return false;"><span><span id="cke_23_text" class="cke_text cke_inline_label">大小</span></span><span class="cke_openbutton"><span class="cke_icon"></span></span></a></span></span></span><span class="cke_toolbar_end"></span></span><div class="cke_break"></div><span id="cke_24" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_25" class="cke_off cke_button_bold" "="" href="javascript:void('加粗')" title="加粗" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_25_label" onkeydown="return CKEDITOR.tools.callFunction(45, event);" onfocus="return CKEDITOR.tools.callFunction(46, event);" onclick="CKEDITOR.tools.callFunction(47, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_25_label" class="cke_label">加粗</span></a></span><span class="cke_button"><a id="cke_26" class="cke_off cke_button_italic" "="" href="javascript:void('倾斜')" title="倾斜" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_26_label" onkeydown="return CKEDITOR.tools.callFunction(48, event);" onfocus="return CKEDITOR.tools.callFunction(49, event);" onclick="CKEDITOR.tools.callFunction(50, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_26_label" class="cke_label">倾斜</span></a></span><span class="cke_button"><a id="cke_27" class="cke_off cke_button_underline" "="" href="javascript:void('下划线')" title="下划线" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_27_label" onkeydown="return CKEDITOR.tools.callFunction(51, event);" onfocus="return CKEDITOR.tools.callFunction(52, event);" onclick="CKEDITOR.tools.callFunction(53, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_27_label" class="cke_label">下划线</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_28" class="cke_off cke_button_subscript" "="" href="javascript:void('下标')" title="下标" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_28_label" onkeydown="return CKEDITOR.tools.callFunction(54, event);" onfocus="return CKEDITOR.tools.callFunction(55, event);" onclick="CKEDITOR.tools.callFunction(56, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_28_label" class="cke_label">下标</span></a></span><span class="cke_button"><a id="cke_29" class="cke_off cke_button_superscript" "="" href="javascript:void('上标')" title="上标" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_29_label" onkeydown="return CKEDITOR.tools.callFunction(57, event);" onfocus="return CKEDITOR.tools.callFunction(58, event);" onclick="CKEDITOR.tools.callFunction(59, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_29_label" class="cke_label">上标</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_30" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_31" class="cke_off cke_button_numberedlist" "="" href="javascript:void('编号列表')" title="编号列表" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_31_label" onkeydown="return CKEDITOR.tools.callFunction(60, event);" onfocus="return CKEDITOR.tools.callFunction(61, event);" onclick="CKEDITOR.tools.callFunction(62, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_31_label" class="cke_label">编号列表</span></a></span><span class="cke_button"><a id="cke_32" class="cke_off cke_button_bulletedlist" "="" href="javascript:void('项目列表')" title="项目列表" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_32_label" onkeydown="return CKEDITOR.tools.callFunction(63, event);" onfocus="return CKEDITOR.tools.callFunction(64, event);" onclick="CKEDITOR.tools.callFunction(65, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_32_label" class="cke_label">项目列表</span></a></span><span class="cke_separator" role="separator"></span><span class="cke_button"><a id="cke_33" class="cke_button_outdent cke_disabled" "="" href="javascript:void('减少缩进量')" title="减少缩进量" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_33_label" onkeydown="return CKEDITOR.tools.callFunction(66, event);" onfocus="return CKEDITOR.tools.callFunction(67, event);" onclick="CKEDITOR.tools.callFunction(68, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_33_label" class="cke_label">减少缩进量</span></a></span><span class="cke_button"><a id="cke_34" class="cke_off cke_button_indent" "="" href="javascript:void('增加缩进量')" title="增加缩进量" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_34_label" onkeydown="return CKEDITOR.tools.callFunction(69, event);" onfocus="return CKEDITOR.tools.callFunction(70, event);" onclick="CKEDITOR.tools.callFunction(71, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_34_label" class="cke_label">增加缩进量</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_35" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_36" class="cke_off cke_button_justifyleft" "="" href="javascript:void('左对齐')" title="左对齐" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_36_label" onkeydown="return CKEDITOR.tools.callFunction(72, event);" onfocus="return CKEDITOR.tools.callFunction(73, event);" onclick="CKEDITOR.tools.callFunction(74, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_36_label" class="cke_label">左对齐</span></a></span><span class="cke_button"><a id="cke_37" class="cke_off cke_button_justifycenter" "="" href="javascript:void('居中')" title="居中" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_37_label" onkeydown="return CKEDITOR.tools.callFunction(75, event);" onfocus="return CKEDITOR.tools.callFunction(76, event);" onclick="CKEDITOR.tools.callFunction(77, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_37_label" class="cke_label">居中</span></a></span><span class="cke_button"><a id="cke_38" class="cke_off cke_button_justifyright" "="" href="javascript:void('右对齐')" title="右对齐" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_38_label" onkeydown="return CKEDITOR.tools.callFunction(78, event);" onfocus="return CKEDITOR.tools.callFunction(79, event);" onclick="CKEDITOR.tools.callFunction(80, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_38_label" class="cke_label">右对齐</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_39" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_40" class="cke_off cke_button_link" "="" href="javascript:void('插入/编辑超链接')" title="插入/编辑超链接" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_40_label" onkeydown="return CKEDITOR.tools.callFunction(81, event);" onfocus="return CKEDITOR.tools.callFunction(82, event);" onclick="CKEDITOR.tools.callFunction(83, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_40_label" class="cke_label">插入/编辑超链接</span></a></span><span class="cke_button"><a id="cke_41" class="cke_button_unlink cke_disabled" "="" href="javascript:void('取消超链接')" title="取消超链接" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_41_label" onkeydown="return CKEDITOR.tools.callFunction(84, event);" onfocus="return CKEDITOR.tools.callFunction(85, event);" onclick="CKEDITOR.tools.callFunction(86, this); return false;" aria-disabled="true"><span class="cke_icon">&nbsp;</span><span id="cke_41_label" class="cke_label">取消超链接</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_42" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_43" class="cke_off cke_button_image" "="" href="javascript:void('图象')" title="图象" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_43_label" onkeydown="return CKEDITOR.tools.callFunction(87, event);" onfocus="return CKEDITOR.tools.callFunction(88, event);" onclick="CKEDITOR.tools.callFunction(89, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_43_label" class="cke_label">图象</span></a></span><span class="cke_button"><a id="cke_44" class="cke_off cke_button_table" "="" href="javascript:void('表格')" title="表格" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_44_label" onkeydown="return CKEDITOR.tools.callFunction(90, event);" onfocus="return CKEDITOR.tools.callFunction(91, event);" onclick="CKEDITOR.tools.callFunction(92, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_44_label" class="cke_label">表格</span></a></span><span class="cke_button"><a id="cke_45" class="cke_off cke_button_specialchar" "="" href="javascript:void('插入特殊符号')" title="插入特殊符号" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_45_label" onkeydown="return CKEDITOR.tools.callFunction(93, event);" onfocus="return CKEDITOR.tools.callFunction(94, event);" onclick="CKEDITOR.tools.callFunction(95, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_45_label" class="cke_label">插入特殊符号</span></a></span></span><span class="cke_toolbar_end"></span></span><span id="cke_46" class="cke_toolbar" role="toolbar"><span class="cke_toolbar_start"></span><span class="cke_toolgroup" role="presentation"><span class="cke_button"><a id="cke_47" class="cke_off cke_button_textcolor" "="" href="javascript:void('文本颜色')" title="文本颜色" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_47_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(96, event);" onfocus="return CKEDITOR.tools.callFunction(97, event);" onclick="CKEDITOR.tools.callFunction(98, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_47_label" class="cke_label">文本颜色</span><span class="cke_buttonarrow">&nbsp;</span></a></span><span class="cke_button"><a id="cke_48" class="cke_off cke_button_bgcolor" "="" href="javascript:void('背景颜色')" title="背景颜色" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_48_label" aria-haspopup="true" onkeydown="return CKEDITOR.tools.callFunction(99, event);" onfocus="return CKEDITOR.tools.callFunction(100, event);" onclick="CKEDITOR.tools.callFunction(101, this); return false;"><span class="cke_icon">&nbsp;</span><span id="cke_48_label" class="cke_label">背景颜色</span><span class="cke_buttonarrow">&nbsp;</span></a></span></span><span class="cke_toolbar_end"></span></span></div></td></tr><tr role="presentation"><td id="cke_contents_commentbody" class="cke_contents" style="height: 180px;" role="presentation"><span id="cke_52" class="cke_voice_label">按 ALT+0 获得帮助</span><iframe style="width: 0px; height: 100%;" frameborder="0" aria-describedby="cke_52" title="富文本编辑器，commentbody" src="" tabindex="-1" allowtransparency="true"></iframe></td></tr><tr role="presentation"><td id="cke_bottom_commentbody" class="cke_bottom" role="presentation"><span id="cke_path_commentbody_label" class="cke_voice_label">元素路径</span><div id="cke_path_commentbody" class="cke_path" role="group" aria-labelledby="cke_path_commentbody_label"><span class="cke_empty">&nbsp;</span></div></td></tr></tbody></table><style>.cke_skin_radiance{visibility:hidden;}</style></span></span></span>
												
												
												
												<div class="adcombutton">
													<input type="submit" value="Post" name="submitcomment" id="addCommentButton">&nbsp;<a href="#" onclick="cmnt3clear(); return false;" sl-processed="1">Cancel</a>
												</div>
												
												</div>
																							
											
										</div>
									</span></div></div><div class="clear"></div>
								</form>
						
							</div>
							-->
							
							
							
							
				<br/>
				<br/>		
				<div class="features"><h2>Other News Of This Game</h2>
					<ul class="spotlight">
						<?php if (!empty($this->newsOfThisGame)) : ?>
						<?php $count = count($this->newsOfThisGame);?>
						<?php foreach ($this->newsOfThisGame as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=new&id=' . $row->gameid . '&newsid=' . $row->id);
							$img = json_decode($row->images)->image_intro;
							if ($img == ''){
								$img = 'media/other/generic.png';
							}
						?>		
						<li <?php if ($count ==  $i+1): ?>style="border: 0px" <?php endif?>><a href="<?php echo $link;?>" class="" style="background-image: url('<?php echo '/' . $img;?>');"><?php echo $row->title;?></a></li>					
					
						<?php endforeach; ?>
				    	<?php endif; ?>			
    			    </ul>
							
				</div>
				<div class="features"><h2>Other News Of This Category</h2>
					<ul class="spotlight">
						<?php if (!empty($this->newsOfThisCategory)) : ?>
						<?php $count = count($this->newsOfThisCategory);?>
						<?php foreach ($this->newsOfThisCategory as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=new&id=' . $row->gameid . '&newsid=' . $row->id);
							$img = json_decode($row->images)->image_intro;
							if ($img == ''){
								$img = 'media/other/generic.png';
							}
						?>		
						<li <?php if ($count ==  $i+1): ?>style="border: 0px" <?php endif?>><a href="<?php echo $link;?>" class="" style="background-image: url('<?php echo '/' . $img;?>');"><?php echo $row->title;?></a></li>					
					
						<?php endforeach; ?>
				    	<?php endif; ?>			
    			    </ul>
					
								
				</div>
							
							
							
							
							<div class="clear"></div>
					</div>
	
	
	
	</div>
	
		<div class="rsidecon">
		
			

			
			<div class="hymt">
						<?php if ($this->item->rating > 0): ?>
						<?php 
							$classname = 'ratingx';
							if ($this->item->status == 2){
								$classname = 'betax';
							}elseif($this->item->status == 4){
								$classname = 'hypex';
							}
							$ratinPer = ($this->item->rating *10 ).'%';
						?>
						<div class="largeh3">Rating</div>
							<div class="largebar"><span class="<?php echo $classname; ?>" style="width:<?php echo $ratinPer; ?> !important;"></span></div><div class="insideh2"><?php echo $this->item->rating; ?></div>
							<!--  
							<div class="largeh3">User&nbsp;Rating:&nbsp;7.7</div>
							<div class="bar"><span class="ratingx" style="width:77% !important;"></span></div>-->
					<?php else: ?>
						<h4>Votes Req</h4>
					<?php endif; ?>
						
				<div class="clear"></div>
			</div>

			
			
				<!-- 
				<div style="padding:4px 0px 5px 0px;"><a href="/adServer/signupLinkClick.cfm?gameId=191&amp;src=gamedetails_sidebar_button" class="gamegravitylink signupandplayb" target="_blank" rel="nofollow" sl-processed="1"></a></div>
			
					<div class="socialnbox">
						<div class="tweetboxbv">
							<a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.mmorpg.com/gamelist.cfm/game/191/Age-of-Conan-Unchained.html" data-via="MMORPGcom" data-text="Age of Conan: Unchained, Online MMO Game | Review, News, Forums | MMORPG" data-count="vertical" target="_blank" sl-processed="1">Tweet</a>
						</div>
						<div class="facebookboxbv"><fb:like href="http://www.mmorpg.com/gamelist.cfm/game/191/Age-of-Conan-Unchained.html" layout="box_count" show_faces="false" width="240" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fwww.mmorpg.com%2Fgamelist.cfm%2Fgame%2F191%2FAge-of-Conan-Unchained.html&amp;layout=box_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240"><span style="vertical-align: top; width: 0px; height: 0px; overflow: hidden;"><iframe name="f24575bf74" width="240px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F1ldYU13brY_.js%3Fversion%3D41%23cb%3Df342b86538%26domain%3Dwww.mmorpg.com%26origin%3Dhttp%253A%252F%252Fwww.mmorpg.com%252Ff181ff2a3c%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.mmorpg.com%2Fgamelist.cfm%2Fgame%2F191%2FAge-of-Conan-Unchained.html&amp;layout=box_count&amp;locale=en_US&amp;sdk=joey&amp;show_faces=false&amp;width=240" style="border: none; visibility: visible; width: 0px; height: 0px;"></iframe></span></fb:like></div>
						<div class="clear"></div>
					</div>
					 -->
				

	
	<div class="gvpushcon">
		
			<div id="moreContent" class="pushc"> <div class="section"><span class="pctitle">Popular Features:</span> 

						<?php if (!empty($this->popularFeatures)) : ?>
						<?php foreach ($this->popularFeatures as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=feature&id=' . $row->gameid . '&newsid=' . $row->id);
						?>			
					<div class="item">
							<span class="title"><?php echo $row->name;?><br><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
					</div>
					<?php endforeach; ?>
				<?php endif; ?>
					
						<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=features'); ?>" class="pcmorefeatures" sl-processed="1">More Features</a></div>
					
					</div> <div class="section"><span class="pctitle">Latest News:</span> 

						<?php if (!empty($this->latestNews)) : ?>
						<?php foreach ($this->latestNews as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=new&id=' . $row->gameid . '&newsid=' . $row->id);
						?>			
						<div class="item">
							<span class="title"><?php echo $row->name;?><br><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->title;?></a></span>
							
							<span class="clear"></span>
						</div>
							<?php endforeach; ?>
						<?php endif; ?>
					<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=news'); ?>" class="pcmorenews" sl-processed="1">More News</a></div></div> 
					<div class="section"><span class="pctitle">Newest <a href="<?php echo JRoute::_('index.php?option=com_game&view=games');?>" sl-processed="1">Games</a>:</span>
						
							<?php if (!empty($this->latestGames)) : ?>
						<?php foreach ($this->latestGames as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=game&id=' . $row->id);
						?>			
						<div class="item">
								<span class="title"><a href="<?php echo $link;?>" sl-processed="1"><?php echo $row->name;?></a></span>
							</div>
							<?php endforeach; ?>
						<?php endif; ?>
						
						</div>
					<br class="clear"></div> 
	</div>

</div>
</div>
					

					<div class="clear"></div>

				</div>

			</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>


			<div class="clear"></div>

			<div class="foot clear"></div>

		<div class="clear"></div>

	</div>
