<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 11:19:20
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_deletesubquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:83404f291fb8957aa5-27495621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f763e27e02c5ea3b6e56b3aee6e9ce4ff2f49300' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_deletesubquestion.html',
      1 => 1325461659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83404f291fb8957aa5-27495621',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Are you sure you want to delete this subquestion?</p>
<p>
	<a href="?Request/Workgroup/editquestion_getranking/deletequestion/<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
/<?php echo $_smarty_tpl->getVariable('index')->value;?>
" class="button_link">Yes</a>
	<input type="button" onclick="leanModal_close('deleteSubquestion_<?php echo $_smarty_tpl->getVariable('index')->value;?>
');" value="No" class="button_link" />
</p>