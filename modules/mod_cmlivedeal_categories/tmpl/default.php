<?php
/**
 * @package    CMLiveDealCategories
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($categories)) : ?>
<div class="cmlivedeal<?php echo $moduleClassSfx ?>">
	<ul<?php echo $ulClass . $ulStyle; ?>>
	<?php foreach ($categories as $cat) : ?>
		<?php
		$item = $cat->title;

		if ($showDealQuantity)
		{
			$item .= ' <span' . $dealQuantityClass . $dealQuantityStyle . '>' . $cat->deal_quantity . '</span>';
		}
		?>
		<li<?php echo $liClass . $liStyle; ?>>
			<a href="<?php echo $cat->url; ?>"><?php echo $item; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>