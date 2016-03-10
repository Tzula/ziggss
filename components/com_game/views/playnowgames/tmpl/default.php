<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
 
JHtml::_('formbehavior.chosen', 'select');
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
$jinput = JFactory::getApplication()->input;
?>
<?php 
function DeleteHtml($str)
{
	$str = trim($str); //清除字符串两边的空格
	$str = preg_replace("/\t/","",$str); //使用正则表达式替换内容，如：空格，换行，并将替换为空。
	$str = preg_replace("/\r\n/","",$str);
	$str = preg_replace("/\r/","",$str);
	$str = preg_replace("/\n/","",$str);
	$str = str_replace('"','',$str);
	return trim($str); //返回字符串
}
?>
<style>

		.fgentry { display:block; position:relative; border-top:1px solid #eeeeee; padding:7px 0px 7px 0px; }
		.fgentry .glogo { float:left; padding:0px 5px 0px 3px; }
		.fgentry .gdata { float:left; width:508px; }
		.fgentry .gdata h2 { font-size:20px; font-weight:bold; margin:0px; padding:2px 0px 1px 0px; }
		.fgentry .gdata h2 a { color:#00bfff; text-decoration:none !important; }
		.fgentry .gdata p { margin:0px; padding:0px; line-height:1.55em; }
		.fgentry .gscreens { width:145px; float:left; position:relative; padding:0px 0px 5px 5px; }
		.fgentry .gscreens a { display:block; padding:5px 0px 0px 0px; }
		.fgentry .gdetails { color:#c8c8c8; padding-bottom:8px; }
		.fgentry .gdetails b { color:white; }
		
		.fgentry .gscreenitem { margin-left:40px; }
		.fgentry .playunderlay { position:relative !important; float:none; width:160px; height:104px; display:block !important; }
		.fgentry .playoverlay { position:absolute; top:0px; left:0px; width:170px; height:100px; background:transparent url('http://images.mmorpg.com/images/themes/radiance/fullmoon/item_home_vidhover.gif') no-repeat center center; }
		
		.fgentry .gbuttons { position:relative; height:20px; padding-top:5px; }
		.fgentry a.button { display:block; background:#00bfff; color:white; margin-right:6px; float:left; padding:3px 6px 3px 6px; height:20px; line-height:19px; border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px;}
		.fgentry a.button.minor { background:#989898; }
		.fgentry a.button:hover { background-color:#ffa200; text-decoration:none; }
		
		.fgentry.spotlight .gdata { width:375px; }
		.fgentry.spotlight .gscreens { float:none; height:auto; width:auto; padding:5px 0px 5px 0px; }
		.fgentry.spotlight .gscreens a { display:inline; margin-right:5px; }
		.fgentry.spotlight .gvideo { width:311px; float:left; height:300px; padding-left:5px; }
		.fgentry .button.large { height:40px; line-height:39px; font-size:1.5em; margin-bottom:6px; }
		
		.fgfilter { display:block; padding:9px 0px 8px 5px; background-color:#3d3d3d; }
		.chzn-container .chzn-results li.active-result{
			color:#444;
		}
		
	</style>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Free Games on MMORPG.com</h3>
			</div>
		</div>
		<div id="" class="panelBody ">

		<div id="sectionHeader"><span><h1>Free to Play MMOs, Pre-order or Buy Now Games</h1></span></div>
		<div class="freegamelist">
		<script>
			function filterFeature() {
				
				var theForm = document.filter;
				var str = '';
				if(theForm.genre.value > 0){
					str = '&genre=' + theForm.genre.value;
				}
				if(theForm.platform.value > 0){
					str = str +'&platform=' + theForm.platform.value;
				}
				if(theForm.paytype.value > 0){
					str = str + '&paytype=' + theForm.paytype.value;
				}
				
				var theTarget = "/index.php/component/game/?view=playnowgames" + str;
				window.location = theTarget;
			}
		</script>
		
			<form class="fgfilter" name="filter">Filter:
				<select name="genre" style="width:150px;">
				
				<?php if (!empty($this->genres)) : ?>
						<?php foreach ($this->genres as $i => $genre) : ?>
							<option value="<?php echo $genre->value;?>" <?php if($genre->value == $this->genre) echo 'selected="selected"';?>><?php echo $genre->text;?></option>
						<?php endforeach; ?>
						<?php endif; ?>
						
						
					
										
				</select>
				
				<select name="platform" style="width:150px;">
					<option value="0" >Platform?</option>
					
						<option value="1" <?php if($this->platform == 1) echo 'selected="selected"';?>>Android</option>
					
						<option value="2" <?php if($this->platform == 2) echo 'selected="selected"';?>>Ios</option>
					
						<option value="3" <?php if($this->platform == 3) echo 'selected="selected"';?>>Pc</option>
					
						<option value="4" <?php if($this->platform == 4) echo 'selected="selected"';?>>Amazon</option>
				</select>

				<select name="paytype" style="width:150px;">
					<option value="0" >Pay Type?</option>
					
						<option value="1" <?php if($this->paytype == 1) echo 'selected="selected"';?>>Buy to Play</option>
					
						<option value="2" <?php if($this->paytype == 2) echo 'selected="selected"';?>>Free</option>
					
						<option value="3" <?php if($this->paytype == 3) echo 'selected="selected"';?>>Hybrid</option>
					
						<option value="4" <?php if($this->paytype == 4) echo 'selected="selected"';?>>Item Mall</option>
					
						<option value="5" <?php if($this->paytype == 5) echo 'selected="selected"';?>>Subscription</option>
					
				</select>
				
				<input type="button" value="Filter"  onclick="filterFeature();">
				
			</form>

			
				<div class="spotlightscroller">
				
					<style>
						.featarea .data { width:780px !important; }
						.featjump {
							text-align:center !important;
						}
						.featjump a {
							display:inline-block !important;
							margin: 0 auto !important;
							float:none !important;
						}
					</style>
					<script language="Javascript">
						featuretteCards=new Array(); 
						<?php foreach ($this->playnowsfront as $key1 => $item1) :  ?>
							<?php   
								  $item1->overview = DeleteHtml($item1->overview);
								  $item1->overview = substr(strip_tags($item1->overview), 0, 350) . '...';
								  $frontlist[$key1] = $item1;
							?>
							featuretteCards[<?php echo $key1 ?>] = new Array(<?php echo $item1->id; ?>,"<?php echo $item1->name; ?>","<?php echo $item1->playnowlink;?>","<?php echo $item1->overview; ?>",498,20150520,true,"?201505011", "<?php echo '/' . $item1->bigimage;?>"); 
						<?php endforeach; ?>
						feats = new featuretteObj("feats",featuretteCards,8000,798);
					</script>
					
					
					

							
				
					<div class="featarea wide">
						
					
				
					<div class="slider" onmouseover="feats.pause(true);" onmouseout="feats.pause(false)">
						<a href="<?php echo $this->playnowsfront[0]->playnowlink; ?>" class="card" style="top: 0px; z-index: 6; left: 798px; display: none; background-image: url(<?php echo $this->playnowsfront[0]->bigimage;?>);" id="cardX" rel="nofollow">
							<span class="data"><span class="title"><?php echo $this->playnowsfront[0]->name;?></span><?php echo $this->playnowsfront[0]->overview;?></span></a>
						<a href="<?php echo $this->playnowsfront[1]->playnowlink; ?>" class="card" id="cardY" style="top: 0px; left: 0px; z-index: 5; background-image: url(<?php echo $this->playnowsfront[1]->bigimage;?>);">
							<span class="data"><span class="title"><?php echo $this->playnowsfront[1]->name;?></span><?php echo $this->playnowsfront[1]->overview;?></span></a>
					</div>
						
					</div>
					<div class="featjump wide">
					
					<?php foreach ($this->playnowsfront as $key1 => $item1) :  ?>
					<a href="javascript:feats.jump(<?php echo $key1;?>)" id="febtn_<?php echo $key1;?>" style="background-image:url(<?php echo $item1->image;?>); background-size: 53px 47px;" <?php if($key1 == 0):?>class="current"<?php endif?>></a>
					<?php endforeach; ?>
						
							
						
						<div class="clear"></div>
					</div>
				</div>
			
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_game&view=game&id=' . $row->id);
				?>
			
			
					
					<div class="fgentry">
						<img src="<?php echo $doc->baseurl . $row->image; ?>" width="" height="" class="glogo" onerror="this.src='/media/other/generic.png'">
						<div class="gdata">
							<h2><a href="<?php echo $row->playnowlink;?>" target="_blank" class="blue" rel="nofollow"><?php echo $row->name; ?></a>&nbsp;
							<?php 
								$platform = explode(',', $row->platform);
								if (count($platform) > 0){
									foreach ($platform as $pv){
											if ($pv == 1){
												echo '<img src="/media/other/android_icon.gif" title="Android">';
												continue;
											}
											if ($pv == 2){
												echo '<img src="/media/other/ios_icon.gif" title="Ios">';
												continue;
											}
											if ($pv == 3){
												echo '<img src="/media/other/pc_icon.gif" title="Pc">';
												continue;
											}
											if ($pv == 4){
												echo '<img src="/media/other/dreamcast_icon.gif" title="Amazon">';
												continue;
											}
									}
								}else{
									echo '';
								}
							?>
							<!--<img src="http://images.mmorpg.com/images/themes/radiance/fullmoon/mac_icon.gif" title="Mac"><img src="http://images.mmorpg.com/images/themes/radiance/fullmoon/pc_icon.gif" title="PC"><img src="http://images.mmorpg.com/images/themes/radiance/fullmoon/linux_icon.gif" title="Linux">-->
							</h2>
							
							
							
							<div class="gdetails">Payment Types: 
							<b>
							<?php if ($row->paymenttype == 1): ?>
								<?php echo 'Buy to Play'; ?>
							<?php elseif ($row->paymenttype == 2): ?>
								<?php echo 'Free'; ?>
							<?php elseif ($row->paymenttype == 3): ?>
								<?php echo 'Hybrid'; ?>
							<?php elseif ($row->paymenttype == 4): ?>
								<?php echo 'Item Mall'; ?>
							<?php elseif ($row->paymenttype == 5): ?>
								<?php echo 'Subscription'; ?>
							<?php else: ?>
								<?php echo 'Unknown'; ?>
							<?php endif; ?>
							
							</b>, 
							
							
							Status: <b>
							
							<?php if ($row->status == 1): ?>
								<?php echo 'Alpha'; ?>
							<?php elseif ($row->status == 2): ?>
								<?php echo 'Beta Testing'; ?>
							<?php elseif ($row->status == 3): ?>
								<?php echo 'Cancelled'; ?>
							<?php elseif ($row->status == 4): ?>
								<?php echo 'Development'; ?>
							<?php elseif ($row->status == 5): ?>
								<?php echo 'Early Access'; ?>
							<?php elseif ($row->status == 6): ?>
								<?php echo 'Final'; ?>
							<?php else: ?>
								<?php echo 'Unknown'; ?>
							<?php endif; ?>
							
							
							</b></div>
							
							
							<p>
							
							<?php echo $row->overview;?>
							
							</p>
							
							<!--  
							<span id="1299_button">&nbsp;&nbsp;<a href="#" onclick="toggle(&quot;1299_more&quot;); toggle(&quot;1299_button&quot;); return false;">Show more</a></span></p>
							
								<div class="more" id="1299_more" style="display:none;">
									
								</div>
							-->
							
							
							<div class="gbuttons">
								<a href="<?php echo $row->playnowlink;?>" target="_blank" class="button large" rel="nofollow">Play Now</a><a href="<?php echo $link;?>" class="button minor">More data, videos, forums...</a><div class="clear"></div>
							</div>
						</div>
						
						<!--  
						<div class="gscreens">
						
							
							
									<a href="javascript:viewImage(800,600,'|screens|062015|full|29324.jpg')" class="gscreenitem"><img src="http://images.mmorpg.com/images/screenshots/062015/thumbs/29324.jpg" class="screenshot">
										
									</a>
									
									<a href="javascript:viewImage(800,600,'|screens|062015|full|29323.jpg')" class="gscreenitem"><img src="http://images.mmorpg.com/images/screenshots/062015/thumbs/29323.jpg" class="screenshot">
										
									</a>
										
												
						</div>
						-->
						
						
						<div class="clear"></div>
					</div>
					
				
				<?php endforeach; ?>
			<?php endif; ?>
			
			
			
				
				
						
						
						
						
				
				
				<?php echo $this->pagination->getListFooter(); ?>
			
		</div>
				
		</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>