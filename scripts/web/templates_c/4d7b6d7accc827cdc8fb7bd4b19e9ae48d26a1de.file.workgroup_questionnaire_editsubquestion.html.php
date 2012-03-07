<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editsubquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:322294f5285264401c2-75549518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4d7b6d7accc827cdc8fb7bd4b19e9ae48d26a1de' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editsubquestion.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322294f5285264401c2-75549518',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/question/ranking_addeditaction">
	<input type="hidden" name="type" value="editquestion" />
	<input type="hidden" name="index" value="<?php echo $_smarty_tpl->getVariable('index')->value+1;?>
" />
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p>Edit subquestion: <input type="text" name="question" value="<?php echo $_smarty_tpl->getVariable('subquestion')->value;?>
" /></p>
	<p>
		<input type="submit" value="Edit"  class="button_link"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
</form>