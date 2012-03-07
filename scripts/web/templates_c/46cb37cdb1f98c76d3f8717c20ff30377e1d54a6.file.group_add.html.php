<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 16:02:58
         compiled from "plugin/user/html/group_add.html" */ ?>
<?php /*%%SmartyHeaderCode:171434f33e022313921-18068530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '46cb37cdb1f98c76d3f8717c20ff30377e1d54a6' => 
    array (
      0 => 'plugin/user/html/group_add.html',
      1 => 1328395055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171434f33e022313921-18068530',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><form method="post" action="?Request/User/groupadd" enctype="multipart/form-data">
	<p>
	
	
	<table class="tab_form">
		<tr>
			<td>Name:</td>
			<td><input type="text" name="name" /></td>
		</tr>
		<tr>
			<td>Description:</td>
			<td><?php echo smarty_function_plugin(array('p'=>'bbcode','textarea_name'=>'description','enable_formtag'=>0,'enable_preview'=>0),$_smarty_tpl);?>
</td>
		</tr>
		<tr>
			<td>Rights:</td>
			<td>
			<?php if (count($_smarty_tpl->getVariable('array_right')->value)>0){?>
			<ul>
			<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_right')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
				<li>
					<input type="checkbox" name="rights[]" value="<?php echo $_smarty_tpl->tpl_vars['r']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['r']->value;?>
" /> <label for="<?php echo $_smarty_tpl->tpl_vars['r']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['r']->value;?>
</label>
				</li>
			<?php }} ?>
			</ul>
			<?php }else{ ?>
				No right defined.
			<?php }?>
			</td>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
	
	
	<p>
		<input type="submit" value="Add" class="button_link"/>
		<?php echo smarty_function_backButton(array(),$_smarty_tpl);?>

	</p>
</form>
