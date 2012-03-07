<?php /* Smarty version Smarty-3.0.7, created on 2012-01-30 23:43:47
         compiled from "tpl/common/html/message.html" */ ?>
<?php /*%%SmartyHeaderCode:91724f272b3366b559-64683844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03ab38218e2d26944cebc876b2b75cb17e595119' => 
    array (
      0 => 'tpl/common/html/message.html',
      1 => 1317675193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91724f272b3366b559-64683844',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="msg_<?php echo $_smarty_tpl->getVariable('type')->value;?>
">
	<?php echo $_smarty_tpl->getVariable('message')->value;?>

</div>