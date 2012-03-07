<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:35:45
         compiled from "tpl/common/html/leanmodal/account_editorganisationprofil.html" */ ?>
<?php /*%%SmartyHeaderCode:284454f2e85b1867585-05835128%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f075143678f25e6af5af17787c003c8d53c28a1' => 
    array (
      0 => 'tpl/common/html/leanmodal/account_editorganisationprofil.html',
      1 => 1328448941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '284454f2e85b1867585-05835128',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/cmp/editaccount" enctype="multipart/form-data">
	<input type="hidden" name="edit" value="editorganisation" />
	<input type="hidden" name="id_organisation" value="<?php echo $_smarty_tpl->getVariable('id_organisation')->value;?>
" />
	<p>Job: <input type="text" name="job" value="<?php echo $_smarty_tpl->getVariable('job')->value;?>
" />
	<p><input type="submit" value="Edit" class="button_link_big" /></p>
</form>