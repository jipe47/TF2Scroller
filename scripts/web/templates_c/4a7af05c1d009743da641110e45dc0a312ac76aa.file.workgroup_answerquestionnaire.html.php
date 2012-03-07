<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 11:01:13
         compiled from "plugin/workgroup/html/admin/workgroup_answerquestionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:280764f291b79b14380-81229282%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4a7af05c1d009743da641110e45dc0a312ac76aa' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_answerquestionnaire.html',
      1 => 1328094071,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280764f291b79b14380-81229282',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>
</td>
		<td>
			<a href="?Request/Workgroup/deleteanswer/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete the user's answers" alt="Delete the user's answers" /></a>
			<a href="?Admin/Workgroup/answeruser/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/answer.png" title="See answers" alt="See answers" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="xls_questionnaire.php?id_questionnaire=<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" class="button_link_big">Export in xls</a>
</p>