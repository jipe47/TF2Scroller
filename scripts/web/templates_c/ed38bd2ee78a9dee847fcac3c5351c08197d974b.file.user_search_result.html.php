<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:33:19
         compiled from "plugin/user/html/user_search_result.html" */ ?>
<?php /*%%SmartyHeaderCode:262924f2d960fed1751-89456162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed38bd2ee78a9dee847fcac3c5351c08197d974b' => 
    array (
      0 => 'plugin/user/html/user_search_result.html',
      1 => 1318838612,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '262924f2d960fed1751-89456162',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table>
	<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
		<?php if (!in_array($_smarty_tpl->tpl_vars['r']->value['id'],$_smarty_tpl->getVariable('array_avoid')->value)){?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['r']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['r']->value['lastname'];?>
</td>
				<td>
					<input type="checkbox" id="checkbox_user_<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['r']->value['id'],$_smarty_tpl->getVariable('array_selected')->value)){?>checked="checked"<?php }?> onclick="userSearchSelect('<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
')" />
				</td>
			</tr>
		<?php }?>
	<?php }} ?>
</table>
<input type="hidden" id="array_result_id" value="<?php echo $_smarty_tpl->getVariable('array_result_id')->value;?>
" />
