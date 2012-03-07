<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 11:42:36
         compiled from "plugin/user/html/leanmodal/user_organisation_addmember.html" */ ?>
<?php /*%%SmartyHeaderCode:34654f2e5d1c27a623-26570483%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b933a14c4afdb2c0e47fcb50b46d6e6e4d1f22aa' => 
    array (
      0 => 'plugin/user/html/leanmodal/user_organisation_addmember.html',
      1 => 1328438427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34654f2e5d1c27a623-26570483',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/User/organisationaddmember">
	<input type="hidden" name="id_organisation" value="<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
" />
	<p>
		<select name="id_user">
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_member_add')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</option>
			<?php }} ?>
		</select>
	</p>
	<p>Job: <input type="text" name="job" /></p>
	<p>
		<input type="submit" value="Add this member" class="button_link"/>
	</p>
</form>