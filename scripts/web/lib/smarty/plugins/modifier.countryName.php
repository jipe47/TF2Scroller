<?php
// Iso 2-alpha to country name
function smarty_modifier_countryName($string)
{
	return Country::getName($string);
}

?>