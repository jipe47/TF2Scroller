<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 19:52:33
         compiled from "tpl/common/html/login.html" */ ?>
<?php /*%%SmartyHeaderCode:97304f3415f107a238-96511936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0389e73fdb70c5ecc709b18f5d65cb45010cd31' => 
    array (
      0 => 'tpl/common/html/login.html',
      1 => 1328813548,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97304f3415f107a238-96511936',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="div_login" class="sub_content">
	<form method="post" action="?Request/<?php echo $_smarty_tpl->getVariable('STRUCTURE_NAME')->value;?>
/login">
		<input type="hidden" name="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" />
		<table class="tab_struct">
			<tr>
				<td>Login:</td>
				<td><input type="text" name="login_login" size="10" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="login_password" size="10" /></td>
			</tr>
			<tr>
				<td><input type="checkbox" name="login_remember" id="login_remember" checked="checked"/>:</td>
				<td><label for="login_remember">remember me</label></td>
			</tr>
		</table>
		<p><input type="submit" value="Ok" class="button_link" /> <a href="?Login/retreive" class="button_link">Forgot your password?</a></p>
	</form>
</div>