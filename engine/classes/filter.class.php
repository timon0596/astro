<?php

/**
* 
*/
class Filter
{
	private static
		$_list = null;
	
	function __construct()
	{
	}





	/*
	 *	Функция получения списка Фильтров
	 *
	 *	Возвращает массив свойств фильтров
	 *
	 */
	public static function getList()
	{
		if ( self::$_list == null )
		{
			$tmp = Db::db_select('filters',null,null,'id');
			self::$_list = array();
			if ( is_array( $tmp ) )
			{
				foreach ($tmp as $key => $value)
				{
					self::$_list[$key] = $value;
				}
			}
		}

		return self::$_list;
	}








	/*
	 *	Функция Получения свойств категории по ее id
	 *
	 *	Принимает 
	 *		id категории
	 *		указанное свойство	-	[необязательно]
	 *
	 *	Возвращает 
	 *		1 аргумент	-	массив свойств
	 *		2 аргумента	-	одно свойство
	 *
	 */
	public static function getInfo($id,$property=null)
	{
		if ( isset( self::getList()[$id] ) )
		{
			$return = self::getList()[$id];

			if ( $property != null )
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
		else
		{
			$return = false;
		}
			

		return $return;
	}

	public static function getElements( $id )
	{
		//	Получаем информацию о фильтре
		$filter = self::getInfo( $id );

		//	Если фильтр существует
		if ( $filter )
		{

			//	Определяем родителя к которому будут принадлежать элементы результата
			if ( $filter['parent'] != null )
			{
				$parent = $filter['parent'];
			}
			else
			{
				$parent = self::getInfo( $filter['of'] )['parent'];
			}

			//	Если есть определяющее условие
			if ( $filter['value'] != null )
			{
				//	Ищем по условию
				$where = json_decode( $filter['value'] );
				$where += ['type'=>'post'];
			}
			else
			{
				//	Ищем по принадлежности элемента к фильтру
				$where = [ 'type' => 'post', [ 'filters', 'LIKE', '%' . $id . '%' ] ];
				$revise = true;
			}
			//	Получаем результаты
			$return = Db::db_select('posts', $where, null, 'id');

			//	Если задана проверка по id фильтра
			if ( isset( $revise ) && is_array( $return ) )
			{
				//	Выбираем только те результаты фильтр которых совпадает с заданным
				$tmp = array();
				foreach ($return as $key => $item) {
					$filters = explode( ',', $item['filters'] );
					if ( in_array($id, $filters) )
					{
						$tmp[$key] = $item;
					}
				}
				$return = $tmp;
			}

			if ( $return )
			{
				$tmp = array();
				//	Выбираем только те результаты которые относятся к заданному родителю
				foreach ($return as $key => $item) {
					$parents = array();
					foreach (Post::parents($key) as $name) {
						array_push( $parents, Post::get( $name, 'id' ) );
					}
					if ( in_array( $parent, $parents) )
					{
						$tmp[$key] = $item;
					}
				}
				$return = $tmp;
			}
		}
		else
		{
			$return = false;
		}

		return $return;
	}





	/*
	 *	Функция получения массива фильтров с их значениями
	 *
	 *
	 */
	public static function get( $id_posts = null )
	{

		$parents = array();
		foreach ( Post::parents( $id_posts, true, true ) as $key => $value ) {
			array_push( $parents, $key);
		}
		$list = self::getList();

		$tmp = array();
		foreach ($list as $key => $item) {
			$tmp[ $item['of'] ][$key] = $item;
		}
		ksort( $tmp );

		$return = false;
		foreach ($tmp as $of => $items) {
			if ( $of == null )
			{
				foreach ($items as $key => $item) {
					if ( in_array( $item['parent'], $parents ) )
					{
						$return[$key] = $item;
					}
				}
			}
			else
			{
				foreach ($items as $key => $item) {
					if ( isset( $return[$of] ) )
					{
						$return[$of]['list'][$key] = $item;
					}
				}
			}
		}

		return $return;
	}
}