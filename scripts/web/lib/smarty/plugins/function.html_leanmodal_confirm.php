<?php
require_once "function.html_leanmodal.php";
function smarty_function_html_leanmodal_confirm($params, $template)
{
	if(!array_key_exists("message", $params))
		trigger_error("leanmodal_confirm: missing message parameter", E_USER_WARNING);
		
	if(!array_key_exists("title", $params))
		$params['title'] = "Confirmation";
	
	 if(!array_key_exists("handler_yes", $params))
		$params['handler_yes'] = "";
	 if(!array_key_exists("handler_no", $params))
		$params['handler_no'] = "";
	
	$template->assign("confirm_message", $params['message']);
	
	$params['content_template'] = PATH_TPL."common/html/leanmodal/confirm.html";
	
	return smarty_function_html_leanmodal($params, $template);
}

?>
