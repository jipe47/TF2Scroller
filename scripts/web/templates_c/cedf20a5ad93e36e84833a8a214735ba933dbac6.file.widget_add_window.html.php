<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 21:56:11
         compiled from "plugin/filemanager/html/widget_add_window.html" */ ?>
<?php /*%%SmartyHeaderCode:134214f29a6ebe2c9f0-73556597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cedf20a5ad93e36e84833a8a214735ba933dbac6' => 
    array (
      0 => 'plugin/filemanager/html/widget_add_window.html',
      1 => 1324022639,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134214f29a6ebe2c9f0-73556597',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><form method="post" action="?Request/Filemanager/addedit" enctype="multipart/form-data">
	<input type="hidden" name="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" />
	<input type="hidden" name="type" value="<?php echo $_smarty_tpl->getVariable('type')->value;?>
" />
	<p>File: <input type="file" name="file" />
	<p>Name: <input type="text" name="name" id="filemanager_title" onkeyup="filemanagerCheckTitle()" /></p>
	<p>Description</p>
	<?php echo smarty_function_plugin(array('p'=>'bbcode','enable_formtag'=>0,'enable_preview'=>0,'textarea_name'=>'description'),$_smarty_tpl);?>

	<p>
		<input type="submit" value="Upload" class="button_link" id="filemanager_send" disabled="1"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
</form>