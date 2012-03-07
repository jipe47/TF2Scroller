<?php
/**
 * Edition Page
 * This page allows a user to edit a comment.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Comments
 */
class Editcomment extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		
		$this->setTemplate(PATH_PLUGIN."comments/html/edit_comment.html");
		$this->setTitle("Comment editing");
		
		$id_comment = intval($arg[0]);
		$back = implode(Config::ARG_SEPARATOR, array_splice($arg, 1));
		$info = $this->request->firstQuery("SELECT * FROM " . TABLE_COMMENTS . " WHERE id='" . $id_comment . "'");
		
		$this->tpl->assign("id_comment", $id_comment);
		$this->tpl->assign("comment_message", $info['message']);
		$this->tpl->assign("comment_title", $info['title']);
		$this->tpl->assign("back", $back);
		$this->showHeaders(true);
		
		$this->tpl->assign("canEdit", User::isConnected() && (User::isAdmin() || User::getId() == $info['id_user'] || User::hasRight("COMMENTS_EDIT")));
	}
}