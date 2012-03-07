<?php /* Smarty version Smarty-3.0.7, created on 2012-02-04 15:51:28
         compiled from "plugin/workgroup/html/workgroup_chatroom_view.html" */ ?>
<?php /*%%SmartyHeaderCode:280534f2d45f0dedfa6-80278323%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34fc57007ea9d2677729e8365eb18b364fb90667' => 
    array (
      0 => 'plugin/workgroup/html/workgroup_chatroom_view.html',
      1 => 1328367084,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '280534f2d45f0dedfa6-80278323',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_html_leanmodal')) include 'C:\wamp\www\transeo\lib\smarty\plugins\function.html_leanmodal.php';
?><input type="hidden" name="id_chatroom" id="id_chatroom" value="<?php echo $_smarty_tpl->getVariable('id_chatroom')->value;?>
" />
<input type="hidden" name="id_user" id="id_user" value="<?php echo $_smarty_tpl->getVariable('id_user')->value;?>
" />

<h1><?php echo $_smarty_tpl->getVariable('chatroom')->value['name'];?>
</h1>
<div id="workgroup_chatroom">
	<div class="rightcol">
		<h2>Online member(s)</h2>
		
		<div id="chatroom_onlinemember">
		</div>
		
		<h2>Files</h2>
		
		<div id="chatroom_file">
		</div>
		
		<p><a href="#chatroomUpload" class="leanModal_button button_link">Upload</a></p>
		
		<div id="chatroom_loading" style="display: none;">
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
chat/images/loading.gif" width="24" height="24" title="Loading" alt="Loading" />
		</div>
	</div>
	
	<div class="leftcol">
		<div id="chatroom_message">
		</div>
		
		
		<div class="button_send">
			<input type="button" onclick="chatRoomSend()" value="Send" />
		</div>
		
		<textarea id="chatroom_input" cols="73" rows="4"></textarea>
	</div>
	
	<div class="clearfix"></div>
</div>

<?php echo smarty_function_html_leanmodal(array('id'=>"chatroomUpload",'content_template'=>($_smarty_tpl->getVariable('PATH_PLUGIN')->value)."workgroup/html/workgroup_chatroom_view_uploadwindow.html",'title'=>"File Upload"),$_smarty_tpl);?>
