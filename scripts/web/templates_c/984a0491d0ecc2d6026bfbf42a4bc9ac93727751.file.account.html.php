<?php /* Smarty version Smarty-3.0.7, created on 2012-02-12 01:43:31
         compiled from "tpl/common/html/account.html" */ ?>
<?php /*%%SmartyHeaderCode:58314f370b33371401-88076389%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '984a0491d0ecc2d6026bfbf42a4bc9ac93727751' => 
    array (
      0 => 'tpl/common/html/account.html',
      1 => 1328918256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58314f370b33371401-88076389',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
if (!is_callable('smarty_function_html_select_country')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_country.php';
if (!is_callable('smarty_modifier_countryName')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.countryName.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><div id="div_account">
	<h1>Account Management</h1>
	
	<?php if ($_smarty_tpl->getVariable('account_page')->value!="home"){?>
		<form method="post" action="?Request/<?php echo $_smarty_tpl->getVariable('STRUCTURE_NAME')->value;?>
/editaccount" enctype="multipart/form-data">
			<input type="hidden" name="edit" value="<?php echo $_smarty_tpl->getVariable('account_page')->value;?>
" />
			
			<?php if ($_smarty_tpl->getVariable('account_page')->value=="password"){?>
			
				<p>New password: <input type="password" name="info" id="pass1" onkeyup="userVerifyPass()" /> <span id="pass_status"></span></p>
				<p>Confirm new password: <input type="password" name="pass2" id="pass2" onkeyup="userVerifyPass()" /></p>
				<p><input type="submit" value="Edit" class="button_link"/><?php echo smarty_function_backButton(array('type'=>"button"),$_smarty_tpl);?>
</p>
			
			<?php }elseif($_smarty_tpl->getVariable('account_page')->value=="avatar"){?>
			
				<fieldset>
					<legend>New picture</legend>
					<p>Picture: <input type="file" name="file" /></p>
					<p><input type="submit" value="Upload" /></p>
				</fieldset>
				
				<fieldset>
					<legend>Current picture</legend>
				<?php if ($_smarty_tpl->getVariable('info_user')->value['avatar']==''){?>
					<p><em>Pas d'image.</em></p>
				<?php }else{ ?>
				
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->getVariable('info_user')->value['avatar'];?>
" />
					<p><input type="checkbox" name="delete" id="delete" />: <label for="delete">delete this avatar</label></p>
					<p><input type="submit" value="Ok" /></p>
				<?php }?>
				</fieldset>

			<?php }elseif($_smarty_tpl->getVariable('account_page')->value=="userinfo"){?>
				<table class="tab_struct">
					<tr>
						<td>Title</td>
						<td>
							<select name="title">
								<option value="mr">Mr</option>
								<option value="mrs" <?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])&&$_smarty_tpl->getVariable('info_user')->value['contact']['title']=="mrs"){?>selected="selected"<?php }?>>Mrs</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Lastname:</td>
						<td><input type="text" name="lastname" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['lastname'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Firstname:</td>
						<td><input type="text" name="firstname" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['firstname'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Street</td>
						<td><input type="text" name="street" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['street'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Number</td>
						<td><input type="text" name="number" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['number'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Postal</td>
						<td><input type="text" name="postal" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['postal'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>City:</td>
						<td><input type="text" name="city" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['city'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Country:</td>
						<td>
							<!-- Todo: fonction smarty pour afficher les pays -->
							
							<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?>
							<?php echo smarty_function_html_select_country(array('format'=>'select','value'=>$_smarty_tpl->getVariable('info_user')->value['contact']['country']),$_smarty_tpl);?>

							<?php }else{ ?>
							<?php echo smarty_function_html_select_country(array('format'=>'select'),$_smarty_tpl);?>

							<?php }?>
						</td>
					</tr>
					<tr>
						<td>Phone</td>
						<td><input type="text" name="phone" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['phone'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Fax</td>
						<td><input type="text" name="fax" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['fax'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Mobile</td>
						<td><input type="text" name="mobile" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['mobile'];?>
<?php }?>" /></td>
					</tr>
					<tr>
						<td>Website</td>
						<td><input type="text" name="website" value="<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['website'];?>
<?php }?>" /></td>
					</tr>
				</table>
				<p><input type="submit" value="Edit" class="button_link"/><?php echo smarty_function_backButton(array('type'=>"button"),$_smarty_tpl);?>
</p>
			<?php }elseif($_smarty_tpl->getVariable('account_page')->value=="editorganisation"){?>
				<fieldset>
					<input type="hidden" name="id_organisation" value="<?php echo $_smarty_tpl->getVariable('org')->value['id_organisation'];?>
" />
					<p>Job: <input type="text" name="job" value="<?php echo $_smarty_tpl->getVariable('org')->value['job'];?>
" />
					<p><input type="submit" value="Edit" /></p>
				</fieldset>
				
				<p><a href="?Admin/User/organisationedit/<?php echo $_smarty_tpl->getVariable('org')->value['id_organisation'];?>
/fromuser">Edit this organisation's profil</a></p>
			<?php }else{ ?>
				<p><?php echo $_smarty_tpl->getVariable('edit_name')->value;?>
: <input type="text" name="info" value="<?php echo $_smarty_tpl->getVariable('info_user')->value[$_smarty_tpl->getVariable('edit')->value];?>
"/></p>
				<p><input type="submit" value="Edit" class="button_link"/> <?php echo smarty_function_backButton(array('type'=>"button"),$_smarty_tpl);?>
</p>
			<?php }?>
		</form>
	<?php }else{ ?>
		<div class="leftcol">
			<h2>Connection Info</h2>
			
			<div class="avatar">
			<?php if ($_smarty_tpl->getVariable('info_user')->value['avatar']==''){?>
				<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/empty_avatar.png" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->getVariable('info_user')->value['avatar'];?>
" />
			<?php }?>
			</div>
			
			
			<p>Name: <?php echo $_smarty_tpl->getVariable('info_user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('info_user')->value['lastname'];?>
<br />
			Login: <?php echo $_smarty_tpl->getVariable('info_user')->value['login'];?>
 <a href="?Account/login">Edit</a><br />
			<a href="?Account/password">Edit password</a><br />
			Email: <?php echo $_smarty_tpl->getVariable('info_user')->value['email'];?>
 <a href="?Account/email">Edit</a><br />
			<a href="?Account/avatar">Edit avatar</a><br />
			<a href="?Member/<?php echo $_smarty_tpl->getVariable('info_user')->value['id'];?>
">View my personal page</a>
			</p>
		</div>
		
		<div class="rightcol">
			<h2>User Info</h2>
			<?php if (!is_null($_smarty_tpl->getVariable('info_user')->value['contact'])){?>
			<?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['street'];?>
 <?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['number'];?>
<br />
			<?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['postal'];?>
 <?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['city'];?>
<br />
			<?php echo smarty_modifier_countryName($_smarty_tpl->getVariable('info_user')->value['contact']['country']);?>
<br />
			
			<br />
			Tel: <?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['phone'];?>
<br />
			Fax: <?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['fax'];?>
<br />
			Mobile: <?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['mobile'];?>
<br />
			<br />
			Website: <a href="<?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['website'];?>
"><?php echo $_smarty_tpl->getVariable('info_user')->value['contact']['website'];?>
</a><br /><br />
			
			<a href="?Account/userinfo" class="button_link">Edit my info</a>
			<?php }else{ ?>
			<p><em>Your account is not associated to a contact. Click on the link below to create an entry.</em></p>
			<a href="?Account/userinfo" class="button_link_big">Associate a Contact Profil</a>
			<?php }?>
		</div>
		
		<div class="clearfix"></div>
		
		<div class="leftcol">
			<h2>My organisation(s)</h2>
			
			<?php if (count($_smarty_tpl->getVariable('array_org')->value)>0){?>
			<ul class="list_admin">
			<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
				<li>
					<a href="?Admin/User/organisationedit/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
/fromaccount"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/building_edit.png" title="Edit my organisation profil" alt="Edit my organisation profil" /></a>
					<a href="#orgProfil<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/user_edit.png" title="Edit this organisation" alt="Edit this organisation" /></a>
					
					<?php if ($_smarty_tpl->tpl_vars['o']->value['isContact']){?>
					<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_gold_3.png" title="You are the organisation contact" alt="You are the organisation contact"/>
					<?php }else{ ?>
					&nbsp;&nbsp;
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['o']->value['isSubstitute']){?>
					<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_silver_3.png" title="You are the organisation substitute" alt="You are the organisation substitute"/>
					<?php }else{ ?>
					&nbsp;&nbsp;
					<?php }?>
					
					<a href="?Request/deleteuserorganisation/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete my link to this organisation" alt="Delete my link to this organisation" /></a>
					<a href="?Organisation/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</a> - <?php echo $_smarty_tpl->tpl_vars['o']->value['job'];?>
<br />
				</li>
			<?php echo smarty_function_html_leanmodal(array('id'=>"orgProfil".($_smarty_tpl->tpl_vars['o']->value['id']),'id_organisation'=>$_smarty_tpl->tpl_vars['o']->value['id'],'job'=>$_smarty_tpl->tpl_vars['o']->value['job'],'title'=>"Edit my Organisation Profil",'content_template'=>($_smarty_tpl->getVariable('COMMON')->value)."html/leanmodal/account_editorganisationprofil.html"),$_smarty_tpl);?>

			<?php }} ?>
			</ul>
			<?php }else{ ?>
			<p><em>You do not belong to any organisation.</em></p>
			<?php }?>
		</div>
		
		<div class="clearfix"></div>
	<?php }?>
	
</div>