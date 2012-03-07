<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:56:12
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoicequestion.html" */ ?>
<?php /*%%SmartyHeaderCode:80264f52856ca31996-61397188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '84e68c59bd6235e60481eff30414125a445a9097' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoicequestion.html',
      1 => 1330808167,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '80264f52856ca31996-61397188',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Ok -->
<form method="post" action="?Request/Workgroup/question/multiple_edit">
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p>Maximum answer: 	<select name="max_answer">
							<option value="one">one</option>
							<option value="none" <?php if (array_key_exists("max_answer",$_smarty_tpl->getVariable('data')->value)&&$_smarty_tpl->getVariable('data')->value['max_answer']=='none'){?>selected="selected"<?php }?>>unlimited</option>
						</select></p>
	<div class="buttons">
		<input type="submit" class="button_link_big" value="Edit" />
		<input type="button" value="Cancel" class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
	</div>
</form>