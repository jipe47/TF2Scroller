<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 17:12:07
         compiled from "plugin/workgroup/html/admin/workgroup_listconference.html" */ ?>
<?php /*%%SmartyHeaderCode:150444f2eaa57cade09-72590445%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b555444f8e497f25f3d7b94ed5699d6e9e8c69f' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listconference.html',
      1 => 1328458324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150444f2eaa57cade09-72590445',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Date</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = array_reverse($_smarty_tpl->getVariable('array_conf')->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['c']->value['timestamp'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
</td>
		<td>
			<a href="?Admin/Workgroup/editconference/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this conference"/></a>
			<a href="?Admin/Workgroup/deleteconference/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this conference"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/addconference/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a conference</a>
</p>