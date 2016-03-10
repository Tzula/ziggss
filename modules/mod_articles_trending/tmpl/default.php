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
<nav><ul class="covercards">

<?php foreach ($list as $key => $item) :  ?>

<?php if ($key == 0):?>
 <li class="first">
   <a href="<?php echo $item->link; ?>" style="background-image: url(<?php echo json_decode($item->images)->image_intro;?>)" class="img"></a>
   <div class="wrap">
     <span class="bar"></span>
     <a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a>
   </div>
</li>
<?php else:?>
 <li><div class="wrap"><span class="bar"></span><a href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></div></li>
<?php endif?>
<?php endforeach; ?>
 


    


</ul></nav>
				


			

