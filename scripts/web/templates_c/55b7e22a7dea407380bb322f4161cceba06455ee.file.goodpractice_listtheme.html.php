<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:52:46
         compiled from "plugin/goodpractice/html/admin/goodpractice_listtheme.html" */ ?>
<?php /*%%SmartyHeaderCode:137884f43f60e1e3384-28905211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b7e22a7dea407380bb322f4161cceba06455ee' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_listtheme.html',
      1 => 1329853677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137884f43f60e1e3384-28905211',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</td>
		<td>
			<a href="?Admin/Goodpractice/theme/edit/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this type" title="Edit this type" /></a>
			<a href="?Admin/Goodpractice/theme/delete/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this type" title="Delete this type" /></a>
			<a href="?Admin/Goodpractice/goodpractice/add/theme/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/add.png" alt="Add a good practice" title="Add a good practice" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Goodpractice/theme/add" class="button_link_big">Add a theme</a>
</p>