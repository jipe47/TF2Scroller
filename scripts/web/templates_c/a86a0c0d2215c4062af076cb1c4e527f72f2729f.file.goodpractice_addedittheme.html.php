<?php /* Smarty version Smarty-3.0.7, created on 2012-02-25 02:38:09
         compiled from "plugin/goodpractice/html/admin/goodpractice_addedittheme.html" */ ?>
<?php /*%%SmartyHeaderCode:29754f483b81297597-49126517%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a86a0c0d2215c4062af076cb1c4e527f72f2729f' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_addedittheme.html',
      1 => 1330111357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29754f483b81297597-49126517',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Goodpractice/theme/addedit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" /></td>
		</tr>
	</table>
	<p><input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link_big"/>
</form>