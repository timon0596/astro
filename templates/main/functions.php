<?php


/**
 *	Функция добавления css, js
 */
function links()
{
	add_script(
		'dx-slider',		//	Name
		BASE_JS . 'dx-slider.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);
	
	add_script(
		'viewportchecker',		//	Name
		BASE_JS . 'jquery.viewportchecker.js',	//	Path
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
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/js/' . 'main.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);

	/*add_script(
		'base-fonts',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'fonts.js',	//	Path
		time(),		//	version
		true,		//	in header
		true		//	jquery
	);*/
	add_style(
		'font-awesome',		//	Name
		BASE_CSS . 'font-awesome-all.css',	//	Path
		time(),		//	version
		true		//	in header
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
		'slick',		//	Name
		BASE_CSS . 'slick.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'slick-theme',		//	Name
		BASE_CSS . 'slick-theme.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'main',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'main.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'media',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'media.css',	//	Path
		time(),		//	version
		true		//	in header
	);

	add_style(
		'fonts-main',		//	Name
		'/' . TEMPLATES_URI . Site::getOptions('template') . '/css/' . 'fonts.css',	//	Path
		time(),		//	version
		true		//	in header
	);
}
links();