<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 14:56:24
         compiled from "plugin/contact/html/admin/contact_import_3.html" */ ?>
<?php /*%%SmartyHeaderCode:278894f2a960867f518-99437413%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bf33065c887ac42bbdacb1949436bc71e240c92' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_3.html',
      1 => 1328190972,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278894f2a960867f518-99437413',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><h3>Step 3 - Importing</h3>
<form method="post" action="?Request/Contact/import/3">
	<input type="hidden" name="filename" value="<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" />
	<input type="hidden" id="nbr_entry" value="<?php echo count($_smarty_tpl->getVariable('array_all')->value);?>
" />
	<p>There are <strong><?php echo count($_smarty_tpl->getVariable('array_insert')->value);?>
</strong> candidats for an insertion, and <strong><?php echo count($_smarty_tpl->getVariable('array_update')->value);?>
</strong> for an update.</p>
	
	<table class="tab_admin tab_import">
		<tr>
			<th>Import</th>
			<th>Entry</th>
			<th>Status</th>
		</tr>
		
		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_all')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
		<tr id="line_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
			<td><input type="checkbox" class="import_checkbox" name="import_contact[]" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="import_contact_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" onclick="contactUpdateImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)"/></td>
			<td>
				<label for="import_contact_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">#<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</label> 
				
				(<a href="#line_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" onclick="contactToggleImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)">More details</a>)
			</td>
			<td id="status_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="status_ignored">Ignored</td>
			<input type="hidden" id="insert_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" name="insert_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['i']->value['insert'];?>
" />
		</tr>
		
		<tr class="process_contact" id="process_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
			<td colspan="3">
				<?php if ($_smarty_tpl->tpl_vars['i']->value['insert']){?>
				<!-- New contact -->
					<p>The following information will be inserted in database.</p>
					<table class="tab_admin">
					<tr>
						<th></th>
						<th>Field</th>
						<th>Value</th>
					</tr>
					
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_field')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
					<tr>
						<td>
							<a href="#editField" class="leanModal_button" onclick="contactLoadEditForm('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
')"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this value" alt="Edit this value" /></a>
						</td>
						<td><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</td>
						<td>
							<span id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_displayed"><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value][$_smarty_tpl->getVariable('f')->value];?>
</span>
							<input type="hidden" id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_hidden" name="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" value="<?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value][$_smarty_tpl->getVariable('f')->value];?>
" />
						</td>
					</tr>
					<?php }} ?>
					
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event_temp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<tr>
						<td></td>
						<td><?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?><em><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</em><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
<?php }?></td>
						<td>
							<input type="checkbox" name="event_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?>_temp<?php }?>[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php if (in_array(($_smarty_tpl->tpl_vars['c']->value['type'])."_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value]['event'])){?>checked="checked" <?php }?>/>
						</td>
					</tr>
					<?php }} ?>
					
					
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria_temp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<tr>
						<td></td>
						<td><?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?><em><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</em><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
<?php }?></td>
						<td>
							<input type="checkbox" name="criteria_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?>_temp<?php }?>[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php if (in_array(($_smarty_tpl->tpl_vars['c']->value['type'])."_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value]['criteria'])){?>checked="checked"<?php }?> />
						</td>
					</tr>
					<?php }} ?>
					</table>
					
				
				<?php }else{ ?>
					<!-- Collision with existing contact -->
					<p>At least one existing entry is similar to <strong><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value]['lastname'];?>
</strong>. What would you like to do?</p>
				<ul>
					<li><input type="radio" onclick="contactUpdateImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)" name="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_nothing" value="nothing" checked="checked" /> <label for="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_nothing">Do nothing</label></li>
					<li><input type="radio" onclick="contactUpdateImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)" name="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_new" 	value="new" /> <label for="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_new">Create a new entry</label></li>
					<li><input type="radio" onclick="contactUpdateImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)" name="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_update" 	value="update" /><label for="choice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_update">Update an existing contact:</label></li>
				</ul>
				
				<table class="tab_admin" id="table_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
					<tr>
						<th><input type="checkbox" id="table_update_checkbox_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" onclick="$('#table_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 input[type=checkbox]').attr('checked', $('#table_update_checkbox_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
').attr('checked'))"/></th>
						<th>Fields</th>
						<th>Import</th>
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['candidates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
						<th>
							<label for="choice_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
"><?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value]['lastname'];?>
</label>
							<br />
							<input type="radio" onclick="contactUpdateImport(<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
)" name="id_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" id="choice_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" />
							</th>
						<?php }} ?>
					</tr>
					
					<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_field')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
					<?php if ($_smarty_tpl->tpl_vars['f']->value!="source"&&$_smarty_tpl->tpl_vars['f']->value!="type"){?>
					<tr>
						<td>
							<input type="checkbox" name="choice_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
[]" id="choice_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" />
						</td>
						<td>
							<label for="choice_update_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</label>
						</td>
						<td>
							<a href="#editField" class="leanModal_button" onclick="contactLoadEditForm('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
')"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this value" alt="Edit this value" /></a>
							<span id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_displayed"><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value][$_smarty_tpl->getVariable('f')->value];?>
</span>
							<input type="hidden" name="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_hidden" value="<?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('k')->value][$_smarty_tpl->getVariable('f')->value];?>
" />
						</td>
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value['candidates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
						<td>
							<?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value][$_smarty_tpl->getVariable('f')->value];?>

						</td>
						<?php }} ?>
					</tr>
					<?php }?>
					<?php }} ?>
				</table>
				<?php }?>
			</td>
		</tr>
		<?php }} ?>
		<tr>
			<td>
				<input type="checkbox" id="select_all" onclick="contactCheckAll()" />
			</td>
			<td colspan="2"></td>
		</tr>
	</table>
	<!-- 
	<h3>Insertion Candidates</h3>
	
	<table class="tab_admin">
		<tr>
			<th>
				<input type="checkbox" name="import_all" id="import_all" />
				<label for="import_all">Import</label>
			</th>
			<th>Contact</th>
			<th>Data</th>
		</tr>
	<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_insert')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
		<tr>
			<td>
				<input type="checkbox" name="import[]" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" />
			</td>
			<td>
				<?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value]['lastname'];?>

			</td>
			<td>
				<table class="tab_admin">
				<tr>
					<th></th>
					<th>Field</th>
					<th>Value</th>
				</tr>
				
				<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_field')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
				<tr>
					<td>
						<a href="#editField" class="leanModal_button" onclick="contactLoadEditForm('<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
')"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this value" alt="Edit this value" /></a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</td>
					<td>
						<span id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_displayed"><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value][$_smarty_tpl->getVariable('f')->value];?>
</span>
						<input type="hidden" id="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_hidden" name="field_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" value="<?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value][$_smarty_tpl->getVariable('f')->value];?>
" />
					</td>
				</tr>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event_temp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
				<tr>
					<td></td>
					<td><?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?><em><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</em><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
<?php }?></td>
					<td>
						<input type="checkbox" name="event_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?>_temp<?php }?>[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php if (in_array(($_smarty_tpl->tpl_vars['c']->value['type'])."_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value]['event'])){?>checked="checked" <?php }?>/>
					</td>
				</tr>
				<?php }} ?>
				
				
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria_temp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
				<tr>
					<td></td>
					<td><?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?><em><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</em><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
<?php }?></td>
					<td>
						<input type="checkbox" name="criteria_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
<?php if ($_smarty_tpl->tpl_vars['c']->value['type']=="temp"){?>_temp<?php }?>[]" value="<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" <?php if (in_array(($_smarty_tpl->tpl_vars['c']->value['type'])."_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('i')->value]['criteria'])){?>checked="checked"<?php }?> />
					</td>
				</tr>
				<?php }} ?>
				</table>
			</td>
		</tr>
	<?php }} ?>
	</table>
	
	<h3>Update Candidates</h3>
	
	<?php  $_smarty_tpl->tpl_vars['candidates'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['n'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_update')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['candidates']->key => $_smarty_tpl->tpl_vars['candidates']->value){
 $_smarty_tpl->tpl_vars['n']->value = $_smarty_tpl->tpl_vars['candidates']->key;
?>
	<fieldset>
		<input type="hidden" name="update[]" value="<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" />
		<p>At least one existing entry is similar to <strong><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('n')->value]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('n')->value]['lastname'];?>
</strong>. What would you like to do?</p>
			<ul>
				<li><input type="radio" name="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_nothing" value="nothing" checked="checked" /> <label for="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_nothing">Do nothing</label></li>
				<li><input type="radio" name="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_new" value="new" /> <label for="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_new">Create a new entry</label></li>
				<li><input type="radio" name="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_update" value="update" /><label for="choice_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_update">Update an existing contact:</label></li>
			 </ul>
			
			<table class="tab_admin">
				<tr>
					<th><input type="checkbox" /></th>
					<th>Fields</th>
					<th>Import</th>
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['candidates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<th>
						<label for="choice_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
"><?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value]['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value]['lastname'];?>
</label>
						<br />
						<input type="radio" name="id_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
" id="choice_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['c']->value;?>
" />
						</th>
					<?php }} ?>
				</tr>
				
				<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_field')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
				<?php if ($_smarty_tpl->tpl_vars['f']->value!="source"&&$_smarty_tpl->tpl_vars['f']->value!="type"){?>
				<tr>
					<td>
						<input type="checkbox" name="choice_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
[]" id="choice_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" />
					</td>
					<td>
						<label for="choice_update_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value;?>
</label>
					</td>
					<td>
						<a href="#editField" class="leanModal_button" onclick="contactLoadEditForm('<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
', '<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
')"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this value" alt="Edit this value" /></a>
						<span id="field_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_displayed"><?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('n')->value][$_smarty_tpl->getVariable('f')->value];?>
</span>
						<input type="hidden" name="field_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
" id="field_<?php echo $_smarty_tpl->tpl_vars['n']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['f']->value;?>
_hidden" value="<?php echo $_smarty_tpl->getVariable('array_contact_temp')->value[$_smarty_tpl->getVariable('n')->value][$_smarty_tpl->getVariable('f')->value];?>
" />
					</td>
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['candidates']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<td>
						<?php echo $_smarty_tpl->getVariable('array_contact_byid')->value[$_smarty_tpl->getVariable('c')->value][$_smarty_tpl->getVariable('f')->value];?>

					</td>
					<?php }} ?>
				</tr>
				<?php }?>
				<?php }} ?>
			</table>
	</fieldset>	
	<?php }} ?>
	 -->
	<p><input type="submit" class="button_link_big" value="Import" /></p>
</form>
<?php echo smarty_function_html_leanmodal(array('title'=>"Field edition",'id'=>"editField",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."contact/html/admin/contact_import_edit.html"),$_smarty_tpl);?>


<?php  $_smarty_tpl->tpl_vars['content'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_buffer')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['content']->key => $_smarty_tpl->tpl_vars['content']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['content']->key;
?>
<div id="buffer_<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" style="display: none;"><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
</div>
<?php }} ?>