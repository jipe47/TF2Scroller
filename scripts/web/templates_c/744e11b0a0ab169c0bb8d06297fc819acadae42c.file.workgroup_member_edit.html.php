<?php /* Smarty version Smarty-3.0.7, created on 2012-01-30 23:43:23
         compiled from "plugin/workgroup/html/admin/leanmodal/workgroup_member_edit.html" */ ?>
<?php /*%%SmartyHeaderCode:161754f272b1b46cde3-28839387%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '744e11b0a0ab169c0bb8d06297fc819acadae42c' => 
    array (
      0 => 'plugin/workgroup/html/admin/leanmodal/workgroup_member_edit.html',
      1 => 1324021008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '161754f272b1b46cde3-28839387',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/editmember">
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	<input type="hidden" id="id_user" name="id_user" />
	
	<p>Status of <strong id="member_name"></strong></p>
	
	<table>
		<tr>
			<td>
				<label for="edit_guest_checkbox">Guest:</label>
			</td>
			<td>
				<input type="checkbox" id="edit_guest_checkbox" name="isGuest" onclick="workgroupCheckStatus()" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="edit_moderator_checkbox">Moderator:</label>
			</td>
			<td>
				<input type="checkbox" id="edit_moderator_checkbox" name="isModerator" />
			</td>
		</tr>
	</table>
	
	<p>
		<input type="submit" value="Edit" class="button_link" />
		<input type="button" value="Close" class="button_link" onclick="leanModal_close('memberEdit')" />
	</p>
</form>
