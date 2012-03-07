<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 11:19:20
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_deleterank.html" */ ?>
<?php /*%%SmartyHeaderCode:237834f291fb87797f9-75329199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f409121adb7df1561b1dead9427a9ff1fce49850' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_deleterank.html',
      1 => 1325461651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237834f291fb87797f9-75329199',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Are you sure you want to delete this rank?</p>
<p>
	<a href="?Request/Workgroup/editquestion_getranking/deleterank/<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
/<?php echo $_smarty_tpl->getVariable('index')->value;?>
" class="button_link">Yes</a>
	<input type="button" onclick="leanModal_close('deleteRank_<?php echo $_smarty_tpl->getVariable('index')->value;?>
');" value="No" class="button_link" />
</p>