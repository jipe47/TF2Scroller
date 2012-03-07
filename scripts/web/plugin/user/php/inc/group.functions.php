<?php
function user_getGroups()
{
	$request = getSqlRequest();
	
	$groups = $request->fetchQuery("SELECT * FROM " . TABLE_GROUP . " ORDER BY name");
	return $groups;
}

function user_getGroup($id_group)
{
	$request = getSqlRequest();
	$group = $request->firstQuery("SELECT * FROM " . TABLE_GROUP . " WHERE id='". $id_group . "'");
	return $group;
}

function user_getGroupMembers($id_group)
{
	$request = getSqlRequest();
	return $request->fetchQuery("	SELECT u.*
									FROM " . TABLE_GROUP_MEMBER . " m
									LEFT JOIN " . TABLE_USER . " u ON u.id = m.id_user
									WHERE m.id_group='" . $id_group . "'
									ORDER BY u.firstname, u.lastname");
}

function user_getGroupsByUser($id_user)
{
	$request = getSqlRequest();
	return $request->fetchQuery("	SELECT g.*
									FROM " . TABLE_GROUP_MEMBER . " m 
									LEFT JOIN " . TABLE_GROUP . " g on g.id = m.id_group 
									WHERE m.id_user='" . $id_user . "'");
}
?>