<?php
/**
 * Generates subpanels based on admin links (defined by plugins).
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class AdminPanel extends Page
{
	public function __construct()
	{
		parent::__construct(array());
		//$this->addAccess(Page::RIGHT);
		$this->setTitle("Admin Menu");
		$this->setTemplate(PATH_TPL_COMMON."html/admin.html");
		$this->tpl->assign('array_plugin', Plugins::getAdminLinks());
	}
}