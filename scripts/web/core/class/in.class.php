<?php
/**
* Interface to access input data.
* 
* @author Jean-Philippe Collette
* @package Core
* @subpackage IO
*/
class in
{
	/**
	* Returns a piece of post data, or a default value if it does not exist.
	* @param string $key Post field.
	* @param any $default Default value if $key does not exist.
	* @return string Post value if $key exists, $default otherwise.
	*/
	public static function post($key, $default = Post::DEFAULT_VALUE)
	{
		return Post::value($key, $default);
	}
	
	/**
	* Returns a piece of get data, or a default value if it does not exist.
	* @param string $key Get field.
	* @param any $default Default value if $key does not exist.
	* @return string Get value if $key exists, $default otherwise.
	*/
	public static function get($key, $default = Get::DEFAULT_VALUE)
	{
		return Get::value($key, $default);
	}
}
?>