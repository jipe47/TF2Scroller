<?php
/**
* Interface to send output data.
* 
* @author Jean-Philippe Collette
* @package Core
* @subpackage IO
*/
class out
{
	/**
	* Adds an entry in the logbook.
	* @param string $message The message which will be recorded.
	* @param string $type The type of message (see Log::INFO|SUCCESS|WARNING|CONFIRM|ERROR)
	*/
	public static function log($message, $type = Log::INFO)
	{
		Log::add($message, $type);
	}
	
	/**
	* Displays a message in the current page, if no redirection is specified
	* @param string $message The message which will be displayed.
	* @param string $type The type of message (see Message::INFO|SUCCESS|WARNING|VALIDATION|ERROR)
	*/
	public static function message($message, $type = Message::INFO)
	{
		Messages::add($message, $type);
	}
}

?>