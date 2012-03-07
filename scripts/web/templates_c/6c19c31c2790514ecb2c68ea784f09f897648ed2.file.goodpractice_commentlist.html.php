<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 21:13:25
         compiled from "plugin/goodpractice/html/goodpractice_commentlist.html" */ ?>
<?php /*%%SmartyHeaderCode:157464f43fae5742304-61448862%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c19c31c2790514ecb2c68ea784f09f897648ed2' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_commentlist.html',
      1 => 1329855187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157464f43fae5742304-61448862',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><h2>Comments</h2>
<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_comment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
	<p>
		<a href="#viewComment<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/comment.png" title="View comment" alt="View comment" /></a>
		<a href="?Deletecomment/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
/<?php echo $_smarty_tpl->getVariable('back_complete')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this comment" alt="Delete this comment" /></a>
		<a href="?Member/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['lastname'];?>
</a>
		(<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['c']->value['timestamp_add'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
)
	</p>
	<div id="comment_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" style="display: none;">
		<?php echo nl2br($_smarty_tpl->tpl_vars['c']->value['message']);?>

	</div>
	
	<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['c']->value['title']!=''){?><?php echo "- ";?><?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?><?php }?><?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('content'=>nl2br($_smarty_tpl->tpl_vars['c']->value['message']),'title'=>"Comment by ".($_smarty_tpl->tpl_vars['c']->value['firstname'])." ".($_smarty_tpl->tpl_vars['c']->value['lastname'])." ".$_tmp1,'id'=>"viewComment".($_smarty_tpl->tpl_vars['c']->value['id'])),$_smarty_tpl);?>

<?php }} ?>

