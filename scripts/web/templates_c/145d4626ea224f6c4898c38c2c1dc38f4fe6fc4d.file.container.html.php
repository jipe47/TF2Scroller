<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 15:28:50
         compiled from "plugin/goodpractice/html/admin/container.html" */ ?>
<?php /*%%SmartyHeaderCode:104994f2a9da2b46141-41250338%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '145d4626ea224f6c4898c38c2c1dc38f4fe6fc4d' => 
    array (
      0 => 'plugin/goodpractice/html/admin/container.html',
      1 => 1328192885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104994f2a9da2b46141-41250338',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<h1><?php echo $_smarty_tpl->getVariable('admin_title')->value;?>
</h1>
<div class="admin_backlink">
	<?php if ($_smarty_tpl->getVariable('enable_backlink')->value){?>
	<a href="?Admin/Goodpractice">Back to Administration Panel</a>
	<?php }?>
</div>

<?php echo $_smarty_tpl->getVariable('content_render')->value;?>
