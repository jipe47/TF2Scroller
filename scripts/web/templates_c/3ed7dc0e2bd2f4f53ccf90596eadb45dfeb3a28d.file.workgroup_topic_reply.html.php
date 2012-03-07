<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 23:07:10
         compiled from "plugin/workgroup/html/workgroup_topic_reply.html" */ ?>
<?php /*%%SmartyHeaderCode:210774f2c5a8e520d35-09281382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ed7dc0e2bd2f4f53ccf90596eadb45dfeb3a28d' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_topic_reply.html',
      1 => 1328306786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '210774f2c5a8e520d35-09281382',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><h1>Forum</h1>
<h3><?php echo $_smarty_tpl->getVariable('topic')->value['title'];?>
 - Reply</h3>
<form method="post" action="?Request/Workgroup/replytopic">
	<input type="hidden" name="id_topic" value="<?php echo $_smarty_tpl->getVariable('topic')->value['id'];?>
" />
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('topic')->value['id_workgroup'];?>
" />
	
	<p>Title: <input type="text" name="title" value="Re: <?php echo $_smarty_tpl->getVariable('topic')->value['title'];?>
" size="45" />
	<?php echo smarty_function_plugin(array('p'=>'bbcode','enable_formtag'=>0,'enable_preview'=>0,'textarea_name'=>"message",'comment_title'=>"Re: ".($_smarty_tpl->getVariable('topic')->value['title'])),$_smarty_tpl);?>

	
	<p><input type="submit" value="Send" class="button_link" /></p>
</form>