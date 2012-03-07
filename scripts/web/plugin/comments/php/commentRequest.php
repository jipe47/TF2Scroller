<?php
/**
 * Comment Request
 * This class centralize every request related to the comments plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Comments
 */

class CommentRequest extends RequestPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	public static function init()
	{
		self::registerRequest("Comments", get_class());
	}
	public function handler($arg)
	{
		$this->setLocation("Home");
		if(!User::isConnected())
			return;
		
		if(count($arg) == 0) // New comment
		{
			$message = Post::value("comments_message");
			$title = Post::value("comments_title");
			$type = Post::value("comments_type");
			$id_type = Post::value("comments_id_type", 0);
			$a = array("type" => $type, "id_type" => $id_type, "title" => $title, "message" => $message, "ip" => $_SERVER['REMOTE_ADDR']);
			
			if(User::isConnected())
				$a['id_user'] = User::getId();
			else
				$a['anon_nickname'] = Post::value("nickname");
			
			$this->addComment($a);
			
			out::message("Your comment has been sent.", Message::SUCCESS);
			
			$this->setLocation(Post::value("back").Config::ARG_SEPARATOR."last");
		}
		else
			switch($arg[0])
			{
				case "delete":
					if(!User::isAdmin() && !User::hasRight("COMMENTS_DELETE"))
					{
						Messages::add("You cannot delete this comment.", Message::ERROR);
						return;
					}
			
					$id_comment = $arg[1];
			
			
					$this->request->query("DELETE FROM " . TABLE_COMMENTS . " WHERE id='" . $id_comment . "'");
			
					$backup = array_splice($arg, 2);
					$back = implode(Config::ARG_SEPARATOR, $backup);
					$this->setLocation($back);
			
					Messages::add("The comment has been deleted", Message::SUCCESS);
					break;
			
				case "edit":
					$id_comment = Post::value("id_comment", 0);
					$info = $this->request->firstQuery("SELECT * FROM " . TABLE_COMMENTS . " WHERE id='" . $id_comment . "'");
			
					if(!User::isAdmin() && !User::hasRight("COMMENTS_EDIT") && $info['id_user'] != User::getId())
					{
						Messages::add("You cannot edit this comment.", Message::ERROR);
						return;
					}
			
					$comment = Post::value("comment_message");
					$title = Post::value("comment_title");
					$this->request->query("UPDATE " . TABLE_COMMENTS . " SET message='" . $comment . "', title='" . $title . "' WHERE id='" . $id_comment . "'");
					out::message("The comment has been edited.", Message::SUCCESS);
					$this->setLocation(Post::value("back")."#".$id_comment);
					break;
			}
	}
	
	public function addComment($a)
	{
		$this->request->insert(TABLE_COMMENTS, $a);
	}
}