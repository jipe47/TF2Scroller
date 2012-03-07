<?php /* Smarty version Smarty-3.0.7, created on 2012-02-13 01:14:43
         compiled from "plugin/editor/html/uploadform.html" */ ?>
<?php /*%%SmartyHeaderCode:307254f3855f3a71fc6-70029784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10f62ddc3e4f3b1560138d642ffe62df39354792' => 
    array (
      0 => 'plugin/editor/html/uploadform.html',
      1 => 1329085323,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '307254f3855f3a71fc6-70029784',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?UploadPage/<?php echo $_smarty_tpl->getVariable('token')->value;?>
" enctype="multipart/form-data">
	<p><input type="file" name="file"  /> <input type="submit" value="Send" class="button_link"/></p>
</form>

<?php if ($_smarty_tpl->getVariable('showlink')->value){?>
<hr />
<table>
	<tr>
		<td>Direct link: </td>
		<td><input type="text" size="70" value="<?php echo $_smarty_tpl->getVariable('link')->value;?>
" /></td>
	</tr>
	<tr>
		<td>Img link: </td>
		<td><input type="text" size="70" value="[img]<?php echo $_smarty_tpl->getVariable('link')->value;?>
[/img]" /></td>
	</tr>
	<tr>
		<td>Thumb (150px): </td>
		<td><input type="text" size="70" value="[url=<?php echo $_smarty_tpl->getVariable('link')->value;?>
][img]<?php echo $_smarty_tpl->getVariable('link_150')->value;?>
[/img][/url]" /></td>
	</tr>
	<tr>
		<td>Thumb (350px): </td>
		<td><input type="text" size="70" value="[url=<?php echo $_smarty_tpl->getVariable('link')->value;?>
][img]<?php echo $_smarty_tpl->getVariable('link_350')->value;?>
[/img][/url]" /></td>
	</tr><tr>
		<td>Thumb (500px): </td>
		<td><input type="text" size="70" value="[url=<?php echo $_smarty_tpl->getVariable('link')->value;?>
][img]<?php echo $_smarty_tpl->getVariable('link_500')->value;?>
[/img][/url]" /></td>
	</tr>
</table>
<?php }?>