<?php
/**
 * User Administration
 * This page groups administration handles for the user plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */

class UserAdmin extends AdminPage
{
	public static $name = "User";
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerAdmin("User", get_class());
	}
	
	public function handler($arg)
	{
		LocationBar::add("User Management", "?Admin/User");
		$argc = count($arg);
		
		if($argc == 0)
			return $this->renderFile(PATH_PLUGIN."user/html/user_admin.html");
		
		$name_page = array();
		$link_page = array();
		
		$admin_title = "";
		
		$code_help = "";
		
		switch($arg[0])
		{
			case "groupdelete":
				$id_group = intval($arg[1]);
				$info = $this->request->firstQuery("SELECT * FROM " .TABLE_GROUP . " WHERE id='" . $id_group . "'");
				$this->tpl->assign("info", $info);
				
				$this->assign("members", user_getGroupMembers($id_group));
				$this->assign("array_group", user_getGroups());
				$f = "group_delete";
				
				
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/grouplist";
				
				$name_page[] = "Group Suppression";
				$link_page[] = "";
				break;
			case "groupadd":
				$this->assign("array_right", Config::getRight());
				$f = "group_add";
				
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/grouplist";
				
				$name_page[] = "Add Group";
				$link_page[] = "";
				break;
			case "groupedit":
				$id = intval($arg[1]);
				$info = $this->request->firstQuery("SELECT * FROM " .TABLE_GROUP . " WHERE id='" . $id . "'");
				$this->tpl->assign("info", $info);
				$f = "group_edit";
				
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/grouplist";
				
				$name_page[] = "Edit Group";
				$link_page[] = "";
				break;
				
			case "grouplist":
				$groups = user_getGroups();
				$this->tpl->assign("array_group", $groups);
				
				// TODO rassembler cette requÃªte avec celle de rÃ©cupÃ©ration des groupes
				$count = $this->request->fetchQuery("SELECT COUNT(*) as cnt, id_group FROM " . TABLE_GROUP_MEMBER . " GROUP BY id_group");
				$array_count = array();
				
				foreach($groups as $g)
					$array_count[$g['id']] = 0;
				foreach($count as $c)
					$array_count[$c['id_group']] = $c['cnt'];
				$this->assign("array_count", $array_count);
				
				$f = "group_list";
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/grouplist";
				$code_help = "user_admin_group_list";
				break;
				
			case "groupright":
				$id = intval($arg[1]);
				$info = $this->request->firstQuery("SELECT * FROM " . TABLE_GROUP . " WHERE id='" . $id . "'");
				$this->tpl->assign("info", $info);
				
				$array_right = $this->request->fetchQuery("SELECT * FROM " . TABLE_GROUP_RIGHT . " WHERE id_group='" . $id . "'");
				
				
				$a = array();
				foreach($array_right as $r)
					$a[] = $r['name'];
					
				$all_right =  Config::getRight();
				
				$group_right = array();
				foreach($all_right as $v => $d)
				{
					if(in_array($v, $a))
					{
						unset($all_right[$v]);
						$group_right[] = array('name' => $v, 'description' => $d);
					}
				}
				$this->tpl->assign("array_right", $group_right);
				$this->tpl->assign("all_right", $all_right);
				
				$f = "group_right";
				
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/User/grouplist";
				
				$name_page[] = "Rights of ".$info['name'];
				$link_page[] = "?Admin/groupright/".$id;
				
				
				$code_help = "user_admin_group_right";
				break;
				
			case "groupmember":
				$f = "group_member";
				
				$id = intval($arg[1]);
				$array_user = $this->request->fetchQuery("SELECT u.firstname, u.lastname, u.id
														FROM " . TABLE_GROUP_MEMBER . " m
														LEFT JOIN " . TABLE_USER . " u ON u.id = m.id_user
														WHERE m.id_group='" . $id . "'
														ORDER BY u.firstname, u.lastname");
				$this->tpl->assign("array_user", $array_user);
				
				$a = array();
				
				foreach($array_user as $u)
					$a[] = $u['id'];
				
				$info = user_getGroup($id);
				$this->tpl->assign("info", $info);
				
				if(count($a) > 0)
					$where = "WHERE id NOT IN (".implode(", ", $a).")";
				else
					$where = "";
				
				$all_user = $this->request->fetchQuery("SELECT * FROM " .TABLE_USER . " ".$where);
				$this->tpl->assign("all_user", $all_user);
				$this->tpl->assign("id_avoid", implode(";", $a));
				
				
				$name_page[] = "Group Management";
				$link_page[] = "?Admin/grouplist";
				
				$name_page[] = "Members of ". $info['name'];
				$link_page[] = "?Admin/groupmember/".$id;
				break;
			
			case "userlist":
				$this->tpl->assign("array_user", $this->request->fetchQuery("SELECT * FROM " . TABLE_USER . " ORDER BY lastname, firstname"));
				$f = "user_list";
				$name_page[] = "User list";
				$link_page[] = "";
				$code_help = "user_admin_user_list";
				break;
			
			case "userdelete":
				$info = $this->request->firstQuery("SELECT * FROM " . TABLE_USER . " WHERE id='" . intval($arg[1]) . "'");
				$this->tpl->assign("info", $info);
				$f = "user_delete";
				$name_page[] = "User Suppression";
				$link_page[] = "";
				break;
				
			case "userbanadd":
				$id_user = ($argc > 2) ? intval($this->arg[1]) : -1;
				
				$array_user = $this->request->fetchQuery("SELECT id, nickname FROM " . TABLE_USER . " ORDER BY nickname");
				$this->tpl->assign("array_user", $array_user);
				
				$f = "user_ban_add";
				break;
				
			case "userbanedit":
				$id = intval($arg[1]);
				$info = $this->request->firstQuery("SELECT b.*, u.nickname FROM " . TABLE_USER_BAN . " b LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = b.id_user WHERE b.id='" . $id . "'");
				$this->tpl->assign("info", $info);
				$f = "user_ban_edit";
				break;
			
			case "userbandelete":
				$id = intval($arg[1]);
				$info = $this->request->firstQuery("SELECT b.*, u.nickname FROM " . TABLE_USER_BAN . " b LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = b.id_user WHERE b.id='" . $id . "'");
				$this->tpl->assign("info", $info);
				$f = "user_ban_delete";
				break;
				
			case "userbanlist":
				$array_ban = $this->request->fetchQuery("SELECT b.*, u.nickname FROM " . TABLE_USER_BAN . " b LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = b.id_user");
				$this->tpl->assign("array_ban", $array_ban);
				$f = "user_ban_list";
				break;
				
			case "useredit":
			case "useradd":
				$array_group = user_getGroups();
				$this->tpl->assign("array_group", $array_group);
				
				$array_org = user_getOrganisations();
				$this->tpl->assign("array_org", $array_org);
				
				$array_user_org = array();
				$array_user_group = array();
				
				if($arg[0] == "useradd")
				{
					$info = array('isAdmin' => 0, 'id_user' => -1, 'id_contact' => 0, 'mobile' => '', 'login' => '', 'firstname' => '', 'lastname' => '', 'email' => '', 'title' => '', 'job' => '', 'street' => '', 'number' => '', 'postal' => '', 'city' => '', 'country' => '', 'phone' => '', 'fax' => '', 'website' => '');
					$info['id'] = -1;
					
					$textbutton = "Add";
					$action = "New";
					$name_page[] = "Add User";
					$link_page[] = "";
				}
				else
				{
					$id_user = intval($arg[1]);
					$this->assign("id_user", $id_user);
					$info = $this->request->firstQuery("SELECT u.*, c.title, c.street, c.number, c.postal, c.city, c.phone, c.fax, c.mobile, c.website, c.country
														FROM " . TABLE_USER . " u
														LEFT OUTER JOIN " . TABLE_CONTACT . " c
															ON c.id = u.id_contact
														WHERE u.id='" . $id_user . "'");
					
					$user_groups = user_getGroupsByUser($id_user);
					foreach($user_groups as $g)
						$array_user_group[] = $g['id'];
					
					$user_orgs = user_getOrganisationByUser($id_user);
					foreach($user_orgs as $o)
						$array_user_org[$o['id']] = array('job' => $o['job'], 'isSubstitute' => $o['isSubstitute'], 'isContact' => $o['isContact']);

					$textbutton = "Edit";
					$action = "Edit";
					
					$name_page[] = "Edit User";
					$link_page[] = "";
				}
				
				$this->assign("array_user_group", $array_user_group);
				$this->assign("array_user_org", $array_user_org);

				$this->tpl->assign("info", $info);
				$this->tpl->assign("textbutton", $textbutton);
				$this->tpl->assign("action", $action);
				
				$f = "user_addedit";
				break;
				
			case "usergroup":
				$id_user = intval($arg[1]);
				$user = user_getUser($id_user);
				$this->assign("user", $user);
				
				$ids_group = array();
				
				foreach($user['groups'] as $g)
					$ids_group[] = $g['id'];
				
				$where = "";
				if(count($ids_group) > 0)
					$where = " WHERE id NOT IN (".implode(",", $ids_group).")";
				
				$array_group = $this->request->fetchQuery("SELECT * FROM " . TABLE_GROUP . " ".$where);
				$this->assign("array_group", $array_group);
				
				$name_page[] = "Groups of ".$user['firstname']. " ".$user['lastname'];
				$link_page[] = "";
				$f = "user_group";
				break;
				
			case "organisationadd":
			case "organisationedit":
				$id = -1;
				$name = "";
				$description = "";
				$logo = "";
				$submit = "Add";
				
				$fromaccount = false;
				
				if($arg[0] == "organisationedit")
				{
				
					$fromaccount = (count($arg) > 2 && $arg[2] == "fromaccount");
				
					$id = intval($arg[1]);
					$info = user_getOrganisation($id);
					$name = $info['name'];
					$description = $info['description'];
					$logo = $info['logo'];
					
					$submit = "Edit";
					
					$name_page[] = "Edit Organisation";
				}
				else
					$name_page[] = "Add Organisation";
					
				$link_page[] = "";
				$array = array('id' => $id, 'fromaccount' => $fromaccount, 'name' => $name, 'description' => $description, 'logo' => $logo, 'submit' => $submit);
				$this->assignArray($array);
			
				$f = "organisation_addedit";
				break;
				
			case "organisationlist":
				$array_org = user_getOrganisations();
				$this->assign('array_org', $array_org);
				
				// TODO rassembler cette requÃªte avec celle de rÃ©cupÃ©ration des organisations
				$count = $this->request->fetchQuery("SELECT COUNT(*) as cnt, id_organisation FROM " . TABLE_USER_ORGANISATION . " GROUP BY id_organisation");
				$array_count = array();
				
				foreach($array_org as $o)
					$array_count[$o['id']] = 0;
				foreach($count as $c)
					$array_count[$c['id_organisation']] = $c['cnt'];
				$this->assign("array_count", $array_count);
				
				$f = "organisation_list";
				$name_page[] = "Organisation Management";
				$link_page[] = "";
				$code_help = "user_admin_organisation_list";
				break;
				
			case "organisationdelete":
				$id_org = intval($arg[1]);
				$org = $this->request->firstQuery("SELECT * FROM " . TABLE_ORGANISATION . " WHERE id='" . $id_org . "'");
				$this->assign('org', $org);
				
				$members = $this->request->fetchQuery("SELECT u.* FROM " . TABLE_USER_ORGANISATION. " o LEFT JOIN " . TABLE_USER . " u ON u.id = o.id_user WHERE id_organisation='" . $id_org . "'");
				$this->assign('members', $members);
				
				if($this->request->getNbrResponse() > 0)
				{
					$array_org = $this->request->fetchQuery("SELECT * FROM " . TABLE_ORGANISATION . " WHERE id != '".$id_org."'");
					$this->assign("array_org", $array_org);
				}
				$name_page[] = "Organisation Suppression";
				$link_page[] = "";
				$f = "organisation_delete";
				break;
				
			case "organisationmember":
				$id_org = intval($arg[1]);
				$org = $this->request->firstQuery("SELECT * FROM " . TABLE_ORGANISATION . " WHERE id='" . $id_org . "'");
				$this->assign('org', $org);
				
				$members = $this->request->fetchQuery("	SELECT u.*, o.isContact, o.isSubstitute, o.job 
														FROM " . TABLE_USER_ORGANISATION. " o 
														LEFT JOIN " . TABLE_USER . " u ON u.id = o.id_user 
														WHERE id_organisation='" . $id_org . "'
														ORDER BY o.isContact DESC, o.isSubstitute DESC, u.lastname, u.firstname
														");
				$this->assign('array_member', $members);
				
				$member_add = $this->request->fetchQuery("SELECT * FROM " . TABLE_USER . " WHERE id NOT IN
															(SELECT id_user as id FROM " . TABLE_USER_ORGANISATION . " WHERE id_organisation='" . $id_org . "') ORDER BY firstname, lastname");
				$this->assign("array_member_add", $member_add);
				$f = "organisation_member";
				$name_page[] = "Organisation Members";
				$link_page[] = "";
				break;
		}
		
		if($admin_title == "" && count($name_page) > 0)
			$admin_title = $name_page[count($name_page) - 1];
		
		foreach($name_page as $k => $n)
			LocationBar::add($n, $link_page[$k]);
		
		$content_render = $this->renderFile(PATH_PLUGIN."user/html/" . $f . ".html");
		$this->assign("content_render", $content_render);
		$this->assign("admin_title", $admin_title);
		
		$this->assign("code_help", $code_help);
		
		return $this->renderFile(PATH_PLUGIN."user/html/container.html");
	}
}