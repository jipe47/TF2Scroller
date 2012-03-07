<?php
/**
 * Manages plugins.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Plugin
 */
class Plugins
{
	private static $plugins = array(); // $plugin name => $classname
	private static $adminLinks = array();
	
	/**
	 * Includes a plugin in the framework.
	 * @param string $name Plugin name.
	 * @param string $classname Class that implements the plugin.
	 * @throws Exception Throwned of the plugin already exists.
	 */
	public static function addPlugin($name, $classname)
	{
		//echo "<br />Insertion " . $name . " => " . $classname;
		if(array_key_exists($name, self::$plugins))
			throw new Exception("The plugin named '" . $name . "' already exists.");
		
		self::$plugins[$name] = $classname;
		
		$sqlT = pluginGetStaticAttribute($classname, 'sqlTables');
		
		if(isset($sqlT))
			Config::addSqlTable($sqlT);
		
		$rig = pluginGetStaticAttribute($classname, 'rights');
		if(isset($rig))
			Config::addArrayRight($rig);
		
		$adminL = pluginGetStaticAttribute($classname, 'adminLinks');
		if(isset($adminL) && count($adminL) > 0)
			self::$adminLinks[$name] = $adminL;
		
		$ini = pluginGetStaticAttribute($classname, 'ini');
		if(isset($ini) && count($ini) > 0)
			self::$ini[$name] = $ini;	
	}
	
	/**
	 * Returns admin links collected in the plugins.
	 * @return  Array where keys are plugin name and values are array
	 * 			an associative array (page argument => link name).
	 */
	public static function getAdminLinks()
	{
		return self::$adminLinks;
	}
	
	/**
	 * Returns an instance of a plugin.
	 * @param string $name Plugin name.
	 * @throws Exception Throwned of the plugin does not exist.
	 */
	public static function getPlugin($name)
	{
		if(!array_key_exists($name, self::$plugins))
			throw new Exception("The plugin '". $name . "' does not exist.");
		$p = self::$plugins[$name];
		return new $p();
	}
	
	/**
	 * Returns plugin list.
	 */
	public static function getPlugins()
	{
		return self::$plugins;
	}
	
	/**
	 * Includes the plugin situated in a path (php files as well as javascript
	 * and css folders) and register classes (based on their parent).
	 * @param string $path Path to the plugins.
	 * @todo Check if plugins alreay exists (I don't know what will happen!)
	 */
	public static function includePlugins($path)
	{
		$dir_handle= @opendir($path) or die("Cannot open <strong>" . $path . "</strong> for include.");
	
		$array_htmlheaders = array("js", "css");
	
		while($file = readdir($dir_handle))
		{
			if($file == "." || $file == ".." || $file == ".svn")
				continue;
	
			if(is_dir($path."/".$file))
			{
				$pdir = @opendir($path.$file) or die("Cannot open path of plugin <strong>" . $file . "</strong>.");
	
				while($f = readdir($pdir))
				{
					if($f == "." || $f == ".." || !is_dir($path.$file."/".$f))
						continue;
	
					if(in_array($f, $array_htmlheaders))
						HtmlHeaders::includeDir($f, $path.$file."/".$f);
					else if($f == "php")
						Config::includePath($path.$file."/".$f, false);
				}
	
				if(file_exists($path.$file."/config.ini"))
					Config::importIni($path.$file."/config.ini", $file);
			}
		}
	
		// Register classes : plugins, admin and request pages
		$classes = get_declared_classes();
	
		foreach($classes as $c)
		{
			if(is_subclass_of($c, "Plugin"))
			{
				$n = pluginGetStaticAttribute($c, 'name');
				$n  = $n != "" ? $n : $c;
				self::addPlugin($n, $c);
			}
			else if(is_subclass_of($c, "Page"))
			{
				eval($c.'::init();');
	
				$page_type = "page";
	
				$page_type = is_subclass_of($c, "AdminPage") 	? "admin" 	: $page_type;
				$page_type = is_subclass_of($c, "RequestPage") 	? "request" : $page_type;
				$page_type = is_subclass_of($c, "AjaxPage") 	? "ajax" 	: $page_type;
	
				//$n = pluginGetStaticAttribute($c, 'access_name');
				try{
					Page::register($c, $c, $page_type);
				}
				catch (Exception $e)
				{
				}
			}
		}
	}
} 


?>