<?php /* Smarty version Smarty-3.0.7, created on 2012-03-06 00:43:05
         compiled from "plugin/contact/html/admin/contact_import_form.html" */ ?>
<?php /*%%SmartyHeaderCode:313564f554f8979a354-27027666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b38bdfb0cf353c0e7bd0f1e12a921b6880f522a' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_form.html',
      1 => 1330132824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313564f554f8979a354-27027666',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Admin/Contact/import/import" enctype="multipart/form-data">
	<p>Label: <input type="text" name="label" /></p>
	<p>File: <input type="file" name="file" /></p>
	<p><input type="submit" value="Import file" class="button_link_big"/></p>
</form>
