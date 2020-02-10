<?php

/**
* 
*/
class Menu
{
	private static
		$_menu = array();


	/*public static function get($name = null)
	{
		if ( !isset( self::$_menu[$name] ) )
		{
			$result = Db::db_select('menu', [ 'name' => $name ], null, 'id');

			if ( $result )
			{
				//print_r( $result );
				$act = Page::getInfo('id');

				foreach ($result as $key => $item)
				{
					$result[$key]['act'] = ( $item['value'] == $act ? true : false );

					if ( $item['table'] != null )
					{
						$tmp = Db::db_select( $item['table'], $item['value'] );

						if ( $tmp ) 
						{
							$tmp = $tmp[0];
							$implode = null;
							$parent =  $tmp['parent'];

							$parents[$parent] = Post::get( $parent, 'name' );

							if ( $parent != null )
							{
								$implode = implode('/', $parents);
							}
							//var_dump( $implode );
							//var_dump( $implode2 );

							$result[$key]['value'] = $implode . '/' . $tmp['name'];

							$implode2 = '/' . implode('/', Post::parents( $tmp['id'],true,true ) );
							$result[$key]['value'] = $implode2;

							if ( $result[$key]['title'] == null )
								$result[$key]['title'] = $tmp['title'];
						}
					}

				}

				$result = self::sort( $result );

				self::$_menu[$name] = $result;
			}
			else
			{
				return false;
			}
		}
		return self::$_menu[$name];
	}*/
	public static function get($name = null)
	{
		//var_dump( $arr );
		if ( !isset( self::$_menu[$name] ) )
		{
			$result = Db::db_select('menu',['name'=>$name],null,'id');
			if ( $result )
			{
				$act = Page::getInfo('id');
				foreach ($result as $key => $item) {
					$item['act'] = ( $item['value'] == $act ? true : false );
					$arr[ $item['parent'] ][$key] = $item;
				}

				$return = self::subGet( $arr );

				self::$_menu[$name] = $return;
			}
			else
			{
				return false;
			}
		}
		return self::$_menu[$name];
	}


	private static function subGet( $arr, $parent = null )
	{
		foreach ($arr[$parent] as $key => $item)
		{
			$return[$key] = $item;
			//unset( $return[$key]['parent'] );
			//unset( $return[$key]['table'] );

			if ( $item['table'] != null )
			{
				$tmp = Db::db_select( $item['table'], $item['value'] );
				if ( $tmp ) 
				{
					/*$implode = null;
					$parent =  $tmp[0]['parent'];
					$parents[$parent] = Post::get( $parent, 'name' );
					if ( isset( $parents[null] ) )
					{
						unset( $parents[null] );
					}

					if ( is_array( $parents ) )
					{
						$implode = implode('/', $parents);
					}
					else
					{
						$implode = $parents;
					}
					$implode = ( $implode == '' ? null : '/' . $implode );
					$return[$key]['value'] = $implode . '/' . $tmp[0]['name'];*/
					$tmp = $tmp[0];
					$implode2 = '/' . implode('/', Post::parents( $tmp['id'],true,true ) );
					$return[$key]['value'] = $implode2;
					
					if ( $return[$key]['title'] == null )
						$return[$key]['title'] = $tmp['title'];
				}
			}

			if ( isset( $arr[$key] ) )
			{
				$return[$key]['list'] = self::subGet( $arr, $key );
			}
		}

		return $return;
	}




	private static function sort( $array )
	{
		//	Вспомогательные массивы
		$sort = array();
		$unsort = array();

		//	Разбиваем массив элементов меню по необходимости в сортировке
		foreach ($array as $item) {
			//	Если имеет номер сортировки
			if ( $item['sort'] !== null )
			{
				array_push( $sort , $item);
			}
			//	Если не имеет номера сортировки
			else
			{
				array_push( $unsort , $item);
			}
		}
		//	Сортируем элементы меню с заданными сортировочными номерами
		usort( $sort, 'self::sort_callback' );
		//	В конец отсортированного массива прибавляем не сортированные элементы
		$return = array_merge( $sort, $unsort );
		//	Возвращаем результат
		return $return;
	}

	private static function sort_callback( $a, $b )
	{
		/*echo $a['title'] . ' '; var_dump( $a['sort'] );
		echo $b['title'] . ' '; var_dump( $b['sort'] );
		echo '<br>';
		if ( $a['sort'] === null )
		{
			if ( $b['sort'] === null )
			{
				echo '(0)';
				echo '<br>';
				echo '<br>';
				return 0;
			}
			else
			{
				echo '(1)';
				echo '<br>';
				echo '<br>';
				return 1;
			}
		}
		else
		{
			if ( $b['sort'] === null )
			{
				echo '(-1)';
				echo '<br>';
				echo '<br>';
				return -1;

			}
			else
			{*/
				if ( $a['sort'] == $b['sort'] ) return 0;
				return ( $a['sort'] > $b['sort'] ? 1 : -1);
			/*}
		}*/
	}
}