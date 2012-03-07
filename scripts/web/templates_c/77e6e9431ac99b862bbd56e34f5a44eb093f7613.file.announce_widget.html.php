<?php /* Smarty version Smarty-3.0.7, created on 2012-01-30 23:43:51
         compiled from "plugin/announce/html/announce_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:36844f272b373a9c12-04514685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77e6e9431ac99b862bbd56e34f5a44eb093f7613' => 
    array (
      0 => 'plugin/announce/html/announce_widget.html',
      1 => 1323280750,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36844f272b373a9c12-04514685',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><?php if (count($_smarty_tpl->getVariable('array_announce')->value)>0){?>
<div id="announce">
	<h2>Announce(s)</h2>
	<?php  $_smarty_tpl->tpl_vars['a'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_announce')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['a']->key => $_smarty_tpl->tpl_vars['a']->value){
?>
		<a href="<?php echo $_smarty_tpl->tpl_vars['a']->value['link'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['a']->value['timestamp'],"%d/%m/%Y");?>
 : <?php echo $_smarty_tpl->tpl_vars['a']->value['title'];?>
</a><br />
	<?php }} ?>
</div>
<?php }?>