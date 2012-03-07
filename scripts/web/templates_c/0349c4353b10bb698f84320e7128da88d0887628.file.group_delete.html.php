<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 19:46:39
         compiled from "plugin/user/html/group_delete.html" */ ?>
<?php /*%%SmartyHeaderCode:101674f34148ff06056-59857444%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0349c4353b10bb698f84320e7128da88d0887628' => 
    array (
      0 => 'plugin/user/html/group_delete.html',
      1 => 1328387109,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '101674f34148ff06056-59857444',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the group <strong><?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
</strong>?

<form method="post" action="?Request/User/groupdelete">
	<?php if (count($_smarty_tpl->getVariable('members')->value)>0){?>
		<p>There are users who belongs to this organisation. What would you like to do?</p>
		<ul>
			<li><input type="radio" name="action" value="delete" checked="checked" id="choice_delete" /> : <label for="choice_delete">delete their membership</label></li>
			<li>
				<input type="radio" name="action" value="move" id="choice_move" /> : <label for="choice_move">move them to another group</label>: 
				<select name="id_move">
					<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
					<?php if ($_smarty_tpl->tpl_vars['g']->value['id']!=$_smarty_tpl->getVariable('info')->value['id']){?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</option>
					<?php }?>
					<?php }} ?>
				</select>
			</li>
		</ul>
	<?php }else{ ?>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="id_move" value="-1" />
	<?php }?>
	
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	<p>
		<input type="submit" value="Yes" class="button_link" />
		<?php echo smarty_function_backButton(array('type'=>"button",'text'=>"No"),$_smarty_tpl);?>

	</p>
</form>