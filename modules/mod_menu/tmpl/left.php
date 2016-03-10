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
<div class="feetures">
			<div class="navie">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">Filter Features</span></span></div>
				<div class="ccfboxcon">
				
				<?php
				foreach ($list as $i => &$item)
				{
					$title = $item->title;
					$class = '';
					switch($title){
						case 'Latest': $class='lates fstlink';break;
						case 'Announcements': $class='annoucemen';break;
						case 'At a Glance': $class='glanc';break;
						case 'Awards': $class='awards';break;
						case 'Columns': $class='colum';break;
						case 'Contests': $class='contes';break;
						case 'Dev Journals': $class='devjou';break;
						case 'Editorials': $class='editoria';break;
						case 'Event Blogs': $class='even';break;
						case 'Fiction': $class='fictio';break;
						case 'General Article': $class='genera';break;
						case 'Hardware': $class='hardwar';break;
						case 'Interviews': $class='interv';break;
						case 'Media': $class='medi';break;
						case 'Newsletter': $class='newslette';break;
						case 'Player Interviews': $class='playe';break;
						case 'Podcast': $class='podcas';break;
						case 'Polls': $class='pol';break;
						case 'Previews': $class='previe';break;
						case 'Progress Reports': $class='progres';break;
						case 'Reviews': $class='revie'; break;
						case 'Special Offers': $class='offe'; break;
						default: $class='genera';
					}


					$flink = $item->flink;
					$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));
					
					echo '<a href="'. $flink . '" class="' . $class . '">' .$title . '</a>';
	
				}
				?>
					<div class="clear"></div>
				
				</div>				
			</div>
			<!--  
			<br>
			
			<div class="navie">
			<div class="ccfbox"><span class="ccfboxo"><span class="ccfboxi">User Features</span></span></div>
				<div class="ccfboxcon">					
					<a href="/features.cfm/view/user_latest" class="lates fstlink">Latest</a>
					<a href="/features.cfm/view/user_reviews" class="revie">Reviews</a>				
					<div class="clear"></div>
				
				</div>				
			</div>
			-->

		</div>
<div class="clear"></div>

