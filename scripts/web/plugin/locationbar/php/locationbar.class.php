<?php
/**
 * LocationBar
 * This class allows you to add links to the location bar ("fil d'Ariane").
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Locationbar
 */
class LocationBar
{
	private static $links = array(); // $link name => $url
	
	public static function add($name, $url="")
	{
		self::$links[] = array('name' => $name, 'url' => $url);
	}
	public static function getLastEntryName()
	{
		$nbr_link = count(self::$links);
		if($nbr_link > 0)
			return self::$links[$nbr_link - 1]['name'];
		else
			return "";
	}
	public static function getLink()
	{
		return self::$links;
	}
}