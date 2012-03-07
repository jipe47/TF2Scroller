<?php
require_once "inc/user.functions.php";
require_once "inc/group.functions.php";
require_once "inc/organisation.functions.php";

/**
 * User Plugin
 * This plugin allows the management of users.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */

class UserPlugin extends Plugin
{
	public static $name = "User";
	public static $sqlTables = array("chat" => "chat_temp_message", "organisation", "user_organisation", "user", "user_ban", "group" => "user_group", "group_member" => "user_group_member", "group_right" => "user_group_right");
	public static $adminLinks = array('grouplist' => 'Group management', 'groupadd' => 'Add group', 'userlist' => 'User Management', 'useradd' => 'Add a user', /*'userbanlist' => 'Ban List', 'userbanadd' => 'Ban a user/IP',*/ 'organisationlist' => 'Organisation management', 'organisationadd' => 'Add an organisation');

	public function __construct()
	{
		parent::__construct("User Management", "1.0");
	}
	
	public function render($arg)
	{
		switch($arg['display'])
		{
			case "userbar":
				Config::addOnloadFunction("userChatInit()");
				$f = "widget_userbar";
				break;
				
			case "search":
				$f = "user_search";
				
				$textarea_name = (array_key_exists("textarea_name", $arg)) ? $arg["textarea_name"] : "user_search_textarea";
				$this->tpl->assign("user_search_textarea_name", $textarea_name);
				
				$id_avoid = (array_key_exists("id_avoid", $arg)) ? $arg["id_avoid"] : "";
				
				break;
		}
		
		return $this->renderFile(PATH_PLUGIN."user/html/".$f.".html");
	}
}