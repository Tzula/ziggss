<?php
/**
 * Kunena Latest Module
 * @package Kunena.mod_kunenalatest
 *
 * @copyright (C) 2008 - 2015 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();
?>


<div class="custom jmoddiv" data-jmodediturl="http://localhost/index.php?option=com_config&amp;controller=config.display.modules&amp;id=94&amp;return=aHR0cDovL2xvY2FsaG9zdC8%3D" data-jmodtip="<strong>Edit module</strong><br />Current Forum Activity<br />Position: home_left_left">
	<div class="recentposts">
<div class="ccfbox bggreen"><span class="ccfboxo"><span class="ccfboxi"><a class="title" title="Jump to the forums" href="<?php echo JRoute::_('index.php?option=com_kunena&view=home') ?>">Current Forum Activity</a><br><span class="small"></span></span></span></div>

<div class="<?php echo $this->params->get ( 'moduleclass_sfx' )?> klatest ccfboxcon <?php echo $this->params->get ( 'sh_moduleshowtype' )?>">
	<ul class="klatest-items" style="padding:4px 6px 10px 6px;">
		<?php if (empty ( $this->topics )) : ?>
			<li class="klatest-item" ><?php echo JText::_('MOD_KUNENALATEST_NO_MESSAGE') ?></li>
		<?php else : ?>
			<?php $this->displayRows (); ?>
		<?php endif; ?>
	</ul>
	<a href="<?php echo JRoute::_('index.php?option=com_kunena&view=home');?>" class="tzula_more moreposts">&nbsp;&nbsp;More posts...</a>
	<?php if ($this->topics && $this->params->get ( 'sh_morelink' )): ?>
	<p class="klatest-more"><?php echo JHtml::_('kunenaforum.link', $this->params->get ( 'moreuri' ), JText::_ ( 'MOD_KUNENALATEST_MORE_LINK' ) ); ?></p>
	<?php endif; ?>
</div>

</div></div>
