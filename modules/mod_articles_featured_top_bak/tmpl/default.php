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



			
					<script language="Javascript">
						featuretteCards=new Array(); 
						<?php foreach ($frontlist as $key1 => $item1) :  ?>
						<?php $link = $item1->link; ?>
							featuretteCards[<?php echo $key1 ?>] = new Array(<?php echo $item1->id; ?>,"<?php echo $item1->title; ?>","<?php echo $link;?>","<?php echo substr(htmlspecialchars(strip_tags($item1->introtext)), 0,0 ); ?>",498,20150520,true,"?201505011", "<?php echo json_decode($item1->images)->image_fulltext;?>); ?>"); 
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
					<a href="javascript:feats.jump(<?php echo $key1;?>)" id="febtn_<?php echo $key1;?>" style="background-image:url(<?php echo json_decode($item1->images)->image_intro;?>);" <?php if($key1 == 0):?>class="current"<?php endif?>></a>
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

			

			

				


			

