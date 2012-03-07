// Userbar version
function onlineMemberUserbarInit()
{
	onlineMemberUserbarAutorefresh();
}

function onlineMemberUserbarAutorefresh()
{
	onlinememberUserbarRefresh();
	setTimeout(
	function()
	{
		onlineMemberUserbarAutorefresh();
	}, 5000);
}

function onlinememberUserbarRefresh()
{
	onlinememberUserbarLoading(true);
	$.post('?Ajax/OnlineMemberUserbarAjax', {}, 
	function(data)
	{
		onlinememberUserbarLoading(false);

		if(parseInt(data) == -2)
		{
			$('#onlinemember_userbar #members').html("Chat Server is offline.");
		}
		else
		{
			$('#onlinemember_userbar #members').html(data);
			
			var nbr_online = $('#onlinemember_userbar #members #nbr_online_ajax').val()
			$("#onlinemember_userbar #nbr_online").html(" (" + nbr_online + ")");
		}
	});
}

function onlinememberUserbarLoading(b)
{
	if(b)
		$('#onlinemember_userbar #loading').css('display', 'block');
	else
		$('#onlinemember_userbar #loading').css('display', 'none');
}

function onlinememberMembersToggle()
{
	$("#onlinemember_userbar #members").toggle();
}