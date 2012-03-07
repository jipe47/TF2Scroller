<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 14:45:31
         compiled from "plugin/user/html/leanmodal/user_organisation_editjob.html" */ ?>
<?php /*%%SmartyHeaderCode:312624f33cdfba584e3-44500303%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86352faa5caf99ed57fa2dc50ed46aef05ec0927' => 
    array (
      0 => 'plugin/user/html/leanmodal/user_organisation_editjob.html',
      1 => 1328795129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312624f33cdfba584e3-44500303',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="">
	<input type="hidden" name="id_user" value="<?php echo $_smarty_tpl->getVariable('id_user')->value;?>
" />
	<input type="hidden" name="id_organisation" value="<?php echo $_smarty_tpl->getVariable('id_org')->value;?>
" />
	<p>Job: <input type="text" name="job" value="<?php echo $_smarty_tpl->getVariable('job')->value;?>
" /></p>
	<p><input type="submit" class="button_link_big" value="Edit" /></p>
</form>