<?php


/**
 *	Функция добавления css, js
 */
function links()
{
	
	
	add_script(
		'viewportchecker',		//	Name
		BASE_JS . 'jquery.viewportchecker.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
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
		'/plugins/ckeditor/' . 'ckeditor.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	
	add_script(
		'maskedinput',		//	Name
		BASE_JS . 'jquery.maskedinput.min.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);

	add_script(
		'slick',		//	Name
		BASE_JS . 'slick.min.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	
	add_script(
		'base',		//	Name
		BASE_JS . 'base.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	
	add_script(
		'main',		//	Name
		'/' . TEMPLATES_URI . 'admin' . '/js/' . 'main.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);




	add_style(
		'fonts',		//	Name
		BASE_CSS . 'fonts.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'root',		//	Name
		BASE_CSS . 'root.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'base',		//	Name
		BASE_CSS . 'base.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'base-media',		//	Name
		BASE_CSS . 'base.media.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'animate',		//	Name
		BASE_CSS . 'animate.css',	//	Path
		time(),		//	version
		true		//	in header
	);
	
	add_style(
		'main',		//	Name
		'/' . TEMPLATES_URI . 'admin' . '/css/' . 'main.css',	//	Path
		time(),		//	version
		true		//	in header
	);
}
links();