<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addsubquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:222164f528526835688-25103423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '067a42862c7f3afa0307c76dd792b7ad23390e8a' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addsubquestion.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222164f528526835688-25103423',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/question/ranking_addeditaction">
	<input type="hidden" name="type" value="addquestion" />
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p><input type="text" name="question" /></p>
	<p>
		<input type="submit" value="Add"  class="button_link"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('addSubquestion')" />
	</p>
</form>