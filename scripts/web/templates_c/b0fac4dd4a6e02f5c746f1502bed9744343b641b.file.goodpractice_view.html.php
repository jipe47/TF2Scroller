<?php /* Smarty version Smarty-3.0.7, created on 2012-02-21 20:21:04
         compiled from "plugin/goodpractice/html/goodpractice_view.html" */ ?>
<?php /*%%SmartyHeaderCode:32614f43eea0d756e2-93028339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0fac4dd4a6e02f5c746f1502bed9744343b641b' => 
    array (
      0 => 'plugin/goodpractice/html/goodpractice_view.html',
      1 => 1329852060,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '32614f43eea0d756e2-93028339',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
?><div id="goodpractice_view">
<h1><?php echo $_smarty_tpl->getVariable('gp')->value['name'];?>
</h1>
<div class="rightcol">
	<div class="info">
		<h2>Info</h2>
		
		<div class="logo">
			<img src="<?php if ($_smarty_tpl->getVariable('gp')->value['logo']!=''){?><?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
goodpractice/organisation/mini/<?php echo $_smarty_tpl->getVariable('gp')->value['logo'];?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
goodpractice/images/nologo.png<?php }?>" <?php if ($_smarty_tpl->getVariable('gp')->value['id_organisation']!=''){?>title="Logo of <?php echo $_smarty_tpl->getVariable('gp')->value['organisation_name'];?>
" alt="Logo of <?php echo $_smarty_tpl->getVariable('gp')->value['organisation_name'];?>
"<?php }else{ ?> title="No logo" alt="No logo"<?php }?> />
		</div>
				
		
		<?php if ($_smarty_tpl->getVariable('gp')->value['id_organisation']!=''){?>
			<p>Organisation: <a href="?Goodpractice/navigation/organisation/<?php echo $_smarty_tpl->getVariable('gp')->value['id_organisation'];?>
"><?php echo $_smarty_tpl->getVariable('gp')->value['organisation_name'];?>
</a></p>
		<?php }?>
		
		<?php if ($_smarty_tpl->getVariable('gp')->value['country']!=''){?>
			<p>Country: <a href="?Goodpractice/navigation/country/<?php echo $_smarty_tpl->getVariable('gp')->value['country'];?>
"><?php echo Country::getName($_smarty_tpl->getVariable('gp')->value['country']);?>
</a></p>
		<?php }?>
		
		<p>Theme: <a href="?Goodpractice/navigation/theme/<?php echo $_smarty_tpl->getVariable('gp')->value['id_type'];?>
"><?php echo $_smarty_tpl->getVariable('gp')->value['type_name'];?>
</a></p>
		
		<p>Publisher: <a href="?Member/<?php echo $_smarty_tpl->getVariable('gp')->value['id_user_add'];?>
"><?php echo $_smarty_tpl->getVariable('gp')->value['user_firstname'];?>
 <?php echo $_smarty_tpl->getVariable('gp')->value['user_lastname'];?>
</a></p>
		
		<p>Publication date: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('gp')->value['timestamp_add'],$_smarty_tpl->getVariable('DATE_FORMAT')->value);?>
</p>
		<?php if ($_smarty_tpl->getVariable('gp')->value['timestamp_lastedit']!=''){?>
			<p>Last edition: <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('gp')->value['timestamp_lastedit'],$_smarty_tpl->getVariable('DATE_FORMAT')->value);?>
</p>
		<?php }?>
		
		<p>
			<a href="?Admin/Goodpractice/goodpractice/edit/<?php echo $_smarty_tpl->getVariable('gp')->value['id'];?>
">Edit</a> 
			<a href="#deleteGoodpractice" class="leanModal_button">Delete</a> 
		</p>
		
		<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteGoodpractice",'message'=>"Are you sure you want to delete this good practice?",'handler_yes'=>"http://localhost/transeo/?Request/Goodpractice/delete/".($_smarty_tpl->getVariable('gp')->value['id'])),$_smarty_tpl);?>

		
		<p>
			<a href="">Pdf</a>
		</p>
		
		<?php echo smarty_function_plugin(array('p'=>'Comments','type'=>'goodpractice','id_type'=>$_smarty_tpl->getVariable('gp')->value['id'],'title'=>'Comments','template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."goodpractice/html/goodpractice_commentlist.html"),$_smarty_tpl);?>

	</div>

	<div class="files">
		<h2>Files</h2>
		<?php echo smarty_function_plugin(array('p'=>'Filemanager','type'=>"goodpractice_".($_smarty_tpl->getVariable('gp')->value['id']),'display'=>'list'),$_smarty_tpl);?>

	</div>
</div>

<div class="leftcol">
	<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('gp')->value['content']),$_smarty_tpl);?>

</div>


<div class="clearfix"></div>

<?php echo smarty_function_plugin(array('p'=>'Comments','type'=>'goodpractice','id_type'=>$_smarty_tpl->getVariable('gp')->value['id'],'title'=>'Comments','allow_comment'=>1,'enable_comment'=>0,'enable_toolbar'=>0),$_smarty_tpl);?>

</div>
