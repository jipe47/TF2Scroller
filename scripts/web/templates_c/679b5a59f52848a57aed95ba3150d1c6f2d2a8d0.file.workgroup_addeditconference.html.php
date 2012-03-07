<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 19:46:17
         compiled from "plugin/workgroup/html/admin/workgroup_addeditconference.html" */ ?>
<?php /*%%SmartyHeaderCode:194834f2ece7930c019-34996989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '679b5a59f52848a57aed95ba3150d1c6f2d2a8d0' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditconference.html',
      1 => 1328467571,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194834f2ece7930c019-34996989',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
if (!is_callable('smarty_function_html_select_time')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_time.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Workgroup/addeditconference">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_preview'=>0,'enable_formtag'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td>
				<?php echo smarty_function_html_select_date(array('time'=>$_smarty_tpl->getVariable('timestamp')->value,'start_year'=>"-1",'end_year'=>"+2"),$_smarty_tpl);?>
 at
				<?php echo smarty_function_html_select_time(array('time'=>$_smarty_tpl->getVariable('timestamp')->value,'display_seconds'=>0),$_smarty_tpl);?>

			</td>
		</tr>
		<tr>
			<td><label for="call_user">Send an e-mail <br />to workgroup members <br />to announce this <?php if ($_smarty_tpl->getVariable('id')->value==-1){?>confcall<?php }else{ ?>modification<?php }?></label></td>
			<td><input type="checkbox" name="call_user" id="call_user" /></td>
		</tr>
		<tr>
			<td>Link to a chat room</td>
			<td>
				<ul class="list_admin">
					<li><input type="radio" name="chatroom" value="new" id="chatroom_new"/> <label for="chatroom_new">New chatroom</label></li>
					<?php if (count($_smarty_tpl->getVariable('array_chatroom')->value)>0){?>
					<li>
						<input type="radio" name="chatroom" value="existing" id="chatroom_existing" <?php if ($_smarty_tpl->getVariable('id_chatroom')->value!=''){?> checked="checked"<?php }?>/> <label for="chatroom_existing">Existing chatroom:</label>
						<select name="id_chatroom">
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_chatroom')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"<?php if ($_smarty_tpl->getVariable('id_chatroom')->value==$_smarty_tpl->tpl_vars['c']->value['id']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</option>
						<?php }} ?>
						</select>
					</li>
					<?php }?>
					<li><input type="radio" name="chatroom" value="none" id="chatroom_none" <?php if ($_smarty_tpl->getVariable('id_chatroom')->value==''){?> checked="checked"<?php }?>/> <label for="chatroom_none">No chatroom</label></li>
				</ul>
			</td>
		</tr>
	</table>
	<p>	
		<input type="submit" class="button_link" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" />
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>