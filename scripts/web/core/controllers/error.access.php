<?php
/**
 * Displays an access error.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class AccessError extends Error
{
	protected $accessError;
	// Arguments : array(code, desc, access)
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setTitle("Access Error");
		/*
		switch($this->accessError)
		{
			case Access::Admin:
				$this->desc = "Vous devez Ãªtre un administrateur.";
				break;
			case Access::Group:
				$this->desc = "Vous devez faire partie d'un groupe autorisÃ© Ã  accÃ©der Ã  cette page.";
				break;
			case Access::Right:
				$this->desc = "Vous devez possÃ©der au moins un droit d'administration.";
				break;
			default:
				$this->desc = "AccÃ¨s non spÃ©cifiÃ©";
				break;
		}*/
			
		$a = $arg[2];
		
		if($a['admin_only'])
			$this->desc = "Seuls les administrateurs ont le droit d'accÃ©der Ã  cette page.";
		else
		{
			$right = count($a['right']) > 0;
			$group = count($a['group']) > 0;
			
			if($right)
			{
				$this->desc = "Vous devez possÃ©der un des droits suivants :<ul>";
				foreach($a['right'] as $r)
					$this->desc .= "<li>".$r."</li>";
				$this->desc .= "</ul>";
			}
			if($group)
			{
				$info_group = $this->request->fetchQuery("SELECT id, name FROM " . TABLE_GROUP . " WHERE id IN (".implode(",", $a['group']).")");
				
				if(!$right)
					$this->desc .= "Vous devez possÃ©der un des droits suivants :<ul>";
				else
					$this->desc .= "ou vous devez possÃ©der un des droits suivants :<ul>";
				foreach($info_group as $g)
					$this->desc .= "<li>".$g['name']."</li>";
				$this->desc .= "</ul>";
			}
			
		}
	}
}
?>