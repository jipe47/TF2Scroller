<?php
/**
 * Organisation page
 * This page displays any information related to an organisation.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */
class Organisation extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		
		$id_org = intval($arg[0]);
		$info = user_getOrganisation($id_org, true);
	
		$contact = "";
		$substitute = "";
	
		foreach($info['members'] as $k => $m)
		{
			if($m['isContact'])
			{
				$contact = $m;
				unset($info['members'][$k]);
				continue;
			}
			if($m['isSubstitute'])
			{
				$substitute = $m;
				unset($info['members'][$k]);
				continue;
			}
		}
		
		$info['contact'] = $contact;
		$info['substitute'] = $substitute;
		
		$this->assign("org", $info);
		
		
		LocationBar::add("Organisation");
		LocationBar::add($info['name']);
		
		$this->setTemplate(PATH_PLUGIN."user/html/organisation_page.html");
	}
}