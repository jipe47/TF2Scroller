<?php /* Smarty version Smarty-3.0.7, created on 2012-02-25 02:20:56
         compiled from "plugin/goodpractice/html/goodpractice_widget.html" */ ?>
<?php /*%%SmartyHeaderCode:126064f4837782b9348-07948015%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3504cffe8a94ae98db091e8754a06e24117afb21' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_widget.html',
      1 => 1330132816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126064f4837782b9348-07948015',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="search">
	<h2>Good Practices - Quick Search</h2>
	<form method="post" action="?Goodpractice/search">
		<input type="hidden" name="where" value="both" />
		<p>
			<input type="text" name="search" size="30" />
			<input type="submit" name="submit" value="Search" class="button_link" />
		</p>
	</form>
</div>