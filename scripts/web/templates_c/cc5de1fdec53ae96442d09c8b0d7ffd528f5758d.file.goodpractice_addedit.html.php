<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:52:33
         compiled from "plugin/goodpractice/html/admin/goodpractice_addedit.html" */ ?>
<?php /*%%SmartyHeaderCode:217084f43f601174493-54862869%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc5de1fdec53ae96442d09c8b0d7ffd528f5758d' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_addedit.html',
      1 => 1329853948,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '217084f43f601174493-54862869',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_country')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_country.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/Goodpractice/addedit">

	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('id')->value;?>
" />
	
	<table class="tab_form">
	
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" value="<?php echo $_smarty_tpl->getVariable('name')->value;?>
" /></td>
		</tr>
		<tr>
			<td>Theme:</td>
			<td>
				<select name="id_type">
				<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['t']->value['id']==$_smarty_tpl->getVariable('id_type')->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</option>
				<?php }} ?>
				</select>
				<a href="?Admin/Goodpractice/listtype"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/manage.png" title="Manage types" alt="Manage types" /></a>
			</td>
		</tr>
		<tr>
			<td>Organisation:</td>
			<td>
				<select name="id_organisation">
					<?php  $_smarty_tpl->tpl_vars['o'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_organisation')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['o']->key => $_smarty_tpl->tpl_vars['o']->value){
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['o']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['o']->value['id']==$_smarty_tpl->getVariable('id_organisation')->value){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['o']->value['name'];?>
</option>
					<?php }} ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Country</td>
			<td>
				<?php echo smarty_function_html_select_country(array('format'=>'select','value'=>$_smarty_tpl->getVariable('country')->value),$_smarty_tpl);?>

			</td>
		</tr>
		<tr>
			<td>Short description:</td>
			<td>	
				<?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','textarea_value'=>$_smarty_tpl->getVariable('description')->value,'enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>

			</td>
		</tr>
		<tr>
			<td>Content:</td>
			<td>
				<?php echo smarty_function_plugin(array('p'=>'bbcode','enable_toolbar'=>1,'textarea_name'=>'content','textarea_value'=>$_smarty_tpl->getVariable('content')->value,'enable_formtag'=>0,'enable_preview'=>0,'textarea_col'=>100,'textarea_row'=>30),$_smarty_tpl);?>

			</td>
		</tr>
		
	
	</table>
		
	<p>
		<input type="submit" value="<?php echo $_smarty_tpl->getVariable('submit')->value;?>
" class="button_link_big" />
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>