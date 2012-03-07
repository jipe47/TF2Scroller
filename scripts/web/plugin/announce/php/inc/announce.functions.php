<?php

function announce_getAnnounce($id)
{
	$request = getSqlRequest();
	return $request->firstQuery("	SELECT a.*, u.firstname, u.lastname
									FROM " . TABLE_ANNOUNCE . " a
									LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = a.id_user_add 
									WHERE a.id='" . $id . "'");
}
function announce_getAnnounces()
{
	$request = getSqlRequest();
	return $request->fetchQuery("	SELECT a.*, u.firstname, u.lastname
									FROM " . TABLE_ANNOUNCE . " a
									LEFT OUTER JOIN " . TABLE_USER . " u ON u.id = a.id_user_add 
									ORDER BY a.id DESC");
}
?>