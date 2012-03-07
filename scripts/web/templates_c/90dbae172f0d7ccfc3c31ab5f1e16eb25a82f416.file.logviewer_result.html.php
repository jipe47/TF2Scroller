<?php /* Smarty version Smarty-3.0.7, created on 2012-02-07 15:51:30
         compiled from "plugin/logviewer/html/logviewer_result.html" */ ?>
<?php /*%%SmartyHeaderCode:43224f313a72ad50e9-64806461%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90dbae172f0d7ccfc3c31ab5f1e16eb25a82f416' => 
    array (
      0 => 'plugin/logviewer/html/logviewer_result.html',
      1 => 1317675148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43224f313a72ad50e9-64806461',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('logs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
	<h2><?php echo $_smarty_tpl->tpl_vars['r']->value['date'];?>
</h2>
	<table class="logmessage_tab">
		<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['r']->value['logs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
?>
		<tr class="logmessage_<?php echo $_smarty_tpl->tpl_vars['l']->value['type'];?>
">
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['l']->value['timestamp'],"%D %H:%M:%S");?>
 : <?php echo $_smarty_tpl->tpl_vars['l']->value['message'];?>
</td>
		</tr>
		<?php }} ?>
	</table>
<?php }} ?>