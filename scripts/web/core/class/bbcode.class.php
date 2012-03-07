<?php
/**
 * Allows to parse a styled text.
 * 
 * @author Jean-Philippe Collette
 * @package Core
 * @subpackage Misc
 */
class BBCode
{
	public static $fontList = array('Arial', 'Times New Roman', 'Courier New', 'Verdana', 'Georgia', 'Comic Sans MS', 'Trebuchet MS', 'Impact');
	private static $regex = array(	'#\[b\](.+)\[/b\]#isU',
									'#\[u\](.+)\[/u\]#isU',
									'#\[i\](.+)\[/i\]#isU',
									'#\[s\](.+)\[/s\]#isU',
									'#\[img\](.+)\[/img\]#isU',
									'#\[url\](.+)\[/url\]#isU',
									'#\[url\s*=\s*(.+)\](.+)\[/url\]#isU',
									'#\[color\s*=\s*(red|green|blue|orange|yellow|green)](.+)\[\/color]#isU',
									'#\[color\s*=\s*\#?([0-9A-Fa-f]{6})+\](.+)\[/color\]#isU',
									'#\[size\s*=\s*([0-9]{1,2})](.+)\[\/size]#isU',
									'#\[font\s*=\s*(.+)](.+)\[/font\]#isU',
									'#\[title\s*=\s*(.+)](.+)\[/title\]#isU',
									'#\[list\](.+)\[/list\]#isU',
									'#\[item\](.+)\[/item\]#isU'
									);
	private static $replace = array('<strong>$1</strong>',
									'<span style="text-decoration: underline">$1</span>',
									'<em>$1</em>',
									'<span style="text-decoration: line-through">$1</span>',
									'<img src="$1" />',
									'<a href="$1">$1</a>',
									'<a href="$1">$2</a>',
									'<span style="color: $1">$2</span>',
									'<span style="color: #$1">$2<span>',
									'<span style="font-size: $1px">$2</span>',
									'<span style="font-family: $1">$2</span>',
									'<h$1>$2</h$1>',
									'<ul class="bbcode_list">$1</ul>',
									'<li>$1</li>'
									);
	
	/**
	 * Converts BBCode of a string to HTML tags.
	 * @param string $text
	 */
	public static function parse($text)
	{
		$text = preg_replace(self::$regex, self::$replace, $text);
		return '<div class="bbcode_parsedtext">'.nl2br($text).'</div>';
	}
}