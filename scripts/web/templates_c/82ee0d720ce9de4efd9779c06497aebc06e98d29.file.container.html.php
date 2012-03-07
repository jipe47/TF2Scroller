<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:19:55
         compiled from "plugin/user/html/container.html" */ ?>
<?php /*%%SmartyHeaderCode:122784f2d92eb281c52-46132587%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '82ee0d720ce9de4efd9779c06497aebc06e98d29' => 
    array (
      0 => 'plugin/user/html/container.html',
      1 => 1328386444,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '122784f2d92eb281c52-46132587',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><h1><?php echo $_smarty_tpl->getVariable('admin_title')->value;?>
<?php if ($_smarty_tpl->getVariable('code_help')->value!=''){?> <?php echo smarty_function_plugin(array('p'=>'Help','code'=>$_smarty_tpl->getVariable('code_help')->value),$_smarty_tpl);?>
<?php }?></h1>
<div class="admin_backlink">
</div>

<?php echo $_smarty_tpl->getVariable('content_render')->value;?>
