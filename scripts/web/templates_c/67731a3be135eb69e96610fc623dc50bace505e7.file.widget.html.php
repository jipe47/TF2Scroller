<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:33
         compiled from "C:\wamp\www\transeo\config/../plugin/logbook/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:49944f2b1915738e49-83042070%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '67731a3be135eb69e96610fc623dc50bace505e7' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/logbook/html/widget.html',
      1 => 1327971358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49944f2b1915738e49-83042070',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_capitalize')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.capitalize.php';
if (!is_callable('smarty_function_date_diff')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.date_diff.php';
?><div id="div_logbook">
	<h2>Logbook</h2>

	<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_entry')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
	
	<div class="entry<?php if ($_smarty_tpl->tpl_vars['e']->value['type']=='admin'){?>_admin<?php }elseif($_smarty_tpl->tpl_vars['e']->value['admin']){?>_moderator<?php }?>">
		<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
logbook/images/icons/<?php if ($_smarty_tpl->tpl_vars['e']->value['action']!=''){?><?php echo $_smarty_tpl->tpl_vars['e']->value['action'];?>
<?php }else{ ?>none<?php }?>.png" title="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['e']->value['action']);?>
" alt="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['e']->value['action']);?>
" />
		<?php echo html_entity_decode($_smarty_tpl->tpl_vars['e']->value['content']);?>
 <?php echo smarty_function_date_diff(array('date'=>$_smarty_tpl->tpl_vars['e']->value['timestamp'],'strong_threshold'=>3600),$_smarty_tpl);?>
<br />
	</div>
	<?php }} ?>
	
</div>