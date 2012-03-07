<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:33:13
         compiled from "plugin/user/html/user_search.html" */ ?>
<?php /*%%SmartyHeaderCode:265034f2d96094ef913-65720590%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a824413e4d48fca20cdc9b2c83c48b6bd3987db' => 
    array (
      0 => 'plugin/user/html/user_search.html',
      1 => 1317675158,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '265034f2d96094ef913-65720590',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="user_search">
	<p>Search: <input type="text" id="user_search_search" size="15" onkeyup="userSearch()"/> (* to see everybody)</p>
	<hr />
	
	<div id="user_search_result">
	</div>
	
	<input type="hidden" name="<?php echo $_smarty_tpl->getVariable('user_search_textarea_name')->value;?>
" id="array_selected_user" value="" />
	<input type="hidden" id="user_search_avoid" value="<?php echo $_smarty_tpl->getVariable('id_avoid')->value;?>
" />
</div>

