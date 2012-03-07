<?php
/**
 * Footer used in the full render of a page.
 * 
 * @author Jean-Philippe Collette
 * @package Controllers
 */
class Footer extends Page
{
	public function __construct()
	{
		parent::__construct("");
		$this->setTemplate("tpl/default/html/footer.html");
		$this->tpl->assign('webmaster_name', 'Jean-Philippe Collette');
		$start = 2011;
		$currentY = date("Y", time());
		
		if($start != $currentY)
			$cy = $start."-".$currentY;
		else
			$cy = $start;
		$this->tpl->assign('copyright_year', $cy);
		
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
}