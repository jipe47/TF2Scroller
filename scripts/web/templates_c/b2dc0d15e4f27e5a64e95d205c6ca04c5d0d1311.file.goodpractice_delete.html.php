<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 02:58:26
         compiled from "plugin/goodpractice/html/admin/goodpractice_delete.html" */ ?>
<?php /*%%SmartyHeaderCode:151834f3db442d46114-04780247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2dc0d15e4f27e5a64e95d205c6ca04c5d0d1311' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_delete.html',
      1 => 1319807704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '151834f3db442d46114-04780247',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the sheet <strong><?php echo $_smarty_tpl->getVariable('gp')->value['name'];?>
</strong>?</p>

<p>
	<a href="?Request/Goodpractice/delete/<?php echo $_smarty_tpl->getVariable('gp')->value['id'];?>
">Yes</a>
	<?php echo smarty_function_backButton(array('text'=>"No"),$_smarty_tpl);?>

</p>