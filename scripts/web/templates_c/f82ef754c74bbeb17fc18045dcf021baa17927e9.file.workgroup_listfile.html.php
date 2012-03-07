<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 15:17:47
         compiled from "plugin/workgroup/html/admin/workgroup_listfile.html" */ ?>
<?php /*%%SmartyHeaderCode:198724f2d3e0ba60842-77102487%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f82ef754c74bbeb17fc18045dcf021baa17927e9' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listfile.html',
      1 => 1328016488,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198724f2d3e0ba60842-77102487',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_file')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</td>
		<td>
			<a href="?Admin/Workgroup/editfile/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this file" title="Edit this file"/></a>
			<a href="?Admin/Workgroup/deletefile/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this file" title="Delete this file"/></a>
			<a href="?Admin/Workgroup/listmod/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/table_multiple.png" alt="See modifications" title="See modifications" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/addfile/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a file</a>
</p>