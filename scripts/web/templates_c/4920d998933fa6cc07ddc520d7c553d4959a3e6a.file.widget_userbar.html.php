<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:34
         compiled from "C:\wamp\www\transeo\config/../plugin/onlinemember/html/widget_userbar.html" */ ?>
<?php /*%%SmartyHeaderCode:191524f2b1915f3d975-77468508%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4920d998933fa6cc07ddc520d7c553d4959a3e6a' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/onlinemember/html/widget_userbar.html',
      1 => 1327947431,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191524f2b1915f3d975-77468508',
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