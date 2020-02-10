<?php

/**
 *	Класс вьюшки
 */
class Main_View
{	
	private static
		$template = null;
	function __construct()
	{
		# code...
	}

	private static function getTemplate()
	{
		if ( self::$template == null )
		{
			self::$template = TEMPLATES_DIR . Site::getOptions('template') . '/';
		}
		//print_r(self::$template);
		return self::$template;
	}


	private static function getHeader()
	{
		$func = self::getTemplate() . 'functions.php';
		if ( file_exists( $func ) )
		{
			require_once $func;
		}
		$path = self::getTemplate() . 'header.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
	}


	private static function getFooter()
	{
		$path = self::getTemplate() . 'footer.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
	}


	private static function getSidebar($name)
	{
		$path = self::getTemplate() . 'sidebar-' . $name . '.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
	}


	private static function getContent()
	{
		$list = Post::parents(null,false,true);
		//var_dump( $list );
		$custom = false;

		//	Приставка шаблона пуста
		$pattern = null;
		foreach ( $list as $key => $value ) {
			$tmp = self::getTemplate() . Page::getInfo('type') . '/' . $pattern . ( $value == null ? 'index' : $value ) . '.php';
			if ( file_exists( $tmp ) )
			{
				$custom = $tmp;
				break;
			}
			//	Если первый элемент ( приставка шаблона пуста )
			if ( $pattern == null )
			{
				//	Присваиваем значение приставки шаблона
				$pattern = 'pattern.';
			}
		}

		//	Если файл шаблона страницы обнаружен
		if ( $custom )
		{
			//var_dump( $custom );
			require_once $custom;
		}
		else
		{
			$standart = self::getTemplate() . Page::getInfo('type') . '.php';
			if ( file_exists( $standart ) )
			{
				require_once $standart;
			}
			else
			{
				echo Page::getContent();
			}
		}
		/*
		$custom = self::getTemplate() . Page::getInfo('type') . '/' . Page::getInfo('name') . '.php';
		if ( file_exists( $custom ) )
		{
			require_once $custom;
		}
		else
		{
			$standart = self::getTemplate() . Page::getInfo('type') . '.php';
			if ( file_exists( $standart ) )
			{
				require_once $standart;
			}
			else
			{
				echo Page::getContent();
			}
		}*/
	}



	private static function getList()
	{
		$custom = self::getTemplate() . 'list/' . Page::getInfo('name') . '.php';
		if ( file_exists( $custom ) )
		{
			require_once $custom;
		}
		else
		{
			$list = Post::parents(null,false,false);
			foreach ($list as $key => $parent)
			{
				if ( file_exists( self::getTemplate() . 'list/pattern.' . $parent . '.php' ) )
				{
					require_once self::getTemplate() . 'list/pattern.' . $parent . '.php';
					return;
				}
			}
			$standart = self::getTemplate() . 'list.php';
			if ( file_exists( $standart ) )
			{
				require_once $standart;
			}
			else
			{
				echo Page::getList();
			}
		}
	}



	private static function get404()
	{
		//var_dump( Page::getInfo('name') );
		$notFound = self::getTemplate() . '404.php';
		if ( file_exists( $notFound ) )
		{
			require_once $notFound;
		}
		else
		{
			echo Page::get404();
		}
	}



	private static function getLogin()
	{
		//var_dump( Page::getInfo('name') );
		$login = self::getTemplate() . 'login.php';
		//var_dump($login)
		if ( file_exists( $login ) )
		{
			require_once $login;
		}
		else
		{
			echo Page::get404();
		}
	}



	private static function getEn($str)
	{
		$en = self::getTemplate() . 'en.php';
		if ( file_exists( $en ) )
		{
			require_once $en;
		}
		else
		{
			echo Page::get404();
		}
	}



	public static function viewPage()
	{
		self::getHeader();
		self::getContent();
		self::getFooter();
	}


	public static function viewList()
	{
		self::getHeader();
		self::getList();
		self::getFooter();
	}


	public static function viewPost()
	{
		self::getHeader();
		self::getContent();
		self::getFooter();
	}


	public static function view404()
	{
		self::getHeader();
		self::get404();
		self::getFooter();
	}


	public static function viewLogin()
	{
		self::getHeader();
		self::getLogin();
		self::getFooter();
	}


	public static function viewEn($str)
	{
		self::getHeader();
		self::getEn($str);
		self::getFooter();
	}
}