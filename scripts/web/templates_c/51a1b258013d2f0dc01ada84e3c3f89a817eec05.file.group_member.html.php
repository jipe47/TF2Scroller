<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:33:12
         compiled from "plugin/user/html/group_member.html" */ ?>
<?php /*%%SmartyHeaderCode:275904f2d9608b38092-93302054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51a1b258013d2f0dc01ada84e3c3f89a817eec05' => 
    array (
      0 => 'plugin/user/html/group_member.html',
      1 => 1328387111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '275904f2d9608b38092-93302054',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><p>Member(s) of <strong><?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
</strong>.</p>

<table class="tab_admin">
	<tr>			
		<th>User</th>
		<th>Actions</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>
</td>
		<td>
			<a href="?Request/User/groupmemberdelete/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Remove member" title="Remove member" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>
<!-- 
<?php if (count($_smarty_tpl->getVariable('all_user')->value)>0){?>
	<form method="post" action="?Request/User/groupmemberadd">
		<input type="hidden" name="id_group" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
		<p>Add a user: <select name="id_user">
							<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('all_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['a']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['a']->value['nickname'];?>
</option>
							<?php }} ?>
						</select>
						
						<input type="submit" value="Add" />
						</p>
	</form>
<?php }else{ ?>
	<p>No user to add.</p>
<?php }?> -->
<form method="post" action="?Request/User/groupmemberadd">
	<input type="hidden" name="id_group" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	<div id="div_selected_user">
	</div>
	<p><input type="submit" value="Add selected members" /></p>
	<?php echo smarty_function_plugin(array('p'=>'User','type'=>'search','textarea_name'=>'users_to_add','id_avoid'=>$_smarty_tpl->getVariable('id_avoid')->value),$_smarty_tpl);?>

	
</form>
	
