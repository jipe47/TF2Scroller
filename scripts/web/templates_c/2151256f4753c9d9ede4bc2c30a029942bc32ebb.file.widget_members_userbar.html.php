<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:13:54
         compiled from "C:\wamp\www\transeo\config/../plugin/onlinemember/html/widget_members_userbar.html" */ ?>
<?php /*%%SmartyHeaderCode:324514f2b18b2c45157-10724626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2151256f4753c9d9ede4bc2c30a029942bc32ebb' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/onlinemember/html/widget_members_userbar.html',
      1 => 1323439426,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324514f2b18b2c45157-10724626',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input type="hidden" id="nbr_online_ajax" value="<?php echo $_smarty_tpl->getVariable('nbr_online')->value;?>
" />
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('members')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>	
	<a onclick="userChatNewWindow('<?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
', 'Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/comment.png" title="Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
" alt="Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
" /></a>
	<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
onlinemember/images/status_<?php if ($_smarty_tpl->tpl_vars['m']->value['isOnline']){?>online<?php }else{ ?>offline<?php }?>.png" title="Online" alt="Online" />
	<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a><br />
<?php }} ?>
