<?php /* Smarty version Smarty-3.0.7, created on 2012-02-05 19:56:59
         compiled from "plugin/workgroup/html/workgroup_conference.html" */ ?>
<?php /*%%SmartyHeaderCode:93314f2ed0fb56d376-85879919%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a0043025ae348a1d15012fab7ce8af458677c94' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_conference.html',
      1 => 1328468217,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '93314f2ed0fb56d376-85879919',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><h1><?php echo $_smarty_tpl->getVariable('conf')->value['name'];?>
</h1>

<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('conf')->value['description']),$_smarty_tpl);?>


<p>This confcall will take place on the <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('conf')->value['timestamp'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." at ".($_smarty_tpl->getVariable('TIME_FORMAT')->value));?>
</p>

<?php if ($_smarty_tpl->getVariable('conf')->value['id_chatroom']!=''){?>
<p><em>A chat room is reserved for this confcall: 
	<a href="?Workgroup/chatroom/view/<?php echo $_smarty_tpl->getVariable('conf')->value['id_chatroom'];?>
">
		<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/arrow_right.png" title="Join this chatroom" alt="Join chatroom" /> <?php echo $_smarty_tpl->getVariable('conf')->value['name_chatroom'];?>

	</a></em></p>
<?php }?>
<hr />
<!--
<h2>Files</h2>
<?php echo smarty_function_plugin(array('p'=>'Filemanager','display'=>'list','type'=>"conference_".($_smarty_tpl->getVariable('conf')->value['id'])),$_smarty_tpl);?>

<hr />
-->
<?php echo smarty_function_plugin(array('p'=>'Comments','type'=>'conference','id_type'=>$_smarty_tpl->getVariable('conf')->value['id'],'allow_comment'=>1),$_smarty_tpl);?>
