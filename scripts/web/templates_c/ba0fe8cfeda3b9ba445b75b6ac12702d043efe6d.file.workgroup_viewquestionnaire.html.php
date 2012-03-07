<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 21:54:35
         compiled from "plugin/workgroup/html/admin/workgroup_viewquestionnaire.html" */ ?>
<?php /*%%SmartyHeaderCode:251954f52850bef7477-74779936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba0fe8cfeda3b9ba445b75b6ac12702d043efe6d' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_viewquestionnaire.html',
      1 => 1330388530,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '251954f52850bef7477-74779936',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_bbcode')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.bbcode.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_message')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.message.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><!-- Ok -->
<div id="workgroup_questionnaire">
	<div class="colright">
		<h2>Description</h2>
		<?php echo smarty_modifier_bbcode($_smarty_tpl->getVariable('info')->value['description']);?>

		<br />
		<h2>Options</h2>
		
			<a href="?Admin/Workgroup/questionnaire/edit/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" class="button_link_big">Edit</a>
			<a href="#deleteQuestionnaire" class="button_link_big leanModal_button">Delete</a>
			<br /><br />
			<a href="?Request/Workgroup/questionnaire/publish/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
/fromquestionnaire" class="button_link_big<?php if (!$_smarty_tpl->getVariable('verify')->value['publishable']){?>_disabled<?php }?>">
				<?php if ($_smarty_tpl->getVariable('info')->value['publish']==0){?>Publish<?php }else{ ?>Hide<?php }?>
			</a>
			<br /><br />
			<a href="?Admin/Workgroup/question/add/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" class="button_link_big">Add a question</a>
			<br /><br />
			<a href="xls_questionnaire.php?id_questionnaire=<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" class="button_link_big">Export in .xls</a>
			<br /><br />
			
			
		<h2>Answers</h2>
		
		<?php if (count($_smarty_tpl->getVariable('array_user')->value)>0){?>
			<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_user')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
				<a href="#deleteAnswer_<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete the user's answers" alt="Delete the user's answers" /></a>
				<a href="?Admin/Workgroup/questionnaire/answeruser/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/answer.png" title="See answers" alt="See answers" /></a>
				
				<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>
</a><br />
				
				<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteAnswer_".($_smarty_tpl->tpl_vars['u']->value['id']),'handler_yes'=>"?Request/Workgroup/question/deleteanswer/".($_smarty_tpl->getVariable('info')->value['id'])."/".($_smarty_tpl->tpl_vars['u']->value['id'])."/fromquestionnaire",'message'=>"Are you sure you want to delete <strong>".($_smarty_tpl->tpl_vars['u']->value['firstname'])." ".($_smarty_tpl->tpl_vars['u']->value['lastname'])."</strong>'s answer(s)?"),$_smarty_tpl);?>

			<?php }} ?>
		<?php }else{ ?>
		<em>No answer yet.</em><br />
		<?php }?>
	</div>
	
	<div class="colleft">
		<?php if ($_smarty_tpl->getVariable('verify')->value['reason']!=''){?>
		<?php ob_start();?><?php echo $_smarty_tpl->getVariable('verify')->value['reason'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_message(array('type'=>'warning','text'=>$_tmp1),$_smarty_tpl);?>

		<?php }?>
		<h2>Preview</h2>
		
		<?php  $_smarty_tpl->tpl_vars['q'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('info')->value['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['q']->key => $_smarty_tpl->tpl_vars['q']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['q']->key;
?>
		<!-- Dummy div -->
		<div id="question_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" class="div_dummy"></div>
		
		<div class="question <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('verify')->value['indexes'])){?>question_warning<?php }elseif($_smarty_tpl->tpl_vars['k']->value%2==0){?>even<?php }else{ ?>odd<?php }?>">
			
			<div class="toolbar-left">
				
				<a <?php if ($_smarty_tpl->tpl_vars['k']->value!=0){?>href="?Request/Workgroup/question/move/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/up" title="Move up"<?php }?>>
					<span class="arrow arrow-up<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?>-disabled<?php }?>"></span>
				</a>
					
				<a <?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('info')->value['questions'])-1){?>href="?Request/Workgroup/question/move/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/down" title="Move down"<?php }?>>
					<span class="arrow arrow-down<?php if ($_smarty_tpl->tpl_vars['k']->value==count($_smarty_tpl->getVariable('info')->value['questions'])-1){?>-disabled<?php }?>"></span>
				</a>
				
				<?php if ($_smarty_tpl->tpl_vars['q']->value['label']!=''){?><strong><?php echo $_smarty_tpl->tpl_vars['q']->value['label'];?>
</strong><?php }else{ ?><em>No label</em><?php }?><br />
				
				<a href="?Admin/Workgroup/question/edit/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this question" alt="Edit this question" /></a>
				<a href="#delete_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this question" alt="Delete this question" /></a>
				<a href="?Admin/Workgroup/question/answerquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/answer.png" title="See answers" alt="See answers" /></a>
			
				<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['q']->value['label']==''){?><?php echo "this question";?><?php }else{ ?><?php echo "the question <strong>";?><?php echo $_smarty_tpl->tpl_vars['q']->value['label'];?><?php echo "</strong>";?><?php }?><?php $_tmp2=ob_get_clean();?><?php echo smarty_function_html_leanmodal_confirm(array('id'=>"delete_".($_smarty_tpl->tpl_vars['q']->value['id']),'message'=>"Are you sure you want to delete ".$_tmp2."? Answers will be lost.",'handler_yes'=>"?Request/Workgroup/question/delete/".($_smarty_tpl->getVariable('info')->value['id'])."/".($_smarty_tpl->tpl_vars['q']->value['id'])),$_smarty_tpl);?>

			</div>
		
			<div class="rest">
			
				<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('verify')->value['indexes'])){?>
					<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('verify')->value['reasons'][$_smarty_tpl->getVariable('k')->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
					<?php echo smarty_function_message(array('type'=>'warning','text'=>$_smarty_tpl->tpl_vars['r']->value),$_smarty_tpl);?>

					<?php }} ?>
				<?php }?>
		
				<?php echo $_smarty_tpl->tpl_vars['k']->value+1;?>
. <?php echo $_smarty_tpl->tpl_vars['q']->value['question'];?>

				<?php if ($_smarty_tpl->tpl_vars['q']->value['type']=="open"){?>
					<br /><br />
					<?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_col'=>60),$_smarty_tpl);?>

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
							
							<a href="#editChoice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this choice" alt="Edit this choice" /></a>
							<a href="#deleteChoice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title = "Delete this choice" alt="Delete this choice" /></a>
							
							<?php if ($_smarty_tpl->tpl_vars['kc']->value!=0){?>
							<a href="?Request/Workgroup/question/multiple_action/up/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_up.png" title="Move up" alt="Move up" /></a>
							<?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;
							<?php }?>
							
							<?php if ($_smarty_tpl->tpl_vars['kc']->value!=count($_smarty_tpl->tpl_vars['q']->value['data']['choices'])-1){?>
							<a href="?Request/Workgroup/question/multiple_action/down/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_down.png" title="Move down" alt="Move down" /></a>
							<?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;
							<?php }?>
						
						
							<input id="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" type="<?php if (array_key_exists('max_answer',$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['max_answer']=='none'){?>checkbox<?php }else{ ?>radio<?php }?>" name="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
[]" value="<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" />
							<label for="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value;?>
</label>
						</li>
						
						<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteChoice_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'handler_yes'=>"?Request/Workgroup/question/multiple_action/delete/".($_smarty_tpl->tpl_vars['q']->value['id'])."/".(($_smarty_tpl->tpl_vars['kc']->value+1)),'message'=>"Are you sure you want to delete this choice?"),$_smarty_tpl);?>

						<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>"Edit Choice",'id'=>"editChoice_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoice.html",'id_question'=>$_smarty_tpl->tpl_vars['q']->value['id'],'key'=>$_tmp3,'value'=>$_smarty_tpl->tpl_vars['c']->value),$_smarty_tpl);?>

	
					<?php }} ?>
					<?php }?>
					</ul>
					
					<p>
						<a href="#addChoice_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="button_link leanModal_button">Add choice</a>
						<a href="#editQuestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="button_link leanModal_button">Edit question settings</a>
					</p>
					<?php echo smarty_function_html_leanmodal(array('title'=>"Edit Question",'id'=>"editQuestion_".($_smarty_tpl->tpl_vars['k']->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editchoicequestion.html",'id_question'=>$_smarty_tpl->tpl_vars['q']->value['id'],'data'=>$_smarty_tpl->tpl_vars['q']->value['data']),$_smarty_tpl);?>

					<?php echo smarty_function_html_leanmodal(array('title'=>"New Choice",'id'=>"addChoice_".($_smarty_tpl->tpl_vars['k']->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addchoice.html",'id_question'=>$_smarty_tpl->tpl_vars['q']->value['id']),$_smarty_tpl);?>

					
				<?php }elseif($_smarty_tpl->tpl_vars['q']->value['type']=="ranking"){?>
					<br /><br />
					<table class="tab_admin">
						<tr>
							<th width="200">Sub-question(s)</th>
							<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['kc']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
							<th>
								<?php echo $_smarty_tpl->tpl_vars['r']->value;?>

								<br />
								<a class="leanModal_button" href="#editRank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit" alt="Edit" /></a>
								<a href="#deleteRank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete" alt="Delete" /></a>
								
								<?php if ($_smarty_tpl->tpl_vars['kc']->value!=0){?>
								<a href="?Request/Workgroup/question/ranking_action/uprank/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_left.png" title="Move left" alt="Move left" /></a>
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['kc']->value!=count($_smarty_tpl->tpl_vars['q']->value['data']['ranks'])-1){?>
								<a href="?Request/Workgroup/question/ranking_action/downrank/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="Move right" alt="Move right" /></a>
								<?php }?>
								
								
								<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editrank.html",'title'=>"Edit a Rank",'id'=>"editRank_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'id_question'=>($_smarty_tpl->tpl_vars['q']->value['id']),'rank'=>$_smarty_tpl->tpl_vars['r']->value,'index'=>$_smarty_tpl->tpl_vars['kc']->value),$_smarty_tpl);?>

								<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the rank <strong>".($_smarty_tpl->tpl_vars['r']->value)."</strong>?",'id'=>"deleteRank_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'handler_yes'=>"?Request/Workgroup/question/ranking_action/deleterank/".($_smarty_tpl->tpl_vars['q']->value['id'])."/".($_smarty_tpl->tpl_vars['kc']->value)),$_smarty_tpl);?>

							
							</th>
							<?php }} ?>
							<?php if (array_key_exists("enable_subcomment",$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['enable_subcomment']=="1"){?>
							<th width="20">Comment</th>
							<?php }?>
						</tr>
						<?php  $_smarty_tpl->tpl_vars['sq'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kc'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['questions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['sq']->key => $_smarty_tpl->tpl_vars['sq']->value){
 $_smarty_tpl->tpl_vars['kc']->value = $_smarty_tpl->tpl_vars['sq']->key;
?>
						<tr>
							<td width="200">
								<a class="leanModal_button" href="#editSubquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit" alt="Edit" /></a>
								<a href="#deleteSubquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete" alt="Delete" /></a>
						
								<?php if ($_smarty_tpl->tpl_vars['kc']->value!=0){?>
								<a href="?Request/Workgroup/question/ranking_action/upquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_up.png" title="Move up" alt="Move up" /></a>
								<?php }else{ ?>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<?php }?>
								<?php if ($_smarty_tpl->tpl_vars['kc']->value!=count($_smarty_tpl->tpl_vars['q']->value['data']['questions'])-1){?>
								<a href="?Request/Workgroup/question/ranking_action/downquestion/<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['kc']->value+1;?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_down.png" title="Move down" alt="Move down" /></a>
								<?php }else{ ?>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<?php }?>	
								
								<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editsubquestion.html",'title'=>"Edit a subquestion",'id'=>"editSubquestion_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'id_question'=>($_smarty_tpl->tpl_vars['q']->value['id']),'subquestion'=>$_smarty_tpl->tpl_vars['sq']->value,'index'=>$_smarty_tpl->tpl_vars['kc']->value),$_smarty_tpl);?>

								<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete the subquestion <strong>".($_smarty_tpl->tpl_vars['sq']->value)."</strong>?",'id'=>"deleteSubquestion_".($_smarty_tpl->tpl_vars['k']->value)."_".($_smarty_tpl->tpl_vars['kc']->value),'handler_yes'=>"?Request/Workgroup/question/ranking_action/deletequestion/".($_smarty_tpl->tpl_vars['q']->value['id'])."/".($_smarty_tpl->tpl_vars['kc']->value)),$_smarty_tpl);?>

								
								<?php echo $_smarty_tpl->tpl_vars['sq']->value;?>

							</td>
							
							
							
							<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['kr'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['q']->value['data']['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
 $_smarty_tpl->tpl_vars['kr']->value = $_smarty_tpl->tpl_vars['r']->key;
?>
							<td class="rank_cell"><input type="radio" name="answer_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['kr']->value+1;?>
" /></td>
							<?php }} ?>
							
							<?php if (array_key_exists("enable_subcomment",$_smarty_tpl->tpl_vars['q']->value['data'])&&$_smarty_tpl->tpl_vars['q']->value['data']['enable_subcomment']=="1"){?>
							<td width="20">
								<input type="text" name="comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['kc']->value;?>
" />
							</td>
							<?php }?>
						</tr>
						<?php }} ?>
					</table>
					
					<p>
						<a href="#addRank_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button button_link">Add a rank</a>&nbsp;
						<a href="#addSubquestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button button_link">Add a subquestion</a>
						<a href="#editQuestion_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" class="leanModal_button button_link">Edit question settings</a>
					</p>
					
				<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_editrankingquestion.html",'title'=>"Edit Question",'id'=>"editQuestion_".($_smarty_tpl->tpl_vars['k']->value),'id_question'=>$_smarty_tpl->tpl_vars['q']->value['id'],'data'=>$_smarty_tpl->tpl_vars['q']->value['data']),$_smarty_tpl);?>

				<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addrank.html",'title'=>"Add a rank",'id'=>"addRank_".($_smarty_tpl->tpl_vars['k']->value),'id_question'=>($_smarty_tpl->tpl_vars['q']->value['id'])),$_smarty_tpl);?>

				<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_questionnaire_addsubquestion.html",'title'=>"Add a subquestion",'id'=>"addSubquestion_".($_smarty_tpl->tpl_vars['k']->value),'id_question'=>($_smarty_tpl->tpl_vars['q']->value['id'])),$_smarty_tpl);?>

					
				<?php }else{ ?>
					<p><em><?php echo $_smarty_tpl->tpl_vars['q']->value['type'];?>
 not supported</em></p>
				<?php }?>
				
				
				<?php if ($_smarty_tpl->tpl_vars['q']->value['enable_comment']){?>
				<p onclick="workgroupToggleComment(<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
)" style="cursor: pointer;">
					Comment
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_expand.png" title="Expane" alt="Expand" id="expand_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" />
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_reduce.png" title="Reduce" alt="Reduce" id="reduce_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" style="display: none;"/>
				</p>
				<div id="div_comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" style="display: none;">
					<textarea name="comment_<?php echo $_smarty_tpl->tpl_vars['q']->value['id'];?>
" cols="60" rows="2"></textarea>
				</div>
				<?php }?>
			</div>
			<div class="clearfix"></div>
			
		</div>
		<?php }} ?>
		
	</div>

	<div class="clearfix"></div>
</div>

<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteQuestionnaire",'message'=>"Are you sure you want to delete this questionnaire ? Questions and users'answers will be lost.",'handler_yes'=>"?Request/Workgroup/questionnaire/delete/".($_smarty_tpl->getVariable('info')->value['id_workgroup'])."/".($_smarty_tpl->getVariable('info')->value['id'])),$_smarty_tpl);?>

