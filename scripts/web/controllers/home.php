<?php
/**
 * Home page
 * 
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Home extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setTitle("Home");
		
		LocationBar::add("Home", "?Home");

		if(!User::isConnected())
			$this->setLocation("Login");
		else
			$this->setTemplate(TPL."html/home.html");
		
	}
}