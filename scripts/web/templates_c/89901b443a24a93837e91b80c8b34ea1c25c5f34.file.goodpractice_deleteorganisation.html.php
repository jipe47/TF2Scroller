<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:58:57
         compiled from "plugin/goodpractice/html/admin/goodpractice_deleteorganisation.html" */ ?>
<?php /*%%SmartyHeaderCode:20804f43f7810e1f36-58224450%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '89901b443a24a93837e91b80c8b34ea1c25c5f34' => 
    array (
      0 => 'plugin/goodpractice/html/admin/goodpractice_deleteorganisation.html',
      1 => 1329853212,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20804f43f7810e1f36-58224450',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_backButton')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.backButton.php';
?><p>Are you sure you want to delete the organisation <strong><?php echo $_smarty_tpl->getVariable('type')->value['name'];?>
</strong>?</p>

<form method="post" action="?Request/Goodpractice/deleteorganisation">
	<input type="hidden" name="id_type" value="<?php echo $_smarty_tpl->getVariable('type')->value['id'];?>
" />
	<?php if (count($_smarty_tpl->getVariable('array_gp')->value)>0){?>
	<p>If yes, want would you like to do to associated good practices?</p>
	<ul>
		<li><input type="radio" name="action" value="delete" id="action_delete" /> <label for="action_delete">Delete them</label></li>
		<li><input type="radio" name="action" value="move" id="action_move" /> <label for="action_move">Move them to 
			<select name="id_move">
			<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_move')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
				<?php if ($_smarty_tpl->tpl_vars['t']->value['id']!=$_smarty_tpl->getVariable('type')->value['id']){?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</option>
				<?php }?>
			<?php }} ?>
			</select></label>
		</li>
	</ul>
	<?php }else{ ?>
		<input type="hidden" name="action" value="none" />
	<?php }?>
	
	<p>
		<input type="submit" value="Yes" class="button_link" />
		<?php echo smarty_function_backButton(array('text'=>"No"),$_smarty_tpl);?>

	</p>
</form>
