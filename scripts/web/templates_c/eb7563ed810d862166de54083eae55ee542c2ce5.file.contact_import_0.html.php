<?php /* Smarty version Smarty-3.0.7, created on 2012-03-06 00:46:35
         compiled from "plugin/contact/html/admin/contact_import_0.html" */ ?>
<?php /*%%SmartyHeaderCode:220464f55505b09ae88-43371174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb7563ed810d862166de54083eae55ee542c2ce5' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_0.html',
      1 => 1330132824,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220464f55505b09ae88-43371174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h3>Step 0 - Importation Parameters</h3>

<form method="post" action="?Request/Contact/import/import/0/<?php echo $_smarty_tpl->getVariable('filename')->value;?>
">
	<input type="hidden" name="filename" value="<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" />
	<table>
		<tr>
			<td><label for="column_separator">Column separator</label></td>
			<td><input type="text" name="column_separator" id="column_separator" value="," /></td>
		</tr>
		<tr>
			<td><label for="text_separator">Text separator</label></td>
			<td><input type="text" name="text_separator" id="text_separator" value='"' /></td>
		</tr>
	</table>
	<p><input type="submit" value="Start Importing" class="button_link_big"/></p>
</form>