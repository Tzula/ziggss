<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_popular
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>



			
			
				<h2 class="hmeSub"><a href="/index.php/features">Our Latest Features</a></h2>
				<?php foreach ($list as $key => $item) :  ?>
					<div class="previe">
						<div class="post-number"><?php echo $key+1; ?></div>
						<div class="post-right">
							<a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
							<span><?php echo $item->game_title == ''? 'General': $item->game_title;?> - <i><?php echo $item->category_title;?></i></span>
						</div>
					</div> 
				<?php endforeach; ?>
				


			

