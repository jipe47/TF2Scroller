<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 14:06:32
         compiled from "plugin/user/html/user_group.html" */ ?>
<?php /*%%SmartyHeaderCode:219854f2e7ed8110802-05848855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '924e50c4c7eaa7160ba89406c86d1c7431f34a18' => 
    array (
      0 => 'plugin/user/html/user_group.html',
      1 => 1328447189,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '219854f2e7ed8110802-05848855',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><table class="tab_admin">
	<tr>
		<th>Group</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</td>
		<td>
			<a href="#deleteFromGroup<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Kick him out of this group" alt="Kick him out of this group" /></a>
			<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteFromGroup".($_smarty_tpl->tpl_vars['g']->value['id']),'message'=>"Are you sure you want to kick <strong>".($_smarty_tpl->getVariable('user')->value['firstname'])." ".($_smarty_tpl->getVariable('user')->value['lastname'])."</strong> from the group <strong>".($_smarty_tpl->tpl_vars['g']->value['name'])."</strong>?",'handler_yes'=>"?Request/User/userkick/".($_smarty_tpl->getVariable('user')->value['id'])."/".($_smarty_tpl->tpl_vars['g']->value['id'])),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</table>

<?php if (count($_smarty_tpl->getVariable('array_group')->value)>0){?>
<p>
	<a href="#addToGroup" class="button_link_big leanModal_button">Add to a group</a>
	<a href="?Admin/User/userlist" class="button_link_big">Back to users</a>
</p>
<?php }else{ ?>
<p><em>This user belongs to every group.</em></p>
<p><a href="?Admin/User/userlist" class="button_link_big">Back to users</a></p>
<?php }?>
<?php echo smarty_function_html_leanmodal(array('id'=>"addToGroup",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."user/html/leanmodal/user_group_addtogroup.html",'title'=>"Add to Group",'array_group'=>$_smarty_tpl->getVariable('array_group')->value,'user'=>$_smarty_tpl->getVariable('user')->value),$_smarty_tpl);?>

