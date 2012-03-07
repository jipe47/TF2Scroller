<?php
/**
 * Represents an administration page, based on handler definition.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
abstract class AdminPage extends HandlerPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		LocationBar::add("Administration", "?AdminPanel");
	}
}