<?php /* Smarty version Smarty-3.0.7, created on 2012-02-25 02:20:55
         compiled from "tpl/default/html/home.html" */ ?>
<?php /*%%SmartyHeaderCode:322494f4837771866e6-89436373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73f7dcbe0a7d10d47544621f96ce4098331c51ce' => 
    array (
      0 => 'tpl/default/html/home.html',
      1 => 1330132825,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '322494f4837771866e6-89436373',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><!-- <div id="js_debug"></div>-->
<div id="div_home">
	<div class="leftcol">
		<?php echo smarty_function_plugin(array('p'=>'Announce'),$_smarty_tpl);?>

		<?php echo smarty_function_plugin(array('p'=>'Workgroup','type'=>"widget_confcall"),$_smarty_tpl);?>

		<?php echo smarty_function_plugin(array('p'=>'Workgroup','type'=>"widget"),$_smarty_tpl);?>

	</div>
	
	<div class="rightcol">
		<?php echo smarty_function_plugin(array('p'=>'Goodpractice'),$_smarty_tpl);?>

		<?php echo smarty_function_plugin(array('p'=>'Logbook'),$_smarty_tpl);?>

	</div>
	<div class="clearfix"></div>
</div>