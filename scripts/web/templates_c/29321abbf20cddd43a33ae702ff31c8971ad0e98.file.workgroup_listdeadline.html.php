<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 00:40:27
         compiled from "plugin/workgroup/html/admin/workgroup_listdeadline.html" */ ?>
<?php /*%%SmartyHeaderCode:22304f27387bdd8d97-49978350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29321abbf20cddd43a33ae702ff31c8971ad0e98' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listdeadline.html',
      1 => 1327970421,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22304f27387bdd8d97-49978350',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><table class="tab_admin">
	<tr>
		<th>Date</th>
		<th>Name</th>
		<th>Type</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_deadline')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
	<tr>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['timestamp'],"%d/%m/%Y at %H:%m");?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=="custom"){?>
			<a href="?Admin/Workgroup/editdeadline/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this deadline" title="Edit this deadline"/></a>
			<a href="?Admin/Workgroup/deletedeadline/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this deadline"/></a>
			<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="file"){?>
			<a href="?Admin/Workgroup/editfile/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this file" title="Edit this file"/></a>
			<a href="?Admin/Workgroup/deletefile/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this file" title="Delete this file"/></a>
			<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="conference"){?>
			<a href="?Admin/Workgroup/editconference/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this conference" title="Edit this conference"/></a>
			<a href="?Admin/Workgroup/deleteconference/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this conference" title="Delete this conference"/></a>
			<?php }?>	
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/adddeadline/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a deadline</a>
	<a href="?Admin/Workgroup/addconference/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a confcall</a>
	<a href="?Admin/Workgroup/addfile/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a file</a>
	<a href="?Admin/Workgroup/addquestionnaire/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Add a questionnaire</a>
</p>