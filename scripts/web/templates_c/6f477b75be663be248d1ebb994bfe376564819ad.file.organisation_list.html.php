<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:22:47
         compiled from "plugin/user/html/organisation_list.html" */ ?>
<?php /*%%SmartyHeaderCode:106954f2e82a7e4dbd6-60724097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f477b75be663be248d1ebb994bfe376564819ad' => 
    array (
      0 => 'plugin/user/html/organisation_list.html',
      1 => 1328447818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106954f2e82a7e4dbd6-60724097',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Number of Members</th>
		<th>Actions</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->getVariable('array_count')->value[$_smarty_tpl->tpl_vars['o']->value['id']];?>
</td>
		<td>
			<a href="?Admin/User/organisationedit/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this organisation" title="Edit this organisation" /></a>
			<a href="?Admin/User/organisationdelete/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this organisation" title="Delete this organisation" /></a>
			<a href="?Admin/User/organisationmember/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
user/images/member.png" alt="View members" title="View members" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/User/organisationadd" class="button_link_big">Add an organisation</a>
</p>