<?php
/**
 * Menu used in the full render of a page.
 * 
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Menu extends Page
{
	public function __construct()
	{
		parent::__construct("");
		$array = workgroup_getWorkgroupsByUser(User::getId(), WORKGROUP_SHOW_ACCEPTED | WORKGROUP_SHOW_UNARCHIVED | WORKGROUP_SHOW_ENABLED);

		$this->assign('array_workgroup_participant', $array['workgroup']);
		
		$this->setTemplate("tpl/default/html/menu.html");
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
}
?>