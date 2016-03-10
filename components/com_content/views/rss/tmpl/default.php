<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
?>
<?php

$now = date("D, d M Y H:i:s T");

$output = "<?xml version=\"1.0\"?>
            <rss version=\"2.0\">
                <channel>
                    <title>Gameteaser Content Rss</title>
                    <link>http://www.tracypeterson.com/RSS/RSS.php</link>
                    <description>Gameteaser Content Rss</description>
                    <language>en-us</language>
                    <pubDate>$now</pubDate>
                    <lastBuildDate>$now</lastBuildDate>
                    <docs>http://someurl.com</docs>
                    <managingEditor>you@youremail.com</managingEditor>
                    <webMaster>you@youremail.com</webMaster>
            ";
            
foreach ($this->items as $line)
{
    $output .= "<item><title>".htmlentities($line->title)."</title>
                    <link>".htmlentities($line->link)."</link>
                    
<description>".htmlentities(strip_tags($line->text))."</description>
                </item>";
}
$output .= "</channel></rss>";
ob_end_clean();
ob_start();
echo $output;
?>