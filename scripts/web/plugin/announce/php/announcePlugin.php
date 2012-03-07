<?php
require_once "inc/announce.functions.php";

/**
 * Announce Plugin
 * This plugin allows the publication of announces that redirect to a URL.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Announce
 */

class AnnouncePlugin extends Plugin
{
	public static $name = "Announce";
	public static $sqlTables = array("announce");
	public static $adminLinks = array("add" => "Add an announcement", "list" => "Manage announcements");
	public static $rights = array("ANNOUNCE_MANAGE" => "Add, edit and delete announces.");
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render($arg)
	{
		$announces = $this->request->fetchQuery("SELECT * FROM " . TABLE_ANNOUNCE . " ORDER BY id DESC LIMIT 3");
		$this->assign("array_announce", $announces);
		return $this->renderFile(PATH_PLUGIN."announce/html/announce_widget.html");
	}
}
?>