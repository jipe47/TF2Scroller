<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:59:42
         compiled from "plugin/workgroup/html/admin/workgroup_addeditquestionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:138794f2db85eeaa738-62985924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c46f35a04f1aa2caf91dee7cc4c9a2b3d03d3429' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditquestionnaire.html',
      1 => 1328396380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138794f2db85eeaa738-62985924',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
?><form method="post" action="?Request/Workgroup/addeditquestionnaire">
	<input type="hidden" name="id_questionnaire" value="<?php echo $_smarty_tpl->getVariable('id_questionnaire')->value;?>
" />
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Deadline:</td>
			<td>
				<input type="radio" name="deadline" value="none" <?php if ($_smarty_tpl->getVariable('deadline')->value=="none"){?>checked="checked"<?php }?> /> no deadline<br />
				<input type="radio" name="deadline" value="date" <?php if ($_smarty_tpl->getVariable('deadline')->value=="date"){?>checked="checked"<?php }?> /> date: 
					<?php echo smarty_function_html_select_date(array('time'=>$_smarty_tpl->getVariable('deadline_date')->value,'start_year'=>"-1",'end_year'=>"+2"),$_smarty_tpl);?>

			</td>
		</tr>
	</table>
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" class="button_link" />
		<?php if ($_smarty_tpl->getVariable('id_questionnaire')->value!=-1){?>
		<a href="?Admin/Workgroup/listquestion/<?php echo $_smarty_tpl->getVariable('id_questionnaire')->value;?>
"><input type="button" value="Edit questions" class="button_link" /></a>
		<?php }?>
	</p>
</form>