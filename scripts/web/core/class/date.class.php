<?php

/**
 * Allows the manipulation of dates.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Misc
 */
class Date
{
	/**
	 * Returns a (possibly short) month name based on it's number.
	 * @param int $number Month number.
	 * @param boolean $short If set, returns a short version of the month.
	 */
	public static function getMonth($number, $short = false)
	{
		$l = $short ? "M" : "F";
		return date($l, mktime(0, 0, 0, intval($number), 1, 1990));
	}
	public static function getHour($timestamp)
	{
		return date("H", intval($timestamp)). "h".date("i", intval($timestamp));
	}
}

?>