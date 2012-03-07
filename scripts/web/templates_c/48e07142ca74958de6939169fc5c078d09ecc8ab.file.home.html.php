<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:32
         compiled from "C:\wamp\www\transeo\config/../tpl/default/html/home.html" */ ?>
<?php /*%%SmartyHeaderCode:313774f2b19144574f9-77002617%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '48e07142ca74958de6939169fc5c078d09ecc8ab' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../tpl/default/html/home.html',
      1 => 1328195105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313774f2b19144574f9-77002617',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="js_debug">
</div>
<div id="div_home">
	<div class="leftcol">
		<?php echo smarty_function_plugin(array('p'=>'Announce'),$_smarty_tpl);?>

		<?php echo smarty_function_plugin(array('p'=>'Workgroup','type'=>"widget"),$_smarty_tpl);?>

	</div>
	
	<div class="rightcol">
		<div id="search">
			<h2>Good Practices - Quick Search <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'test'),$_smarty_tpl);?>
</h2>
			<form method="post" action="?Goodpractice/search">
				<input type="hidden" name="searching" value="on" />
				<p>
					<input type="text" name="search" size="40" />
					<input type="submit" value="Ok" class="button_link" />
				</p>
			</form>
		</div>
		
		<?php echo smarty_function_plugin(array('p'=>'Logbook'),$_smarty_tpl);?>

		
		
	</div>
	
	
	
	<div class="clearfix"></div>
</div>