<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 16:04:48
         compiled from "plugin/user/html/leanmodal/addorganisation.html" */ ?>
<?php /*%%SmartyHeaderCode:273664f33e090d36cb4-53380376%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ad8992acb0760e2247e3fc89d8f1deddffb83bc' => 
    array (
      0 => 'plugin/user/html/leanmodal/addorganisation.html',
      1 => 1324287089,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273664f33e090d36cb4-53380376',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Organisation name: <input type="text" name="org_name" id="org_name" /></p>
<p>
	<input type="button" value="Insert" onclick="userAddOrganisation()" class="button_link" />
	<input type="button" value="Close" onclick="leanModal_close('addOrg')" class="button_link" />
</p>
<p id="org_status">
</p>