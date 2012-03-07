<?php
/**
 * Announce Requests
 * This class centralize every request related to the announce plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Announce
 */
class AnnounceRequest extends RequestPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerRequest("Announce", get_class());
	}
	
	public function handler($arg)
	{
		switch($arg[0])
		{
			case "addedit":
				$id = Post::int("id");
				$title = Post::string("title");
				$link = Post::string("link");
		
				$array = array('title' => $title, 'link' => $link);
				if($id == -1)
				{
					$array['id_user_add'] = User::getId();
					$this->request->insert(TABLE_ANNOUNCE, $array);
					$m = "Announce added.";
				}
				else
				{
					$this->request->update(TABLE_ANNOUNCE, "id='".$id."'", $array);
					$m = "Announce edited.";
				}
				out::message($m, Message::SUCCESS);
				break;
		
			case "delete":
				$id = intval($arg[1]);
				$this->request->query("DELETE FROM " . TABLE_ANNOUNCE . " WHERE id='" . $id . "'");
				out::message("Announce deleted.", Message::SUCCESS);
				break;
		}
		$this->setLocation("Admin/Announce/list");
	}
}