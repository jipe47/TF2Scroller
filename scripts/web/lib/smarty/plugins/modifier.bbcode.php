<?php
function smarty_modifier_bbcode($string)
{
	return BBCode::parse($string);
}

?>