<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addrank.html" */ ?>
<?php /*%%SmartyHeaderCode:315954f528526772fe5-25094438%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '062062c5bec9d754a08cbd7243a373af9332eb1d' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_addrank.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '315954f528526772fe5-25094438',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/question/ranking_addeditaction">
	<input type="hidden" name="type" value="addrank" />
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	<p>Add a rank: <input type="text" name="rank" /></p>
	<p><input type="checkbox" name="empty_rank" /> : empty rank</p>
	<p>
		<input type="submit" value="Add"  class="button_link"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('addRank')" />
	</p>
</form>