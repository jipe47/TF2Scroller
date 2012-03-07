<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 14:36:33
         compiled from "plugin/contact/html/admin/contact_import_2.html" */ ?>
<?php /*%%SmartyHeaderCode:5314f2a9161cf9f38-95117043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba5d1437d4cd72d97cc47e9941466aad4e47ca5a' => 
    array (
      0 => 'plugin/contact/html/admin/contact_import_2.html',
      1 => 1328014295,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5314f2a9161cf9f38-95117043',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h3>Step 2 - Source and Type Linking</h3>
<form method="post" action="?Request/Contact/import/2">
	<input type="hidden" name="filename" value="<?php echo $_smarty_tpl->getVariable('filename')->value;?>
" />
	<input type="hidden" name="nbr_source" value="<?php echo count($_smarty_tpl->getVariable('array_source_detected')->value);?>
" />
	<input type="hidden" name="nbr_type" value="<?php echo count($_smarty_tpl->getVariable('array_type_detected')->value);?>
" />
	
	<?php if (count($_smarty_tpl->getVariable('array_source_detected')->value)>0||count($_smarty_tpl->getVariable('array_type_detected')->value)>0){?>
		<?php if (count($_smarty_tpl->getVariable('array_source_detected')->value)>0){?>
		<table class="tab_admin">
			<tr>
				<th>Detected Source(s)</th>
				<th>Existing Source(s)</th>
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['sd'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source_detected')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sd']->key => $_smarty_tpl->tpl_vars['sd']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sd']->key;
?>
			<tr>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['sd']->value['name'];?>

					<input type="hidden" name="source_name_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sd']->value['name'];?>
" />
				</td>
				<td>
					<select name="source_link_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
						<option value="none">&lt;New Source&gt;</option>
					<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['s']->value['id']==$_smarty_tpl->tpl_vars['sd']->value['id_related']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</option>
					<?php }} ?>
					</select>
				</td>
			</tr>
			<?php }} ?>
		</table>
		<?php }?>
		
		<br />
		
		<?php if (count($_smarty_tpl->getVariable('array_type_detected')->value)>0){?>
		<table class="tab_admin">
			<tr>
				<th>Detected Contact Type(s)</th>
				<th>Existing Contact Type(s)</th>
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['sd'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type_detected')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sd']->key => $_smarty_tpl->tpl_vars['sd']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sd']->key;
?>
			<tr>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['sd']->value['name'];?>

					<input type="hidden" name="type_name_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['sd']->value['name'];?>
" />
				</td>
				<td>
					<select name="type_link_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
">
						<option value="none">&lt;New Type&gt;</option>
					<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['s']->value['id']==$_smarty_tpl->tpl_vars['sd']->value['id_related']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</option>
					<?php }} ?>
					</select>
				</td>
			</tr>
			<?php }} ?>
		</table>
		<?php }?>
	
		<p><input type="submit" value="Link Sources and Types" class="button_link_big"/></p>
	<?php }else{ ?>
		<p><em>There are no sources nor contact type to link.</em></p>
		<p><input type="submit" value="Continue" class="button_link_big" /></p>
	<?php }?>
</form>