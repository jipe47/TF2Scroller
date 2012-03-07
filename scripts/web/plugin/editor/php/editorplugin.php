<?php
/**
 * Editor Plugin
 * This plugin provides an (simple) advanced text editing toolbar.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Editor
 */
class EditorPlugin extends Plugin
{
	public static $name = "bbcode";
	public function __construct()
	{
		parent::__construct();
	}
	public function render($arg)
	{
		$e = new EditorPage($arg);
		return $e->render();
	}
	public function query($arg){}
	public function admin($arg){}
}