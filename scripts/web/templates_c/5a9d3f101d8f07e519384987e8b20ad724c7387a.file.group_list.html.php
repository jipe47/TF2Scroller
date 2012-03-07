<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:18:23
         compiled from "plugin/user/html/group_list.html" */ ?>
<?php /*%%SmartyHeaderCode:202304f2e819f78b7a0-33663872%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a9d3f101d8f07e519384987e8b20ad724c7387a' => 
    array (
      0 => 'plugin/user/html/group_list.html',
      1 => 1328447838,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '202304f2e819f78b7a0-33663872',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Group</th>
		<th>Number of Members</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->getVariable('array_count')->value[$_smarty_tpl->tpl_vars['g']->value['id']];?>
</td>
		<td>
			<a href="?Admin/User/groupedit/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit" alt="Edit"/></a>
			<a href="?Admin/User/groupdelete/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete" alt="Delete"/></a>
			<a href="?Admin/User/groupmember/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
user/images/member.png" title="Manage members" alt="Manage members"/></a>
			<a href="?Admin/User/groupright/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
user/images/right.png" title="Manage rights" alt="Manage rights"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p><a href="?Admin/User/groupadd" class="button_link_big">Add a group</a></p>
