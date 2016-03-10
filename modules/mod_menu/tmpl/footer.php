<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<?php
$num = count($list);
foreach ($list as $i => &$item)
{
	$flink = $item->flink;
	$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
	echo '<a href="' . $flink . '">'. $item->title . '</a>';
	if ($i < $num-1){
		echo '&nbsp;|&nbsp;';
	}
}
?>

