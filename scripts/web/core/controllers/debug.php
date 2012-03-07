<?php
/**
 * Displays an amazing debug page.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Debugger extends Page
{
	public function selfrender()
	{
		if(!Config::debug())
			return "";
			
		$this->tpl->assign('nbrRequest', $this->request->getNbrRequest());
		$this->tpl->assign('array_chrono', $this->chrono->getTimes());
		$this->tpl->assign('array_request', $this->request->getRequests());
		$this->tpl->assign('array_log', Log::getEntries());
		$this->tpl->assign('array_session', $_SESSION);
		$this->tpl->assign('array_plugin', Plugins::getPlugins());
		$this->tpl->assign('array_cookie', ((count($_COOKIE) > 0) ? $_COOKIE : array()));
		$this->tpl->assign("array_right", User::getRight());
		$this->tpl->assign("array_group", implode(",", User::getGroup()));
		$this->tpl->assign("array_ini", Config::getAllIni());
		$this->tpl->assign("array_server", $_SERVER);
		$this->tpl->assign("array_all_right", Config::getRight());
		$this->assign("array_register", Page::getRegister());
		
		$this->setFullRender(false);
		$this->showHeaders(false);
		
		
		return $this->renderTemplate(PATH_TPL_COMMON."html/debug.html");
	}
}


?>