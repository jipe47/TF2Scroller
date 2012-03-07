<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 15:48:59
         compiled from "plugin/workgroup/html/admin/workgroup_addeditquestion.html" */ ?>
<?php /*%%SmartyHeaderCode:279204f2e96db1549c3-35608781%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7a701014c4f664c55eb37063c6767105c9859e82' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditquestion.html',
      1 => 1328396251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '279204f2e96db1549c3-35608781',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_message')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.message.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Workgroup/addeditquestion">
	<input type="hidden" name="id_questionnaire" value="<?php echo $_smarty_tpl->getVariable('id_questionnaire')->value;?>
" />
	<input type="hidden" name="id_question" value="<?php echo $_smarty_tpl->getVariable('id_question')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Label:</td>
			<td><input type="text" name="label" value="<?php echo $_smarty_tpl->getVariable('label')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Question:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'question','textarea_value'=>$_smarty_tpl->getVariable('question')->value,'enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Question type:</td>
			<td>
				<input type="radio" name="question_type" id="question_type_open" value="open" <?php if ($_smarty_tpl->getVariable('question_type')->value=="open"){?>checked="checked"<?php }?>><label for="question_type_open">opened</label><br />
				<input type="radio" name="question_type" id="question_type_multiple" value="multiple" <?php if ($_smarty_tpl->getVariable('question_type')->value=="multiple"){?>checked="checked"<?php }?>><label for="question_type_multiple">multiple choice</label><br />
				<input type="radio" name="question_type" id="question_type_ranking" value="ranking" <?php if ($_smarty_tpl->getVariable('question_type')->value=="ranking"){?>checked="checked"<?php }?>><label for="question_type_ranking">ranking</label>
				<?php if ($_smarty_tpl->getVariable('id_question')->value!=-1){?>
					<?php echo smarty_function_message(array('text'=>"If you change the question type, you will lose answers associated to this question.",'type'=>"warning"),$_smarty_tpl);?>

				<?php }?>
			</td>
		</tr>
	</table>
	
	<p> </p>
	
	
	<p></p>
	
	
	
	

	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link_big" />
		<?php echo smarty_function_backButton(array('type'=>"button_big"),$_smarty_tpl);?>

	</p>
</form>