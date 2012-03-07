<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editrank.html" */ ?>
<?php /*%%SmartyHeaderCode:22684f52852625b9c6-50131561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c59317b303b95966402dde2c3ba4a1d5c77e011f' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editrank.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22684f52852625b9c6-50131561',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/question/ranking_addeditaction">
	<input type="hidden" name="type" 		value="editrank" />
	<input type="hidden" name="index" 		value="<?php echo $_smarty_tpl->getVariable('index')->value+1;?>
"/>
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p>Edit rank: <input type="text" name="rank" value="<?php echo $_smarty_tpl->getVariable('rank')->value;?>
" /></p>
	<p><input type="checkbox" name="empty_rank" /> : empty rank</p>
	<p>
		<input type="submit" value="Edit"  class="button_link"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
</form>