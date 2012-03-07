<?php /* Smarty version Smarty-3.0.7, created on 2012-02-02 14:58:52
         compiled from "plugin/contact/html/contact_view.html" */ ?>
<?php /*%%SmartyHeaderCode:207534f2a969c26d103-31092822%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17ed3954e67a99fb27e5660b5843f3c21408e29a' => 
    array (
      0 => 'plugin/contact/html/contact_view.html',
      1 => 1328191130,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207534f2a969c26d103-31092822',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_countryName')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.countryName.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="contact_view">
	<h1>
		<?php echo $_smarty_tpl->getVariable('info')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('info')->value['lastname'];?>

		<a href="?Admin/Contact/edit/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this contact" alt="Edit this contact" /></a>
		<a href="?Admin/Contact/delete/<?php echo $_smarty_tpl->getVariable('info')->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this contact" alt="Delete this contact" /></a>			
	</h1>
	
	<table class="info">
		<tr>
			<td>
				<fieldset>
					<legend>Info</legend>
					<?php echo $_smarty_tpl->getVariable('info')->value['firstname'];?>
 <?php echo $_smarty_tpl->getVariable('info')->value['lastname'];?>
<?php if ($_smarty_tpl->getVariable('info')->value['job']!=''){?>, <?php echo $_smarty_tpl->getVariable('info')->value['job'];?>
<?php }?><br />
					Website: <a href="<?php echo $_smarty_tpl->getVariable('info')->value['website'];?>
"><?php echo $_smarty_tpl->getVariable('info')->value['website'];?>
</a><br />
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend>Address</legend>
					<?php if ($_smarty_tpl->getVariable('info')->value['street']!=''){?><?php echo $_smarty_tpl->getVariable('info')->value['street'];?>
<?php if ($_smarty_tpl->getVariable('info')->value['number']!=''){?>, <?php echo $_smarty_tpl->getVariable('info')->value['number'];?>
<?php }?><?php }?><br />
					<?php if ($_smarty_tpl->getVariable('info')->value['postal']!=''||$_smarty_tpl->getVariable('info')->value['city']!=''){?><?php echo $_smarty_tpl->getVariable('info')->value['postal'];?>
 <?php echo $_smarty_tpl->getVariable('info')->value['city'];?>
<br /><?php }?>
					<?php if ($_smarty_tpl->getVariable('info')->value['country']!=''){?><?php echo smarty_modifier_countryName($_smarty_tpl->getVariable('info')->value['country']);?>
<br /><?php }?>
				</fieldset>
			</td>
		</tr>
		<tr>
			<td>
				<fieldset>
					<legend>Contact</legend>
					Tel: <?php if ($_smarty_tpl->getVariable('info')->value['phone']!=''){?><?php echo $_smarty_tpl->getVariable('info')->value['phone'];?>
<?php }else{ ?>N/A<?php }?><br />
					Fax: <?php if ($_smarty_tpl->getVariable('info')->value['fax']!=''){?><?php echo $_smarty_tpl->getVariable('info')->value['fax'];?>
<?php }else{ ?>N/A<?php }?><br />
					Mobile: <?php if ($_smarty_tpl->getVariable('info')->value['mobile']!=''){?><?php echo $_smarty_tpl->getVariable('info')->value['mobile'];?>
<?php }else{ ?>N/A<?php }?><br />
					E-mail: <?php if ($_smarty_tpl->getVariable('info')->value['email']!=''){?><a href="mailto:<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
"><?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
</a><?php }else{ ?>N/A<?php }?><br />
					<?php if ($_smarty_tpl->getVariable('info')->value['email2']!=''){?>E-mail2: <a href="mailto:<?php echo $_smarty_tpl->getVariable('info')->value['email'];?>
"><?php echo $_smarty_tpl->getVariable('info')->value['email2'];?>
</a><br /><?php }?>
				</fieldset>
			</td>
			<td>
				<fieldset>
					<legend>Miscellaneous</legend>
					Source: <?php if ($_smarty_tpl->getVariable('info')->value['source_name']!=''){?><a href="?Contact/source/<?php echo $_smarty_tpl->getVariable('info')->value['id_source'];?>
"><?php echo $_smarty_tpl->getVariable('info')->value['source_name'];?>
</a><?php }else{ ?>N/A<?php }?><br />
					Contact type: <?php if ($_smarty_tpl->getVariable('info')->value['type_name']!=''){?><a href="?Contact/type/<?php echo $_smarty_tpl->getVariable('info')->value['id_type'];?>
"><?php echo $_smarty_tpl->getVariable('info')->value['type_name'];?>
</a><?php }else{ ?>N/A<?php }?><br />
				</fieldset>
			</td>
		</tr>
	</table>
	
	<h3>Criteria</h3>
	
	<ul>
	<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
		<li>	<?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
 
				<?php if (in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->getVariable('info')->value['criteria_set'])||($_smarty_tpl->tpl_vars['c']->value['default_value']==1&&!in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->getVariable('info')->value['criteria_unset']))){?><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" /><?php }?>
		</li>
	<?php }} ?>
	</ul>
	
	
	<h3>Events:</h3>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('info')->value['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
		<li><a href="?Contact/event/<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</a></li>
	<?php }} ?>
	</ul>
	
	<h3>Files</h3>
	<?php echo smarty_function_plugin(array('p'=>'Filemanager','type'=>"contact_".($_smarty_tpl->getVariable('info')->value['id']),'display'=>'list'),$_smarty_tpl);?>

	
	<?php echo smarty_function_plugin(array('p'=>'Comments','type'=>'contact','id_type'=>$_smarty_tpl->getVariable('info')->value['id'],'title'=>'Memo','allow_comment'=>1),$_smarty_tpl);?>

</div>