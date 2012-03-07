<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 00:00:36
         compiled from "plugin/workgroup/html/admin/workgroup_addeditfile.html" */ ?>
<?php /*%%SmartyHeaderCode:142924f2db894c7ce87-89956532%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e93cb13550ca554d24f7001af110f90da39bc84' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditfile.html',
      1 => 1328396423,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '142924f2db894c7ce87-89956532',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
?><form method="post" action="?Request/Workgroup/addeditfile" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_preview'=>0,'enable_formtag'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>File:</td>
			<td>
			<input type="file" name="file" />
			<?php if ($_smarty_tpl->getVariable('filename')->value!=''){?>
				<br /><a href="upload/workgroup/file/<?php echo $_smarty_tpl->getVariable('filename')->value;?>
">Current file</a>
			<?php }?>
			</td>
		</tr>
		<?php if ($_smarty_tpl->getVariable('id')->value!=-1){?>
		<tr>
			<td><label for="reset_mod">Reset file modifications<br />uploaded by workgroup members.</label></td>
			<td><input type="checkbox" name="reset_mod" id="reset_mod" checked="checked"/></td>
		</tr>
		<tr>
			<td><label for="call_user">Send an e-mail to members<br />who posted a modification.</label></td>
			<td><input type="checkbox" name="call_user" id="call_user" checked="checked"/></td>
		</tr>
		<?php }else{ ?>
		<tr>
			<td><label for="call_user">Send an e-mail to workgroup<br />members to report a new file.</label></td>
			<td><input type="checkbox" name="call_user" id="call_user" checked="checked"/></td>
		</tr>
		<?php }?>
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
		<input type="submit" class="button_link" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" />
	</p>
</form>