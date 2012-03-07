<?php
/**
 * Used to access and modify miscellaneous architecture properties:
 * 	- rights;
 * 	- onload and unonload functions;
 * 	- buffer;
 * 	- debug state;
 * 	- INI files.
 *
 * It also allows recursive path inclusion.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
class Config
{

	private static $ini = array();

	/**
	 * Function names that will be added to the "onload" attribute of <body> tag.
	 * @var string_array
	 */
	private static $onload_functions = array();

	/**
	 * Function names that will be added to the "onunload" attribute of <body> tag.
	 * @var string_array
	 */
	private static $onunload_functions = array();

	/**
	 * List of declared SQL tables.
	 * @var string_array
	 */
	private static $sql_tables = array();

	/**
	 * Path to the template.
	 * @var string
	 */
	private static $tpl = "";

	/**
	 * Contains every declared rights.
	 * @var array_string
	 */
	private static $array_right = array();

	const ARG_SEPARATOR = "/";

	/**
	 * Is debug mode activated ?
	 * @var boolean
	 */
	private static $debug = DEBUG;

	/**
	 * Buffer displayed at the bottom of the page.
	 * @var string
	 */
	private static $buffer = "";


	/**********************/
	/*** Buffer Methods ***/
	/**********************/

	/**
	 * Appends data to the buffer.
	 * @param string $s Content that will be append to the buffer.
	 */
	public static function addToBuffer($s)
	{
		self::$buffer .= $s;
	}

	/**
	 * Get the content of the buffer.
	 * @return Content of the buffer.
	 */
	public static function getBuffer()
	{
		return self::$buffer;
	}

	/*********************/
	/*** MySQL Methods ***/
	/*********************/

	/**
	 * Defines constants that can be use in the architecture.
	 * The constant name depends on the value of CONSTANT_PREFIX and SQL_PREFIX, check /config/sql.php to modify them.
	 *
	 * @param string_or_string_array $t Array of sql table names, or a single table name.
	 * @param string $constant_prefix The prefix constant(s) have in the php code.
	 * @param string $sql_prefix The prefix sql tables have in the database.
	 * @throws Exception if a table is already defined.
	 */
	public static function addSqlTable($t, $constant_prefix = CONSTANT_PREFIX, $sql_prefix = SQL_PREFIX)
	{
		if(!is_array($t))
			$t = array($t);

		foreach($t as $constant_name => $table_name)
		{
			if(is_int($constant_name))
				$constant_name = $table_name;

			if(in_array($table_name, self::$sql_tables))
			{
				Log::add(LogMessageType::Error, "SQL table " . $table_name . " already declared.");
				throw new Exception("SQL table " . $table_name . " already declared.");
			}
			else
				define($constant_prefix.strtoupper($constant_name), $sql_prefix.$table_name);
		}
	}

	
	/***************************/
	/*** Ini-related Methods ***/
	/***************************/
	
	/**
	 * For debug purpose ONLY.
	 */
	public static function getAllIni()
	{
		return self::$ini;
	}
	
	/**
	 * Imports an ini file.
	 * @param string $path Path to the ini file.
	 * @param string $name Name used to access to the file content.
	 */
	public static function importIni($path, $name)
	{
		if(!array_key_exists($name, self::$ini))
			self::$ini[$name] = array();
	
		$array = parse_ini_file($path, true);
	
		foreach($array as $section => $v)
		{
			if(!array_key_exists($section, self::$ini[$name]))
				self::$ini[$name][$section] = array();
	
			foreach($v as $key => $value)
				self::$ini[$name][$section][$key] = $value;
		}
	}
	
	/**
	 * Gets ini value from the configuration file (config/config.ini) in the 
	 * "config" section.
	 * @param string $field Field name.
	 * @param string $default Default value, if the field does not exist.
	 */
	public static function get($field, $default = '')
	{
		return self::getIni(STRUCTURE_NAME, "config", $field, $default);
	}

	/**
	 * Gets a value from an ini file.
	 * @param string $name Name to access to the ini file.
	 * @param string $section Section name.
	 * @param string $field Field name.
	 * @param string $default Default value if the file, section or field does
	 * 				 not exist.
	 */
	public static function getIni($name, $section, $field, $default = '')
	{
		if(	!array_key_exists($name, self::$ini) ||
				!array_key_exists($section, self::$ini[$name]) ||
				!array_key_exists($field, self::$ini[$name][$section]))
			return $default;
		else
			return self::$ini[$name][$section][$field];
	}
	
	/**
	 * Changes an ini value. The name or the section are created if they do
	 * not exist. 
	 * 
	 * @param string $name Name to access to the ini file.
	 * @param string $section Section name.
	 * @param string $field Field name.
	 * @param string $value New value of the field
	 */
	public static function setIni($name, $section, $field, $value)
	{
		if(!array_key_exists($name, self::$ini))
			self::$ini[$name] = array();
		
		if(!array_key_exists($section, self::$ini[$name]))
			self::$ini[$name][$section] = array();
		
		self::$ini[$sections][$field] = $value;
	}
	
	/*********************/
	/*** Right Methods ***/
	/*********************/
	
	/**
	 * Adds a right.
	 * @param string $r The right to add.
	 */
	public static function addRight($right)
	{
		self::$array_right[] = $right;
	}
	
	/**
	 * Adds an array of rights
	 * @param string_array $a An array of strings, the rights to add.
	 */
	public static function addArrayRight($rights)
	{
		self::$array_right = array_merge(self::$array_right, $rights);
	}
	
	/**
	 * Gets all declared rights.
	 * @return string_array Every declared rights.
	 */
	public static function getRight()
	{
		return self::$array_right;
	}
	
	/*********************/
	/*** Debug Methods ***/
	/*********************/
	
	/**
	 * Enables or disables the debug mode.
	 * @param boolean $b true to activate the debug mode, false otherwise.
	 */
	public static function setDebug($b)
	{
		self::$debug = $b;
	}
	
	/**
	 * Checks if the debug mode is enabled or not.
	 */
	public static function debug()
	{
		return self::$debug;
	}
	
	/*********************************************/
	/*** Onload and Unonload functions Methods ***/
	/*********************************************/
	
	/**
	 * Adds an onload function.
	 * @param string $fname Function name.
	 * @throw Exception if the function has already been entered.
	 */
	public static function addOnloadFunction($fname)
	{
		if(!in_array($fname, self::$onload_functions))
			self::$onload_functions[] = $fname;
		else
			throw new Exception("Onload function '".$fname."' already specified.");
	}
	
	/**
	 * Adds an onunload function.
	 * @param string $fname Function name.
	 * @throw Exception if the function has already been entered.
	 */
	public static function addOnunloadFunction($fname)
	{
		if(!in_array($fname, self::$onunload_functions))
			self::$onunload_functions[] = $fname;
		else
			throw new Exception("Onunload function '".$fname."' already specified.");
	}
	
	/**
	 * Erases onload functions that were previously added
	 */
	public static function flushOnloadFunction()
	{
		self::$onload_functions = array();
	}
	
	/**
	 * Erases onunload functions that were previously added
	 */
	public static function flushOnunloadFunction()
	{
		self::$onunload_functions = array();
	}
	
	/**
	 * Returns a string containing every specified onload functions.
	 * @return string Function calls separated by ";".
	 */
	public static function getOnloadFunctions()
	{
		return implode(";", self::$onload_functions);
	}
	
	/**
	 * Returns a string containing every specified onunload functions.
	 * @return string Function calls separated by ";".
	 */
	public static function getOnunloadFunctions()
	{
		return implode(";", self::$onunload_functions);
	}
	
	/********************/
	/*** Misc Methods ***/
	/*********************/
	
	/**
	 * Generates a link.
	 * @param string_array_or_string $arg Link data.
	 */
	public static function mkLink($arg)
	{
		if(is_array($arg))
			return "?".implode(self::ARG_SEPARATOR, $arg);
		else
			return "?".$arg;
	}
	
	/**
	 * Gets arguments sended to the current page.
	 * @return string_array The arguments of the page.
	 */
	public static function getPageArg()
	{
		return explode(self::ARG_SEPARATOR, $_SERVER['QUERY_STRING']);
	}
	
	/**
	 * Includes recursively a directory. It skips svn folders, and executes a
	 * "require_once" on php files.
	 * 
	 * @param string $path Path to the directory.
	 * @param boolean $recursive If set, the include is recursive.
	 */
	public static function includePath($path, $recursive = true)
	{
		$dir_handle= @opendir($path) or die("Cannot open <strong>" . $path . "</strong> for include");
		while($file = readdir($dir_handle))
		{
			if($file == "." ||$file == ".." || $file == ".svn")
				continue;
	
			$pathinfo = pathinfo($path."/".$file, PATHINFO_EXTENSION);
	
			if(is_dir($path."/".$file) && $recursive)
				self::includePath($path."/".$file);
			else if($pathinfo == "php")
				require_once $path."/".$file;
		}
	}
	
	/**
	 * Specifies a template and includes all required files.
	 * @param string $t the template name.
	 * @throws Exception if the template does not exist.
	 */
	public static function loadTemplate($t)
	{
		$folder = PATH_TPL.$t;
	
		if(!is_dir($folder))
			throw new Exception("The template does not exists");
	
		self::$tpl = $folder;
	
		HtmlHeaders::includeDir("css", $folder."/css");
		HtmlHeaders::includeDir("js", $folder."/js");
	}
	
}
?>