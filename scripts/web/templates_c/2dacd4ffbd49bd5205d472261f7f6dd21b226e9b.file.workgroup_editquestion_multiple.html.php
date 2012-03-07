<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 16:37:37
         compiled from "plugin/workgroup/html/admin/workgroup_editquestion_multiple.html" */ ?>
<?php /*%%SmartyHeaderCode:44414f2818d1cd7467-32770719%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dacd4ffbd49bd5205d472261f7f6dd21b226e9b' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_editquestion_multiple.html',
      1 => 1328027855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44414f2818d1cd7467-32770719',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><p>Multiple choice(s) for <strong><?php echo $_smarty_tpl->getVariable('question')->value['label'];?>
</strong>:</p>


<h3>Preview</h3>
<?php if (count($_smarty_tpl->getVariable('array_choice')->value)>0){?>
<ul>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_choice')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
		<li style="list-style-type: none;">
			<input type="<?php if ($_smarty_tpl->getVariable('data')->value['max_answer']=='none'){?>checkbox<?php }else{ ?>radio<?php }?>" name="preview" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" />
			<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
 
			<a href="#editChoice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this choice" alt="Edit this choice" /></a>
			<a href="#deleteChoice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title = "Delete this choice" alt="Delete this choice" /></a>
			
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>
			<a href="?Request/Workgroup/editquestion_actionmultiple/up/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_up.png" title="Move up" alt="Move up" /></a>
			<?php }?>
			
			<?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('array_choice')->value)-1){?>
			<a href="?Request/Workgroup/editquestion_actionmultiple/down/<?php echo $_smarty_tpl->getVariable('question')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_down.png" title="Move down" alt="Move down" /></a>
			<?php }?>
		</li>
		<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteChoice_".($_smarty_tpl->tpl_vars['k']->value),'handler_yes'=>"?Request/Workgroup/editquestion_actionmultiple/delete/".($_smarty_tpl->getVariable('question')->value['id'])."/".(($_smarty_tpl->tpl_vars['k']->value+1)),'message'=>"Are you sure you want to delete this choice?"),$_smarty_tpl);?>

		<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>"Edit Choice",'id'=>"editChoice_".($_smarty_tpl->tpl_vars['k']->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoice.html",'id_question'=>$_smarty_tpl->getVariable('question')->value['id'],'key'=>$_tmp1,'value'=>$_smarty_tpl->tpl_vars['c']->value),$_smarty_tpl);?>

	<?php }} ?>
</ul>
<?php }else{ ?>
	<p><em>You must enter at least one choice.</em></p>
<?php }?>

<?php echo smarty_function_html_leanmodal(array('title'=>"Edit Question",'id'=>"editQuestion",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoicequestion.html",'id_question'=>$_smarty_tpl->getVariable('question')->value['id'],'data'=>$_smarty_tpl->getVariable('data')->value),$_smarty_tpl);?>

<?php echo smarty_function_html_leanmodal(array('title'=>"New Choice",'id'=>"addChoice",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addchoice.html",'id_question'=>$_smarty_tpl->getVariable('question')->value['id']),$_smarty_tpl);?>


<br />
<p>
	<a href="#addChoice" class="button_link_big leanModal_button">Add choice</a>
	<a href="#editQuestion" class="button_link_big leanModal_button">Edit question settings</a>
	<a href="?Admin/Workgroup/listquestion/<?php echo $_smarty_tpl->getVariable('question')->value['id_questionnaire'];?>
" class="button_link_big">Return to questionnaire</a>
</p>
