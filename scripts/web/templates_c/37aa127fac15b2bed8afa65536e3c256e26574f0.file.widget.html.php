<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 00:15:32
         compiled from "C:\wamp\www\transeo\config/../plugin/workgroup/html/widget.html" */ ?>
<?php /*%%SmartyHeaderCode:56234f2b1914c91ed9-02884436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37aa127fac15b2bed8afa65536e3c256e26574f0' => 
    array (
      0 => 'C:\\wamp\\www\\transeo\\config/../plugin/workgroup/html/widget.html',
      1 => 1324900933,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '56234f2b1914c91ed9-02884436',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="workgroup_widget">
	<h2>Current Working Groups</h2>
	
	<?php if ($_smarty_tpl->getVariable('hasWorkgroup')->value){?>
		<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('workgroups')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
?>
			<div class="workgroup">
			
				<div class="buttons">
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/comment<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lasttopic']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_topic']==0){?>_gray<?php }?>.png" 				
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lasttopic']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New topics are available" alt="New topic are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_topic']==0){?>title="Not topic yet" alt="Not topic yet"<?php }else{ ?>title="Topics are available" alt="Topics are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/help<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastquestionnaire']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_questionnaire']==0){?>_gray<?php }?>.png" 
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastquestionnaire']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New questionnaires are available" alt="New questionnaires are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_questionnaire']==0){?>title="No questionnaire yet" alt="No questionnaire yet"<?php }else{ ?>title="Questionnaires are available" alt="Questionnaires are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/file<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastfile']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_file']==0){?>_gray<?php }?>.png" 					
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastfile']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New files are available" alt="New file are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_file']==0){?>title="No file yet" alt="No file yet"<?php }else{ ?>title="Files are available" alt="Files are available"<?php }?>/>&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/widget/confcall<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastconfcall']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>_star<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_confcall']==0){?>_gray<?php }?>.png" 		
						<?php if ($_smarty_tpl->tpl_vars['w']->value['timestamp_lastconfcall']>$_smarty_tpl->tpl_vars['w']->value['timestamp_lastaccess']){?>title="New confcalls are available" alt="New confcalls are available"<?php }elseif($_smarty_tpl->tpl_vars['w']->value['nbr_confcall']==0){?>title="No confcall yet" alt="No confcall yet"<?php }else{ ?>title="Confcalls are available" alt="Confcalls are available"<?php }?>/>
				</div>		
				<p><a href="?Workgroup/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</a></p>
				
				<hr />
			</div>
		<?php }} ?>
	<?php }else{ ?>
		<p><em>You do not belong to any working group.</em></p>
	<?php }?>
	
	<?php if ($_smarty_tpl->getVariable('nbrInvitationPending')->value>0){?>
		<p>You have <a href="?Workgroup"><?php echo $_smarty_tpl->getVariable('nbrInvitationPending')->value;?>
 pending invitation(s)</a>.</p>
	<?php }?>
</div>