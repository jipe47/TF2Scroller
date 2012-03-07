<?php
function filemanager_getFiles($type)
{
	$request = getSqlRequest();
	
	$files = $request->fetchQuery("SELECT * FROM " . TABLE_FILEMANAGER_FILE . " WHERE type='" . $type . "' ORDER BY name");
	
	return $files;
}
function filemanager_getFile($id)
{
	$request = getSqlRequest();
	
	$file = $request->firstQuery("SELECT * FROM " . TABLE_FILEMANAGER_FILE . " WHERE id='" . $id . "'");
	
	return $file;
}

function filemanager_uploadFile($field, $array)
{
	$filename = FileUpload::moveFile($field, "filemanager");
	
	if(FileUpload::isError($filename))
		return -1;
		
	$array['filename'] =  $filename;
	
	$request = getSqlRequest();
	$request->insert(TABLE_FILEMANAGER_FILE, $array);

	return array('id' => $request->getLastId(), 'filename' => $filename);
}
?>