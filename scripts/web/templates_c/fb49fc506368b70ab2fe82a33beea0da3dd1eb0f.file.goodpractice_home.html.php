<?php /* Smarty version Smarty-3.0.7, created on 2012-02-15 00:38:44
         compiled from "plugin/goodpractice/html/goodpractice_home.html" */ ?>
<?php /*%%SmartyHeaderCode:8904f3af0845ca6b8-88051863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb49fc506368b70ab2fe82a33beea0da3dd1eb0f' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_home.html',
      1 => 1329085321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8904f3af0845ca6b8-88051863',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="goodpractice_type">
	<h1>Good Practices</h3>

	<div id="nav">
		<h3>Navigation</h3>
		<h4>By Themes</h4>
		<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
		<p class="theme"><a href="?Goodpractice/navigation/theme/<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
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
		<p class="theme"><a href="?Goodpractice/navigation/organisation/<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
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
		<p class="theme"><a href="?Goodpractice/navigation/country/<?php echo $_smarty_tpl->tpl_vars['c']->value['country'];?>
"><?php echo Country::getName($_smarty_tpl->tpl_vars['c']->value['country']);?>
 (<?php echo $_smarty_tpl->tpl_vars['c']->value['nbrGp'];?>
)</a></p>
		<?php }} ?>
	</div>
	
	<div id="goodpractices">
		<div class="goodpractice">
			<h3>Search</h3>
			<form method="post" action="?Goodpractice/search">
				<input type="hidden" name="searching" value="on" />
				<p>
					Search: <input type="text" name="search" size="30"/>
					in 	<select name="where">
							<option value="title">title</option>
							<option value="content">content</option>
							<option value="both">title and content</option>
						</select>
				</p>
				
				
				<table class="tab_form">
					<tr>
						<td>Theme(s): </td>
						<td>
							<select name="themes[]" multiple>
								<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</option>
								<?php }} ?>
							</select>
						</td>
						<td>Organisation(s): </td>
						<td>
							<select name="organisations[]" multiple>
								<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_org')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</option>
								<?php }} ?>
							</select>
						</td>
						<td>Country(ies): </td>
						<td>
							<select name="countries[]" multiple>
								<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_country')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['c']->value['country'];?>
"><?php echo Country::getName($_smarty_tpl->tpl_vars['c']->value['country']);?>
</option>
								<?php }} ?>
							</select>
						</td>
					</tr>
				</table>
				<p>
					
					
					
				</p>
				
				
				
				
				<p>
					<input type="submit" name="submit" value="Search" class="button_link_big"/>
				</p>
			</form>
		</div>
	</div>
	
	<div class="clearfix"></div>
</div>