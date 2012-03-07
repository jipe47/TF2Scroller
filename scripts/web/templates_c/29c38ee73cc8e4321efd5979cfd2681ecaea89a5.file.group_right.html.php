<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:45:49
         compiled from "plugin/user/html/group_right.html" */ ?>
<?php /*%%SmartyHeaderCode:118844f2d98fde3f221-91215823%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29c38ee73cc8e4321efd5979cfd2681ecaea89a5' => 
    array (
      0 => 'plugin/user/html/group_right.html',
      1 => 1328388342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118844f2d98fde3f221-91215823',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Rights of group <strong><?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
</strong>.</p>

<?php if (count($_smarty_tpl->getVariable('array_right')->value)>0){?>
<form method="post" action="?Request/User/grouprightdelete">
	<table id="tab_right" class="tab_admin">
		<tr>
			<th>Right</th>
			<th></th>
		</tr>
		
		<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_right')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
		<tr id="line_<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
">
			<td><?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
</td>
			<td>
				<input type="checkbox" onclick="highlightRight('<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
')" id="right_<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
" name="right_<?php echo $_smarty_tpl->tpl_vars['r']->value['name'];?>
" />
			</td>
		</tr>
		<?php }} ?>
		
		<tr>
			<td></td>
			<td><input type="checkbox" id="checkAllButton" onclick="checkAllRights('tab_right', $('#checkAllButton').is(':checked'))" /></td>
		</tr>
	
	</table>
	<input type="hidden" name="id_group" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	<input type="submit" value="Delete selected rights" />
</form>
<?php }else{ ?>
	<p><em>This group has no rights.</em></p>
<?php }?>

<?php if (count($_smarty_tpl->getVariable('all_right')->value)>0){?>
<form method="post" action="?Request/User/grouprightadd">
	<input type="hidden" name="id_group" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	<p>Add a right: <select name="name">
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('all_right')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['r']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</option>
					<?php }} ?>
					</select>
	<input type="submit" value="Add" />
					</p>
</form>
<?php }else{ ?>
	<p>No rights to add.</p>
<?php }?>
