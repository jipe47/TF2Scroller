<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 15:47:47
         compiled from "tpl/common/html/leanmodal/confirm.html" */ ?>
<?php /*%%SmartyHeaderCode:188984f280d2317b1e8-81530096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9abdbdb00e54e1dd44c43977353d507a7514b00' => 
    array (
      0 => 'tpl/common/html/leanmodal/confirm.html',
      1 => 1328024865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188984f280d2317b1e8-81530096',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php echo $_smarty_tpl->getVariable('confirm_message')->value;?>


<div class="leanModal_confirm_buttons">
<p>
	<a <?php if ($_smarty_tpl->getVariable('handler_yes')->value!=''){?>href="<?php echo $_smarty_tpl->getVariable('handler_yes')->value;?>
"<?php }?> class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');">Yes</a>
	<a <?php if ($_smarty_tpl->getVariable('handler_no')->value!=''){?>href="<?php echo $_smarty_tpl->getVariable('handler_no')->value;?>
"<?php }?> class="button_link_big" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
');">No</a>
</p>
</div>

<div class="clearfix"></div>