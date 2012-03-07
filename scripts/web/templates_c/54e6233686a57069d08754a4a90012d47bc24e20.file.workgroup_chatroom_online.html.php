<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 15:54:07
         compiled from "plugin/workgroup/html/workgroup_chatroom_online.html" */ ?>
<?php /*%%SmartyHeaderCode:87854f2aa38f842446-79125165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '54e6233686a57069d08754a4a90012d47bc24e20' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_chatroom_online.html',
      1 => 1323082056,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87854f2aa38f842446-79125165',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('online')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['o']->value['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value['lastname'];?>
</a><br />
<?php }} ?>