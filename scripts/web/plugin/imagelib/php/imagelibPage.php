<?php
class Imagelib extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setTemplate(HTML_IMAGELIB."home.html");
	}
}