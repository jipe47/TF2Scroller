<?php /* Smarty version Smarty-3.0.7, created on 2012-03-06 00:40:57
         compiled from "plugin/logbook/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:220714f554f0933c119-16061834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42a005c9d66344564ee1bdb54105eccc1c4cfbfa' => 
    array (
      0 => 'plugin/logbook/html/widget.html',
      1 => 1330811059,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '220714f554f0933c119-16061834',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_modifier_capitalize')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.capitalize.php';
if (!is_callable('smarty_function_date_diff')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.date_diff.php';
?><div id="div_logbook">
	<h2>Logbook <?php echo smarty_function_plugin(array('p'=>'Help','code'=>"logbook_widget"),$_smarty_tpl);?>
</h2>
		<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_entry')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['e']->key;
?>
		
		<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->getVariable('limit_threshold')->value){?>
		<div class="button_expand">
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
logbook/images/expand.png" title="Expand" alt="Expand" onclick="logbookWidgetToggle()" />
		</div>
		
		<div id="div_logbook_hide"> 
		<?php }?>
		
		<div class="entry<?php if ($_smarty_tpl->tpl_vars['e']->value['type']=='admin'){?>_admin<?php }elseif($_smarty_tpl->tpl_vars['e']->value['admin']){?>_moderator<?php }?>">
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
logbook/images/icons/<?php if ($_smarty_tpl->tpl_vars['e']->value['action']!=''){?><?php echo $_smarty_tpl->tpl_vars['e']->value['action'];?>
<?php }else{ ?>none<?php }?>.png" title="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['e']->value['action']);?>
" alt="<?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['e']->value['action']);?>
" />
			
			<?php echo html_entity_decode($_smarty_tpl->tpl_vars['e']->value['content']);?>

			<?php echo smarty_function_date_diff(array('date'=>$_smarty_tpl->tpl_vars['e']->value['timestamp'],'strong_threshold'=>3600),$_smarty_tpl);?>

			<?php if ($_smarty_tpl->tpl_vars['e']->value['id_user_add']!=''){?>
			 by <a href="?Member/<?php echo $_smarty_tpl->tpl_vars['e']->value['id_user_add'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['e']->value['lastname'];?>
</a>
			<?php }?>
			
			<br />
		</div>
		<?php }} ?>
	
	<?php if ($_smarty_tpl->getVariable('enable_toggle')->value){?>
		<div class="button_reduce">
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
logbook/images/reduce.png" title="Reduce" alt="Reduce" onclick="logbookWidgetToggle()" />
		</div>
	</div>
	<?php }?>
</div>