<?php /* Smarty version Smarty-3.0.7, created on 2012-02-14 01:19:15
         compiled from "plugin/workgroup/html/admin/workgroup_listquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:30994f39a883ed1f63-71548959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2ce372b8c3725534dcd763394a45afd88eaaeee' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listquestion.html',
      1 => 1329178667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30994f39a883ed1f63-71548959',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><p>Questions for <strong><?php echo $_smarty_tpl->getVariable('questionnaire')->value['name'];?>
</strong>.

<table class="tab_admin">
	<tr>
		<th>#</th>
		<th>Label</th>
		<th>Type of Question</th>
		<th>Action</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('questionnaire')->value['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['q']->key;
?>
	<tr>
		<td width="40">
			<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>

			<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('warning_indexes')->value)){?><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/error.png" alt="This question's settings prevent the questionnaire to be published" title="This question's settings prevent the questionnaire to be published" /><?php }?>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['q']->value['label'];?>
</td>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['q']->value['type']=="open"){?>
			opened question
			<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="multiple"){?>
			multiple choice question
			<?php }else{ ?>
			<?php echo $_smarty_tpl->tpl_vars['q']->value['type'];?>

			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['q']->value['type']!="open"){?>
				<a href="?Admin/Workgroup/editquestion_<?php echo $_smarty_tpl->tpl_vars['q']->value['type'];?>
/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this question" alt="Edit this question" /></a>
			<?php }?>
		</td>
		<td width="100">
			<a href="?Admin/Workgroup/editquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this question" alt="Edit this question" /></a>
			<a href="#delete_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this question" alt="Delete this question" /></a>
			<a href="?Admin/Workgroup/answerquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/answer.png" title="See answers" alt="See answers" /></a>
		
			<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['q']->value['label']==''){?><?php echo "this question";?><?php }else{ ?><?php echo "the question <strong>";?><?php echo $_smarty_tpl->tpl_vars['q']->value['label'];?><?php echo "</strong>";?><?php }?><?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal_confirm(array('id'=>"delete_".($_smarty_tpl->tpl_vars['q']->value['id']),'message'=>"Are you sure you want to delete ".$_tmp1."? Answers will be lost.",'handler_yes'=>"?Admin/Workgroup/deletequestion/".($_smarty_tpl->tpl_vars['q']->value['id'])),$_smarty_tpl);?>

		
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
				<a href="?Request/Workgroup/movequestion/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/up"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_up.png" title="Move up" alt="Move up" /></a>
			<?php }else{ ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('questionnaire')->value['questions'])-1){?>
				<a href="?Request/Workgroup/movequestion/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/down"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_down.png" title="Move down" alt="Move down" /></a>
			<?php }else{ ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/addquestion/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" class="button_link_big">Add a question</a>
	<a href="?Admin/Workgroup/previewquestionnaire/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" class="button_link_big">Preview</a>
	<a href="?Request/Workgroup/publishquestionnaire/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
/fromquestion" class="button_link_big<?php if (!$_smarty_tpl->getVariable('publishable')->value){?>_disabled<?php }?>">Publish</a>
</p>