<?php /* Smarty version Smarty-3.0.7, created on 2012-02-17 02:53:26
         compiled from "plugin/workgroup/html/admin/workgroup_member.html" */ ?>
<?php /*%%SmartyHeaderCode:99774f3db316de3b71-09632565%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'aa5440923e42b4669b1962bc653aca59f21c9955' => 
    array (
      0 => 'plugin/workgroup/html/admin/workgroup_member.html',
      1 => 1329085319,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99774f3db316de3b71-09632565',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><p>Members of <strong><?php echo $_smarty_tpl->getVariable('workgroup')->value['name'];?>
</strong></p>
 $_from = $_smarty_tpl->getVariable('members')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
workgroup/images/award_star_gold_3.png" alt="Moderator" title="Moderator"/>
workgroup/images/guest.png" alt="Guest" title="Guest"/>
"><?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
</a>
images/icons/tick.png" title="Confirmed" alt="Confirmed" />
images/icons/circle_blue.png" title="No answer" alt="No answer" /> 
images/icons/cross.png" title="Declined" alt="Declined" /> : <?php echo $_smarty_tpl->tpl_vars['m']->value['reason'];?>

images/buttons/edit.png" title="Edit this member" alt="Edit this member" onclick="workgroupLoadMemberInfo(<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
, '<?php echo $_smarty_tpl->tpl_vars['m']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['m']->value['lastname'];?>
', <?php echo $_smarty_tpl->tpl_vars['m']->value['isGuest'];?>
, <?php echo $_smarty_tpl->tpl_vars['m']->value['isModerator'];?>
)" /></a>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" alt="Remove this member from this group" title="Remove this member from this group" /></a>

/<?php echo $_smarty_tpl->tpl_vars['m']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
workgroup/images/email_go.png" title="Send a recall e-mail" alt="Send a recall e-mail" /></a>

<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_html_leanmodal(array('title'=>"Member Edition",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/admin/leanmodal/workgroup_member_edit.html",'id'=>"memberEdit",'id_workgroup'=>$_tmp1),$_smarty_tpl);?>