<?php /* Smarty version Smarty-3.0.7, created on 2012-02-03 16:41:18
         compiled from "plugin/help/html/admin/list.html" */ ?>
<?php /*%%SmartyHeaderCode:11854f2c001eee68b1-07306312%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '756c5ed413f41ca0b628f68c25007beb6bf16bf2' => 
    array (
      0 => 'plugin/help/html/admin/list.html',
      1 => 1328283674,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11854f2c001eee68b1-07306312',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><h1>Help Pages Management</h1>

<table class="tab_admin">
	<tr>
		<th>Code</th>
		<th>Title</th>
		<th>Actions</th>
	</tr>
	
	<?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_help')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
?>
	<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['h']->value['code'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['h']->value['title'];?>
</td>
		<td>
			<a href="?Admin/Help/edit/<?php echo $_smarty_tpl->tpl_vars['h']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this page" alt="Edit this page" /></a>
			<a href="#delete<?php echo $_smarty_tpl->tpl_vars['h']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this page" alt="Delete this page" /></a>
			
			
			
			<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"delete".($_smarty_tpl->tpl_vars['h']->value['id']),'handler_yes'=>"?Request/Help/delete/".($_smarty_tpl->tpl_vars['h']->value['id']),'message'=>"Are you sure you want to delete the page <strong>".($_smarty_tpl->tpl_vars['h']->value['title'])."</strong>?"),$_smarty_tpl);?>

			
			<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['h']->value['code'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_plugin(array('p'=>'Help','code'=>$_tmp1),$_smarty_tpl);?>

			
			<a href="#code<?php echo $_smarty_tpl->tpl_vars['h']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/link.png" title="Get code" alt="Get code"/></a>
			
			<?php ob_start();?>{<?php $_tmp2=ob_get_clean();?><?php ob_start();?>}<?php $_tmp3=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>"Code Exportation",'id'=>"code".($_smarty_tpl->tpl_vars['h']->value['id']),'content'=>"<p align='center'><input type='text' size='50' value='".$_tmp2."plugin p=Help code=".($_smarty_tpl->tpl_vars['h']->value['code']).$_tmp3."' /></p>"),$_smarty_tpl);?>

		</td>
	</tr>
	<?php }} ?>
</table>

<p>
	<a href="?Admin/Help/add" class="button_link_big">New Help Page</a>
</p>