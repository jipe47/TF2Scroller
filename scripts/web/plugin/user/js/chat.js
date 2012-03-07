function userChatInit()
{
	$('#userbar .conversation .chattab').click(function()
	{
		var t = $(this);
		var w = $('.chatwindow', t.parent());
		
		if(w.is(':visible'))
			w.fadeOut();
		else
		{
			w.css('z-index', userChatGetNewZIndex()); 
			w.fadeIn();
		}
	});
	
	$('#userbar .conversation .chatwindow').click(function()
	{
		// Search max z-index
		var t = $(this);
		t.css('z-index', userChatGetNewZIndex());
	});
	
	userChatAutorefresh(generateGuid());
}

function userChatGetNewZIndex()
{
	// Search max z-index
	var max = 1;
	$('#userbar .chatwindow').each(function()
	{
		var v = $(this);
		if(max < parseInt(v.css('z-index')))
			max = parseInt(v.css('z-index'));
	});
	max++;
	return max;
}
function userChatInitEvents(uid)
{
	$('#userbar #conversation_'+uid+' .chattab').click(function()
	{
		var t = $(this);
		var w = $('.chatwindow', t.parent());
		
		if(w.is(':visible'))
			userChatReduceWindow(uid);
		else
		{
			//w.css('z-index', userChatGetNewZIndex()); 
			//w.fadeIn();
			userChatOpenWindow(uid);
		}
	});
	
	$('#userbar #conversation_'+uid+' .chatwindow').click(function()
	{
		var t = $(this);
		t.css('z-index', userChatGetNewZIndex());
	});
}

function userChatOpenWindow(uid)
{
	var w = $('#conversation_'+uid+' .chatwindow');
	w.css('z-index', userChatGetNewZIndex()); 
	w.fadeIn();
	
	var t = $('#conversation_'+uid+' .chattab').addClass('tab_opened');
}

function userChatCloseWindow(uid)
{
	//userChatReduceWindow(uid);
	$('#userbar #conversation_'+uid).remove();
}
function userChatReduceWindow(uid)
{
	$("#userbar #conversation_"+uid+" .chatwindow").fadeOut();
	$('#userbar #conversation_'+uid+' .chattab').removeClass('tab_opened');
}

function userChatNewWindow(tabname, title, uid)
{
	var c = document.getElementById('conversation_'+uid);
	if(c != undefined && $('#conversation_'+uid).length != 0)
		return;

	var html = '<div class="conversation" id="conversation_'+uid+'">';
	html += '		<div class="chattab">'+tabname+'</div>';
	html += '		<div class="chatwindow">';
	html += '			<div class="title">';
	
	html += '				<div class="button_close">';
	html += '					<img src="plugin/user/images/chat/button_reduce.png" title="Reduce" alt="Reduce" onclick="userChatReduceWindow(\''+uid+'\')" />';
	html += '					<img src="plugin/user/images/chat/button_close.png" title="Close this window" alt="Close this window" onclick="userChatCloseWindow(\''+uid+'\')" />';
	html += '				</div>';
	
	html += 			title+'</div>';
	
	html += '			<div class="content">';
	html += '			</div>';
	
	html += '			<div class="form">';
	html += '				<div class="button">';
	html += '					<input type="button" value="Send" onclick="userChatSend(\''+uid+'\')" />';
	html += '				</div>';
	html += '				<textarea cols="23" rows="4" id="message_'+uid+'"></textarea>';
	html += '			</div>';
	html += '		</div>';
	html += '	</div>';
	$('#userbar .chattabs').append(html);
	
	userChatLoadPreviousConversation(uid);
	
	//$('#conversation_'+uid+' .chatwindow').resizable(); // Doesn't work?!
	$('#conversation_'+uid+' .chatwindow').draggable();
	userChatInitEvents(uid);
	userChatOpenWindow(uid);
	// TODO : mettre le focus sur le textarea
	
	// Intercept return key if not shifted
	$("#conversation_"+uid+" textarea").keydown(
	function(e)
	{
		if (e.keyCode == 13 && !e.shiftKey) {
			$("#conversation_"+uid+" input[type=button]").trigger('click');
		}
	});
	
	// Disable draggable behaviour when clicking on messages
	$("#conversation_"+uid+" .content").mouseup(
	function()
	{
		$('#conversation_'+uid+' .chatwindow').draggable();
	}).mousedown(
	function()
	{
		$('#conversation_'+uid+' .chatwindow').draggable("destroy");
	});
	
	// Scroll to the bottom of div
	var height = $("#conversation_"+uid+" .chatwindow .content")[0].scrollHeight;
	$("#conversation_"+uid+" .chatwindow .content").scrollTop(height);
}

function userChatLoadPreviousConversation(uid)
{
	$.post("?Ajax/UserChatAjax/retreive", {id_member: uid},
	function(data)
	{
		//$("#js_debug").html(data);
	//	var obj = JSON.parse(data);
				
		$("#conversation_"+uid+" .content").prepend(data);
	});
}
function userChatSend(uid)
{
	var message = $("#message_"+uid).val();
	
	if(message.length <= 0)
		return;
	$('#conversation_'+uid+' input[type=button]').attr('disabled', true);
	$('#conversation_'+uid+' textarea').attr('disabled', true);
	
	$.post("?Ajax/UserChatAjax/send", {id_receiver: uid, message: message},
	function(data)
	{
		data = JSON.parse(data);
		$('#conversation_'+uid+' input[type=button]').attr('disabled', false);
		$('#conversation_'+uid+' textarea').attr('disabled', false);
		
		if(parseInt(data) == -1)
		{
			$("#conversation_"+uid+" .content").append('<div class="message status">Your messaged has not been transmitted.</div>');
			return;
		}
		
		$("#conversation_"+uid+" .content").append('<div class="message you">'+ data + ' - You : ' + message+'</div>');
		$("#message_"+uid).val('');
		
		// Scroll to the bottom of div
		var height = $("#conversation_"+uid+" .chatwindow .content")[0].scrollHeight;
		$("#conversation_"+uid+" .chatwindow .content").scrollTop(height);
	});
}

function userChatAutorefresh(guid)
{
	userChatRefresh(guid);

	setTimeout(
	function()
	{
		userChatAutorefresh(guid);
	}, 5000);
}

function userChatRefresh(guid)
{	
	$.post('?Ajax/UserChatAjax/newmessage', {guid: guid}, 
	function(data)
	{
		if(parseInt(data) == -2)
			return;
		
		var obj = JSON.parse(data);
		var nbr_newmessage = obj.nbr_newmessage;
		
		if(nbr_newmessage == 0)
			return;
		
		$.each(obj.messages, function(uid, messages)
		{
			for(var i = 0 ; i < messages.length ; i++)
			{
				var message 	= messages[i].message;
				var author 		= messages[i].nickname;
				
				var conv;
				conv = $("#conversation_"+uid);
				
				// Conversation window does not exist
				if(conv.length <= 0)
				{
					userChatNewWindow(author, "Conversation with " + author, uid);
					$("#conversation_"+uid+" .chatwindow").hide();
				}
				
				$("#conversation_"+uid+" .chatwindow .content").append('<div class="message">'+message+'</div>');
				
				// Scroll to the bottom of div
				var height = $("#conversation_"+uid+" .chatwindow .content")[0].scrollHeight;
				$("#conversation_"+uid+" .chatwindow .content").scrollTop(height);
			}
			});
		
	});
}
