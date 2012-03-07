<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 02:11:01
         compiled from "plugin/workgroup/html/workgroup_list.html" */ ?>
<?php /*%%SmartyHeaderCode:444f516fa5475440-79889234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e6685828c2c289fabaacaaa60f42682623efe9af' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_list.html',
      1 => 1330388532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '444f516fa5475440-79889234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_bbcode')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.bbcode.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><!-- Ok -->
<div id="workgroup_list">
	<?php if (count($_smarty_tpl->getVariable('workgroup_confirm')->value)>0){?>
	<h1>Working Group Invitation(s)</h1>
	
	<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('workgroup_confirm')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
?>
	<div class="workgroup">
		<h3><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</h3>
		<div class="description">
			<?php echo smarty_modifier_bbcode($_smarty_tpl->tpl_vars['w']->value['description']);?>

		</div>
		<p><a href="#invitation<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
" class="button_link leanModal_button">Confirm your participation</a></p>
		<?php echo smarty_function_html_leanmodal(array('title'=>"Confirmation for ".($_smarty_tpl->tpl_vars['w']->value['name']),'id'=>"invitation".($_smarty_tpl->tpl_vars['w']->value['id']),'id_workgroup'=>($_smarty_tpl->tpl_vars['w']->value['id']),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/workgroup_list_participationwindow.html"),$_smarty_tpl);?>

	</div>
	<?php }} ?>
	<?php }?>
	
	<h1>Current Working Group(s)</h1>

	<?php if ($_smarty_tpl->getVariable('hasWorkgroup')->value){?>
	
		<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('workgroup')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
?>
		<div class="workgroup">
			<h3>
				 <?php if ($_smarty_tpl->tpl_vars['w']->value['isModerator']){?><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_gold_3.png" title="Moderator" alt="Moderator" /><?php }else{ ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
				<a href="?Workgroup/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</a>
			</h3>
			
			<div class="description">
				<?php echo smarty_modifier_bbcode($_smarty_tpl->tpl_vars['w']->value['description']);?>

			</div>
			
		</div>
		<?php }} ?>
	
	<?php }else{ ?>
		<p><em>You do not belong to any workgroup.</em></p>
	<?php }?>
	
	<p><a href="?Workgroup/archive" class="button_link_big">Archives</a></p>
</div>