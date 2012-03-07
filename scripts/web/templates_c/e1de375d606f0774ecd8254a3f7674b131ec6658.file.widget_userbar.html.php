<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 00:55:22
         compiled from "plugin/user/html/widget_userbar.html" */ ?>
<?php /*%%SmartyHeaderCode:81314f3d976a05dbe3-74532593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1de375d606f0774ecd8254a3f7674b131ec6658' => 
    array (
      0 => 'plugin/user/html/widget_userbar.html',
      1 => 1329436519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81314f3d976a05dbe3-74532593',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="userbar">
	<div class="left">
	<?php if ($_smarty_tpl->getVariable('isConnected')->value){?>
		<a href="?Account"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
user/images/cog.png" title="My account" alt="My account" /></a>
		<a href="?Member/<?php echo $_smarty_tpl->getVariable('id_user')->value;?>
"><?php echo $_smarty_tpl->getVariable('user_nickname')->value;?>
</a> &nbsp;
		<a href="?Request/<?php echo $_smarty_tpl->getVariable('STRUCTURE_NAME')->value;?>
/logoff/<?php echo $_SERVER['QUERY_STRING'];?>
"><img class="logoff" src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/logout.png" alt="Log out" title="Log out"/></a> &nbsp;
	<?php }else{ ?>
		<em>You are not connected.</em>
	<?php }?>
	</div>
	
	<div class="chattabs">
		
	</div>
	
	<?php if ($_smarty_tpl->getVariable('isConnected')->value){?>
	<div class="right">
		<?php echo smarty_function_plugin(array('p'=>'OnlineMember','type'=>"userbar"),$_smarty_tpl);?>

	</div>
	<?php }?>
</div>