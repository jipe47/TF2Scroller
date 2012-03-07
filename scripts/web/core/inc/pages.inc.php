<?php
function displayPage($i, $page, $back)
{
	if($i == $page)
		return '<strong>'.$i.'</strong> ';
	else
		return '<a href="?'.$back.Config::ARG_SEPARATOR.'p'.$i. '">' . $i . '</a> ';
}
function generatePages($nbr_page, $page, $back)
{
	$url = $back.Config::ARG_SEPARATOR;
	
	$min_page = 10;
	
	if($nbr_page == 1)
		return "";
	else if($nbr_page < $min_page)
	{
		$r = "";
		for($i = 1 ; $i <= $nbr_page ; $i++)
			$r .= displayPage($i, $page, $back);
		return $r;
	}
	
	$nbr_extreme = 3;
	$milieu = 2;
	
	$current = 1;
	
	$prev_page = ($page > 1) ? $page - 1 : 1;
	$next_page = ($page < $nbr_page) ? $page + 1 : $nbr_page;
	
	echo '<a href="?'.$url.'p1"><|</a> ';
	echo '<a href="?'.$url.'p'.$prev_page . '"><</a> ';
	
	for(; $current <= $nbr_extreme ; $current++)
		echo displayPage($current, $page, $back);
	
	$showMiddle = true;
	if($page < ($current + $milieu))
	{
		for($i = $current ; $i <= ($current + $milieu) ; $i++)
			echo displayPage($i, $page, $back);
			
		
		$showMiddle = false;
	}
	echo '... ';
	
	if($showMiddle && ($page >= $current && $page <= ($nbr_page - $nbr_extreme * 2)))
	{
		for($i = $page - $milieu ; $i <= ($page + $milieu) ; $i++)
			echo displayPage($i, $page, $back);
		echo '... ';
	}
	
	if($page > ($nbr_page - 2 * $nbr_extreme) && $page < $nbr_page - $nbr_extreme)
	{
		for($i = $nbr_page - 2 * $nbr_extreme ; $i < $nbr_page - $nbr_extreme ; $i++)
			echo displayPage($i, $page, $back);
		
		$showMiddle = false;
	}
	
	for($i = $nbr_page - $nbr_extreme ; $i <= $nbr_page ; $i++)
		echo displayPage($i, $page, $back);
	
	echo '<a href="?'. $url .'p'. $next_page . '">></a> ';
	echo '<a href="?'. $url .'p'. $nbr_page . '">|></a> ';
}