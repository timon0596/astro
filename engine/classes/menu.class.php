<?php

/**
* 
*/
class Menu
{
	private static
		$_menu = array();



	public static function get($name = null)
	{
		if ( !isset( self::$_menu[$name] ) )
		{
			$result = Db::db_select('menu',['name'=>$name],null,'id');
			if ( $result )
			{
				$act = Page::getInfo('id');
				$tmp_act_arr = get_parents( $act, false, true );
				//var_dump( $tmp_act_arr );
				foreach ($tmp_act_arr as $key => $value) {
					$act_arr[$value] = $key;
				}
				//var_dump( $act_arr );
				foreach ($result as $key => $item) {
					//$item['act'] = ( $item['value'] == $act ? true : false );
					$item['act'] = ( in_array( $item['value'], $act_arr) ? ( $item['value'] == $act ? 1 : 0 ) : -1 );
					/*echo '<pre>';
					echo $item['value'];
					var_dump( $item['act'] );
					echo '</pre>';*/
					//$act_id = $item['id'];
					$arr[ $item['parent'] ][$key] = $item;
				}
				//echo '<pre>';
				//print_r( Page::getInfo('id') );
				//print_r($arr);
				//print_r( get_parents( $act, false, true ) );
				//echo '</pre>';

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

			if ( $item['table'] != null )
			{
				$tmp = Db::db_select( $item['table'], $item['value'] );
				if ( $tmp ) 
				{
					$tmp = $tmp[0];
					$implode2 = '/' . implode('/', Post::parents( $tmp['id'],true,true ) );
					$return[$key]['link'] = $implode2;
					
					if ( $return[$key]['title'] == null )
						$return[$key]['title'] = $tmp['title'];
				}
			}
			else
			{
					$return[$key]['link'] = $item['value'];
			}

			if ( isset( $arr[$key] ) )
			{
				$return[$key]['list'] = self::subGet( $arr, $key );
			}
		}
		$return = self::sort( $return );

		return $return;
	}




	private static function sort( $array )
	{
		//	Вспомогательные массивы
		$sort = array();
		$unsort = array();

		//	Разбиваем массив элементов меню по необходимости в сортировке
		foreach ($array as $key => $item) {
			//	Если имеет номер сортировки
			if ( $item['sort'] !== null )
			{
				$sort[$key] = $item;
			}
			//	Если не имеет номера сортировки
			else
			{
				$unsort[$key] = $item;
			}
		}
		//	Сортируем элементы меню с заданными сортировочными номерами
		usort( $sort, 'self::sort_callback' );
		//	В конец отсортированного массива прибавляем не сортированные элементы
		$return = $sort + $unsort;
		//	Возвращаем результат
		return $return;
	}

	private static function sort_callback( $a, $b )
	{
		if ( $a['sort'] == $b['sort'] ) return 0;
		return ( $a['sort'] > $b['sort'] ? 1 : -1);
	}
}