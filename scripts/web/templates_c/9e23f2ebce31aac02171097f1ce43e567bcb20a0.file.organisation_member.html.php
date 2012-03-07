<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 14:47:15
         compiled from "plugin/user/html/organisation_member.html" */ ?>
<?php /*%%SmartyHeaderCode:212474f33ce630cb430-11396170%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e23f2ebce31aac02171097f1ce43e567bcb20a0' => 
    array (
      0 => 'plugin/user/html/organisation_member.html',
      1 => 1328795232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212474f33ce630cb430-11396170',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><p>Members of <strong><?php echo $_smarty_tpl->getVariable('org')->value['name'];?>
</strong></p>

<table class="tab_admin">
	<tr>
		<th>Name</th>
		<th>Job</th>
		<th>Actions</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_member')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
	<tr>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['isContact']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_gold_3.png" title="Contact of the organisation" alt="Contact of the organisation" />
			<?php }else{ ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['isSubstitute']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_silver_3.png" title="Substitute of the contact" alt="Substitute of the contact" />
			<?php }else{ ?>
				&nbsp;&nbsp;&nbsp;&nbsp;
			<?php }?>
			<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['m']->value['job'];?>
</td>
		<td>
			<?php if (!$_smarty_tpl->tpl_vars['m']->value['isContact']){?>
				<a href="?Request/User/setcontact/<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
/1"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_add.png" title="Set as contact" alt="Set as contact" /></a>
			<?php }else{ ?>
				<a href="?Request/User/setcontact/<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
/0"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_delete.png" title="Remove contact status" alt="Remove contact status" /></a>
			<?php }?>
			<?php if (!$_smarty_tpl->tpl_vars['m']->value['isSubstitute']){?>
				<a href="?Request/User/setsubstitute/<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
/1"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_silver_add.png" title="Set as substitute" alt="Set as substitute" /></a>
			<?php }else{ ?>
				<a href="?Request/User/setsubstitute/<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
/0"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/award_star_silver_delete.png" title="Remove substitute status" alt="Remove substitute status" /></a>
			<?php }?>
			
			<a href="#editJob<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit job" alt="Edit job" /></a>
			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
<?php $_tmp2=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('id'=>"editJob".($_smarty_tpl->tpl_vars['m']->value['id']),'title'=>"Edit Job",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."user/html/leanmodal/user_organisation_editjob.html",'job'=>$_smarty_tpl->tpl_vars['m']->value['job'],'id_user'=>$_tmp1,'id_org'=>$_tmp2),$_smarty_tpl);?>

			
			<a href="?Request/User/organisationdeletemember/<?php echo $_smarty_tpl->getVariable('org')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Remove this member" alt="Remove this member" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>
<?php if (count($_smarty_tpl->getVariable('array_member_add')->value)>0){?>
<p><a href="#addMember" class="button_link_big leanModal_button">Add a member</a></p>
<?php echo smarty_function_html_leanmodal(array('content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."user/html/leanmodal/user_organisation_addmember.html",'array_member'=>$_smarty_tpl->getVariable('array_member')->value,'org'=>$_smarty_tpl->getVariable('org')->value,'id'=>"addMember",'title'=>"New Member"),$_smarty_tpl);?>

<?php }?>