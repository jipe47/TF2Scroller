<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 13:42:10
         compiled from "plugin/workgroup/html/admin/workgroup_deletequestionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:120314f27efb2ba4ac1-42685147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afe9c0c1257bc0ae8718d6a70272ebb9240d7cca' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_deletequestionnaire.html',
      1 => 1328017328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120314f27efb2ba4ac1-42685147',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the questionnaire <strong><?php echo $_smarty_tpl->getVariable('quest')->value['name'];?>
</strong>? Questions and user's answers will be lost.</p><p>	<a href="?Request/Workgroup/deletequestionnaire/<?php echo $_smarty_tpl->getVariable('quest')->value['id_workgroup'];?>
/<?php echo $_smarty_tpl->getVariable('quest')->value['id'];?>
" class="button_link">Yes</a>	<?php echo smarty_function_backButton(array('text'=>"No"),$_smarty_tpl);?>
</p>