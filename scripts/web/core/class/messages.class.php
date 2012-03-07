<?php
/**
 * Manages messages added during the generation of a page.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage IO
 */
class Messages
{
	/**
	 * Messages stored during a page generation.
	 * @var string_array
	 */
	private static $messages = array();
	
	/**
	 * Checks if messages from a previous page but not displayed have been loaded.
	 * @var unknown_type
	 */
	private static $sessionChecked = false;
	
	/**
	 * Adds a message.
	 * @param string $text Message content.
	 * @param string $type Message type.
	 * @see Message
	 */
	public static function add($text, $type = Message::INFO)
	{
		if(!self::$sessionChecked)
			self::loadMessages();
		
		self::$messages[] = array("text" => $text, "type" => $type);
		self::saveMessages();
	}
	
	/**
	 * Gets stored message.
	 * @param boolean $reset True to remove messages, false to keep them.
	 */
	public static function getMessages($reset = false)
	{
		if(!self::$sessionChecked)
			self::loadMessages();
			
		$r = self::$messages;
		if($reset)
			self::$messages = array();
		return $r;
	}
	
	/**
	 * Renders stored messages and dumps them.
	 * @return string Stored messages render.
	 */
	public static function render()
	{
		$a = self::getMessages(true);
		
		$r = "";
		foreach($a as $m)
		{
			$c = new Message(array($m['text'], $m['type']));
			$r .= $c->render();
		}
		return $r;
	}
	
	/**
	* Stores any entered message in a session.
	*/
	private static function saveMessages()
	{
		$_SESSION['cmp_messages'] = serialize(self::$messages);
	}
	
	/**
	* Loades messages if a session is defined.
	*/
	private static function loadMessages()
	{
		self::$sessionChecked = true;
		
		if(!empty($_SESSION['cmp_messages']))
			self::$messages = unserialize($_SESSION['cmp_messages']);
	}
	public function __destruct()
	{
		self::saveMessages();
	}
}
?>