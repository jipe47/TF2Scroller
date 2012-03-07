<?php
/**
 * Filemanager Requests
 * This class centralize every request related to the filemanager plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Filemanager
 */
class FilemanagerRequest extends RequestPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerRequest("Filemanager", get_class());
	}
	
	public function handler($arg)
	{
		switch($arg[0])
		{
			case 'addedit':
				$back = Post::string("back");
				$name = Post::string("name");
		
				if($name != "")
				{
					$id = Post::int("id");
					$type = Post::string("type");
					$description = Post::string("description");
					$filename = FileUpload::moveFile("file", "filemanager");
		
					$array = array('name' => $name, 'description' => $description);
					
					if(FileUpload::isError($filename))
					{
						if($id == -1 || ($id != -1 && $filename != FileUpload::ERROR_NOTSET && $filename != FileUpload::ERROR_UPLOAD))
						{
							out::message(FileUpload::getError($filename), Message::ERROR);
							break;
						}
					}
					else
						$array['filename'] = $filename;
		
					
		
					if($id == -1)
					{
						$array['type'] = $type;
						$this->request->insert(TABLE_FILEMANAGER_FILE, $array);
						$m = "File uploaded.";
					}
					else
					{
						$this->request->update(TABLE_FILEMANAGER_FILE, "id='" . $id . "'", $array);
						$m = "File edited.";
					}
		
					out::message($m, Message::SUCCESS);
				}
				else
					out::message("You must specify a name.", Message::ERROR);
				break;
		
			case 'delete':
		
				if(count($arg) > 1)
				{
					$id = intval($arg[1]);
					$back = implode(Config::ARG_SEPARATOR, array_slice($arg, 2));
				}
				else
				{
					$id = Post::int("id_file");
					$back = Post::string("back");
				}
		
				$info = filemanager_getFile($id);
				$path = PATH_UPLOAD."filemanager/".$info['filename'];
				if(file_exists($path))
					unlink($path);
				$this->request->query("DELETE FROM " . TABLE_FILEMANAGER_FILE . " WHERE id='" . $id . "'");
		
				out::message("File deleted.", Message::SUCCESS);
		
				break;
		}
		$this->setLocation($back);
	}
}