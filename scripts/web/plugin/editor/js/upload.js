function editorChildExpandIframe(uid)
{
	window.parent.editorParentExpandIframe(uid);
}
function editorParentExpandIframe(uid)
{
	$("#iframeUpload_"+uid).height(220);
}