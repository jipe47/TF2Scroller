<?php
/**
 * Handler used in the full render of a page.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Header extends Page
{
	public function __construct()
	{
		parent::__construct("");
		$this->setTemplate("tpl/default/html/header.html");
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
}