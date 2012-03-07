<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 19:10:50
         compiled from "plugin/workgroup/html/admin/workgroup_listchatroom.html" */ ?>
<?php /*%%SmartyHeaderCode:50034f2ec62a4c1957-37426638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5fba21f12c79572e274cb1bdfc8a79002cb53ab' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listchatroom.html',
      1 => 1328465299,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '50034f2ec62a4c1957-37426638',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Creator</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_chat')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</td>
		<td>
			<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_user'];?>
">
			<?php echo $_smarty_tpl->tpl_vars['c']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['lastname'];?>

			</a>
		</td>
		<td>
			<a href="?Admin/Workgroup/editchatroom/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this chatroom" title="Edit this chatroom"/></a>
			<a href="#delete<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this chatroom" title="Delete this chatroom"/></a>
		</td>
	</tr>
	<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"delete".($_smarty_tpl->tpl_vars['c']->value['id']),'message'=>"Are you sure you want to delete the chat room <strong>".($_smarty_tpl->tpl_vars['c']->value['name'])."</strong>? Any uploaded file will be lost, as well as posted messages.",'handler_yes'=>"?Request/Workgroup/deletechatroom/".($_smarty_tpl->tpl_vars['c']->value['id_workgroup'])."/".($_smarty_tpl->tpl_vars['c']->value['id'])),$_smarty_tpl);?>

	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/addchatroom/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">Add a chatroom</a>
</p>