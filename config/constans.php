<?php


/**
 *	CORE_DIR		-	Дериктория ядра
 */
define( 'CORE_DIR', ROOT_DIR . 'engine/' );
/**
 *	APPS_DIR		-	Дериктория приложений
 */
define( 'APPS_DIR', ROOT_DIR . 'apps/' );
/**
 *	TEMPLATES_URI	-	Путь к шаблонам
 *	TEMPLATES_DIR	-	Дериктория шаблонов
 */
define( 'TEMPLATES_URI', 'templates/' );
define( 'TEMPLATES_DIR', ROOT_DIR . TEMPLATES_URI );
/**
 *	RESOURCES_URI	-	Путь к ресурсам
 *	RESOURCES_DIR	-	Дериктория ресурсов
 */
define( 'RESOURCES_URI', 'resources/' );
define( 'RESOURCES_DIR', ROOT_DIR . RESOURCES_URI );

define( 'JQUERY', '/' . RESOURCES_URI . 'js/jquery-3.2.1.min.js' );
//define( 'JQUERY', '/' . RESOURCES_URI . 'js/jquery-3.3.1.min.js' );
define( 'BASE_CSS', '/' . RESOURCES_URI . 'css/' );
define( 'BASE_JS', '/' . RESOURCES_URI . 'js/' );

define( 'MEDIA_URI', RESOURCES_URI . 'media/' );
define( 'MEDIA_DIR', ROOT_DIR . MEDIA_URI );

define( 'TMP_URI', RESOURCES_URI . 'media/tmp/' );
define( 'TMP_DIR', ROOT_DIR . TMP_URI );
define( 'IMAGE_URI', RESOURCES_URI . 'media/image/' );
define( 'IMAGE_DIR', ROOT_DIR . IMAGE_URI );
define( 'VIDEO_URI', RESOURCES_URI . 'media/video/' );
define( 'VIDEO_DIR', ROOT_DIR . VIDEO_URI );
/**
 *	CSS_URI			-	Путь к базовому набору стилей
 *	CSS_DIR			-	Дериктория базового набора стилей
 */
define( 'CSS_URI', RESOURCES_URI . 'css' );
define( 'CSS_DIR', ROOT_DIR . CSS_URI );
/**
 *	CSS_URI			-	Путь к базовому набору скриптов
 *	CSS_DIR			-	Дериктория базового набора скриптов
 */
define( 'JS_URI', RESOURCES_URI . 'css' );
define( 'JS_DIR', ROOT_DIR . CSS_URI );