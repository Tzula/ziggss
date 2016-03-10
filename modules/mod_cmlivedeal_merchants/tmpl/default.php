<?php
/**
 * @package    CMLiveDealMerchants
 * @copyright  Copyright (C) 2014-2015 CMExtension Team http://www.cmext.vn/
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
?>
<?php if (!empty($merchants)) : ?>
<div class="cmlivedeal<?php echo $moduleClassSfx ?>">
	<ul<?php echo $ulClass . $ulStyle; ?>>
	<?php foreach ($merchants as $merchant) : ?>
		<?php
		$item = $merchant->name;

		if ($showDealQuantity)
		{
			$item .= ' <span' . $dealQuantityClass . $dealQuantityStyle . '>' . $merchant->deal_quantity . '</span>';
		}
		?>
		<li<?php echo $liClass . $liStyle; ?>>
			<a href="<?php echo $merchant->url; ?>"><?php echo $item; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>