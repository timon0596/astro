<?php

/**
* 
*/
class Compilation_Model
{
	
	function __construct()
	{
		# code...
	}


	public static function get()
	{
		if ( !isset( $_SESSION['basket'] ) )
		{
			$_SESSION['basket'] = [];
		}
		$return = json_encode( $_SESSION['basket'], JSON_UNESCAPED_UNICODE );
		return $return;
	}


	public static function set()
	{
		if ( isset( $_GET['id'] ) && isset( $_GET['count'] ) )
		{
			$id = (int) $_GET['id'];
			$count = (int) $_GET['count'];

			$price = Post::get($id,'value');

			if ( $count < 1 )
			{
				//self::del();
				$count = 1;
			}
			//else
			//{
				$_SESSION['basket'][$id]['count'] = $count;
				$_SESSION['basket'][$id]['price'] = $price;
			//}
		}
		return self::get();
	}


	public static function plus()
	{
		if ( isset( $_GET['id'] ) )
		{
			$id = (int) $_GET['id'];
			$count = ( isset( $_SESSION['basket'][$id]['count'] ) ? $_SESSION['basket'][$id]['count'] : 0 );
			$_GET['count'] = $count + 1;
			self::set();
		}
		return self::get();
	}


	public static function minus()
	{
		if ( isset( $_GET['id'] ) )
		{
			$id = (int) $_GET['id'];
			$count = ( isset( $_SESSION['basket'][$id]['count'] ) ? $_SESSION['basket'][$id]['count'] : 0 );
			$_GET['count'] = $count - 1;
			self::set();
		}
		return self::get();
	}


	public static function del()
	{
		if ( isset( $_GET['id'] ) && isset( $_SESSION['basket'][ $_GET['id'] ] ) )
		{
			$id = (int) $_GET['id'];
			unset ( $_SESSION['basket'][$id] );
		}
		return self::get();
	}


	public static function clear()
	{
		unset ( $_SESSION['basket'] );
		return self::get();
	}
}