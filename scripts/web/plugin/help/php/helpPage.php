<?php
class Help extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->showHeaders(true);
		$this->setTitle("Help");
	}
	
	public function selfrender()
	{
		return "aaaaaa";
	}
}