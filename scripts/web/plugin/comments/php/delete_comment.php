<?php
/**
 * Suppression Page
 * This page asks to confirm the suppression of a comment.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Comments
 */
class Deletecomment extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		
		$this->setTemplate(PATH_PLUGIN."comments/html/delete_comment.html");
		$this->setTitle("Comment deleting");
		
		$id_comment = intval($arg[0]);
		$back = implode(Config::ARG_SEPARATOR, array_splice($arg, 1));
		
		$this->tpl->assign("id_comment", $id_comment);
		$this->tpl->assign("back", $back);
		$this->showHeaders(true);
		
		$this->tpl->assign("canDelete", User::isConnected() && (User::isAdmin() || User::hasRight("COMMENTS_DELETE")));
	}
}