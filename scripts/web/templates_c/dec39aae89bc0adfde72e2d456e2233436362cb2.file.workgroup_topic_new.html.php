<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 12:51:13
         compiled from "plugin/workgroup/html/workgroup_topic_new.html" */ ?>
<?php /*%%SmartyHeaderCode:82044f33b3319a17e7-21254430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dec39aae89bc0adfde72e2d456e2233436362cb2' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_topic_new.html',
      1 => 1328782493,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82044f33b3319a17e7-21254430',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><form method="post" action="?Request/Workgroup/addedittopic">
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	<input type="hidden" name="id_topic" value="<?php echo $_smarty_tpl->getVariable('id_topic')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Message:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','enable_preview'=>0,'textarea_name'=>'message','textarea_value'=>$_smarty_tpl->getVariable('message')->value,'enable_formtag'=>0),$_smarty_tpl);?>
</td>
		</tr>
	</table>
	<p><input type="submit" value="Add new topic" class="button_link_big" /></p>
</form>