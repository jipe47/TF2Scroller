function logviewerDisplay()
{
	var single_day = $('#single_day').val();
	var single_month = $('#single_month').val();
	var single_year = $('#single_year').val();
	
	var reverse = $("#reverse").attr("checked");

	$.post('?Ajax/LogviewerAjax', 
	{
		single_day: single_day,
		single_month: single_month,
		single_year: single_year,
		reverse: reverse
	}, function (data){$('#logviewer_result').html(data);});
}