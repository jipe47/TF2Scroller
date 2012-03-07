<?php
require_once "inc/help.functions.php";

/**
 * Help Plugin
 * This plugin allows the creation and the placement of small windows
 * containing help messages.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Help
 */

class HelpPlugin extends Plugin
{
	public static $name = "Help";
	public static $sqlTables = array('help_page');
	public static $adminLinks = array('add' => 'New help page', 'list' => 'Manage help pages');
	public function __construct()
	{
		parent::__construct();
	}
	public function render($arg)
	{
		$code = $arg['code'];
		$info = help_getPageByCode($code);
		$this->assign("info", $info);
		$this->assign("code", $code);
		
		$id_leanmodal = is_null($info) ? generateId(10) : $info['id'];
		$this->assign("id_leanmodal", $id_leanmodal);
		return $this->renderFile(PATH_PLUGIN."help/html/widget.html");
	}
}