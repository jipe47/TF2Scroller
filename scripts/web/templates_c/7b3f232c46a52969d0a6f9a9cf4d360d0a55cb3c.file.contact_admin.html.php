<?php /* Smarty version Smarty-3.0.7, created on 2012-02-19 01:38:53
         compiled from "plugin/contact/html/admin/contact_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:226234f40449d084899-17985745%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b3f232c46a52969d0a6f9a9cf4d360d0a55cb3c' => 
    array (
      0 => 'plugin/contact/html/admin/contact_admin.html',
      1 => 1328192996,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '226234f40449d084899-17985745',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="workgroup_admin">
	<h1>Contacts Administration Panel</h1>
	
	<div class="colleft">
		<h2>Navigation</h2>
		<ul>
			<li><a href="#" onclick="contactShowSubPanel('admin_contact')">Manage Contacts</a></li>
			<li><a href="#" onclick="contactShowSubPanel('admin_contact_type')">Manage Contact Types</a></li>
			<li><a href="#" onclick="contactShowSubPanel('admin_event')">Manage Events</a></li>
			<li><a href="#" onclick="contactShowSubPanel('admin_source')">Manage Sources</a></li>
			<li><a href="#" onclick="contactShowSubPanel('admin_criteria')">Manage Criteria</a></li>
		</ul>
	</div>
	
	<div class="colright" id="admin_subpanels">
		<div id="admin_default" style="display: block">
			<br /><br />
			<p><em>Click on the left links to select a subpanel.</em></p>
		</div>
		<div id="admin_contact">
			<h2>Contacts</h2>
			<p><a href="?Admin/Contact/add">Add a contact</a></p>
			<p><a href="?Admin/Contact/listimport">Import contact</a></p>
		</div>
		<div id="admin_contact_type">
			<h2>Contact Types</h2>
			<p><a href="?Admin/Contact/addtype">Add a member type</a></p>
			<p><a href="?Admin/Contact/listtype">Manage types</a></p>
		</div>
		<div id="admin_source">
			<h2>Sources</h2>
			<p><a href="?Admin/Contact/addsource">Add a member source</a></p>
			<p><a href="?Admin/Contact/listsource">Manage sources</a></p>
		</div>
		<div id="admin_criteria">
			<h2>Criteria</h2>
			<p><a href="?Admin/Contact/addcriteria">Add a criteria</a></p>
			<p><a href="?Admin/Contact/listcriteria">Manage criteria</a></p>
		</div>
		<div id="admin_event">
			<h2>Events</h2>
			<p><a href="?Admin/Contact/addevent">Add an event</a></p>
			<p><a href="?Admin/Contact/listevent">Manage events</a></p>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>