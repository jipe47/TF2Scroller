<?php
/**
 * Comment Plugin
 * This plugin allows you to handle user comments : it can display a form, lists comments and manage them.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Comments
 */
class Comments extends Plugin
{
	public static $name = "Comments";
	public static $sqlTables = array("comments");
	public static $rights = array("COMMENTS_EDIT" => "Edit comments.", "COMMENTS_DELETE" => "Delete comments.", "COMMENTS_HIDE" => "Hide comments.");
	
	const NBR_PER_PAGE = 10;
	
	private $allowAnonymous = false;
	private $allowComment = true;
	private $enableForm = true;
	
	private $enableToolbar_default = 0;
	private $enableComment_default = 1;
	
	private $order_default = "asc";
	
	private $template_default = "comments/html/comments.html";
	
	public function __construct()
	{
		parent::__construct();
	}

	public function render($arg)
	{
		$type = $arg['type'];
		$id_type = $arg['id_type'];
		
		$nbr_per_page = array_key_exists("nbr_per_page", $arg) ? intval($arg["nbr_per_page"]) : self::NBR_PER_PAGE;
		$order = array_key_exists("order", $arg) && in_array($arg['order'], array("asc", "desc")) ? $arg["order"] : $this->order_default;
				
		$cnt = $this->request->count(TABLE_COMMENTS, "type = '".$type . "' AND id_type='" . $id_type . "'");
		$nbr_page = ceil($cnt / $nbr_per_page);
		
		$page_arg = Config::getPageArg();
		$last_arg = $page_arg[count($page_arg) - 1];
		
		$last_arg_char = substr($last_arg, 0, 1);
		$page_designated = $last_arg_char == "p";
		$comment_designated = $last_arg_char == "c";
		$last_page = $last_arg == "last";
		if($last_page)
			$page = $nbr_page;
		else if($page_designated)
			$page = min($nbr_page, max(1, intval(substr($last_arg, 1, strlen($last_arg) - 1))));
		else if($comment_designated)
		{
			$id_comment = intval(substr($last_arg, 1));
			
			$all_comment = $this->request->fetchQuery("	SELECT id 
														FROM " . TABLE_COMMENTS . " 
														WHERE 	id_type='" . $id_type . "' 
														AND 	type='" . $type . "'
														ORDER BY id " . $order);
			$num = 1;
			foreach($all_comment as $c)
			{
				if($c['id'] == $id_comment)
					break;
				$num++;
			}
			$page = ceil($num/$nbr_per_page);
			out::message("page = " . $page);
		}
		else
			$page = 1;
		
		
		$limit = ($page - 1) * $nbr_per_page;
		
		if($page_designated || $last_page || $comment_designated)
			unset($page_arg[count($page_arg) - 1]);			
		$back = implode(Config::ARG_SEPARATOR, $page_arg);

		$this->setAllowAnonymous(array_key_exists("allow_anonymous", $arg) && $arg['allow_anonymous']);
		$this->setAllowComment(array_key_exists("allow_comment", $arg) && $arg['allow_comment']);

		$this->setEnableForm((array_key_exists("enable_form", $arg) && $arg['enable_form']) || !array_key_exists("enable_form", $arg));
		
		$req = $this->request->fetchQuery("	SELECT " . TABLE_COMMENTS . ".*, " . TABLE_USER . ".firstname, " . TABLE_USER . ".lastname, " . TABLE_USER . ".avatar 
											FROM " . TABLE_COMMENTS . " 
											LEFT OUTER JOIN " . TABLE_USER . " 
												ON " . TABLE_USER . ".id = " . TABLE_COMMENTS . ".id_user 
											WHERE id_type='" . $id_type . "' AND type='" . $type . "' ORDER BY id ".$order."
											LIMIT " . $limit . ", " . $nbr_per_page);
		
		$id_avoid_delete = array();
		
		if(array_key_exists("array_avoid_delete", $arg))
			$id_avoid_delete = explode(",", $arg['array_avoid_delete']);
			
			
			
		$enable_toolbar = (!array_key_exists("enable_toolbar", $arg) && $this->enableToolbar_default) || (array_key_exists("enable_toolbar", $arg) && $arg["enable_toolbar"] == 1);
		$this->assign("enable_toolbar", $enable_toolbar);
		
		$enable_comment = (!array_key_exists("enable_comment", $arg) && $this->enableComment_default) || (array_key_exists("enable_comment", $arg) && $arg["enable_comment"] == 1);
		$this->assign("enable_comment", $enable_comment);
		
		$this->tpl->assign("array_avoid_delete", $id_avoid_delete);
		$this->tpl->assign("array_comment", $req);
		$this->tpl->assign("back", $back);
		$this->tpl->assign("back_complete", $_SERVER['QUERY_STRING']);
		$this->tpl->assign("comments_type", $type);
		$this->tpl->assign("comments_id_type", $id_type);
		
		$comment_title = array_key_exists("comment_title", $arg) ? $arg['comment_title'] : "";
		$this->assign("comment_title", $comment_title);
		
		$arguments = new Arg($arg);
		$this->tpl->assign("title", $arguments->getString("title", "Commentaires"));
		
		$this->tpl->assign("canEdit", User::isAdmin() || User::hasRight("COMMENTS_EDIT"));
		$this->tpl->assign("canDelete", User::isAdmin() || User::hasRight("COMMENTS_DELETE"));
		
		$this->tpl->assign("allowAnonymous", $this->allowAnonymous);
		$this->tpl->assign("allowComment", $this->allowComment);
		$this->tpl->assign("enableForm", $this->enableForm);
		
		
		$this->tpl->assign("page_count", $nbr_page);
		$this->tpl->assign("page_num", $page);
		$this->tpl->assign("back_page", $back);
		
		
		if(!array_key_exists("template", $arg))
			$template = PATH_PLUGIN.$this->template_default;
		else
			$template = $arg["template"];
		
		return $this->renderFile($template);
	}
	
	
	/** Accessors and Mutators **/
	public function setAllowAnonymous($b)
	{
		$this->allowAnonymous = $b;
	}
	public function allowAnonymous()
	{
		return $this->allowAnonymous;
	}
	public function setAllowComment($b)
	{
		$this->allowComment = $b;
	}
	public function allowComment()
	{
		return $this->allowComment;
	}
	public function setEnableForm($b)
	{
		$this->enableForm = $b;
	}
	public function enableForm()
	{
		return $this->enableForm;
	}
}

?>