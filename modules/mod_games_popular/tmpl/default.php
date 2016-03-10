<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
$doc  = JFactory::getDocument();
?>
<script>
					function popularJump(goto){
						for(var i = 1;i <= 5;i++){
							if(i == goto){
								getObj("pop"+i).style.display = "";
								getObj("poplink"+i).className = "current";
							}
							else {
								getObj("pop"+i).style.display = "none";
								getObj("poplink"+i).className = "";
							}
						}
					}
					function voteJump(goto){
						for(var i = 1;i <= 2;i++){
							if(i == goto){
								getObj("vot"+i).style.display = "";
								getObj("votlink"+i).className = "current";
							}
							else {
								getObj("vot"+i).style.display = "none";
								getObj("votlink"+i).className = "";
							}
						}
					}
				</script>
				
<div class="ratehmebx">

					

					

					<div id="ratingpanelsdata" class="TabbedPanels ratings">
						<ul class="TabbedPanelsTabGroup">
							<li class="TabbedPanelsTab firsttab TabbedPanelsTabSelected" tabindex="6" onclick="ratingpanels.showPanel(this);"><span>Top&nbsp;Voted&nbsp;Games</span></li>
							<li class="TabbedPanelsTab" tabindex="7" style="display:none;" onclick="ratingpanels.showPanel(this);"><span>Most&nbsp;Popular&nbsp;Games</span></li>
						</ul>

						<div class="TabbedPanelsContentGroup">

							<div class="voted TabbedPanelsContent TabbedPanelsContentVisible" style="display: block;">

								<div class="buttons">
									<a href="javascript:voteJump(1);" onclick="voteJump(1); return false;" id="votlink1" class="current"><span>Development</span></a>
									<a href="javascript:voteJump(2);" onclick="voteJump(2); return false;" id="votlink2" class=""><span>Released</span></a>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>

								<div id="vot1" class="dev rgbox">
									<?php if (!empty($devlist)) : ?>
										<?php if (isset($devlist[0])):?>
											<div class="first hy">
												
												<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $devlist[0]->id); ?>">
													<img src="<?php echo $doc->baseurl . $devlist[0]->image; ?>" class="icon" border="0" width="104" height="105" onerror="this.src='/media/other/generic.png'">
													<div class="gvtitle"><?php echo $devlist[0]->name;?></div>
												</a>
												<div class="gvscore"><?php echo sprintf("%.2f",$devlist[0]->rating);?></div>
												<div class="gvbadge"></div>
											</div>
										<?php endif?>
									<div class="gvrest">
									<?php foreach ($devlist as $i => $devitem) : ?>
										<?php if ($i > 0):?>
											<?php if ($devitem->rating > 0): ?>
												<?php 
													$ratinPer = ($devitem->rating *10 ).'%';
												?>
											<?php endif?>
										<div class="gvi"><b class="gviplace">#<?php echo $i+1?></b>
												<div class="bar"><span class="hype" style="width:<?php echo $ratinPer;?>">&nbsp;<?php echo sprintf("%.2f",$devitem->rating);?></span></div>&nbsp;-&nbsp;<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $devitem->id); ?>"><?php echo $devitem->name;?></a>
											</div>
										
										<?php endif;?>
									<?php endforeach; ?>
									</div>
									<?php endif; ?>
											
											
									<div class="clear"></div>
								</div>

								<div id="vot2" class="rel rgbox" style="display: none;">
									<?php if (!empty($rellist)) : ?>
										<?php if (isset($rellist[0])):?>
											<div class="first">
												
												<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $rellist[0]->id); ?>">
													<img src="<?php echo $doc->baseurl . $rellist[0]->image; ?>" class="icon" border="0" width="104" height="105" onerror="this.src='/media/other/generic.png'">
													<div class="gvtitle"><?php echo $rellist[0]->name;?></div>
												</a>
												<div class="gvscore"><?php echo sprintf("%.2f",$rellist[0]->rating);?></div>
												<div class="gvbadge"></div>
											</div>
										<?php endif?>
									<div class="gvrest">
									<?php foreach ($rellist as $i => $relitem) : ?>
										<?php if ($i > 0):?>
											<?php if ($relitem->rating > 0): ?>
												<?php 
													$ratinPer1 = ($relitem->rating *10 ).'%';
												?>
											<?php endif?>
											<div class="gvi"><b class="gviplace">#<?php echo $i+1?></b>
												<div class="bar"><span class="rating" style="width:<?php echo $ratinPer1;?>">&nbsp;<?php echo sprintf("%.2f",$relitem->rating);?></span></div>&nbsp;-&nbsp;<a href="<?php echo JRoute::_('index.php?option=com_game&view=game&id=' . $relitem->id); ?>"><?php echo $relitem->name;?></a>
											</div>
											
										
										<?php endif;?>
									<?php endforeach; ?>
									</div>
									<?php endif; ?>
											
											
									<div class="clear"></div>
								</div>
							</div>

							<div class="TabbedPanelsContent" style="display: none;">
								<div class="buttons">
									<a href="javascript:popularJump(1);" onclick="popularJump(1); return false;" id="poplink1" class=""><span>Today</span></a>
									<a href="javascript:popularJump(2);" onclick="popularJump(2); return false;" id="poplink2" class=""><span>Week</span></a>
									<a href="javascript:popularJump(3);" onclick="popularJump(3); return false;" id="poplink3" class="current"><span>1 Month</span></a>
									<a href="javascript:popularJump(4);" onclick="popularJump(4); return false;" id="poplink4" class=""><span>6 Months</span></a>
									<a href="javascript:popularJump(5);" onclick="popularJump(5); return false;" id="poplink5" class=""><span>Year</span></a>
									<div class="clear"></div>
								</div>
								<div class="clear"></div>

								<div id="pop1" class="today rgbox" style="display: none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/14/EVE-Online.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/14_32.png" class="icon" border="0" width="104" height="105">
													<div class="gvtitle">EVE Online</div>
												</a>
												<div class="gvhitfirst">6,277<br>Unique<br>Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>3,457 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/1300/Devilian.html" class="gvititleother">Devilian</a><i>2,871 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/944/Black-Desert.html" class="gvititleother">Black Desert</a><i>2,220 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/896/Gloria-Victis.html" class="gvititleother">Gloria Victis</a><i>1,859 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>1,764 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/1308/Chronicles-of-Elyria.html" class="gvititleother">Chronicles of Elyria</a><i>1,762 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>1,338 Hits</i><div class="clear"></div></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/1214/Crowfall.html" class="gvititleother">Crowfall</a><i>966 Hits</i><div class="clear"></div></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/1179/Armored-Warfare.html" class="gvititleother">Armored Warfare</a><i>948 Hits</i><div class="clear"></div></div>
										
										<div class="discl">* Results based on unique hits over previous 24 hours&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop2" class="week rgbox" style="display: none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/632/WildStar.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/632_32.png" class="icon" border="0" width="104" height="105">
													<div class="gvtitle">WildStar</div>
												</a>
												<div class="gvhitfirst">37,619<br>Unique<br>Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/944/Black-Desert.html" class="gvititleother">Black Desert</a><i>34,509 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>33,893 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/1300/Devilian.html" class="gvititleother">Devilian</a><i>30,285 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/1308/Chronicles-of-Elyria.html" class="gvititleother">Chronicles of Elyria</a><i>18,916 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>18,780 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/14/EVE-Online.html" class="gvititleother">EVE Online</a><i>16,157 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>10,619 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/958/Albion-Online.html" class="gvititleother">Albion Online</a><i>9,622 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/498/Blade-Soul.html" class="gvititleother">Blade &amp; Soul</a><i>8,567 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous 7 days&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop3" class="month rgbox">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/632/WildStar.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/632_32.png" class="icon" border="0" width="104" height="105">
													<div class="gvtitle">WildStar</div>
												</a>
												<div class="gvhitfirst">197,893<br>Unique<br>Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/473/Guild-Wars-2.html" class="gvititleother">Guild Wars 2</a><i>111,439 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/944/Black-Desert.html" class="gvititleother">Black Desert</a><i>100,887 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>62,695 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>62,674 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/984/Trove.html" class="gvititleother">Trove</a><i>61,744 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/1300/Devilian.html" class="gvititleother">Devilian</a><i>56,780 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/1214/Crowfall.html" class="gvititleother">Crowfall</a><i>52,768 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/431/Rift.html" class="gvititleother">Rift</a><i>49,091 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/1308/Chronicles-of-Elyria.html" class="gvititleother">Chronicles of Elyria</a><i>47,738 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous month&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop4" class="sixmonths rgbox" style="display: none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/473/Guild-Wars-2.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/473_32.png" class="icon" border="0" width="104" height="105">
													<div class="gvtitle">Guild Wars 2</div>
												</a>
												<div class="gvhitfirst">883,571<br>Unique<br>Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/821/Elder-Scrolls-Online.html" class="gvititleother">Elder Scrolls Online</a><i>675,961 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>546,180 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>502,345 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/1071/Skyforge.html" class="gvititleother">Skyforge</a><i>455,846 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>455,281 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>421,793 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/984/Trove.html" class="gvititleother">Trove</a><i>397,748 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/1214/Crowfall.html" class="gvititleother">Crowfall</a><i>376,530 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/944/Black-Desert.html" class="gvititleother">Black Desert</a><i>279,527 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous six months&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

								<div id="pop5" class="year rgbox" style="display: none;">
									
											<div class="first">
												
												<a href="http://www.mmorpg.com/gamelist.cfm/game/473/Guild-Wars-2.html">
													<img src="http://images.mmorpg.com/images/games/logos/32/473_32.png" class="icon" border="0" width="104" height="105">
													<div class="gvtitle">Guild Wars 2</div>
												</a>
												<div class="gvhitfirst">2,196,590<br>Unique<br>Hits</div>
												<div class="gvbadge"></div>
											</div>
											<div class="gvrest">
										
											<div class="gvi"><b class="gviplace">#2</b><a href="/gamelist.cfm/game/821/Elder-Scrolls-Online.html" class="gvititleother">Elder Scrolls Online</a><i>2,098,237 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#3</b><a href="/gamelist.cfm/game/446/Final-Fantasy-XIV-A-Realm-Reborn.html" class="gvititleother">Final Fantasy XIV: A Realm Reborn</a><i>1,392,754 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#4</b><a href="/gamelist.cfm/game/367/Star-Wars-The-Old-Republic.html" class="gvititleother">Star Wars: The Old Republic</a><i>1,309,618 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#5</b><a href="/gamelist.cfm/game/15/World-of-Warcraft.html" class="gvititleother">World of Warcraft</a><i>1,256,865 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#6</b><a href="/gamelist.cfm/game/572/ArcheAge.html" class="gvititleother">ArcheAge</a><i>1,117,046 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#7</b><a href="/gamelist.cfm/game/632/WildStar.html" class="gvititleother">WildStar</a><i>1,011,302 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#8</b><a href="/gamelist.cfm/game/431/Rift.html" class="gvititleother">Rift</a><i>859,964 Hits</i></div>
										
											<div class="gvi"><b class="gviplace">#9</b><a href="/gamelist.cfm/game/1214/Crowfall.html" class="gvititleother">Crowfall</a><i>801,627 Hits</i></div>
										
											<div class="gvi last"><b class="gviplace">#10</b><a href="/gamelist.cfm/game/477/TERA.html" class="gvititleother">TERA</a><i>731,136 Hits</i></div>
										
										<div class="discl">* Results based on unique hits over previous year&nbsp;</div>
									</div>
									<div class="clear"></div>
								</div>

							</div>

							<div class="clear" style="display: none;"></div>
							
						</div>
					</div>


<a href="<?php echo JRoute::_('index.php?option=com_game&view=games');?>" class="tzula_more moregames">Our Game list...</a>
				</div>
				
				
<script>
					var ratingpanels = new Spry.Widget.TabbedPanels("ratingpanelsdata");

					getObj("poplink2").className = "";
					getObj("poplink3").className = "";
					getObj("poplink4").className = "";
					getObj("poplink5").className = "";
					getObj("votlink2").className = "";
				</script>				


<div class="clear"></div>