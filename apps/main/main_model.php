<?php



/**
 *	Модель приложения Новости
 */
class Main_Model
{




	/**
	 *	Определить страница, категория или запись
	 */
	public function __construct()
	{
		// method's body
	}




	/**
	 *	Функция определения соответствия категорий
	 */
	/*private static function compliance($arr1,$arr2)
	{
		$needle = array_shift( $arr1 );
		$haystack = array();
		foreach ($arr2 as $key => $value)
		{
			//echo $key . "\r\n";
			array_push($haystack, $key);
		}

		var_dump( $haystack );

		if ( in_array($needle, $haystack) )
		{
			if ( count($arr1) > 0 )
			{
				if ( is_array($arr2[$needle]) )
				{
					$result = self::compliance($arr1, $arr2[$needle]['sub']);
				}
				else
				{
					$result = false;
				}
			}
			else
			{
				$result = true;
				//print_r($needle);
				//print_r($arr2[$needle]);
				$result = [
					'id'	=> $arr2[$needle]['id'],
					'sub'	=> isset($arr2[$needle]['sub'])
				];
			}
		}
		else
		{
			$result = false;
		}

		return $result;
	}*/




	/**
	 *	Определить страница, категория или запись
	 */
	public static function identify($name, $category=null)
	{
			//var_dump( $name );
		$result = Post::get( $name );
		if ( $result )
		{
			$parents =  Post::parents( $name, true );
			if ( $category == implode( '/', $parents ) )
			{
				$return = $result;
			}
			else
			{
				$return = false;
			}
		}
		else
		{
			$return = false;
		}
		//var_dump( $return['type'] );
		return $return;
	}




	/**
	 *	
	 */
	public static function getList($parent,$from)
	{
		$result = Db::db_query("SELECT * FROM `" . $from . "` WHERE `parent` = " . $parent);
		return $result;
	}



	/**
	 *	
	 */
	public static function searchPost($name,$parent)
	{
		$result = Db::db_query("SELECT * FROM `posts` WHERE `name` = '" . $name . "' && `parent` = " . $parent);
		return $result;
	}



	/**
	 *	
	 */
	public static function getPost($id)
	{
		$result = Db::db_select('posts',$id);
		return $result;
	}
}