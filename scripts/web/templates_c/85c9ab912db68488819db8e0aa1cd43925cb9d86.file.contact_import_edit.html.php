<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 14:36:41
         compiled from "plugin/contact/html/admin/contact_import_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:241374f2a91693a3e22-97444053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c9ab912db68488819db8e0aa1cd43925cb9d86' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_edit.html',
      1 => 1325276942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241374f2a91693a3e22-97444053',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<input type="hidden" id="edit_field_name" value="" />
<p>
	<textarea id="edit_field_value" cols="50" rows="6"></textarea>
</p>

<p>
	<input type="button" class="button_link" value="Ok" onclick="contactEditField($('#edit_field_name').val(), $('#edit_field_value').val()); leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
	<input type="button" class="button_link" value="Cancel" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');" />
</p>

<hr />

<p>Buffer</p>

<textarea id="edit_field_buffer" cols="50" rows="6">
</textarea>
