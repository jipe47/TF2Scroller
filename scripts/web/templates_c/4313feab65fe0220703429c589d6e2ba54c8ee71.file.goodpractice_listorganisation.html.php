<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:50:30
         compiled from "plugin/goodpractice/html/admin/goodpractice_listorganisation.html" */ ?>
<?php /*%%SmartyHeaderCode:139784f43f586a8c3f5-70504335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4313feab65fe0220703429c589d6e2ba54c8ee71' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_listorganisation.html',
      1 => 1329853694,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139784f43f586a8c3f5-70504335',
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
			<a href="?Admin/Goodpractice/organisation/edit/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this organisation" title="Edit this organisation" /></a>
			<a href="?Admin/Goodpractice/organisation/delete/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this organisation" title="Delete this organisation" /></a>
			<a href="?Admin/Goodpractice/goodpractice/add/organisation/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/add.png" alt="Add a good practice" title="Add a good practice" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Goodpractice/organisation/add" class="button_link_big">Add an organisation</a>
</p>