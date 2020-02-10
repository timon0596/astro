jQuery(document).ready(function($) {
	//$(function(){$('.text-editor').redactor();});
	//CKEDITOR.replace( 'text-editor' );
	$.each($('.text-editor'), function(key,item) {
		//console.log(item.id);
		CKEDITOR.replace(item.id);
	});
	/*CKEDITOR.replace( 'text-editor-content' );
	CKEDITOR.replace( 'text-editor-content_fr' );
	CKEDITOR.replace( 'text-editor-content_es' );
	CKEDITOR.replace( 'text-editor-content_ru' );*/
})