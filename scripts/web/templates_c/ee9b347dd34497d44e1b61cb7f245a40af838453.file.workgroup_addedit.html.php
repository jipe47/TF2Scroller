<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:51:06
         compiled from "plugin/workgroup/html/admin/workgroup_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:20234f52843aad7996-81231454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee9b347dd34497d44e1b61cb7f245a40af838453' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addedit.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20234f52843aad7996-81231454',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><!-- Ok -->
<form method="post" action="?Request/Workgroup/workgroup/addedit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<table class="tab_form">
		<tr>
			<td>Name: </td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Description:</td>
		
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_preview'=>0,'enable_formtag'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td></td>
			<td>	
				<input type="submit" class="button_link_big" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" /> 
				<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

			</td>
		</tr>
	</table>
</form>