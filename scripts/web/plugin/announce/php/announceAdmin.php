<?php
/**
 * Announce Administration
 * Handler for administration section of the plugin.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Announce
 */
class AnnounceAdmin extends AdminPage
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		LocationBar::add("Announce Management", "?Admin/Announce/list");
	}

	public static function init()
	{
		self::registerAdmin("Announce", get_class());
	}

	public function handler($arg)
	{
		switch($arg[0])
		{
			case "add":
			case "edit":
				$id = -1;
				$title = "";
				$link = "";
				$submit = "Add";

				if($arg[0] == "edit")
				{
					$id = intval($arg[1]);

					$announce = announce_getAnnounce($id);
					$title = $announce['title'];
					$link = $announce['link'];
					$submit = "Edit";
					LocationBar::add("Edit Announce");
				}
				else
				LocationBar::add("New Announce");

				$this->assignArray(array('title' => $title, 'link' => $link, 'id' => $id, 'submit' => $submit));

				$file = "addedit";
				break;

			case "delete":
				$id = intval($arg[0]);
				$this->assign("announce", announce_getAnnounce($id));
				$file = "delete";
				break;

			case "list":
				$this->assign("array_announce", announce_getAnnounces());
				$file = "list";
				break;
		}

		return $this->renderFile(PATH_PLUGIN."announce/html/admin/announce_".$file.".html");
	}
}