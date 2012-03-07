<?php
/**
 * Logbook Class
 * This class allows you to add messages to a (simple) news stream.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Logbook
 */
class Logbook extends Object
{
	private $entries = array();
	
	public function __construct()
	{
		
	}
	
	public function add($type, $id_type, $content, $action = 'none', $admin = false)
	{
		$this->entries[] = array($type, $id_type, $content, $admin, $action, User::getId());
	}
	
	public static function addEntry($type, $id_type, $content, $action = 'none', $admin = false)
	{
		$request = new SqlRequest();
		$request->insert(TABLE_LOGBOOK, array('type' => $type, 'id_type' => $id_type, 'content' => $content, 'admin' => $admin, 'action' => $action, 'id_user_add' => User::getId()));
	}
	
	public function __destroy()
	{
		$this->request->insertAll(TABLE_LOGBOOK, array('type', 'id_type', 'content', 'admin', 'action', 'id_user_add'), $this->entries);
	}
}
?>