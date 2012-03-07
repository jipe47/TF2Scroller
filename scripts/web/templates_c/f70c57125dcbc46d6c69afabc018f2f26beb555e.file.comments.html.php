<?php /* Smarty version Smarty-3.0.7, created on 2012-03-07 14:39:22
         compiled from "plugin/comments/html/comments.html" */ ?>
<?php /*%%SmartyHeaderCode:112754f57650a581050-89643159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f70c57125dcbc46d6c69afabc018f2f26beb555e' => 
    array (
      0 => 'plugin/comments/html/comments.html',
      1 => 1331127560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112754f57650a581050-89643159',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_mkPages')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.mkPages.php';
if (!is_callable('smarty_modifier_date_format')) include 'C:\wamp\www\transeo\lib\smarty\plugins\modifier.date_format.php';
if (!is_callable('smarty_function_html_leanmodal_confirm')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal_confirm.php';
if (!is_callable('smarty_function_bbcodeparse')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.bbcodeparse.php';
if (!is_callable('smarty_function_plugin')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.plugin.php';
?><div id="div_comment" class="comments">
	<?php if ($_smarty_tpl->getVariable('allowComment')->value){?>
	
		<?php if ($_smarty_tpl->getVariable('title')->value!=''){?>
			<h2 id="comments"><?php echo $_smarty_tpl->getVariable('title')->value;?>
</h2>
		<?php }?>
		
		<?php echo smarty_function_mkPages(array('back'=>($_smarty_tpl->getVariable('back_page')->value),'count'=>($_smarty_tpl->getVariable('page_count')->value),'current'=>($_smarty_tpl->getVariable('page_num')->value)),$_smarty_tpl);?>

		
		<?php if (count($_smarty_tpl->getVariable('array_comment')->value)>0&&$_smarty_tpl->getVariable('enable_comment')->value){?>
		<table class="comment_tab">
			<?php  $_smarty_tpl->tpl_vars['c'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('array_comment')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['c']->key => $_smarty_tpl->tpl_vars['c']->value){
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['c']->key;
?>
			<tr class="comment_single <?php if ($_smarty_tpl->tpl_vars['i']->value%2==1){?>odd<?php }else{ ?>even<?php }?>" id="comment<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
">
				<td class="comment_user">
					<strong><a href="?Member/<?php echo $_smarty_tpl->tpl_vars['c']->value['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['c']->value['firstname'];?>
 <?php echo $_smarty_tpl->tpl_vars['c']->value['lastname'];?>
</a></strong>
					<?php if ($_smarty_tpl->tpl_vars['c']->value['avatar']==''){?>
						<img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/empty_avatar.png" />
					<?php }else{ ?>
						<img src="<?php echo $_smarty_tpl->getVariable('PATH_UPLOAD')->value;?>
user/avatar/mini/<?php echo $_smarty_tpl->tpl_vars['c']->value['avatar'];?>
" />
					<?php }?>
					
				</td>
				<td class="comment_content">
					<div class="comment_info">
						<?php if ($_smarty_tpl->tpl_vars['c']->value['title']!=''){?>
							<?php echo $_smarty_tpl->tpl_vars['c']->value['title'];?>
 - 
						<?php }?>
						
						<a href="?<?php echo $_smarty_tpl->getVariable('back_page')->value;?>
/c<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
#comment<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/link.png" title="Permalink" alt="Permalink" /></a>
						
						<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['c']->value['timestamp_add'],'%d %B %Y at %H:%M ');?>
			

						<div>
							<?php if ($_smarty_tpl->getVariable('canEdit')->value){?>							
								<a href="?Editcomment/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
/<?php echo $_smarty_tpl->getVariable('back_complete')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/edit.png" title="Edit this comment" alt="Edit this comment" /></a>
							<?php }?>
							<?php if ($_smarty_tpl->getVariable('canDelete')->value&&!in_array($_smarty_tpl->tpl_vars['c']->value['id'],$_smarty_tpl->getVariable('array_avoid_delete')->value)){?>
								<!-- <a href="?Deletecomment/<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
/<?php echo $_smarty_tpl->getVariable('back_complete')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this comment" alt="Delete this comment" /></a> -->
								<a href="#deleteComment<?php echo $_smarty_tpl->tpl_vars['c']->value['id'];?>
" class="leanModal_button"><img src="<?php echo $_smarty_tpl->getVariable('COMMON')->value;?>
images/buttons/delete.png" title="Delete this comment" alt="Delete this comment" /></a>
								
								<?php echo smarty_function_html_leanmodal_confirm(array('id'=>"deleteComment".($_smarty_tpl->tpl_vars['c']->value['id']),'message'=>"Are you sure you want to delete this post?",'handler_yes'=>"?Request/Comments/delete/".($_smarty_tpl->tpl_vars['c']->value['id'])."/".($_smarty_tpl->getVariable('back_complete')->value)),$_smarty_tpl);?>

							
							<?php }?>
						</div>
					</div>
					
					<?php echo smarty_function_bbcodeparse(array('text'=>nl2br($_smarty_tpl->tpl_vars['c']->value['message'])),$_smarty_tpl);?>

				</td>
			</tr>
			<?php }} ?>
		</table>
		<?php }?>
		
		<?php echo smarty_function_mkPages(array('back'=>($_smarty_tpl->getVariable('back_page')->value),'count'=>($_smarty_tpl->getVariable('page_count')->value),'current'=>($_smarty_tpl->getVariable('page_num')->value)),$_smarty_tpl);?>

		<?php if ($_smarty_tpl->getVariable('enableForm')->value){?>
			<?php if ($_smarty_tpl->getVariable('allowAnonymous')->value||$_smarty_tpl->getVariable('isConnected')->value){?>
			<div class="comment_form">
				<form method="post" action="?Request/Comments">
				
					<input type="hidden" name="back" value="<?php echo $_smarty_tpl->getVariable('back')->value;?>
" />
					<input type="hidden" name="comments_type" value="<?php echo $_smarty_tpl->getVariable('comments_type')->value;?>
" />
					<input type="hidden" name="comments_id_type" value="<?php echo $_smarty_tpl->getVariable('comments_id_type')->value;?>
" />
					
					<?php if (!$_smarty_tpl->getVariable('isConnected')->value&&$_smarty_tpl->getVariable('allowAnonymous')->value){?>
					<p>Nickname: <input type="text" name="nickname" /></p>
					<?php }?>
					
					<p>Title: <input type="text" name="comments_title" value="<?php echo $_smarty_tpl->getVariable('comment_title')->value;?>
" size="40"/></p>
					<?php echo smarty_function_plugin(array('p'=>'bbcode','enable_formtag'=>0,'textarea_name'=>"comments_message",'enable_preview'=>0,'enable_toolbar'=>$_smarty_tpl->getVariable('enable_toolbar')->value),$_smarty_tpl);?>

									
					<p><input type="submit" value="Ok" /></p>
				</form>
			</div>
			<?php }else{ ?>
				<p>You must be identified to post a comment.</p>
			<?php }?>
		<?php }?>
	<?php }else{ ?>
		<p>Comments are disabled.</p>
	<?php }?>
</div>