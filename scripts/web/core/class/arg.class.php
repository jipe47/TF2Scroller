<?php
/**
 * Helps the processing of arrays
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Misc
 */
class Arg
{
	private $arg = array();
	
	const DEFAULT_VALUE = "";
	const DEFAULT_INT = -1;
	const DEFAULT_BOOL = false;
	const DEFAULT_STRING = "";
	const DEFAULT_RAW = -1;
	
	public function __construct()
	{
		if(func_num_args() == 1)
			$this->arg = func_get_arg(0);
	}
	
	public function getAll()
	{
		return $this->arg;
	}
	
	public function makeLink()
	{
		$stuff = array();
		
		foreach($this->arg as $k => $v)
			$stuff[] = urlencode($k)."/".urlencode($v);
			
		return implode("/", $stuff);
	}
	
	public function getBoolean($key, $default)
	{
		if(array_key_exists($key, $this->arg))
			return (bool) $this->arg[$key];
		else
			return $default;
	}
	
	public function getString($key, $default)
	{
		if(array_key_exists($key, $this->arg))
			return (string) $this->arg[$key];
		else
			return $default;
	}
	
	
	public function setDefault($key, $value)
	{
		if(array_key_exists($key, $this->arg))
			return;
		$this->arg[$key] = $value;
	}
	
	public function unsetValue($key)
	{
		unset($this->arg[$key]);
	}
	
	
	
	public function raw($key, $default = self::DEFAULT_RAW)
	{
		if(array_key_exists($key, $this->arg))
			return $this->arg[$key];
		else
			return $default;
	}
	public function value($key, $default = self::DEFAULT_VALUE)
	{
		if(array_key_exists($key, $this->arg))
			if(!get_magic_quotes_gpc())
				return $this->arg[$key];
			else if(is_string($this->arg[$key]))
				return stripslashes($this->arg[$key]);
			else
				return $this->arg[$key];
		else
			return $default;
	}
	
	public function string($field, $default = self::DEFAULT_STRING)
	{
		return self::value($field, $default);
	}
	
	public function int($field, $default = self::DEFAULT_INT)
	{
		return !empty($this->arg[$field]) ? intval($this->arg[$field]) : $default;
	}
	
	public function bool($field, $default = self::DEFAULT_BOOL)
	{
		return !empty($this->arg[$field]) ? (bool)$this->arg[$field] : $default;
	}
	
	public function boolValue($field, $trueValue, $default = self::DEFAULT_BOOL)
	{
		return !empty($this->arg[$field]) ? $this->arg[$field] == $trueValue : $default;
	}
	
	public function __get($var)
	{
		return $this->value($var);
	}
	
	public function __set($k, $v)
	{
		$this->arg[$k] = $v;
	}
}
?>