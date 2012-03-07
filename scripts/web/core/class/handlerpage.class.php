<?php
/**
 * Makes a class able to define handlers.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
abstract class HandlerPage extends Page
{
	private $handlers = array();
	private $defaultHandler = -1;
	
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public function selfRender()
	{
		$arg = $this->arg;
		unset($arg[0]);
		return $this->handler(array_values($arg));
	}
	
	/**
	 * Registers a handler.
	 * @param string $handler Handler name.
	 * @param string $methodname Method name associated to the handler.
	 */
	protected function registerHandler($handler, $methodname)
	{
		$this->handlers[$handler] = $methodname;
	}
	
	/**
	 * Specify a default handler.
	 * @param string $methodname Method name.
	 */
	protected function registerDefaultHandler($methodname)
	{
		$this->defaultHandler = $methodname;
	}
	// Executed if not overloaded by subclass
	
	/**
	 * Executes a handler based on the page arguments.
	 * @param array $arg arguments
	 * @throws Exception Throwned if the handler does not exist and 
	 * 					 if no default handler is specified.
	 */
	public function handler($arg)
	{
		$argc = count($arg);
				
		if($argc == 0)
		{
			if($this->defaultHandler == -1)
				throw new Exception("Undefined (default) handle name.");
			else
				$handlername = $this->defaultHandler;
		}
		else 
		{
			if(array_key_exists($arg[0], $this->handlers))
				$handlername = $arg[0];
			else if($this->defaultHandler != -1)
				$handlername = $this->defaultHandler;
			else
				throw new Exception("Undefined (default) handle name.");
		}
		
		$fromDefault = ($argc == 0 && $this->defaultHandler != -1) || ($argc > 0 && !array_key_exists($arg[0], $this->handlers) && $this->defaultHandler != -1);
		
		if(!$fromDefault)
		{
			unset($arg[0]);
			$arg = array_values($arg);
		}
		
		$name = $this->arg[0];
		$classname = self::getPageClass($name, $this->getClassType($name));
		
		$methodname = $fromDefault ? $this->defaultHandler : $this->handlers[$handlername];
		
	/*	if(method_exists($methodname, $classname))
			throw new Exception('Undefined method in ' . $classname . ' : ' . $methodname);
		*/
		/*
		$fromDefault = false;
		$handlername = "";
	
		if($argc == 0 && $this->defaultHandler == -1)
			throw new Exception("Undefined (default) handle name.");
		else if($argc > 0 && $arg[0] != "")
			$handlername = $arg[0];
		else if($this->defaultHandler != -1)
			$fromDefault = true;
		else
			throw new Exception("Undefined (default) handle name.");
		
		$name = $this->arg[0];
	
		$classname = self::getPageClass($name, $this->getClassType($name));
	
		if(!$fromDefault && !array_key_exists($handlername, $this->handlers))
			throw new Exception("Unregistered handler in ".$classname.": '".$handlername."'");
	
		unset($arg[0]);
		$arg = array_values($arg);
	
		if($fromDefault)
			$method = $this->defaultHandler;
		else
			$method = $this->handlers[$handlername];
	
		if(method_exists($method, $classname))
			throw new Exception('Undefined method in ' . $classname . ' : ' . $method);
		*/
		return $this->$methodname($arg);
	}
}