<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:18:37
         compiled from "plugin/goodpractice/html/goodpractice_search.html" */ ?>
<?php /*%%SmartyHeaderCode:319344f43ee0d6fcb79-12128381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a9f6729bf125d4ac64f1481582946d91bc23a509' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_search.html',
      1 => 1329085321,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319344f43ee0d6fcb79-12128381',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="goodpractice_search">
	<h1>Good Practice Search</h1>
	
	<form method="post" action="?Goodpractice/search" id="search_form">
		
		<div id="input">
			<p>Search <input type="text" name="search" value="<?php echo $_smarty_tpl->getVariable('search')->value;?>
" size="50"/> in 	<select name="where">
																								<option value="both">title and content</option>
																								<option value="title"<?php if ($_smarty_tpl->getVariable('where')->value=="title"){?> selected="selected"<?php }?>>title</option>
																								<option value="content"<?php if ($_smarty_tpl->getVariable('where')->value=="content"){?> selected="selected"<?php }?>>content</option>
																							</select>
				<input type="submit" name="submit" value="Search" class="button_link" /></p>	
		</div>
		
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
" <?php if (in_array($_smarty_tpl->tpl_vars['t']->value['id'],$_smarty_tpl->getVariable('array_type_selected')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
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
" <?php if (in_array($_smarty_tpl->tpl_vars['o']->value['id'],$_smarty_tpl->getVariable('array_org_selected')->value)){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
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
"<?php if (in_array($_smarty_tpl->tpl_vars['c']->value['country'],$_smarty_tpl->getVariable('array_country_selected')->value)){?> selected="selected"<?php }?>><?php echo Country::getName($_smarty_tpl->tpl_vars['c']->value['country']);?>
</option>
						<?php }} ?>
					</select>
				</td>
			</tr>
		</table>
	</form>
	
	<?php if ($_smarty_tpl->getVariable('searching')->value){?>
		<h3>Results (<?php echo count($_smarty_tpl->getVariable('array_result')->value);?>
)</h4>
		<?php if (count($_smarty_tpl->getVariable('array_result')->value)>0){?>
		
		<div id="goodpractices">
		<?php  $_smarty_tpl->tpl_vars['g'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_result')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
		</div>
		
		<?php }else{ ?>
			<p><em>No good practice found.</em></p>
		<?php }?>
	<?php }?>
</div>