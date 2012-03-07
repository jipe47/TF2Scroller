<?php /* Smarty version Smarty-3.0.7, created on 2012-02-07 15:51:25
         compiled from "plugin/logviewer/html/logviewer.html" */ ?>
<?php /*%%SmartyHeaderCode:178374f313a6d865156-48740418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39423e517e94c84e3df9a006da668dfaa316901c' => 
    array (
      0 => 'plugin/logviewer/html/logviewer.html',
      1 => 1317675148,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178374f313a6d865156-48740418',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_select_date')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_select_date.php';
?><div class="sub_content">
	<h1>Log Viewer</h1>
	
	<form method="post">
		<!--<p>
			From : 
			<?php echo smarty_function_html_select_date(array('prefix'=>"start_",'start_year'=>"-5"),$_smarty_tpl);?>

		</p>
		
		<p>
			To : 
			<?php echo smarty_function_html_select_date(array('prefix'=>"end_",'start_year'=>"-5"),$_smarty_tpl);?>

		</p>-->
		
		<p>See <?php echo smarty_function_html_select_date(array('pref'=>"see_",'start_year'=>"-5",'all_extra'=>"onchange='logviewerDisplay()'",'year_extra'=>"id='single_year'",'day_extra'=>"id='single_day'",'month_extra'=>"id='single_month'"),$_smarty_tpl);?>
</p>
		<p><input type="checkbox" id="reverse" onclick="logviewerDisplay();" /> : Reverse</p>
		<p><input type="button" value="Ok" onclick="logviewerDisplay()" /></p>
	</form>
	
	<div id="logviewer_result"></div>
	
</div>