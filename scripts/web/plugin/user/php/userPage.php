<?php
/**
 * User page
 * This page displays any information related to a user.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */
class Member extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->showHeaders(true);
		$id_user = intval($arg[0]);
		$user = user_getUser($id_user, true);
		$this->assign("user", $user);
		
		LocationBar::add("Member");
		LocationBar::add($user['firstname']." ".$user['lastname']);
		
		$this->setTemplate(PATH_PLUGIN."user/html/user_page.html");
	}
}