<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 23:18:40
         compiled from "plugin/announce/html/admin/announce_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:319934f2daec03e5b43-27974672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27357e4bfbb9267c37ee46492d937e0cfb240769' => 
    array (
      0 => 'plugin/announce/html/admin/announce_addedit.html',
      1 => 1328393917,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319934f2daec03e5b43-27974672',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><h3><?php if ($_smarty_tpl->getVariable('id')->value==-1){?>New<?php }else{ ?>Edit<?php }?> Announce</h3>
<form method="post" action="?Request/Announce/addedit">
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	
	<table class="tab_form">
		<tr>
			<td>Title:</td>
			<td><input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('title')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Link:</td>
			<td><input type="text" name="link" value="<?php echo $_smarty_tpl->getVariable('link')->value;?>
" /></td>
		</tr>
	</table>
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link"/>
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>