<?php
/**
 * Interface with $_GET.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage IO
 */
class Get
{
	const DEFAULT_VALUE = "";
	const DEFAULT_INT = -1;
	const DEFAULT_BOOL = false;
	const DEFAULT_STRING = "";
	const DEFAULT_RAW = -1;
	
	public static function raw($key, $default = self::DEFAULT_RAW)
	{
		if(array_key_exists($key, $_GET))
			return $_GET[$key];
		else
			return $default;
	}
	public static function value($key, $default = self::DEFAULT_VALUE)
	{
		if(array_key_exists($key, $_GET))
			if(!get_magic_quotes_gpc())
				return $_GET[$key];
			else if(is_string($_GET[$key]))
				return stripslashes($_GET[$key]);
			else
				return $_GET[$key];
		else
			return $default;
	}
	
	public static function string($field, $default = self::DEFAULT_STRING)
	{
		return self::value($field, $default);
	}
	
	public static function int($field, $default = self::DEFAULT_INT)
	{
		return !empty($_GET[$field]) ? intval($_GET[$field]) : $default;
	}
	
	public static function bool($field, $default = self::DEFAULT_BOOL)
	{
		return !empty($_GET[$field]) ? (bool)$_GET[$field] : $default;
	}
	
	public static function boolValue($field, $trueValue, $default = self::DEFAULT_BOOL)
	{
		return !empty($_GET[$field]) ? $_GET[$field] == $trueValue : $default;
	}
	
	public function __get($var)
	{
		return self::value($var);
	}
}
?>