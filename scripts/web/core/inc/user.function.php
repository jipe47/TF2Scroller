<?php
// Function call for Smarty (quick and dirty)

function user_hasRight($r)
{
	return User::hasRight($r);
}
?>
