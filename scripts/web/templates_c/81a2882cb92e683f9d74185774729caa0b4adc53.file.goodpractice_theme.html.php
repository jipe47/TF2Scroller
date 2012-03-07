<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 15:34:14
         compiled from "plugin/goodpractice/html/goodpractice_theme.html" */ ?>
<?php /*%%SmartyHeaderCode:195434f33d96675e1b0-50479623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81a2882cb92e683f9d74185774729caa0b4adc53' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_theme.html',
      1 => 1327881108,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195434f33d96675e1b0-50479623',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="goodpractice_type">
	<h3><?php echo $_smarty_tpl->getVariable('type')->value['name'];?>
</h3>

	<div id="nav">
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
		<p class="theme"><a href="?Goodpractice/theme/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['t']->value['id']==$_smarty_tpl->getVariable('type')->value['id']){?>class="current"<?php }?>><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['t']->value['nbrGp'];?>
)</a></p>
		<?php }} ?>
	</div>
	<div id="goodpractices">
	<?php if (count($_smarty_tpl->getVariable('array_gp')->value)>0){?>
		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_gp')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['g']->key => $_smarty_tpl->tpl_vars['g']->value){
?>
			<div class="goodpractice">
				<p><a href="?Goodpractice/view/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</a></p>
				<?php echo substr($_smarty_tpl->tpl_vars['g']->value['description'],0,100);?>
...
			</div>
		<?php }} ?>
	<?php }else{ ?>
		<p><em>There is no good practice in this theme.</em></p>
	<?php }?>
	</div>
	
	<div class="clearfix"></div>
</div>