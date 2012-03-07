<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:21:46
         compiled from "plugin/goodpractice/html/goodpractice_navigation.html" */ ?>
<?php /*%%SmartyHeaderCode:32284f43eeca5fe4b6-92878513%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fffd8eb9ffd308042425d0f77569ce0336660fab' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_navigation.html',
      1 => 1329002862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32284f43eeca5fe4b6-92878513',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="goodpractice_type">
	<h1>Good Practices Navigation</h1>
	
	<div id="nav">
		<h3>Navigation</h3>
		<h4>By Themes</h4>
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
		<p class="theme"><a <?php if ($_smarty_tpl->tpl_vars['t']->value['id']==$_smarty_tpl->getVariable('id_type')->value&&$_smarty_tpl->getVariable('nav')->value=="theme"){?>class="current"<?php }?> href="?Goodpractice/navigation/theme/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['t']->value['nbrGp'];?>
)</a></p>
		<?php }} ?>
		
		<h4>By Organisation</h4>
		<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
		<p class="theme"><a <?php if ($_smarty_tpl->tpl_vars['o']->value['id']==$_smarty_tpl->getVariable('id_type')->value&&$_smarty_tpl->getVariable('nav')->value=="organisation"){?>class="current"<?php }?> href="?Goodpractice/navigation/organisation/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
 (<?php echo $_smarty_tpl->tpl_vars['o']->value['nbrGp'];?>
)</a></p>
		<?php }} ?>
		
		<h4>By Country</h4>
		<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_country')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
		<p class="theme"><a <?php if ($_smarty_tpl->tpl_vars['c']->value['country']==$_smarty_tpl->getVariable('id_type')->value&&$_smarty_tpl->getVariable('nav')->value=="country"){?>class="current"<?php }?> href="?Goodpractice/navigation/country/<?php echo $_smarty_tpl->tpl_vars['c']->value['country'];?>
"><?php echo Country::getName($_smarty_tpl->tpl_vars['c']->value['country']);?>
 (<?php echo $_smarty_tpl->tpl_vars['c']->value['nbrGp'];?>
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
			
				<div class="logo">
					<img src="<?php if ($_smarty_tpl->tpl_vars['g']->value['logo']!=''){?><?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
goodpractice/organisation/mini/<?php echo $_smarty_tpl->tpl_vars['g']->value['logo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
goodpractice/images/nologo.png<?php }?>" <?php if ($_smarty_tpl->tpl_vars['g']->value['id_organisation']!=''){?>title="Logo of <?php echo $_smarty_tpl->tpl_vars['g']->value['organisation_name'];?>
" alt="Logo of <?php echo $_smarty_tpl->tpl_vars['g']->value['organisation_name'];?>
"<?php }else{ ?> title="No logo" alt="No logo"<?php }?> />
				</div>
				
				<div class="info">
					<p>Title: <a href="?Goodpractice/view/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['g']->value['name'];?>
</a></p>
					<?php if ($_smarty_tpl->tpl_vars['g']->value['id_type']!=''){?>
					<p>Theme: <?php echo $_smarty_tpl->tpl_vars['g']->value['theme_name'];?>
</p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['g']->value['id_organisation']!=''){?>
					<p>Organisation: <?php echo $_smarty_tpl->tpl_vars['g']->value['organisation_name'];?>
</p>
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['g']->value['country']!=''){?>
					<p>Country: <?php echo Country::getName($_smarty_tpl->tpl_vars['g']->value['country']);?>
</p>
					<?php }?>
				</div>
				
				<div class="summary">
					<h4>Summary</h4>
					<p><?php echo $_smarty_tpl->tpl_vars['g']->value['description'];?>
</p>
				</div>
				
				<div class="clearfix"></div>
				
				<p><a href="?Goodpractice/view/<?php echo $_smarty_tpl->tpl_vars['g']->value['id'];?>
">Read more</a></p>
			</div>
		<?php }} ?>
	<?php }else{ ?>
		<p><em>There is no good practice in this theme.</em></p>
	<?php }?>
	</div>
	
	<div class="clearfix"></div>
</div>