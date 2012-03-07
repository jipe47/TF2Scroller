<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 02:51:03
         compiled from "plugin/user/html/user_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:145594f3db28774f828-23039898%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cfdff03af172f4a50fd6a1684813e0e7db2f248' => 
    array (
      0 => 'plugin/user/html/user_addedit.html',
      1 => 1329252074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '145594f3db28774f828-23039898',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_country')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_country.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><form method="post" action="?Request/User/useradd">
	<input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->getVariable('id_user')->value;?>
" />
	<h2>Connection info</h2>
	<table class="tab_form tab_login" >
		<tr>
			<td class="left">Login*:</td>
			<td>
				<input type="text" name="login" id="login" value="<?php echo $_smarty_tpl->getVariable('info')->value['login'];?>
" onkeyup="userVerifyLogin('<?php echo $_smarty_tpl->getVariable('info')->value['login'];?>
')"/>
				<span id="login_status"></span>
			</td>
		</tr>
		<tr>
			<td class="left">Password*:</td>
			<td>
				<input type="password" name="pass1" id="pass1" onkeyup="userVerifyPass()" />
				<span id="pass_status"></span>
			</td>
		</tr>
		<tr>
			<td class="left">Confirm password*:</td>
			<td><input type="password" name="pass2" id="pass2" onkeyup="userVerifyPass()" /></td>
		</tr>
		<tr>
			<td class="left"><input type="button" onclick="userGeneratePassword();" value="Generate password" class="button_link" /></td>
			<td><input type="text" id="pass_generated" /></td>
		</tr>
		<tr>
			<td>
				<label for="admin">Administrator:</label>
			</td>
			<td>
				<input type="checkbox" name="admin" id="admin"<?php if ($_smarty_tpl->getVariable('info')->value['isAdmin']){?> checked="checked"<?php }?>/>
			</td>
		</tr>
	</table>
	<p><em>*: these fields must be completed.</em></p>
	
	<h2>User info</h2>
	
	<input type="hidden" name="id_contact" value="<?php echo $_smarty_tpl->getVariable('info')->value['id_contact'];?>
" />
	<table class="tab_form">
		<tr>
			<td>
				<label for="createContactEntry">Insert an entry in the contact database**:</label>
			</td>
			<td>
				<input type="checkbox" name="createContactEntry" id="createContactEntry"<?php if ($_smarty_tpl->getVariable('info')->value['id_contact']!=''){?> checked="checked"<?php }?>/>
			</td>
		</tr>
		<tr>
			<td>Title:</td>
			<td>
				<select name="title">
					<option value="mr">Mr</option>
					<option value="mrs" <?php if ($_smarty_tpl->getVariable('info')->value['title']=="mrs"){?>selected="selected"<?php }?>>Mrs</option>
				</select>
			</td>
		</tr>
		<tr>
			<td>Lastname*:</td>
			<td><input type="text" name="lastname" value="<?php echo $_smarty_tpl->getVariable('info')->value['lastname'];?>
" /></td>
		</tr>
		<tr>
			<td>Firstname*:</td>
			<td><input type="text" name="firstname" value="<?php echo $_smarty_tpl->getVariable('info')->value['firstname'];?>
" /></td>
		</tr>
		<tr>
			<td>Email*:</td>
			<td><input type="text" name="email" value="<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
" /></td>
		</tr>
		<tr>
			<td>Street:</td>
			<td><input type="text" name="street" value="<?php echo $_smarty_tpl->getVariable('info')->value['street'];?>
" /></td>
		</tr>
		<tr>
			<td>Number:</td>
			<td><input type="text" name="number" value="<?php echo $_smarty_tpl->getVariable('info')->value['number'];?>
" /></td>
		</tr>
		<tr>
			<td>Postal:</td>
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
				<?php echo smarty_function_html_select_country(array('format'=>'select','value'=>$_smarty_tpl->getVariable('info')->value['country']),$_smarty_tpl);?>

			</td>
		</tr>
		<tr>
			<td>Phone:</td>
			<td><input type="text" name="phone" value="<?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
" /></td>
		</tr>
		<tr>
			<td>Fax:</td>
			<td><input type="text" name="fax" value="<?php echo $_smarty_tpl->getVariable('info')->value['fax'];?>
" /></td>
		</tr>
		<tr>
			<td>Mobile:</td>
			<td><input type="text" name="mobile" value="<?php echo $_smarty_tpl->getVariable('info')->value['mobile'];?>
" /></td>
		</tr>
		<tr>
			<td>Website:</td>
			<td><input type="text" name="website" value="<?php echo $_smarty_tpl->getVariable('info')->value['website'];?>
" /></td>
		</tr>
	</table>
	
	<p>
		<em>*: these fields must be completed.</em><br />
		<em>**: if this checkbox is unchecked, any nonmandatory data (street, country, etc) will be lost.</em>
	</p>
	
	<?php if (count($_smarty_tpl->getVariable('array_group')->value)>0){?>
	<h2>Groups</h2>
		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_group')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
		<p><input type="checkbox" name="groups[]" value="<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" id="group_<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['g']->value['id'],$_smarty_tpl->getVariable('array_user_group')->value)){?>checked="checked"<?php }?> /> : <label for="group_<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</label></p>
		<?php }} ?>
	<?php }?>
	<h2>Organisations</h2>
	
	<p>You can select organisation(s) to which this member belong.</p>
	
	<table class="tab_admin" id="tab_org">
		<tr>
			<th></th>
			<th>Name</th>
			<th>Job</th>
			<th>Contact</th>
			<th>Substitute</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
		<tr>
			<td><input type="checkbox" id="org_<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" name="organisations[]" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['o']->value['id'],$_smarty_tpl->getVariable('array_user_org')->value)){?>checked="checked"<?php }?>/></td>
			<td><label for="org_<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</label></td>
			<td><input type="text" name="job_<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['o']->value['id'],$_smarty_tpl->getVariable('array_user_org')->value)){?>value="<?php echo $_smarty_tpl->getVariable('array_user_org')->value[$_smarty_tpl->tpl_vars['o']->value['id']]['job'];?>
"<?php }?>//></td>
			<td>
				<input type="checkbox" name="contact[]" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['o']->value['id'],$_smarty_tpl->getVariable('array_user_org')->value)&&$_smarty_tpl->getVariable('array_user_org')->value[$_smarty_tpl->tpl_vars['o']->value['id']]['isContact']){?>checked="checked"<?php }?> />
			</td>
			<td>
				<input type="checkbox" name="substitute[]" value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['o']->value['id'],$_smarty_tpl->getVariable('array_user_org')->value)&&$_smarty_tpl->getVariable('array_user_org')->value[$_smarty_tpl->tpl_vars['o']->value['id']]['isSubstitute']){?>checked="checked"<?php }?> />
			</td>
		</tr>
		<?php }} ?>
	</table>
				
		<!--<p>Add an organisation: <input type="text" name="new_org" /> ; Job : <input type="text" name="job_new" /></p> -->
		<p><a href="#addOrg" class="leanModal_button button_link">Add an organisation</a></p>
	<p><input type="submit" value="<?php echo $_smarty_tpl->getVariable('textbutton')->value;?>
" class="button_link_big" /></p>
</form>

<?php echo smarty_function_html_leanmodal(array('id'=>"addOrg",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."user/html/leanmodal/addorganisation.html",'title'=>"New organisation"),$_smarty_tpl);?>

