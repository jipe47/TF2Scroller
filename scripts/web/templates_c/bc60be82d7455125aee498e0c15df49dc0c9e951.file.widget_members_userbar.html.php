<?php /* Smarty version Smarty-3.0.7, created on 2012-02-14 00:59:30
         compiled from "plugin/onlinemember/html/widget_members_userbar.html" */ ?>
<?php /*%%SmartyHeaderCode:103254f39a3e25db463-14635583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc60be82d7455125aee498e0c15df49dc0c9e951' => 
    array (
      0 => 'plugin/onlinemember/html/widget_members_userbar.html',
      1 => 1329177568,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '103254f39a3e25db463-14635583',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input type="hidden" id="nbr_online_ajax" value="<?php echo $_smarty_tpl->getVariable('nbr_online')->value;?>
" />
<?php if ($_smarty_tpl->getVariable('nbr_online')->value>0){?>
<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('members')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>	
	<a onclick="userChatNewWindow('<?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
', 'Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
', '<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
')">
		<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/comment.png" title="Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
" alt="Chat with <?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
" />
	</a>
	<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
onlinemember/images/status_online.png" title="Online" alt="Online" />
	<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['nickname'];?>
</a><br />
<?php }} ?>
<?php }else{ ?>
<em>No member is online.</em>
<?php }?>