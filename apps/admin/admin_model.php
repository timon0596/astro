<?php



/**
 *	Модель приложения Новости
 */
class Admin_Model
{
	private static
		$_info = null,
		$_part = null;

	public static function setInfo( $info )
	{
		if ( $info['action'] )
		{
			if ( in_array($info['action'], [ 'edit', 'del' ]) && !$info['id'] )
			{
				header('Location: /admin/');
			}
			$info['type'] = 'page';
		}
		else
		{
			$info['type'] = self::get_part( $info['name'], 'type' );
		}
		//$info['intype'] = self::get_part( $info['name'], 'intype' );

		self::$_info = $info;
		return self::$_info;
	}

	public static function getInfo( $key = null )
	{
		$return = self::$_info;
		if ( $key !== null )
		{
			$return = $return[$key];
		}
		return $return;
	}

	public static function getAction()
	{
		$action = self::getInfo('type');
		if ( $action )
		{
			$return = 'action' . ucfirst( $action );
		}
		else
		{
			$return = false;
		}
		return $return;
	}





	public static function get_part($name = null, $property = null)
	{
		/*$events = Post::childs(3,0,false);
		$events = array_keys($events);
		$all = array_merge([2,3,5,8,57], $events);
		$events = implode('|', $events);
		$all = implode('|', $all);*/
		/*echo '<pre>';
		print_r($all);
		echo '</pre>';*/
		$return = array
			(
				'index'	=>	array
				(
					'name'	=>	'index',
					'root'	=>	3,
					'title'	=>	'Главная',
					'type'	=>	'page',
					'table'	=>	'posts',
					'where'	=>	['type'=>'page', 'name'=>null]
				),
				'lists'	=>	array
				(
					'name'	=>	'lists',
					'root'	=>	5,
					'title'	=>	'Страницы',
					'type'	=>	'list',
					'intype'=>	'list',
					'table'	=>	'posts',
					'where'	=>	['type'=>'list'],
					'item'	=>	array
					(
						'title'	=>	'Страница'
					)
				),
				'posts'	=>	array
				(
					'name'	=>	'lists',
					'root'	=>	5,
					'title'	=>	'Записи',
					'type'	=>	'list',
					'intype'=>	'post',
					'table'	=>	'posts',
					'where'	=>	['type'=>'post'],
					'item'	=>	array
					(
						'title'	=>	'Запись'
					)
				),
				'prices'	=>	array
				(
					'name'	=>	'prices',
					'root'	=>	5,
					'title'	=>	'Цены',
					'type'	=>	'list',
					'intype'=>	'price',
					'table'	=>	'posts',
					'where'	=>	['type'=>'price'],
					'item'	=>	array
					(
						'title'	=>	'Запись'
					)
				),
				/*'rubrics'	=>	array
				(
					'name'	=>	'rubrics',
					'root'	=>	5,
					'title'	=>	'Рубрики',
					'type'	=>	'list',
					'table'	=>	'rubrics',
					'where'	=>	null,
					'item'	=>	array
					(
						'title'	=>	'Рубрика'
					)
				),*/
				/*'generals'	=>	array
				(
					'name'	=>	'lists',
					'root'	=>	5,
					'title'	=>	'Основные',
					'type'	=>	'list',
					'intype'=>	'list',
					'table'	=>	'posts',
					//'where'	=>	['type'=>'list','parent'=>null],
					'where'	=>	"`type`='list' && (`parent` IS NULL || `parent` NOT REGEXP '^($all)\$')",
					'item'	=>	array
					(
						'title'	=>	'Категория'
					)
				),*/
				'media'	=>	array
				(
					'name'	=>	'media',
					'root'	=>	5,
					'title'	=>	'Медиафайлы',
					'type'	=>	'list',
					'table'	=>	'media',
					'where'	=>	null,
					'item'	=>	array
					(
						'title'	=>	'Медиафайл'
					)
				),

				/*'pages'	=>	array
				(
					'name'	=>	'pages',
					'root'	=>	5,
					'title'	=>	'Страницы',
					'type'	=>	'list',
					'table'	=>	'posts',
					'where'	=>	['type'=>'post','type'=>'page'],
					'item'	=>	array
					(
						'title'	=>	'Страница'
					)
				),
				'posts'	=>	array
				(
					'name'	=>	'posts',
					'root'	=>	5,
					'title'	=>	'Записи',
					'type'	=>	'list',
					'table'	=>	'posts',
					'where'	=>	['type'=>'post'],
					'item'	=>	array
					(
						'title'	=>	'Запись'
					)
				),*/
				'slider'	=>	array
				(
					'name'	=>	'slider',
					'root'	=>	5,
					'title'	=>	'Слайдер',
					'type'	=>	'list',
					'table'	=>	'posts',
					'where'	=>	['type'=>'slide'],
					'item'	=>	array
					(
						'title'	=>	'Слайд'
					)
				),
				/*'filters'	=>	array
				(
					'name'	=>	'filters',
					'root'	=>	5,
					'title'	=>	'Фильтры',
					'type'	=>	'list',
					'table'	=>	'filters',
					'where'	=>	null,
					'item'	=>	array
					(
						'title'	=>	'Фильтр'
					)
				),*/
				/*'users'	=>	array
				(
					'name'	=>	'users',
					'title'	=>	'Пользователи',
					'type'	=>	'list',
					'table'	=>	'users',
					'where'	=>	null,
					'item'	=>	array
					(
						'title'	=>	'Пользователь'
					)
				),
				'actions'	=>	array
				(
					'name'	=>	'actions',
					'title'	=>	'События',
					'type'	=>	'list',
					'table'	=>	'actions',
					'where'	=>	null,
					'item'	=>	array
					(
						'title'	=>	'Событие'
					)
				),
				'settings'	=>	array
				(
					'name'	=>	'settings',
					'title'	=>	'Настройки',
					'type'	=>	'page',
					'table'	=>	'options',
					'where'	=>	null,
				)*/
			);
		if ( isset( $return[$name] ) )
		{
			$return = $return[$name];

			if ( $property !== null)
			{
				if ( isset( $return[$property] ) )
				{
					$return = $return[$property];
				}
				else
				{
					$return = false;
				}
			}
		}

		return $return;
	}
}