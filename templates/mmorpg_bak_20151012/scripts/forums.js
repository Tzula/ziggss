colortext = "";

// This function hands the FlashColor the name of the current form field and opens the FlashColor window
function FlashColor() { 

	width = 275;
	height = 155;
    var PickerWindow=window.open('/flashcolor/FlashColors.htm?field=none','vwin','width=' + width + ',height=' + height + ',scrollbars=no,titlebars=no');

	if (PickerWindow.opener == null) {
		PickerWindow.opener = window;
	}
	else {
		PickerWindow.focus();
	}
}

// This function receives the color that was selected in the FlashColor window, and then updates the appropriate field
function SetFlashColor(field,color) {
	txt = "[color=" + color + "]" + colortext + "[/color]";
	insertAtCaret(document.newpost.message,txt);
}

function trimSpace(str){
     str = str.replace(/&nbsp;/g,' ');
     //alert(str)
     return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
}

function AppendToMessage(newtext) {
document.newpost.message.value+=newtext;
document.newpost.message.focus();
}

function storeCaret (textEl) {
	if (textEl.createTextRange)
		textEl.caretPos = document.selection.createRange().duplicate();

} // end fn

function x() {
	return;}

function insertAtCaret (textEl, text) {
	if (textEl.createTextRange && textEl.caretPos) {
		var caretPos = textEl.caretPos;
		caretPos.text =
			caretPos.text.charAt(caretPos.text.length - 1) == ' ' ?
			text + ' ' : text;
	} else {
		textEl.value  = textEl.value + text; // for non MSIE browsers just append it
	}
	document.newpost.message.focus();
	return true;
}// fn

function addbold() {
	txt = prompt("Enter text to make bold.\nLeave blank if you just want the tags appended.","");
	if (txt!=null){newtxt="[b]"+txt+"[/b]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function additalics() {
	txt = prompt("Enter text to make italicized.\nLeave blank if you just want the tags appended.","");
	if (txt!=null){newtxt="[i]"+txt+"[/i]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function addunderline() {
	txt = prompt("Enter text to make underlined.\nLeave blank if you just want the tags appended.","");
	if (txt!=null){newtxt="[u]"+txt+"[/u]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function addcolor() {
	colortext = prompt("Enter text to make new color.\nLeave blank if you just want the tags appended.","");
	FlashColor();
}
function addsize() {
	
	size = prompt("Enter font POINT size. (valid range: 8-25)","");
	while ((size<8) || (size>25)){
		size = prompt("ERROR - Enter font POINT size. (valid range: 8-25)","");
	}
	txt2 = prompt("Enter text to make new size.\nLeave blank if you just want the tags appended.","");
	txt = "[size=" + size + "]" + txt2 + "[/size]";
	insertAtCaret(document.newpost.message,txt);;
}
function addcenter() {
	txt = prompt("Enter text to make centered.\nLeave blank if you just want the tags appended.","");
	if (txt!=null){newtxt="[center]"+txt+"[/center]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function addquote() {
	txt = prompt("Enter text to quote.\nLeave blank if you just want the tags appended.","");
	if (txt!=null){newtxt="[quote]"+txt+"[/quote]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function addimage() {
	txt = prompt("Enter link to image.\nLeave blank if you just want the tags appended.","http://");
	if (txt!=null){newtxt="[img]"+txt+"[/img]";
	insertAtCaret(document.newpost.message,newtxt);}
}
function addemail() {
	txt2=prompt("Enter text to display for the link.\nLeave blank if you just want the e-mail address for the link text.","");
    if (txt2!=null) {
		txt=prompt("Enter the e-mail address.","me@mydomain.com");
		if (txt!=null) {
                                if (txt2=="") {
                                        AddTxt="[email="+txt+"]"+txt+"[/email]";
                                } else {
                                        AddTxt="[email="+txt+"]"+txt2+"[/email]";
                                }
                                insertAtCaret(document.newpost.message,AddTxt);
                        }
     }
}
function addlink() {
	txt2=prompt("Enter text to display for the link.\nLeave blank if you just want the URL for the link text.","");
    if (txt2!=null) {
		txt=prompt("Enter the URL to link to.","http://");
		if (txt!=null) {
                                if (txt2=="") {
                                        AddTxt="[url="+txt+"]"+txt+"[/url]";
                                } else {
                                        AddTxt="[url="+txt+"]"+txt2+"[/url]";
                                }
                               insertAtCaret(document.newpost.message,AddTxt);
                        }
     }
}
function addlist() {
{
                txt=prompt("Enter 'A' or 'a' for alphabetical, '1' for numbered, 'I' or 'i' for roman-style, or Leave blank for bulleted.","");
                while ((txt!="") && (txt!="A") && (txt!="a") && (txt!="1") && (txt!="i") && (txt!="I") && (txt!=null)) {
                        txt=prompt("ERROR!\nThe only possible values for type of list are blank 'A','a','I', 'i' or blank.","");
                }
                if (txt!=null) {
                        if (txt=="") {
                                AddTxt="\r[list]\r\n";
                        } else {
                                AddTxt="\r[list="+txt+"]\r";
                        }
                        txt="1";
                        while ((txt!="") && (txt!=null)) {
                                txt=prompt("List item\nLeave blank to end list","");
                                if (txt!="") {
                                        AddTxt+="[*]"+txt+"\r";
                                }
                        }
                        AddTxt+="[/list]\r\n";
                        insertAtCaret(document.newpost.message,AddTxt);
                }
        }
}
function insertemote(emote){
if (document.newpost.curEditorMode.value == 'bbml')
{
	insertAtCaret(document.newpost.message,emote);
}
else
{
	if (emote == ':^)') img = 'happy.gif';
	if (emote == ':^D') img = 'VeryHappy.gif';
	if (emote == ':^|') img = 'Neutral.gif';
	if (emote == ':^(') img = 'sad.gif';
	
	if (emote == 'L^(') img = 'verysad.gif';
	if (emote == '>^(') img = 'mad.gif';
	if (emote == '>^X') img = 'verymad.gif';
	if (emote == ';^)') img = 'wink.gif';
	
	if (emote == ';^|') img = 'wincing.gif';
	if (emote == ':^O') img = 'shouting.gif';
	if (emote == '=^)') img = 'interested.gif';
	if (emote == ';^`') img = 'thinkinghard.gif';
	
	if (emote == ';^d') img = 'confused.gif';
	if (emote == '=^~') img = 'slightlyshocked.gif';
	if (emote == '=^o') img = 'shocked.gif';
	if (emote == '=^*') img = 'kiss.gif';
	
	if (emote == '8^)') img = 'cool.gif';
	if (emote == ':^}') img = 'drooling.gif';
	if (emote == ':^b') img = 'StickingOutTounge.gif';
	if (emote == '{^o') img = 'yawning.gif';
	
	if (emote == '{^)') img = 'sleeping.gif';
	if (emote == '#^)') img = 'embarassed.gif';
	if (emote == '%^)') img = 'crazy.gif';
	if (emote == 'B^>') img = 'evil.gif';
	
	if (emote == 'O^)') img = 'angelic.gif';
	if (emote == '?^)') img = 'question.gif';
	if (emote == '!^)') img = 'exclamation.gif';
	if (emote == '$^)') img = 'idea.gif';
	
	if (emote == '::01') img = 'emt_bigsmile.gif';
	if (emote == '::02') img = 'emt_biggrin.gif';
	if (emote == '::03') img = 'emt_bigeyes.gif';
	if (emote == '::04') img = 'emt_bigeyes2.gif';
	
	if (emote == '::05') img = 'emt_boggled.gif';
	if (emote == '::06') img = 'emt_eyecrazy.gif';
	if (emote == '::07') img = 'emt_crazy2.gif';
	if (emote == '::08') img = 'emt_bow.gif';
	
	if (emote == '::09') img = 'emt_cool.gif';
	if (emote == '::10') img = 'emt_angry.gif';
	if (emote == '::11') img = 'emt_evil.gif';
	if (emote == '::12') img = 'emt_crazy.gif';
	
	if (emote == '::13') img = 'emt_alien.gif';
	if (emote == '::14') img = 'emt_cyclops.gif';
	if (emote == '::15') img = 'emt_fight.gif';
	if (emote == '::16') img = 'emt_cry.gif';
	
	if (emote == '::17') img = 'emt_smilecool.gif';
	if (emote == '::18') img = 'emt_smile2.gif';
	if (emote == '::19') img = 'emt_grins.gif';
	if (emote == '::20') img = 'emt_beer.gif';
	
	if (emote == '::21') img = 'emt_indifferent.gif';
	if (emote == '::22') img = 'emt_heart.gif';
	if (emote == '::23') img = 'emt_devil.gif';
	if (emote == '::24') img = 'emt_king.gif';
	
	if (emote == '::25') img = 'emt_gnasher.gif';
	if (emote == '::26') img = 'emt_pissed.gif';
	if (emote == '::27') img = 'emt_fire.gif';
	if (emote == '::28') img = 'emt_thumbs.gif';
	
	if (emote == '::29') img = 'emt_reyes.gif';
	if (emote == '::30') img = 'emt_skull.gif';
	if (emote == '::31') img = 'emt_spin.gif';
	if (emote == '::32') img = 'emt_phones.gif';
	
	if (emote == '::33') img = 'emt_tand.gif';
	if (emote == '::34') img = 'emt_tongue.gif';
	if (emote == '::35') img = 'emt_tongue2.gif';
	if (emote == '::36') img = 'emt_crazy3.gif';
	
	if (emote == '::37') img = 'emt_vconf.gif';
	if (emote == '::38') img = 'emt_idea.gif';
	if (emote == '::39') img = 'emt_wink.gif';
	if (emote == '::40') img = 'emt_devil1.gif';
	
	imagePath = 'http://www.mmorpg.com/images/emoticons/';
	
	sel = aeObjects[1].DOM.selection.createRange();
	sel.pasteHTML('<img src="' + imagePath + img + '">');
}
	}
	
	
function launchpreview(ignoreemotes,usesignature,urlToken,raw){
	if (validate()){
	var attributes = "toolbar=no,scrollbars=yes,resizable=yes,width=600,height=400";
	var url = "post_preview.cfm?" + "title=" + escape(document.newpost.newtopic.value) + "&ignoreemotes=" + ignoreemotes + "&usesignature=" + usesignature + "&raw=" + raw
	if (!raw)
		url = url + "&message=" + escape(document.newpost.message.value)
	msgWindow=window.open(url,"PostPreview",attributes);
	}
}

function changeEmotes(wysiwyg)
{
	//if (wysiwyg)
	//	ae_onSubmit();
	 document.newpost.action.value='ChangeEmotes';
	 document.newpost.submit();
}
function validate() {
	var messageStr;
	
	if(document.newpost.oEditorMode.value == 'wysiwyg'){
		//var oEditor = FCKeditorAPI.GetInstance('message');
		//oEditor.UpdateLinkedField();
		CKEDITOR.instances.message.updateElement();
	}
	
	messageStr = trimSpace(document.newpost.message.value);
	
	/*if(document.newpost.oEditorMode.value == 'wysiwyg'){		
		//updateRTEs();	
		var oEditor = FCKeditorAPI.GetInstance('message');
		messageStr	= oEditor.GetXHTML();	
	}
	else{
		messageStr = trimSpace(document.newpost.message.value);	
	}*/
	
	//messageStr = trimSpace(document.newpost.message.value);			
	
	//alert('Message: ' + messageStr + 'Length: ' + messageStr.length);
	
	//alert(document.newpost.message.value);return false;	
	
	if (messageStr=="") {
		alert("Please complete the message field.");
		return false; }
		
	//document.newpost.message.value	= messageStr;
		
	topic = trimSpace(document.newpost.title.value);
	if (topic=="") {
		alert("Please complete the title field.");
		return false; }
		
	// poll validation
	if(!valPoll()){
		return false;
	}
	
	//disable the buttons on the form	
	//getObj('previewHref').disabled	= true;
	//getObj('cancelHref').disabled	= true;
	if(document.newpost.edit.value == 'true'){
		getObj('btnSavePostChanges').disabled	= true;
	}
	else{
		getObj('btnPostMessage').disabled	= true;
	}
	
	return true;
}

function selWYSIWYG()
{	
	if (document.newpost.oEditorMode.value == 'bbml')
	{
		document.newpost.postAction.value	= 'changeEditor';		
		document.newpost.submit();
	}
}
function selBBML()
{
	if (document.newpost.oEditorMode.value == 'wysiwyg')
	{
		
		if (confirm('Warning: Switch from the enhanced editor to the BBML editor can result in loss of formatting in your message.\n\nDo you wish to continue anyways?'))
		{
			//ae_onSubmit();
			//updateRTEs();
			//var oEditor = FCKeditorAPI.GetInstance('message');
			//messageStr	= oEditor.GetXHTML();
			//document.newpost.message.value	= messageStr;
			CKEDITOR.instances.message.updateElement();
			document.newpost.postAction.value	= 'changeEditor';
			document.newpost.submit();
		}
		else
		{
			document.newpost.editorMode[1].checked = true;
			document.newpost.editorMode[1].focus();
			return false;
		}
	}
}


function cyclePollCell(){
	var pBtn	= getObj('iPollBtn');
	var pCell	= getObj('pollCell');							
	
	if(pCell.style.display == 'none'){
		pBtn.value	= 'Cancel Poll';
		pCell.style.display	= '';
	}
	else{
		pBtn.value	= 'Insert Poll';
		pCell.style.display	= 'none';
	}
}

function valPoll(){
	var pCell	= getObj('pollCell');
	var aArr	= new Array();
	
	// if the poll cell is open assume the user is
	// trying to create a poll
	if(pCell.style.display == ''){
		// validate the question
		if(document.newpost.pollQuestion.value.replace(/^\s*|\s*$/g,"") == ''){
			alert('You must enter a question for the poll.');
			return false;
		}
		
		// load the answer array
		for(var i=1;i<=10;i++){
			if(document.newpost.elements['pollAnswer_'+i].value.replace(/^\s*|\s*$/g,"") != ''){
				aArr[aArr.length]	= document.newpost.elements['pollAnswer_'+i].value.replace(/^\s*|\s*$/g,"");
			}
			document.newpost.elements['pollAnswer_'+i].value = '';
		}
		
		// organize the form fields
		for(i=0;i<aArr.length;i++){
			document.newpost.elements['pollAnswer_'+(i+1)].value = aArr[i];
		}
		
		// validate the length
		if(aArr.length < 2){
			alert('You must create at least 2 poll answers.');
			return false;
		}
	}
	
	return true;
}


//**********
// Set the preview param and post the form
function postPreview(){
		
	if(validate()){
		document.newpost.postAction.value	= 'preview';
		document.newpost.submit();
	}	
}

function valQuickSearch() {
	theForm	= document.quickSearchForm;
	if(theForm.searchStr.value.length < 3){
		alert('Your search must be at least 3 characters.');
		return false;
	}
	return true;
}
