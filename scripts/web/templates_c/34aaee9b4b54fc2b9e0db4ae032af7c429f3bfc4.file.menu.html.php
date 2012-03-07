<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:17:08
         compiled from "tpl/default/html/menu.html" */ ?>
<?php /*%%SmartyHeaderCode:71074f43edb4120191-16615591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34aaee9b4b54fc2b9e0db4ae032af7c429f3bfc4' => 
    array (
      0 => 'tpl/default/html/menu.html',
      1 => 1329851549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71074f43edb4120191-16615591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="menu">
	<ul class="dropdown">
		<li><a href="?Home">Home</a></li>
		<li><a href="?Account">My Account</a></li>
		<li>
			<a href="?Workgroup">Working groups</a>
			<?php if (count($_smarty_tpl->getVariable('array_workgroup_participant')->value)>0){?>
			<ul class="sub_menu">
				<?php  $_smarty_tpl->tpl_vars['w'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_workgroup_participant')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['w']->key => $_smarty_tpl->tpl_vars['w']->value){
?>
				<li><a href="?Workgroup/<?php echo $_smarty_tpl->tpl_vars['w']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['w']->value['name'];?>
</a></li>
				<?php }} ?>
			</ul>
			<?php }?>
		</li>
		<li><a href="?Goodpractice">Good practices</a></li>
		
		<?php if (user_hasRight("CONTACT_VIEW")){?>
		<li><a href="?Contact">Contact</a></li>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->getVariable('hasRight')->value){?>
		<li><a href="?AdminPanel">Admin</a></li>
		<?php }?>
	</ul>
		
	
	<div class="clearfix">
	</div>
</div>