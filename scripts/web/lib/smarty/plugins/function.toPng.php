<?php
function smarty_function_toPng($params, &$smarty)
{
	$values = array_values($params);
	$link = $values[0];
	$n = explode(".", $link);
	array_pop($n);
	return implode(".", $n).".png";
}