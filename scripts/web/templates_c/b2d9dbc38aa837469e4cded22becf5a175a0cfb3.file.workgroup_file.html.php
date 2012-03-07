<?php /* Smarty version Smarty-3.0.7, created on 2012-02-12 01:55:20
         compiled from "plugin/workgroup/html/workgroup_file.html" */ ?>
<?php /*%%SmartyHeaderCode:179484f370df8121a95-39212908%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2d9dbc38aa837469e4cded22becf5a175a0cfb3' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_file.html',
      1 => 1329008115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179484f370df8121a95-39212908',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><div id="workgroup_file">
	<h1><?php echo $_smarty_tpl->getVariable('file')->value['name'];?>
 <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_file'),$_smarty_tpl);?>
</h1>
	<div id="info">
		<h2>Description</h2>
		<?php echo $_smarty_tpl->getVariable('file')->value['description'];?>

		
		<?php if ($_smarty_tpl->getVariable('file')->value['deadline']!=''){?>
			<p>This file is due to <strong><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('file')->value['deadline'],$_smarty_tpl->getVariable('DATE_FORMAT')->value);?>
</strong>.</p>
		<?php }?>
		
		<p>
			<a href="upload/workgroup/file/<?php echo $_smarty_tpl->getVariable('file')->value['filename'];?>
" class="button_link">Download this file</a>
			<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
			<a href="?Admin/Workgroup/listmod/<?php echo $_smarty_tpl->getVariable('file')->value['id'];?>
" class="button_link">See modifications</a>
			<br /><br />
			<a href="?Admin/Workgroup/editfile/<?php echo $_smarty_tpl->getVariable('file')->value['id'];?>
" class="button_link">Edit this file</a>
			<a href="?Admin/Workgroup/deletefile/<?php echo $_smarty_tpl->getVariable('file')->value['id'];?>
" class="button_link">Delete this file</a>
			<?php }?>
		</p>
	</div>
	
	<div id="mod">
		<h2>My modifications</h2>
		<?php if ($_smarty_tpl->getVariable('hasModified')->value){?>
			
			
			<h3>Modification(s)</h3>
			<table class="tab_admin">
				<tr>
					<th>Revision</th>
					<th>Comment</th>
					<th>Upload timestamp</th>
					<th>Action</th>
				</tr>
			<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_mod')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['m']->key;
?>
				<tr<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> class="headrevision"<?php }?>>
					<td>
						<?php echo count($_smarty_tpl->getVariable('array_mod')->value)-$_smarty_tpl->tpl_vars['k']->value;?>

					
						<?php if ($_smarty_tpl->tpl_vars['m']->value['timestamp_processed']!=''){?>
						<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" title="This modification has been processed by a moderator" alt="This modification has been processed by a moderator" />
						<?php }else{ ?>
						&nbsp;&nbsp;
						<?php }?>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['m']->value['comment'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['m']->value['timestamp_add'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
<?php if ($_smarty_tpl->tpl_vars['k']->value==0){?> (head revision)<?php }?></td>
					<td>
						<a href="#deleteMod<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this modification" alt="Delete this modification" /></a>
						<a href="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
workgroup/filemod/<?php echo $_smarty_tpl->tpl_vars['m']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
/images/icons/page_go.png" title="Download" alt="Download" /></a>
					</td>
				</tr>
				<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteMod".($_smarty_tpl->tpl_vars['m']->value['id']),'message'=>"Are you sure you want to delete this modification?",'handler_yes'=>"?Request/Workgroup/deletemodfile/".($_smarty_tpl->tpl_vars['m']->value['id'])),$_smarty_tpl);?>

			<?php }} ?>
			</table>
		<?php }else{ ?>
			<p><em>You have no modification uploaded.</em></p>
		<?php }?>
		
		<p><a href="#uploadWindow" class="button_link_big leanModal_button">Send a modification</a></p>
		
		<?php echo smarty_function_html_leanmodal(array('title'=>"Upload a modification",'id_file'=>($_smarty_tpl->getVariable('file')->value['id']),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/workgroup_file_uploadwindow.html",'id'=>"uploadWindow"),$_smarty_tpl);?>

	</div>
	
	<div class="clearfix"></div>
	<?php echo smarty_function_plugin(array('p'=>'Comments','type'=>'file','id_type'=>$_smarty_tpl->getVariable('file')->value['id'],'allow_comment'=>1,'title'=>"Comments"),$_smarty_tpl);?>

</div>