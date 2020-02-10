<?php


/**
 *	Функция добавления css, js
 */
function links()
{
	add_script(
		'base',		//	Name
		BASE_JS . 'base.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	
	add_script(
		'dx-slider',		//	Name
		BASE_JS . 'dx-slider.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);

	add_script(
		'main',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/js/' . 'main.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);



	add_style(
		'main',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'main.css',	//	Path
		time(),		//	version
		false		//	in header
	);

	add_style(
		'fonts',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'fonts.css',	//	Path
		time(),		//	version
		false		//	in header
	);
}
links();