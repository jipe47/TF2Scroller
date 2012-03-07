<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:55:02
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editrankingquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:42824f5285265ba569-34543982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26367281d8a9276672a93bd3dcf030fa3446daff' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_questionnaire_editrankingquestion.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42824f5285265ba569-34543982',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/question/ranking_edit">
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td><label for="enable_subcomment">Enable comment on each subquestion</label>:</td>
			<td><input type="checkbox" name="enable_subcomment" id="enable_subcomment"<?php if (array_key_exists('enable_subcomment',$_smarty_tpl->getVariable('data')->value)&&$_smarty_tpl->getVariable('data')->value['enable_subcomment']){?> checked="checked"<?php }?> /></td>
		</tr>
	</table>
	
	<div class="buttons">
		<input type="submit" class="button_link_big" value="Edit" />
		<input type="button" value="Cancel" class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
	</div>
</form>