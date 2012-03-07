<?php
function help_getPageByCode($code)
{
	$request = getSqlRequest();
	$page = $request->firstQuery("SELECT * FROM " . TABLE_HELP_PAGE . " WHERE code='" . $code . "'");
	
	if($request->getNbrResponse()== 0)
		return null;
	else
		return $page;
}

function help_getPageById($id)
{
	$request = getSqlRequest();
	$page = $request->firstQuery("SELECT * FROM " . TABLE_HELP_PAGE . " WHERE id='" . $id . "'");
	
	if($request->getNbrResponse()== 0)
		return null;
	else
		return $page;
}

function help_getPages()
{
	$request = getSqlRequest();
	return $request->fetchQuery("SELECT * FROM " . TABLE_HELP_PAGE . " ORDER BY code");
}