<?php

/**
 * 	Класс ядра
 */
class Core {
	
	function __construct()
	{
		//$site = new Site();
		require_once CORE_DIR . 'functions.php';

		//User::logout();
		//User::login('god','ralavada');
		//print_r( User::im() );
		//print_r( User::get(2) );

		$router = new Router();
		$router->run();
	}
}