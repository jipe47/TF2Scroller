<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 22:06:46
         compiled from "plugin/user/html/organisation_delete.html" */ ?>
<?php /*%%SmartyHeaderCode:272934f2d9de6d4f135-15639059%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38febed21d9e1f9e692e59818479a1e97236976c' => 
    array (
      0 => 'plugin/user/html/organisation_delete.html',
      1 => 1328387111,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '272934f2d9de6d4f135-15639059',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/User/organisationdelete">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
" />
	<p>Are you sure you want to delete the organisation <strong><?php echo $_smarty_tpl->getVariable('org')->value['name'];?>
</strong>?</p>
	
	<?php if (count($_smarty_tpl->getVariable('members')->value)>0){?>
		<p>There are users who belongs to this organisation. What would you like to do?</p>
		<ul>
			<li><input type="radio" name="action" value="delete" checked="checked" id="choice_delete" /> : <label for="choice_delete">delete their membership</label></li>
			<li>
				<input type="radio" name="action" value="move" id="choice_move" /> : <label for="choice_move">move them to another organisation:</label> 
				<select name="id_move">
					<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</option>
					<?php }} ?>
				</select>
			</li>
		</ul>
	<?php }else{ ?>
		<input type="hidden" name="action" value="delete" />
		<input type="hidden" name="id_move" value="-1" />
	<?php }?>
	
	<p><input type="submit" value="Delete this organisation" class="button_link" /></p>
</form>