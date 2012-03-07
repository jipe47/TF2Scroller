<?php /* Smarty version Smarty-3.0.7, created on 2012-02-25 02:20:53
         compiled from "tpl/default/html/main.html" */ ?>
<?php /*%%SmartyHeaderCode:278404f483775463b78-41047746%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '249f79861fbeb92e6f50ba4e8b5a933308b12ec5' => 
    array (
      0 => 'tpl/default/html/main.html',
      1 => 1330111361,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278404f483775463b78-41047746',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title><?php echo $_smarty_tpl->getVariable('pagetitle')->value;?>
</title>
		<!-- Header added manually to avoid a Chrome bug : accents are broken if it is not the first included. -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<?php echo $_smarty_tpl->getVariable('htmlheaders')->value;?>

	</head>
	<body<?php if ($_smarty_tpl->getVariable('onloadFunctions')->value!=''){?> onload="<?php echo $_smarty_tpl->getVariable('onloadFunctions')->value;?>
"<?php }?><?php if ($_smarty_tpl->getVariable('onunloadFunctions')->value!=''){?> onbeforeunload="<?php echo $_smarty_tpl->getVariable('onunloadFunctions')->value;?>
"<?php }?>>
	
	<div id="superglobal">
		<?php echo $_smarty_tpl->getVariable('header')->value;?>

		<?php echo $_smarty_tpl->getVariable('menu')->value;?>

		<?php echo smarty_function_plugin(array('p'=>'Locationbar'),$_smarty_tpl);?>

		<?php echo $_smarty_tpl->getVariable('content')->value;?>

		<?php echo $_smarty_tpl->getVariable('footer')->value;?>

		<?php echo $_smarty_tpl->getVariable('debug')->value;?>

	</div>
	
	<div id="buffer">
		<?php echo $_smarty_tpl->getVariable('buffer')->value;?>

	</div>
	</body>
</html>