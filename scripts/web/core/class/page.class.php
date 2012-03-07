<?php
/**
 * Represents a HTML page.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
abstract class Page extends Object
{
	/**
	 * Contains a location at which the user will be redirected.
	 * @var string
	 */
	private $location = -1;
	
	/** Page title
	* @var string */
	private $title = "";
	
	/** Template file path.
	* @var string */
	private $template_file;
	
	/** Arguments of the page.
	* @var string_array */
	protected $arg;
	
	/** Number of arguments.
	* @var int */
	protected $argc;
	
	/** Id groups that are allowed to access to this page.
	* @var int array */
	protected $array_group = array();
	
	/** Rights required to access to this page.
	* @var string array */
	protected $array_right = array();
	
	/** If set, *only* admin will be able to see this page.
	* @var boolean */
	protected $access_admin_only = false;
	
	/** If set, specified groups will be able to see this page.
	* @var boolean */
	protected $access_group = false;
	
	/** If set, specified rights will be able to see this page.
	* @var boolean */
	protected $access_right = false;
	
	/** If set, HTML headers will be included in the render of this page.
	 * @var boolean
	* */
	private $showHeaders = true;
	
	/**
	 * If not set, renders only html headers and main content 
	 * @var boolean
	 */
	private $fullRender = true;

	/** Types of access.
	* @var string */
	const GROUP = "group", RIGHT = "right", ADMIN = "admin", ALL = "all";
	
	/**
	 * Page register.
	 * @var array_string
	 */
	private static $register = array('page' => array(), 'admin' => array(), 'request' => array(), 'ajax' => array());

	public function __construct($arg)
	{
		parent::__construct();
		$this->arg = (is_array($arg)) ? $arg : array($arg);
		$this->argc = count($this->arg);
	}
	
	/**
	 * Method called when the page is registered.
	 */
	public static function init()
	{
		
	}
	
	/**********************************/
	/*** Alias Registration Methods ***/
	/**********************************/
	
	/**
	 * Returns the page register, for debug purpose ONLY.
	 */
	public static function getRegister()
	{
		return self::$register;
	}
	
	/**
	 * Register a page in a category.
	 * @param string $name Page name
	 * @param string $classname Class name associated to the page name
	 * @param string $type Type of page (admin, request or ajax)
	 * @throws Exception Throwned if the page name is reserved or already registered. 
	 */
	public static function register($name, $classname, $type = 'page')
	{
		if(!array_key_exists($name, self::$register[$type]) && !in_array($classname, self::$register[$type]))
			self::$register[$type][$name] = $classname;
		else if($type == 'page' && in_array($name, array("Admin", "Request", "Ajax")))
			throw new Exception("Reserved page name:" . $name);
		else
			throw new Exception('Already registered: ' . $name);
	}
	
	/**
	 * Get the class name associated to a page.
	 * @param string $name Page name.
	 * @param string $type Page type.
	 * @throws Exception Throwned if the page does not exist.
	 */
	public static function getPageClass($name, $type = 'page')
	{
		if(array_key_exists($name, self::$register[$type]))
			return self::$register[$type][$name];
		else
			throw new Exception("Unregistered page: '".$name."' ('".$type."')");
	}
	
	/**
	 * Shortcut to register a RequestPage.
	 * @param string $name Page name.
	 * @param string $classname Class name.
	 */
	protected static function registerRequest($name, $classname) {
		self::register($name, $classname, 'request');
	}
	/**
	 * Shortcut to register an AdminPage.
	 * @param string $name Page name.
	 * @param string $classname Class name.
	 */
	protected static function registerAdmin($name, $classname) {
		self::register($name, $classname, 'admin');
	}
	/**
	 * Shortcut to register an AjaxPage.
	 * @param string $name Page name.
	 * @param string $classname Class name.
	 */
	protected static function registerAjax($name, $classname) {
		self::register($name, $classname, 'ajax');
	}
	/**
	 * Shortcut to register a "normal" Page.
	 * @param string $name Page name.
	 * @param string $classname Class name.
	 */
	protected static function registerPage($name, $classname) {
		self::register($name, $classname, 'page');
	}
	
	/**
	 * Returns the page type of a class.
	 * @param string $classname Class name.
	 */
	protected function getClassType($classname)
	{
		if(is_subclass_of($classname, "AjaxPage"))
			return "ajax";
		else if(is_subclass_of($classname, "RequestPage"))
			return "request";
		else if(is_subclass_of($classname, "AdminPage"))
			return "admin";
		else
			return "page";
	}
	
	/***********************************/
	/*** Template and Render Methods ***/
	/***********************************/
	
	/**
	 * Generates the HTML code for the page.
	 * @return string HTML code.
	 */
	public function render() {
		
		if($this->userCanAccess())
		{
			if($this->hasLocation())
				return "";
	
			$rendu = $this->selfrender();
			if($this->showHeaders)
			{
				// Buffer
				$buffer = Config::getBuffer();
				$this->tpl->assign("buffer", $buffer);
	
				// Footer
				$footer = $this->hasFullRender() ? $this->renderClass("Footer") : "";
				$this->tpl->assign("footer", $footer);
	
				// Menu
				$menu = $this->hasFullRender() ? $this->renderClass("Menu") : "";
				$this->tpl->assign("menu", $menu);
	
				// Header (not the html ones !)
				$header = $this->hasFullRender() ? $this->renderClass("Header") : "";
				$this->tpl->assign("header", $header);
	
				// Messages
				$messages = !$this->hasLocation() ? $this->renderClass("Messages") : "";
				$this->tpl->assign("messages", $messages);
	
				// Debug div
				$debug = (Config::debug() && $this->hasFullRender()) ? $this->renderClass("Debugger") : "";
				$this->tpl->assign("debug", $debug);
	
				// Html Headers
				$this->tpl->assign("htmlheaders", HtmlHeaders::getHeaders());
	
				$prefix = Config::get("title_prefix");
	
				$this->tpl->assign("pagetitle", $prefix.$this->title);
	
				// Assign page content
				$this->tpl->assign("main_content", $rendu);
				$content = $this->renderFile(TPL."html/content.html");
				$this->tpl->assign("content", $content);
	
				// Loading of on(un)Load Javascript functions
				$this->tpl->assign("onloadFunctions", Config::getOnloadFunctions());
				$this->tpl->assign("onunloadFunctions", Config::getOnunloadFunctions());
	
				// Final render !
				$rendu = $this->renderFile(TPL."html/main.html");
	
			}
	
		}
		else
		{
			Log::add("Access Restricted : " . User::getId() . " in " . $this->getObjectName().  " (arg: ".implode(",", $this->arg).")", Log::ERROR);
			$error = new AccessError(array(42, "You are not allowed to access to this page", $this->getAccess()));
			$error->showHeaders($this->showHeaders);
			$rendu = $error->render();
		}
		
		return $rendu;
	}
	
	/**
	 * Changes the page template file.
	 * @param string $t The new template. */
	public function setTemplate($t)
	{
		$this->template_file = $t;
	}
	
	/**
	 * Activates or disables the full render mode.
	 * @param boolean $b True to activate the full render mode,
	 * 					 false otherwise.
	 */
	public function setFullRender($b)
	{
		$this->fullRender = $b;
	}
	
	/**
	 * Returns true if the full render mode is activated, false otherwise.
	 */
	public function hasFullRender()
	{
		return $this->fullRender;
	}
	
	/**
	 * Renders a class if it is defined.
	 * @param string $class Classname.
	 * @param string Class render.
	 */
	public function renderClass($class)
	{
		$this->chrono->start("Class render : ".$class);
		if(class_exists($class))
		{
			$f = new $class("");
			return $f->render();
		}
		else
			return "";
		$this->chrono->stop("Class render : ".$class);
	}
	
	/**
	 * If a ($)template is specified, renders it.
	 * @return string Render of $this->template_file.
	 * @see $template_file
	 */
	public function selfRender()
	{
		return (!empty($this->template_file)) ? $this->tpl->fetch($this->template_file) : "";
	}
	
	/**
	 * Displays or not HTML headers when the page is rendered.
	 * @param boolean $b True to display headers, false otherwise.
	 */
	public function showHeaders($b)
	{
		$this->showHeaders = $b;
	}
	
	/**
	 * Renders a template file, specified in argument or set by setTemplate, using Smarty.
	 * @param string $t Template path.
	 * @return string If a file is specified, renders it, otherwise if a file is set by setTemplate, renders it, otherwise returns an empty string.
	 * @see setTemplate
	 */
	public function renderTemplate()
	{
		if(func_num_args() == 0)
			if($this->template_file != "")
			$t = $this->template_file;
		else
			return "";
		else
			$t = func_get_arg(0);
	
		return $this->renderFile($t);
	}
	
	/**********************/
	/*** Access Methods ***/
	/**********************/
	
	/** Checks if the user can access to this page.
	 * @return boolean True if the user can access to this page, false otherwise.
	 */
	private function userCanAccess()
	{
		if(ALL_ACCESS || User::isAdmin() || (!$this->access_admin_only && !$this->access_group && !$this->access_right))
			return true;
	
		if($this->access_admin_only)
			return User::isAdmin();
	
		if($this->access_group && User::inGroup($this->array_group))
			return true;
	
		if($this->access_right && count($this->array_right) == 0 && User::hasRight())
			return true;
	
		if($this->access_right && User::hasRight($this->array_right))
			return true;
		return false;
	}
	
	/** Allows to add an access to a page. Other arguments will be used to specify groups or rights, exception if the access is set to "admin only".
	 * @param string $a Access.
	 */
	public function addAccess($a)
	{
		switch($a)
		{
			case self::GROUP:
				$this->access_group = true;
				$this->array_group = array_merge($this->array_group, array_slice(func_get_args(), 1));
				break;
	
			case self::RIGHT:
				$this->access_right = true;
				$rights = array_slice(func_get_args(), 1);
	
				if(count($rights) > 0)
					$this->array_right = array_merge($this->array_right, $rights);
	
				break;
	
			case self::ADMIN:
				$this->access_admin_only = true;
				break;
	
			case self::ALL:
				$this->access_admin_only = false;
				$this->access_group = false;
				$this->access_right = false;
				break;
		}
	}
	
	/**
	 * Removes an access to this page.
	 * @param string $a The access to remove (see Page::ADMIN|GROUP|RIGHT)
	 * @param boolean $clear_array Resets array containing allowed groups or rights.
	 */
	public function removeAccess($a, $clear_array = false)
	{
		switch($a)
		{
			case self::GROUP:
				$this->access_group = false;
				if($clear_array)
					$this->array_group = array();
				break;
	
			case self::RIGHT:
				$this->access_right = false;
				if($clear_array)
					$this->array_right = array();
				break;
	
			case self::ADMIN:
				$this->access_admin_only = false;
				break;
		}
	}
	
	/**
	 * Returns access settings.
	 * @return array Array with three keys : "admin_only" => boolean, "group" => id array, "right" => id array.
	 */
	public function getAccess()
	{
		return array("admin_only" => $this->access_admin_only, "group" => $this->array_group, "right" => $this->array_right);
	}

	/*********************/
	/*** Title Edition ***/
	/*********************/
	
	/**
	 * Changes the page title.
	 * @param string $t New title. */
	public function setTitle($title)
	{
		$this->title = $title;
	}
	
	/**
	 * Appends a string at the end of the title.
	 * @param string $t The string to append. */
	public function appendTitle($title)
	{
		$this->title = $this->title . $title;
	}
	
	/**
	 * Appends a string at the beginning of the title.
	 * @param string $t The string to append. */
	public function prependTitle($title)
	{
		$this->title = $title.$this->title;
	}
	
	/************************************/
	/*** Location/Redirection Methods ***/
	/************************************/
	
	/**
	 * Specifies a location at which the user will be redirected.
	 * @param string $l The location.
	 */
	public function setLocation($location)
	{
		$this->location = !empty($location) ? $location : Config::get("default_page");
	}
	
	/**
	 * Returns the location, an empty string if nothing is specified.
	 * @return string The location or an empty string if nothing is specified.
	 */
	public function getLocation()
	{
		return $this->location;
	}
	
	/**
	 * Returns if a location is specified.
	 * @return boolean true if a location is specified, false otherwise.
	 */
	public function hasLocation()
	{
		return $this->location != -1;
	}

}
?>
