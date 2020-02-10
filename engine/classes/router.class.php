<?php
/**
* 
*/
class Router
{
	private
		$routes;

	public
		$app;


	
	function __construct()
	{
		$this->routes = require_once CONFIG_DIR . 'routes.php';
	}


	/*
	 *	Функция получения запроса из адресной строки
	 */
	private function getUri()
	{
		if ( !empty( $_SERVER['REQUEST_URI'] ) )
		{
			$return = trim( parse_url($_SERVER['REQUEST_URI'])['path'], '/' );
			return $return;
		}
		return false;
	}

	public function run()
	{
		//	получаем строку запроса
		$uri = $this->getUri();

		//	Проверяем на соответствие заданным роутам
		foreach ($this->routes as $pattern => $path)
		{

			//	Совпадение найдено
			if ( preg_match( "#$pattern#", $uri ) )
			{
				//	Преобразуем строку $uri по паттерну $pattern
				//	в переменную $internalRoute используя  шаблон $path
				$internalRoute = preg_replace( "#$pattern#", $path, $uri );
				//	Преобразуем строку в массив
				$segments = explode('|', $internalRoute);

				//	Определяем Имя приложения
				define( 'APP_NAME', ucfirst( array_shift( $segments ) ) );
				//	Определяем Имя контроллера
				$controllerName = APP_NAME . '_controller';
				//	Определяем Метод контроллера
				$actionName = 'action' . ucfirst( array_shift( $segments ) );
				//	Определяем Константу пути к папке приложения
				define( 'APP_DIR', APPS_DIR . mb_strtolower( APP_NAME ) . '/' );
				//	Определяем Путь к контроллеру проложения
				$controllerFile = mb_strtolower( APP_DIR . $controllerName . '.php' );
				//	Проверяем наличие файла контроллера приложения


				if ( file_exists($controllerFile) )
				{
					//	Подключаем файл контроллера приложения
					require_once $controllerFile;
					//	Создаем экземпляр приложения
					$this->app = new $controllerName;
					//	Вызываем метод $actionName класса $this->app, передавая ему параметры из массива $segments
					//			Параметры массива $segments будут переданны как отделные переменные по порядку
					//			Например:	appName::actionName( $segments[0], $segments[1], ... );
					call_user_func_array(array($this->app, $actionName), $segments);
				}
				//	Завершаем цикл проверки роутов
				break;
			}
		}



		/*
		 *
		 */
		if ( $this->app )
		{
			//echo "\r\n\r\nROUTER:\tAPPLICATION EXIST";
		}
		else
		{
			//echo "\r\n\r\nROUTER:\tAPPLICATION DOES NOT EXIST";
		}
		//echo "\r\n\r\n----\t#End\tRouter::run \t----\r\n\r\n";
	}
}