<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 16:04:03
         compiled from "plugin/user/html/user_search_showselected.html" */ ?>
<?php /*%%SmartyHeaderCode:236554f33e06315d898-63705022%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '18e45a2184a7a10875287ff4b6d61cbfe8da78fe' => 
    array (
      0 => 'plugin/user/html/user_search_showselected.html',
      1 => 1318838666,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236554f33e06315d898-63705022',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<ul>
	<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
		<li><?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>
</li>
	<?php }} ?>
</ul>