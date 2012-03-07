<?php
function smarty_function_mkLink($params, &$smarty)
{
	if (empty($params['arg'])) {
        $smarty->trigger_error("translate : missing 'key' parameter.");
        return;
    }
    return "?".str_replace(",", Config::ARG_SEPARATOR, $params['arg']);
}