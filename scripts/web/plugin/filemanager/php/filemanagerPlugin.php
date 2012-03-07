<?php
require_once "inc/filemanager.functions.php";
/**
 * Filemanager Plugin
 * This plugin offers a quick file upload service.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Filemanager
 */
class FilemanagerPlugin extends Plugin
{
	public static $name = "Filemanager";
	public static $sqlTables = array("filemanager_file");
	
	public function __construct()
	{
		parent::__construct();
	}

	public function render($arg)
	{
		$type = $arg['type'];	
		$this->assign("type", $type);
		
		$uid = generateId(10);
		$this->assign("uid", $uid);
		
		switch($arg['display'])
		{
			case "list":	
			//	$default_back = "Admin/Filemanager/list/".$type;
				$this->assign("array_file", filemanager_getFiles($type));
				break;
				
			case "add":
			case "edit":
				$array = array('name' => '', 'description' => '', 'id' => -1, 'type' => $type, 'submit' => 'Add', 'filename' => '');
				if(array_key_exists('id_file', $arg) && intval($arg['id_file']) != -1)
				{
					$id = intval($arg['id_file']);
					$info = filemanager_getFile($id);
					
					$array['id'] = $id;
					$array['filename'] = $info['filename'];
					$array['name'] = $info['name'];
					$array['description'] = $info['description'];
					$array['type'] = $info['type'];
					$array['submit'] = "Edit";
				}
				$this->assignArray($array);
				break;
				
			default:
				out::message("Undefined display: ".$arg['display']);
				return;
		}
		
		$default_back = implode(Config::ARG_SEPARATOR, Config::getPageArg());

		if(!array_key_exists('back', $arg))
			$back = $default_back;
		else
			$back = $arg['back'];
		$this->assign("back", $back);
		
		return $this->renderFile(PATH_PLUGIN."filemanager/html/widget_".$arg['display'].".html");
	}
}
?>
