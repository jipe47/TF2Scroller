<?php
/**
 * Onlinemember Ajax
 * This page retreives who is online, by interacting with the chat server.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Onlinemember
 */
class OnlineMemberUserbarAjax extends AjaxPage
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
		
		$token = Post::string("token");
			
		$r = $this->serverCall("onlinemember", $token);
		
		if($r != -1)
		{
			$members = json_decode($r);
			$members = (array) $members;
			
			foreach($members as $k => $m)
			$members[$k] = (array) $m;
		}
		else
			$members = array();
		
		
		$nbr_online = count($members);
		
		$this->tpl->assign("members", $members);
		$this->assign("nbr_online", $nbr_online);
		
		return $this->renderFile(PATH_PLUGIN."onlinemember/html/widget_members_userbar.html");
	}
	
	private function serverCall($command, $id1 = -1, $id2 = -1, $more='')
	{
		$parts = parse_url(CHATSERVER_IP);
		$fp = fsockopen(CHATSERVER_IP, CHATSERVER_PORT, $errno, $errstr, 30);
		
		if(!$fp)
			return -1;
			
		$id = User::getId();
		$token = User::getToken();
		
		$post = $id."\r\n".$token."\r\n".$command."\r\n".$id1."\r\n".$id2."\r\n".$more;
		
		$out = "POST / HTTP/1.1\r\n";
		$out.= "Host: ".CHATSERVER_IP."\r\n";
		$out.= "Content-Type: application/x-www-form-urlencoded\r\n";
		$out.= "Content-Length: ".strlen($post)."\r\n";
		$out.= "Connection: Close\r\n\r\n";
		$out.= $post;
		
		fwrite($fp, $out);
		
		$response = fread($fp, 1024);
		
	    fclose($fp);
	    return $response;
	}
}

?>