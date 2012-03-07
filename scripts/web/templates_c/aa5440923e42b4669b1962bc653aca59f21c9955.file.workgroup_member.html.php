<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 02:53:26
         compiled from "plugin/workgroup/html/admin/workgroup_member.html" */ ?>
<?php /*%%SmartyHeaderCode:99774f3db316de3b71-09632565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa5440923e42b4669b1962bc653aca59f21c9955' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_member.html',
      1 => 1329085319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99774f3db316de3b71-09632565',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><p>Members of <strong><?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
</strong></p><table class="tab_admin">	<tr>		<th>User</th>		<th>Confirmed</th>		<th>Actions</th>	</tr>	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('members')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>	<tr>		<td>			<?php if ($_smarty_tpl->tpl_vars['m']->value['isModerator']){?>				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/award_star_gold_3.png" alt="Moderator" title="Moderator"/>			<?php }elseif($_smarty_tpl->tpl_vars['m']->value['isGuest']){?>				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/guest.png" alt="Guest" title="Guest"/>			<?php }else{ ?>				&nbsp;&nbsp;&nbsp;&nbsp;			<?php }?>						<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a>		</td>		<td width="20">			<?php if ($_smarty_tpl->tpl_vars['m']->value['confirmed']==1){?>			<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" title="Confirmed" alt="Confirmed" />			<?php }elseif($_smarty_tpl->tpl_vars['m']->value['confirmed']==''){?>			<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/circle_blue.png" title="No answer" alt="No answer" /> 			<?php }else{ ?>			<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/cross.png" title="Declined" alt="Declined" /> : <?php echo $_smarty_tpl->tpl_vars['m']->value['reason'];?>
			<?php }?>		</td>		<td width="60">			<a href="#memberEdit" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this member" alt="Edit this member" onclick="workgroupLoadMemberInfo(<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
, '<?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
', <?php echo $_smarty_tpl->tpl_vars['m']->value['isGuest'];?>
, <?php echo $_smarty_tpl->tpl_vars['m']->value['isModerator'];?>
)" /></a>			<a href="#deleteMember<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Remove this member from this group" title="Remove this member from this group" /></a>						<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteMember".($_smarty_tpl->tpl_vars['m']->value['id']),'message'=>"Are you sure you want to kick <strong>".($_smarty_tpl->tpl_vars['m']->value['firstname'])." ".($_smarty_tpl->tpl_vars['m']->value['lastname'])."</strong> from the working group?",'handler_yes'=>"?Request/Workgroup/deletemember/".($_smarty_tpl->getVariable('workgroup')->value['id'])."/".($_smarty_tpl->tpl_vars['m']->value['id'])),$_smarty_tpl);?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['confirmed']==''){?>			<a href="?Request/Workgroup/recallmember/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/email_go.png" title="Send a recall e-mail" alt="Send a recall e-mail" /></a>			<?php }?>		</td>	</tr>	<?php }} ?></table><p><a href="#memberInvitation" class="leanModal_button button_link">Invite member(s)</a></p><?php echo smarty_function_html_leanmodal(array('title'=>"Member Invitation",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_member_invitation.html",'id'=>"memberInvitation",'members_add'=>$_smarty_tpl->getVariable('members_add')->value),$_smarty_tpl);?>
<?php ob_start();?><?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>"Member Edition",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_member_edit.html",'id'=>"memberEdit",'id_workgroup'=>$_tmp1),$_smarty_tpl);?>
