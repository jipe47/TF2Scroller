<?php /* Smarty version Smarty-3.0.7, created on 2012-03-06 00:43:05
         compiled from "plugin/contact/html/admin/contact_listimport.html" */ ?>
<?php /*%%SmartyHeaderCode:198234f554f892e33a6-38968361%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb1b84362f5ee6ab19f05b097070871c418db1e7' => 
    array (
      0 => 'plugin/contact/html/admin/contact_listimport.html',
      1 => 1330132823,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198234f554f892e33a6-38968361',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><h3>Parse an Existing Import</h3>	
	
<table class="tab_admin tab_import">
	<tr>
		<th>Name</th>
		<th>Action</th>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['f'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_file')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['f']->key => $_smarty_tpl->tpl_vars['f']->value){
?>
	<tr>
		<td>
			<a href="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
contact/import/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
</a>
		</td>
		<td>
			<a href="?Request/Contact/import/delete/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this file" alt="Delete this file"/></a>
			<a href="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
contact/import/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_go_blue.png" title="Download" alt="Download"/></a>
			<a href="?Admin/Contact/import/0/<?php echo $_smarty_tpl->tpl_vars['f']->value['filename'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/bullet_go.png" title="Import data" alt="Import data"/></a>
		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="#importForm" class="leanModal_button button_link_big">Import file</a>
</p>

<?php echo smarty_function_html_leanmodal(array('id'=>"importForm",'title'=>"Import a File",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."contact/html/admin/contact_import_form.html"),$_smarty_tpl);?>
