<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 15:24:10
         compiled from "plugin/help/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:5834f2d3f8ac45492-26761143%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c137d7b96c9e88badd0e81c530a1dc4cfbbb8a42' => 
    array (
      0 => 'plugin/help/html/widget.html',
      1 => 1328365449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5834f2d3f8ac45492-26761143',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?>
<a href="#help<?php echo $_smarty_tpl->getVariable('id_leanmodal')->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
help/images/help_small<?php if ($_smarty_tpl->getVariable('info')->value==''){?>_empty<?php }?>.png" title="Help" alt="Help" /></a>
<?php ob_start();?><?php if ($_smarty_tpl->getVariable('info')->value!=''){?><?php echo "Help: ";?><?php echo $_smarty_tpl->getVariable('info')->value['title'];?><?php }else{ ?><?php echo "Undefined page";?><?php }?><?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>$_tmp1,'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."help/html/widget_leanmodal.html",'id'=>"help".($_smarty_tpl->getVariable('id_leanmodal')->value)),$_smarty_tpl);?>
