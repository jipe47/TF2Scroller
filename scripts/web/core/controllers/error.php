<?php
/**
 * Displays an error.
 *
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Error extends Page
{
	protected $code, $desc; // Code et description de l'erreur
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setTitle("Erreur");
		$this->code = $arg[0];
		$this->desc = (count($arg) > 1) ? $arg[1] : "Pas de description";
		$this->showHeaders(true);
	}
	public function selfRender()
	{
		$this->tpl->assign("error_code", $this->code);
		$this->tpl->assign("error_message", $this->desc);
		return $this->renderTemplate(PATH_TPL_COMMON."html/error/error_access.html");
	}
}
?>