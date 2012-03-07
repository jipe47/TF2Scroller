<?php /* Smarty version Smarty-3.0.7, created on 2012-02-12 02:02:25
         compiled from "plugin/workgroup/html/workgroup_forum.html" */ ?>
<?php /*%%SmartyHeaderCode:250224f370fa1ec4e45-78828614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b9fcb91a96f9726119e4a401b206ffed589873c' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_forum.html',
      1 => 1329002860,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '250224f370fa1ec4e45-78828614',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><h1>Forum <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_forum'),$_smarty_tpl);?>
</h1>
<table class="tab_admin">
	<tr>
		<th>Title</th>
		<th>Messages</th>
		<th>Last Post</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_topic')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
	<tr class="topic">
		<td>
			<p>
				<a href="?Workgroup/topic/view/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" class="title"><?php echo $_smarty_tpl->tpl_vars['t']->value['title'];?>
</a>
								
				<?php if ($_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('isAdmin')->value){?>
					<a href="?Editcomment/<?php echo $_smarty_tpl->tpl_vars['t']->value['id_firstcomment'];?>
/Workgroup/forum/<?php echo $_smarty_tpl->tpl_vars['t']->value['id_workgroup'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this topic" alt="Edit this topic" /></a>
					<a href="#deleteTopic<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this topic" alt="Delete this topic" /></a>
				<?php }?>
				
				<br />
				<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['t']->value['author_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['author_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['t']->value['author_lastname'];?>
</a> - <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value['timestamp_first'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>

			</p>
		</td>
		<td><?php echo $_smarty_tpl->tpl_vars['t']->value['messages'];?>
</td>
		<td>
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['t']->value['timestamp_last'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
<br />
			<a href="?Workgroup/topic/view/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
/last"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/bullet_go.png" title="See last post" alt="See last post" /></a>
			<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['t']->value['author_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['last_firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['t']->value['last_lastname'];?>
</a>
		</td>
		
	</tr>
	<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteTopic".($_smarty_tpl->tpl_vars['t']->value['id']),'message'=>"Are you sure you want to delete the topic <strong>".($_smarty_tpl->tpl_vars['t']->value['title'])."</strong>?",'handler_yes'=>"?Request/Workgroup/deletetopic/".($_smarty_tpl->getVariable('workgroup')->value['id'])."/".($_smarty_tpl->tpl_vars['t']->value['id'])),$_smarty_tpl);?>

	<?php }} ?>
</table>

<p>
	<a href="?Workgroup/topic/new/<?php echo $_smarty_tpl->getVariable('workgroup')->value['id'];?>
" class="button_link_big">New topic</a>
</p>