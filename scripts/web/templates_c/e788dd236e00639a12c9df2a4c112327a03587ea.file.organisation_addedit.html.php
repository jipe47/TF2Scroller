<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:37:37
         compiled from "plugin/user/html/organisation_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:263134f2e8621004a77-75999033%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e788dd236e00639a12c9df2a4c112327a03587ea' => 
    array (
      0 => 'plugin/user/html/organisation_addedit.html',
      1 => 1328449044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '263134f2e8621004a77-75999033',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><form method="post" action="?Request/User/organisationaddedit" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<input type="hidden" name="fromaccount" value="<?php echo $_smarty_tpl->getVariable('fromaccount')->value;?>
" />
	<fieldset>
		<legend>Information</legend>
		
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
		</table>
		<p></p>
		
		
	</fieldset>
	
	<?php if ($_smarty_tpl->getVariable('logo')->value!=''){?>
	<fieldset>
		<legend>Logo</legend>
		<p>Current logo:</p>
		<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/organisation/mini/<?php echo $_smarty_tpl->getVariable('logo')->value;?>
" />
		<p>
			<input type="checkbox" name="delete_logo" id="delete_logo" />: 
			<label for="delete_logo">Delete this logo</label> (this will discard the new logo if you specified one)
		</p>
	</fieldset>
	<?php }?>
	
	<fieldset>
		<legend>New logo</legend>
		<p>New logo: <input type="file" name="file" /></p>
	</fieldset>
	
	
	<p><input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link_big"/></p>
</form>