<?php
function smarty_function_message($params, &$smarty)
{
	if (empty($params['text'])) {
        $smarty->trigger_error("translate : missing 'key' parameter.");
        return;
    }
    $text = $params['text'];
	$type = (!empty($params['type'])) ? $params['type'] : Message::SUCCESS;
	
	$class = new Message(array($text, $type));
	return $class->render();
}