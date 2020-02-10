<?php



require_once 'main_model.php';
require_once 'main_view.php';



/**
 *	Контроллер приложения Новости
 */
class Main_Controller
{
	private static
		$_auth = false;
	
	function __construct()
	{
		if ( isset( $_GET['logout'] ) )
		{
			User::logout();
			header( 'Location: /' . trim( parse_url($_SERVER['REQUEST_URI'])['path'], '/' ) );
		}
		else
		{
			self::$_auth = User::auth();
		}
	}




	/**
	 *	Метод Идентификации категории, страницы или записи
	 *	Запись информации о странице
	 *	Перенаправление на необходимый метод
	 */
	public function actionIdentify($name, $category)
	{
		//$auth =
		//var_dump(self::$_auth) ;


		if ( $category == '' ) $category = null;
		if ( $name == '' ) $name = null;
		$identify = Main_Model::identify($name, $category);
		//echo '<pre>';
		//var_dump($identify);

		if ( $identify )
		{
			User::Auth();
			//var_dump($_SESSION);
			if ( User::im('rank') >= $identify['protection'])
			{
				$pageInfo = $identify;
			}
			else
			{
				//print_r($_POST);

				$pageInfo = array
				(
					'type'		=>	'login',
					'id'		=>	null,
					'name'		=>	'login',
					'title'		=>	'Вход/Регистрация',
				);
			}
			//print_r($identify);
			/****$pageInfo = $identify['result'];
			$pageInfo['type'] = $identify['type'];****/
			//////$pageInfo = $identify;
			/*$pageInfo = array
			(
				'type'		=>	$identify['type'],
				'id'		=>	$identify['result']['id'],
				'name'		=>	$identify['result']['name'],
				'title'		=>	$identify['result']['title'],
			);*/
		}
		else
		{
			$pageInfo = array
			(
				'type'		=>	'404',
				'id'		=>	null,
				'name'		=>	'404',
				'title'		=>	'404',
			);
		}
		//var_dump($pageInfo);
		//echo '</pre>';
			

		Page::setInfo($pageInfo);

		$action = 'action' . ucfirst($pageInfo['type']);
		self::$action();		
	}




	/**
	 *	Страница
	 */
	public function actionPage()
	{
		Main_View::viewPage();
	}




	/**
	 *	Категория
	 */
	public function actionList()
	{
		Main_View::viewList();
	}




	/**
	 *	Запись
	 */
	public function actionPost()
	{
		Main_View::viewPost();
	}




	/**
	 *	404
	 */
	public function action404()
	{
		Main_View::view404();
	}



	public function actionLogin()
	{
		Main_View::viewLogin();
	}




	/**
	 *	404
	 */
	public function actionEn($str)
	{
		Main_View::viewEn($str);
	}
}