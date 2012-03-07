<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:51:07
         compiled from "plugin/workgroup/html/admin/workgroup_list.html" */ ?>
<?php /*%%SmartyHeaderCode:280574f52843bf32de5-02315005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cb64dcbcd87300eeddf01d9438dc1c4c8069de3' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_list.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280574f52843bf32de5-02315005',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Ok -->
<div id="workgroup_home" class="workgroup_admin_list">
	<div id="div_nav">
		<div class="nav_left" id="nav_type">
			<span onclick="workgroupNavClick('type', 'all')" 		id="nav_type_all" class="selected">All</span> - 
			<span onclick="workgroupNavClick('type', 'enabled')" 	id="nav_type_enabled">Enabled</span> - 
			<span onclick="workgroupNavClick('type', 'disabled')"	id="nav_type_disabled">Disabled</span>
		</div>
		<div class="nav_right" id="nav_completion">
			<span onclick="workgroupNavClick('completion', 'all')" 			id="nav_completion_all" class="selected">All</span> -
			<span onclick="workgroupNavClick('completion', 'unarchived')" 	id="nav_completion_unarchived">Unarchived</span> - 
			<span onclick="workgroupNavClick('completion', 'archived')"		id="nav_completion_archived">Archived</span>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<!--  OK -->
<table class="tab_admin" id="items">
	<tr>
		<th></th>
		<th>Name</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('workgroups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
?>
	<tr class="item <?php if ($_smarty_tpl->tpl_vars['w']->value['disabled']){?>disabled<?php }else{ ?>enabled<?php }?> <?php if ($_smarty_tpl->tpl_vars['w']->value['finished']){?>archived<?php }else{ ?>unarchived<?php }?>">
		<td width="40">
			<?php if ($_smarty_tpl->tpl_vars['w']->value['disabled']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/disabled.png" alt="Disabled" title="Disabled" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabled.png" alt="Enabled" title="Enabled" />
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['w']->value['finished']){?><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/lock_closed.png" alt="Archived" title="Archived" /><?php }?>
		</td>
		<td>
			<a href="?Workgroup/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</a>	
		</td>
		
		<td width="120">
			<a href="?Admin/Workgroup/workgroup/edit/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this working group" title="Edit this working group" /></a>
			<a href="?Admin/Workgroup/workgroup/member/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/group.png" alt="Manage members" title="Manage members" /></a>
			<a href="?Workgroup/admin/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/manage.png" alt="Workgroup management" title="Workgroup management" /></a>
			
			<a href="?Request/Workgroup/workgroup/toggleenable/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabledisable.png" title="Enable/disable this workgroup" alt="Enable/disable this workgroup" /></a>
			
			<a href="?Request/Workgroup/workgroup/togglefinish/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
">
			
				<?php if ($_smarty_tpl->tpl_vars['w']->value['finished']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/lock_open.png" alt="Close this workgroup" title="Close this workgroup" />
				<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/lock_closed.png" alt="Unlock this workgroup" title="Unlock this workgroup" />
				<?php }?></a>
			
			<a href="?Admin/Workgroup/workgroup/delete/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this workgroup" title="Delete this workgroup" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/workgroup/add" class="button_link_big">Add a workgroup</a>
</p>
