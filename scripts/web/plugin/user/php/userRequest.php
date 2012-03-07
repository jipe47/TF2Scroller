<?php
/**
 * User Requests
 * This class centralize every request related to the user plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */
class UserRequest extends RequestPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}

	public static function init()
	{
		self::registerRequest("User", get_class());
	}

	public function handler($arg)
	{
		switch($arg[0])
		{
			case "setcontact":
			case "setsubstitute":
		
				$field = ($arg[0] == "setcontact") ? "isContact" : "isSubstitute";
		
				$id_org = intval($arg[1]);
				$id_user = intval($arg[2]);
				$value = intval($arg[3]) % 2;
		
				// There can be only one
				if($value == 1)
					$this->request->query("UPDATE " . TABLE_USER_ORGANISATION . " SET ".$field." = 0 WHERE id_organisation='" . $id_org . "'");
		
				$this->request->query("UPDATE " . TABLE_USER_ORGANISATION . " SET ".$field." = ".$value . " WHERE id_organisation='" . $id_org . "' AND id_user='" . $id_user . "'");
		
				out::message("Member status updated.", Message::SUCCESS);
				$back = "Admin/User/organisationmember/".$id_org;
				break;
		
			case 'organisationaddedit':
				$id = Post::int("id");
				$name = Post::string("name");
				$description = Post::string("description");
				$delete_logo = Post::boolValue("delete_logo", "on");
				$fromaccount = Post::bool("fromaccount", false);
				$filename = FileUpload::moveFile("file", "user/organisation");
		
				if(FileUpload::isError($filename))
					$filename = "";
				else
				{
					$path = PATH_UPLOAD."user/organisation/";
					ImageProcessing::redim($path.$filename, $path."mini/".$filename, 200, 200);
				}
				$array = array('name' => $name, 'description' => $description);
				if($id == -1)
				{
					if($filename != "")
						$array['logo'] = $filename;
		
					$this->request->insert(TABLE_ORGANISATION, $array);
					$id = $this->request->getLastId();
					$m = "Organisation added.";
					Logbook::addEntry("organisation", $id, "The organisation ".$name." has been added.", "add", true);
				}
				else
				{
					if(!$delete_logo && $filename != "")
						$array['logo'] = $filename;
					else if($delete_logo)
						$array['logo'] = "";
		
					$this->request->update(TABLE_ORGANISATION, "id='" . $id . "'", $array);
					$m = "Organisation edited.";
					Logbook::addEntry("organisation", $id, "The organisation ".$name." has been edited.", "edit", true);
				}
				out::message($m, Message::SUCCESS);
		
				if(!$fromaccount)
					$back = "Admin/User/organisationlist";
				else
					$back = "Account";
				break;
		
			case "organisationdelete":
				$id = Post::int("id");
				/*
				 if($action == "move" && $id_move != -1)
					$this->request->update(TABLE_USER_ORGANISATION, "id_organisation='" . $id . "'", array('id_organisation' => $id_move));
				*/
		
				$action = Post::string("action");
				$id_move = Post::int("id_move");
				
				$org = user_getOrganisation($id, false);
		
				// Could be just an update, but may cause duplicates : a member belongs twice to a group.
				// TODO: find a magic SQL request (and also apply it for groupdelete)
				if($action == "move")
				{
					$members = user_getOrganisationMembers($id_move);
					$array_id = array();
		
					foreach($members as $m)
						$array_id[] = $m['id'];
		
					$members = user_getGroupMembers($id);
		
					foreach($members as $m)
						if(!in_array($m['id'], $array_id))
						$this->request->update(TABLE_GROUP_MEMBER, "id_group='".$id."' AND id_user='".$m['id']."'", array('id_group' => $id_move));
				}
		
				$this->request->query("DELETE FROM " . TABLE_ORGANISATION . " WHERE id='" . $id . "'");
				
				Logbook::addEntry("organisation", $id, "The organisation ".$org['name']." has been deleted.", "delete", true);
				out::message("The organisation has been deleted.", Message::SUCCESS);
				
				$back = "Admin/User/organisationlist";
				break;
		
			case "organisationaddmember":
				$id_org = Post::int("id_organisation");
				$id_user = Post::int("id_user");
				$job = Post::string("job");
				$this->request->insert(TABLE_USER_ORGANISATION, array('id_organisation' => $id_org, 'id_user' => $id_user, 'job' => $job));
				out::message("Member added to this organisation.", Message::SUCCESS);
				$back = "Admin/User/organisationmember/".$id_org;
				break;
		
			case "organisationdeletemember":
				$id_org = intval($arg[1]);
				$id_user = intval($arg[2]);
				$this->request->query("DELETE FROM " . TABLE_USER_ORGANISATION . " WHERE id_organisation='".$id_org."' AND id_user='".$id_user."'");
				out::message("Member removed from this organisation.", Message::SUCCESS);
				$back = "Admin/User/organisationmember/".$id_org;
				break;
		
		
			case 'groupadd':
			case 'groupedit':
				$name = Post::value('name');
				$a = array('name' => $name, 'description' => Post::value('description'));
		
				$id = Post::value('id', -1);
		
				if($id == -1)
				{
					$this->request->insert(TABLE_GROUP, $a);
					$id = $this->request->getLastId();
					$rights = $_POST['rights'];
		
					if(!empty($rights))
						foreach($rights as $r)
						$this->request->insert(TABLE_GROUP_RIGHT, array('id_group' => $id, 'name' => $r));
		
					Logbook::addEntry("group", $id, "The group ".$name." has been added.", "add", true);
		
					$m = "Group added.";
				}
				else
				{
					$this->request->update(TABLE_GROUP, "id='" . $id . "'", $a);
					$m = "Group edited.";
					
					Logbook::addEntry("group", $id, "The group ".$name." has been edited.", "edit", true);
				}
				Messages::add($m, Message::SUCCESS);
		
				$back = "Admin/User/grouplist";
				break;
		
			case 'groupdelete':
				$id = Post::value('id');
		
				$action = Post::string("action");
				$id_move = Post::int("id_move");
		
				// Could be just an update, but may cause duplicates : a member belongs twice to a group.
				// TODO: find a magic SQL request (and apply it for organisationdelete)
				if($action == "move")
				{
					$members = user_getGroupMembers($id_move);
					$array_id = array();
		
					foreach($members as $m)
						$array_id[] = $m['id'];
		
					$members = user_getGroupMembers($id);
		
					foreach($members as $m)
						if(!in_array($m['id'], $array_id))
						$this->request->update(TABLE_GROUP_MEMBER, "id_group='".$id."' AND id_user='".$m['id']."'", array('id_group' => $id_move));
				}
		
				$group = user_getGroup($id);
				
				$this->request->query("DELETE FROM " . TABLE_GROUP . " WHERE id='" . $id . "'");
				
				Messages::add("Group deleted.", Message::SUCCESS);
				Logbook::addEntry("group", $id, "The group ".$group['name']." has been deleted.", "delete", true);
				
				$back = "Admin/User/grouplist";
				break;
		
			case "grouprightadd":
				$id_group = intval(Post::value("id_group"));
				$a = array('id_group' => $id_group, 'name' => Post::value("name"));
				Messages::add("Right correctly added.", Message::SUCCESS);
				$this->request->insert(TABLE_GROUP_RIGHT, $a);
				$back = "Admin/User/groupright/".$id_group;
				break;
		
			case "grouprightdelete":
				$id_group = intval(Post::value("id_group"));
		
				$all = $this->request->fetchQuery("SELECT * FROM " .TABLE_GROUP_RIGHT . " WHERE id_group='" . $id_group . "'");
				$a = array();
				foreach($all as $r)
					if(Post::value("right_".$r['name'], -1) != -1)
					$a[] = "'".$r['name']."'";
				$this->request->query("DELETE FROM " . TABLE_GROUP_RIGHT . " WHERE id_group='" . $id_group . "' AND name IN (" . implode(", ", $a) . ")");
				Messages::add("Right correctly deleted.", Message::SUCCESS);
				$back = "Admin/User/groupright/".$id_group;
				break;
		
			case "groupmemberdelete":
				$id_group = intval($arg[1]);
				$id_user = intval($arg[2]);
				$this->request->query("DELETE FROM " . TABLE_GROUP_MEMBER . " WHERE id_group='" . $id_group . "' AND id_user='" . $id_user . "'");
				Messages::add("Member removed.", Message::SUCCESS);
				$back = "Admin/User/groupmember/".$id_group;
				break;
		
			case "groupmemberadd":
				$id_group = intval(Post::value("id_group"));
		
				//$a = array('id_group' => $id_group,  'id_user' => intval(Post::value("id_user")));
		
				$a = array();
		
				$users = explode(";", Post::value("users_to_add"));
		
				foreach($users as $u)
				{
					$u = intval($u);
		
					if($u == 0)
						continue;
		
					$a[] = array($id_group, $u);
				}
		
				$this->request->insertAll(TABLE_GROUP_MEMBER, array('id_group', 'id_user'), $a);
				Messages::add("User(s) added : ".Post::value("users_to_add"), Message::SUCCESS);
				$back = "Admin/User/groupmember/".$id_group;
				break;
		
		
			case "useradd":
			case "useredit":
				$back = "Admin/User/userlist";
		
				$login = Post::value("login");
				$pass1 = Post::value("pass1");
				$pass2 = Post::value("pass2");
				$id_user = Post::int("id_user", -1);
		
				$isAdmin = Post::boolValue("admin", "on", false);
				$continue = $id_user != -1 || ($this->request->count(TABLE_USER, "login='" . $login."'") == 0);
		
				if(!$continue)
				{
					Messages::add("Login already exists.", Message::ERROR);
					break;
				}
		
				if($id_user == -1 && $pass1 == "")
				{
					Messages::add("You must enter a password.", Message::ERROR);
					break;
				}
		
				if($pass1 != $pass2)
				{
					Messages::add("Passwords are different.", Message::ERROR);
					break;
				}
		
				$contactEntry = Post::boolValue("createContactEntry", "on");
				$id_contact = Post::int("id_contact");
		
				$title = Post::string("title");
				$street = Post::string("street");
				$number = Post::string("number");
				$postal = Post::string("postal");
				$city = Post::string("city");
				$phone = Post::string("phone");
				$fax = Post::string("fax");
				$website = Post::string("website");
				$country = Post::string("country");
				$mobile = Post::string("mobile");
		
				$groups = Post::raw("groups", array());
				$orgs = Post::raw("organisations", array());
				$contact = Post::raw("contact", array());
				$substitute = Post::raw("substitute", array());
		
				$firstname = Post::string("firstname");
				$lastname = Post::string("lastname");
				$email = Post::string("email");
				$email2 = Post::string("email2");
		
				$message = ($id_user == -1) ? "The user has been added." : "The user has been edited.";
		
				$info_contact = array(	'mobile' => $mobile, 'country' => $country, 'title' => $title, 'street' => $street,
						'number' => $number, 'postal' => $postal, 'city' => $city, 'phone' => $phone,
						'fax' => $fax, 'website' => $website, 'email' => $email, 'email2' => $email2,
						'firstname' => $firstname, 'lastname' => $lastname);
		
				$info = array(	'login' => $login, 'email' => $email, 'lastname' => $lastname,
						'firstname' => $firstname, 'isAdmin' => $isAdmin);
		
				if($pass1 != "")
					$info['password'] = md5($pass1);
		
				if($id_user == -1)
				{
					if($contactEntry)
					{
						$this->request->insert(TABLE_CONTACT, $info_contact);
						$id_contact = $this->request->getLastId();
						$info['id_contact'] = $id_contact;
					}
		
					$this->request->insert(TABLE_USER, $info);
					$id_user = $this->request->getLastId();
		
					foreach($groups as $g)
						$this->request->insert(TABLE_GROUP_MEMBER, array('id_user' => $id_user, 'id_group' => $g));
		
					foreach($orgs as $o)
					{
						$array = array('id_user' => $id_user, 'id_organisation' => $o, 'job' => Post::string("job_".$o));
		
						if(in_array($o, $contact))
							$array['isContact'] = 1;
						else if(in_array($o, $substitute))
							$array['isSubstitute'] = 1;
						$this->request->insert(TABLE_USER_ORGANISATION, $array);
					}
					$new_org = Post::string("new_org");
		
					if($new_org != "")
					{
						$job = Post::string("job_new");
						$this->request->insert(TABLE_ORGANISATION, array('name' => $new_org));
						$id_org = $this->request->getLastId();
						$this->request->insert(TABLE_USER_ORGANISATION, array('id_user' => $id_user, 'id_organisation' => $id_org, 'job' => $job));
					}
					
					Logbook::addEntry("user", $id, "The user ".$firstname." ".$lastname."  has been added.", "add", true);
				}
				else
				{
		
					if($contactEntry)
					{
						if($id_contact == "" || $id_contact == -1)
						{
							$this->request->insert(TABLE_CONTACT, $info_contact);
							$id_contact = $this->request->getLastId();
							$info['id_contact'] = $id_contact;
						}
						else
						{
							$this->request->update(TABLE_CONTACT, "id='" . $id_contact . "'", $info_contact);
						}
					}
					else
					{
						if($id_contact != "" && $id_contact != -1)
							$this->request->query("DELETE FROM " . TABLE_CONTACT . " WHERE id='" . $id_contact . "'");
					}
		
		
					$this->request->update(TABLE_USER, "id='" . $id_user . "'", $info);
		
					// Edit group membership
					$current_group = array();
					$user_groups = user_getGroupsByUser($id_user);
					foreach($user_groups as $g)
						$current_group[] = $g['id'];
		
					$group_membership_todelete = array();
		
					foreach($groups as $g)
						if(!in_array($g, $current_group))
						$group_membership_todelete[] = $g;
		
					if(count($group_membership_todelete) > 0)
						$this->request->query("DELETE FROM " . TABLE_GROUP_MEMBER . " WHERE id_user='" . $id_user . "' AND id_group IN (".implode(",", $group_membership_todelete).")");
		
					// Edit organisation membership
					$current_org = array();
					$user_orgs = user_getOrganisationByUser($id_user);
					foreach($user_orgs as $o)
						$current_org[$o['id']] = array('job' => $o['job'], 'isSubstitute' => $o['isSubstitute'], 'isContact' => $o['isContact']);
		
					$org_membership_todelete = array();
					$org_membership_toupdate = array();
		
					foreach($orgs as $o)
						if(!array_key_exists($o, $current_org))
						$org_membership_todelete[] = $o;
					else
					{
						$data = array('job' => $_POST['job_'.$o], 'isContact' => in_array($o, $contact), 'isSubstitute' => in_array($o, $substitute));
						if(array_compare($current_org[$o], $data) != 0)
							$org_membership_toupdate[$o] = $data;
					}
		
					if(count($org_membership_todelete))
						$this->request->query("DELETE FROM " . TABLE_USER_ORGANISATION . " WHERE id_user='" . $id_user . "' AND id_organisation IN (".implode(",", $org_membership_todelete).")");
		
					// TODO: enhance with http://www.frihost.com/forums/vt-68316.html
					if(count($org_membership_toupdate))
						foreach($org_membership_toupdate as $id => $data)
						$this->request->update(TABLE_USER_ORGANISATION, "id_organisation='" . $id . "' AND id_user='" . $id_user . "'", $data);
					
					Logbook::addEntry("user", $id, "The user ".$firstname." ".$lastname."  has been edited.", "edit", true);
				}
				Messages::add($message, Message::SUCCESS);
				break;
		
			case "usereditorganisation":
				$id_user = Post::int("id_user");
				$id_org = Post::int("id_organisation");
				$job = Post::string("job");
		
				$this->request->update(TABLE_USER_ORGANISATION, "id_user='" . $id_user . "' AND id_organisation='" . $id_org . "'", array('job' => $job));
				out::message("Job edited.", Message::SUCCESS);
				$back = "Admin/User/organisationmember/".$id_org;
				break;
		
			case "userdelete":
		
				$id_user = Post::value("id_user");
				$user = user_getUser($id_user);
				$this->request->query("DELETE FROM " . TABLE_USER . " WHERE id='" . $id_user . "'");
				$back = "Admin/User/userlist";
				Messages::add("The user has been deleted.", Message::SUCCESS);
				Logbook::addEntry("user", $id, "The user ".$user['firstname']." ".$user['lastname']."  has been deleted.", "delete", true);
				break;
		
			case "userjoingroup":
				$id_user = Post::int("id_user");
				$groups = Post::raw("groups", array());
		
				foreach($groups as $g)
					$this->request->insert(TABLE_GROUP_MEMBER, array('id_user' => $id_user, 'id_group' => $g));
		
				$back = "Admin/User/usergroup/".$id_user;
				out::message("User added to group(s).", Message::SUCCESS);
				break;
		
			case "userkick":
				$id_user = intval($arg[1]);
				$id_group = intval($arg[2]);
				$this->request->query("DELETE FROM " .TABLE_GROUP_MEMBER . " WHERE id_user='" . $id_user . "' AND id_group='" . $id_group . "'");
				$back = "Admin/User/usergroup/".$id_user;
				out::message("User kicked from group.", Message::SUCCESS);
				break;
		}
		$this->setLocation($back);
	}
}