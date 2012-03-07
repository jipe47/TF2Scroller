<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:54:08
         compiled from "plugin/workgroup/html/admin/workgroup_listquestionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:157984f5284f05bac33-93904612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bccb4a0505af39edeb9c17b5f649e93bac3a3089' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listquestionnaire.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157984f5284f05bac33-93904612',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><!-- Ok -->
<table class="tab_admin">
	<tr>
		<th width="20">Status</th>
		<th>Name</th>
		<th width="140">Creation Date</th>
		<th width="140">Due Date</th>
		<th width="100">Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = array_reverse($_smarty_tpl->getVariable('array_quest')->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['q']->key;
?>
	<tr>
		<td>
			<?php if (!($_smarty_tpl->getVariable('array_verify')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['publishable'])){?>
				<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/error.png" alt="Question(s) must be edited in order to publish this questionnaire" title="Question(s) must be edited in order to publish this questionnaire" />
			<?php }elseif($_smarty_tpl->tpl_vars['q']->value['publish']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabled.png" title="This questionnaire is published" alt="This questionnaire is published" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/ready.png" title="This questionnaire is ready to be published" alt="This questionnaire is ready to be published" />
			<?php }?>
		</td>
		<td><a href="?Admin/Workgroup/questionnaire/view/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['q']->value['name'];?>
</a></td>
		<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['q']->value['timestamp_add'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
</td>
		<td><?php if ($_smarty_tpl->tpl_vars['q']->value['deadline']!=''){?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['q']->value['deadline'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
<?php }else{ ?>N/A<?php }?></td>
		<td>
			<?php if ($_smarty_tpl->getVariable('array_verify')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['publishable']&&$_smarty_tpl->tpl_vars['q']->value['publish']){?>
			<a href="?Request/Workgroup/questionnaire/publish/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/disabled.png" title="Hide this questionnaire" alt="Hide this questionnaire" /></a>
			<?php }elseif($_smarty_tpl->getVariable('array_verify')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['publishable']){?>
			<a href="?Request/Workgroup/questionnaire/publish/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/enabled.png" title="Publish this questionnaire" alt="Publish this questionnaire" /></a>
			<?php }else{ ?>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/disabled_gray.png" title="You cannot publish this questionnaire" alt="You cannot publish this questionnaire" />
			<?php }?>
			<a href="?Admin/Workgroup/questionnaire/view/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this questionnaire" title="Edit this questionnaire"/></a>
			<a href="#deleteQuestionnaire<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this questionnaire" title="Delete this questionnaire"/></a>
			
			<a href="xls_questionnaire.php?id_questionnaire=<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/xls.png" title="Export all answers" alt="Export all answers" /></a>
		</td>
	</tr>
	<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteQuestionnaire".($_smarty_tpl->tpl_vars['q']->value['id']),'message'=>"Are you sure you want to delete the questionnaire <strong>".($_smarty_tpl->tpl_vars['q']->value['name'])."</strong>? Questions and users'answers will be lost.",'handler_yes'=>"?Request/Workgroup/questionnaire/delete/".($_smarty_tpl->tpl_vars['q']->value['id'])),$_smarty_tpl);?>

	<?php }} ?>
</table>

<p>
	<a href="?Admin/Workgroup/questionnaire/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">Add a questionnaire</a>
</p>