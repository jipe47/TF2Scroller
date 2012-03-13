<?php
class ImageLibAjax extends AjaxPage
{
	private static $image_ext = array('png', 'jpg', 'jpeg', 'bmp', 'gif');
	public function __construct($arg)
	{
		parent::__construct($arg);
	}
	
	public static function init()
	{
		self::registerAjax("Imagelib", get_class());
	}
	
	public function handler($arg)
	{
		switch($arg[0])
		{
			case "readdir":
				$dir = Post::string("dir");
				if($dir == "")
					return -1;
				else if(!file_exists($dir))
					return -2;
				
				$dir = str_replace("\\", "/", $dir);
				
				$array_dir = array();
				$this->assign("reading", $this->traversedir($this->readdir($dir), $dir));
				$f = "readdir";
				break;
				
			case "imageinfo":
				$path = Post::string("path");
				$pathinfo = pathinfo($path);
				
				$this->assign("pathinfo", $pathinfo);
				$f = "imageinfo";
				break;
				
			default:
				$e = new HttpError(404);
				$e->setFullRender(false);
				$e->showHeaders(false);
				return $e->render();
		}
		
		return $this->renderFile(HTML_IMAGELIB."ajax/".$f.".html");
	}

	private function isImgExtension($ext)
	{
		return in_array(strtolower($ext), self::$image_ext);
	}
	private function traversedir($array, $path = '', $level = 0)
	{
		$r = array();
		
		$i = 0;
		$nbr = count($array);
		foreach($array as $k => $v)
		{
			$e = array('level' => $level, 'name' => $k, 'is_dir' => is_array($v), 'path' => $path, 'is_last' => $i === $nbr - 1);
			$r[] = $e;
			
			if(is_array($v))
			{
			//	$r[] = $e;
				$r = array_merge($r, $this->traversedir($v, $path."/".$k, $level + 1));
			}
			/*else
			{
				$r[] = array('level' => $level, 'name' => $k, 'is_dir' => false, 'path' => $path.'/'.$k);
			}*/
			$i++;
		}
		
		return $r;
	}
	private function readdir($dir, $level = 0)
	{
		if(($handle = opendir($dir)) === false)
			return "";
		
		$r = array();
		
		while(($entry = readdir($handle)) !== false)
		{
			if($entry == "." || $entry == "..")
				continue;
			
			if(is_dir($dir."/".$entry))
			{
				$r[$entry] = $this->readdir($dir."/".$entry);
			}
			else
				$r[$entry] = "";
		}
		closedir($handle);
		return $r;
	}
}