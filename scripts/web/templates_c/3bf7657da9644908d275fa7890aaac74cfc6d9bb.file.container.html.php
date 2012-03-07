<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 13:10:50
         compiled from "plugin/workgroup/html/admin/container.html" */ ?>
<?php /*%%SmartyHeaderCode:296004f2d204a1b7828-82932922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3bf7657da9644908d275fa7890aaac74cfc6d9bb' => 
    array (
      0 => 'plugin/workgroup/html/admin/container.html',
      1 => 1328357447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296004f2d204a1b7828-82932922',
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
	<?php if (isset($_smarty_tpl->getVariable('workgroup',null,true,false)->value)){?>
	<a href="?Workgroup/admin/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Back to Administration Panel</a>
	<?php }?>
</div>

<?php echo $_smarty_tpl->getVariable('content_render')->value;?>
