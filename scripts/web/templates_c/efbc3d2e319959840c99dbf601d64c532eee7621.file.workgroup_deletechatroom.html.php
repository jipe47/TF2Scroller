<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 19:02:38
         compiled from "plugin/workgroup/html/admin/workgroup_deletechatroom.html" */ ?>
<?php /*%%SmartyHeaderCode:43574f2ec43e306a45-90569156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efbc3d2e319959840c99dbf601d64c532eee7621' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_deletechatroom.html',
      1 => 1328016427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '43574f2ec43e306a45-90569156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the chat room <strong><?php echo $_smarty_tpl->getVariable('chat')->value['name'];?>
</strong>? Any uploaded file will be lost, as well as posted messages.</p><p>	<a href="?Request/Workgroup/deletechatroom/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
/<?php echo $_smarty_tpl->getVariable('chat')->value['id'];?>
" class="button_link">Yes</a>	<?php echo smarty_function_backButton(array('text'=>"No"),$_smarty_tpl);?>
</p>