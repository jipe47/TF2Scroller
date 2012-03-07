<?php /* Smarty version Smarty-3.0.7, created on 2012-02-19 01:17:28
         compiled from "plugin/contact/html/admin/contact_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:197024f403f98a5d8b5-84586844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '102b8545468fefad4caa6e9ed35a05e406398d9d' => 
    array (
      0 => 'plugin/contact/html/admin/contact_addedit.html',
      1 => 1328393796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '197024f403f98a5d8b5-84586844',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_country')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_country.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Contact/addedit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Title</td>
			<td>
				<select name="title">
					<option value="mr">Mr</option>
					<option value="mrs" <?php if ($_smarty_tpl->getVariable('info')->value['title']=="mrs"){?>selected="selected"<?php }?>>Mrs</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Lastname:</td>
			<td><input type="text" name="lastname" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastname'];?>
" /></td>
		</tr>
		<tr>
			<td>Firstname:</td>
			<td><input type="text" name="firstname" value="<?php echo $_smarty_tpl->getVariable('info')->value['firstname'];?>
" /></td>
		</tr>
		<tr>
			<td>Email:</td>
			<td><input type="text" name="email" value="<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
" /></td>
		</tr>
		<tr>
			<td>Job:</td>
			<td><input type="text" name="job" value="<?php echo $_smarty_tpl->getVariable('info')->value['job'];?>
" /></td>
		</tr>
		<tr>
			<td>Street</td>
			<td><input type="text" name="street" value="<?php echo $_smarty_tpl->getVariable('info')->value['street'];?>
" /></td>
		</tr>
		<tr>
			<td>Number</td>
			<td><input type="text" name="number" value="<?php echo $_smarty_tpl->getVariable('info')->value['number'];?>
" /></td>
		</tr>
		<tr>
			<td>Postal</td>
			<td><input type="text" name="postal" value="<?php echo $_smarty_tpl->getVariable('info')->value['postal'];?>
" /></td>
		</tr>
		<tr>
			<td>City:</td>
			<td><input type="text" name="city" value="<?php echo $_smarty_tpl->getVariable('info')->value['city'];?>
" /></td>
		</tr>
		<tr>
			<td>Country:</td>
			<td>
				<!-- Todo: fonction smarty pour afficher les pays -->
				<!--<input type="text" name="country" value="<?php echo $_smarty_tpl->getVariable('info')->value['country'];?>
" />-->
				
				<?php echo smarty_function_html_select_country(array('format'=>'select','value'=>$_smarty_tpl->getVariable('info')->value['country']),$_smarty_tpl);?>

			</td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="phone" value="<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" /></td>
		</tr>
		<tr>
			<td>Fax</td>
			<td><input type="text" name="fax" value="<?php echo $_smarty_tpl->getVariable('info')->value['fax'];?>
" /></td>
		</tr>
		<tr>
			<td>Mobile</td>
			<td><input type="text" name="mobile" value="<?php echo $_smarty_tpl->getVariable('info')->value['mobile'];?>
" /></td>
		</tr>
		<tr>
			<td>Website</td>
			<td><input type="text" name="website" value="<?php echo $_smarty_tpl->getVariable('info')->value['website'];?>
" /></td>
		</tr>
	
		<tr>
			<td>Source:</td>
			<td>
				<select name="id_source">
				<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['s']->value['id']==$_smarty_tpl->getVariable('info')->value['id_source']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</option>
				<?php }} ?>
				</select>
				<a href="?Admin/Contact/listsource"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/manage.png" title="Manage sources" alt="Manage sources" /></a>
			</td>
		</tr>
		<tr>
			<td>Contact type:</td>
			<td>
				<select name="id_type">
				<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['t']->value['id']==$_smarty_tpl->getVariable('info')->value['id_type']){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</option>
				<?php }} ?>
				</select>
				<a href="?Admin/Contact/listtype"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/manage.png" title="Manage types" alt="Manage types" /></a>
			</td>
		</tr>
	</table>
	
	<p>Link this user to event(s).</p>
	
	<ul>
		<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
		<li>
			<input type="checkbox" name="events[]" id="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['e']->value['id'],$_smarty_tpl->getVariable('info')->value['events'])){?> checked="checked"<?php }?> />
			<label for="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</label>
		</li>
		<?php }} ?>
	</ul>
	
	<p>Criteria</p>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
		<li><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</li>
		<ul>
			<li>
				<input type="radio" name="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" id="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_default" <?php if ($_smarty_tpl->getVariable('array_criteria_value')->value[$_smarty_tpl->tpl_vars['c']->value['id']]=="default"){?>checked="checked" <?php }?>value="default"/>: 
				<label for="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_default">Default value of the criteria</label>
			</li>
			<li>
				<input type="radio" name="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" id="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_set" <?php if ($_smarty_tpl->getVariable('array_criteria_value')->value[$_smarty_tpl->tpl_vars['c']->value['id']]=="set"){?>checked="checked" <?php }?>value="set"/>: 
				<label for="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_set">Set</label>
			</li>
			<li>
				<input type="radio" name="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" id="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_unset" <?php if ($_smarty_tpl->getVariable('array_criteria_value')->value[$_smarty_tpl->tpl_vars['c']->value['id']]=="unset"){?>checked="checked" <?php }?>value="unset"/>: 
				<label for="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
_unset">Unset</label>
			</li>
		</ul>
	<?php }} ?>
	</ul>
	<p>	
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link"/>
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>