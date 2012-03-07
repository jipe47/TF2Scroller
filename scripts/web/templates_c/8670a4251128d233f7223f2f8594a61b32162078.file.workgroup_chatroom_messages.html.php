<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 15:28:28
         compiled from "plugin/workgroup/html/workgroup_chatroom_messages.html" */ ?>
<?php /*%%SmartyHeaderCode:317924f33d80ccf7b66-67858147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8670a4251128d233f7223f2f8594a61b32162078' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_chatroom_messages.html',
      1 => 1328782493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '317924f33d80ccf7b66-67858147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('messages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
<div class="message<?php if ($_smarty_tpl->tpl_vars['m']->value['id_user']==$_smarty_tpl->getVariable('id_user')->value){?> my_message<?php }?>">
	 
	<?php if ($_smarty_tpl->tpl_vars['m']->value['id_user']!=''){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['timestamp'],($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
 - <a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a>:<?php }?>
	
	<?php if ($_smarty_tpl->tpl_vars['m']->value['id_user']==''){?>
		<em><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['timestamp'],($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
 - <?php echo html_entity_decode($_smarty_tpl->tpl_vars['m']->value['message']);?>
</em>
	<?php }else{ ?>
		<?php echo $_smarty_tpl->tpl_vars['m']->value['message'];?>

	<?php }?>
</div>
<?php }} ?>