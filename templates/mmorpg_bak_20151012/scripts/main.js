
// JavaScript Document

// resize an iframe
function resizeIframe(frameId,toWidth,toHeight){		
	var theFrame	= document.getElementById(frameId);
	theFrame.height = parseInt(toHeight);
	theFrame.width	= parseInt(toWidth);		
}

// Open External Links in a new tab / window
function ExternalLinks(domain){
	var hostname = domain.replace("www.", "").toLowerCase();
	var i = document.links.length;
	while ( --i >= 0 ) {
		var thisLink = document.links[i];
		var thisHref = thisLink.href.toLowerCase();
		if ( thisHref.indexOf("http://") != -1 && thisHref.indexOf(hostname) == -1 ){
			thisLink.target = '_blank';
			//thisLink.className += 'external';
		}
	}	
}

// Find Object
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

// Swap Image
function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

// Restore Image
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

// Preload images
function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

// Open window in the center of display
function openCenteredWindow(url, height, width, name, parms) {
	var left = Math.floor((screen.width - width)/2);
	var top = Math.floor(((screen.height-35) - height)/ 2);
	if (top < 0) {
		top = 0
	}
   var winParms = "top=" + top + ",left=" + left + ",height=" + height + ",width=" + width;
   if (parms) {
	 winParms += "," + parms;
	}
   var win = window.open(url, name, winParms);
   if (parseInt(navigator.appVersion) >= 4) {
	 win.window.focus();
	}
   return win;
}

// Show user details ***OUTDATED***
function launchuserinfo(userID,urltoken,server){
	var attributes = "toolbar=no,scrollbars=auto,resizable=yes,width=300,height=450,left=100,top=100";
	msgWindow=window.open("http://" + window.location.hostname + "/userinfo.cfm?" + urltoken + "&userID=" + userID,"UserInformation",attributes);
}

// Show Individual Screenshot
function showScreen(width,height,id,gameID,type){
	if(!type){
		type = 1;
	}
	openCenteredWindow('/view_screenshot.cfm?gameID=' + gameID + '&screenID=' + id + '&type=' + type,height+50,width+8,'screenView','');
}

// Show gamedetail screenshots
function showScreen2(id,gameId,type,mode,showComments){
	if(!type){
		type = 1;
	}
	if(!mode){
		mode = 1;
	}
	openCenteredWindow('/inc_gamedetails_screens_viewer2.cfm?gameId=' + gameId + '&sc='+showComments+'&screenId=' + id + '&type=' + type + '&mode=' + mode,625,971,'screenViewer','status=no,location=no');
}

// Show Video in Popup
function viewVideo(id){
	openCenteredWindow('/popVideoPlayer.cfm?videoId='+id,550,592,'videoPlayer','');
}

// Show Individual Screenshot
function viewImage(width,height,file) {
	// x,y,|features|670|images|670_2.jpg
	// x,y,|reviews|53|images|10010.jpg
	// x,y,|images|newsimages|102007|vc1.jpg
	// x,y,|screens|#DateFormat(fileDate,"mmyyyy")#|full|#screenId#.jpg

	var u = file
	var t = "path";
	var p = "";
	var id = 0;
	var temp = new Array();
	temp = u.split('|');

	for(var i=0; i < temp.length; i++) {
		if(temp[i] == "features") { t = "features"; id = temp[(i+1)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&width='+width+'&height='+height; }
		if(temp[i] == "reviews") { t = "reviews"; id = temp[(i+1)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&type=review&width='+width+'&height='+height; }
		if(temp[i] == "screens") { t = "screens"; id = temp[(i+3)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&type=screens&width='+width+'&height='+height; }
		if(temp[i] == "galleries") { t = "single"; id = temp[(i+1)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&type=gallery&width='+width+'&height='+height+'&show=single'; }
		if(temp[i] == "newsimages") { t = "newsimages"; id = temp[(i+1)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&type=newsimages&width='+width+'&height='+height+'&show=single'; }
		if(temp[i] == "youtube") { t = "youtube"; id = temp[(i+1)]; p = '/image.cfm?id='+id+'&image='+temp[(temp.length-1)]+'&type=youtube&width='+width+'&height='+height; }
	}

	if(t != "path") {
		zoombox.start(p);
	}
	else {
		// OLD VIEWER
		var sWidth, sHeight;
		var aWidth	= screen.width;
		var aHeight	= screen.height;
		var scroll	= 'no';

		// if the width or height exceeds the users screen dimensions alter it
		sWidth	= width;
		sHeight	= height;

		if(aWidth < width){
			sWidth	= aWidth;
			scroll	= 'yes';
		}

		if(aHeight < height){
			sHeight	= aHeight;
			scroll	= 'yes';
		}

		openCenteredWindow('http://' + window.location.hostname + '/view_screenshot.cfm?file=' + file + '&w='+sWidth+'&h='+sHeight,sHeight+50,sWidth+8,'imageView','scrollbars='+scroll);
		return;

	}
}

// Test if cookies are enabled
function testCookies() {
	var exp = new Date();
	exp.setTime(exp.getTime() + 1800000);
	setCookie("cookies", "cookies", exp, false, false, false); // first write a test cookie
	if (document.cookie.indexOf('cookies') != -1) {
		found = false;
	}
	else {
		found = true;
	}
	// now delete the test cookie
	exp = new Date();
	exp.setTime(exp.getTime() - 1800000);
	setCookie("cookies", "cookies", exp, false, false, false);
	return found;
}

// Get cookie
function getCookie(name) {
	if (document.cookie.length>0) {
		c_start=document.cookie.indexOf(name + "=")
		if (c_start!=-1) {
			c_start=c_start + name.length+1
			c_end=document.cookie.indexOf(";",c_start)
			if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		}
	}
	return "";
}

// Set cookie
function setCookie(name, value, expires, path, domain, secure) {
	var thisCookie = name + "=" + escape(value) +
	((expires) ? "; expires=" + expires.toGMTString() : "") +
	((path) ? "; path=" + path : "") +
	((domain) ? "; domain=" + domain : "") +
	((secure) ? "; secure" : "");
	document.cookie = thisCookie;
}

// Check for cookies
function everyPage() {
	/*if (testCookies()) {
		if (!cookieBypass)document.location = '/errors/nocookies.cfm';
	}*/
}

// Show login panel in header
function showLogin() {
	toggle('ud_out');
	toggle('ud_in');
  return(false);
}

// Get cursor coordinates for site
cursorcoords = [0,0];
tip = "";
tipVisibility = 0;
pageLoaded = false;
tipBaseline = 0;
tip32bit = 0;

function cursorCoordinates(e) {
	if (!e) var e = window.event;
	if (e.pageX || e.pageY) {
		cursorcoords[0] = e.pageX;
		cursorcoords[1] = e.pageY;
	}
	else if (e.clientX || e.clientY) {
		cursorcoords[0] = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
		cursorcoords[1] = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
	}
}

// Initialize mouse tracking where needed
function initMouseTracking() {
	if (document.layers) { // Netscape
		document.captureEvents(Event.MOUSEMOVE);
		document.onmousemove = cursorCoordinates;
	} else if (document.all) { // Internet Explorer
		document.onmousemove = cursorCoordinates;
	} else if (document.getElementById) {
		document.onmousemove = cursorCoordinates;
	}
	tip = getObj("tiplayer");
}

// Show floating tooltip
doFade = true;
function floatingToolTipShow(body,allowUpdates,doFade,maxWidth,theBaseline,use32Bit) {
	if(pageLoaded === true){
		try{
			// Reset incase other tip isn't faded out yet
			tip.style.opacity = '0';
			tip.style.filter = 'alpha(opacity:0)';
			tip.style.visibility = "hidden";
			tip.style.top = "0px";
			tip.innerHTML = "";
			tipVisibility = 0;
			tipBaseline = 0;
			tip32bit = 0;
			
			clearTimeout(tipfader);
			clearInterval(tiprefresh);
			
		}catch(err){}
		
		tipBaseline = parseInt(theBaseline);
		if(tip32bit == 'true'){ tip32bit = 1; } else { tip32bit = 0; }
		tip.innerHTML = body;
		tip.style.left = cursorcoords[0]+"px";
		tip.style.visibility = "visible";
		if(parseInt(maxWidth) > 0){
			tip.style.width = parseInt(maxWidth)+"px";
		}
		var divHeight = 220;
		if(tip.offsetHeight){
			divHeight=tip.offsetHeight;
		}
		else if(tip.style.pixelHeight){
			divHeight=tip.style.pixelHeight;
		}
		
		if(tipBaseline == 0){
			tip.style.top = (cursorcoords[1]-divHeight-10)+"px";
			tip.style.left = cursorcoords[0]+"px";
		}
		else {
			tip.style.top = (cursorcoords[1]-57)+"px";
			tip.style.left = (cursorcoords[0]+9)+"px";
		}
		if(isIE()){
			doFade = false;
		}
		
		if(doFade == true){
			tipfader = window.setTimeout('fadeToolTip(10)',10);
		}
		else {
			tip.style.opacity = '1';
			tip.style.filter = 'alpha(opacity:100)';
			tip.style.filter = '';
			tipVisibility = 100;
		}
		if(allowUpdates == true) {
			tiprefresh = setInterval('updateToolTip()',50);
		}
	}
}

// Update tooltip location
function updateToolTip() {
	var divHeight = 220;
	if(tip.offsetHeight){
		divHeight=tip.offsetHeight;
	}
	else if(tip.style.pixelHeight){
		divHeight=tip.style.pixelHeight;
	}
	if(tipBaseline == 0){
		tip.style.top = (cursorcoords[1]-divHeight-10)+"px";
		tip.style.left = cursorcoords[0]+"px";
	}
	else {
		tip.style.top = (cursorcoords[1]-57)+"px";
		tip.style.left = (cursorcoords[0]+9)+"px";
	}
}

function fadeToolTip(change){
	var amountChange = (change);
	var newAmount = tipVisibility + amountChange;
	tipVisibility = newAmount;
	if(newAmount < 95 && newAmount > 0){
		tip.style.opacity = '.'+newAmount;
		tip.style.filter = 'alpha(opacity:'+newAmount+')';
		tipfader = window.setTimeout('fadeToolTip('+amountChange+')',10);
	}
	else if(newAmount <= 0){
		tip.style.opacity = '.0';
		tip.style.filter = 'alpha(opacity:0)';
		tip.style.visibility = "hidden";
		tip.style.top = "0px";
		tip.innerHTML = "";
		tipVisibility = 0;
		try{clearInterval(tiprefresh);}catch(err){}
	}
	else {
		tip.style.opacity = '.95';
		tip.style.filter = 'alpha(opacity:95)';
	}
}

// Hide floating tooltip
function floatingToolTipHide() {
	//tipFader = window.setTimeout('fadeToolTip(-25)',10);
	tip.style.opacity = '0';
	tip.style.filter = 'alpha(opacity:0)';
	tip.style.visibility = "hidden";
	tip.style.top = "0px";
	tip.innerHTML = "";
	tipVisibility = 0;
	try{clearInterval(tiprefresh);}catch(err){}
	tipBaseline = 0;
	tip32bit = 0;
}

// Retrieve a reference to an object in the document
function getObj(objID) {
    if(document.getElementById){
        return document.getElementById(objID);
    } else if (document.all){
        return document.all[objID];
    } else if (document.layers){
        return document.layers[objID];
    }
}

// Retrieve a reference to an object in the parent's dom
function getParentObj(objID){
	if(document.getElementById){
		return parent.document.getElementById(objID);
	} else if (document.all){
		return parent.document.all[objID];
	} else if (document.layers){
		return parent.document.layers[objID];
	}
}

// Get page position of object, courtesy of www.quirksmode.org/js/findpos.html
function findPos(obj) {
	var curleft = curtop = 0;
	if (obj.offsetParent) {
		curleft = obj.offsetLeft
		curtop = obj.offsetTop
		while (obj = obj.offsetParent) {
			curleft += obj.offsetLeft
			curtop += obj.offsetTop
		}
	}
	return [curleft,curtop];
}

function addMeToBuddyList(userId){
	var userToAdd = parseInt(userId);

	if(userToAdd > 0){
		var params = new Object();
		params['buddyUserId'] = userToAdd;

		http('post','/ajax/tools.cfc?method=addToBuddyList',addMyToBuddyListCallback,params);
	}
}

function addMyToBuddyListCallback(result){
	if(parseInt(result) > 0){
		alert("User added to buddy list!");
	}
	else{
		// Error
	}
}

function exegj(gameId){
	if(gameId > 0){ location.href = '/gamelist.cfm/game/' + gameId ; }
}

function Rndm(max) {
	return 1 + Math.floor(Math.random() * max);
}

function refreshSession(){
	var strReq = '/pSession/index.cfm?random=' + Rndm(10000);
		var imgObj = getObj('sesHolder');
		if(imgObj){
			imgObj.src = strReq;
		}
}

function jumpToGamePage(){
	var gameId = document.searchForm.gamelistjump.value;
	if(gameId > 0){ location.href = '/gamelist.cfm/game/' + gameId; }
}
			
function togglegqjSubList(listid){
	for(var i = 1;i<=3;i++){
		var temp_obj = getObj("gqjsublist"+i);
		if(i == listid){
			temp_obj.style.display = "";
		}
		else {
			temp_obj.style.display = "none";
		}
	}
}

function isIE(){
  return /msie/i.test(navigator.userAgent);
}

function showFavGames(){
	// First figure where to make it
	var linkposition = findPos(getObj('favgameslink'));
	var panelobj = getObj('favgamepanel');
	var windowsize = getWindowSize();
	var finalpos = parseInt(linkposition[0])-parseInt((parseInt(windowsize[0])-990)/2);
	
	if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){
		finalpos = finalpos - 20;
	}
	
	
	// Show it
	panelobj.style.left = finalpos+"px";
	toggle('favgamepanel');

	return false;
}

// Radiance Bar Variables
valuebarValue = 0;
valuebarPos = 0;
valuebarPrevious = 0;
valuebarInterval = null;
valuebarId = null;
valuebarWidth = 0;
valuebarLabel = null;
valuebarIntVal = 0;

// Radiance Bar Initialization
function valuebarInit(id,value) {
	var bar = getObj(id);
	bar.style.width = value+"%";
}

// Radiance Bar Update
function valuebarUpdate() {
	var pos = findPos(valuebarId);
	if(cursorcoords[0] >= pos[0] && cursorcoords[0] <= parseInt(pos[0]+valuebarWidth)) {
		var value = (((cursorcoords[0]-pos[0])/valuebarWidth)*98);
		valuebarIntVal = parseInt(value/10)+1;
		valuebarId.style.width = value+"%"
		valuebarValue = valuebarIntVal;
		if(valuebarLabel != null){
			valuebarLabel.innerHTML = valuebarIntVal;
			//valuebarLabel.innerHTML = "bar:"+pos+" mouse:"+cursorcoords+" value:"+value+" asInt:"+valuebarIntVal;
		}
	}
}

// Radiance Bar Start Update Interval
function valuebarStart(id,previous,width,label) {
	valuebarId = getObj(id);
	valuebarWidth = parseInt(width);
	if(label != ""){
		valuebarLabel = getObj(label);
	}
	valuebarPrevious = previous
	valuebarInterval = setInterval('valuebarUpdate()',50);
}

// Radiance Bar Cancel and reset
function valuebarCancel(setvalue,label) {
	try{clearInterval(valuebarInterval);}catch(err){}
	if(setvalue != ""){
		valuebarId.style.width = (parseInt(setvalue)*10)+"%"
	}
	if(label != ""){
		valuebarLabel = getObj(label);
		valuebarLabel.innerHTML = setvalue;
	}
	valuebarPrevious = 0;
	valuebarId = null;
	valuebarValue = 0;
	valuebarWidth = 0;
	valuebarLabel = null;
	valuebarIntVal = 0;
}

// Get a page elements X
function DL_GetElementLeft(eElement)
{
	if (!eElement && this) // if argument is invalid
	{ // (not specified, is null or is 0)
		eElement = this; // and function is a method
	} // identify the element as the method owner

	var nLeftPos = eElement.offsetLeft; // initialize var to store calculations
	var eParElement = eElement.offsetParent; // identify first offset parent element
	while (eParElement != null)
	{ // move up through element hierarchy
		nLeftPos += eParElement.offsetLeft; // appending left offset of each parent
		eParElement = eParElement.offsetParent; // until no more offset parents exist
	}
	return nLeftPos;
}

// Get a page elements Y
function DL_GetElementTop(eElement)
{
	if (!eElement && this)
	{
		eElement = this;
	}

	var nTopPos = eElement.offsetTop;
	var eParElement = eElement.offsetParent;
	while (eParElement != null)
	{
		nTopPos += eParElement.offsetTop;
		eParElement = eParElement.offsetParent;
	}
	return nTopPos;
}

// Show the user post report frame
function showUserPostReport(cell,userId,postId,targetId){
	var target = getObj(targetId);
	var thecell = getObj(cell);

	//hide?
	if(thecell.style.height == '45px') {
		thecell.style.display = 'none';
		thecell.style.height = '0px';
		return;
	}
	thecell.style.display = '';
	thecell.style.height = '45px';
}

// Close user post report
function closeUserPostReport(){
	var ws = getObj('userPostReport');
	ws.style.display	= 'none';
}

function showContentReportForm(type,uId,url,cUid,c) {
	// Check for other user action first
	var existing = getObj("contentreportframe");
	if(existing != null) { document.body.removeChild(existing); }
	
	// Preset dimensions
	var width = 800;
	var height = 600;

	// Fetch data
	var viewport = getWindowSize();
	var scrollport = getPageSize();

	// Get center of visible page
	var xpos = ((viewport[0]/2)-(width/2))+scrollport[0]
	var ypos = ((viewport[1]/2)-(height/2))+scrollport[1]

	// Prevent placement on left side
	if(ypos < 10) { ypos = 10; }
	if(xpos < 10) { xpos = 10; }

	// Create frame
	var crframe = document.createElement('iframe');
	crframe.setAttribute('id','contentreportframe');
	crframe.setAttribute('allowtransparency','true');

	crframe.style.width = width+'px';
	crframe.style.height = height+'px';
	crframe.style.border = '0px';
	crframe.frameBorder = 0;
	crframe.style.position = 'absolute';
	crframe.style.left = parseInt(xpos)+'px';
	crframe.style.top = parseInt(ypos)+'px';
	crframe.style.display = 'block';
	crframe.style.color = '#FFF';
	crframe.style.zIndex = '9999999';
	crframe.allowtransparency = 'true';
	
	var link = '/inc_contentReport_frame.cfm?cUid='+cUid+'&uId='+uId+'&type='+type+'&url='+url+'&uax='+parseInt(xpos)+'&uay='+parseInt(ypos)+'&c='+c;
	//alert("start cr");
	crframe.src = link;
	//alert("link opened:"+crframe.src);

	// Add useractions to site
	window.document.body.appendChild(crframe)
}

function showUserActions(uId,pId) {
	// Check for other user action first
	var existing = getObj("useractionframe");
	if(existing != null) { document.body.removeChild(existing); }
	
	// Preset dimensions
	var width = 800;
	var height = 300;

	// Fetch data
	var viewport = getWindowSize();
	var scrollport = getPageSize();

	// Get center of visible page
	var xpos = ((viewport[0]/2)-(width/2))+scrollport[0]
	var ypos = ((viewport[1]/2)-(height/2))+scrollport[1]

	// Prevent placement on left side
	if(ypos < 10) { ypos = 10; }
	if(xpos < 10) { xpos = 10; }

	// Create frame
	var uaframe = document.createElement('iframe');
	uaframe.setAttribute('id','useractionframe');
	uaframe.setAttribute('allowtransparency','true');

	uaframe.style.width = width+'px';
	uaframe.style.height = height+'px';
	uaframe.style.border = '0px';
	uaframe.frameBorder = 0;
	uaframe.style.position = 'absolute';
	uaframe.style.left = parseInt(xpos)+'px';
	uaframe.style.top = parseInt(ypos)+'px';
	uaframe.style.display = 'block';
	uaframe.style.color = '#FFF';
	uaframe.style.zIndex = '99999';
	uaframe.allowtransparency = 'true';
	
	var link = '/inc_admin_useractions.cfm?uId='+uId+'&pId='+pId+'&uax='+parseInt(xpos)+'&uay='+parseInt(ypos);
	//alert("start ua");
	uaframe.src = link;
	//alert("link opened:"+uaframe.src);

	// Add useractions to site
	window.document.body.appendChild(uaframe)
}

// Show user actions
function toggleUserActions(id,userid) {
	showUserActions(userid);
}

// Close user actions
function closeUserActions(){
	return true;
}

// Toggle display of object
function toggle( targetId ) {
	if (document.getElementById) {
		var target = getObj(targetId);
		if (target.style.display == 'none') {
			target.style.display = '';
		}
		else {
			target.style.display = 'none';
		}
	}
}

// Homepage Featurette Slider, with delayed preloading
function featuretteObj(name,cards,delay,width,imgFolder) {
	if(typeof imgFolder === 'undefined'){
		this.imgFolder = 'featurettes';
	} else {
		this.imgFolder = imgFolder;
	}
	this.name = name;
	this.cards = cards;
	this.viewed = 0;
	this.delay = delay;
	this.current = "x";
	this.active = 0;
	this.x = "";
	this.y = "";
	this.amountSlid = 0;
	this.running = false;
	this.hover = false;
	this.count = cards.length;	
	this.buttons = new Array();
	this.width = width;

	this.init = function() {
		this.name = this.name;
		this.viewed = 0;

		this.x = getObj("cardX");
		this.y = getObj("cardY");
		this.current = "x";
		this.active = 0;
		
		//for(var i = 0;i <= (this.count-1);i++){
			//this.buttons[i] = getObj("febtn_"+i);
		//}

		this.loadCard("y",this.determineNext());
		autoslide = setInterval(this.name+".next()",(this.delay*2));
	}

	this.jump = function(key) {
		try { clearInterval(autoslide); }catch(err){}

		if(this.running == false) {

			this.x = getObj("cardX");
			this.y = getObj("cardY");

			this.running = true;
			this.preset();

			if(this.current == "x") { var slot = "y"; } else { var slot = "x"; }
			if(key >= 0 && key <= (this.count-1)) { var place = key } else { var place = 0}

			this.loadCard(slot,place);
			this.active = place;
			if(this.current == "x") { this.y.style.display = ""; } else { this.x.style.display = ""; }
			slider = setInterval(this.name+".slide()",50);
		}
	}

	this.preset = function() {
		if(this.current == "x"){
			//this.x.style.top = "0px";
			this.x.style.left = "0px";
			this.x.style.zIndex = 5;
			
			//this.y.style.top = ""; //"-239px";
			this.y.style.left = this.width+"px";
			this.y.style.zIndex = 6;
		}
		else {
			//this.y.style.top = "0px";
			this.y.style.left = "0px";
			this.y.style.zIndex = 5;
			
			//this.x.style.top = ""; //"-239px";
			this.x.style.left = this.width+"px";
			this.x.style.zIndex = 6;
		}
		this.amountSlid = 0;
	}

	this.determineNext = function() {
		//console.log('active:'+this.active+',count:'+this.count);
		var projectedNext = (this.active+1)
		if (projectedNext > (this.count-1)) {
			projectedNext = 0;
		}
		return projectedNext;
	}

	this.next = function() {
		if(this.hover == false && this.running == false) {
			clearInterval(autoslide);
			this.running = true;
			this.preset();
			this.active = this.determineNext();
			if(this.current == "x") { this.y.style.display = ""; } else { this.x.style.display = ""; }
			slider = setInterval(this.name+".slide()",50);
		}
	}

	this.loadCard = function(slot,place) {
		if (slot == "y") { var destination = this.y; } else { var destination = this.x; }
				
		destination.href = this.cards[place][2];
		destination.innerHTML = '<span class="data"><span class="title">'+this.cards[place][1]+'</span>'+this.cards[place][3]+'</span>';

		if(this.cards[place][6] == true) {
			destination.style.backgroundImage = 'url(http://images.mmorpg.com/images/'+this.imgFolder+'/'+this.cards[place][0]+'.jpg?c=16)';
		}
	}

	this.pause = function(state) {
		this.hover = state;
	}

	this.slide = function() {
		if(this.running == true) {
			if(this.amountSlid < (this.width-57)) {
				// Deincriment card position
				this.amountSlid = (this.amountSlid + 57);
				if(this.current == "x") {
					this.y.style.left = (this.width - this.amountSlid)+'px';
				}
				else {
					this.x.style.left = (this.width - this.amountSlid)+'px';
				}
			}
			else {
				// Finish slide and preset variables for next go and preload next card
				clearInterval(slider);
				this.amountSlid = 0;
				if(this.current == "x") {
					this.current = "y";
					this.x.style.display = "none";
					this.preset();
					this.loadCard("x",this.determineNext());
				}
				else {
					this.current = "x";
					this.y.style.display = "none";
					this.preset();
					this.loadCard("y",this.determineNext());
				}
				for(x = 0;x <= (7);x++){					
					if(this.active == x) {
					
						getObj("febtn_"+x).setAttribute("className", "current");
						getObj("febtn_"+x).setAttribute("class", "current");
						
						//document.getElementById("febtn_"+x).setAttribute("class", "current");
						//document.getElementById("febtn_"+x).setAttribute("className", "current");
						
						//this.buttons[x].setAttribute("class", "current");
						//this.buttons[x].setAttribute("className", "current");
					}
					else {
						//this.buttons[x].setAttribute("class", "");
						//this.buttons[x].setAttribute("className", "");
						
						//document.getElementById("febtn_"+x).setAttribute("class", "");
						//document.getElementById("febtn_"+x).setAttribute("className", "");
						
						try{
							getObj("febtn_"+x).setAttribute("className", "");
							getObj("febtn_"+x).setAttribute("class", "");
						} catch(err){}
						
					}
				}
				this.running = false;
				autoslide = setInterval(this.name+".next()",this.delay);
			}
		}
	}
}

// Header newsticker
function newsticker(name,id,speed,array,animated) {
	this.name = name; // name
	this.id = id; // Target ID for content
	this.speed = speed; // Number of seconds to hold
	this.array = array; // Entries
	this.delay = 3000; // Default ms time (3 seconds)
	this.animated = animated; // Animation transition
	this.current = 0;
	this.total = 0;
	this.canMove	= true;

	this.init = function() {
		this.delay = switchTime=(this.speed * 1000);
		this.total = array.length;
		this.current=(this.total)-1; // Start on first entry

		if(getCookie("ntcurrent")) {
			this.current = parseInt(getCookie("ntcurrent"));
		}

		this.id = this.getElement(id); // Assign ID
		this.id.innerHTML = this.array[this.current]; // Insert first entry

		autonewstick = setInterval(this.name+".next()",this.delay);
	}

	this.getElement = function(id) {
    if(document.getElementById){
        return document.getElementById(id);
    } else if (document.all){
        return document.all[id];
    } else if (document.layers){
        return document.layers[id];
    }
	}

	this.next = function() {
		this.moving = true;
		clearInterval(autonewstick);
		if(this.current == (this.total - 1)) {
			this.current = 0;
		}
		else {
			this.current = this.current + 1;
		}
		ntslider = setInterval(this.name+".move(1)",50);
	}
	this.previous = function() {
		this.moving = true;
		clearInterval(autonewstick);
		if(this.current == 0) {
			this.current = (this.total - 1);
		}
		else {
			this.current = this.current - 1;
		}
		ntslider = setInterval(this.name+".move(2)",50);
	}
	this.move = function(direction) {
		if(!this.canMove)
			return;

		if(direction == 1) {
			// next
			if(this.animated == false) {
				this.id.innerHTML = this.array[this.current];
				this.moving = false;
				setCookie("ntcurrent",this.current);
			}
			else {
				// animated move transition
			}
		}
		else {
			// previous
			if(this.animated == false) {
				this.id.innerHTML = this.array[this.current];
				this.moving = false;
				setCookie("ntcurrent",this.current);
			}
			else {
				// animated move transition
			}
		}

		if(this.moving == false) {
			clearInterval(ntslider);
			autonewstick = setInterval(this.name+".next()",this.delay);
		}
	}

	this.setCanMove = function(action){
		this.canMove	= action;
	}
}

// Count characters in field
function charcount(field,button,min) {
	var field = getObj(field);
	var button = getObj(button);

	if(field.value.length >= min) {
		button.disabled = false;
	}
	else {
		button.disabled = true;
	}
}

// Fake IE's inability to hover li elements
sfHover = function() {
	sfP = getObj("navigation");
	if(sfP != null) {
		sfC = sfP.getElementsByTagName("li");
		if(sfC != null) {
			for (var i=0; i<sfC.length; i++) {
				sfC[i].onmouseover=function() {
					this.className+=" sfhover";
				}
				sfC[i].onmouseout=function() {
					this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
				}
			}
		}
	}
}

// Append IE6 Fix for hover elements
//if (window.attachEvent) window.attachEvent("onload", sfHover);

// Do nothing
function x() {
	return;
}

// Alternate Gameview Panel Toggle
function gameviewShowDetails(panel,link) {
	var panel = getObj(panel);
	var link = getObj(link);

	if(panel.style.height == '212px') {
		panel.style.height = '40px';
		link.innerHTML = "Show Game Details";
	}
	else {
		panel.style.height = '212px';
		link.innerHTML = "Hide Game Details";
	}
	return;
}

// Detect size of submitted image.
function DetectImageSize(picture,id,maxwidth,maxheight){
	var myImage = new Image();
	myImage.src = picture;

	var x = myImage.width;
	var y = myImage.height;

	if(id != "" && id != false) {
		if(x > maxwidth) {
			// if wider than desired, scale image
			var ratio = x / maxwidth;
			y = y/ratio;
			x = maxwidth;
			getObj(id).title = 'Click to view fullsize version';
		}
		getObj(id).height = y;
		getObj(id).width = x;
	}
	return;
}

// Detect window size.
function getWindowSize() {
	var dimensions = [0,0];
	if( typeof( window.innerWidth ) == 'number' ) { //The good ones!
		dimensions[0] = window.innerWidth;
		dimensions[1] = window.innerHeight;
	} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) { //IE 6+
		dimensions[0] = document.documentElement.clientWidth;
		dimensions[1] = document.documentElement.clientHeight;
	} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) { //IE 4
		dimensions[0] = document.body.clientWidth;
		dimensions[1] = document.body.clientHeight;
	}
	return dimensions;
}

// Get the size of rendered page
function getPageSize() {
	var dimensions = [0,0];
	if( typeof( window.pageYOffset ) == 'number' ) { //Netscape
		dimensions[0] = window.pageXOffset;
		dimensions[1] = window.pageYOffset;
	} else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) { //DOM
		dimensions[0] = document.body.scrollLeft;
		dimensions[1] = document.body.scrollTop;
	} else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) { //IE6
		dimensions[0] = document.documentElement.scrollLeft;
		dimensions[1] = document.documentElement.scrollTop;
	}
	return dimensions;
}

function getPixelHeight(){
	if (self.innerHeight) // all except Explorer
	{
		scnWid = self.innerWidth;
		scnHei = self.innerHeight;
	}
	else if (document.documentElement && document.documentElement.clientHeight)
		// Explorer 6 Strict Mode
	{
		scnWid = document.documentElement.clientWidth;
		scnHei = document.documentElement.clientHeight;
	}
	else if (document.body) // other Explorers
	{
		scnWid = document.body.clientWidth;
		scnHei = document.body.clientHeight;
	}
	var dimensions = [scnWid,scnHei];
	return dimensions

}

/***********************************************
* Tabbed Document Viewer script- � Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var selectedtablink=""
var tcischecked=false

function handlelink(aobject){
	selectedtablink=aobject.href
	tcischecked=(document.tabcontrol && document.tabcontrol.tabcheck.checked)? true : false
	if (document.getElementById && !tcischecked){
		var tabobj=document.getElementById("tablist")
		var tabobjlinks=tabobj.getElementsByTagName("A")
		for (i=0; i<tabobjlinks.length; i++)
		tabobjlinks[i].className=""
		aobject.className="current"
		document.getElementById("tabiframe").src=selectedtablink
		return false
	}
	else
		return true
}

function handleview(){
	tcischecked=document.tabcontrol.tabcheck.checked
	if (document.getElementById && tcischecked){
		if (selectedtablink!="")
		window.location=selectedtablink
	}
}

// Game Jump Bar logic
function fillGameSection(){
	var gameId = document.gqjForm.gameId.options[document.gqjForm.gameId.selectedIndex].value;
	var features = false;
	var reviews = false;
	var hype = false;
	var	ratings	= false;
	var forum	= 0;
	var arrSectionStyle;
	var sBox = document.gqjForm.section;
	var	opt;
	var arrStyles	= new Array();

	sBox.options.length = 0;

	arrStyles[0] = new Object();
	arrStyles[0].style = 'color';
	arrStyles[0].value = 'black';
	addOption2Select(sBox,'Select Section','',arrStyles);

	if(!games[gameId]){
		return;
	}
	else{
		arrSectionStyle	= games[gameId].sectionStyle.split(',');

		if(arrSectionStyle[0] == 1){
			features = true;
		}
		if(arrSectionStyle[1] == 1){
			reviews	= true;
		}

		forum = arrSectionStyle[2];

		switch(arrSectionStyle[3]){
			case '1':
				hype = true;
				break;
			case '2':
				hype = true;
				break;
			case '3':
				ratings = true;
				break;
		}

		//arrStyles[0].value = 'yellow';
		addOption2Select(sBox,'Overview','overview',arrStyles);
		if(reviews){ addOption2Select(sBox,'Reviews','reviews',arrStyles); }
		if(features){ addOption2Select(sBox,'Features','features',arrStyles); }
		if(forum > 0){ addOption2Select(sBox,'Forums','forums',arrStyles); }
		addOption2Select(sBox,'Resources','resources',arrStyles);
		addOption2Select(sBox,' |-- Guides','resources',arrStyles);
		addOption2Select(sBox,' |-- Maps','resources',arrStyles);
		addOption2Select(sBox,'Screenshots','screens',arrStyles);
		addOption2Select(sBox,'News','news',arrStyles);
		if(hype){ addOption2Select(sBox,'Hype-Meter','hype',arrStyles); }
		if(ratings){ addOption2Select(sBox,'Ratings','ratings',arrStyles); }
		addOption2Select(sBox,'Links','links',arrStyles);

	}

	return;

}

function addOption2Select(obj,text,value,arrStyles){
	var opt = new Option(text,value);
	if(arrStyles){
		for(var i=0;i<arrStyles.length;i++){
			opt.style[arrStyles[i].style] = arrStyles[i].value;
		}
	}
	obj.options[obj.options.length] = opt;

	return;
}

// Game Quick Jump Submission
function gqjSubmit(){
	var strLink;
	var gameId = document.gqjForm.gameId.options[document.gqjForm.gameId.selectedIndex].value;
	var section = document.gqjForm.section.options[document.gqjForm.section.selectedIndex].value;
	var arrSectionStyle;

	if(gameId){
		if(section && section != 'forums'){
			strLink = '/gamelist.cfm/gameId/' + gameId + '/setView/' + section;
		}
		else if(section && section == 'forums'){
			arrSectionStyle	= games[gameId].sectionStyle.split(',');
			strLink = '/discussion.cfm/load/forums/loadClass/' + arrSectionStyle[2];
		}
		else{
			strLink = '/gamelist.cfm/gameId/' + gameId;
		}
		location.href = strLink;
	}
}

// Create the mailTo for an email href
function writeEmailAddress(obj,user,domain,args){
	var rVal = user + '@' + domain;
	rVal += args != '' ? '?' + args : '';

	obj.href	= 'mailTo:' + rVal;
}

// Write email as string
function writeEmailString(user,domain){
	document.write(user+'@'+domain);
}

// Change the className of an obj
function changeClass(obj,newClass){
	obj.className	= newClass;
}


// Switch an objects vis; Same as toggle
function switchVis(elem){
	var obj	= getObj(elem);

	if(obj.style.display == 'none'){
		obj.style.display = '';
	}
	else{
		obj.style.display = 'none';
	}
}

// Switch an elements text
function switchText(elem,str1,str2){
	var obj	= getObj(elem);

	if(obj.innerHTML == str1){
		obj.innerHTML	= str2;
	}
	else{
		obj.innerHTML	= str1;
	}
}

function doNothing(){
	// Thanks for all the fish
}

// Return the path to the current template with the option of changing the delimiter
function GetAPath(delim){
	var tDelim = '/';
	var iArr, result;
	var result = '';
	if(delim)
		tDelim = delim;

	iArr = window.location.pathname.split('/');

	for(var i=0;i<iArr.length-1;i++){
		result += iArr[i] + tDelim;
	}

	return result;
}

// Launch function for the libsyn flash player
function launch(page){
	OpenWin = this.open(page, "LibsynPlayer", "toolbar=no,menubar=no,location=no,status=no,scrollbars=no,resizable=yes,width=195,height=75");
}

// The code below contains functions that run active content. The functions
// assemble an OBJECT/EMBED tag string, and then perform a document.write of
// this string in the calling html document.
//   AC_RunFlContent() - build tags to display Flash content.
//   AC_RunFlContentX() - build XHTML formatted tags to display Flash content.
//   AC_RunSWContent() - build tags to display Shockwave content.
//   AC_RunSWContentX()  - build XHTML formatted tags to display Shockwave content.
//
// To call one of these functions, pass all the attributes and values that you would
// otherwise specify for the object, param, and embed tags in the following form:
//   AC_RunFlContent(
//     "attrName1", "attrValue1"
//     "attrName2", "attrValue2"
//     ...
//     "attrNamen", "attrValuen"
//   )
//
// When passing in the src or movie attributes, do not include the file extension.
// Note, these functions use default values for several standard tag attributes,
// including classid, codebase, pluginsPage, and mimeType, depending on the function
// you call. So, you should not pass in values for these attributes. If you require
// an alternate values for these attributes, you'll need to modify the default values
// used in the 'Run' function implementations below. However, you may pass in an
// alternate version for the codebase value, as in AC_RunFlContent("codebase","6,0,0,0",...).
// Note that you should only pass in the version string rather than the full
// codebase URL.
//
// You must include AC_RunActiveContent.js for these functions to work.

function AC_RunFlContent()
{
  // First, look for a "movie" and "src" params, and if either exists, add a ".swf" to the end
  // if it doesn't already have one (this function will only run swf files)
  AC_AddExtension(arguments, "movie", ".swf");
  AC_AddExtension(arguments, "src", ".swf");

  // Build the codebase value. If user passed in a version for the codebase, add the version
  // to the base codebase url. Otherwise, use the default version.
  var codebase = AC_GetCodebase
                 (  "http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version="
                  , "7,0,0,0", arguments
                 );

  AC_GenerateObj
  (  "AC_RunFlContent()", false, "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
   , codebase
   , "http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"
   , "application/x-shockwave-flash", arguments
  );
}

function AC_RunFlContentX()
{
  // First, look for a "movie" and "src" params, and if either exists, add a ".swf" to the end
  // if it doesn't already have one (this function will only run swf files)
  AC_AddExtension(arguments, "movie", ".swf");
  AC_AddExtension(arguments, "src", ".swf");

  // Build the codebase value. If user passed in a version for the codebase, add the version
  // to the base codebase url. Otherwise, use the default version.
  var codebase = AC_GetCodebase
                 (  "http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version="
                  , "7,0,0,0", arguments
                 );

  AC_GenerateObj
  (  "AC_RunFlContentX()", true, "clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
   , codebase
   , "http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"
   , "application/x-shockwave-flash", arguments
  );
}

function AC_RunSWContent()
{
  // First, look for a "src" param, and if it exists, add a ".dcr" to the end
  // if it doesn't already have one (this function will only run dcr files)
  AC_AddExtension(arguments, "src", ".dcr");

  // Build the codebase value. If user passed in a version for the codebase, add the version
  // to the base codebase url. Otherwise, use the default version.
  var codebase = AC_GetCodebase
                 (  "http://fpdownload.macromedia.com/pub/shockwave/cabs/director/sw.cab#version="
                  , "8,5,0,0", arguments
                 );

  AC_GenerateObj
  (  "AC_RunSWContent()", false, "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
   , codebase
   , "http://www.macromedia.com/shockwave/download/", null, arguments
  );
}

function AC_RunSWContentX()
{
  // First, look for a "src" param, and if it exists, add a ".dcr" to the end
  // if it doesn't already have one (this function will only run dcr files)
  AC_AddExtension(arguments, "src", ".dcr");

  // Build the codebase value. If user passed in a version for the codebase, add the version
  // to the base codebase url. Otherwise, use the default version.
  var codebase = AC_GetCodebase
                 (  "http://fpdownload.macromedia.com/pub/shockwave/cabs/director/sw.cab#version="
                  , "8,5,0,0", arguments
                 );

  AC_GenerateObj
  (  "AC_RunSWContentX()", true, "clsid:166B1BCA-3F9C-11CF-8075-444553540000"
   , codebase
   , "http://www.macromedia.com/shockwave/download/", null, arguments
  );
}

// Implements AC_GenerateObj() function. This is a generic function used to generate
// object/embed/param tags. It is used by higher level api functions.

/************** LOCALIZABLE GLOBAL VARIABLES ****************/

var MSG_EvenArgs = 'The %s function requires an even number of arguments.'
                 + '\nArguments should be in the form "atttributeName","attributeValue",...';
var MSG_SrcRequired = "The %s function requires that a movie src be passed in as one of the arguments.";

/******************** END LOCALIZABLE **********************/

// Finds a parameter with the name paramName, and checks to see if it has the
// passed extension. If it doesn't have it, this function adds the extension.
function AC_AddExtension(args, paramName, extension)
{
  var currArg, paramVal, queryStr, endStr;
  for (var i=0; i < args.length; i=i+2){
    currArg = args[i].toLowerCase();
    if (currArg == paramName.toLowerCase() && args.length > i+1) {
      paramVal = args[i+1];
      queryStr = "";

      // Pull off the query string if it exists.
      var indQueryStr = args[i+1].indexOf('?');
      if (indQueryStr != -1){
        paramVal = args[i+1].substring(0, indQueryStr);
        queryStr = args[i+1].substr(indQueryStr);
      }

      endStr = "";
      if (paramVal.length > extension.length)
        endStr = paramVal.substr(paramVal.length - extension.length);
      if (endStr.toLowerCase() != extension.toLowerCase()) {
        // Extension doesn't exist, add it
        args[i+1] = paramVal + extension + queryStr;
      }
    }
  }
}

// Builds the codebase value to use. If the 'codebase' parameter is found in the args,
// uses its value as the version for the baseURL. If 'codebase' is not found in the args,
// uses the defaultVersion.
function AC_GetCodebase(baseURL, defaultVersion, args)
{
  var codebase = baseURL + defaultVersion;
  for (var i=0; i < args.length; i=i+2) {
    currArg = args[i].toLowerCase();
    if (currArg == "codebase" && args.length > i+1) {
      if (args[i+1].indexOf("http://") == 0) {
        // User passed in a full codebase, so use it.
        codebase = args[i+1];
      }
      else {
        codebase = baseURL + args[i+1];
      }
    }
  }

  return codebase;
}

// Substitutes values for %s in a string.
// Usage: AC_sprintf("The %s function requires %s arguments.","foo()","4");
function AC_sprintf(str){
  for (var i=1; i < arguments.length; i++){
    str = str.replace(/%s/,arguments[i]);
  }
  return str;
}

// Checks that args, the argument list to check, has an even number of
// arguments. Alerts the user if an odd number of arguments is found.
function AC_checkArgs(args,callingFn){
  var retVal = true;
  // If number of arguments isn't even, show a warning and return false.
  if (parseFloat(args.length/2) != parseInt(args.length/2)){
    alert(sprintf(MSG_EvenArgs,callingFn));
    retVal = false;
  }
  return retVal;
}

function AC_GenerateObj(callingFn, useXHTML, classid, codebase, pluginsPage, mimeType, args){

  if (!AC_checkArgs(args,callingFn)){
    return;
  }

  // Initialize variables
  var tagStr = '';
  var currArg = '';
  var closer = (useXHTML) ? '/>' : '>';
  var srcFound = false;
  var embedStr = '<embed';
  var paramStr = '';
  var embedNameAttr = '';
  var objStr = '<object classid="' + classid + '" codebase="' + codebase + '"';

  // Spin through all the argument pairs, assigning attributes and values to the object,
  // param, and embed tags as appropriate.
  for (var i=0; i < args.length; i=i+2){
    currArg = args[i].toLowerCase();

    if (currArg == "src"){
      if (callingFn.indexOf("RunSW") != -1){
        paramStr += '<param name="' + args[i] + '" value="' + args[i+1] + '"' + closer + '\n';
        embedStr += ' ' + args[i] + '="' + args[i+1] + '"';
        srcFound = true;
      }
      else if (!srcFound){
        paramStr += '<param name="movie" value="' + args[i+1] + '"' + closer + '\n';
        embedStr += ' ' + args[i] + '="' + args[i+1] + '"';
        srcFound = true;
      }
    }
    else if (currArg == "movie"){
      if (!srcFound){
        paramStr += '<param name="' + args[i] + '" value="' + args[i+1] + '"' + closer + '\n';
        embedStr += ' src="' + args[i+1] + '"';
        srcFound = true;
      }
    }
    else if (   currArg == "width"
              || currArg == "height"
              || currArg == "align"
              || currArg == "vspace"
              || currArg == "hspace"
              || currArg == "class"
              || currArg == "title"
              || currArg == "accesskey"
              || currArg == "tabindex"){
      objStr += ' ' + args[i] + '="' + args[i+1] + '"';
      embedStr += ' ' + args[i] + '="' + args[i+1] + '"';
    }
    else if (currArg == "id"){
      objStr += ' ' + args[i] + '="' + args[i+1] + '"';
      // Only add the name attribute to the embed tag if a name attribute
      // isn't already there. This is what Dreamweaver does if the user
      // enters a name for a movie in the PI: it adds id to the object
      // tag, and name to the embed tag.
      if (embedNameAttr == "")
        embedNameAttr = ' name="' + args[i+1] + '"';
    }
    else if (currArg == "name"){
      objStr += ' ' + args[i] + '="' + args[i+1] + '"';
      // Replace the current embed tag name attribute with the one passed in.
      embedNameAttr = ' ' + args[i] + '="' + args[i+1] + '"';
    }
    else if (currArg == "codebase"){
      // The codebase parameter has already been handled, so ignore it.
    }
    // This is an attribute we don't know about. Assume that we should add it to the
    // param and embed strings.
    else{
      paramStr += '<param name="' + args[i] + '" value="' + args[i+1] + '"' + closer + '\n';
      embedStr += ' ' + args[i] + '="' + args[i+1] + '"';
    }
  }

  // Tell the user that a movie/src is required, if one was not passed in.
  if (!srcFound){
    alert(AC_sprintf(MSG_SrcRequired,callingFn));
    return;
  }

  if (embedNameAttr)
    embedStr += embedNameAttr;
  if (pluginsPage)
    embedStr += ' pluginspage="' + pluginsPage + '"';
  if (mimeType)
    embedStr += ' type="' + mimeType + '"';

  // Close off the object and embed strings
  objStr += '>\n';
  embedStr += '></embed>\n';

  // Assemble the three tag strings into a single string.
  tagStr = objStr + paramStr + embedStr + "</object>\n";

  document.write(tagStr);
}

function embed(tag){
    // msoft activex controls no longer start up 'activated' after april 11/06 (require focus to activate)
    // workaround requires object/embed tags to be included in external js
    // hence this func... sb
    // note: if 'allow script debugging' is *not* checked in ie settings, you will still get the activiation prompt!
    document.write(tag);
}

// count and trim character input into a field and display the characters left
function doCountInputCharacters(inputFld,msgFld,maxLimit){
	if (inputFld.value.length > maxLimit) {// if too long...trim it!
		inputFld.value = inputFld.value.substring(0, maxLimit);
	}
	else { // otherwise, update 'characters left' counter
		getObj(msgFld).innerHTML	= maxLimit - inputFld.value.length;
	}
}

function parseUri (str) {
	var	o   = parseUri.options,
		m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
		uri = {},
		i   = 14;

	while (i--) uri[o.key[i]] = m[i] || "";

	uri[o.q.name] = {};
	uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
		if ($1) uri[o.q.name][$1] = $2;
	});

	return uri;
};

parseUri.options = {
	strictMode: false,
	key: ["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],
	q:   {
		name:   "queryKey",
		parser: /(?:^|&)([^&=]*)=?([^&]*)/g
	},
	parser: {
		strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
		loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
	}
};

// Inline image viewer
function ccbox(name) {
	this.name = name;
	this.originalCaption = "";
	this.originalWidth = 0;
	this.originalHeight = 0;
	this.originalImage = "";
	this.originalPath = "";
	this.currentWidth = 0;
	this.currentHeight = 0;
	this.loadingImage = null;
	this.fullPath = "";
	this.adcontent = "";
	this.type = "";
	this.useAlpha = 0;

	// Startup ccbox, but hey, what's there to start anyway?
	this.init = function() {
		this.originalCaption = "";
		this.originalPath = "";
		this.originalWidth = 0;
		this.originalHeight = 0;
		this.useAlpha = 0;
	}

	// Get this size of an image
	this.imageSize = function(url) {
		var myImage = new Image();
		myImage.src = url;
		var dimensions = [myImage.width,myImage.height];
		return dimensions;
	}

	// Get the window viewport size
	this.windowSize = function() {
		var dimensions = [0,0];
		if( typeof( window.innerWidth ) == 'number' ) { //The good ones!
			dimensions[0] = window.innerWidth;
			dimensions[1] = window.innerHeight;
		} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) { //IE 6+
			dimensions[0] = document.documentElement.clientWidth;
			dimensions[1] = document.documentElement.clientHeight;
		} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) { //IE 4
			dimensions[0] = document.body.clientWidth;
			dimensions[1] = document.body.clientHeight;
		}
		return dimensions;
	}

	// Get the size of the page
	this.pageSize = function() {
		var dimensions = [0,0];
		if( typeof( window.pageYOffset ) == 'number' ) { //Netscape
			dimensions[0] = window.pageXOffset;
			dimensions[1] = window.pageYOffset;
		} else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) { //DOM
			dimensions[0] = document.body.scrollLeft;
			dimensions[1] = document.body.scrollTop;
		} else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) { //IE6
			dimensions[0] = document.documentElement.scrollLeft;
			dimensions[1] = document.documentElement.scrollTop;
		}
		return dimensions;
	}

	// Replace all instances of a given string with another string in a string.
	this.replaceAll = function replaceAll( str, from, to ) {
	    var idx = str.indexOf( from );
	    while ( idx > -1 ) {
	        str = str.replace( from, to );
	        idx = str.indexOf( from );
	    }
	    return str;
	}

	// Close any existing ccboxes
	this.close = function() {
		var existing = getObj('ccbox');
		if (existing != null) { window.document.body.removeChild(existing); }
		//shadowBackdrop(0);
	}

	// Create new ccbox
	this.start = function(url) {
		var debug = false;
		var width = 0;
		var height = 0;
		var image = "";
		var caption = "";
		var path = "";
		var medium = false;
		var type = "feature";
		var id = 0;
		var cb = "";
		var show = "";
		var a = 1;
		var proceed = false;

		try {
			// Check for existing ccbox
			var existing = getObj('ccbox');
			if (existing != null) { window.document.body.removeChild(existing);}

			if(url.indexOf("|") != -1) {
				// Get data via alternate method
				var arguments = (new String(url)).split('|');
				for (i in arguments) {
					var keys = arguments[i].split('=');
					//alert(keys[0]+'-->'+keys[1]);
					if(keys[0] == "width") { width = parseInt(keys[1]); this.originalWidth = width; }
					else if(keys[0] == "height") { height = parseInt(keys[1]); this.originalHeight = height;}
					else if(keys[0] == "image") { image = keys[1]; this.originalImage = image; }
					else if(keys[0] == "path") { path = keys[1]; this.originalPath = path; }
					else if(keys[0] == "type") { type = keys[1]; }
					else if(keys[0] == "pixsy") { type = "pixsy"; value = keys[1]; this.type = "pixsy"; }
					else if(keys[0] == "cb") { cb = "?"+keys[1]; }
					else if(keys[0] == "show") { show = keys[1]; }
					else if(keys[0] == "a") { a = keys[1]; }
					else if(keys[0] == "id") { id = keys[1]; }
					else if(keys[0] == "caption") {
						caption = keys[1];
						caption = this.replaceAll(caption,"%20"," ");
						this.originalCaption = caption+"<br>";
					}
					
				}
			}
			else {
				var temp = new String(url);
				var thistest = parseUri('http://www.domain.com'+temp);arguments = thistest.query.split('&');
				for ( i = 0; i < arguments.length; i++ ) {
					keys = arguments[i].split('=');
					//alert(keys[0]+'-->'+keys[1]);
					
					if(keys[0] == "width") { width = parseInt(keys[1]); this.originalWidth = width; }
					else if(keys[0] == "height") { height = parseInt(keys[1]); this.originalHeight = height;}
					else if(keys[0] == "image") { image = keys[1]; this.originalImage = image; }
					else if(keys[0] == "path") { path = keys[1]; this.originalPath = path; }
					else if(keys[0] == "type") { type = keys[1]; }
					else if(keys[0] == "cb") { cb = "?"+keys[1]; }
					else if(keys[0] == "show") { show = keys[1]; }
					else if(keys[0] == "a") { a = keys[1]; }
					else if(keys[0] == "id") { id = keys[1]; }
					else if(keys[0] = "caption") {
						caption = keys[1];
						caption = this.replaceAll(caption,"%20"," ");
						this.originalCaption = caption+"<br>";
					}
				}
			}

			var urchinurl = "";

			if(show != "" && path != ""){
				realurl = "http://images.mmorpg.com/"+path+"/"+image+cb;
				urchinurl = path+"/"+image+cb;
			}
			else{
				if(path != "") {
					realurl = "http://images.mmorpg.com/"+path+"/"+image+cb;
					urchinurl = path+"/"+image+cb;
				}
				else {
					if(type == "review") {
						realurl = "http://images.mmorpg.com/reviews/"+id+"/images/"+image+cb;
						urchinurl = "reviews/"+id+"/images/"+image+cb;
					}
					else if (type == "newsimages") {
						realurl = "http://images.mmorpg.com/images/newsimages/"+id+"/"+image+cb;
						urchinurl = "images/newsimages/"+id+"/"+image+cb;
					}
					else if (type == "pixsy"){
						realurl = "";
						urchinurl = "";
					}
					else if (type == "screens") {
						realurl = "http://images.mmorpg.com/images/screenshots/"+image+cb;
						urchinurl = "images/screenshots/"+image+cb;
					}
					else if (type == "youtube") {
						realurl = image;
						urchinurl = "youtube/embed/"+image;
					}
					else {
						realurl = "http://images.mmorpg.com/features/"+id+"/images/"+image+cb;
						urchinurl = "features/"+id+"/images/"+image+cb;
					}
				}
			}
			
			if(type != "pixsy"){
				// If no width and height, attempt to fetch
				this.loadingImage = new Image();
				this.loadingImage.src = realurl;
	
				//var dimensions = [myImage.width,myImage.height];
				
				//alert("w:"+width+"h:"+height);
				
				if(width == 0 || height == 0) {
					width = this.loadingImage.width;
					height = this.loadingImage.height;
				}
	
				// If still no width, height, or image then bail!
				
				// FF4 died here
				
				if(image == "" || width==0 || height==0 ) { return true; }
	
				this.fullPath = realurl;
	
				// Tracking
				
				try{
					//urchinTracker('zoombox/image/'+urchinurl);
					_gaq.push(['_trackPageview', 'zoombox/image/'+urchinurl]);
				} catch(err){
					//Boo!
				}
			}

			// Get viewport data
			var viewport = this.windowSize();
			var scrollport = this.pageSize();
			
			if(width <= 750){
				nwidth = 750;
			}
			else {
				nwidth = width;
			}

			// Get center of visible page
			var xpos = ((viewport[0]/2)-(nwidth/2)-62)+scrollport[0]+30;
			var ypos = ((viewport[1]/2)-(height/2)-60)+scrollport[1]-30;

			// Prevent placement on left side
			if(ypos < 10) { ypos = 10; }
			if(xpos < 10) { xpos = 10; }

			// Determine if there is enough viewport space to show this image
			if(type != "pixsy"){
				if(width > (viewport[0]-80) && (viewport[0]-80) > 750) {
					var newWidth = viewport[0]-60;
					height = (height * (newWidth / width));
					medium = true;
					var temp_widthAmount = parseInt((newWidth / width)*100);
					caption = caption +" <b>Scaled ("+temp_widthAmount+"%)</b> - <a href='"+zoombox.fullPath+"' target='_blank'>View fullsize in new window</a><br>";
					width = newWidth;
				}
				else{
					if(width >= 750 && (viewport[0]-80) <= 750){
						height = (height*(690/width));
						medium = true;
						var temp_widthAmount = parseInt((690/width)*100);
						caption = caption +" <b>Scaled ("+temp_widthAmount+"%)</b> - <a href='"+zoombox.fullPath+"' target='_blank'>View fullsize in new window</a><br>";
						width = 690;
					}
				}
			}

			// Create frame
			var ccBox = document.createElement('div');
			ccBox.setAttribute('id','ccbox');
			
			var framer = "";
			if(this.useAlpha == 1){
				framer = '<div class="frame alpha">';	
				var thirtyTwoOpen = '<table cellspacing="0" cellpadding="0" border="0" class="t3x3"><tr><td class="r1c1"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_LT.png" width="20" height="20" border="0" alt="" /></td><td class="r1c2" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_TM.png) repeat-x top left; width:'+width+'px;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r1c3"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_RT.png" width="20" height="20" border="0" alt="" /></td></tr><tr><td class="r2c1" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_LM.png) repeat-y top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r2c2" style="width:'+nwidth+';">';
				var thirtyTwoClos = '</td><td class="r2c3" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_RM.png) repeat-y top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td></tr><tr><td class="r3c1"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_LB.png" width="20" height="20" border="0" alt="" /></td><td class="r3c2" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_BM.png) repeat-x top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r3c3"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_RB.png" width="20" height="20" border="0" alt="" /></td></tr></table>';
			}
			else {
				framer = '<div class="frame">';
				var thirtyTwoOpen = '<table cellspacing="0" cellpadding="0" border="0" class="t3x3"><tr><td class="r1c1"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_LT.gif" width="20" height="20" border="0" alt="" /></td><td class="r1c2" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_TM.gif) repeat-x top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r1c3"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_RT.gif" width="20" height="20" border="0" alt="" /></td></tr><tr><td class="r2c1" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_LM.gif) repeat-y top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r2c2" style="width:'+nwidth+';">';
				var thirtyTwoClos = '</td><td class="r2c3" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_RM.gif) repeat-y top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td></tr><tr><td class="r3c1"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_LB.gif" width="20" height="20" border="0" alt="" /></td><td class="r3c2" style="background:transparent url(http://images.mmorpg.com/images/themes/radiance/item_zoombox_BM.gif) repeat-x top left;"><img src="http://images.mmorpg.com/images/themes/radiance/blank.gif" width="20" height="20" border="0" alt="" /></td><td class="r3c3"><img src="http://images.mmorpg.com/images/themes/radiance/item_zoombox_RB.gif" width="20" height="20" border="0" alt="" /></td></tr></table>';
			}
						
			// Apply independant styles
			if((parseInt(width)+62) < 770) {
				ccBox.style.width = '780px';
			}else {
				ccBox.style.width = (width+62)+'px'; // I hate myself for this!
			}
			ccBox.style.height = height+'px';
			ccBox.style.position = 'absolute';
			ccBox.style.left = xpos+'px';
			ccBox.style.top = ypos+'px';
			ccBox.style.display = 'block';
			ccBox.style.color = '#FFF';
			ccBox.style.zIndex = '9999';

			if(show != "single" && type != "pixsy"){ var actions = '<a href="'+url+'">Permalink</a>&nbsp;|&nbsp;<a href="'+url+'">View</a> in detailed image viewer'; } else { var actions = '&nbsp;'; }
			
			// Load image and content into frame, going to do this the quick and dirty inner way
			if(type != "pixsy"){
			
				var contentActual = "";
				if(type == "youtube"){
					contentActual = '<iframe width="'+width+'" height="'+height+'" src="http://www.youtube.com/embed/'+realurl+'?autoplay=1" frameborder="0" allowfullscreen></iframe>';
				}
				else {
					contentActual = '<img id="ccBoxImage" src="'+realurl+'" width="'+width+'" height="'+height+'" />';
				}
			
				ccBox.innerHTML = framer+thirtyTwoOpen+'<div class="top"><div class="inner">Quick Image Viewer</div></div><div class="ad" id="ccBoxAd">'+this.adcontent+'</div><div class="image" onclick="zoombox.close(this);" style="min-width:730px; background-position:'+(width/2)+'px '+(height/2)+'px;">'+contentActual+'<div id="ccBoxWaiting" style="width:'+width+'px; height:'+height+'px;"></div></div><div class="info"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td colspan="2" id="ccBoxCaption">'+caption+'</td></tr><tr><td width="80%" align="left">'+actions+'</td><td width="20%" align="right" nowrap><a href="" onclick="zoombox.close(this); return false;">Close</a></td></tr></table><div class="clear"></div></div>'+thirtyTwoClos+'</div>';
			}
			else {
				if(window.pixsyArray[value] != ""){
					xwidth = nwidth+8;;// + 8;
					xheight = height;//+100;
					ccBox.innerHTML = framer+thirtyTwoOpen+'<div class="top"><div class="inner">Pixsy Video Viewer</div></div><div class="ad" id="ccBoxAd">'+this.adcontent+'</div><div class="image" onclick="" style="display:block; background-position:'+(width/2)+'px '+(height/2)+'px; height='+xheight+'; height:auto; width='+xwidth+';">'+pixsyArray[value]+'<div style="clear:both;"></div></div><div class="info"><table width="100%" cellpadding="0" cellspacing="0" border="0"><tr><td colspan="2" id="ccBoxCaption" style="text-align:center;font-size:1.2em;"><strong>'+caption+'</strong></td></tr><tr><td width="80%" align="left">'+actions+'</td><td width="20%" align="right" nowrap><a href="" onclick="zoombox.close(this); return false;">Close</a></td></tr></table><div class="clear"></div></div>'+thirtyTwoClos+'</div>';
				}			
			}

			// Add frame to site
			window.document.body.appendChild(ccBox);
			//shadowBackdrop(1);

			// Store current data
			this.currentWidth = width;
			if((parseInt(width)+62) < 770) {
				this.currentWidth = 780;
				//zoombox.originalWidth = 780;
			}
			this.currentHeight = height;

			if(a != 0){
				// Fetch leaderboard ad
				this.adcontent = "";
				//var params = new Object();
				//http('post','/ajax/tools.cfc?method=fetchZoomboxAd',this.adCallback,params);

				var adframe = getObj('ccBoxAd');
				adiframe = document.createElement('iframe')
				adiframe.src = "/inc_ad_frame.cfm?hidedump=true"
				adiframe.setAttribute('frameborder','0');
				adiframe.setAttribute('id','adiframe');
				adiframe.frameBorder = 0;
				adframe.appendChild(adiframe)
			}

			// Set image checker to look for completed image load
			ccBoxTimer = setInterval("zoombox.check()", 100);
			
			return false;

		} catch(e) {
			//alert("Error was"+e)
		}
		return false;
	}

	this.adCallback = function(result){
		var existing = getObj('ccbox');
		if (existing != null) {
			//var hasLookup = result.indexOf("stringHere");
			//if(hasLookup > -1) {	}
			getObj('ccBoxAd').innerHTML = result;
		}
	}

	this.check = function() {
		try {
			if(this.loadingImage.complete) {
				this.loadingImage = null;
				clearInterval(ccBoxTimer);
				getObj('ccBoxWaiting').style.display = 'none';
			}
		} catch(e) {}
	}

	// Update existing ccbox on window.resize
	// Since this is being called by window.update, the this.name do not work, going to call hard
	this.update = function() {
	/*
		var ccBox = getObj('ccbox');
		if (ccBox != null && this.type != "pixsy") {
		
			// Get viewport data
			var viewport = zoombox.windowSize();
			var scrollport = zoombox.pageSize();

			// Get center of visible page
			var xpos = ((viewport[0]/2)-(zoombox.originalWidth/2)-62)+scrollport[0]+30;
			var ypos = ((viewport[1]/2)-(zoombox.originalHeight/2)-60)+scrollport[1]-30;

			// Prevent placement on left side or above top
			if(ypos < 10) { ypos = 10; }
			if(xpos < 10) { xpos = 10; }
			
			//alert(ccBox.style.width);
		}
		
	

			// Determine if there is enough viewport space to show this image
			if(zoombox.originalWidth > (viewport[0]-60)) { // CHANGE
				if((viewport[0]-40) > 790 ){
					var newWidth = viewport[0]-100;
					var height = (zoombox.originalHeight * (newWidth / zoombox.originalWidth));
					var width = newWidth;
					var percentageWidth = parseInt((newWidth / zoombox.originalWidth)*100);
					getObj('ccBoxCaption').innerHTML = zoombox.originalCaption +" <b>Scaled ("+percentageWidth+"%)</b> - <a href='"+zoombox.fullPath+"'>View fullsize in new window</a>";
				}
				else {
					var newWidth = 750;
					var height = (zoombox.originalHeight * (newWidth / zoombox.originalWidth));
					var width = newWidth;
					var percentageWidth = parseInt((newWidth / zoombox.originalWidth)*100);
					getObj('ccBoxCaption').innerHTML = zoombox.originalCaption +" <b>Scaled ("+percentageWidth+"%)</b> - <a href='"+zoombox.fullPath+"'>View fullsize in new window</a>";
				}
			}
			else {
				var width = zoombox.originalWidth;
				var height = zoombox.originalHeight;

				if(zoombox.currentWidth != zoombox.originalWidth) {
					getObj('ccBoxCaption').innerHTML = zoombox.originalCaption;
				}
			}

			ccBox.style.left = xpos+'px';
			ccBox.style.top = ypos+'px';
			//ccBox.childNodes[0].childNodes[1].style.backgroundImage = 'url(none)';

			if(zoombox.currentWidth != width) {
				if(width > 700){
					ccBox.style.width = (width+22)+'px'; // I hate myself for this!
					ccBox.style.height = height+'px';
	
					var ccBoxImage = getObj('ccBoxImage');
					if (ccBoxImage != null) {
						ccBoxImage.width = width;
						ccBoxImage.height = height;
					}
				}
				else {
					ccBox.style.width = (722)+'px'; // I hate myself for this!
					ccBox.style.height = height+'px';
					var ccBoxImage = getObj('ccBoxImage');
					if (ccBoxImage != null) {
						ccBoxImage.width = width;
						ccBoxImage.height = height;
					}
				}
			}

			// Store updated values
			zoombox.currentWidth = width;
			zoombox.currentHeight = height;

		}
		*/
	}

	// Animate the image zooming from the thumbnail
	this.zoomin = function() {
		// Nothing for now, who wants to wait?
	}
	
	// Set transparency level
	this.setAlpha = function(canIt) {
		if(parseInt(canIt) == 1){
			this.useAlpha = 1;
		}
	}

	this.getname = function() {
		return this.name;
	}
}

zoombox = new ccbox('zoombox'); // zoombox
// Look for any zoom rels, and add the onclick event
function checkForZoom() {
	if (!document.getElementsByTagName){ return; }
	var anchors = document.getElementsByTagName('a');
	for (var i=0; i<anchors.length; i++){
		var anchor = anchors[i];
		if (anchor.getAttribute('href') && String(anchor.getAttribute('rel')) == 'zoom') {
			//anchor.onclick = "zoombox.start('"+anchor.href+"'); return false;";
			anchor.onclick = function() {zoombox.start(this); return false;}
		}
	}
}

function pausejs(milliseconds) {
	var dt = new Date();
	while ((new Date()) - dt <= milliseconds) { /* Do nothing */ }
}

function buildGalleryWidget(content){
	var ugbox = document.createElement('div');
	ugbox.setAttribute('id','ugbox');

	// Get viewport data
	var viewport = getWindowSize();
	var scrollport = getPageSize();

	// Get center of visible page
	var xpos = ((viewport[0]/2)-230)+scrollport[0]
	var ypos = ((viewport[1]/2)-180)+scrollport[1]

	// Prevent placement on left side
	if(ypos < 10) { ypos = 10; }
	if(xpos < 10) { xpos = 10; }

	ugbox.style.width = '500px'; // I hate myself for this!
	ugbox.style.height = '400px';
	ugbox.style.position = 'absolute';
	ugbox.style.left = xpos+'px';
	ugbox.style.top = ypos+'px';
	ugbox.style.display = 'block';
	ugbox.style.color = 'white';
	ugbox.style.zIndex = '9999';

	ugbox.innerHTML = '<div class="top"><div class="inner">Quick Photo Picker</div></div>'+content;

	// Add frame to site
	window.document.body.appendChild(ugbox);
}

// FAVORITE GAME STUFF
function rebuildFavGameList(){
	var params = new Object();
	http('post','/ajax/tools.cfc?method=getFavoriteGames',rebuildFavGamelistCallback,params);
}

function rebuildFavGamelistCallback(resultquery){
	var target = getObj('favgameinside');

	if(target != null){
		if(resultquery.getRowCount() > 0) {
			var holdIt = '';
			for(var i=0;i<resultquery.getRowCount();i++){
				var gameId = resultquery.getField(i,'gameId');
				var title = resultquery.getField(i,'title');
				var category = resultquery.getField(i,'category');

				holdIt += '<div><a href="##" onclick="removeGameToFavorites('+gameId+'); return false;" class="rem">Remove</a><a href="/gamelist.cfm/game/'+gameId+'" class="icon"><img src="http://images.mmorpg.com/images/games/logos/tiny/'+gameId+'_32.gif" width="26" height="26" border="0" /></a><span><a href="/gamelist.cfm/game/'+gameId+'" class="titl">'+title+'</a><br /><a href="/gamelist.cfm/game/'+gameId+'/view/features">Articles</a>, <a href="/newsroom.cfm/game/'+gameId+'">News</a>, <a href="/discussion2.cfm/category/'+category+'">Forum</a></span></div>';
			}
			target.innerHTML = '<div class="tifavs">'+holdIt+'<div class="clear"></div></div>';
		}
		else {
			target.innerHTML = '<div class="nofavs"><span>No Favorite Games</span>You can add games to your favorite list from the gamelist, forums, or right here:</div>';
		}
	}
}

function addGameToFavorites(gameId){
	var thisGameId = parseInt(gameId);
	//alert("add->"+thisGameId);
	if(thisGameId > 0){
		var params = new Object();

		params['gameId'] = thisGameId;

		http('post','/ajax/tools.cfc?method=addGameToFavorites',addGameCallback,params);
	}
	return false;
}

function addGameCallback(result){
	//
	//alert(result);
	
	var newresponse = parseInt(result.substring(2,(result.length-2)));
	if(newresponse > 0){
		rebuildFavGameList();
		updateNewsGameLinkr("rm",newresponse);
		updateGameHeaderLink("rm",newresponse);
	}
	return false;
}

function removeGameToFavorites(gameId){
	var thisGameId = parseInt(gameId);
	//alert("remove->"+thisGameId);
	if(thisGameId > 0){
		var params = new Object();
		params['gameId'] = thisGameId;

		http('post','/ajax/tools.cfc?method=removeGameFromFavorites',removeGameCallback,params);
	}
	return false;
}

function removeGameCallback(result){
	//
	//alert(result);
	
	var newresponse = parseInt(result.substring(2,(result.length-2)));
	if(newresponse > 0){
		rebuildFavGameList();
		updateNewsGameLinkr("add",newresponse);
		updateGameHeaderLink("add",newresponse);
	}
	return false;
}

function updateGameHeaderLink(isnow,gameId){
	var target = getObj('gvaddrmlink');
	if(target != null){
		// Change class,onlick,text
		if(isnow == "add"){
			target.onclick = function() { addGameToFavorites(gameId); return false; };
			target.setAttribute("className", "addv");
			target.setAttribute("class", "addv");
			target.innerHTML = "Add to favorites";
		}
		else {
			target.onclick = function() { removeGameToFavorites(gameId); return false; };
			target.setAttribute("className", "remv");
			target.setAttribute("class", "remv");
			target.innerHTML = "Remove from favorites";
		}
	}
}

function updateNewsGameLinkr(isnowr,gameIdr){
	
	var valuer = 'newsaddrmlink_'+gameIdr;
	var targetr = getObj(valuer);
	
	if(targetr != null){
		// Change class,onlick,text
		if(isnowr == "add"){
			targetr.onclick = function() { addGameToFavorites(this.getAttribute('ref')); return false; };
			targetr.setAttribute("className", "addvr");
			targetr.setAttribute("class", "addvr");
			targetr.innerHTML = "Add to favorites";
		}
		else {
			targetr.onclick = function() { removeGameToFavorites(this.getAttribute('ref')); return false; };
			targetr.setAttribute("className", "remvr");
			targetr.setAttribute("class", "remvr");
			targetr.innerHTML = "Remove from favorites";
		}
		//alert(targetr.onclick);
	}
}

function addGameToFavoritesDD(){
	var gameId = parseInt(window.document.favgameadd.fgasel.value);
	if(gameId > 0){
		addGameToFavorites(gameId);
	}
}

// ------------------------
// !Browser
// ------------------------

var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]
};
BrowserDetect.init();

// ------------------------
// !Comments
// ------------------------

function cmnt2reply(postObj,postUser){
	CKEDITOR.instances.commentbody.setData('');
	window.location.hash="post"; 
}

function cmnt2quote(postObj,postUser){
	var quotecontent = getObj(postObj).innerHTML;
	var quotebody = '<blockquote><i>Originally posted by '+postUser+'</i><br><b>'+quotecontent+'</b></blockquote><p>&nbsp;</p>';
	
	CKEDITOR.instances.commentbody.setData(quotebody);
	window.location.hash="post"; 
}

function cmnt2edit(postObj,postUser,postId){
	var quotecontent = getObj(postObj).innerHTML;
	var quotebody = quotecontent;
	
	getObj('addCommentState').value = "edit";
	getObj('addCommentExtraInfo').value = postId;
	getObj('addCommentButton').value = "Edit";
	
	CKEDITOR.instances.commentbody.setData(quotebody);
	window.location.hash="post";
}

function cmnt2clear(){
	getObj('addCommentState').value = "";
	getObj('addCommentExtraInfo').value = "";
	getObj('addCommentButton').value = "Post";
	CKEDITOR.instances.commentbody.setData(''); 
}

echoLazyLoadCommentsPage = 0;
echoLazyNextLoadPage = 1;
echoLazyLoadStop = false;
echoLazyLoadThreadHolder = 0;
echoLazyLoadContainerHolder = "";

function lazyLoadComments(threadId,elementId){
	if(threadId > 0 && !echoLazyLoadStop){
		
		//alert('threadId='+threadId+',element='+elementId+',page='+echoLazyNextLoadPage);
	
		var params	= new Object();
		params['threadId']	= threadId;
		params['page']	= echoLazyNextLoadPage;
		params['container'] = elementId;
		params['commentType'] = 'feature';
		params['identifier'] = 0;
		
		echoLazyLoadThreadHolder = threadId;
		echoLazyLoadContainerHolder = elementId;
		
		http('post','/ajax/tools.cfc?method=getCommentPostsByThreadId',lazyLoadComments_callback,params);
	}
}

function lazyLoadComments_callback(result){
	
	//alert(result.text);
	
	// We are told we are done loading, so no more checking
	if(result.finish == "true" || result.rows < 1){
		echoLazyLoadStop = true;
	}
	
	// Results? Append dem!
	if(result.rows > 0){
		$('#'+result.container).append(result.text);
		
		if(!echoLazyLoadStop){
			echoLazyNextLoadPage++;
			
			// reset lazyLoad?
			$('#slothLoadElement').slothLoader({type: 'js',prebuffer: 350,action: 'lazyLoadComments('+result.threadId+',"'+result.container+'")'});
		}
	}
}

function reportComments(){

}

function deleteCommentPost(postId,threadId){
	if(postId > 0){
		var params	= new Object();
		params['postId']	= postId;
		params['threadId']	= threadId;
		http('post','/ajax/tools.cfc?method=deleteCommentPost',deleteCommentPost_callback,params);
	}
}

function deleteCommentPost_callback(result){	
	if(result.code > 0){
		$('#cpost_'+result.code).slideUp();
	}
	else {
		alert("WAS NOT DELETED");
	}
}

function cmnt3edit(postId,threadId){
	slothloaderPause = true;
	
	var quotecontent = getObj('ipost'+postId).innerHTML;
	var quotebody = quotecontent;
	
	getObj('addCommentState').value = "edit";
	getObj('addCommentExtraInfo').value = postId;
	getObj('addCommentButton').value = "Edit";
	
	CKEDITOR.instances.commentbody.setData(quotebody);
	//window.location.hash="post";
	goToByScroll('postBoxId');
}

function cmnt3reply(postId,threadId){
	slothloaderPause = true;
	CKEDITOR.instances.commentbody.setData('');
	//window.location.hash="post";
	goToByScroll('postBoxId');
}

function cmnt3quote(postId,threadId){
	slothloaderPause = true;
	var quotecontent = getObj('ipost'+postId).innerHTML;
	var quoteuser = getObj('post'+postId+'_user').innerHTML;
	var quotebody = '<blockquote><i>Originally posted by '+quoteuser+'</i><br><b>'+quotecontent+'</b></blockquote><p>&nbsp;</p>';
	
	CKEDITOR.instances.commentbody.setData(quotebody);
	//window.location.hash="post"; 
	
	goToByScroll('postBoxId');
}

function cmnt3clear(){
	
	slothloaderPause = false;
	
	getObj('addCommentState').value = "";
	getObj('addCommentExtraInfo').value = "";
	getObj('addCommentButton').value = "Post";
	CKEDITOR.instances.commentbody.setData(''); 
	
}

function goToByScroll(id){
	$('html,body').animate({scrollTop: $("#"+id).offset().top},'slow');
}

// ------------------------
// !Reports
// ------------------------

function createReport(typeId,itemId,threadId){
	
	// Check for other user action first
	var existing = getObj("contentreportframe");
	if(existing != null) { document.body.removeChild(existing); }
	
	// Preset dimensions
	var width = 800;
	var height = 600;

	// Fetch data
	var viewport = getWindowSize();
	var scrollport = getPageSize();

	// Get center of visible page
	var xpos = ((viewport[0]/2)-(width/2))+scrollport[0]
	var ypos = ((viewport[1]/2)-(height/2))+scrollport[1]

	// Prevent placement on left side
	if(ypos < 10) { ypos = 10; }
	if(xpos < 10) { xpos = 10; }

	// Create frame
	var crframe = document.createElement('iframe');
	crframe.setAttribute('id','contentreportframe');
	crframe.setAttribute('allowtransparency','true');

	crframe.style.width = width+'px';
	crframe.style.height = height+'px';
	crframe.style.border = '0px';
	crframe.frameBorder = 0;
	crframe.style.position = 'absolute';
	crframe.style.left = parseInt(xpos)+'px';
	crframe.style.top = parseInt(ypos)+'px';
	crframe.style.display = 'block';
	crframe.style.color = '#FFF';
	crframe.style.zIndex = '99999';
	crframe.allowtransparency = 'true';
	
	var link = '/ajax/tools.cfc?method=createReportContent&postId='+itemId+'&threadId='+threadId;
	crframe.src = link;

	// Add useractions to site
	window.document.body.appendChild(crframe)
}

function cancelReport(){
	// Check for other user action first
	var existing = getObj("contentreportframe");
	if(existing != null) { document.body.removeChild(existing); }
}


// ------------------------
// !Social Rendering
// ------------------------

socialLinks = new Array();
socialLinksPass = 0;

function renderSocialLinks(){
	var count = socialLinks.length;
	for(i=0;i<count;i++){
		var params	= new Object();
		params['link']	= socialLinks[i][0];
		params['title']	= socialLinks[i][1];
		params['id'] = socialLinks[i][2];
		http('post','/ajax/tools.cfc?method=renderSocailLinks',renderSocialLinks_callback,params);
	}
}

function renderSocialLinks_callback(result){
	document.getElementById(result.id).innerHTML = result.text;
}

// ------------------------
// !Polls
// ------------------------

function submitPollVote(pollId,fieldId,url,element){
	var params = new Object();
	params['pollId'] = pollId;
	params['fieldId'] = fieldId;
	params['url'] = url;
	params['element'] = element;

	http('post','/ajax/tools.cfc?method=castPollVote',submitPollVoteCallback,params);
}

function submitPollVoteCallback(result){
	if(result.code == 1){
		renderPollByPollId(result.pollid,result.element,result.url);
	}
	else {
		if(result.code != 2){
			alert(result.text);
		}
	}
}

function renderPollByPollId(pollId,element,url){
	var params = new Object();
	params['pollId'] = pollId;
	params['element'] = element;
	params['url'] = url;

	http('post','/ajax/tools.cfc?method=getPollByPollId',renderPollByPollIdCallback,params);
}

function renderPollByPollIdCallback(result){
	$('#'+result.element).replaceWith(result.text);
	//document.getElementById(result.element).innerHTML = result.text;
}

// ------------------------
// !Streams
// ------------------------

function showStreamChat(channelName,width,height){
	var data = '<iframe frameborder="0" scrolling="no" id="chat_embed" src="http://twitch.tv/chat/embed?channel='+channelName+'&amp;popout_chat=true" height="'+height+'" width="'+width+'"></iframe>';
	if(data != "0"){
		var container = $('#streamchatbody');
		var button = $('#showChatLink');
		container.slideDown();		
		container.html(data);
		
		button.html('Hide Chat');
		button.attr('onclick', 'hideStreamChat("mmorpgcom"); return false;');
	}
}

function hideStreamChat(channelName){
	var container = $('#streamchatbody');
	var button = $('#showChatLink');
	
	container.html('');
	container.slideUp();
	
	button.html('Show Chat');
	button.attr('onclick', 'showStreamChat("mmorpgcom",780,400); return false;');
}

// ------------------------
// !YouTube
// ------------------------

function loadYTClip(container,ythash,width,height){
	$('#'+container).html('<iframe width="'+width+'" height="'+height+'" src="http://www.youtube.com/embed/'+ythash+'?autoplay=1" frameborder="0" allowfullscreen></iframe>');
}

// EOF
