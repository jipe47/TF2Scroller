<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:33
         compiled from "C:\wamp\www\transeo\config/../plugin/help/html/widget_leanmodal.html" */ ?>
<?php /*%%SmartyHeaderCode:119814f2b191563fec9-39899235%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6b8384b532a34c886e655827eeb9fbcf1ea6da6' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/help/html/widget_leanmodal.html',
      1 => 1325534954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119814f2b191563fec9-39899235',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
?><h3><?php echo $_smarty_tpl->getVariable('info')->value['title'];?>
</h3>

<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('info')->value['content']),$_smarty_tpl);?>

