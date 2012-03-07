<?php
// @Todo: inclure les groupes et les organisations via des boolÃ©ens ?
function user_getUser($id, $includeContact = false)
{
	$request = getSqlRequest();
	
	$user = $request->firstQuery("SELECT * FROM " . TABLE_USER . " WHERE id='" . $id . "'");
	
	$user['organisations'] = $request->fetchQuery("	SELECT o.name, o.id, uo.job 
													FROM " . TABLE_USER_ORGANISATION. " uo 
													LEFT JOIN " . TABLE_ORGANISATION. " o ON o.id = uo.id_organisation
													WHERE uo.id_user='" . $id . "'");
	$user['groups'] = $request->fetchQuery("SELECT g.*
											FROM " . TABLE_GROUP_MEMBER . " m
											LEFT JOIN " . TABLE_GROUP . " g ON g.id = m.id_group
											WHERE m.id_user = '". $id ."'");
	
	$user['contact'] = NULL;
	
	if($includeContact && $user['id_contact'] != "")
		$user['contact'] = $request->firstQuery("SELECT * FROM " . TABLE_CONTACT . " WHERE id='" . $user['id_contact']."'");
	
	return $user;
}

function user_makeLinkById($id)
{
	return user_makeLinkByInfo(user_getUser($id));
}
function user_makeLinkByInfo($info)
{
	return '<a href="?Member/'.$info['id'] . '">'.$info['firstname']. ' ' .$info['lastname'].'</a>';
}


function user_getChatServerStatus()
{
	if(!file_exists(CHATSERVER_FILE_STATUS))
		return "";
	
	$handler = fopen(CHATSERVER_FILE_STATUS, 'r');

	$file_content = fgets($handler);
	fclose($handler);
	return $file_content;
}
?>