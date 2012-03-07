<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 11:34:59
         compiled from "plugin/workgroup/html/admin/workgroup_delete.html" */ ?>
<?php /*%%SmartyHeaderCode:125004f33a1536b99f2-39357288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a46ed1b9bf1b2d0a3e3ec3a8aad6e532b36d1bb' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_delete.html',
      1 => 1327969503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125004f33a1536b99f2-39357288',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the workgroup <strong><?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
</strong>? Files associated to it will be deleted, as well as conversations and topics.<?php if (!$_smarty_tpl->getVariable('workgroup')->value['disabled']){?>	<p>You can also <a href="?Request/Workgroup/toggle/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">disable this workgroup</a></p><?php }?><p>	<a href="?Request/Workgroup/delete/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link">Yes</a>	<?php echo smarty_function_backButton(array('text'=>"No"),$_smarty_tpl);?>
</p>