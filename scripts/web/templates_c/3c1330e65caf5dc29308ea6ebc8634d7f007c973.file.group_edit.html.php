<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 02:51:48
         compiled from "plugin/user/html/group_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:82564f3db2b4b68981-56539384%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c1330e65caf5dc29308ea6ebc8634d7f007c973' => 
    array (
      0 => 'plugin/user/html/group_edit.html',
      1 => 1328387110,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82564f3db2b4b68981-56539384',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/User/groupedit" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	<p>Name: <input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('info')->value['name'];?>
"/></p>
	
	<p>Description:</p>
	<?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('info')->value['description'],'enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>

	
	<p>	
		<input type="submit" value="Edit" class="button_link" />
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>
