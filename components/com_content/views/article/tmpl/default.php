<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
?>
<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"><div id="" class="panel panelFullWidth panelPrimary showfeat" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody sfprifr"> 

					<div id="sectionHeader"><span><h1><?php echo $this->escape($this->item->title); ?></h1>
					<h3>Post on
					<?php echo JHtml::_('date', $this->item->created, JText::_('DATE_FORMAT_LC4')); ?> by <a href="#" sl-processed="1"><?php echo $this->item->author;?></a></h3></span></div>
					<div class="gvpricon featurepri">
						<div class="commonContent" style="padding-top:7px;">
							 <?php echo $this->item->text; ?>
							<div class="clear"></div>
						</div>
						
						
						<div class="features" style="margin: 0 10px;"><h2 style="color: #70B9ED !important;font-size: 1.4em;font-weight: bold;padding-bottom: 6px;">Other Articles</h2>
					<ul class="spotlight">
						<?php if (!empty($this->articlesLatest)) : ?>
						<?php $count = count($this->articlesLatest);?>
						<?php foreach ($this->articlesLatest as $i => $row) :
							$link  = JRoute::_(ContentHelperRoute::getArticleRoute($row->id, $row->catid));
							$img = json_decode($row->images)->image_intro;
							if ($img == ''){
								$img = 'media/other/generic.png';
							}
						?>		
						<li <?php if ($count ==  $i+1 || $i == 3): ?>style="border: 0px" <?php endif?>><a href="<?php echo $link;?>" class="" style="background-image: url('<?php echo '/' . $img;?>');"><?php echo $row->title;?></a></li>					
					
						<?php endforeach; ?>
				    	<?php endif; ?>			
    			    </ul>	
				</div>
			
				<div class="clear"></div>

					<div class="clear"></div>
		
					
					</div>

		<div class="gvpushcon">
			
			<div id="moreContent" class="pushc"> 
			<div class="section"><span class="pctitle">Popular Features:</span> 
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

						
					
						<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=features'); ?>" class="pcmorefeatures">More Features</a></div>
					
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
					<div style="padding:5px;"><a href="<?php echo JRoute::_('index.php?option=com_content&view=news'); ?>" class="pcmorenews">More News</a></div></div> 
					<div class="section"><span class="pctitle">Newest <a href="<?php echo JRoute::_('index.php?option=com_game&view=games');?>">Games</a>:</span>
						
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

		<div class="clear"></div>

		</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>

