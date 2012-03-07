<?php /* Smarty version Smarty-3.0.7, created on 2012-01-30 23:43:23
         compiled from "tpl/default/html/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:269404f272b1b5fd6b4-84883288%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9252871f7b5357057abdd93723ef1a67ff1870a' => 
    array (
      0 => 'tpl/default/html/footer.html',
      1 => 1327762743,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '269404f272b1b5fd6b4-84883288',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><div id="footer">
	<div class="copyright">
		Copyright &copy; Transeo 2012<?php ob_start();?><?php echo smarty_modifier_date_format(time(),"%Y");?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1!=2012){?> - <?php echo smarty_modifier_date_format(time(),"%Y");?>
<?php }?> - All Rights Reserved
	</div>
</div>