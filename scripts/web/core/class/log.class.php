<?php
/** Represents a logbook.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage IO
 */
class Log
{
	/**
	 * Every type of message that can be inserted in logs.
	 * @var string
	 */
	const ERROR = "error", WARNING = "warning", CONFIRM = "confirm", INFO = "info"; 
	
	/**
	 * Entries stored in the logbook, during a session.
	 * @var string_array
	 */
	private static $entries;
	
	/**
	 * Unique ID to detect page changes.
	 * @var string
	 */
	private static $pageId;
	
	/**
	 * Used to detect if the logbook has been loaded from sessions or not.
	 * @var boolean
	 */
	private static $getFromSession = false;
	
	public function __construct()
	{
	}
	
	/**
	 * Makes the distinctions between multiple sessions.
	 */
	public static function newSession()
	{
		self::$pageId = generateId(10);
		self::add("New session : " . $this->pageId, Log::INFO);
		self::updateLogObject();
	}

	/**
	 * Adds a message in logs.
	 * @param string $message Message to add.
	 * @param string $type Type of message (see constants).
	 */
	public static function add($message, $type)
	{
		self::getLogObject();
		
		$e = array(	"sessionid" => getSessionId(),
									"timestamp"	=> time(),
									"type" => $type,
									"message" => $message,
									"ip" => $_SERVER['REMOTE_ADDR']
								);
		self::$entries[] = $e; 
		
		self::addToLogFile($e);
		self::updateLogObject();
	}
	
	/**
	 * Writes an entry in a log file.
	 * @param $e
	 */
	private function addToLogFile($e)
	{
		$fName = "log-".date("d-m-Y", time());
		$file = fopen(PATH."log/".$fName, "a+");
		
		$t = "";
		
		foreach($e as $k => $v)
			$t .= "\t<" . $k . ">" . $v . "</" . $k . ">\r\n";
		
		$t = "<log>\r\n".$t."</log>\r\n";
		fputs($file, $t);
		//fputs($file, $e['timestamp'] . " - " . $e['type'] . " : " . $e['message']."\r\n");
		fclose($file);
	}
	
	/**
	 * Returns entries of the current session.
	 * @return string_array Current session log entries.
	 */
	public static function getEntries()
	{
		if(self::$entries == null)
			return array();
		else
			return array_reverse(self::$entries);
	}
	
	/**
	 * Updates session variable to save logs.
	 */
	private function updateLogObject()
	{
		$_SESSION['cmp_log'] = serialize(self::$entries);
	}
	
	/**
	 * Creates or loads a log, depending if a log is saved.
	 */
	public static function getLogObject()
	{
		if(!empty($_SESSION['cmp_log']) && !self::$getFromSession)
			self::$entries = unserialize($_SESSION['cmp_log']);
		else
			self::$entries = array();
		self::$getFromSession = true;
	}
}
?>