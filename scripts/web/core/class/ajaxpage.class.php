<?php
/**
 * Represents an page designed for Ajax interaction. It is based on handler definition.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
abstract class AjaxPage extends HandlerPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
}
