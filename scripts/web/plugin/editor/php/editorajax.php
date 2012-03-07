<?php
/**
 * Editor Ajax
 * This class centralize every ajax request related to the editor plugin.
 * For now, it only parses BBCode to HTML.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Announce
 */
class EditorAjax extends AjaxPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		$this->setFullRender(false);
		$this->showHeaders(false);
	}
	public function handler($arg)
	{
		return BBCode::parse(nl2br(Post::value("text", "<em>No text specified.</em>")));
	}
}
	?>