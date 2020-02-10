<?php

/**
 *	Класс Категорий
 */
class Category
{
	private static
		$_list = null,
		$_embed = null,
		$_parents = null,
		$_categories = null;





	/*
	 *	Функция перебора подкатегорий в массиве категорий $array по имени категории $parent
	 */
	private static function getSub($array,$parent=null)
	{
		foreach ($array[$parent] as $key => $value) {
			if ( isset( $array[$key] ) )
			{
				$getSub = self::getSub($array,$key);
				$result['full'][ $value['name'] ]['id'] = $key;
				$result['full'][ $value['name'] ]['title'] = $value['title'];
				$result['full'][ $value['name'] ]['sub'] = $getSub['full'];

				$result['name'][ $value[ 'name' ] ] = $getSub['name'];

				$result['num'][ $key ] = $getSub['num'];
			}
			else
			{
				$result['full'][ $value['name'] ]['id'] = $key;
				$result['full'][ $value['name'] ]['title'] = $value['title'];

				$result['name'][ $value['name'] ] = true;

				$result['num'][ $key ] = true;
			}
		}

		return $result;
		return $array;
		return $array[$parent];
	}





	/*
	 *	Функция составления иерархии категорий
	 */
	private static function getHierarchy($array)
	{
		//	Перебираем все элементы массива и записываем их в массив по ключу равному имени родительской категории
		foreach ($array as $key => $value)
		{
			$tmp[ $value['parent'] ][$key] = $value ;
		}

		$result = self::getSub($tmp);

		return $result;
	}





	/*
	 *	Функция получения данных о категориях
	 */
	public static function get($type=null,$data=null)
	{
		//	$start = microtime(true);
		if ( self::$_categories == null )
		{
			//	Выбираем все категории из базы данных
			$tmp_categories = Db::db_query("SELECT * FROM `categories`", 'id');

			//	Находим все типы категорий (posts, pages, ...) и записываем соответствующий список
			foreach ($tmp_categories as $key => $value)
			{
				$categories[$value['type']] = null;

				//$categories['list']['id'][$key] = $value;
				//$categories['list']['id'][ $value['name'] ] = $value;
			}

			$categories['list'] = $tmp_categories;


			foreach ($categories as $key => $value) {
				///$getHierarchy = self::getHierarchy( $value['list'] );
				if ( $key != 'list' )
				{
					$getHierarchy = self::getHierarchy( $categories['list'] );
					foreach ($getHierarchy as $name => $arr) {
						$categories[$key][$name] = $getHierarchy[$name];
					}
					//$categories[$key]['name']	=	$getHierarchy['name'];
					//$categories[$key]['num']	=	$getHierarchy['num'];
				}
			}

			self::$_categories = $categories;
		}

		$return = self::$_categories;
		if ( $type != null )
		{
			$return = $return[$type];

			if ( $data !== null )
			{
				$return = $return[$data];
			}
		}

		//	echo "Время выполнения скрипта: " . (microtime(true) - $start) . " сек.\r\n";

		return $return;
	}





	/*
	 *	Функция поиска всех родителей категории
	 *
	 *	Возвращает массив родителей
	 *
	 */
	public static function parents($id, $type='category', $name)
	{
		$id = (int) $id;
		$list = self::get('list');

		if ( $type != 'category' )
		{
			$result = Db::db_select('posts',[[$id]]);
			$parent = (int) $result[0]['parent'];
			//print_r($parent);
		}
		else
		{
			$parent = (int) $list[$id]['parent'];
		}
		//echo 'parent: ' . $parent . "\r\n";
		
		$return = array();

		if ( $parent != null )
		{
			$return = array($parent);
			if ( $name )
			{
				$return = array( $list[$parent]['name'] );
			}
			$return = array_merge( self::parents($parent, 'category', $name), $return );
		}

		return $return;
	}





	/*
	 *	Функция получения списка всех категорий
	 */
	public static function getParents($category=null)
	{
		if ( self::$_parents == null )
		{
			//print_r( self::getEmbed() );

			foreach (self::getList() as $key => $value) {
				//echo $value['parent'] . "\r\n";
				$tmp[$value['parent']][$key] = $key;
			}

			print_r($tmp);


			foreach ($tmp as $parent => $child) {
				# code...
			}
		}
	}





	/*
	 *	Функция получения списка всех категорий
	 */
	public static function getList()
	{
		if ( self::$_list == null )
		{
			//	Выбираем все категории из базы данных
			self::$_list = Db::db_query("SELECT * FROM `categories`", 'id');
		}
		return self::$_list;
	}





	/*
	 *	Вспомогательная функция getEmbed()
	 *	
	 */
	public static function getSubEmbed($array,$parent=null)
	{
				//echo $parent . "\r\n";
		//self::getList()
		//print_r($array);
		foreach ($array[$parent] as $key => $value) {
			if ( isset( $array[$key] ) )
			{
				//print_r($array[$key]);
				$getSub = self::getSubEmbed($array,$key);
				$result[1][0][ $value['id'] ]['name'] = $value['name'];
				$result[1][0][ $value['id'] ]['title'] = $value['title'];
				$result[1][0][ $value['id'] ]['sub'] = $getSub[1][0];

				$result[1][1][ $value['name'] ]['id'] = $key;
				$result[1][1][ $value['name'] ]['title'] = $value['title'];
				$result[1][1][ $value['name'] ]['sub'] = $getSub[1][1];

				$result[0][0][ $key ] = $getSub[0][0];

				$result[0][1][ $value[ 'name' ] ] = $getSub[0][1];
			}
			else
			{
				$result[1][0][ $value['id'] ]['name'] = $value['name'];
				$result[1][0][ $value['id'] ]['title'] = $value['title'];
				//$result[1][0][ $value['id'] ]['parents'] = $parent;

				$result[1][1][ $value['name'] ]['id'] = $key;
				$result[1][1][ $value['name'] ]['title'] = $value['title'];
				//$result[1][0][ $value['name'] ]['parents'] = $parent;

				$result[0][0][ $key ] = true;
				//$result[0][0][ $key ] = $parent;

				$result[0][1][ $value['name'] ] = true;
				//$result[0][1][ $value['name'] ] = $parent;
			}
		}
		return $result;


	}

	/*
	 *	Функция получения вложенного массива всех категорий
	 *	
	 *	$full - расширенный массив с доплнительной информацией о каждой подкатегории
	 *	$name - Использовать в качестве ключа [name] категории вместо [id]
	 *	
	 *	Возвращает массив
	 *	
	 */
	public static function getEmbed($parent=null,$full=false,$name=false)
	{
		$full = ( $full ? 1 : 0 );
		$name = ( $name ? 1 : 0 );
		if ( self::$_embed == null )
		{
			foreach (self::getList() as $key => $value) {
				$array[$value['parent']][$key] = $value;
			}
			//	Выбираем все категории из базы данных
			self::$_embed = self::getSubEmbed($array,$parent);
		}
		return self::$_embed[$full][$name];
	}





	/*
	 *	
	 *	
	 */
	public static function getPosts($parent=null,$array=null)
	{
		if ( $array == null )
		{
			$array = self::getEmbed(false,false,$parent);
		}
		//print_r( $array );
		foreach ($array as $key => $value) {
			$result = Db::db_select('posts',[['parent',$parent]]);
			if ( $result )
			{
				$return[$key]['posts'] = $result;
			}
			if ( is_array($value) )
			{
				$return[$key]['categories'] = self::getPosts($key, $array);
			}
		}

		return $return;
	}






	/*public static function findParent($id,$name=false,$view=false,$type = false)
	{


		if ( $view == 'item' )
		{
			if ( $type == 'page' )
			{
				$parent = $id;
				$return = array($id);
			}
			else
			{
				$parent = Db::db_select('posts',[[$id]])[0]['parent'];
				$return = array($id);
				if ( $parent != null ) $return = array_push($return, $parent);
			}
		}
		else
		{
			$list = self::get('list');
			$parent = $list[$id]['parent'];
			//$return = array($id, $parent);
			$return = array($id);
			if ( $parent != null ) $return = array_push($return, $parent);
		}
		print_r($return);

		//$return = array();

		if ( $parent != null )
		{
			//$return = array( $parent );
			if ( $name )
			{
				$return = array( $list[$parent]['name'] );
			}
			//echo ($type == 'page' ? '+' : '-');
			//echo $parent;
			$return = array_merge( $return, self::findParent($parent, $name, ( ($type == 'page') ? 'item' : false ) ) );
		}
		//print_r($return);

		return $return;

	}*/





	/*
	 *	Функция поиска всех родителей категории
	 *
	 *	Возвращает массив родителей
	 *
	 */
	public static function findChilds($parent, $deep=null, $posts=false, $lvl=0)
	{
		$tmp = false;
		if ( $posts )
		{
			$result = Db::db_select('posts',[['parent', $parent]],null,'id');
			if ( $result )
			{
				$tmp['posts'] = $result;
			}
		}
		foreach ( self::get('list') as $key => $value ) {
			if ( $value['parent'] == $parent )
			{
				$result = self::findChilds($key,$deep,$posts,$lvl+1);

				if ( $posts )
				{
					$tmp['categories'][$key] = $value;

					if ( isset($result['posts']) )
					{
						if ( is_array($result['posts']) )
						{
							$tmp['categories'][$key]['posts'] = $result['posts'];
						}
					}
					if ( isset($result['categories']) )
					{
						if ( is_array($result['categories']) )
						{
							$tmp['categories'][$key]['categories'] = $result['categories'];
						}
					}
				}
				else
				{
					$tmp[$key] = true;

					if ( is_array($result) )
					{
						$tmp[$key] = $result;
					}
				}

				
			}
		}

		return $tmp;
	}





	/*
	 *	Функция получения списка родителей категории $id
	 *
	 *	Возвращает массив или строку если указан разделитель $delimiter
	 *
	 */
	/*public static function GetPath($id,$delimiter=null)
	{
		$return = array_reverse( self::findParent($id, true) );
		if ( $delimiter != null )
		{
			$return = implode($delimiter, $return);
		}

		return $return;
	}*/




	/**
	 *	-
	 */
	public static function getByName($name)
	{
		$result = Db::db_query("SELECT * FROM `categories` WHERE `name` = '" . $name . "'");
		if ( $result )
		{
			return $result[0];
		}
		return false;
	}
}