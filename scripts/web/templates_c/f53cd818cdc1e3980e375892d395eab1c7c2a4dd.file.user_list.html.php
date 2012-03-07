<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 16:04:41
         compiled from "plugin/user/html/user_list.html" */ ?>
<?php /*%%SmartyHeaderCode:95364f33e0894b5cb2-16940555%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f53cd818cdc1e3980e375892d395eab1c7c2a4dd' => 
    array (
      0 => 'plugin/user/html/user_list.html',
      1 => 1328447414,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '95364f33e0894b5cb2-16940555',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Nickname</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
	<tr>
		<td>
			<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
">
				<?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>

				<?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>

			</a>
		</td>
		<td>
			<a href="?Admin/User/useredit/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit" title="Edit" /></a>
			<a href="?Admin/User/userdelete/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete" title="Delete" /></a>
			<a href="?Admin/User/usergroup/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/group.png" alt="Groups of this user" title="Groups of this user" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p><a href="?Admin/User/useradd">Add a user</a></p>