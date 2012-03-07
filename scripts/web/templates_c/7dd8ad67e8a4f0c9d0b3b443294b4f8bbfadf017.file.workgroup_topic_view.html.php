<?php /* Smarty version Smarty-3.0.7, created on 2012-03-07 14:26:25
         compiled from "plugin/workgroup/html/workgroup_topic_view.html" */ ?>
<?php /*%%SmartyHeaderCode:118684f576201bcf210-02490470%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7dd8ad67e8a4f0c9d0b3b443294b4f8bbfadf017' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_topic_view.html',
      1 => 1331125492,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '118684f576201bcf210-02490470',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
?><!-- Ok -->
<h1>Forum <?php echo smarty_function_plugin(array('p'=>'Help','code'=>'workgroup_forum_topic'),$_smarty_tpl);?>
</h1>
<h3><?php echo $_smarty_tpl->getVariable('topic')->value['title'];?>
</h3>

<?php ob_start();?><?php echo $_smarty_tpl->getVariable('topic')->value['id_firstcomment'];?>
<?php $_tmp1=ob_get_clean();?><?php echo smarty_function_plugin(array('p'=>'Comments','nbr_per_page'=>3,'id_type'=>$_smarty_tpl->getVariable('topic')->value['id'],'type'=>"workgroup_".($_smarty_tpl->getVariable('workgroup')->value['id']),'allow_comment'=>1,'title'=>'','enable_form'=>0,'array_avoid_delete'=>$_tmp1),$_smarty_tpl);?>


<?php if ($_smarty_tpl->getVariable('isAdmin')->value||$_smarty_tpl->getVariable('isModerator')->value||$_smarty_tpl->getVariable('topic')->value['id_author']==$_smarty_tpl->getVariable('id_user')->value){?>
<div id="">
	<p>
		<a href="?Workgroup/topic/reply/<?php echo $_smarty_tpl->getVariable('topic')->value['id'];?>
" class="button_link_big">Reply</a>
		<a href="?Workgroup/topic/edit/<?php echo $_smarty_tpl->getVariable('topic')->value['id'];?>
" class="button_link">Edit this topic</a>
		<a href="#deleteTopic" class="button_link leanModal_button">Delete this topic</a>
	</p>
</div>
<?php }?>

<?php echo smarty_function_html_leanmodal_confirm(array('message'=>"Are you sure you want to delete this topic?",'id'=>"deleteTopic",'handler_yes'=>"?Request/Workgroup/forum/delete/".($_smarty_tpl->getVariable('workgroup')->value['id'])."/".($_smarty_tpl->getVariable('topic')->value['id'])),$_smarty_tpl);?>

