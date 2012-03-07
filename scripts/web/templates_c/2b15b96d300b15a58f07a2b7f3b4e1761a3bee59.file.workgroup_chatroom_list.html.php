<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 15:24:41
         compiled from "plugin/workgroup/html/workgroup_chatroom_list.html" */ ?>
<?php /*%%SmartyHeaderCode:271574f33d7295ca329-54376425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b15b96d300b15a58f07a2b7f3b4e1761a3bee59' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_chatroom_list.html',
      1 => 1328782493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271574f33d7295ca329-54376425',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><h1>Chat Rooms</h1>
<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Created by</th>
		<th>Online members</th>
		<th>Join</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_chatroom')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
	<tr>
		<td>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabled.png" title="This chat room is enabled." alt="This chat room is enabled." />
			<a href="?Workgroup/chatroom/view/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</a>
		</td>
		<td><a href="?Member/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['lastname'];?>
</a></td>
		<td>
		<?php if (count($_smarty_tpl->tpl_vars['c']->value['online_members'])==0){?>
			<p><em>Empty</em></p>
		<?php }else{ ?>
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['c']->value['online_members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
			<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a><br />
			<?php }} ?>
		<?php }?>
		</td>
		<td>
			<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->tpl_vars['c']->value['id_user']==$_smarty_tpl->getVariable('id_user')->value){?>
			<a href="#delete<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button">
				<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this chatroom" alt="Delete this chatroom" />
			</a>
			<a href="#toggle<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button">
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabledisable.png" title="Disable this chat room" alt="Disable this chat room" />
			</a>
			
			<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"toggle".($_smarty_tpl->tpl_vars['c']->value['id']),'message'=>"Are you sure you want to archive the chat room <strong>".($_smarty_tpl->tpl_vars['c']->value['name'])."</strong>? Nobody will be able to join it.",'handler_yes'=>"?Request/Workgroup/togglechatroom/".($_smarty_tpl->getVariable('workgroup')->value['id'])."/".($_smarty_tpl->tpl_vars['c']->value['id'])."/1/fromworkgroup"),$_smarty_tpl);?>

			<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"delete".($_smarty_tpl->tpl_vars['c']->value['id']),'message'=>"Are you sure you want to delete the chat room <strong>".($_smarty_tpl->tpl_vars['c']->value['name'])."</strong>? Any uploaded file will be lost, as well as posted messages.",'handler_yes'=>"?Request/Workgroup/deletechatroom/".($_smarty_tpl->getVariable('workgroup')->value['id'])."/".($_smarty_tpl->tpl_vars['c']->value['id'])."/fromworkgroup"),$_smarty_tpl);?>

			
			<?php }?>
			
			
			
			<a href="?Workgroup/chatroom/view/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
				<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="Join this chatroom" alt="Join chatroom" />
			</a>
		</td>
	</tr>
	
	
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/addchatroom/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
/fromworkgroup" class="button_link_big">New chatroom</a>
	<a href="?Workgroup/chatroom/list_archive/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">Archives</a>
</p>