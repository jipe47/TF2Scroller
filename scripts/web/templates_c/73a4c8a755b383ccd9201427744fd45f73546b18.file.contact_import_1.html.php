<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 14:36:12
         compiled from "plugin/contact/html/admin/contact_import_1.html" */ ?>
<?php /*%%SmartyHeaderCode:72154f2a914c23f448-12405721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73a4c8a755b383ccd9201427744fd45f73546b18' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_1.html',
      1 => 1328014289,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72154f2a914c23f448-12405721',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h3>Step 1 - Column linking</h3>

<p>Detected columns in file:</p>
<form method="post" action="?Request/Contact/import/1">
<input type="hidden" name="filename" value="<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" />
<input type="hidden" name="nbr_col" value="<?php echo $_smarty_tpl->getVariable('nbr_col')->value;?>
" />

<table class="tab_admin">
	<tr>
		<th>Column Name</th>
		<th>Link</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('column_label')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['l']->key;
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</td>
			<td>
				<select name="label_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
					<optgroup label="Infos">
						<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kkk'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_key')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['kkk']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['kkk']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['kkk']->value==$_smarty_tpl->getVariable('column_label_prediction')->value[$_smarty_tpl->getVariable('k')->value]){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['kkk']->value;?>
</option>
						<?php }} ?>
					</optgroup>
								
					<optgroup label="Criteria">
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
						<option value="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"  <?php if ("criteria_".($_smarty_tpl->tpl_vars['c']->value['id'])==$_smarty_tpl->getVariable('column_label_prediction')->value[$_smarty_tpl->getVariable('k')->value]){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</option>
						<?php }} ?>
					</optgroup>
							
					<optgroup label="Event">
						<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
						<option value="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"  <?php if ("event_".($_smarty_tpl->tpl_vars['e']->value['id'])==$_smarty_tpl->getVariable('column_label_prediction')->value[$_smarty_tpl->getVariable('k')->value]){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</option>
						<?php }} ?>
					</optgroup>
										
					<optgroup label="Other">
						<option value="buffered"<?php if ($_smarty_tpl->getVariable('column_label_prediction')->value[$_smarty_tpl->getVariable('k')->value]==-1){?> selected="selected"<?php }?>>Store it</option>
						<option value="ignore">Ignore</option>
						<option value="new_criteria_unset">New criteria (default: unset)</option>
						<option value="new_criteria_set">New criteria (default: set)</option>
						<option value="new_event">New event</option>
					</optgroup>
				</select>
				<input type="hidden" name="col_name_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['l']->value);?>
" />
			</td>
		</tr>
	<?php }} ?>
		
</table>
	<p><input type="submit" value="Link Columns" class="button_link_big"/></p>
</form>