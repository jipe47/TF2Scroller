<?php
/**
* Executes miscellaneous operations related to image processing.
* 
* @author Jean-Philippe Collette
* @package Core
* @subpackage File
*/
class ImageProcessing
{
	/**
	* Resizes a picture. Dimensions are as close as possible to the original while maintaining the aspect ratio. Picture can be filled to create a picture of maximum width and height.
	* @param string $file Path to the picture to resize.
	* @param string $destination Path for the resized picture.
	* @param int $maxWidth Maximum width of the resized picture.
	* @param int $maxHeight Maximum height of the resized picture.
	* @param boolean $fill If true, fills the image background in white to match the maximum dimensions.
	*/
	public static function redim($file, $destination, $maxWidth, $maxHeight, $fill=false)
	{
		if(!file_exists($file))
			Messages::add("File " . $file . " does not exist.", Message::ERROR);
		
		// Compute new dimensions
		$array_dim = getimagesize($file);
		$width = $array_dim[0];
		$height = $array_dim[1];
				
		$dim = self::computeDim($width, $height, $maxWidth, $maxHeight);
		
		$mini_width = ($fill) ? $maxWidth : $dim['width'];
		$mini_height = ($fill) ? $maxHeight : $dim['height'];
		
		// Creation of miniature
		$mini = imagecreatetruecolor($mini_width, $mini_height);
		
		$info = pathinfo($file);
		$extension = $info['extension'];
				
		switch($extension)
		{
			case "jpeg":
			case "jpg":
				$source = imagecreatefromjpeg($file);
				break;
			case "gif":
				$source = imagecreatefromgif($file);
				break;
			case "png":
				$source = imagecreatefrompng($file);
				break;
		}
		
		$x = ($fill) ? ($mini_width - $dim['width']) / 2 : 0;
		$y = ($fill) ? ($mini_height - $dim['height']) / 2 : 0;
		
		
		
		$black = imagecolorallocate($mini, 0, 0, 0);
		imagefilledrectangle($mini, 0, 0, $mini_width, $mini_height, $black);
		imagecolortransparent($mini, $black);
		//imagefilledrectangle($mini, 0, 0, $mini_width, $mini_height, $white);
		
		imagecopyresampled($mini, $source, $x, $y, 0, 0, $dim['width'], $dim['height'], $width, $height);
		
		if(!$fill)
		{
			switch($extension)
			{
				case "jpeg":
				case "jpg":
					imagejpeg($mini, $destination);
					break;
				case "gif":
					imagegif($mini, $destination);
					break;
				case "png":
					imagepng($mini, $destination);
					break;
			}
		}
		else
		{
			$n = explode(".", $destination);
			array_pop($n);
			$d = implode(".", $n).".png";
			imagepng($mini, $d);
		}
	}
	
	/**
	* Given a width and a height, computes the dimensions as close as possible to a maximum width and height, while maintaining the original aspect ratio.
	* @param int $width Input width.
	* @param int $height Input height.
	* @param int $maxWidth Maximum output width.
	* @param int $maxHeight Maximum output height.
	* @return array An array containing two keys with new dimensions: 'width' and 'height'.
	*/
	private static function computeDim($width, $height, $maxWidth, $maxHeight)
	{
		$ratio = $width / $height;
		
		if($width == $maxWidth && $height == $maxHeight)
		{
			$width = $maxWidth;
			$height = $maxHeight;
		}
		elseif($width > $maxWidth && $height > $maxHeight)
		{
			if($width >= $height){
				$width = $maxWidth;
				$height = $width / $ratio;
			}
			else
			{
				$height = $maxHeight;
				$width = $height * $ratio;
			}
		}
		else if($width > $maxWidth && $height < $maxHeight)
		{
			$width = $maxWidth;
			$height = $width / $ratio;
		}
		else if($width < $maxWidth && $height > $maxHeight)
		{
			$height = $maxHeight;
			$width = $height * $ratio;
		}
		$width = round($width, 0);
		$height = round($height, 0);
		
		return array('width' => $width, 'height' => $height);
	}
}