function leanModal_close(id)
{
	$('#lean_overlay').fadeOut(200);
	$('#'+id).fadeOut(200);
}

function initJQueryLeanModal()
{
	$(".leanModal_button").leanModal({ top : 150, overlay : 0.4 });
}
