<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 02:15:50
         compiled from "plugin/workgroup/html/workgroup_calendar.html" */ ?>
<?php /*%%SmartyHeaderCode:198824f5170c669d609-69187503%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ef2a5ec3891bc7a9f8381251dd49d81a9f724ac' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_calendar.html',
      1 => 1330388532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198824f5170c669d609-69187503',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.capitalize.php';
?><!-- Ok -->
<h1>Calendar</h1>
<div id="workgroup_calendar">
	<table id="tab_calendar">
		<tr>
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_calendar')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
			<td>
				<div class="title"><?php echo $_smarty_tpl->tpl_vars['c']->value['month'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['year'];?>
</div>
				
				<div class="container">
				<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['c']->value['array_event']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
				<a href="<?php echo $_smarty_tpl->tpl_vars['e']->value['link'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['e']->value['timestamp'],"%e");?>
 - <?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</a><br />
				<?php }} ?>
				</div>
			</td>
			<?php if ($_smarty_tpl->tpl_vars['c']->value['nextline']){?></tr><tr><?php }?>
		<?php }} ?>
		</tr>
	</table>
	
	<h3>Upcoming Events</h3>
	
	<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
	<p>
		<a href="?Admin/Workgroup/deadline/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">Deadline Management</a>
	</p>
	<?php }?>
	
	<?php if (count($_smarty_tpl->getVariable('array_deadline')->value)>0){?>
		<table class="tab_admin">
			<tr>
				<th width="80">Date</th>
				<th>Name</th>
				<th>Description</th>
				<th width="60">Actions</th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_deadline')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
			<tr>
				<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['timestamp'],"%d/%m/%Y");?>
</td>
				<td>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/deadlines/<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
.png" title="<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=='conference'){?>Rendezvous<?php }else{ ?><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['d']->value['type']);?>
<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=='conference'){?>Rendezvous<?php }else{ ?><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['d']->value['type']);?>
<?php }?>" />
					<a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</a>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['d']->value['description'];?>
</td>
				<td>
				<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->getVariable('isModerator')->value){?>
				
					<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=="custom"){?>
					<a href="?Admin/Workgroup/deadline/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this deadline" title="Edit this deadline"/></a>
					<a href="?Admin/Workgroup/deadline/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this deadline" title="Delete this deadline"/></a>
					<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="file"){?>
					<a href="?Admin/Workgroup/file/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this file" title="Edit this file"/></a>
					<a href="?Admin/Workgroup/file/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this file" title="Delete this file"/></a>
					<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="questionnaire"){?>
					<a href="?Admin/Workgroup/questionnaire/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this questionnaire" title="Edit this questionnaire"/></a>
					<a href="?Admin/Workgroup/questionnaire/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this questionnaire" title="Delete this questionnaire"/></a>
					<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="conference"){?>
					<a href="?Admin/Workgroup/conference/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this conference" title="Edit this conference"/></a>
					<a href="?Admin/Workgroup/conference/delete/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this conference" title="Delete this conference"/></a>
					<?php }?>
					<a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/bullet_go.png" title="More info" alt="More info" /></a>
				<?php }?>
				</td>
			</tr>
			<?php }} ?>			
		</table>
	<?php }else{ ?>
		<p>No deadline specified.</p>
	<?php }?>
</div>