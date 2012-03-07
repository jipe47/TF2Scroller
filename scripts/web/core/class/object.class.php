<?php
/**
 * Represents a generic object of the architecture, with template and MySQL capabilities.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */

class Object
{
	protected $request, $tpl, $chrono;
	private $objectName;
	
	// Boolean to make sure basic vars are assigned only once.
	private static $isTplAssigned = false;
	
	public function __construct()
	{	
		$this->objectName = generateId(10);
		//global $reqVar;
		$this->request = getSqlRequest(); //&$reqVar;
		
		global $tpl;
		$this->tpl = &$tpl;
		
		global $chrono;
		$this->chrono = &$chrono;
		
		// Assignment of basic vars in the template.
		if(!self::$isTplAssigned)
		{
			self::$isTplAssigned = true;
			
			$this->tpl->assign("isAdmin", User::isAdmin());
			$this->tpl->assign("isConnected", User::isConnected());
			$this->tpl->assign("hasRight", User::hasRight());
			
			$this->tpl->assign("id_user", User::getId());
			$this->tpl->assign("user_nickname", User::getNickname());
			$this->tpl->assign("user_token", User::getToken());
			
			$this->tpl->assign("TPL", TPL);
			$this->tpl->assign("COMMON", PATH_TPL_COMMON);
			$this->tpl->assign("PATH_PLUGIN", PATH_PLUGIN);
			$this->tpl->assign("PATH_UPLOAD", PATH_UPLOAD);
			
			$this->tpl->assign("DATE_FORMAT", DATE_FORMAT);
			$this->tpl->assign("TIME_FORMAT", TIME_FORMAT);
			
			$this->tpl->assign("STRUCTURE_NAME", STRUCTURE_NAME);
		}
	}
	
	
	/**
	 * Assigns a value to a variable in the template.
	 * @param string $name The variable name.
	 * @param mixed $value The variable value.
	 */
	public function assign($name, $value)
	{
		$this->tpl->assign($name, $value);
	}
	
	/**
	 * Assigns multiple variable values.
	 * @param array_mixed $array Array where keys are variable names and values are variable values.
	 */
	public function assignArray($array)
	{
		foreach($array as $name => $value)
			$this->assign($name, $value);
	}

	/**
	 * Returns the render of a template file, or an empty string if a location is specified.
	 * @param string $f the file to render.
	 */
	protected function renderFile($f)
	{
		$renderId = generateId(10);
		try
		{
			$this->chrono->start('File render (id: '.$renderId.'): ' . $f);
		}
		catch(Exception $e) { }
		
		$r = $this->tpl->fetch($f);
		
		try
		{
			$this->chrono->stop('File render (id: '.$renderId.'): ' . $f);
		}
		catch(Exception $e) { }
		
		return $r;
	}
	
	/**
	 * Mutator for the object name.
	 * @param string $objectName New object name.
	 */
	public function setObjectName($objectName)
	{
		$this->objectName = $objectName;
	}
	
	/**
	 * Accessor for the object name.
	 * @return The object name.
	 */
	public function getObjectName()
	{
		return $this->objectName;
	}
}