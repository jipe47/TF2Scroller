<?php /* Smarty version Smarty-3.0.7, created on 2012-03-03 02:15:59
         compiled from "plugin/workgroup/html/workgroup_deadline.html" */ ?>
<?php /*%%SmartyHeaderCode:281554f5170cfac4477-29238354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43b65e396f711014c39a1eb005f7b9ca3a7d0dec' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_deadline.html',
      1 => 1330388532,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '281554f5170cfac4477-29238354',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
?><!-- Ok -->
<h1><?php echo $_smarty_tpl->getVariable('deadline')->value['name'];?>
</h1>

<?php echo smarty_function_bbcodeparse(array('text'=>$_smarty_tpl->getVariable('deadline')->value['description']),$_smarty_tpl);?>


<p>This event will take place on the <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('deadline')->value['timestamp'],($_smarty_tpl->getVariable('DATE_FORMAT')->value)." %H:%M");?>
</p>

<p>
	<a href="?Workgroup/<?php echo $_smarty_tpl->getVariable('deadline')->value['id_workgroup'];?>
" class="button_link_big">Back to workgroup</a>
</p>