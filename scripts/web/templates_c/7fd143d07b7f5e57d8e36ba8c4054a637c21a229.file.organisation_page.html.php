<?php /* Smarty version Smarty-3.0.7, created on 2012-02-09 12:46:28
         compiled from "plugin/user/html/organisation_page.html" */ ?>
<?php /*%%SmartyHeaderCode:137404f33b2141caf45-64609730%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7fd143d07b7f5e57d8e36ba8c4054a637c21a229' => 
    array (
      0 => 'plugin/user/html/organisation_page.html',
      1 => 1328787986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137404f33b2141caf45-64609730',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="organisation">

	<?php if ($_smarty_tpl->getVariable('org')->value['logo']!=''){?>
	<div class="logo">
		<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/organisation/mini/<?php echo $_smarty_tpl->getVariable('org')->value['logo'];?>
" title="Logo of <?php echo $_smarty_tpl->getVariable('org')->value['name'];?>
" alt="Logo of <?php echo $_smarty_tpl->getVariable('org')->value['name'];?>
"/>
	</div>
	<?php }?>
	
	<h1><?php echo $_smarty_tpl->getVariable('org')->value['name'];?>
</h1>

	<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('org')->value['description']),$_smarty_tpl);?>


	<hr />
	
	<?php if ($_smarty_tpl->getVariable('org')->value['contact']!=''){?>
	<div class="contact">		
		<h3>Contact: <?php echo $_smarty_tpl->getVariable('org')->value['contact']['fn'];?>
 <?php echo $_smarty_tpl->getVariable('org')->value['contact']['ln'];?>
 - <?php echo $_smarty_tpl->getVariable('org')->value['contact']['jb'];?>
</h3>
		<div class="picture">
			<?php if ($_smarty_tpl->getVariable('org')->value['contact']['avatar']==''){?>
				<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/empty_avatar.png"  width="125" height="125" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->getVariable('org')->value['contact']['avatar'];?>
" />
			<?php }?>	
		</div>
		<div class="info">
		<?php if ($_smarty_tpl->getVariable('org')->value['contact']['id_contact']!=''){?>
			<?php echo $_smarty_tpl->getVariable('org')->value['contact']['street'];?>
, <?php echo $_smarty_tpl->getVariable('org')->value['contact']['number'];?>
<br />
			<?php echo $_smarty_tpl->getVariable('org')->value['contact']['postal'];?>
 <?php echo $_smarty_tpl->getVariable('org')->value['contact']['city'];?>
<br />
			<?php echo $_smarty_tpl->getVariable('org')->value['contact']['country'];?>
<br />
			<br />
			Tel: <?php echo $_smarty_tpl->getVariable('org')->value['contact']['phone'];?>
<br />
			Fax: <?php echo $_smarty_tpl->getVariable('org')->value['contact']['fax'];?>
<br />
			Mobile: <?php echo $_smarty_tpl->getVariable('org')->value['contact']['mobile'];?>
<br />
			<br />

			E-mail: <a href="mailto:<?php echo $_smarty_tpl->getVariable('org')->value['contact']['email'];?>
"><?php echo $_smarty_tpl->getVariable('org')->value['contact']['email'];?>
</a><br />
			Website: <a href="<?php echo $_smarty_tpl->getVariable('org')->value['contact']['website'];?>
"><?php echo $_smarty_tpl->getVariable('org')->value['contact']['website'];?>
</a><br />
		<?php }else{ ?>
			<p><em>No contact information specified.</em></p>
		<?php }?>
		</div>
	</div>
	<?php }?>
	<div class="clearfix"></div>
	<?php if ($_smarty_tpl->getVariable('org')->value['substitute']!=''&&($_smarty_tpl->getVariable('org')->value['contact']==''||$_smarty_tpl->getVariable('org')->value['substitute']['id']!=$_smarty_tpl->getVariable('org')->value['contact']['id'])){?>
	<div class="contact">		
		<h3>Substitute: <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['fn'];?>
 <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['ln'];?>
 - <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['jb'];?>
</h3>

		<div class="picture">
			<?php if ($_smarty_tpl->getVariable('org')->value['substitute']['avatar']==''){?>
				<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/empty_avatar.png" width="125" height="125" />
			<?php }else{ ?>
				<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['avatar'];?>
" />
			<?php }?>	
		</div>
		<div class="info">
		<?php if ($_smarty_tpl->getVariable('org')->value['substitute']['id_contact']!=''){?>
			<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['street'];?>
, <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['number'];?>
<br />
			<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['postal'];?>
 <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['city'];?>
<br />
			<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['country'];?>
<br />
			<br />
			Tel: <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['phone'];?>
<br />
			Fax: <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['fax'];?>
<br />
			Mobile: <?php echo $_smarty_tpl->getVariable('org')->value['substitute']['mobile'];?>
<br />
			<br />

			E-mail: <a href="mailto:<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['email'];?>
"><?php echo $_smarty_tpl->getVariable('org')->value['substitute']['email'];?>
</a><br />
			Website: <a href="<?php echo $_smarty_tpl->getVariable('org')->value['substitute']['website'];?>
"><?php echo $_smarty_tpl->getVariable('org')->value['substitute']['website'];?>
</a><br />
		<?php }else{ ?>
			<p><em>No contact information specified.</em></p>
		<?php }?>
		</div>
	</div>
	<?php }?>
	
	<div class="clearfix"></div>
	
	<?php if (count($_smarty_tpl->getVariable('org')->value['members'])>0){?>
	<h3>Members</h3>
	<ul>
	<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('org')->value['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
		<li><a href="?Member/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['fn'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['ln'];?>
</a> - <?php echo $_smarty_tpl->tpl_vars['m']->value['jb'];?>
</li>
	<?php }} ?>
	</ul>
	<?php }?>
	
	
	<h2>Files</h2>
	<?php echo smarty_function_plugin(array('p'=>'Filemanager','type'=>"organisation_".($_smarty_tpl->getVariable('org')->value['id']),'display'=>'list'),$_smarty_tpl);?>


</div>