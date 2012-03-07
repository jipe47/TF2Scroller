<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:20:48
         compiled from "plugin/contact/html/admin/contact_listevent.html" */ ?>
<?php /*%%SmartyHeaderCode:174704f2daf402a8295-23748469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f2a6c2aeff9262eda1c441d8fe8ce485c991db2' => 
    array (
      0 => 'plugin/contact/html/admin/contact_listevent.html',
      1 => 1328014312,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '174704f2daf402a8295-23748469',
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
	<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</td>
		<td>
			<a href="?Admin/Contact/editevent/<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this event" alt="Edit this event"/></a>
			<a href="#deleteEvent<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this event" alt="Delete this event"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Contact/addevent" class="button_link_big">Add an event</a>
</p>
<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the event <strong>".($_smarty_tpl->tpl_vars['e']->value['name'])."</strong>?",'handler_yes'=>"?Request/Contact/deleteevent/".($_smarty_tpl->tpl_vars['e']->value['id']),'id'=>"deleteEvent".($_smarty_tpl->tpl_vars['e']->value['id']),'title'=>"Delete Event"),$_smarty_tpl);?>

<?php }} ?>