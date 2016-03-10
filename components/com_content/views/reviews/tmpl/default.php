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
				<h3 class="">Gameteaser.com Reviews</h3>
			</div>
		</div>
		<div id="" class="panelBody "> 
	
	<div id="sectionHeader">
		<span>
			<h1>Gameteaser.com Reviews</h1>
			<br/>
			<!--  
			<form name="filter" class="filter">
				<select name="sort">
					<option value="date" selected="">Date</option>					
					<option value="score">Score</option>
				</select>
				<select name="months">
					<option value="1">1 Month</option>
					<option value="3">3 Months</option>
					<option value="6">6 Months</option>
					<option value="12">One Year</option>
					<option value="all" selected="">All Time</option>
				</select>
				<select name="order">
					<option value="desc" selected="">Down</option>
					<option value="asc">Up</option>
				</select>
				<input type="button" name="submit" value="Sort" onclick="filterFeature();">
			</form>
			-->
		</span>
	</div>

	
		<div class="list reviews">
			
			<table cellspacing="0" cellpadding="0" border="0" width="100%" class="tabicular">
				<thead>
					<tr class="simple">
						
						<th align="left">Title</th>
						<th align="left">When</th>
						<th align="left">Author</th>
					</tr>
				</thead>
				<tbody>
					<?php if (!empty($this->items)) : ?>
						<?php foreach ($this->items as $i => $row) :
							$link = JRoute::_('index.php?option=com_game&view=review&id=' . $row->gameid . '&reviewid=' . $row->id);
							if ($i % 2 == 0){
								$bg = "#59C8FF";
							}else{
								$bg = "#359BED";
							}
						?>
						
						<tr style="background-color:<?php echo $bg; ?>">
								
								<td align="left"><a href="<?php echo $link;?>"><?php echo $row->title;?></a></td>
								<td align="left" class="dates"><?php echo JHtml::_('date', $row->created, JText::_('DATE_FORMAT_LC4')); ?></td>
								<td align="left" nowrap=""><a href="#" class="saplink"><?php echo $row->author_name;?></a>&nbsp;</td>
						
							</tr>
						
						<?php endforeach; ?>
				<?php endif; ?>
							
							
						
				</tbody>
			</table>
			<?php echo $this->pagination->getListFooter(); ?>
		</div>
	
	<div class="clear"></div>
	</div></div></div></div></div>
</div></div></div>
</div>

		</div>