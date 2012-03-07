<?php
/**
 * User Ajax
 * This page handles requests related to the intranet chat functionnality,
 * by interacting with the chat server.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage User
 */
class UserChatAjax extends AjaxPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
	
	public function handler($arg)
	{
		$server_status = user_getChatServerStatus();
		
		if($server_status == "" || $server_status == "stopped")
			return '-2';
		if(!User::isConnected())
			return '-1';
		
		$r = -1;
		switch($arg[0])
		{
			case "send":
				$id_receiver = Post::int("id_receiver");
				$message = Post::string("message");
				
				$r = $this->serverCall("send", $id_receiver, $message);
				break;
				
			case "newmessage":
				$guid = Post::string("guid");
				
				$r = $this->serverCall("newmessage", -1, $guid);
				$r = (array) json_decode($r);
				
				$r_final = array('nbr_newmessage' => 0);
				
				if(!array_key_exists('nbr_newmessage', $r))
					return json_encode($r_final);
				
				$r_final['nbr_newmessage'] = intval($r['nbr_newmessage']);
				
				if(intval($r['nbr_newmessage']) > 0)
				{
					$r_final['messages'] = array();
					
					$r['messages'] = (array) $r['messages'];
					foreach($r['messages'] as $id_author => $messages)
					{
						$messages = (array) $messages;
						
						$r_final['messages'][$id_author] = array();
						foreach($messages as $i => $m)
						{
							$m = (array) $m;
							
							$r_final['messages'][$id_author][$i] = array();
							$r_final['messages'][$id_author][$i]['nickname'] = $m['nickname'];
							$r_final['messages'][$id_author][$i]['message'] = date("H\hi", $m['timestamp']). " - " . $m['nickname'] . " : " . $m['message'];
						}
					}
				}
				
				$r = json_encode($r_final);
				return $r;
				break;
			
			 case "retreive":
				$r = $this->serverCall("retreive", Post::int("id_member"));
				$r = (array) json_decode($r);
				$r['messages'] = array_reverse((array) $r['messages']);
				
				$r_final = array();
				$prev_date = "";
				$nickname = $r['nickname'];
				
				foreach($r['messages'] as $m)
				{
					$m = (array) $m;
					
					$time = strtotime($m['timestamp']);
					$date = date("l, j M Y", $time);
					if($date != $prev_date)
					{
						$r_final[] = '<div class="date old">'.$date.'</div>';
						$prev_date = $date;
					}
					
					$hour = date("H\hi", $time);
					$you = $m['id_author'] == User::getId();
					$nickname = $you ? "You" : $nickname;
					$class = $you ? ' you' : '';
					$r_final[] = '<div class="message old'.$class.'">'.$hour . ' : '.$nickname . " : " . $m['content'].'</div>';
				
				}
				
				if(count($r_final) != 0)
					$r_final[] = "<hr />";
				
				return implode(" ", $r_final);
				break;
		}
		return $r;
	}
	
	private function serverCall($command, $id = -1, $more='')
	{
		$parts = parse_url(CHATSERVER_IP);
		$fp = fsockopen(CHATSERVER_IP, CHATSERVER_PORT, $errno, $errstr, 30);
		
		if(!$fp)
			return -1;
	
		$post = User::getId()."\r\n".User::getToken()."\r\n".$command."\r\n".$id."\r\n".$more;
		
		$out = "POST / HTTP/1.1\r\n";
		$out.= "Host: ".CHATSERVER_IP."\r\n";
		$out.= "Content-Type: application/x-www-form-urlencoded\r\n";
		$out.= "Content-Length: ".strlen($post)."\r\n";
		$out.= "Connection: Close\r\n\r\n";
		$out.= $post;
		
		fwrite($fp, $out);
		
		$response = fread($fp, 4096);
		
	    fclose($fp);
	    return $response;
	}
}
?>