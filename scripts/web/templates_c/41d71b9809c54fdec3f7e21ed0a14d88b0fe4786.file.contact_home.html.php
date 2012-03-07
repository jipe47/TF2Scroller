<?php /* Smarty version Smarty-3.0.7, created on 2012-02-19 01:11:49
         compiled from "plugin/contact/html/contact_home.html" */ ?>
<?php /*%%SmartyHeaderCode:194874f403e45bbdea8-59506135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41d71b9809c54fdec3f7e21ed0a14d88b0fe4786' => 
    array (
      0 => 'plugin/contact/html/contact_home.html',
      1 => 1329610087,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194874f403e45bbdea8-59506135',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_country')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_country.php';
?><h1>Contact Search</h1>
<form method="post" action="?Contact" id="form_search">
	<input type="hidden" name="searching" value="1" />
	
	
	<div class="row">
	
		<div class="colleft">
			<fieldset>
				<legend>Search</legend>
				
				<h4>Infos</h4>
				<p>
					<input type="text" name="firstname" value="<?php echo $_smarty_tpl->getVariable('fields')->value['firstname']['value'];?>
" size="30" placeholder="Firstname"/>
					<input type="text" name="lastname"  value="<?php echo $_smarty_tpl->getVariable('fields')->value['lastname']['value'];?>
" size="30" placeholder="Lastname" />
				</p>
				<p>
					<input type="text" name="email" value="<?php echo $_smarty_tpl->getVariable('fields')->value['email']['value'];?>
" size="40" placeholder="Email"/>
				</p>
				
				<p>
					<input type="text" name="phone" value="<?php echo $_smarty_tpl->getVariable('fields')->value['phone']['value'];?>
" size="30" placeholder="Phone"/><br />
					<input type="text" name="mobile" value="<?php echo $_smarty_tpl->getVariable('fields')->value['mobile']['value'];?>
" size="30" placeholder="Mobile"/><br />
					<input type="text" name="fax" value="<?php echo $_smarty_tpl->getVariable('fields')->value['fax']['value'];?>
" size="30" placeholder="Fax"/>
				</p>
				
				<h4>Address</h4>
				
				<p>
					<input type="text" name="street" value="<?php echo $_smarty_tpl->getVariable('fields')->value['street']['value'];?>
" size="45" placeholder="Street" />
					<input type="text" name="number" value="<?php echo $_smarty_tpl->getVariable('fields')->value['number']['value'];?>
" size="6" placeholder="Number" />
				</p>
				<p>
					<input type="text" name="postal" value="<?php echo $_smarty_tpl->getVariable('fields')->value['postal']['value'];?>
" size="5" placeholder="Postal" />
					<input type="text" name="city" value="<?php echo $_smarty_tpl->getVariable('fields')->value['city']['value'];?>
" size="40" placeholder="City" />
				</p>
				
				<h4>Country</h4>
				
				<ul>
					<?php echo smarty_function_html_select_country(array('format'=>"checkbox",'array_selected'=>$_smarty_tpl->getVariable('fields')->value['country'],'field_name'=>"country",'showflag'=>1,'separator_start'=>"<li>",'separator_end'=>"</li>",'from'=>$_smarty_tpl->getVariable('array_country')->value),$_smarty_tpl);?>

				</ul>
				
			</fieldset>
			
			<p align="center"><input type="submit" value="Search contact" name="search" class="button_link_big"/></p>
		</div>
		
		<div class="colright">
			<fieldset>
				<legend>Display filtering</legend>
				
				<h4>Information</h4>
				
				<ul>
					<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
					<li><input type="checkbox" name="filter_display[]" id="display_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)){?> checked="checked"<?php }?> /> : <label for="display_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</label></li>
					<?php }} ?>
				</ul>
				
				
				
				<h4>Filters</h4>
				
				<ul>
					<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_filter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['s']->key;
?>
					<li><input type="checkbox" name="filter_display[]" id="display_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)){?> checked="checked"<?php }?> /> : <label for="display_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value;?>
</label></li>
					<?php }} ?>
				</ul>
				
				<h4>Events</h4>
				
				<ul>
					<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
					<li><input type="checkbox" name="filter_display[]" id="display_event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
" value="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"<?php if (in_array("event_".($_smarty_tpl->tpl_vars['e']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?> checked="checked"<?php }?> /> : <label for="display_event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</label></li>
					<?php }} ?>
				</ul>
				
				
				<h4>Criteria</h4>
				
				<ul>
					<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<li><input type="checkbox" name="filter_display[]" id="display_criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" value="criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"<?php if (in_array("criteria_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?> checked="checked"<?php }?> /> : <label for="display_criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</label></li>
					<?php }} ?>
				</ul>
			</fieldset>
		</div>
	</div>
	
	
	<div class="clearfix"></div>
	
	
	
	<div class="row">
		<div class="colleft">
			<fieldset id="filter_source">
				<legend>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_expand.png" title="Expand" alt="Expand" class="expand" onclick="contactToggleFilter('source')" />
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_reduce.png" title="Reduce" alt="Reduce" class="reduce" onclick="contactToggleFilter('source')" />
					Source Filter
				</legend>
				<ul class="content_toggle">
					<?php  $_smarty_tpl->tpl_vars['s'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_source')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['s']->key => $_smarty_tpl->tpl_vars['s']->value){
?>
					<li><input type="checkbox" name="array_source_checked[]" id="source_<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['s']->value['id'],$_smarty_tpl->getVariable('array_source_checked')->value)){?>checked="checked"<?php }?>/>: <label for="source_<?php echo $_smarty_tpl->tpl_vars['s']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['s']->value['name'];?>
</label></li>
					<?php }} ?>
				</ul>
			</fieldset>
		</div>
		
		<div class="colright">
			<fieldset id="filter_event">
				<legend>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_expand.png" title="Expand" alt="Expand" class="expand" onclick="contactToggleFilter('event')" />
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_reduce.png" title="Reduce" alt="Reduce" class="reduce" onclick="contactToggleFilter('event')" />
					Event Filter
				</legend>
				<ul class="content_toggle">
					<?php  $_smarty_tpl->tpl_vars['e'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['e']->key => $_smarty_tpl->tpl_vars['e']->value){
?>
					<li><input type="checkbox" name="array_event_checked[]" id="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"<?php if (in_array($_smarty_tpl->tpl_vars['e']->value['id'],$_smarty_tpl->getVariable('array_event_checked')->value)){?> checked="checked"<?php }?> /> : <label for="event_<?php echo $_smarty_tpl->tpl_vars['e']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['e']->value['name'];?>
</label></li>
					<?php }} ?>
				</ul>
			</fieldset>
		</div>
	</div>
	
	<div class="clearfix"></div>
		
	<div class="row">
		<div class="colleft">
			<fieldset id="filter_type">
				<legend>
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_expand.png" title="Expand" alt="Expand" class="expand" onclick="contactToggleFilter('type')" />
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_reduce.png" title="Reduce" alt="Reduce" class="reduce" onclick="contactToggleFilter('type')" />
					Contact Type Filter
				</legend>
				<ul class="content_toggle">
					<?php  $_smarty_tpl->tpl_vars['t'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_type')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['t']->key => $_smarty_tpl->tpl_vars['t']->value){
?>
					<li><input type="checkbox" id="type_<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" name="array_type_checked[]" value="<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
" <?php if (in_array($_smarty_tpl->tpl_vars['t']->value['id'],$_smarty_tpl->getVariable('array_type_checked')->value)){?>checked="checked"<?php }?>/>: <label for="type_<?php echo $_smarty_tpl->tpl_vars['t']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['t']->value['name'];?>
</label></li>
					<?php }} ?>
				</ul>
			</fieldset>
		</div>
		
		<div class="colright">
			<fieldset id="filter_criteria">
				<legend>
					
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_expand.png" title="Expand" alt="Expand" class="expand" onclick="contactToggleFilter('criteria')" />
					<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
contact/images/arrow_reduce.png" title="Reduce" alt="Reduce" class="reduce" onclick="contactToggleFilter('criteria')" />
					Criteria Filter
				</legend>
				<div class="content_toggle">
					<table class="tab_admin">
						<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
						<tr>
							<td><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</td>
							<td>
								<select name="filter_criteria_<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
									<option value="any">Any</option>
									<option value="set"<?php if (in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->getVariable('array_criteria_set')->value)){?> selected="selected"<?php }?>>Only set</option>
									<option value="unset"<?php if (in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->getVariable('array_criteria_unset')->value)){?> selected="selected"<?php }?>>Only unset</option>
								</select>
							</td>
						</tr>
						<?php }} ?>
					</table>
				</div>
			</fieldset>
		</div>
	</div>
	
	
	<div class="clearfix"></div>
	
		
	
<?php if ($_smarty_tpl->getVariable('isSearching')->value){?>
	<?php if (count($_smarty_tpl->getVariable('results')->value)==0){?>
		<p><em>No results.</em></p>
	<?php }else{ ?>
		<p>
			<a href="xls_contact.php?display=<?php echo implode(",",$_smarty_tpl->getVariable('filter_display')->value);?>
&amp;ids=<?php echo implode(",",$_smarty_tpl->getVariable('ids_result')->value);?>
" class="button_link">Export (xls)</a>
		</p>
		
		<table class="tab_admin">
			<tr>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)){?>
				<th><?php echo $_smarty_tpl->tpl_vars['d']->value;?>
</th>
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_filter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)&&$_smarty_tpl->tpl_vars['k']->value!="event"){?>
				<th><?php echo $_smarty_tpl->tpl_vars['d']->value;?>
</th>
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<?php if (in_array("event_".($_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?>
				<th><?php echo $_smarty_tpl->tpl_vars['d']->value['name'];?>
</th>
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<?php if (in_array("criteria_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?>
				<th><?php echo $_smarty_tpl->tpl_vars['c']->value['name'];?>
</th>
					<?php }?>
				<?php }} ?>
				
				
				<th></th>
			</tr>
			<?php  $_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('results')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['r']->key => $_smarty_tpl->tpl_vars['r']->value){
?>
			<tr>
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_info')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)){?>
						<?php if ($_smarty_tpl->tpl_vars['k']->value=="country"){?>
							<td><?php echo Country::getName($_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->getVariable('k')->value]);?>
</td>
						<?php }else{ ?>
							<td><?php echo $_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->getVariable('k')->value];?>
</td>
						<?php }?>
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('filter_display_list_filter')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['d']->key;
?>
					<?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->getVariable('filter_display')->value)){?>
				<td><?php echo $_smarty_tpl->tpl_vars['r']->value[$_smarty_tpl->getVariable('k')->value];?>
</td>
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['d'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_event')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['d']->key => $_smarty_tpl->tpl_vars['d']->value){
?>
					<?php if (in_array("event_".($_smarty_tpl->tpl_vars['d']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?>
					<td>
						<?php if (in_array($_smarty_tpl->tpl_vars['d']->value['id'],$_smarty_tpl->tpl_vars['r']->value['events'])){?>
						<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" />
						<?php }?>
					</td>					
					<?php }?>
				<?php }} ?>
				
				<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_criteria')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
?>
					<?php if (in_array("criteria_".($_smarty_tpl->tpl_vars['c']->value['id']),$_smarty_tpl->getVariable('filter_display')->value)){?>
						<td>
						<?php if (in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['r']->value['criteria_set'])||(!in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['r']->value['criteria_set'])&&!in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->tpl_vars['r']->value['criteria_unset'])&&$_smarty_tpl->tpl_vars['c']->value['default_value']==1)){?>
							<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/tick.png" />
						<?php }?>
						</td>
					<?php }?>
				<?php }} ?>
				
				<td>
					<a href="?Admin/Contact/edit/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this contact" alt="Edit this contact" /></a>
					<a href="?Admin/Contact/delete/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this contact" alt="Delete this contact" /></a>
					<a href="?Contact/view/<?php echo $_smarty_tpl->tpl_vars['r']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="See contact's page" alt="See contact's page" /></a>
				</td>
			</tr>
			<?php }} ?>
		</table>
	<?php }?>
<?php }?>

