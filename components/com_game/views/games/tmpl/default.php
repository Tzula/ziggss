<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
 
JHtml::_('formbehavior.chosen', 'select');
$doc  = JFactory::getDocument();
$user = JFactory::getUser();
$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
$jinput = JFactory::getApplication()->input;
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
    $( "#datepicker1" ).datepicker();
  });
  </script>
<script>
		//<![CDATA[
			function switchFilters(){
				var fSwitch = getObj('filtersSwitch');
				var fContent = getObj('gamelistFilters');

				if(fContent.style.display == 'none'){
					fContent.style.display = '';
					fSwitch.innerHTML = 'Cancel Custom List';
				}
				else{
					fContent.style.display = 'none';
					
						fSwitch.innerHTML = 'Create Custom List';
					
				}
			}
		//]]>
	</script>
	
<?php if ($this->loadFilters):?>
<form action="<?php echo JRoute::_('index.php?option=com_game&view=games') ?>" method="post" name="gameFilters">


	<input type="hidden" name="customFilters" value="true">
	<input type="hidden" name="nName" id="nNameObj" value="">
	<input type="hidden" name="sstate" id="sstateObj" value="">
	

	<div id="gamelistFilters" style="display:;">
			<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">
			<div id="sectionHeader"><span><h1>Gamelist - Filters</h1></span></div>
		<table cellpadding="0" cellspacing="0" class="filters">
			
			<tbody>
				
				<tr class="norm section">
					<td colspan="2" class="section">
						<table border="0" cellpadding="0" cellspacing="0">
							<tbody><tr>
								<td width="33%" nowrap="">
									<div style="font-weight:bold;">Released After <input class="text" style="width:80px;" type="text" id="datepicker" class="hasDatepicker" name="rDateStart" value="<?php echo $this->rDateStart;?>"> and/or Before <input class="text" style="width:80px;" type="text" id="datepicker1" name="rDateEnd" value="<?php echo $this->rDateEnd;?>"></div>
								</td>
								<td width="33%" nowrap="">
									<div style="font-weight:bold;">Max Monthly Fee: <input class="text" style="width:50px;" type="text" name="maxMonthlyFee" value="<?php echo $this->maxMonthlyFee;?>"> <!--  Max SRP: <input class="text" style="width:50px;" type="text" name="maxSRP" value="">--></div>
								</td>
								<td width="33%" nowrap="">
									<div style="font-weight:bold;">PvP: <select name="PvP" class="pvp"><option value="-1" <?php if ($this->PvP == -1) echo 'selected="selected"'?>></option><option value="1" <?php if ($this->PvP == 1) echo 'selected="selected"'?>>Yes</option><option value="0" <?php if ($this->PvP == 0) echo 'selected="selected"'?>>No</option></select></div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
			</tbody>
		</table>
		<table cellpadding="0" cellspacing="0" class="filters">
			<tbody>
				<tr class="norm">
					<td valign="top" align="left" width="50%" style="overflow:hidden;">
						<div style="font-weight:bold;">Genres:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsGenres" size="10" style="" multiple="" align="left">	
			<?php if (!empty($this->genres)) : ?>
						<?php foreach ($this->genres as $i => $genre) : ?>
							<?php if ($genre->value > 0 && !in_array($genre->value, $this->tempGenres)):?>
								<option value="<?php echo $genre->value;?>"><?php echo $genre->text;?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsGenres','sGenres',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsGenres','sGenres',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sGenres','nsGenres',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sGenres','nsGenres',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sGenres" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sGenres)) : ?>
						<?php foreach ($this->sGenres as $i => $sgenre) : ?>
							<?php if ($sgenre[0] > 0):?>
								<option value="<?php echo $sgenre[0];?>"><?php echo $sgenre[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sGenresh" id="sGenresh" value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[

			
				var swbInstArr	= new Array();
				document.gameFilters.onsubmit = selectAll2;

				function selectAll(e){
				 for(var i=0; i<gameFilters.sGenres.length;i++){
					document.gameFilters.sGenres.options[i].selected = true;
				 }
				return true;
				}

				function selectAll2(e){
					var objInst;
					var objInsth;
					for(var i=0;i<swbInstArr.length;i++){
						objInst	= eval('document.gameFilters.'+swbInstArr[i]);
						var objInsth  = eval('document.gameFilters.' + swbInstArr[i] + 'h');
						var temp = new Array();
						for(var ii=0; ii<objInst.length;ii++){
							objInst.options[ii].selected = true;
							var tempson = new Array();
							tempson[0] = objInst.options[ii].value;
							tempson[1] =objInst.options[ii].text;
							temp[ii] = tempson;						
						}
						var aToStr = JSON.stringify(temp);
						objInsth.value = aToStr;
					}
					return true;
				}

				function sortField(argFld){
					
					if(BrowserDetect.browser != "Opera"){
						var temp = new Array();
						var temp2 = new Object();
						
						for(var x=0;x<argFld.length;x++){
							temp[argFld[x].value] = argFld[x].text;
							temp2[argFld[x].text] = argFld[x].value;
						}
						
						temp = temp.sort();
						argFld.length = 0;
						for(prop in temp){
							argFld[prop] = new Option(temp[prop],temp2[temp[prop]]);
						}
					}
					
					return;
				}
				
				function sortField2(argFld){
					var sortArr	= new Array();
					
					for(var x=0;x<argFld.length;x++){
						sortArr[sortArr.length]	= {Value:argFld[x].value,Text:argFld[x].text};						
					}
					
					sortArr.sort(sortByText);
					
					argFld.length = 0;
					for(x=0;x<sortArr.length;x++){
						argFld[argFld.length]	= new Option(sortArr[x].Text,sortArr[x].Value);
					}							
				}
				
				function sortByText(a, b) {
				    var x = a.Text.toLowerCase();
				    var y = b.Text.toLowerCase();
				    return ((x < y) ? -1 : ((x > y) ? 1 : 0));
				}

				// Dual list move function
				function movelists( srcList1, destList1, moveAll ){
					var srcList = eval( 'document.gameFilters.' + srcList1 );
					var destList = eval( 'document.gameFilters.' + destList1 );
					var tempSrc = srcList;
					var tempDest = destList;
					var frstSel = (srcList.options.selectedIndex == -1)?0:srcList.options.selectedIndex ;

				  // Do nothing if nothing is selected
				  if(srcList.selectedIndex == -1  && !moveAll){
				    return;
				  }

				  for( var i = srcList.options.length - 1; i >= 0; i-- ){
				    if ( srcList.options[i] != null && ( srcList.options[i].selected == true || moveAll ) ){
				       destList.options[destList.options.length] = new Option(srcList.options[i].text,srcList.options[i].value);
					   srcList.options[i] = null;
				    }
				  }

				  //Sort the fields into alphabetical order				  
				  sortField2(destList);

				  newLen = srcList.options.length;
				  if(newLen > 0){
				  	newSel = (frstSel >= newLen)?newLen-1:frstSel;
					srcList.options[newSel].selected = true;
				  }
				}
				
			
			swbInstArr[swbInstArr.length]	= 'sGenres';
			
			//selectelement = eval( 'document.gameFilters.nsGenres' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsGenres' ) );

		//]]>
	</script>
	


					</td>
					<td valign="top" align="left" width="50%" style="overflow:hidden;">
						<div style="font-weight:bold;">Game Status:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsGameStatus" size="10" style="" multiple="" align="left">		
				<?php if (!in_array(1, $this->tempsGameStatush)):?><option value="1">Alpha</option><?php endif ?>
				<?php if (!in_array(2, $this->tempsGameStatush)):?><option value="2">Beta Testing</option><?php endif ?>
				<?php if (!in_array(3, $this->tempsGameStatush)):?><option value="3">Cancelled</option><?php endif ?>
				<?php if (!in_array(4, $this->tempsGameStatush)):?><option value="4">Development</option><?php endif ?>
				<?php if (!in_array(5, $this->tempsGameStatush)):?><option value="5">Early Access</option><?php endif ?>
				<?php if (!in_array(6, $this->tempsGameStatush)):?><option value="6">Final</option><?php endif ?>
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsGameStatus','sGameStatus',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsGameStatus','sGameStatus',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sGameStatus','nsGameStatus',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sGameStatus','nsGameStatus',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sGameStatus" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sGameStatush)) : ?>
						<?php foreach ($this->sGameStatush as $i => $sGameStatus) : ?>
							<?php if ($sGameStatus[0] > 0):?>
								<option value="<?php echo $sGameStatus[0];?>"><?php echo $sGameStatus[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sGameStatush"  value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sGameStatus';
			
			//selectelement = eval( 'document.gameFilters.nsGameStatus' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsGameStatus' ) );

		//]]>
	</script>
	

					</td>
				</tr>
				<tr class="norm">
					<td>
						<div style="font-weight:bold;">Developers:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsDevelopers" size="10" style="" multiple="" align="left">
			<?php if (!empty($this->publishers)) : ?>
						<?php foreach ($this->publishers as $i => $publisher) : ?>
							<?php if (!in_array($publisher->value, $this->tempsDevelopersh)):?>
							<option value="<?php echo $publisher->value;?>"><?php echo $publisher->text;?></option>
							<?php endif?>
						<?php endforeach; ?>
			<?php endif; ?>
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsDevelopers','sDevelopers',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsDevelopers','sDevelopers',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sDevelopers','nsDevelopers',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sDevelopers','nsDevelopers',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sDevelopers" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sDevelopersh)) : ?>
						<?php foreach ($this->sDevelopersh as $i => $sDevelopers) : ?>
							<?php if ($sDevelopers[0] > 0):?>
								<option value="<?php echo $sDevelopers[0];?>"><?php echo $sDevelopers[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sDevelopersh" value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sDevelopers';
			
			//selectelement = eval( 'document.gameFilters.nsDevelopers' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsDevelopers' ) );

		//]]>
	</script>
	

					</td>
					<td>
						<div style="font-weight:bold;">Publishers:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsPublishers" size="10" style="" multiple="" align="left">
			<?php if (!empty($this->publishers)) : ?>
						<?php foreach ($this->publishers as $i => $publisher) : ?>
							<?php if (!in_array($publisher->value, $this->tempsPublishersh)):?>
							<option value="<?php echo $publisher->value;?>"><?php echo $publisher->text;?></option>
							<?php endif?>
						<?php endforeach; ?>
			<?php endif; ?>
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsPublishers','sPublishers',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsPublishers','sPublishers',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sPublishers','nsPublishers',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sPublishers','nsPublishers',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sPublishers" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sPublishersh)) : ?>
						<?php foreach ($this->sPublishersh as $i => $sPublishers) : ?>
							<?php if ($sPublishers[0] > 0):?>
								<option value="<?php echo $sPublishers[0];?>"><?php echo $sPublishers[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sPublishersh"  value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sPublishers';
			
			//selectelement = eval( 'document.gameFilters.nsPublishers' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsPublishers' ) );

		//]]>
	</script>
	

					</td>
				</tr>
				<tr class="norm">
					<td>
						<div style="font-weight:bold;">Payment Types:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsPayTypes" size="10" style="" multiple="" align="left">	
				<?php if (!in_array(1, $this->tempsPayTypesh)):?><option value="1">Buy to Play</option><?php endif?>
				<?php if (!in_array(2, $this->tempsPayTypesh)):?><option value="2">Free</option><?php endif?>
				<?php if (!in_array(3, $this->tempsPayTypesh)):?><option value="3">Hybrid</option><?php endif?>
				<?php if (!in_array(4, $this->tempsPayTypesh)):?><option value="4">Item Mall</option><?php endif?>
				<?php if (!in_array(5, $this->tempsPayTypesh)):?><option value="5">Subscription</option><?php endif?>
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsPayTypes','sPayTypes',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsPayTypes','sPayTypes',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sPayTypes','nsPayTypes',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sPayTypes','nsPayTypes',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sPayTypes" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sPayTypesh)) : ?>
						<?php foreach ($this->sPayTypesh as $i => $sPayTypeh) : ?>
							<?php if ($sPayTypeh[0] > 0):?>
								<option value="<?php echo $sPayTypeh[0];?>"><?php echo $sPayTypeh[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sPayTypesh"  value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sPayTypes';
			
			//selectelement = eval( 'document.gameFilters.nsPayTypes' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsPayTypes' ) );

		//]]>
	</script>
	

					</td>
					<td>
						<div style="font-weight:bold;">Distribution Types:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsDistributionTypes" size="10" style="" multiple="" align="left">
				<?php if (!in_array(1, $this->tempsDistributionTypesh)):?><option value="1">Browser</option><?php endif?>
				<?php if (!in_array(2, $this->tempsDistributionTypesh)):?><option value="2">Download</option><?php endif?>
				<?php if (!in_array(3, $this->tempsDistributionTypesh)):?><option value="3">Retail</option><?php endif?>
			</select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsDistributionTypes','sDistributionTypes',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsDistributionTypes','sDistributionTypes',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sDistributionTypes','nsDistributionTypes',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sDistributionTypes','nsDistributionTypes',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sDistributionTypes" size="10" style="" multiple="" align="left">
				<?php if (!empty($this->sDistributionTypesh)) : ?>
						<?php foreach ($this->sDistributionTypesh as $i => $sDistributionTypeh) : ?>
							<?php if ($sDistributionTypeh[0] > 0):?>
								<option value="<?php echo $sDistributionTypeh[0];?>"><?php echo $sDistributionTypeh[1];?></option>
							<?php endif;?>
						<?php endforeach; ?>
						<?php endif; ?>	
			</select>
			<input type="hidden" name="sDistributionTypesh" value="">
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sDistributionTypes';
			
			//selectelement = eval( 'document.gameFilters.nsDistributionTypes' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsDistributionTypes' ) );

		//]]>
	</script>
	

					</td>
				</tr>
				<!-- 
				<tr class="norm">
					<td class="section" colspan="2"><span class="note"><u>Note:</u> If at least one value isn't selected for display in each of the above boxes all values for that box will be returned.</span></td>
				</tr>
				
				
				<tr class="norm">
					<td>
						<div style="font-weight:bold;">Columns to Display:</div>
						
	<style>
		.swap_box { position:relative; }
		.swap_box div { padding:3px; float:left;}
		.swap_box .clear { clear:left; }
		.swap_button { width:25px; }
	</style>
	<div class="swap_box">
		<div class="swap_left" style="">
			<select name="nsDisplayColumns" size="10" style="" multiple="" align="left">
				
						
					
						
					
						
					
			<option value="3.0">Publisher</option><option value="10.0">Rank/Hype</option><option value="11.0">SRP</option></select>
		</div>
		<div class="swap_midd" style="width:25px;">
			<input class="" type="button" value=">" onmousedown="movelists( 'nsDisplayColumns','sDisplayColumns',false);" style="width:25px;"><br>
			<input class="" type="button" value=">>" onmousedown="movelists('nsDisplayColumns','sDisplayColumns',true);" style="width:25px;"><br>
			<input class="" type="button" value="<" onmousedown="movelists('sDisplayColumns','nsDisplayColumns',false);" style="width:25px;"><br>
			<input class="" type="button" value="<<" onmousedown="movelists('sDisplayColumns','nsDisplayColumns',true);" style="width:25px;">
		</div>
		<div class="swap_righ" style="">
			<select name="sDisplayColumns" size="10" style="" multiple="" align="left">
				
					<option value="2.0">Developer</option>
				
					<option value="8.0">Distribution Types</option>
				
					<option value="9.0">Fee</option>
				
					<option value="1.0">Genre</option>
				
					<option value="7.0">Payment Types</option>
				
					<option value="6.0">PvP</option>
				
					<option value="5.0">Release Date</option>
				
					<option value="4.0">Status</option>
				
			</select>
		</div>
		<div class="clear"></div>
	</div>
	
	<script language="JavaScript">
		//<![CDATA[
		
			
			
			swbInstArr[swbInstArr.length]	= 'sDisplayColumns';
			
			//selectelement = eval( 'document.gameFilters.nsDisplayColumns' );
			
			
			//alert();
			//alert();

			sortField2( eval( 'document.gameFilters.nsDisplayColumns' ) );

		//]]>
	</script>
	

					</td>
					<td>&nbsp;</td>
				</tr> -->
				<tr>
					<td colspan="2" class="feet">
						<span>
							<input type="submit" class="submit" value="Show Results" name="applyFilters"><span class="note"><u>Note:</u> You will have the option to save your own list when the results are displayed</span>
							<div class="clear"></div>
						</span>
					</td>
				</tr>

			</tbody>
		</table>
		<div class="clear"></div>
		</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>

		<div class="gamelist filterPadding"></div>
	</div>

	
	
	</form>
	
	
<script>
		//<![CDATA[
			function saveCheck(state){
				if(getObj('gamelistName').value == ''){
					alert('You must provide a name for this custom gamelist');
					return false;
				}
				else {
					getObj('nNameObj').value = getObj('gamelistName').value;
					
					selectAll2();
					document.gameFilters.submit();
				}
			}
		//]]>
	</script>
	
<div class="clear"></div>
<?php endif;?>







<div class="prebody"><div class="subbody"><div class="outerbody"><div class="innerbody"><div class="actualbody"> <div id="" class="panel panelFullWidth panelPrimary" style=" "><div class="panel_inner">
	<div class="panelOuterBody">
		<div class="panelTitleBar panelTight">
			<div class="title">
				<h3 class=""></h3>
			</div>
		</div>
		<div id="" class="panelBody ">
	<div id="sectionHeader"><span><h1>Gamelist - All Games</h1>
				<div class="panes">
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&all=1'); ?>" class="all <?php GameHelper::blCurrent($jinput, 'all'); ?>">All</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&paymenttype=2'); ?>" class="all <?php GameHelper::blCurrent($jinput, 'paymenttype'); ?>">Free</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&status=6'); ?>" class="released <?php GameHelper::blCurrent($jinput, 'status6'); ?>">Released</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&status=2'); ?>" class="beta <?php GameHelper::blCurrent($jinput, 'status2'); ?>">Beta</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&status=4'); ?>" class="dev <?php GameHelper::blCurrent($jinput, 'status4'); ?>">Development</a>	<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&platform=2'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'platform'); ?>">Ios</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&distribution=1'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'distribution'); ?>">Browser</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&status=3'); ?>" class="dead <?php GameHelper::blCurrent($jinput, 'status3'); ?>">Cancelled</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=44'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres44'); ?>">ARPG</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=48'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres48'); ?>">Card Battler</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=47'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres47'); ?>">FPS/TPS</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=41'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres41'); ?>">FTG</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=42'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres42'); ?>">MOBA</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=46'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres46'); ?>">RTS</a>
						<a href="<?php echo JRoute::_('index.php?option=com_game&view=games&genres=43'); ?>" class="ios <?php GameHelper::blCurrent($jinput, 'genres43'); ?>">SLG</a>
						<hr>
						<?php if ($this->loadFilters):?>
							<a href="index.php/gamelist">Cancel Custom List</a>
						<?php else:?>
							<a href="index.php/gamelist?loadFilters=true">Create Custom List</a>
						<?php endif;?>
					</div></span></div>
	
	
	<form action="<?php echo JRoute::_('index.php?option=com_game&view=games') ?>" method="post" id="adminForm" name="adminForm">
	<table cellpadding="0" cellspacing="0" class="tabicular" id="gamelisttable">
		<thead>
			<tr class="simple" style="background-color: #359BED;">
				<th class="first" align="left">S</th>
				<th class="name" align="left">
					<span><?php echo JHtml::_('grid.sort', 'Game', 'a.name', $listDirn, $listOrder); ?></span>
				</th>
				<th class="genr" align="left">
					<span><?php echo JHtml::_('grid.sort', 'Genre', 'a.genres', $listDirn, $listOrder); ?></span></th>
				<th class="dev" align="left">
					<span><?php echo JHtml::_('grid.sort', 'Developer', 'a.developer', $listDirn, $listOrder); ?></span>
				</th>
				<th class="date" align="center">
					<span><?php echo JHtml::_('grid.sort', 'Date', 'a.releaseddate', $listDirn, $listOrder); ?></span></th>
				<th class="pvp" align="center">
					<span><?php echo JHtml::_('grid.sort', 'PvP', 'a.pvp', $listDirn, $listOrder); ?></span></th>
				<th class="dist" align="center"><span>Dist.</span></th>
				<th class="pay" align="center"><span>Pay</span></th>
				<th class="fee" align="left">
					<span><?php echo JHtml::_('grid.sort', 'Fee', 'a.fee', $listDirn, $listOrder); ?></span>
				</th>
				<th class="rate last" align="left">
					<span><?php echo JHtml::_('grid.sort', 'Rating/Hype', 'a.rating', $listDirn, $listOrder); ?></span>
				</th>
			</tr>
		</thead>
		<tbody id="databody"> 


			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$link = JRoute::_('index.php?option=com_game&view=game&id=' . $row->id);
					if ($i % 2 == 0){
						$bg = "#59C8FF";
					}else{
						$bg = "#359BED";
					}
				?>
			<tr id="glrow_1" style="background-color:<?php echo $bg; ?>">
				<td class="status name first">
					<?php if ($row->status == 1): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_released.gif" alt="F" width="14" height="14" title="Alpha">
					<?php elseif ($row->status == 2): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_beta.gif" alt="F" width="14" height="14" title="Beta Testing">
					<?php elseif ($row->status == 3): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_released.gif" alt="F" width="14" height="14" title="Cancelled">
					<?php elseif ($row->status == 4): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_development.gif" alt="F" width="14" height="14" title="Development">
					<?php elseif ($row->status == 5): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_released.gif" alt="F" width="14" height="14" title="Early Access">
					<?php elseif ($row->status == 6): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_released.gif" alt="F" width="14" height="14" title="Final">
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_released.gif" alt="F" width="14" height="14" title="Final">
					<?php endif; ?>
				</td>
				<td nowrap="" class="alt"><a target="_parent" href="<?php echo $link; ?>" title="<?php echo $row->name; ?>"><?php echo GameHelper::getSubString($row->name, 0, 25); ?></a></td>
				<td class="genre"><?php echo $row->genres_name; ?></td>
				<td class="dev alt" title="<?php echo $row->developer_name; ?>"><?php echo GameHelper::getSubString($row->developer_name, 0, 9); ?></td>
				
				<td class="date" align="center">
					<?php echo substr($row->releaseddate, 0, 10); ?>
				</td>
				<td align="center" class="pvp alt">
					<?php if ($row->pvp == 0): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_nopvp.gif" width="14" height="14" alt="No" title="No PVP">
					<?php elseif ($row->pvp == 1): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_pvp.gif" width="14" height="14" alt="Yes" title="Has PVP">
					<?php else: ?>
						<span class="uk" title="PVP Status Unknown">?</span>
					<?php endif; ?>
						
				</td>
				<td align="center" class="dist">
					<?php if ($row->distribution == 1): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="" title="">
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="D" >
					<?php elseif ($row->distribution == 2): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="" title="">
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_download.gif" width="14" height="14" alt="D" title="Download">
					<?php elseif ($row->distribution == 3): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_retail.gif" width="14" height="14" alt="R" title="Retail">
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="" >
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="" title="">
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="">
					<?php endif; ?>	
				</td>
				<td align="center" class="pay alt">
					<?php if ($row->paymenttype == 1): ?>
						
					<?php else: ?>
						
					<?php endif; ?>
					<?php if ($row->paymenttype == 2): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_free.gif" width="14" height="14" alt="Free" title="Free">
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="">
					<?php endif; ?>
					<?php if ($row->paymenttype == 3): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_hybrid.gif" width="14" height="14" alt="Hybrid" title="Hybrid">
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="">
					<?php endif; ?>
					<?php if ($row->paymenttype == 4): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_micro.gif" width="14" height="14" alt="Item Mall" title="Item Mall">
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="">
					<?php endif; ?>
					<?php if ($row->paymenttype == 5): ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/item_icon_pay.gif" width="14" height="14" alt="Subscription" title="Subscription">
					<?php else: ?>
						<img src="<?php echo $doc->baseurl; ?>templates/mmorpg/images/themes/radiance/fullmoon/frame_blank.gif" width="14" height="14" alt="">
					<?php endif; ?>
				</td>
				<td class="fee">
					<?php if ($row->fee == 0): ?>
						<span class="">Free</span>
					<?php else: ?>
						<span class=""><?php echo "$".$row->fee; ?></span>
					<?php endif; ?>	
				</td>
				<td class="rate alt">
					<?php if ($row->rating > 0): ?>
						<?php 
							$classname = 'rating';
							if ($row->status == 2){
								$classname = 'beta';
							}elseif($row->status == 4){
								$classname = 'hype';
							}
							$ratinPer = ($row->rating *10 ).'%';
						?>
						<span class="frame"><div class="bar"><span class="<?php echo $classname; ?>" style="width:<?php echo $ratinPer; ?>" title="<?php echo $row->rating; ?>"></span></div><span class="value rating"><?php echo $row->rating; ?></span></span></td>
					<?php else: ?>
						<span class="uk" title="Not enough votes to tabulate"><span class="skimlinks-unlinked">Req.Votes</span></span>
					<?php endif; ?>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
			
			
		</tbody>
		<tfoot>
			<tr>
				<td colspan="10" class="feet"><span></span></td>
			</tr>
		</tfoot>
		
	</table>

	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
	<?php echo JHtml::_('form.token'); ?>
</form>
				
	

	</div></div></div>
</div>

	<div class="clear"></div>
	</div></div></div></div></div>
<!-- 
<?php if ($user->guest): ?>
	<div class="gameSubs">Registered users can suggest new games right here! <a href="<?php echo JRoute::_('index.php?option=com_users&view=login'); ?>">Login</a> or <a href="<?php echo JRoute::_('index.php?option=com_users&view=registration'); ?>">Register</a> today.</div>
<?php else: ?>
<form name="gameSubForm" action="/gamelist.cfm/show/all" method="post" class="gameSubs">
						<h2>Are we missing a game?</h2>
						<i>Send us a message with the game name, website, and any information you know and we'll look into it!</i>
						<input type="text" class="mesg" name="newgsmes" value="">&nbsp;<input type="submit" name="send" class="send" value="Send">
					</form>
<?php endif; ?>
 -->