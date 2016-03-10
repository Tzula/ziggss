//////////
// File: screenshots.js
// Description: Screenshot javascript functions
//////////

// Persistant variables

comments = new Array();

// Clear and show screenshot submission form
function addScreenshot(location){
	var container,theForm,upload,wm;		
	if(location == 1){
		container = getObj('houseFormDiv');
		theForm = document.hForm;			
		upload = getObj('hUpload');
		wm = getObj('hWp');
	}
	else{
		container = getObj('memberFormDiv');			
		theForm = document.mForm;
		upload = getObj('mUpload');
	}
			
	// clear the form
	theForm.screenId.value	= '';
	theForm.caption.value = '';
	
	// hide link
	getObj('ssadd'+location).style.display = 'none';
	
	// show the form
	upload.style.display = '';
	if(wm){
		wm.style.display = '';
	}
	container.style.display = '';
}

// Cancel and clear screenshot submission form
function cancelScreenshot(location){
	var container,theForm,upload;
	if(location == 1){
		container	= getObj('houseFormDiv');
		theForm	= document.hForm;			
		upload	= getObj('hUpload');
	}
	else {
		container	= getObj('memberFormDiv');			
		theForm	= document.mForm;
		upload	= getObj('mUpload');
	}
	getObj('ssadd'+location).style.display = '';
	
	// Clear any errors from failed uploads
	hideErrors(location);
	
	// hide the form
	container.style.display = 'none';
}

// Hide any error output
function hideErrors(location){
	var section;
	if(location == 1){
		section	= getObj('hError');
		label	= getObj('hErrorLbl');
	}
	else{
		section	= getObj('mError');
		label	= getObj('mErrorLbl');
	}
	
	label.innerHTML	= '';
	section.style.display	= 'none';
}

// Add comments to array
function insertComment(commentid,comment){
	comments[commentid] = new Object();
	comments[commentid]['comments'] = comment;
}

// Send screenshot rating
yourRating = 0;
function sendRating(rating,mode,id){
	var params = new Object();
	params['ssid'] = parseInt(id);
	params['rating'] = parseInt(rating);
	params['mode'] = mode;
	yourRating = parseInt(rating);
	http('post','/ajax/tools.cfc?method=putScreenShotRatingById',sendRating_callback,params,true);
}

// Send screenshot rating callback
function sendRating_callback() {
	var rateitDiv = getObj('ssv_rateit');
	rateitDiv.style.display = 'none';
	
	// Destroy controls
	rateitDiv.innerHTML = "";
	getObj('ssv_details_rateit').innerHTML = "You rated it <strong>"+yourRating+"</strong>";
	getObj('ssv_details_rating_you').innerHTML = "";
}

// Legacy bars glow
function glowBars(pos,theme) {
	hf = document.barForm.userRating;
	for (i = 1; i <= 10; i++) {
		img = eval('document.uRatingImg' + i);
		if (i == pos){
			img.src = theme+'/bars/gv_ratingbars_hover.gif';
			getObj('uRatingLabel').innerHTML = i;
		}
		else if (i > pos) {
			img.src = theme+'/bars/gv_ratingbars_empty.gif';
		}
		else {
			img.src = theme+'/bars/gv_ratingbars_' + i + '.gif';
		}
	}
}

// Legacy bars unGlow
function unGlowBars(avg,theme) {
	for (i = 1; i <= 10; i++) {
		img = eval('document.uRatingImg' + i);
		if (avg < i)
			img.src = theme+'/bars/gv_ratingbars_empty.gif';
		else if (avg == i){
			img.src = theme+'/bars/gv_ratingbars_' + i +'.gif';
			getObj('uRatingLabel').innerHTML = i;
		}
		else {
			img.src = theme+'/bars/gv_ratingbars_' + i +'.gif';
		}
	}
}

// EOF