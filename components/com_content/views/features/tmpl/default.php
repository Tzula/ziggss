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
$user = JFactory::getUser();
?>
<div id="features" class="feetures">
			<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Hardware Reviews</h3>
			</div>
		</div>
		<div id="" class="panelBody "> 
		<script>
			function filterFeature() {
				var theForm = document.filter;
				if(theForm.gameId.value == 0){
					var theTarget = "/index.php/component/content/?view=features&cid=" + <?php echo $this->cid;?>;
				}
				else {
					var theTarget = "/index.php/component/content/?view=features&cid=" + <?php echo $this->cid;?> + "&gameid="+theForm.gameId.value;
				}
				window.location = theTarget;
			}
		</script>
		<div id="sectionHeader">
			<span>
				<h1>Latest Features</h1>
				<form name="filter" class="filter">
					<select name="gameId">
					<?php if (!empty($this->games)) : ?>
						<?php foreach ($this->games as $i => $game) : ?>
							<option value="<?php echo $game->value;?>" <?php if($game->value == $this->gameid) echo 'selected="selected"';?>><?php echo $game->text;?></option>
						<?php endforeach; ?>
						<?php endif; ?>
	
					</select>
					
					<input type="button" name="submit" value="Filter" onclick="filterFeature();">
				</form>
			</span>
		</div>
		<form action="index.php?option=com_content&view=features&cid=<?php echo $this->cid;?>&gameid=<?php echo $this->gameid; ?>" method="post" id="adminForm" name="adminForm">
		<div class="list">
			
			<?php if (!empty($this->items)) : ?>
						<?php foreach ($this->items as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=feature&id=' . $row->gameid . '&newsid=' . $row->id);
						?>
							<div class="entry">
							<h1><a href="<?php echo $link; ?>" class="title " sl-processed="1"><?php echo $row->title; ?></a></h1>
							<p class="body">
								<?php echo substr(strip_tags($row->text), 0, 500) . '...'; ?>
							<span class="desc">Posted <?php echo JHtml::_('date', $row->created, JText::_('DATE_FORMAT_LC4')); ?> by <?php echo $row->author_name;?></span></p>
							</div>
						
						<?php endforeach; ?>
				<?php endif; ?>
					<?php echo $this->pagination->getListFooter(); ?>	
	
						
				<!-- 
				<div class="action">
					<table cellspacing="0" cellpadding="0" border="0" align="center" class="pageJumpList">
						<tbody><tr>
							<td class="label">Pages(3):</td>
							
								<td><a href="/features.cfm/view/hardware_reviews/page/1" class="current" sl-processed="1">1</a></td>
							
								<td><a href="/features.cfm/view/hardware_reviews/page/2" sl-processed="1">2</a></td>
							
								<td><a href="/features.cfm/view/hardware_reviews/page/3" sl-processed="1">3</a></td>
							
								<td><a href="/features.cfm/view/hardware_reviews/page/2" sl-processed="1">Next&nbsp;»</a></td>
							
								<td><a href="/features.cfm/view/hardware_reviews/page/3" sl-processed="1">Oldest</a></td>
							
						</tr>
					</tbody></table>
				</div>
				 -->
			

		</div>
		</form>
		

	
	<div class="clear"></div>
	</div></div></div></div></div>
</div></div></div>
</div>

		</div>