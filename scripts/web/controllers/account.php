<?php
/**
 * Page that gather a user's information and allows him to edit them.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Account extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public function selfRender()
	{
		LocationBar::add("My Account", "?Account");
		
		$info_user = user_getUser(User::getId(), true);
		$this->tpl->assign("info_user", $info_user);
		
		$this->tpl->assign("array_org", user_getOrganisationByUser(User::getId()));

		$array_edit = array("editorganisation" => "Link to an Organisation", "avatar" => "New avatar", "userinfo" => "User Information", "password" => "New password", "login" => "New login", "email" => "New email address", "nickname" => "New nickname");
		
		if($this->argc == 0 || $this->arg[0] == "")
			$page = "home";
		else if(array_key_exists($this->arg[0], $array_edit))
		{
			$page = $this->arg[0];
			
			LocationBar::add($array_edit[$page], "?Account/".$page);
			$this->tpl->assign("edit_name", $array_edit[$page]);
			$this->tpl->assign("edit", $page);
			
			if($page == "editorganisation")
			{
				$id_org = intval($this->arg[1]);
				$this->assign("org", $this->request->firstQuery("SELECT * FROM " . TABLE_USER_ORGANISATION . " WHERE id_organisation='" . $id_org . "' AND id_user='" . User::getId() . "'"));
			}
		}
		else
		{
			$e = new Error(array(404, "Unknown section."));
			return $e->render();
		}
		
		$this->setTitle("My Account");
		$this->tpl->assign("account_page", $page);
		return $this->renderFile(PATH_TPL_COMMON."html/account.html");
	}
}
?>