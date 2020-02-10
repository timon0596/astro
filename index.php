<?php

////////////////////////
//$start = microtime(true);
////////////////////////

ini_set('display_errors',1);
error_reporting(E_ALL);


/*
 *	Константа корневой дериктории сайта
 */
define( 'ROOT_DIR', str_replace( '\\', '/', getcwd() ) . '/' );
/**
 *	Константа дериктории параметров
 */
define( 'CONFIG_DIR', ROOT_DIR . 'config/' );


/**
 *	Подключаем основной файл сценария
 */
require_once CONFIG_DIR . 'sequence.php';




////////////////////////
//echo '<br><br> Время выполнения скрипта: '.(microtime(true) - $start).' сек.';
////////////////////////

/*try
{
	//	Подключаем основной файл сценария
	if ( file_exists( ROOT_DIR . 'sequence.php' ) )
	{
		require_once ROOT_DIR . 'sequence.php';
	}
	else {
		throw new Exception("Файл \"sequence.php\" не найден.",1);
	}
}
catch (Exception $e)
{
	echo "<pre>";
	echo "\r\n\tgetMessage:\t".$e->getMessage();
	echo "\r\n\tgetCode:\t".$e->getCode();
	echo "\r\n\tgetFile:\t".$e->getFile();
	echo "\r\n\tgetLine:\t".$e->getLine();
	echo "</pre>";
}*/
