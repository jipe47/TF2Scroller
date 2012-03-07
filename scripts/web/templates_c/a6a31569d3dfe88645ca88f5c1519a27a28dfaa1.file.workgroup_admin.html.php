<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:53:24
         compiled from "plugin/workgroup/html/workgroup_admin.html" */ ?>
<?php /*%%SmartyHeaderCode:205754f5284c4eafc50-12211232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6a31569d3dfe88645ca88f5c1519a27a28dfaa1' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_admin.html',
      1 => 1330388532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205754f5284c4eafc50-12211232',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Ok -->
<div id="workgroup_admin">
	<h1><?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
 - Administration Panel</h1>
	
	<div class="colleft">
		<h2>Navigation</h2>
		<ul>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_general')">General</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_member')">Members</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_confcall')">Rendezvous</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_file')">Files</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_deadline')">Deadlines</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_questionnaire')">Questionnaires</a></li>
			<li><a href="#" onclick="workgroupShowSubPanel('admin_chatroom')">Chatrooms</a></li>
		</ul>
	</div>
	
	<div class="colright" id="admin_subpanels">
		<div id="admin_default" style="display: block">
			<br /><br />
			<p><em>Click on the left links to select a subpanel.</em></p>
		</div>
		<div id="admin_general">
			<h2>General</h2>
			<p><a href="?Admin/Workgroup/workgroup/edit/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Edit the working group information</a></p>
			<p><a href="?Admin/Workgroup/workgroup/delete/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Delete this working group</a></p>
		</div>
		<div id="admin_member">
			<h2>Members</h2>
			<p><a href="?Admin/Workgroup/workgroup/member/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage members</a></p>
		</div>
		<div id="admin_confcall">
			<h2>Confcalls</h2>
			<p><a href="?Admin/Workgroup/conference/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Add a rendezvous</a></p>
			<p><a href="?Admin/Workgroup/conference/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage rendezvous</a></p>
		</div>
		<div id="admin_file">
			<h2>Files</h2>
			<p><a href="?Admin/Workgroup/file/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Add a file</a></p>
			<p><a href="?Admin/Workgroup/file/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage files</a></p>
		</div>
		<div id="admin_deadline">
			<h2>Deadlines</h2>
			<p><a href="?Admin/Workgroup/deadline/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Add a deadline</a></p>
			<p><a href="?Admin/Workgroup/deadline/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage deadlines</a></p>
		</div>
		<div id="admin_questionnaire">
			<h2>Questionnaires</h2>
			<p><a href="?Admin/Workgroup/questionnaire/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Add a questionnaire</a></p>
			<p><a href="?Admin/Workgroup/questionnaire/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage questionnaires</a></p>
		</div>
		<div id="admin_chatroom">
			<h2>Chatrooms</h2>
			<p><a href="?Admin/Workgroup/chatroom/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Add a chatroom</a></p>
			<p><a href="?Admin/Workgroup/chatroom/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Manage chatrooms</a></p>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>