<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:17:09
         compiled from "plugin/workgroup/html/widget_confcall.html" */ ?>
<?php /*%%SmartyHeaderCode:277124f43edb5b99d76-66702054%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43e0451a0bf3cc4af9dd803a6f4a788eede321ca' => 
    array (
      0 => 'plugin/workgroup/html/widget_confcall.html',
      1 => 1329851542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277124f43edb5b99d76-66702054',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><?php if ($_smarty_tpl->getVariable('nbr_confcall')->value>0){?>
	<h2>Upcoming Rendezvous</h2>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_confcall')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
		<p><?php if (strtotime($_smarty_tpl->tpl_vars['c']->value['timestamp'])>time()){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['c']->value['timestamp'],($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
 - <?php }?><a href="?Workgroup/conference/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</a>
			<?php if ($_smarty_tpl->tpl_vars['c']->value['id_chatroom']!=''){?>
				<a href="?Workgroup/chatroom/view/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_chatroom'];?>
">
					<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="Join a reserved chatroom" alt="Join a reserved chatroom" />
				</a>
			<?php }?>
		</p>
	<?php }} ?>
<?php }?>