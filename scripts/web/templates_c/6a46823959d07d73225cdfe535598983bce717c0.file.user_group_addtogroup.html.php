<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:00:37
         compiled from "plugin/user/html/leanmodal/user_group_addtogroup.html" */ ?>
<?php /*%%SmartyHeaderCode:45204f2e7d75753a71-50565129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a46823959d07d73225cdfe535598983bce717c0' => 
    array (
      0 => 'plugin/user/html/leanmodal/user_group_addtogroup.html',
      1 => 1328446833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45204f2e7d75753a71-50565129',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
Select group(s) that <strong><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</strong> will join.

<form method="post" action="?Request/User/userjoingroup">
<input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->getVariable('user')->value['id'];?>
" />
<ul class="list_admin">
	<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
	<li>
		<input type="checkbox" name="groups[]" value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" id="group<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" /> <label for="group<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</label>
	</li>
	<?php }} ?>
</ul>
	<input type="submit" value="Add to this(these) group(s)" class="button_link_big" />
</form>