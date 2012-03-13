function imagelibDisplayDirectory()
{
	var dir = $("#imagelib_input_directory").val();
	
	$.post("?Ajax/Imagelib/readdir", {dir: dir}, 
			function(data)
			{
				if(data == -1)
					data = "Error: empty dir.";
				else if(data == -2)
					data = "Error: dir does not exist.";
				$("#listing").html(data);
			});
}

function imagelibToggleFolder(id)
{
	$('#folder_'+id).slideToggle();
}

function imagelibLoadImage(path)
{
	$.post('?Ajax/Imagelib/imageinfo', {path: path},
			function(data)
			{
				$('#imagelib_window').html(data);
			});
}

function imagelibDisplayAllFolder(b)
{
	if(b)
		$("#imagelib_nav .folder").show();
	else
		$("#imagelib_nav .folder").hide();
}
	