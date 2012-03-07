<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:01
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoice.html" */ ?>
<?php /*%%SmartyHeaderCode:57024f528525c01df1-97904910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd6441ebefca36d8811f0aa29000c184370cb201' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoice.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57024f528525c01df1-97904910',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!-- Ok -->
<form method="post" action="?Request/Workgroup/question/multiple_action/edit/<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
/<?php echo $_smarty_tpl->getVariable('key')->value;?>
">
	<p>
		<input type="text" name="choice" value="<?php echo $_smarty_tpl->getVariable('value')->value;?>
"/>
	</p>
	<p>
		<input type="submit" value="Edit" class="button_link_big" />
		<input type="button" value="Cancel" class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
	</p>
</form>