<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 15:03:26
         compiled from "plugin/workgroup/html/workgroup_list_file.html" */ ?>
<?php /*%%SmartyHeaderCode:324314f33d22e762395-78143882%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66c66ff946611e2b80b794a95ca04056cc9b1667' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_list_file.html',
      1 => 1325378217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '324314f33d22e762395-78143882',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><div id="workgroup_file_list">
	<h3>Working Group Files</h3>
	
	<table class="tab_admin">
		<tr>
			<th></th>
			<th>Name</th>
			<th>Description</th>
			<th>Publication Date</th>
			<th>Due Date</th>
		</tr>
		<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_file')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
		<tr>
			<td>
				<?php if ($_smarty_tpl->tpl_vars['f']->value['id_user']!=''){?><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" title="Modification sent" alt="Modification sent" /><?php }?>
			</td>
			<td><a href="?Workgroup/file/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</a></td>
			<td><?php echo $_smarty_tpl->tpl_vars['f']->value['description'];?>
</td>
			<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['f']->value['timestamp_add'],($_smarty_tpl->getVariable('DATE_FORMAT')->value));?>
</td>
			<td><?php if ($_smarty_tpl->tpl_vars['f']->value['deadline']!=''){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['f']->value['deadline'],($_smarty_tpl->getVariable('DATE_FORMAT')->value));?>
<?php }else{ ?>n/a<?php }?></td>
		</tr>
		<?php }} ?>
	</table>
</div>