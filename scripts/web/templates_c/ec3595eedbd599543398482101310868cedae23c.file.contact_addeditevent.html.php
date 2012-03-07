<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:25:47
         compiled from "plugin/contact/html/admin/contact_addeditevent.html" */ ?>
<?php /*%%SmartyHeaderCode:274104f2db06ba7a4b2-76307862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec3595eedbd599543398482101310868cedae23c' => 
    array (
      0 => 'plugin/contact/html/admin/contact_addeditevent.html',
      1 => 1328394334,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '274104f2db06ba7a4b2-76307862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Contact/addeditevent">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
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
			<td>Place:</td>
			<td><input type="text" name="place" value="<?php echo $_smarty_tpl->getVariable('place')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Timestamp:</td>
			<td><?php echo smarty_function_html_select_date(array('time'=>$_smarty_tpl->getVariable('timestamp')->value,'start_year'=>"-1",'end_year'=>"+2"),$_smarty_tpl);?>
</td>
		</tr>
	</table>
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link"/>
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>