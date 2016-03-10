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

JHtml::_('behavior.caption');
?>
<div id="features" class="feetures">
			<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class="">Exclusive Columns</h3>
			</div>
		</div>
		<div id="" class="panelBody "> 

		
		<div id="sectionHeader"><span>
			
				<img src="<?php echo $this->category->getParams()->get('image'); ?>" alt="" class="colheadicon">
			
			<h1 class="colh1"><a href="/index.php/features/columns" sl-processed="1">Columnists</a> - <?php echo $this->escape($this->category->title); ?></h1><div class="colsub" style="color:#ffffff;"><?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.categories'); ?>
			
			<div id="sl_59">
				
			</div>
			
			</div><div class="clear"></div>
			
			
			
			</span></div>

		<div class="list">
			
		<?php foreach ($this->items as $i => $article) : ?>
						

			<div class="entry">
				<h1><a href="<?php echo JRoute::_(ContentHelperRoute::getArticleRoute($article->slug, $article->catid, $article->language)); ?>" class="title " sl-processed="1"><?php echo $this->escape($article->title); ?></a></h1>
					<!--  <h2>
					General&nbsp;-&nbsp;
					Column
					</h2>-->
					<p class="body">
					
					<?php echo substr(strip_tags($article->text), 0, 500) . '...'; ?>
					
					<span class="desc">Posted <?php echo JHtml::_('date', $article->created, JText::_('DATE_FORMAT_LC4')); ?> by <?php echo $article->author;?></span></p>
				</div>

						

		<?php endforeach;?>				

						

						
			
		</div>		
		
	<?php // Add pagination links ?>
	<?php if (!empty($this->items)) : ?>
	<?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
	<div class="pagination">

		<?php if ($this->params->def('show_pagination_results', 1)) : ?>
			<p class="counter pull-right">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		<?php endif; ?>

		<?php echo $this->pagination->getPagesLinks(); ?>
	</div>
	<?php endif; ?>
	<?php endif;?>
	<div class="clear"></div>
	</div></div></div></div></div>
</div></div></div>
</div>

		</div>