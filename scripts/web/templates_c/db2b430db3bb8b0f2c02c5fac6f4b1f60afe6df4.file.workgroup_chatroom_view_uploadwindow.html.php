<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 15:54:04
         compiled from "plugin/workgroup/html/workgroup_chatroom_view_uploadwindow.html" */ ?>
<?php /*%%SmartyHeaderCode:217234f2aa38c5423f3-35898109%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db2b430db3bb8b0f2c02c5fac6f4b1f60afe6df4' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_chatroom_view_uploadwindow.html',
      1 => 1327761517,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217234f2aa38c5423f3-35898109',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/chatroomaddfile" enctype="multipart/form-data">
	<input type="hidden" name="id_chatroom" value="<?php echo $_smarty_tpl->getVariable('id_chatroom')->value;?>
" />
	<p>File: <input type="file" name="file" />
	<p>Title: <input type="text" name="name" /></p>
	<p>
		<input type="submit" value="Upload" class="button_link"/>
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
</form>
