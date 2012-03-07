<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 11:51:03
         compiled from "plugin/user/html/user_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:190314f2e5f17765673-26370942%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46c0005e207dccebb52903df6b56ca22b361928a' => 
    array (
      0 => 'plugin/user/html/user_admin.html',
      1 => 1328438985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190314f2e5f17765673-26370942',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="user_admin">
	<h1>Users Administration Panel</h1>
	
	<div class="colleft">
		<h2>Navigation</h2>
		<ul>
			<li><a href="#" onclick="userShowSubPanel('admin_user')">Users</a></li>
			<li><a href="#" onclick="userShowSubPanel('admin_group')">Groups</a></li>
			<li><a href="#" onclick="userShowSubPanel('admin_organisation')">Organisations</a></li>
		</ul>
	</div>
	
	<div class="colright" id="admin_subpanels">
		<div id="admin_default" style="display: block">
			<br /><br />
			<p><em>Click on the left links to select a subpanel.</em></p>
		</div>
		<div id="admin_user">
			<h2>Users</h2>
			<p><a href="?Admin/User/userlist">User Management</a></p>
			<p><a href="?Admin/User/useradd">Add a user</a></p>
		</div>
		<div id="admin_group">
			<h2>Groups</h2>
			
			<p><a href="?Admin/User/grouplist">Group management</a></p>
			<p><a href="?Admin/User/groupadd">Add group</a></p>
		</div>
		<div id="admin_organisation">
			<h2>Organisations</h2>
			<p><a href="?Admin/User/organisationlist">Organisation management</a></p>
			<p><a href="?Admin/User/organisationadd">Add an organisation</a></p>
		</div>
	</div>
	
			
							
							
	
	
	
	<div class="clearfix"></div>
</div>