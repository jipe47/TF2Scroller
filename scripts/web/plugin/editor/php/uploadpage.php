<?php
/**
 * Contact Plugin
 * This page allows the upload of a file. It is used with the editor plugin :
 * it creates thumbnails of pictures and displays code to speed up writing.
 * @author Jean-Philippe Collette
 * @package Plugins
 * @subpackage Editor
 */
class UploadPage extends Page
{
	public function __construct($arg)
	{
		parent::__construct($arg);
		
		$token = $arg[0];
		$this->assign("token", $token);
		
		$this->setFullRender(false);

		HtmlHeaders::flushCssHeaders();
		HtmlHeaders::addCssFile(TPL."css/common.css");
		
		$file = FileUpload::moveFile("file", "editor");
		
		if(!FileUpload::isError($file))
		{
			
			$full_link = PATH_UPLOAD."editor/".$file;
			$full_link_mini_150 = PATH_UPLOAD."editor/mini_150/".$file;
			$full_link_mini_350 = PATH_UPLOAD."editor/mini_350/".$file;
			$full_link_mini_500 = PATH_UPLOAD."editor/mini_500/".$file;
			
			ImageProcessing::redim($full_link, $full_link_mini_150, "150", "150");
			ImageProcessing::redim($full_link, $full_link_mini_350, "350", "350");
			ImageProcessing::redim($full_link, $full_link_mini_500, "500", "500");
			
			$this->assignArray(array('showlink' => true, 'link' => $full_link, 'link_150' => $full_link_mini_150, 'link_350' => $full_link_mini_350, 'link_500' => $full_link_mini_500));
			
			Config::addOnloadFunction("editorChildExpandIframe('".$token."')");
			
		}
		else
			$this->assign('showlink', false);
		
		$this->setTemplate(PATH_PLUGIN."editor/html/uploadform.html");
	}
}