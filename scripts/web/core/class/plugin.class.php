<?php
/**
 * Represents a plugin.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Plugin
 */
abstract class Plugin extends Object
{	
	public static $rights = null;
	public static $ini = null;
	public static $sqlTables = null;
	public static $adminLinks = null;
	
	public function __construct()
	{
		parent::__construct();
	}
	abstract function render($arg);
}