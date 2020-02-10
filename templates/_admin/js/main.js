/*jQuery(document).ready(function($) {
	$(function(){$('.text-editor').redactor();});
	//$('.text-editor').trumbowyg();
})*/
jQuery(document).ready(function($) {
	//$(function(){$('.text-editor').redactor();});
	CKEDITOR.replace( 'text-editor' );
})