<?php
function user_getOrganisations()
{
	$request = getSqlRequest();
	
	$orgs = $request->fetchQuery("SELECT * FROM " . TABLE_ORGANISATION . " ORDER BY name");
	return $orgs;
}

function user_getOrganisationByUser($id_user)
{
	$request = getSqlRequest();
	
	return $request->fetchQuery("	SELECT o.*, u.job, u.isContact, u.isSubstitute
									FROM ". TABLE_USER_ORGANISATION . " u 
									LEFT JOIN " . TABLE_ORGANISATION . " o ON o.id = u.id_organisation
									WHERE u.id_user='" . $id_user . "' ORDER BY o.name");
}

function user_getOrganisation($id, $includeMembers = false)
{
	$request = getSqlRequest();
	
	$org = $request->firstQuery("SELECT * FROM " . TABLE_ORGANISATION . " WHERE id='" . $id . "'");
	
	if($includeMembers)
	{
		// jb is the job *in the organisation*, not the job specified in the contact database.
		$members = $request->fetchQuery("	SELECT u.id as id_user, u.firstname as fn, u.lastname as ln, u.avatar, u.id_contact, o.job as jb, o.isSubstitute, o.isContact, c.*
											FROM " . TABLE_USER_ORGANISATION . " o 
											LEFT JOIN " . TABLE_USER . " u ON u.id = o.id_user 
											LEFT OUTER JOIN " . TABLE_CONTACT . " c ON c.id = u.id_contact
											WHERE o.id_organisation='" . $id . "'");
		$org['members'] = $members;
	}
	
	return $org;
}

function user_getOrganisationMembers($id)
{
	$all = user_getOrganisation($id, true);
	return $all['members'];
}
?>