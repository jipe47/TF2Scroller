<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 00:29:42
         compiled from "plugin/workgroup/html/admin/workgroup_answeruser.html" */ ?>
<?php /*%%SmartyHeaderCode:6184f288776b44b45-47067585%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6dd494b3fca2261921d5ecc4ce10ac287c4d26f' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_answeruser.html',
      1 => 1328056178,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6184f288776b44b45-47067585',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<p>Answers of <strong><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</strong> for <strong><?php echo $_smarty_tpl->getVariable('questionnaire')->value['name'];?>
</strong>.</p>

<p><a href="?Admin/Workgroup/answerquestionnaire/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
">Back to other answers</a></p>
<?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('questionnaire')->value['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['q']->key;
?>
	<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
 - <?php echo $_smarty_tpl->tpl_vars['q']->value['label'];?>
 <a href="?Admin/Workgroup/answerquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/answer.png" title="See every answer for this question" alt="See every answer for this question" /></a> : <?php echo $_smarty_tpl->tpl_vars['q']->value['question'];?>

	<?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)){?>
		<?php if ($_smarty_tpl->tpl_vars['q']->value['type']=="open"){?>
			<p><?php echo $_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'];?>
</p>
		<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="multiple"){?>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['kc']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
				<li><?php if (in_array($_smarty_tpl->tpl_vars['kc']->value,$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'])){?><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_right.png" /><?php }else{ ?>&nbsp;<?php }?> <?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</li>
			<?php }} ?>
			</ul>
		<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="ranking"){?>
			<table class="tab_admin">
				<tr>
					<th></th>
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
					<th><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
<br /><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</th>
					<?php }} ?>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['sq'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sq']->key => $_smarty_tpl->tpl_vars['sq']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sq']->key;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['sq']->value;?>
</td>
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['kr']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
					<td>
						<?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)&&$_smarty_tpl->tpl_vars['kr']->value==$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'][$_smarty_tpl->tpl_vars['k']->value]){?> V <?php }else{ ?> &nbsp; <?php }?>
					</td>
					<?php }} ?>
				</tr>
				<?php }} ?>
			</table>
		<?php }else{ ?>
			<p><em>Question type not supported (<?php echo $_smarty_tpl->tpl_vars['q']->value['type'];?>
).</em></p>
		<?php }?>
		
		<?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)&&$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['comment']!=''){?>
		User's comment: <em><?php echo $_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['comment'];?>
</em>
		<?php }?>
	<?php }else{ ?>
		<p><em>No answer available.</em></p>
	<?php }?>
	
	<hr />
<?php }} ?>