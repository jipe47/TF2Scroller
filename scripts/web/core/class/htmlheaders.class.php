<?php
/** 
* Manages HTML headers of a page (css files, Javascript source files, etc).
* 
* @author Jean-Philippe Collette
* @package Core
* @subpackage Page
*/
class HtmlHeaders
{
	private static $headers;
	
	public function __construct()
	{
	}
	
	/**
	 * Erases CSS headers.
	 */
	public static function flushCssHeaders()
	{
		foreach(self::$headers as $k => $h)
		{
			try
			{
				if($h->get('rel') == 'stylesheet' && $h->get('type') == 'text/css')
					unset(self::$headers[$k]);
			}
			catch(Exception $e)
			{
				continue;
			}
		}
	}
	
	/**
	* Adds a header in the HTML page.
	* @param HtmlHeader $h Instance of a HTML header.
	* @thrown Exception if the input is not an instance of HtmlHeader.
	*/
	public static function addHeader($h)
	{
		if($h instanceof HtmlHeader)
			self::$headers[] = $h;
		else
			throw new Exception("Argument is not an instance of HtmlHeader.");
	}
	
	
	/**
	* Returns a string containing every inserted headers, formated to insert in a HTML page.
	* @return string Headers in HTML format.
	*/
	public function getHeaders()
	{
		if(count(self::$headers) == 0)
			return "";

		$h = "";
		foreach(self::$headers as $head)
			$h .= $head->render().EOL;
		return $h;
	}
	
	/**
	* Adds a header related to a css file.
	* @param string $file The path to a css file.
	*/
	public static function addCssFile($file)
	{
		$h = new HtmlHeader(HtmlHeader::LINK);
		$h->set('rel', 'stylesheet');
		$h->set('type', 'text/css');
		$h->set('media', 'screen');
		$h->set('href', $file);
		self::addHeader($h);
	}
	
	/**
	* Adds a header related to a Javascript source file.
	* @param string $file The path to a Javascript source file.
	*/
	public static function addJsSource($file)
	{		
		$h = new HtmlHeader(HtmlHeader::SCRIPT);
		$h->set("src", $file);
		$h->set("type", "text/javascript");
		$h->set("script", "");
		self::addHeader($h);
	}
	
	public static function addFeed($title, $url)
	{
		$h = new HtmlHeader(HtmlHeader::LINK);
		$h->rel = "alternate";
		$h->type = "application/rss+xml";
		$h->title = $title;
		$h->href = $url;
		self::addHeader($h);
	}
	
	/**
	* Includes css or Javascript source file in a folder.
	* @param string $type Type of folder : "css" or "js".
	* @param string $path Path to the folded.
	*/
	public static function includeDir($type, $path)
	{
		$deque = new Deque();
		$deque->enqueue($path);
		while(!$deque->isEmpty())
		{
			$path = $deque->dequeue();
			$dir_handle= @opendir($path) or die("Cannot open <strong>" . $path . "</strong> for include");
			
			while($file = readdir($dir_handle))
			{
				if($file == "." || $file == ".." || $file == ".svn")
					continue;
					
				$file = $path."/".$file;
				if(is_dir($file))
					$deque->enqueue($file);
				else if($type == "css")
					self::addCssFile($file);
				else if($type == "js")
					self::addJsSource($file);
			}
		}
	}
}

class HtmlHeader
{
	/**
	* Types of HTML header.
	* @var int
	*/
	const LINK = "link", META = "meta", SCRIPT = "script";
	
	private $type, $attributes = array();
	
	public function __construct($type)
	{
		$this->type = $type;
	}
	
	/**
	 * Generates a HTML-compliant string of the header. 
	 * @return string HTML-formated string of the header.
	 */
	public function render()
	{
		switch($this->type)
		{
			case self::LINK:
				return '<link rel="' . $this->attributes['rel'] . '" type="' . $this->attributes['type'] . '" href="' . $this->attributes['href'] . '" />';
			case self::META:
				$r = "";
				foreach($this->attributes as $k => $v)
					$r .= $k.'="' . $v . '" ';
				return '<meta '.$r . '/>';
				
			case self::SCRIPT:
				$a = "";
				$script = "";
				foreach($this->attributes as $k => $v)
					if($k != "script")
						$a .= ' '.$k.'="' . $v . '"';
					else
						$script = $v;

				return '<script' . $a . '>' . $script . '</script>';
			default:
				Log::add("Undefined HtmlHeader: ". $this->type, LogMessageType::ERROR);
				return '';
		}
	}
	
	public function __set($a, $v)
	{
		$this->set($a, $v);
	}
	
	public function __get($a)
	{
		return $this->get($a);
	}
	
	public function __toString()
	{
		return $this->render();
	}
	
	/**
	* Adds or modifies an attribute of the header
	* @param string $attribut The attribute name.
	* @param string $value The attribute value.
	*/
	public function set($attribut, $value)
	{
		$this->attributes[$attribut] = $value;
	}
	
	/**
	 * Returns a attribute of the header, if it exists.
	 * @param string $attribut Attribut name.
	 * @throws Exception Throwned if the attribute does not exist.
	 * @return string Attribut value.
	 */
	
	public function get($attribut)
	{
		if(array_key_exists($attribut, $this->attributes))
			return $this->attributes[$attribut];
		else
			throw new Exception("HtmlHeader: undefined attribute '".$attribut."'");
	}
}
?>