<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 15:51:55
         compiled from "plugin/workgroup/html/admin/workgroup_editquestion_ranking.html" */ ?>
<?php /*%%SmartyHeaderCode:237584f2e978b4e8c16-57601193%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b9716c0e495d2d86c985d27673de72ff1823d11' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_editquestion_ranking.html',
      1 => 1328453513,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '237584f2e978b4e8c16-57601193',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanModal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanModal_confirm.php';
if (!is_callable('smarty_function_html_leanModal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanModal.php';
?><table class="tab_admin">
	<tr>
		<th>Sub-question(s)</th>
		<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_rank')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
		<th>
			<span id="rank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</span>
			
			<br />
			
			<a class="leanModal_button" href="#editRank" onclick="$('#edit_rank_index').val('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
');$('#edit_rank_name').val($('#rank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
').html())"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit" alt="Edit" /></a>
			<a href="#deleteRank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete" alt="Delete" /></a>
			
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
			<a href="?Request/Workgroup/editquestion_getranking/uprank/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_left.png" title="Move left" alt="Move left" /></a>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('array_rank')->value)-1){?>
			<a href="?Request/Workgroup/editquestion_getranking/downrank/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="Move right" alt="Move right" /></a>
			<?php }?>
			<?php echo smarty_function_html_leanModal_confirm(array('message'=>"Are you sure you want to delete the rank <strong>".($_smarty_tpl->tpl_vars['r']->value)."</strong>?",'id'=>"deleteRank_".($_smarty_tpl->tpl_vars['k']->value),'handler_yes'=>"?Request/Workgroup/editquestion_getranking/deleterank/".($_smarty_tpl->getVariable('question')->value['id'])."/".($_smarty_tpl->tpl_vars['k']->value)),$_smarty_tpl);?>

		</th>
		<?php }} ?>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['sq'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_question')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sq']->key => $_smarty_tpl->tpl_vars['sq']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sq']->key;
?>
	<tr>
		<td>
			<a class="leanModal_button" href="#editSubquestion" onclick="$('#edit_subquestion_index').val('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
');$('#edit_subquestion_name').val($('#subquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
').html())"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit" alt="Edit" /></a>
			<a href="#deleteSubquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete" alt="Delete" /></a>
	
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
			<a href="?Request/Workgroup/editquestion_getranking/upquestion/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_up.png" title="Move up" alt="Move up" /></a>
			<?php }else{ ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('array_question')->value)-1){?>
			<a href="?Request/Workgroup/editquestion_getranking/downquestion/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_down.png" title="Move down" alt="Move down" /></a>
			<?php }else{ ?>
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>	
			
			<?php echo smarty_function_html_leanModal_confirm(array('message'=>"Are you sure you want to delete the subquestion <strong>".($_smarty_tpl->tpl_vars['sq']->value)."</strong>?",'id'=>"deleteSubquestion_".($_smarty_tpl->tpl_vars['k']->value),'handler_yes'=>"?Request/Workgroup/editquestion_getranking/deletequestion/".($_smarty_tpl->getVariable('question')->value['id'])."/".($_smarty_tpl->tpl_vars['k']->value)),$_smarty_tpl);?>

			
			<span id="subquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sq']->value;?>
</span>
		</td>
		<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_rank')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['kr']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
		<td><input type="radio" name="answer_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['kr']->value+1;?>
" /></td>
		<?php }} ?>
	</tr>
	<?php }} ?>	
</table>

<p>
	<a href="#addRank" class="leanModal_button button_link">Add a rank</a>&nbsp;
	<a href="#addSubquestion" class="leanModal_button button_link">Add a subquestion</a>
	<br /><br />
	<a href="?Admin/Workgroup/listquestion/<?php echo $_smarty_tpl->getVariable('question')->value['id_questionnaire'];?>
" class="button_link_big">Return to questionnaire</a>
</p>

<?php echo smarty_function_html_leanModal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addrank.html",'title'=>"Add a rank",'id'=>"addRank",'id_question'=>($_smarty_tpl->getVariable('question')->value['id'])),$_smarty_tpl);?>

<?php echo smarty_function_html_leanModal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addsubquestion.html",'title'=>"Add a subquestion",'id'=>"addSubquestion",'id_question'=>($_smarty_tpl->getVariable('question')->value['id'])),$_smarty_tpl);?>


<?php echo smarty_function_html_leanModal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editsubquestion.html",'title'=>"Edit a subquestion",'id'=>"editSubquestion",'id_question'=>($_smarty_tpl->getVariable('question')->value['id'])),$_smarty_tpl);?>

<?php echo smarty_function_html_leanModal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editrank.html",'title'=>"Edit a rank",'id'=>"editRank",'id_question'=>($_smarty_tpl->getVariable('question')->value['id'])),$_smarty_tpl);?>

