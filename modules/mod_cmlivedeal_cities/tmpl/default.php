<?php
/**
 * @package    CMLiveDealCities
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($cities)) : ?>
<div class="cmlivedeal<?php echo $moduleClassSfx ?>">
	<ul<?php echo $ulClass . $ulStyle; ?>>
	<?php foreach ($cities as $c) : ?>
		<?php
		$item = $c->name;

		if ($showDealQuantity)
		{
			$item .= ' <span' . $dealQuantityClass . $dealQuantityStyle . '>' . $c->deal_quantity . '</span>';
		}
		?>
		<li<?php echo $liClass . $liStyle; ?>>
			<a href="<?php echo $c->url; ?>"><?php echo $item; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>