<?php /* Smarty version Smarty-3.0.7, created on 2012-02-16 11:00:47
         compiled from "plugin/editor/html/editor.html" */ ?>
<?php /*%%SmartyHeaderCode:193264f3cd3cf1e10a4-21159177%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f19f9370bf9c92ef04c5a41dcf3b0a2d9b76248e' => 
    array (
      0 => 'plugin/editor/html/editor.html',
      1 => 1329352268,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193264f3cd3cf1e10a4-21159177',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="div_editor">
	<?php if ($_smarty_tpl->getVariable('enable_formtag')->value){?>
	<form>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('enable_toolbar')->value){?>
		<p id="editor_toolbar">
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_bold.png" alt="Bold" title="Bold" onclick="addTag('[b]', '[/b]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_italic.png" alt="Italic" title="Italic" onclick="addTag('[i]', '[/i]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_underline.png" alt="Underline" title="Underline" onclick="addTag('[u]', '[/u]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_stroke.png" alt="Stroke" title="Stroke" onclick="addTag('[s]', '[/s]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_image.png" alt="Image" title="Image" onclick="addTag('[img]', '[/img]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			<img src="<?php echo $_smarty_tpl->getVariable('TPL')->value;?>
images/icons/page_goback.png" title="Upload an image" alt="Upload an image" onclick='$("#iframeUpload_<?php echo $_smarty_tpl->getVariable('token')->value;?>
").slideToggle()'' />
			
			<img src="<?php echo $_smarty_tpl->getVariable('PATH_PLUGIN')->value;?>
editor/images/bbcode_url.png" alt="Url" title="Url" onclick="addTag('[url]', '[/url]', 'text<?php echo $_smarty_tpl->getVariable('token')->value;?>
')"/>
			
			<select id="select_color" onchange="selectChange('text<?php echo $_smarty_tpl->getVariable('token')->value;?>
', 'select_color', 'color', 'Color in hexadecimal (add #).');" tabindex="-1">
				<option value="none">-- Color --</option>
				<option value="red">Red</option>
				<option value="green">Green</option>
				<option value="blue">Blue</option>
				<option value="yellow">Yellow</option>
				<option value="orange">Orange</option>
				<option value="other">Other</option>
			</select>
			
			<select id="select_size" onchange="selectChange('text<?php echo $_smarty_tpl->getVariable('token')->value;?>
','select_size', 'size', 'Size in px.')" tabindex="-1">
				<option value="none">-- Size --</option>
				<option value="9">Very small</option>
				<option value="11">Small</option>
				<option value="24">Big</option>
				<option value="36">Very Big</option>
			</select>
			
			<select id="select_title" onchange="selectChange('text<?php echo $_smarty_tpl->getVariable('token')->value;?>
','select_title', 'title', 'Title level.')" tabindex="-1">
				<option value="none">-- Title --</option>
				<option value="1">Title 1</option>
				<option value="2">Title 2</option>
				<option value="3">Title 3</option>
				<option value="4">Title 4</option>
				<option value="5">Title 5</option>
				<option value="6">Title 6</option>
			</select>
			
			<!-- <select id="select_font" onchange="selectChange('text<?php echo $_smarty_tpl->getVariable('token')->value;?>
','select_font', 'font', 'Font name.')" tabindex="-1">
				<option value="none">-- Font --</option>
			</select> -->
			
		</p>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('enable_preview')->value){?>
		<p>
			<input type="checkbox" id="bbcode_enableAutorefresh" checked="checked" tabindex="-1"/> 
			: <label for="bbcode_enableAutorefresh">Preview</label>
		</p>
		<?php }?>
		<?php if ($_smarty_tpl->getVariable('enable_toolbar')->value){?>
		<iframe src="?UploadPage/<?php echo $_smarty_tpl->getVariable('token')->value;?>
" frameborder="0" height="50" width="600" scrolling="no" id="iframeUpload_<?php echo $_smarty_tpl->getVariable('token')->value;?>
" style="display: none"></iframe>
		<?php }?>
		<textarea id="text<?php echo $_smarty_tpl->getVariable('token')->value;?>
" rows="<?php echo $_smarty_tpl->getVariable('textarea_row')->value;?>
" cols="<?php echo $_smarty_tpl->getVariable('textarea_col')->value;?>
" <?php if ($_smarty_tpl->getVariable('enable_preview')->value){?>onkeyup="refresh('text<?php echo $_smarty_tpl->getVariable('token')->value;?>
');"<?php }?> name="<?php echo $_smarty_tpl->getVariable('textarea_name')->value;?>
"><?php echo $_smarty_tpl->getVariable('textarea_value')->value;?>
</textarea>
		
	<?php if ($_smarty_tpl->getVariable('enable_formtag')->value){?>
	</form>
	<?php }?>
	<?php if ($_smarty_tpl->getVariable('enable_preview')->value){?>
	<div id="bbcode_preview" class="bbcode_preview">
	</div>
	<?php }?>
</div>