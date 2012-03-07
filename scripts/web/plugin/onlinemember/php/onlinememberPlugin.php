<?php
/**
 * Onlinemember Plugin
 * This plugin let you know who is online.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Onlinemember
 */
class OnlineMemberPlugin extends Plugin
{
	public static $name = "OnlineMember";
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render($arg)
	{
		Config::addOnloadFunction('onlineMemberUserbarInit()');
		return $this->renderFile(PATH_PLUGIN."onlinemember/html/widget_userbar.html");
	}
}

?>