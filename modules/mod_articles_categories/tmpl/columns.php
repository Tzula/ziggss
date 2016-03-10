<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_categories
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<style>
.overview p{
	margin-bottom:0px;
}
</style>
<div class="hmcolumns">
	<div class="ccfbox bgblue"><span class="ccfboxo"><span class="ccfboxi"><a href="<?php echo JRoute::_('/index.php/features/columns')?>" class="title">Columnists</a></span></span></div>
		<div class="ccfboxcon">
		
		<?php foreach ($list as $item) : ?>

		
		<div class="entry" onmouseover="floatingToolTipShow('<table cellspacing=\'0\' width=\'100%\' class=\'cchomecarrotx trans\'><tr><td class=\'t1c1\'><div></div></td><td class=\'t1c2\'><div class=\'leftbody\'><h1>What Made You a Gamer?</h1><p>The Newbie Blogger Initiative has been continuing through the month of May. One of the weekly NBI events is called the â€œTalkback Challengeâ€ and the question for this week is an interesting one: â€œWhat made you a gamer?â€<br /><br /><span style=\'color:#70B9ED;\'>Click to read now!</span></p></div><div class=\'clear\'></div></td><td class=\'t1c3\'><div></div></td></tr><tr><td class=\'t2c1\'><div></div></td><td class=\'t2c2\'><div></div></td><td class=\'t2c3\'><div></div></td></tr></table>',true,true,250,1,'true');" onmouseout="floatingToolTipHide();">
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="linker">
					<div class="icon">
						<img src="<?php echo $item->getParams()->get('image'); ?>" alt="" border="0" width="80" height="80">
					</div>
			</a><div class="data"><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="linker">
											</a><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id)); ?>" class="title"><?php echo $item->title;?></a>
											<span class="desc"><?php echo JHtml::_('date', $item->created_time, JText::_('DATE_FORMAT_LC4')); ?> </span>
											<div class="overview" style="color:#535353;"> <?php echo JHtml::_('content.prepare', $item->description, $item->getParams(), 'mod_articles_categories.content'); ?><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>" class="readmore">Read More...</a></div>
										</div>
									
									<div class="clear"></div>
		</div>
		
		
	
<?php endforeach; ?>

					
<a href="<?php echo JRoute::_('/index.php/features/columns')?>" class="tzula_more morecolumns">&nbsp;&nbsp;More articles...</a>
						</div>

						

					</div>
<div class="clear"></div>
