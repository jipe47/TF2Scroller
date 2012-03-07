<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 15:46:52
         compiled from "plugin/workgroup/html/admin/workgroup_listmod.html" */ ?>
<?php /*%%SmartyHeaderCode:267414f2d44dc66b8e2-93263044%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09825ff07e4f5390e6839187293661ed9ac76e76' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_listmod.html',
      1 => 1328366809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267414f2d44dc66b8e2-93263044',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><p>Modifications for file <?php echo $_smarty_tpl->getVariable('file')->value['name'];?>
</p>

<table class="tab_admin">
	<tr>
		<!--<th>Processed</th>-->
		<th>User</th>
		<th>File(s)</th>
	</tr>
	<!--
	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mods')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
	<tr>
		<td>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['timestamp_processed']!=''&&$_smarty_tpl->tpl_vars['m']->value['timestamp_add']<$_smarty_tpl->tpl_vars['m']->value['timestamp_processed']){?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/tick.png" title="This file has been processed" alt="This file has been processed" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/cross.png" title="This file has not been processed" alt="This file has not been processed" />
			<?php }?>
		</td>

		<td><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</td>
		<td><a href="upload/workgroup/filemod/<?php echo $_smarty_tpl->tpl_vars['m']->value['filename'];?>
">Download</a></td>
		<td><?php echo $_smarty_tpl->tpl_vars['m']->value['comment'];?>
</td>
		<td>
			<a href="?Admin/Workgroup/deletemod/<?php echo $_smarty_tpl->tpl_vars['m']->value['id_file'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id_user'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this modification" title="Delete this modification" /></a>
			<?php if ($_smarty_tpl->tpl_vars['m']->value['timestamp_processed']==''||$_smarty_tpl->tpl_vars['m']->value['timestamp_add']>=$_smarty_tpl->tpl_vars['m']->value['timestamp_processed']){?>
				<a href="?Request/Workgroup/processfilemod/<?php echo $_smarty_tpl->tpl_vars['m']->value['id_file'];?>
/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/tick.png" title="Mark as processed" alt="Mark has processed" /></a>
			<?php }?>
		</td>
	</tr>
	<?php }} ?>-->
	
	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id_user'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('mods')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
 $_smarty_tpl->tpl_vars['id_user']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
	<tr>
		<td><a href="?Member/<?php echo $_smarty_tpl->tpl_vars['id_user']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value[0]['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value[0]['lastname'];?>
</a></td>
		<td>
			<table class="tab_admin">
				<tr>
					<th>Timestamp</th>
					<th>Comment</th>
					<th>Processed</th>
					<th>Actions</th>
				</tr>
			<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['m']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
				<tr>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['f']->value['timestamp_add'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['f']->value['comment'];?>
</td>
					<td>
					<?php if ($_smarty_tpl->tpl_vars['f']->value['timestamp_processed']!=''&&$_smarty_tpl->tpl_vars['f']->value['timestamp_add']<$_smarty_tpl->tpl_vars['f']->value['timestamp_processed']){?>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/tick.png" title="This file has been processed" alt="This file has been processed" />
					<?php }else{ ?>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/cross.png" title="This file has not been processed" alt="This file has not been processed" />
					<?php }?>
					</td>
					<td>
						<a href="upload/workgroup/filemod/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_go.png" title="Download this modification" alt="Download this modification" /></a>
						<a href="?Admin/Workgroup/deletemod/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this modification" title="Delete this modification" /></a>
						<a href="?Request/Workgroup/processfilemod/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/toggletickcross.png" alt="Toggle processed flag" title="Toggle processed flag" /></a>
					</td>
				</tr>
			<?php }} ?>
			</table>
		</td>
	</tr>
	<?php }} ?>
</table>
	
<p>Members who did not post a modification.</p>

<table class="tab_admin">
	<tr>
		<th>User</th>
		<th>Actions</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['u'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('users')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['u']->key => $_smarty_tpl->tpl_vars['u']->value){
?>
	<tr>
		<td><a href="?Member/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['u']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value['lastname'];?>
</a></td>
		<td>
			<a href="?Request/Workgroup/sendrecall/<?php echo $_smarty_tpl->getVariable('file')->value['id'];?>
/<?php echo $_smarty_tpl->tpl_vars['u']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/email_go.png" title="Send a recall" alt="Send a recall" /></a>
		</td>
	</tr>
	<?php }} ?>
</table>
