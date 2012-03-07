function selectChange(idTextarea, selectId, tagName, text)
{
	var val = $('#'+selectId).val();
	if(val == "none")
		return;
	if(val == "other")
		val = prompt(text);
	$('#'+selectId).val('none');
	addTag('['+tagName+'='+val+']', '[/'+tagName+']', idTextarea);
}

function refresh(id)
{
	if($('#bbcode_enableAutorefresh').attr('checked') == false)
		return;
	var t = $('#'+id).val();
	$.post('?Ajax/EditorAjax', {text: t},
			function(data)
			{
				$("#bbcode_preview").html(data);
			});
}
function addTag(startTag, endTag, idTextarea)
{
	var textarea = document.getElementById(idTextarea);
	var start = textarea.selectionStart;
	var end = textarea.selectionEnd;
	
	var allText = textarea.value;
	var selectedText = allText.substring(start, end);

	switch(startTag)
	{
		case "[color]":
			var color = prompt("Color (hexa)", "#");
			startTag = "[color="+color+"]";
			break;
		case "[img]":
			if(selectedText == "")
				selectedText = prompt("Picture link");
			break;
			
		case "[url]":
			var link = prompt("Link", selectedText);

			if(link == "" && selectedText == "")
				return;
			else if(link != "" && link != selectedText)
				startTag = "[url="+link+"]";
			break;
	}
	
	var t = allText.substring(0, start)+startTag+selectedText+endTag+allText.substring(end, allText.length);

	var newStart = start + startTag.length;
	var newEnd = newStart + selectedText.length;
	
	
	textarea.value = t; 
	textarea.selectionStart = newStart;
	textarea.selectionEnd = newEnd;
	textarea.focus();
	refresh();
}