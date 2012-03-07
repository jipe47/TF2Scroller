<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 18:58:09
         compiled from "plugin/workgroup/html/admin/workgroup_addeditchatroom.html" */ ?>
<?php /*%%SmartyHeaderCode:253064f2ec331ef54b3-57216152%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f45fd04f2e0f4bdf16e5250af6997ddb89b2a19d' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_addeditchatroom.html',
      1 => 1328464580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253064f2ec331ef54b3-57216152',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><form method="post" action="?Request/Workgroup/addeditchatroom" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	<input type="hidden" name="fromworkgroup" value="<?php echo $_smarty_tpl->getVariable('fromworkgroup')->value;?>
" />
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
"/></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_preview'=>0,'enable_formtag'=>0),$_smarty_tpl);?>
</td>
		</tr>
	</table>
	<p>	
		<input type="submit" class="button_link_big" value="<?php echo $_smarty_tpl->getVariable('input')->value;?>
" />
	</p>
</form>