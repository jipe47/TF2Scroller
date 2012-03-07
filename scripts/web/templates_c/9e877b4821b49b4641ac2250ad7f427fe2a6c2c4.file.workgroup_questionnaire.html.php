<?php /* Smarty version Smarty-3.0.7, created on 2012-02-12 01:56:38
         compiled from "plugin/workgroup/html/workgroup_questionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:212754f370e46e126f8-46120321%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e877b4821b49b4641ac2250ad7f427fe2a6c2c4' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_questionnaire.html',
      1 => 1329002860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212754f370e46e126f8-46120321',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="workgroup_questionnaire">

<h1><?php echo $_smarty_tpl->getVariable('questionnaire')->value['name'];?>
</h1>

<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('questionnaire')->value['description']),$_smarty_tpl);?>

<p>
	<a href="?Admin/Workgroup/answerquestionnaire/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" class="button_link">See responses</a>
	<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->getVariable('isModerator')->value){?>
	<a href="?Admin/Workgroup/editquestionnaire/<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" class="button_link">Edit this questionnaire</a>
	<?php }?>
</p>
<hr />

<h2>Question(s)</h2>
<form method="post" action="?Request/Workgroup/answerquestionnaire">
	<input type="hidden" name="id_questionnaire" value="<?php echo $_smarty_tpl->getVariable('questionnaire')->value['id'];?>
" />
	<?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('questionnaire')->value['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['q']->key;
?>
		<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php echo $_smarty_tpl->tpl_vars['q']->value['question'];?>

		<?php if ($_smarty_tpl->tpl_vars['q']->value['type']=="open"){?>
			<br /><br />
			<?php ob_start();?><?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)){?><?php echo $_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'];?><?php }?><?php $_tmp1=ob_get_clean();?><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_col'=>80,'textarea_name'=>"answer_".($_smarty_tpl->tpl_vars['q']->value['id']),'textarea_value'=>$_tmp1),$_smarty_tpl);?>

		<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="multiple"){?>
			<ul class="list_choice">
			<?php if (array_key_exists("choices",$_smarty_tpl->tpl_vars['q']->value['data'])){?>
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['kc']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
				<li>
					<input id="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" type="<?php if (array_key_exists("max_answer",$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['max_answer']=="none"){?>checkbox<?php }else{ ?>radio<?php }?>" name="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)&&!empty($_smarty_tpl->getVariable('array_answer',null,true,false)->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'])&&in_array($_smarty_tpl->tpl_vars['kc']->value,$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'])){?>checked="checked"<?php }?> />
					<label for="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</label>
				</li>
			<?php }} ?>
			<?php }?>
			</ul>
		<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="ranking"){?>
			<br /><br />
			<table class="tab_admin">
				<tr>
					<th width="200">Sub-question(s)</th>
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
					<th><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</th>
					<?php }} ?>
					<?php if (array_key_exists("enable_subcomment",$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['enable_subcomment']=="1"){?>
					<th width="20">Comment</th>
					<?php }?>
				</tr>
				<?php  $_smarty_tpl->tpl_vars['sq'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sq']->key => $_smarty_tpl->tpl_vars['sq']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['sq']->key;
?>
				<tr>
					<td width="200"><?php echo $_smarty_tpl->tpl_vars['sq']->value;?>
</td>
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['kr']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
					<td class="rank_cell"><input type="radio" name="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['kr']->value+1;?>
" <?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)&&array_key_exists($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'])&&$_smarty_tpl->tpl_vars['kr']->value==$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['value'][$_smarty_tpl->tpl_vars['k']->value]){?>checked="checked"<?php }?>/></td>
					<?php }} ?>
					
					<?php if (array_key_exists("enable_subcomment",$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['enable_subcomment']=="1"){?>
					<td width="20">
						<input type="text" name="comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)&&array_key_exists('comment',$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['more'])&&array_key_exists($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['more']['comment'])){?><?php echo htmlspecialchars($_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['more']['comment'][$_smarty_tpl->tpl_vars['k']->value]);?>
<?php }?>"/>
					</td>
					<?php }?>
				</tr>
				<?php }} ?>
			</table>
		<?php }else{ ?>
			<p><em><?php echo $_smarty_tpl->tpl_vars['q']->value['type'];?>
 not supported</em></p>
		<?php }?>
		
		
		<?php if ($_smarty_tpl->tpl_vars['q']->value['enable_comment']){?>
		<p>
			Comment
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_expand.png" title="Expand" alt="Expand" id="expand_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" onclick="workgroupToggleComment(<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
)" style="cursor: pointer;"/>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_reduce.png" title="Reduce" alt="Reduce" id="reduce_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" onclick="workgroupToggleComment(<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
)" style="display: none;cursor: pointer;"/>
		</p>
		<div id="div_comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" style="display: none;">
			<textarea name="comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" cols="60" rows="2"><?php if (array_key_exists($_smarty_tpl->tpl_vars['q']->value['id'],$_smarty_tpl->getVariable('array_answer')->value)){?><?php echo $_smarty_tpl->getVariable('array_answer')->value[$_smarty_tpl->tpl_vars['q']->value['id']]['comment'];?>
<?php }?></textarea>
		</div>
		<?php }?>
		
		<br />
		
		<?php if ($_smarty_tpl->getVariable('k')->value!=count($_smarty_tpl->getVariable('questionnaire')->value['questions'])-1){?>
		<hr />
		<?php }?>
		
	<?php }} ?>

	<p><input type="submit" value="Post answer" class="button_link_big" /></p>

</form>
</div>