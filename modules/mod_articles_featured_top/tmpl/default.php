<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
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


			
					<script language="Javascript">
						featuretteCards=new Array(); 
						<?php foreach ($frontlist as $key1 => $item1) :  ?>
						<?php $link = $item1->link; ?>
							<?php   
								  $item1->introtext = DeleteHtml($item1->introtext);
								  $item1->introtext = substr(strip_tags($item1->introtext), 0, 150);
								  $frontlist[$key1] = $item1;
							?>
							featuretteCards[<?php echo $key1 ?>] = new Array(<?php echo $item1->id; ?>,"<?php echo DeleteHtml($item1->title); ?>","<?php echo $link;?>","<?php echo $item1->introtext; ?>",498,20150520,true,"?201505011", "<?php echo json_decode($item1->images)->image_fulltext;?>"); 
						<?php endforeach; ?>
						feats = new featuretteObj("feats",featuretteCards,8000,491);
					</script>
				

			<div class="featarea">

					<div class="slider" onmouseover="feats.pause(true);" onmouseout="feats.pause(false)">
						<a href="<?php echo $frontlist[0]->link; ?>" class="card" style="display:block; top:0px; z-index:5; background-image:url(<?php echo json_decode($frontlist[0]->images)->image_fulltext;?>);" id="cardX">
							<span class="data"><span class="title" target="_self"><?php echo $frontlist[0]->title; ?></span><?php echo $frontlist[0]->introtext; ?></span>
						</a>
						<a href="<?php echo $frontlist[1]->link; ?>" class="card" id="cardY" style="top: 0px; left: 491px; z-index: 6; display: none; background-image: url(<?php echo json_decode($frontlist[1]->images)->image_fulltext;?>);">
							<span class="data"><span class="title"><?php echo $frontlist[1]->title; ?></span> <?php echo $frontlist[1]->introtext; ?></span>
						</a>
					</div>
				
			</div>
			<div class="featjump">
				
				<?php foreach ($frontlist as $key1 => $item1) :  ?>
					<a href="javascript:feats.jump(<?php echo $key1;?>)" id="febtn_<?php echo $key1;?>" style="background-image:url(<?php echo json_decode($item1->images)->image_intro;?>); background-size: 53px 47px;" <?php if($key1 == 0):?>class="current"<?php endif?>></a>
				<?php endforeach; ?>
				
					
				
				<div class="clear"></div>
			</div>

			
			<div class="artiarea">
				
				<h2 class="hmeSub"><a href="/index.php/features">Our Latest Features</a></h2>
				<?php foreach ($list as $key => $item) :  ?>
					<div class="previe">
						<div class="post-number"><?php echo $key+1; ?></div>
						<div class="post-right">
							<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
							<span><?php echo $item->game_title == ''? 'General': $item->game_title;?> - <i><?php echo $item->category_title;?></i></span>
						</div>
					</div> 
				<?php endforeach; ?>
				
			</div>

			

			

				


			

