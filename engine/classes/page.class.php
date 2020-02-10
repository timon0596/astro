<?php

/**
 *	
 */
class Page
{
	private static
		$info	= null,
		$_info	= null,
		/*$id		= null,
		$title	= null,
		$name	= null,
		$type	= null,*/
		$content	= null,
		$breadcrumbs	= null;
	
	function __construct()
	{
		# code...
	}




	/**
	 *	Функция записи значений страницы
	 */
	public static function setInfo($arr)
	{
		//var_dump( $arr );
		if ($arr['name'] == null) $arr['name'] = 'index';
		self::$info	= $arr;
		/*self::$id		= $arr['id'];
		self::$name		= ($arr['name'] == null ? 'index' : $arr['name'] );
		self::$title	= $arr['title'];
		self::$type		= $arr['type'];*/
	}




	/**
	 *	-
	 */
	public static function getList($name=null)
	{
		$return = Db::db_select('posts',['type'=>'page'],null,'id');
		return $return;
	}




	/**
	 *	-
	 */
	public static function getInfo($option=null)
	{
		$return = self::$info;
		//var_dump( $return );
		/*$return['id']		= self::$id;
		$return['name']		= self::$name;
		$return['title']	= self::$title;
		$return['type']		= self::$type;*/

		if ( $option != null )
		{
			return @$return[$option];
		}
		return $return;
	}




	/**
	 *	-
	 */
	public static function info($option=null)
	{
		if ( self::$_info == null )
		{
			$class = APP_NAME . '_Model';
			$method = 'getInfo';
			self::$_info =  $class::$method();
		}
		$return = self::$_info;
		/*$return['id']		= self::$id;
		$return['name']		= self::$name;
		$return['title']	= self::$title;
		$return['type']		= self::$type;*/

		if ( $option != null )
		{
			if ( isset( $return[$option] ) )
			{
				$return = $return[$option];
			}
		}
		return $return;
	}




	/**
	 *	-
	 */
	public static function getContent()
	{
		if ( self::$content == null )
		{
			self::$content = Db::db_select('posts', self::$info['id'])[0]['content'];
		}
		return self::$content;
	}




	/**
	 *	-
	 */
	public static function get404()
	{
		return "Страница не найдена";
	}




	/**
	 *	-
	 */
	public static function getBreadcrumbs()
	{
		if ( self::$breadcrumbs == null )
		{
		}
		return self::$breadcrumbs;
	}
}