<?php
function smarty_function_backButton($params, &$smarty)
{
	$type = (array_key_exists("type", $params)) ? $params['type'] : "link";
	$text = (array_key_exists("text", $params)) ? $params['text'] : "Back";
	
	if($type == "link")
		$r = '<a href="javascript:history.go(-1)" class="button_link">' . $text . '</a>';
	else if($type == "link_big")
		$r = '<a href="javascript:history.go(-1)" class="button_link_big">' . $text . '</a>';
	else if($type == "button")
		$r = '<input type="button" value="' . $text . '" onclick="history.go(-1)" class="button_link" />';
	else if($type == "button_big")
		$r = '<input type="button" value="' . $text . '" onclick="history.go(-1)" class="button_link_big" />';
    return $r;
}