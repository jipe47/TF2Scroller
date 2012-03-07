<?php
function smarty_function_bbcodeparse($params, &$smarty)
{
	return BBCode::parse(array_pop(array_values($params)));
}
