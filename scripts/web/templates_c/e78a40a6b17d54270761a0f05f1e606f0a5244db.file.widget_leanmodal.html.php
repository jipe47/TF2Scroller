<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 15:24:11
         compiled from "plugin/help/html/widget_leanmodal.html" */ ?>
<?php /*%%SmartyHeaderCode:190604f2d3f8b01c1d2-40624737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e78a40a6b17d54270761a0f05f1e606f0a5244db' => 
    array (
      0 => 'plugin/help/html/widget_leanmodal.html',
      1 => 1328365438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190604f2d3f8b01c1d2-40624737',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_function_message')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.message.php';
?><?php if ($_smarty_tpl->getVariable('info')->value!=''){?>
<!-- <h3><?php echo $_smarty_tpl->getVariable('info')->value['title'];?>
</h3> -->

<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('info')->value['content']),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('isAdmin')->value){?>
<p>
	<a href="?Admin/Help/edit/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" target="_BLANK">Edit this help page</a>
</p>
<?php }?>
<?php }else{ ?>
	<?php echo smarty_function_message(array('type'=>'error','text'=>"This help page does not exist."),$_smarty_tpl);?>

	
	<?php if ($_smarty_tpl->getVariable('isAdmin')->value){?>
	<p>
		<a href="?Admin/Help/add/<?php echo $_smarty_tpl->getVariable('code')->value;?>
" class="button_link" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" target="_BLANK">Make a help page</a>
	</p>
	<?php }?>
<?php }?>