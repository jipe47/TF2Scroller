<?php
/**
 * Allows the manipulation of files.
 *
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage File
 */
class FileProcessing
{
	const ERROR_NOTEXIST = "error_notexist";
	
	/**
	 * Delets a file, if it exists.
	 * @param string $f Path to file.
	 * @returns FileProcessing::ERROR_NOTEXISTS if the file does not exist,
	 * 			the result of "unlink" otherwise.
	 */
	public static function deleteFile($f)
	{
		if(!file_exists($f))
			return self::ERROR_NOTEXIST;
			
		return unlink($f);
	}
	
	/**
	 * Lists a directory.
	 * @param string $dir Path to directory.
	 * @param boolean $showCurrentAndParent Includes or not "." and "..".
	 */
	public static function listDir($dir, $showCurrentAndParent = false)
	{
		$array = array();
		
		if (is_dir($dir)) {
			if ($dh = opendir($dir)) {
				while (($file = readdir($dh)) !== false) {
					if(!$showCurrentAndParent && ($file == "." || $file == ".."))
						continue;
					$array[] = $file;
				}
				closedir($dh);
			}
		}
		return $array;
	}
}

?>