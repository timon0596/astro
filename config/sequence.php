<?php


/*
 *	Константы:
 */
require_once ROOT_DIR . 'config/constans.php';



/**
 * Функция автозагрузки классов
 */
function classes_autoload($class) {
	$class_file = CORE_DIR . 'classes/' . mb_strtolower( $class ) . '.class.php';
	require_once $class_file;
}
/**
 * Автозагрузчик классов
 */
spl_autoload_register('classes_autoload');



/**
 * Запускаем сессии
 */
session_start();



/**
 * Запускаем Ядро
 */
$core = new Core();