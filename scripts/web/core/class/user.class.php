<?php 
/**
* Represents a user visiting the web site.
*
* @author Jean-Philippe Collette
* @package Core
* @subpackage Misc
*/
class User
{
	/**
	* Variables related to the user (self explanatory).
	*/
	protected static $id = -1, $nickname = "", $id_contact = "", $token = "";
	protected static $isConnected = false, $isAdmin = false;
	
	/**
	* Group ids the user belongs to.
	* @var int_array
	*/
	protected static $array_group = array();
	
	/**
	* Array which the user have.
	* @var string_array
	*/
	protected static $array_right = array();

	/**
	* Boolean used to determine if the user information have been loaded from sessions.
	* @var boolean
	*/
	protected static $isLoaded = false;
	
	
	/**
	* Contains any kind of information about a user.
	* @var array
	*/
	protected static $data = array();
	
	
	public function __toString()
	{
		return self::$nickname . "(" . self::$id . ")";
	}
	
	/***************/
	/** Accessors **/
	/***************/
	
	/**
	* Checks if the user can access to a specified page or not.
	* @param Page $page A reference to an instance of the class Page.
	* @return boolean True if the user is allowed, false otherwise.
	*/
	public static function canAccess($page)
	{
		self::checkLoad();
			
		return (ALL_ACCESS ||
				$page->getAccess() == Page::ALL ||
				self::$isAdmin || 
				($page->getAccess() == Page::GROUP && $page->canAccess($this->id)) ||
				($page->getAccess() == Page::RIGHT && count(self::$array_right) > 0));
	}
	
	/**
	* Checks if the user is the admin or not.
	* @return boolean Is an admin or not.
	*/
	public static function isAdmin()
	{
		self::checkLoad();
		return ALL_ACCESS || self::$isAdmin;
	}
	
	/**
	* Checks if the user is logged or not.
	* @return boolean Is logged or not.
	*/
	public static function isConnected()
	{
		self::checkLoad();
		return self::$isConnected;
	}
	
	/**
	* Checks if the user has one or multiple right(s) or not.
	* @return If no argument is specified, returns if the user has at least a right. If a string is specified, returns if the user has it. If a string array is specified, returns if the user has at least one of the specified right.
	*/
	public static function hasRight()
	{
		self::checkLoad();
		
		if(func_num_args() == 1)
			if(is_array(func_get_arg(0)))
			{
				foreach(func_get_arg(0) as $r)
					if(in_array($r, self::$array_right))
						return true;
				return false;
			}
			else
				return in_array(func_get_arg(0), self::$array_right);
		else
			return count(self::$array_right) > 0;
	}
	
	/**
	* Adds a single or multiple permanent right to the user. This right will last until the end of the session.
	* @param $a array_or_string A string or a string array that will be accorded to the user.
	*/
	public static function addRight($a)
	{
		self::checkLoad();
		if(!is_array($a) && !in_array($a, self::$array_right))
			self::$array_right[] = $a;
		else if (is_array($a))
			self::$array_right = array_merge(self::$array_right, $a);
		else
			self::$array_right[] = $a;
		
		// Save the object.
		self::updateLogObject();
	}
	
	/**
	* Returns rights assoicated to the user.
	* @return string_array Rights associated to the user.
	*/
	public static function getRight()
	{
		self::checkLoad();
		return self::$array_right;
	}
	
	/**
	* Checks if the user belongs to a set of groups or not.
	* @param int_array $groups Array of group id. 
	* @return boolean True if the user belongs to at least one group, false otherwise.
	*/
	public static function inGroup($groups)
	{
		self::checkLoad();
		foreach($groups as $g)
			if(in_array($g, self::$array_group))
				return true;
		return false;
	}
	
	/**
	* Returns group the user belongs to.
	* @return int_array Array of group id.
	*/
	public static function getGroup()
	{
		self::checkLoad();
		return self::$array_group;
	}
	
	/**
	* Returns the user id.
	* @return int The user id.
	*/
	public static function getId()
	{
		self::checkLoad();
		return self::$id;
	}
	
	public static function getContactId()
	{
		self::checkLoad();
		return self::$id_contact;
	}
	
	/**
	* Returns the user nickname.
	* @return string The user nickname.
	*/
	public static function getNickname()
	{
		self::checkLoad();
		return self::$nickname;
	}
	
	/**
	 * Returns the user's token.
	 * @return string User's token
	 */
	public static function getToken()
	{
		self::checkLoad();
		return self::$token;
	}
	
	/*******************************************/
	/** Load and update methods from sessions **/
	/*******************************************/
	
	/**
	* Checks if the user data have been loaded from session. If not, trigger the loading method.
	*/
	protected static function checkLoad()
	{
		if(!self::$isLoaded)
			self::loadUserObject();
	}
	
	/**
	* Loads user data from session.
	*/
	protected function loadUserObject()
	{
		if(!empty($_SESSION['cmp_user']))
		{
			$u = unserialize($_SESSION['cmp_user']);
		
			self::$array_group = $u['array_group'];
			self::$array_right = $u['array_right'];
			self::$id = $u['id'];
			self::$id_contact = $u['id_contact'];
			self::$isAdmin = $u['isAdmin'];
			self::$isConnected = $u['isConnected'];
			self::$nickname = $u['nickname'];
			self::$data = $u['data'];
			self::$token = $u['token'];
		}
		self::$isLoaded = true;
	}
	
	public static function reloadData()
	{
		self::loadId(self::$id);
	}
	/**
	* Loads user data from database.
	* @param int $id User id.
	*/
	public static function loadId($id)
	{
		if($id == 0)
			return;
		 
		$request = new SqlRequest();
		$info = $request->firstQuery("SELECT * FROM " . TABLE_USER . " WHERE id='" . $id . "'");
		
		if($request->getNbrResponse() == 1)
		{
			self::$id = intval($id);
			self::$isConnected = true;
			self::$id     = $id;
			self::$id_contact     = $info['id_contact'];
			self::$isAdmin = $info['isAdmin'];
			self::$nickname = $info['firstname']." ".$info['lastname'];
			self::$token = $info['token'];

			// Get groups
			$r = $request->fetchQuery("SELECT id_group FROM " . TABLE_GROUP_MEMBER . " WHERE id_user=" . self::$id);
			
			foreach($r as $l)
				self::$array_group[] = $l['id_group'];

			// Get group rights if the user belongs to a group
			if(count(self::$array_group) > 0)
			{
				$r = $request->fetchQuery("SELECT DISTINCT name FROM " . TABLE_GROUP_RIGHT . " WHERE id_group IN (". implode(", ",self::$array_group) .")");	
				
				foreach($r as $l)
					self::$array_right[] = $l['name'];
			}
		}
		self::updateLogObject();
	}
	
	/**
	* Saves the object state in a session.
	*/
	public function updateLogObject()
	{
		$a = array('array_group' => self::$array_group, 'array_right' => self::$array_right, 'id' => self::$id,
					'isAdmin' => self::$isAdmin, 'isConnected' => self::$isConnected, 'nickname' => self::$nickname,
					'data' => self::$data, 'id_contact' => self::$id_contact, 'token' => self::$token);
		$_SESSION['cmp_user'] = serialize($a);
	}
	
}
?>
