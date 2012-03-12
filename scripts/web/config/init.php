<?php
/**
 * This file initialises the framework: it includes every mandatory files, 
 * plugins are imported, the template is loaded and request and template 
 * objets are instantiated.
 * 
 * @author Jean-Philippe Collette
 */

require_once "const.inc.php";

// Triggered when calling an undefined class.
function __autoload($name)
{
	$f = PATH."core/class/". strtolower($name) .".class.php";

	if(file_exists($f))
		require_once $f;

	$f = PATH."core/controllers/". strtolower($name) .".php";

	if(file_exists($f))
		require_once $f;
}

require_once PATH."core/class/chrono.class.php";
$chrono = new Chrono();

Config::importIni(PATH."config/config.ini", STRUCTURE_NAME);

// Recursive include of basic classes and functions
$chrono->start("Class inclusion");
Config::includePath(PATH."core/class/");
Config::includePath(PATH."core/inc/");
Config::includePath(PATH."core/controllers/");
Config::includePath(PATH."controllers/");
$chrono->stop("Class inclusion");

// Include external libraries
HtmlHeaders::includeDir("js", "lib/jquery");


require_once PATH."lib/smarty/Smarty.class.php";


// Include plugins
$chrono->start("Plugin inclusion");
Plugins::includePlugins("plugin/");
$chrono->stop("Plugin inclusion");

// Template loading
$chrono->start("Template inclusion");
Config::loadTemplate(Config::get("template"));
$chrono->stop("Template inclusion");

$chrono->start("Common template inclusion");
Config::loadTemplate("common");
$chrono->stop("Common template inclusion");

// Favicon
//<link rel="icon" type="image/png" href="favicon.png">
//<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
$favheader = new HtmlHeader(HtmlHeader::LINK);
$favheader->set("rel", "icon");
$favheader->set("type", "image/png");
$favheader->set("href", TPL."images/favicon.png");
HtmlHeaders::addHeader($favheader);

$favheader = clone $favheader;
$favheader->set("rel", "shortcut icon");
HtmlHeaders::addHeader($favheader);

$tpl = new Smarty();
$reqVar = new SqlRequest();
?>
