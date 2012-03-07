<?php
/**
 * Logviewer Ajax
 * This page retreives log file, based on a date.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Logviewer
 */
class LogviewerAjax extends AjaxPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
	
	public function handler($arg)
	{
		$day = intval(Post::value("single_day"));
		$month = intval(Post::value("single_month"));
		$year = intval(Post::value("single_year"));
		
		if($day < 10)
			$day = "0".$day;
			
		if($month < 10)
			$month = "0".$month;
	
		$filename = "log-".$day."-".$month."-".$year;
		
		if(!file_exists("log/".$filename))
			return "<em>No entry for ".$filename."</em>";
		
		$xml = '<?xml version="1.0"?><entries>'.file_get_contents("log/".$filename).'</entries>';
		
		$dom = new DOMDocument();
		$dom->loadXML($xml);
		
		$nl = $dom->getElementsByTagname("log");
		$r = array();
		for($i = 0 ; $i < $nl->length ; $i++)
		{
			$log = $nl->item($i);
			$s_message = $log->getElementsByTagname("message");
			$message = $s_message->item(0)->nodeValue;
			
			$s_session = $log->getElementsByTagname("sessionid");
			$session = $s_session->item(0)->nodeValue;
			
			$s_type = $log->getElementsByTagname("type");
			$type = $s_type->item(0)->nodeValue;
			
			$s_ip = $log->getElementsByTagname("ip");
			$ip = $s_ip->item(0)->nodeValue;
			
			$s_timestamp = $log->getElementsByTagname("timestamp");
			$timestamp = $s_timestamp->item(0)->nodeValue;
			
			$r[] = array(	'message'=> $message, 
							'session' => $session, 
							'type' => $type, 
							'ip' => $ip, 
							'timestamp' => $timestamp);
		}
		
		$reverse = Post::value("reverse", "false") == "true";
		
		if($reverse == true)
			$r = array_reverse($r, true);
			
		$logs = array(array('date' => $day."/".$month."/".$year, 'logs' => $r));
		$this->tpl->assign("logs", $logs);
		
		return $this->renderFile(PATH_PLUGIN."logviewer/html/logviewer_result.html");
	}
}
?>