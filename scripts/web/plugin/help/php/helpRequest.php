<?php
/**
 * Help Requests
 * This class centralize every request related to the help plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Help
 */
class HelpRequest extends RequestPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerRequest("Help", get_class());
	}
	
	public function handler($arg)
	{
		$back = "Admin/Help/list";
		
		switch($arg[0])
		{
			case "addedit":
				$title = Post::string("title");
				$content = Post::string("content");
				$code = Post::string("code");
				$array = array('title' => $title, 'content' => $content, 'code' => $code);
				$id = Post::int("id", -1);
		
				if($id == -1)
					$this->request->insert(TABLE_HELP_PAGE, $array);
				else
					$this->request->update(TABLE_HELP_PAGE, 'id="' . $id . '"', $array);
		
				$m = $id == -1 ? "Help page correctly added." : "Help page correctly edited.";
				out::message($m, Message::SUCCESS);
				break;
		
		
			case "delete":
				$id = intval($arg[1]);
				$this->request->query("DELETE FROM " . TABLE_HELP_PAGE . " WHERE id='" . $id .  "'");
				out::message("Help page correctly deleted.", Message::SUCCESS);
				break;
		}
		
		$this->setLocation($back);
	}
}