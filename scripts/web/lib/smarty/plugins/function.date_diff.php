<?php
function smarty_function_date_diff($params, $template)
{
	if(count($params) == 0 || !isset($params['date']))
		trigger_error('date_diff: indefined date parameter.', E_USER_ERROR);
		
	if(isset($params['strong_threshold']))
		$strong_threshold = intval($params['strong_threshold']);
	else
		$strong_threshold = -1;
		
	$hour = 60 * 60;
	$day = $hour * 24;
	
	$diff = time() - intval(strtotime($params['date']));
	
	if($diff < 60)
		$r = "a minute ago";
	else if($diff > 60 && $diff < $hour)
		$r = floor($diff / 60) . " minutes ago";
	else if($diff > $hour && $diff < 2*$hour)
		$r = "an hour ago";
	else if($diff > $hour && $diff < $day)
		$r = floor($diff / $hour) . " hours ago";
	else if($diff > $day  && $diff < $day * 30)
		$r = floor($diff / $day). " days ago";
	else
		$r = smarty_modifier_date_format($params['date'], DATE_FORMAT);
		
	if($diff < $strong_threshold)
		$r = "<strong>".$r."</strong>";
		
	return $r;
}
?>