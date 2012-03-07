<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 20:28:24
         compiled from "tpl/common/html/admin.html" */ ?>
<?php /*%%SmartyHeaderCode:261074f341e58135391-90103795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3266a447ab1fa73e1bbc49ecc62bf6a7796f25da' => 
    array (
      0 => 'tpl/common/html/admin.html',
      1 => 1328815691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261074f341e58135391-90103795',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_mkLink')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.mkLink.php';
?><div id="admin_panel">
	<h1>Administration Panel <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'admin_home'),$_smarty_tpl);?>
</h1>
	
	<div class="colleft">
		<h2>Navigation</h2>	
		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_plugin')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
			<p>
				<a href="#" onclick="adminShowSubPanel('subpanel_<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
')"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a>
			</p>
		<?php }} ?>
			
	</div>
	
	
	<div id="admin_subpanels" class="colright">
	
		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_plugin')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
 $_smarty_tpl->tpl_vars['name']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
		<div id="subpanel_<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
			<h2><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php ob_start();?><?php echo ((mb_detect_encoding($_smarty_tpl->tpl_vars['name']->value, 'UTF-8, ISO-8859-1') === 'UTF-8') ? mb_strtolower($_smarty_tpl->tpl_vars['name']->value,SMARTY_RESOURCE_CHAR_SET) : strtolower($_smarty_tpl->tpl_vars['name']->value));?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_plugin(array('p'=>'Help','code'=>"admin_".$_tmp1),$_smarty_tpl);?>
</h2>
			
			<?php  $_smarty_tpl->tpl_vars['l'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['i']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['l']->key => $_smarty_tpl->tpl_vars['l']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['l']->key;
?>
				<a href='<?php echo smarty_function_mkLink(array('arg'=>"Admin,".($_smarty_tpl->tpl_vars['name']->value).",".($_smarty_tpl->tpl_vars['k']->value)),$_smarty_tpl);?>
'><?php echo $_smarty_tpl->tpl_vars['l']->value;?>
</a><br />
			<?php }} ?>
			
		</div>
		<?php }} ?>
	</div>
</div>

<div class="clearfix"></div>