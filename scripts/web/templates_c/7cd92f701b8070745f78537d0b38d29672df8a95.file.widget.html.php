<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:33
         compiled from "C:\wamp\www\transeo\config/../plugin/help/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:195564f2b191551c547-31357695%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7cd92f701b8070745f78537d0b38d29672df8a95' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/help/html/widget.html',
      1 => 1325534843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195564f2b191551c547-31357695',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?>
<a href="#help<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/help.png" title="Help" alt="Help" /></a>
<?php echo smarty_function_html_leanmodal(array('title'=>($_smarty_tpl->getVariable('info')->value['title']),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."help/html/widget_leanmodal.html",'id'=>"help".($_smarty_tpl->getVariable('info')->value['id'])),$_smarty_tpl);?>
