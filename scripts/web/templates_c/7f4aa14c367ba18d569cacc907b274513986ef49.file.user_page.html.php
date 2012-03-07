<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 21:55:44
         compiled from "plugin/user/html/user_page.html" */ ?>
<?php /*%%SmartyHeaderCode:194684f2d9b504c2e73-42412228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f4aa14c367ba18d569cacc907b274513986ef49' => 
    array (
      0 => 'plugin/user/html/user_page.html',
      1 => 1328387103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194684f2d9b504c2e73-42412228',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="user_page">
	<h1><?php echo $_smarty_tpl->getVariable('user')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['lastname'];?>
</h1>

	<div class="picture">
		<?php if ($_smarty_tpl->getVariable('user')->value['avatar']==''){?>
			<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/empty_avatar.png" />
		<?php }else{ ?>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->getVariable('user')->value['avatar'];?>
" />
		<?php }?>	
	</div>

	<div class="info">
	<?php if (!is_null($_smarty_tpl->getVariable('user')->value['contact'])){?>
		<?php echo $_smarty_tpl->getVariable('user')->value['contact']['street'];?>
, <?php echo $_smarty_tpl->getVariable('user')->value['contact']['number'];?>
<br />
		<?php echo $_smarty_tpl->getVariable('user')->value['contact']['postal'];?>
 <?php echo $_smarty_tpl->getVariable('user')->value['contact']['city'];?>
<br />
		<?php echo $_smarty_tpl->getVariable('user')->value['contact']['country'];?>
<br />
		<br />
		Tel: <?php echo $_smarty_tpl->getVariable('user')->value['contact']['phone'];?>
<br />
		Fax: <?php echo $_smarty_tpl->getVariable('user')->value['contact']['fax'];?>
<br />
		Mobile: <?php echo $_smarty_tpl->getVariable('user')->value['contact']['mobile'];?>
<br />
		<br />

		E-mail: <a href="mailto:<?php echo $_smarty_tpl->getVariable('user')->value['contact']['email'];?>
"><?php echo $_smarty_tpl->getVariable('user')->value['contact']['email'];?>
</a><br />
		Website: <a href="<?php echo $_smarty_tpl->getVariable('user')->value['contact']['website'];?>
"><?php echo $_smarty_tpl->getVariable('user')->value['contact']['website'];?>
</a><br />
	<?php }else{ ?>
		<p><em>No information is linked to that person.</em></p>
	<?php }?>
	</div>
	<div class="clearfix"></div>
	<p>Organisations:</p>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('user')->value['organisations']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
		<li><a href="?Organisation/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</a> - <?php echo $_smarty_tpl->tpl_vars['o']->value['job'];?>
</li>
	<?php }} ?>
	</ul>
</div>