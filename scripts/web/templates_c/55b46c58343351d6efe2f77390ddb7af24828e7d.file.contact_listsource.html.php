<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 12:52:41
         compiled from "plugin/contact/html/admin/contact_listsource.html" */ ?>
<?php /*%%SmartyHeaderCode:210224f27e4198faaf0-44874368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '55b46c58343351d6efe2f77390ddb7af24828e7d' => 
    array (
      0 => 'plugin/contact/html/admin/contact_listsource.html',
      1 => 1328014316,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210224f27e4198faaf0-44874368',
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
	<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</td>
		<td>
			<a href="?Admin/Contact/editsource/<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this source" alt="Edit this source"/></a>
			<a href="#deleteSource<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this source" alt="Delete this source"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Contact/addsource" class="button_link_big">Add a source</a>
</p>
<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the source <strong>".($_smarty_tpl->tpl_vars['s']->value['name'])."</strong>?",'handler_yes'=>"?Request/Contact/deletesource/".($_smarty_tpl->tpl_vars['s']->value['id']),'id'=>"deleteSource".($_smarty_tpl->tpl_vars['s']->value['id']),'title'=>"Delete Source"),$_smarty_tpl);?>

<?php }} ?>