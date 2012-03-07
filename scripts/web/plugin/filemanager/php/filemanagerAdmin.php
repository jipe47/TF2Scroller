<?php
/**
 * Filemanager Administration
 * This page groups administration handles for the filemanager plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Filemanager
 */
class FilemanagerAdmin extends AdminPage
{
	public static $name = "Filemanager";
	
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerAdmin("Filemanager", get_class());
	}
	
	public function handler($arg)
	{
		switch($arg[0])
		{
			case 'add':
			case 'edit':
				$id = -1;
				$type = "";
				if($arg[0] == "edit")
					$id = intval($arg[1]);
				else
					$type = $arg[1];
				
				if(count($arg) > 2)
					$back = implode(Config::ARG_SEPARATOR, array_slice($arg, 2));
				else
					$back = "Admin/Filemanager/list/".$type;
					
				$this->assignArray(array('id' => $id, 'type' => $type, 'back' => $back));
				
				$file = "filemanager_addedit";
				break;
				
			case 'list':
				$type = $arg[1];
				$this->assign("type", $type);
				
				$back_from = implode(Config::ARG_SEPARATOR, array_slice($arg, 2));
				$this->assign("back_from", $back_from);
				
				$back = "Admin/Filemanager/list/".$type."/".$back_from;
				$this->assign("back", $back);
				
				$this->assign("array_file", filemanager_getFiles($type));
				$file = "filemanager_list";
				break;
				
			case "delete":
				$back = implode(Config::ARG_SEPARATOR, array_slice($arg, 2));
				$this->assign('back', $back);
				
				$id = intval($arg[1]);
				$this->assign("f", filemanager_getFile($id));
				
				$file ="filemanager_delete";
				break;
				
		}
		
		return $this->renderFile(PATH_PLUGIN."filemanager/html/admin/".$file.".html");
	}
}