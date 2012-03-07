<?php /* Smarty version Smarty-3.0.7, created on 2012-03-07 14:26:22
         compiled from "plugin/workgroup/html/workgroup_file_uploadwindow.html" */ ?>
<?php /*%%SmartyHeaderCode:175334f5761fe1fceb9-05660859%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aac1150f54acbb92dab8e8a5e300a6d372fa98fb' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_file_uploadwindow.html',
      1 => 1330185376,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175334f5761fe1fceb9-05660859',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" enctype="multipart/form-data" action="?Request/Workgroup/file/modfile">
	<input type="hidden" name="id_file" value="<?php echo $_smarty_tpl->getVariable('id_file')->value;?>
" id="uploadwindow_id_file" />
	<p>File: <input type="file" name="file" /></p>
	<p>Comment</p>
	<textarea name="comment"></textarea>
	<p>
		<input type="submit" value="Submit modification" class="button_link" />
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
</form>