<?php
/**
 * Represents a page executing requests, based on handler definition.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Page
 */
abstract class RequestPage extends HandlerPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
}