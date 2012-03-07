<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:17:10
         compiled from "plugin/workgroup/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:182974f43edb61b5636-17563902%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '32dac1b38b1ef2341ba8392b59e438aa8718aa4d' => 
    array (
      0 => 'plugin/workgroup/html/widget.html',
      1 => 1329851542,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182974f43edb61b5636-17563902',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="workgroup_widget">
	<h2>Current Working Groups <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_widget'),$_smarty_tpl);?>
</h2>
	
	<?php if ($_smarty_tpl->getVariable('hasWorkgroup')->value){?>
		<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('workgroups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['w']->key;
?>
			<div class="workgroup">
			
				<div class="buttons">
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/comment<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lasttopic']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_topic']==0){?>_gray<?php }?>.png" 				
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lasttopic']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New topics are available" alt="New topic are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_topic']==0){?>title="Not topic yet" alt="Not topic yet"<?php }else{ ?>title="Topics are available" alt="Topics are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/questionnaire<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastquestionnaire']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_questionnaire']==0){?>_gray<?php }?>.png" 
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastquestionnaire']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New questionnaires are available" alt="New questionnaires are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_questionnaire']==0){?>title="No questionnaire yet" alt="No questionnaire yet"<?php }else{ ?>title="Questionnaires are available" alt="Questionnaires are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/file<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastfile']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_file']==0){?>_gray<?php }?>.png" 					
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastfile']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New files are available" alt="New file are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_file']==0){?>title="No file yet" alt="No file yet"<?php }else{ ?>title="Files are available" alt="Files are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/confcall<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastconfcall']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_confcall']==0){?>_gray<?php }?>.png" 		
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastconfcall']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New rendezvous are available" alt="New rendezvous are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_confcall']==0){?>title="No rendezvous yet" alt="No rendezvous yet"<?php }else{ ?>title="Rendezvous are available" alt="Rendezvous are available"<?php }?>/>
				</div>		
				<p>
					<?php if ($_smarty_tpl->tpl_vars['w']->value['isModerator']||$_smarty_tpl->getVariable('isAdmin')->value){?>
						<a href="?Workgroup/admin/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/manage.png" title="Manage this working group" alt="Manage this working group" /></a> 
					<?php }else{ ?>
						&nbsp;&nbsp;&nbsp;&nbsp;
					<?php }?>
					<a href="?Workgroup/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</a>
				</p>
				
				<?php if ($_smarty_tpl->tpl_vars['k']->value!=count($_smarty_tpl->getVariable('workgroups')->value)-1){?>
				<hr />
				<?php }?>
				
			</div>
		<?php }} ?>
	<?php }else{ ?>
		<p><em>You do not belong to any working group.</em></p>
	<?php }?>
	
	<?php if ($_smarty_tpl->getVariable('nbrInvitationPending')->value>0){?>
		<p>You have <a href="?Workgroup"><?php echo $_smarty_tpl->getVariable('nbrInvitationPending')->value;?>
 invitation<?php if ($_smarty_tpl->getVariable('nbrInvitationPending')->value>1){?>s<?php }?> pending</a>.</p>
	<?php }?>
</div>