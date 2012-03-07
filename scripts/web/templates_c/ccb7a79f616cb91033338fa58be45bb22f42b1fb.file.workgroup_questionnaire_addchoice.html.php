<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addchoice.html" */ ?>
<?php /*%%SmartyHeaderCode:218124f52852606a4c3-31714763%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccb7a79f616cb91033338fa58be45bb22f42b1fb' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addchoice.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '218124f52852606a4c3-31714763',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Ok -->
<form method="post" action="?Request/Workgroup/question/multiple_addchoice">
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p>
		Add a choice: <input type="text" name="choice" />
	</p>
	<p>
		<input type="submit" value="Add" class="button_link_big" />
		<input type="button" value="Cancel" class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
	</p>
</form>