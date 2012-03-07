<?php /* Smarty version Smarty-3.0.7, created on 2012-01-31 10:44:09
         compiled from "plugin/workgroup/html/workgroup_list_participationwindow.html" */ ?>
<?php /*%%SmartyHeaderCode:249834f27c5f99e7661-46525518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '86be88a278fb6851c8a79f2764c16003748774de' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_list_participationwindow.html',
      1 => 1324393215,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '249834f27c5f99e7661-46525518',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<form method="post" action="?Request/Workgroup/confirmparticipation">
	<input type="hidden" name="id_workgroup" value="<?php echo $_smarty_tpl->getVariable('id_workgroup')->value;?>
" />
	
	<p>Confirm participation? 	<select name="answer">
									<option value="yes">Yes</option>
									<option value="no">No</option>
								</select></p>
	<p>Why not?</p>
	<textarea name="reason" cols="58" rows="3"></textarea>
	<p>
		<input type="submit" class="button_link" value="Ok" />
		<input type="button" class="button_link" value="Close" onclick="leanModal_close('<?php echo $_smarty_tpl->getVariable('id')->value;?>
')" />
	</p>
	
</form>