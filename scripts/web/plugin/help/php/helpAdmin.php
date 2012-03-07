<?php
/**
 * Help Administration
 * This page groups administration handles for the help plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Help
 */

class HelpAdmin extends AdminPage
{
	public static $name = "Help";
	
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerAdmin("Help", get_class());
	}
	
	public function handler($arg)
	{
		$argc = count($arg);
		LocationBar::add("Help", "?Admin/Help/list");
		switch($arg[0])
		{
			case "add":
			case "edit":
				$id = -1;
				$title = "";
				$code = "";
				$content = "";
		
				if($arg[0] == "edit")
				{
					$id = intval($arg[1]);
					$info = help_getPageById($id);
					$title = $info['title'];
					$code = $info['code'];
					$content = $info['content'];
		
					$submit = "Edit";
					LocationBar::add("Edit Page");
				}
				else
				{
					$submit = "Add";
					LocationBar::add("New Page");
		
					if($argc == 2)
						$code = $arg[1];
				}
		
				$this->assignArray(array('title' => $title, 'code' => $code, 'content' => $content, 'id' => $id, 'submit' => $submit));
				$f = "addedit";
				break;
		
			case "list":
				$this->assign("array_help", help_getPages());
				$f = "list";
				break;
		}
		
		return $this->renderFile(PATH_PLUGIN."help/html/admin/".$f.".html");
		
	}
}