<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:29:04
         compiled from "plugin/contact/html/admin/contact_addedittype.html" */ ?>
<?php /*%%SmartyHeaderCode:85124f2db130db4f41-39477050%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b5f4550d4efcf84ca680073aa620311f3041562' => 
    array (
      0 => 'plugin/contact/html/admin/contact_addedittype.html',
      1 => 1328394515,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85124f2db130db4f41-39477050',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Contact/addedittype">
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
	</table>
		
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link"/>
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>