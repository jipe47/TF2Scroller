<?php
/**
 * LocationBar
 * This plugin allows the creation of a location bar ("fil d'Ariane"). To add
 * links, you must use the LocationBar class.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Locationbar
 */
class LocationBarPlugin extends Plugin
{
	public static $name = "Locationbar";
	//const SEPARATOR = " > ";
	const SEPARATOR = ' <img src="tpl/default/images/icons/bullet_green2.png" alt="" /> ';
	public function __construct()
	{
		parent::__construct();
	}
	public function render($arg)
	{
		$f = array();
		foreach(LocationBar::getLink() as $a)
		{
			$s = $a['name'];
			if($a['url'] != "")
				$s = '<a href="'.$a['url'].'">'.$s.'</a>';
			$f[] = $s; // Faire un rendu du tpl !
		}
		$links = implode(self::SEPARATOR, $f);
		$this->tpl->assign("locationbar_widget", $links);
		return $this->renderFile(PATH_PLUGIN."locationbar/html/widget.html");
	}
}