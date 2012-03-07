<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:34:30
         compiled from "plugin/goodpractice/html/admin/goodpractice_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:57974f43f1c6aaaee3-35240218%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e39a754d9362ee8a9fa854e028c6a09f61a7cfb7' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_admin.html',
      1 => 1329851545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57974f43f1c6aaaee3-35240218',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="workgroup_admin">
	<h1>Good Practices Sheets Administration Panel</h1>
	
	<div class="colleft">
		<h2>Navigation</h2>
		<ul>
			<li><a href="#" onclick="goodpracticeShowSubPanel('admin_goodpractice')">Good Practices</a></li>
			<li><a href="#" onclick="goodpracticeShowSubPanel('admin_theme')">Themes</a></li>
			<li><a href="#" onclick="goodpracticeShowSubPanel('admin_organisation')">Organisations</a></li>
		</ul>
	</div>


	
	<div class="colright" id="admin_subpanels">
		<div id="admin_default" style="display: block">
			<br /><br />
			<p><em>Click on the left links to select a subpanel.</em></p>
		</div>
		<div id="admin_goodpractice">
			<h2>Good Practices Sheets</h2>
			<p><a href="?Admin/Goodpractice/goodpractice/add">Add a good practice</a></p>
		</div>
		<div id="admin_theme">
			<h2>Themes</h2>
			<p><a href="?Admin/Goodpractice/theme/add">Add a theme</a></p>
			<p><a href="?Admin/Goodpractice/theme/list">Manage themes</a></p>
		</div>
		<div id="admin_organisation">
			<h2>Organisations</h2>
			<p><a href="?Admin/Goodpractice/organisation/add">Add an organisation</a></p>
			<p><a href="?Admin/Goodpractice/organisation/list">Manage organisations</a></p>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>