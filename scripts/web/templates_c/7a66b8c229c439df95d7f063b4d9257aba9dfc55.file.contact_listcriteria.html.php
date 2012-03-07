<?php /* Smarty version Smarty-3.0.7, created on 2012-02-14 21:45:45
         compiled from "plugin/contact/html/admin/contact_listcriteria.html" */ ?>
<?php /*%%SmartyHeaderCode:307704f3ac7f9838e83-97635767%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a66b8c229c439df95d7f063b4d9257aba9dfc55' => 
    array (
      0 => 'plugin/contact/html/admin/contact_listcriteria.html',
      1 => 1328014309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307704f3ac7f9838e83-97635767',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Default value</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['c']->value['description'];?>
</td>
		<td><?php if ($_smarty_tpl->tpl_vars['c']->value['default_value']){?><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" title="Checked by default" alt="Checked by default" /><?php }?></td>
		<td>
			<a href="?Admin/Contact/editcriteria/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this criteria" alt="Edit this criteria"/></a>
			<a href="#deleteCriteria<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this criteria" alt="Delete this criteria"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Contact/addcriteria" class="button_link_big">Add a criteria</a>
</p>
<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the criteria <strong>".($_smarty_tpl->tpl_vars['c']->value['name'])."</strong>?",'handler_yes'=>"?Request/Contact/deletecriteria/".($_smarty_tpl->tpl_vars['c']->value['id']),'id'=>"deleteCriteria".($_smarty_tpl->tpl_vars['c']->value['id']),'title'=>"Delete Criteria"),$_smarty_tpl);?>

<?php }} ?>