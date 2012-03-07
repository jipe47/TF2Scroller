<?php
function smarty_function_html_leanmodal($params, $template)
{
	if(!array_key_exists('id', $params))
	{
		trigger_error("leanmodal: missing id parameter", E_USER_WARNING);
		return;
	}

	$title = $params['title'];
	$id = $params["id"];
	
	foreach($params as $k => $v)
		$template->assign($k, $v);
	
	$content = "Undefined content";
	
	if(array_key_exists("content", $params))
	{
		$content = $params["content"];
		
		$content = '<div class="leanModal_window" id="'.$id.'" style="display: none;">
			<div class="titleBar">
				<div class="closeButton">
					<img src="tpl/default/images/leanmodal/closebutton.png" title="Close this window" alt="Close this window" onclick="leanModal_close(\''.$id.'\')" />
				</div>
				<p>'.$title.'</p>
			</div>
			<div class="content">
				'.$content.'
			</div>
		</div>';
	}
	else if(array_key_exists("content_template", $params))
	{
		$content = $template->fetch($params["content_template"]);
		$content = '<div class="leanModal_window" id="'.$id.'" style="display: none;">
			
			<div class="titleBar">
				<div class="closeButton">
					<img src="tpl/default/images/leanmodal/closebutton.png" title="Close this window" alt="Close this window" onclick="leanModal_close(\''.$id.'\')" />
				</div>
				<p>'.$title.'</p>
			</div>
			<div class="content">
				'.$content.'
			</div>
		</div>';
	}
	
	try
	{
	Config::addOnLoadFunction("initJQueryLeanModal()");
	}
	catch(Exception $e)
	{
	}
	
	//return $content;
	Config::addToBuffer($content);
	return "";
}

?>
