<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 00:48:11
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_member_invitation.html" */ ?>
<?php /*%%SmartyHeaderCode:236854f273a4b0bc288-47362529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6787d5dac9590aabf29fab6e4473cb4d9144e569' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_member_invitation.html',
      1 => 1327970887,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '236854f273a4b0bc288-47362529',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (count($_smarty_tpl->getVariable('members_add')->value)>0){?>
<form method="post" action="?Request/Workgroup/addmember">
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" />
	<input type="hidden" name="name_workgroup" value="<?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
" />
	
	<div id="div_invite">
		<table class="tab_admin">
			<tr>
				<th>Invite</th>
				<th>Member</th>
				<th>Guest</th>
				<th>Moderator</th>
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('members_add')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
			<tr>
				<td><input type="checkbox" name="invite[]" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" id="checkbox_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="checkbox_invite" /></td>
				<td>
					<label for="checkbox_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</label>
					<input type="hidden" name="email_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['m']->value['email'];?>
" />
				</td>
				<td>
					<input type="checkbox" name="guest_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" />
				</td>
				<td>
					<input type="checkbox" name="moderator_<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" />
				</td>		
			</tr>
			<?php }} ?>
		</table>
	</div>	
	<p>
		<input id="invite_all" type="checkbox" onclick="$('.checkbox_invite').attr('checked', $('#invite_all').attr('checked'));" title="Invite all of them" />
		<label for="invite_all">Invite all of them</label>
	</p>		
	<p><input type="submit" value="Send invitation(s)" class="button_link" /></p>
</form>
<?php }?>