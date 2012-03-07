<?php
/**
 * Manages a file upload.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage File
 */
class FileUpload
{
	/**
	 * The maxsize in bits, specified by the user if > 0, -1 otherwise.
	 * @var int
	 */
	private static $maxsize = -1;
	
	/**
	 * Default maxsize, in bits.
	 * @var int
	 */
	const DEFAULT_MAXSIZE = 2000000;
	
	/**
	 * Strings corresponding to file upload errors.
	 * @var string_array
	 */
	private static $errors = array('1' => "File too big for the server.", '2' => 'File too big for the form.', '3' => 'File transfer canceled during transfer.', '4' => 'Null size.');
	
	
	/**
	 * Array containing allowed extensions linked to their MIME type ($extension => $MIME).
	 * @var string_array
	 */
	private static $allowed_extension = array('.gif' => 'image/gif', '.jpg' => 'image/jpeg', '.jpeg' => 'image/jpeg', '.png' => 'image/png');
	
	const ALLOW_ALL = 1;
	
	/**
	 * Error returned when a key does not exist in $_FILES.
	 * @var string
	 */
	const ERROR_NOTSET = -1;
	
	/**
	 * Error returned when a upload error occured.
	 * @var string
	 */
	const ERROR_UPLOAD = -2;
	
	/**
	 * Error returned when the file is too big (depending on the site the user specified).
	 * @var string
	 */
	const ERROR_TOOBIG = -3;
	
	/**
	 * Error returned when the file extension is invalid or the file has an incompatible MIME type.
	 * @var string
	 */
	const ERROR_EXTENSION = -4;
	
	/**
	 * Error returned when the moving operation has failed.
	 * @var string
	 */
	const ERROR_MOVE = -5;
	
	private static $errors_internal = array(
			self::ERROR_NOTSET => "The file is not set",
			self::ERROR_UPLOAD => "Upload error",
			self::ERROR_TOOBIG => "File too big",
			self::ERROR_EXTENSION => "Extension not allowed or wrong MIME type",
			self::ERROR_MOVE => "The file has not been moved",
			);
	
	
	/**
	 * Check if the output of the method moveFile is an error.
	 * @param string $text The result of moveFile($file, $folder)
	 * @see moveFile
	 * @return boolean True if the result is an error, false otherwise.
	 */
	public static function isError($text)
	{
		return in_array($text, array(self::ERROR_NOTSET, self::ERROR_UPLOAD, self::ERROR_TOOBIG, self::ERROR_EXTENSION, self::ERROR_MOVE));
	}
	
	/**
	 * Returns a description for an error.
	 * @param string $text Error.
	 * @return Error description.
	 */
	public static function getError($text)
	{
		return self::$errors_internal[$text];
	}
	
	/**
	 * Checks the upload status of a file and move it.
	 * @param string $field The name of the file (key in $_FILES).
	 * @param string $folder The place to move the file.
	 * @return string An error if the upload fails (see constants ERROR_*), the filename otherwise.
	 */
	public static function moveFile($field, $folder)
	{
		if(isset($_FILES[$field]))
		{
			$file = $_FILES[$field];
			if($file['error'] == 0)
			{	
				$maxsize = (self::$maxsize < 0) ? self::DEFAULT_MAXSIZE : self::$maxsize;
				if($file['size'] <= $maxsize)
				{
					$extension = strrchr($file['name'], '.'); 
					if(self::ALLOW_ALL || array_key_exists($extension, self::$allowed_extension) && self::$allowed_extension[$extension] == $file['type'])
					{
						$filename = time();
						
						if(move_uploaded_file($file['tmp_name'], PATH_UPLOAD.$folder."/".$filename.$extension))
							return $filename.$extension;
						else 
						{
							Log::add("The file has not been moved.", Log::ERROR);
							return self::ERROR_MOVE;
						}
					}
					else
					{
						Log::add("Extension not allowed or wrong MIME type.", Log::ERROR);
						return self::ERROR_EXTENSION;
					}
				}
				else
				{
					Log::add("File too big (max " . $maxsize . " bits.", Log::ERROR);
					return self::ERROR_TOOBIG;
				}
			}
			else
			{
				Log::add("Upload error: ".self::$errors[$_FILES[$field]['error']], Log::ERROR);
				return self::ERROR_UPLOAD;
			}
		}
		else
		{
			Log::add("The field '".$field . "' is not set.", Log::ERROR);
			return self::ERROR_NOTSET;
		}	
	}
}