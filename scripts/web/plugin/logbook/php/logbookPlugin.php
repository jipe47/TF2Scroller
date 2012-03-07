<?php
/**
 * Logbook Plugin
 * This class allows the creating and display of a news stream.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Logbook
 */
class LogbookPlugin extends Plugin
{
	public static $name = "Logbook";
	public static $sqlTables = array("logbook");
	
	private $limit_entry_display = 5;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function render($arg)
	{
		// Select entries from workgroups of the user
		$workgroups = workgroup_getWorkgroupsByUser(User::getId());
		$id_workgroup = array();
		
		foreach($workgroups['workgroup'] as $w)
			if($w['id'] != "")
				$id_workgroup[$w['id']] = $w['isModerator'];
				
		//$where = count($id_workgroup) > 0 ? "WHERE type != 'workgroup' OR (type='workgroup' AND id_type IN (".implode(",", array_keys($id_workgroup))."))" : "";
				
		if(count($id_workgroup) == 0)
			$where = "";
		else
		{
			$where = "l.type != 'workgroup' OR (l.type='workgroup' AND l.id_type IN (".implode(",", array_keys($id_workgroup))."))";
			
			if(!User::isAdmin())
				$where = "(".$where.") AND l.type != 'admin'";
			$where = "WHERE " . $where;
		}	
		$array_entry = $this->request->fetchQuery("	SELECT l.*, u.firstname, u.lastname
													FROM " . TABLE_LOGBOOK . " l
													LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = l.id_user_add
													".$where." ORDER BY l.id DESC LIMIT 15");

		foreach($array_entry as $k => $v)
			if($v['admin'] && (!array_key_exists($v['id_type'], $id_workgroup) || !($id_workgroup[$v['id_type']] == "1")))
				unset($array_entry[$k]);
		
		$array_entry = array_values($array_entry);
		$this->assign("array_entry", $array_entry);
		
		$nbr_entry = count($array_entry);
		$this->assign("nbr_entry", $nbr_entry);

		$this->assign("limit_threshold", $this->limit_entry_display);
		$this->assign("enable_toggle", $nbr_entry > $this->limit_entry_display);
		
		return $this->renderFile(PATH_PLUGIN."logbook/html/widget.html");
	}
}
?>