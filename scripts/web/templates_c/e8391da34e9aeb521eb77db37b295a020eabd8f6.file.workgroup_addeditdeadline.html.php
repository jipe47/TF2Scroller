<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:49:57
         compiled from "plugin/workgroup/html/admin/workgroup_addeditdeadline.html" */ ?>
<?php /*%%SmartyHeaderCode:171174f2db6158c6451-25332103%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8391da34e9aeb521eb77db37b295a020eabd8f6' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditdeadline.html',
      1 => 1328395795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171174f2db6158c6451-25332103',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
?><form method="post" action="?Request/Workgroup/addeditdeadline">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
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
			<td>Short description<br />(displayed in the<br/>working group homepage):</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','enable_formtag'=>0,'enable_preview'=>0,'textarea_name'=>'description_short','textarea_value'=>$_smarty_tpl->getVariable('description_short')->value),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Detailled description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','enable_formtag'=>0,'enable_preview'=>0,'textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Date:</td>
			<td><?php echo smarty_function_html_select_date(array('time'=>$_smarty_tpl->getVariable('timestamp')->value,'start_year'=>"-1",'end_year'=>"+3"),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td><label for="call_user">Send an e-mail to workgroup members<br />to announce this <br /><?php if ($_smarty_tpl->getVariable('id')->value==-1){?>deadline<?php }else{ ?>modification<?php }?></label></td>
			<td><input type="checkbox" name="call_user" id="call_user" /></td>
		</tr>
	</table>

	<p><input type="submit" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" class="button_link" /></p>
</form>