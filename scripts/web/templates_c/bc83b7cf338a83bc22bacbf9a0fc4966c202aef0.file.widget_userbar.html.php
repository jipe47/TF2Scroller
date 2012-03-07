<?php /* Smarty version Smarty-3.0.7, created on 2012-01-30 23:43:23
         compiled from "plugin/onlinemember/html/widget_userbar.html" */ ?>
<?php /*%%SmartyHeaderCode:238484f272b1be1e188-97168430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bc83b7cf338a83bc22bacbf9a0fc4966c202aef0' => 
    array (
      0 => 'plugin/onlinemember/html/widget_userbar.html',
      1 => 1327947431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238484f272b1be1e188-97168430',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="onlinemember_userbar">
	
	<div id="loading">
		<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
onlinemember/images/loading.gif" width="20" height="20" title="Loading" alt="Loading" />
	</div>
	
	<div id="onlinemember_content">
		<a class="button_link" onclick="onlinememberMembersToggle()">Online members<span id="nbr_online"></span></a>
	</div>
	
	
	
	<div id="members">
	</div>
</div>