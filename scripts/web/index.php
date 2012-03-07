<?php
/**
 * Access Page.
 * @author Jean-Philippe Collette
 * @package Core
 */
session_start();
require_once "config/init.php";

$query_string = $_SERVER['QUERY_STRING'];

//header("Location: ?".Config::get("default_page"));
if(empty($query_string))
	$array_query = array(Config::get("default_page"));
else
	$array_query = explode(Config::ARG_SEPARATOR, $query_string);

$argc = count($array_query);

/* If the user wants to identify or if identification cookies exist, redirect
 * him to the appropriate page. */
if(	!User::isConnected() && !empty($_COOKIE['cmp_login']) 
	&& !empty($_COOKIE['cmp_password']) 
	&& ($argc == 0 || ($argc > 0 && $array_query[0] != "Request")))
	$array_query = array_merge(array('Request', STRUCTURE_NAME, 'login_cookie'), $array_query);

$page = $array_query[0];

switch($page)
{
	case "Request":
	case "Admin":
	case "Ajax":
		try
		{
			$page = strtolower($page);
			$name = $array_query[1];
			$classname = Page::getPageClass($name, $page);
			
			$class = new $classname(array_slice($array_query, 1));
		}
		catch(Exception $e)
		{
			$class = new HttpError(404);
		}
		break;
	
	default:
		try
		{
			$classname = Page::getPageClass($page);
			
			/* If the page is a subclass of HandlerPage, keep the first 
			 * argument to allow the class retreival. */
			$arg = is_subclass_of($classname, "HandlerPage") ? $array_query : array_splice($array_query, 1);
			$class = new $classname($arg);
		}
		catch(Exception $e)
		{
			$class = new HttpError(404);
		}
}

$class->setObjectName($page);
$render = $class->render();

if($class->hasLocation())
	header("Location: ?".$class->getLocation());		
else if(!empty($class))
	echo $render;
?>
