<?php
function smarty_function_plugin($params, &$smarty)
{
	if (empty($params['p'])) {
        $smarty->trigger_error("translate : missing 'key' parameter.");
        return;
    }
    $p = $params['p'];
	unset($params['p']);
	
	$class = Plugins::getPlugin($p);
	return $class->render($params);
  //  return serialize($params);
}