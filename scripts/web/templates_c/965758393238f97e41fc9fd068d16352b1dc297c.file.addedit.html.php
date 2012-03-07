<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 17:26:50
         compiled from "plugin/help/html/admin/addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:131114f2eadcad9c674-37331609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '965758393238f97e41fc9fd068d16352b1dc297c' => 
    array (
      0 => 'plugin/help/html/admin/addedit.html',
      1 => 1328394952,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131114f2eadcad9c674-37331609',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><h3><?php if ($_smarty_tpl->getVariable('id')->value==-1){?>New<?php }else{ ?>Edit<?php }?> Help Page</h3>

<form method="post" action="?Request/Help/addedit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	<table class="tab_form">
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Code:</td>
			<td><input type="text" name="code" value="<?php echo $_smarty_tpl->getVariable('code')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Content:</td>
			<td><?php ob_start();?><?php echo $_smarty_tpl->getVariable('content')->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_col'=>70,'textarea_row'=>8,'textarea_name'=>'content','textarea_value'=>$_tmp1,'enable_toolbar'=>1,'enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>
</td>
		</tr>
	</table>
	
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link" />
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>