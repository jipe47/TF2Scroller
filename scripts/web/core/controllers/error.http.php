<?php
/**
 * Displays a HTTP error.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class HttpError extends Error
{
	private $array_error = array("404" =>"Not found");
	private $default_message = "Undefined HTTP error.";
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setTitle("HTTP Error");
		$this->code = $arg;
		if(array_key_exists($this->code, $this->array_error))
			$this->desc = $this->array_error[$this->code];
		else
			$this->desc = $this->default_message;
	}
	
}
?>