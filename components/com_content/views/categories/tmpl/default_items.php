<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$class = ' class="first"';
JHtml::_('bootstrap.tooltip');
$lang	= JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
	<?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
		<?php
		if ($this->params->get('show_empty_categories_cat') || $item->numitems || count($item->getChildren())) :
		if (!isset($this->items[$this->parent->id][$id + 1]))
		{
			$class = ' class="last"';
		}
		?>
		
		
		<div class="entry ">
			
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>" class="listposts" sl-processed="1">List Column Articles...</a>
			<a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>" class="image" sl-processed="1">
				<img src="<?php echo $item->getParams()->get('image'); ?>" alt="<?php echo htmlspecialchars($item->getParams()->get('image_alt')); ?>" border="0">
			</a>
			<div class="cinfo">
				<h1><a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($item->id));?>" class="title" sl-processed="1"><?php echo $this->escape($item->title); ?></a></h1>
				<span><?php echo JHtml::_('content.prepare', $item->description, '', 'com_content.categories'); ?></span>
			</div>
			<div class="clear"></div>
		</div>
		
		
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>
