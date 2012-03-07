<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 11:21:10
         compiled from "plugin/comments/html/delete_comment.html" */ ?>
<?php /*%%SmartyHeaderCode:89494f2e5816ef6561-69666582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74d86ce7740836cf11b1f052eda21deb52ef0aff' => 
    array (
      0 => 'plugin/comments/html/delete_comment.html',
      1 => 1317675160,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89494f2e5816ef6561-69666582',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_message')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.message.php';
?>
<div id="div_comment" class="sub_content">
	<?php if ($_smarty_tpl->getVariable('canDelete')->value){?>
		<form method="post" action="?Request/Comments/delete">
			<input type="hidden" name="back" id="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" />
			<input type="hidden" name="id_comment" id="id_comment" value="<?php echo $_smarty_tpl->getVariable('id_comment')->value;?>
" />
			
			<p>Are you sure you want to delete this comment ?</p>
			<p>
				<input type="submit" value="Yes" />
				<input type="button" value="No" onclick="history.go(-1);"/>
			</p>
		</form>
	<?php }else{ ?>
		<?php echo smarty_function_message(array('type'=>"error",'text'=>"You cannot delete this comment."),$_smarty_tpl);?>

	<?php }?>
</div>