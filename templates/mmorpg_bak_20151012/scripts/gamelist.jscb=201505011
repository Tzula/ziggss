function makeBars(barcount,type,fmtNum,spacing,showEmpties,theme) {
	var output = "";
	if (type == 0) {
		var imgFile = 'ratingbars';
	}
	else {
		var imgFile = 'hypebars';
	}
	var theme = theme + '/bars/';

	for (i = 1; i <= 10; i++)	{
		if(i == 1) { barvalue = fmtNum; } else { barvalue = "" }
		if (barcount >= i) {
			output+='<img src="' + theme + imgFile + '_' + i + '.gif" width="5" height="14" alt="" /><img src="' + theme + 'spacer.gif" width="' + spacing + '" height="14" alt="" />'
		}
		else {
			output+='<img src="';
			if (showEmpties) {
				output+=theme + imgFile + '_empty.gif';
			}
			else {
				output+=theme + 'spacer.gif';
			}
			output+='" width="5" height="14" alt="" /><img src="' + theme + 'spacer.gif" width="' + spacing + '" height="14" alt="" />';
		}
	}
	output+=fmtNum;

	document.write(output);
	return;
}