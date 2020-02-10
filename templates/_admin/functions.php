<?php


/**
 *	Функция добавления css, js
 */
function links()
{
	add_style(
		'redactor',		//	Name
		BASE_CSS . 'redactor.css',	//	Path
		time(),		//	version
		true		//	in header
	);
	
	add_script(
		'redactor',		//	Name
		BASE_JS . 'redactor.min.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	add_script(
		'ckeditor',		//	Name
		'/ckeditor/' . 'ckeditor.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);

	/*
	add_style(
		'trumbowyg',		//	Name
		BASE_CSS . 'trumbowyg.css',	//	Path
		time(),		//	version
		true		//	in header
	);
	add_script(
		'trumbowyg',		//	Name
		BASE_JS . 'trumbowyg.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	*/
	
	add_script(
		'main',		//	Name
		'/' . TEMPLATES_URI . 'admin' . '/js/' . 'main.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);

	add_style(
		'main',		//	Name
		'/' . TEMPLATES_URI . 'admin' . '/css/' . 'main.css',	//	Path
		time(),		//	version
		true		//	in header
	);
}
links();