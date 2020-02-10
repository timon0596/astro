<?php

/**
* 
*/
class Compilation_Controller
{

	/*
	 *
	 */
	public function actionStart($name, $method = 'get')
	{
		if ( file_exists( APP_DIR . 'compilation_model.' . $name . '.php') ) require_once APP_DIR . 'compilation_model.' . $name . '.php';
		//if ( file_exists( APP_DIR . 'compilation_view.' . $name . '.php') ) require_once APP_DIR . 'compilation_view.' . $name . '.php';
		require_once APP_DIR . 'compilation_view.php';

		$result = Compilation_Model::$method();

		Compilation_View::view( $result );

	}

	/*
	 *
	 */
	public function actionGoods()
	{
		echo 'Это Compilation_Controller - actionGoods()';
	}
}