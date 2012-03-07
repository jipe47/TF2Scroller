<?php
/**
 * Allows loging in.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Login extends Page
{
	public static $BAD_PASSWORD = 1;
	public static $BAD_LOGIN = 2;
	public static $BAD_FORM = 3;
	
	public function __construct($arg) // [error__NUM__,]back
	{
		parent::__construct($arg);
		
		$this->setTemplate(PATH_TPL_COMMON."html/login.html");
		$this->showHeaders(true);
		
		if($this->argc > 0)
		{
			$first_arg = $arg[0];
			if($first_arg == "retreive")
			{
				LocationBar::addLink("Account Retreival", "?Login/retreive");
				$this->setTemplate(PATH_TPL_COMMON."html/login_retreive.html");
			}
			else if(strlen($first_arg) > 5 && substr($first_arg, 0, 5) == "error")
			{
				$num = substr($first_arg, 5, 1);
				$m = "Undefined error.";
				if($num == self::$BAD_LOGIN)
					$m = "Bad login";
				else if($num == self::$BAD_PASSWORD)
					$m = "Bad password";
				else if($num == self::$BAD_FORM)
					$m = "Form not completed";
					
				Messages::add($m, Message::ERROR);
			
				unset($arg[0]);
			}
		}
		$this->tpl->assign("back", implode(Config::ARG_SEPARATOR, $arg));
	}
}