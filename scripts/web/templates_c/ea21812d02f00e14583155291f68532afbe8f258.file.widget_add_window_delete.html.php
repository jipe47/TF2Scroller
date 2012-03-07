<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 21:56:11
         compiled from "plugin/filemanager/html/widget_add_window_delete.html" */ ?>
<?php /*%%SmartyHeaderCode:257324f29a6ebc7bbb2-90850273%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ea21812d02f00e14583155291f68532afbe8f258' => 
    array (
      0 => 'plugin/filemanager/html/widget_add_window_delete.html',
      1 => 1323037266,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '257324f29a6ebc7bbb2-90850273',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Are you sure you want to delete this file?</p>

<form method="post" action="?Request/Filemanager/delete">
	<input type="hidden" id="id_file_delete" name="id_file" value="" />
	<input type="hidden" name="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" />
	<p>
		<input type="submit" class="button_link" value="Yes" />
		<input type="button" class="button_link" value="No" onclick="leanModal_close('filemanager_delete_<?php echo $_smarty_tpl->getVariable('uid')->value;?>
')" />
	</p>
</form>