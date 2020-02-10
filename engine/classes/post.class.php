<?php

/**
* 
*/
class Post
{
	private static
		$_posts = null,
		$_categories = null;








	/*
	 *	Функция Получения свойств записи по ее id или name
	 *
	 *	Принимает 
	 *		id/name категории
	 *		указанное свойство	-	[необязательно]
	 *
	 *	Возвращает 
	 *		1 аргумент	-	массив свойств
	 *		2 аргумента	-	одно свойство
	 *
	 */
	public static function get($id, $property = null)
	{
		//	Проверка id или name
		if ( (string) $id == (string) (int) $id )
		{
			$type = 'id';
		}
		else
		{
			$type = 'name';
		}

		//	Если запись не обрабатываелась
		if ( !isset( self::$_posts[$type][$id] ) )
		{
			//	Ищем запись в базе
			$result = Db::db_select('posts', [$type => $id]);
			//	Запись найдна
			if ( $result )
			{
				$result = $result[0];
				//	Записываем в переменную $_posts для id и name
				self::$_posts[$type][$id] = $result;
				self::$_posts[ ( $type == 'id' ? 'name' : 'id' ) ][ $result[ ( $type == 'id' ? 'name' : 'id' ) ] ] = $result;
			}
			//	Запись не найдна
			else
			{
				//	Записываем false в переменную $_posts
				self::$_posts[$type][$id] = false;
			}
		}

		//	Запоминаем результат
		$return = self::$_posts[$type][$id];
		//	Если запись существует
		if ( self::$_posts[$type][$id] )
		{
			//	Если задано получаемое свойство
			if ( $property != null )
			{
				//	Если заданное свойство корректно (существует в записи)
				if ( in_array( $property, array_keys($return) ) )
				{
					//	Запоминаем результат
					$return = $return[$property];
				}
				else
				{
					//	Запоминаем результат
					$return = false;
				}
			}
		}

		//	Возвращаем результат
		return $return;
	}








	/*
	 *	Функция Получения списка родителей записи
	 *
	 *	Принимает 
	 *		id (или name) категории
	 *		флаг обратного порядка
	 *		флаг включения самого элемента
	 *
	 *	Возвращает 
	 *		массив списка родителей
	 *
	 */
	public static function parents($id = null, $reverce = false, $im = false, $lvl = 0 )
	{
		if ( $id == null ) $id = Page::getInfo( 'id' );
		//	Получаем запись
		$item = self::get( $id );
		//	Если запись получена
		if ( $item )
		{
			//	Получаем родителя
			$parent = $item['parent'];
		}
		//	Если запись не получена
		else
		{
			//	Возращаем с false
			return false;
		}

		//	Запоминаем результат
		//$return = array( $item['id'] => ( $item['name'] == null ? 'index' : $item['name'] ) );
		$return = array( $item['id'] => $item['name'] );

		//	Если родитель существует
		if ( $parent )
		{
			//	Запускаем функцию повторно
			$result = self::parents($parent, false, false, $lvl+1);
			//	Если результат получен
			if ( $result )
			{
				//	Запоминаем результат
				if ( is_array( $result ) )
				{
					$return = $return + $result;
				}
			}
		}

		//	Когда пройдены все циклы и вернулись на нулевой уровень функции
		if ( $lvl == 0 )
		{
			//	Если задан возврат себя же
			if ( $im == false )
			{
				foreach ($return as $key => $value) {
					unset( $return[$key] );
					break;
				}
				//array_shift($return);
			}
			//	Если задан обратный порядок
			if ( $reverce )
			{
				//	обратный порядок с сохранением ключей
				$return = array_reverse($return, true);
			}
		}

		//	Возвращаем результат
		return $return;

	}








	/*
	 *	Функция Получения списка дочерей категории
	 *
	 *	Принимает 
	 *		id (или name) категории
	 *		глубина выходного массива
	 *			- false		-	без ограничений
	 *			- [число]	-	значение глубины
	 *		глубина включаемых в себя подкатегорий на максимальной глубине
	 *			- true		-	включает без ограничений
	 *			- false		-	не включает
	 *			- [число]	-	значение глубины включаемых подкатегорий
	 *
	 *	Возвращает 
	 *		массив списка родителей
	 *
	 */
	public static function childs( $id, $depth = false, $inc = false, $lvl=0)
	{
		//	Проверка id или name
		if ( (string) $id !== (string) (int) $id && $id !== null )
		{
			//	Получаем запись
			$item = self::get( $id );
			//	Если запись получена
			if ( $item )
			{
				//	Получаем id
				$id = $item['id'];
			}
			//	Если запись не получена
			else
			{
				//	Возращаем с false
				return false;
			}
		}
										//	//	Ищем дочерние элементы
										//			по полю parent равному id текущего элемента и по типу list
										//	$sub = Db::db_select( 'posts', [['parent', $id], ['type','list']], null, 'id');
		//	Ищем дочерние элементы
		//		по полю parent равному id текущего элемента и по типу не являющимся 'post'
		//$parent ( $id == null ? ['parent'=>null] )
		$sub = Db::db_select( 'posts', ['parent'=> $id, 'type'=>'list'], null, 'id');

		//	Если дочерние эл-ты найдены
		if ( $sub )
		{
			$next = false;
			//	Если глубина задана
			if ( $depth !== false && $depth !== null )
			{
				//	Если глубина не превышена или 
				if ( $lvl < $depth || $inc === true )
				{
					$next = true;
				}
				else
				{
					if ( $inc !== false )
					{
						if ( $lvl < $depth + $inc  )
						{
							$next = true;
						}
					}
				}
			}
			else
			{
				$next = true;
			}
			//var_dump($id);
			//print_r($sub);
			//	Прокручиваем массив дочерних элементов
			foreach ($sub as $key => $value) {
				if ( $next )
				{
					//	Запускаем функцию повторно
					$result = self::childs( $key, $depth, $inc, $lvl+1 );
					//	Если Уровень Не достиг максимальной глубины или нет ограничений
					if ( $lvl < $depth || $depth === false )
					{
						//	Запоминаем результат ( как вложенный массив )
						$return[$key] = $result;
					}
					//	Если Уровень достиг максимальной глубины
					else
					{
						//	Если результат является массивом
						if ( is_array( $result ) )
						{
							//	Запоминаем результат ( на текущем уровне )
							$return[$key] = true;
							$return = $return + $result;
						}
						//	Если результат Не является массивом
						else
						{
							//	Запоминаем результат
							$return[$key] = true;
						}
					}
				}
				else
				{
					$return[$key] = true;
				}
			}
		}
		//	Если дочерние эл-ты Не найдены
		else
		{
			//	Запоминаем результат
			$return = false;
		}
		
		//	Возвращаем результат
		return $return;
	}








	/*
	 *	Функция Получения списка постов категории
	 *
	 *	Принимает 
	 *		id (или name) категории
	 *		глубина включаемых в себя подкатегорий
	 *			- true		-	включает без ограничений
	 *			- false		-	не включает
	 *			- [число]	-	значение глубины включаемых подкатегорий
	 *		флаг объединения в одномерный массив (без разделения на подкатегории)
	 *
	 *	Возвращает 
	 *		массив (одномерный или двумерный) списка постов категории
	 *
	 */
	public static function getList( $id, $inc = false, $one = false )
	{
		$id = self::get($id, 'id');

		$list = self::childs( $id, 0, $inc);
		if ( !is_array($list) )
		{
			$list = array();
		}
		$list[$id] = true;
		//var_dump($list);

		$return = array();

		foreach ($list as $key => $val)
		{
			$result = Db::db_select('posts',['parent'=>$key,'type'=>'post'],null,'id');
			if ( $result )
			{
				if ( $one )
				{
					$return += $result;
				}
				else
				{
					$return[$key] = $result;
				}
			}
		}

		return $return;
	}





	public static function getUri( $id )
	{
		$parents = self::parents( $id, true, true );
		$uri = '/' . implode('/', $parents);
		return $uri;
	}































	public static function getParents($id, $reverce=false)
	{
		$category = self::get($id, 'parent');
		if ( $category === null)
		{
			return false;
		}

		$category = (int) $category;

		$return[$category] = Category::getInfo($category, 'name');
		$parents = Category::getParents( $category );
		if ( is_array( $parents ) )
		{
			$return = array_merge( $return, $parents );
		}

		if ( $reverce )
		{
			$return =  array_reverse( $return );
		}



		return $return;
	}


	/*public static function getList( $parent, $depth = -1, $inc = true )
	{
		return Category::getElements( $parent, $depth, $inc );
	}*/
}