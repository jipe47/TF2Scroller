<?php /* Smarty version Smarty-3.0.7, created on 2012-03-07 14:26:19
         compiled from "plugin/workgroup/html/workgroup_home.html" */ ?>
<?php /*%%SmartyHeaderCode:221724f5761fb984855-64237055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c050a95f54516f122caa5ca9f2c4c52cc9c1505f' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_home.html',
      1 => 1330989112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '221724f5761fb984855-64237055',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_bbcode')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.bbcode.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_modifier_capitalize')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.capitalize.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><h1><?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
</h1>
<div id="workgroup_home">
	
	<div id="workgroup_deadline">
	
		<div class="colright">
			<h2>Description</h2>
			<p><em><?php echo smarty_modifier_bbcode($_smarty_tpl->getVariable('workgroup')->value['description']);?>
</em></p>
			<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
			<p><a href="?Workgroup/admin/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">Admin</a></p>
			<?php }?>
		</div>
		<?php if (!$_smarty_tpl->getVariable('isGuest')->value){?>
		<div class="colleft">
		
			<h2><a href="?Workgroup/calendar/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Deadline(s)</a> 
				<?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_home_deadline'),$_smarty_tpl);?>

				<a href="?Workgroup/calendar/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/calendar.png" title="See calendar" alt="See calendar" /></a>
				<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
					<a href="?Admin/Workgroup/deadline/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/calendar_add.png" title="Add a custom deadline" title="Add a custom deadline" /></a>
					<a href="?Admin/Workgroup/deadline/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/calendar_wrench.png" title="Deadline management" alt="Deadline management" /></a>
				<?php }?>
			</h2>

			<?php if (count($_smarty_tpl->getVariable('array_deadline')->value)>0){?>
				
					<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = array_slice($_smarty_tpl->getVariable('array_deadline')->value,0,5); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					
						<p><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['d']->value['timestamp'],($_smarty_tpl->getVariable('DATE_FORMAT')->value));?>
 - 
							
							<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/deadlines/<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
.png" title="<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=='conference'){?>Rendezvous<?php }else{ ?><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['d']->value['type']);?>
<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=='conference'){?>Rendezvous<?php }else{ ?><?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['d']->value['type']);?>
<?php }?>" />
						
							<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_expand.png" title="Expand" alt="Expand" id="expand_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" onclick="workgroupToggleDeadline(<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
)" style="cursor: pointer;"/>
							<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/arrow_reduce.png" title="Reduce" alt="Reduce" id="reduce_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" onclick="workgroupToggleDeadline(<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
)" style="display: none;cursor: pointer;"/>
		
							<a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['link'];?>
"><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</a>
							
							<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
								<?php if ($_smarty_tpl->tpl_vars['d']->value['type']=="custom"){?>
								<a href="?Admin/Workgroup/deadline/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this deadline" title="Edit this deadline"/></a>
								<a href="#deleteEvent<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this deadline" title="Delete this deadline"/></a>
								<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="file"){?>
								<a href="?Admin/Workgroup/file/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this file" title="Edit this file"/></a>
								<a href="#deleteEvent<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this file" title="Delete this file"/></a>
								<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="questionnaire"){?>
								<a href="?Admin/Workgroup/questionnaire/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this questionnaire" title="Edit this questionnaire"/></a>
								<a href="#deleteEvent<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this questionnaire" title="Delete this questionnaire"/></a>
								<?php }elseif($_smarty_tpl->tpl_vars['d']->value['type']=="conference"){?>
								<a href="?Admin/Workgroup/conference/edit/<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this rendezvous" title="Edit this rendezvous"/></a>
								<a href="#deleteEvent<?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?>
<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this rendezvous" title="Delete this rendezvous"/></a>
								<?php }?>
								
								<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['d']->value['type']=="custom"){?><?php echo "deadline";?><?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['d']->value['type'];?><?php }?><?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete this event?",'handler_yes'=>"?Request/Workgroup/".$_tmp1."/delete/".($_smarty_tpl->tpl_vars['d']->value['id'])."/fromworkgroup",'id'=>"deleteEvent".($_smarty_tpl->tpl_vars['d']->value['type']).($_smarty_tpl->tpl_vars['d']->value['id'])),$_smarty_tpl);?>

							<?php }?>
							
						</p>
							
						<div id="description_deadline_<?php echo $_smarty_tpl->tpl_vars['d']->value['id'];?>
" style="display: none" class="deadline_description">
							<?php echo mb_substr($_smarty_tpl->tpl_vars['d']->value['description'],0,100,"utf-8");?>
...<br />
							<a href="<?php echo $_smarty_tpl->tpl_vars['d']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/bullet_go.png" title="More info" alt="More info" /> More details</a>
						</div>
						
					<?php }} ?>
					
			<?php }else{ ?>
				<p><em>No deadline specified.</em></p>
			<?php }?>
		
		</div>
		<div class="clearfix"></div>
		<?php }?>
	</div>

	<?php if (!$_smarty_tpl->getVariable('isGuest')->value){?>
	<div class="colright">
		
			<h2><a href="?Workgroup/chatroom/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Workgroup Chat</a> <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_home_chatroom'),$_smarty_tpl);?>
</h2>
			
			<?php if ($_smarty_tpl->getVariable('chatroom_onlinemembers')->value==0){?>
			<p><em>All chat rooms are empty.</em></p>
			<?php }else{ ?>
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_chatroom')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<?php if (count($_smarty_tpl->tpl_vars['c']->value['online_members'])>0){?>
						<a href="?Workgroup/chatroom/view/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</a> (<?php echo count($_smarty_tpl->tpl_vars['c']->value['online_members']);?>
)<br />
					<?php }?>
				<?php }} ?>
			<?php }?>
			
			<h2><a href="?Workgroup/forum/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Forum</a> <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_home_forum'),$_smarty_tpl);?>
</h2>
			<?php if (count($_smarty_tpl->getVariable('last_posts')->value)>0){?>
				<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('last_posts')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value){
?>
					<p>
						<a href="?Workgroup/topic/view/<?php echo $_smarty_tpl->tpl_vars['p']->value['id_type'];?>
#comment<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['lastname'];?>
 in <?php echo $_smarty_tpl->tpl_vars['p']->value['title'];?>
</a>
					</p>
				<?php }} ?>
			<?php }else{ ?>
				<p><em>No topic.</em></p>
			<?php }?>
	</div>
	<?php }?>

	<div class="colleft">
		<h2><?php if (!$_smarty_tpl->getVariable('isGuest')->value){?><a href="?Workgroup/file/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">File(s)</a> and <a href="?Workgroup/questionnaire/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">questionnaire(s)</a><?php }else{ ?><a href="?Workgroup/questionnaire/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
">Questionnaire(s)</a><?php }?> <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_home_list'),$_smarty_tpl);?>

		
		<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->getVariable('isModerator')->value){?>
			<a href="?Admin/Workgroup/file/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_add.png" title="New file" alt="New file" /></a>
			<a href="?Admin/Workgroup/file/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_wrench.png" title="File management" alt="File management" /></a>
			
			<a href="?Admin/Workgroup/questionnaire/add/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/report_add.png" title="New questionnaire" alt="New questionnaire" /></a>
			<a href="?Admin/Workgroup/questionnaire/list/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/report_wrench.png" title="Questionnaire managemetn" alt="Questionnaire management" /></a>
		<?php }?>
		</h2>
		
		
		
		<?php if (!$_smarty_tpl->getVariable('isGuest')->value){?>
			<div id="div_nav">
				<div class="nav_left" id="nav_type">
					<span onclick="workgroupNavClick('type', 'all')" 			id="nav_type_all" class="selected">All</span> - 
					<span onclick="workgroupNavClick('type', 'file')" 			id="nav_type_file">Files</span> - 
					<span onclick="workgroupNavClick('type', 'questionnaire')" 	id="nav_type_questionnaire">Questionnaires</span>
				</div>
				<div class="nav_right" id="nav_completion">
					<span onclick="workgroupNavClick('completion', 'all')" 			id="nav_completion_all" class="selected">All</span> -
					<span onclick="workgroupNavClick('completion', 'completed')" 	id="nav_completion_completed">Completed</span> - 
					<span onclick="workgroupNavClick('completion', 'uncompleted')"	id="nav_completion_uncompleted">Not completed</span>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php }?>
			
		<div class="items" id="items">
		<?php if (count($_smarty_tpl->getVariable('array_item')->value)>0){?>
			<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_item')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
?>
			<?php if (!$_smarty_tpl->getVariable('isGuest')->value||($_smarty_tpl->getVariable('isGuest')->value&&$_smarty_tpl->tpl_vars['i']->value['type']=="questionnaire")){?>
				<div class="item <?php echo $_smarty_tpl->tpl_vars['i']->value['type'];?>
 <?php if ($_smarty_tpl->tpl_vars['i']->value['isCompleted']){?>completed<?php }else{ ?>uncompleted<?php }?>">
					<div class="picture">
						<?php if ($_smarty_tpl->tpl_vars['i']->value['type']=="file"){?>
							<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/logo_file.png" title="File to complete" alt="File to complete" />
						<?php }else{ ?>
							<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/logo_questionnaire.png" title="Questionnaire to fill in" alt="Questionnaire to fill in" />
						<?php }?>
					</div>
					<div class="content">
						<p>
							<a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['link'];?>
" class="name"><?php echo $_smarty_tpl->tpl_vars['i']->value['name'];?>
</a> <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['i']->value['timestamp'],$_smarty_tpl->getVariable('DATE_FORMAT')->value);?>

						
							<?php if ($_smarty_tpl->getVariable('isModerator')->value){?>
								<?php if ($_smarty_tpl->tpl_vars['i']->value['type']=="file"){?>
								<a href="?Admin/Workgroup/file/edit/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this file" /></a>
								<a href="?Admin/Workgroup/file/delete/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this file" /></a>
								<?php }elseif($_smarty_tpl->tpl_vars['i']->value['type']=="questionnaire"){?>
								<a href="?Admin/Workgroup/questionnaire/edit/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" alt="Edit this questionnaire" /></a>
								<a href="?Admin/Workgroup/questionnaire/delete/<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Delete this questionnaire" /></a>
								<?php }?>
							<?php }?>
						<br />
						<?php echo $_smarty_tpl->tpl_vars['i']->value['description'];?>

						</p>
						
						<p>
							<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/<?php if ($_smarty_tpl->tpl_vars['i']->value['isCompleted']){?>tick<?php }else{ ?>cross<?php }?>.png" title="<?php if ($_smarty_tpl->tpl_vars['i']->value['isCompleted']){?>Already completed<?php }else{ ?>Not completed yet<?php }?>" alt="<?php if ($_smarty_tpl->tpl_vars['i']->value['isCompleted']){?>Already completed<?php }else{ ?>Not completed yet<?php }?>" />
							<a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['link'];?>
#comments"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/comment.png" title="Comments" alt="Comments" /></a>
							
							<?php if ($_smarty_tpl->tpl_vars['i']->value['type']=="file"){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['link_download'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_go.png" title="Download this file" alt="Download this file" /></a>
							
							<?php if ($_smarty_tpl->tpl_vars['i']->value['isCompleted']){?>
							<a href="<?php echo $_smarty_tpl->tpl_vars['i']->value['link_download_mine'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_go_blue.png" title="Download my last version" alt="Download my last version" /></a>
							<?php }?>
							
							<a href="#uploadWindow" class="leanModal_button" onclick="$('#uploadwindow_id_file').val(<?php echo $_smarty_tpl->tpl_vars['i']->value['id'];?>
)"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_goback.png" title="Upload a new version" alt="Upload a new version" /></a>
								
							<?php }?>
						</p>
					</div>
					<div class="clearfix"></div>
				</div>
			<?php }?>
			<?php }} ?>
		<?php }else{ ?>
		<p><em>There is no file nor questionnaire.</em></p>
		<?php }?>
		</div>
	</div>

	<div class="clearfix"></div>
</div>

<?php echo smarty_function_html_leanmodal(array('title'=>"File Upload",'id'=>"uploadWindow",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/workgroup_file_uploadwindow.html",'id_file'=>"-1"),$_smarty_tpl);?>
