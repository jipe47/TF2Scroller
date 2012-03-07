<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:29:02
         compiled from "plugin/contact/html/admin/contact_listtype.html" */ ?>
<?php /*%%SmartyHeaderCode:12194f2db12e90c3e3-77428885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99b39793c5d5b929d0d8b3821e1f71418da1e3d8' => 
    array (
      0 => 'plugin/contact/html/admin/contact_listtype.html',
      1 => 1328014318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12194f2db12e90c3e3-77428885',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><table class="tab_admin">
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
			<a href="?Admin/Contact/edittype/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this type" alt="Edit this type"/></a>
			<a href="#deleteType<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this type" alt="Delete this type"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a class="button_link_big" href="?Admin/Contact/addtype">Add a contact type</a>
</p>
<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the contact type <strong>".($_smarty_tpl->tpl_vars['t']->value['name'])."</strong>?",'handler_yes'=>"?Request/Contact/deletetype/".($_smarty_tpl->tpl_vars['t']->value['id']),'id'=>"deleteType".($_smarty_tpl->tpl_vars['t']->value['id']),'title'=>"Delete Contact Type"),$_smarty_tpl);?>

<?php }} ?>