<?php /* Smarty version Smarty-3.0.7, created on 2012-02-01 21:56:11
         compiled from "plugin/filemanager/html/widget_list.html" */ ?>
<?php /*%%SmartyHeaderCode:313834f29a6eb6da968-54318847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99b8b8ba291d724f0448988cedd12e04b1556a57' => 
    array (
      0 => 'plugin/filemanager/html/widget_list.html',
      1 => 1324043333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '313834f29a6eb6da968-54318847',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><?php if (count($_smarty_tpl->getVariable('array_file')->value)>0){?>
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_file')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
	<p>
		<a href="?Admin/Filemanager/edit/<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
/<?php echo $_smarty_tpl->getVariable('back')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this file" alt="Edit this file" /></a>
		<a href="#filemanager_delete_<?php echo $_smarty_tpl->getVariable('uid')->value;?>
" class="leanModal_button" onclick="$('#id_file_delete').val('<?php echo $_smarty_tpl->tpl_vars['f']->value['id'];?>
')"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this file" alt="Delete this file" /></a>
	
		<a href="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
filemanager/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['name'];?>
</a>
	</p>
	<p><?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->tpl_vars['f']->value['description']),$_smarty_tpl);?>
</p>
	
	<?php }} ?>
<?php }else{ ?>
	<p><em>No file uploaded.</em></p>
<?php }?>
<p>
	<a href="#filemanager_<?php echo $_smarty_tpl->getVariable('uid')->value;?>
" class="button_link leanModal_button">Add a file</a>
</p>

<?php echo smarty_function_html_leanmodal(array('title'=>"File Delete",'id'=>"filemanager_delete_".($_smarty_tpl->getVariable('uid')->value),'back'=>($_smarty_tpl->getVariable('back')->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."filemanager/html/widget_add_window_delete.html"),$_smarty_tpl);?>


<?php echo smarty_function_html_leanmodal(array('title'=>"File Upload",'id'=>"filemanager_".($_smarty_tpl->getVariable('uid')->value),'uid'=>($_smarty_tpl->getVariable('uid')->value),'type'=>($_smarty_tpl->getVariable('type')->value),'back'=>($_smarty_tpl->getVariable('back')->value),'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."filemanager/html/widget_add_window.html"),$_smarty_tpl);?>
