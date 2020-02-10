<?php

/**
* 
*/
class Admin_View
{

	private static
		$_template = null;
	
	function __construct(){}



	public static function getTemplate()
	{
		if ( self::$_template == null )
		{
			self::$_template = TEMPLATES_DIR . 'admin/';
		}
		return self::$_template;
	}



	/*public static function actionAdd()
	{
		echo 'Admin_View::actionAdd()' . "\r\n";
	}



	public static function actionEdit()
	{
		echo 'Admin_View::actionEdit()' . "\r\n";
	}



	public static function actionDel()
	{
		echo 'Admin_View::actionDel()' . "\r\n";
	}



	public static function actionComplete()
	{
		echo 'Admin_View::actionComplete()' . "\r\n";
	}
	*/



	public static function actionList( $name )
	{
		//echo "\r\n" . 'Admin_View::actionList()' . "\r\n";
		//var_dump($name);

		require_once self::getTemplate() . 'functions.php';

		require_once self::getHeader();

		echo '<div id="page" class="content-fl-l">';
		require_once self::getSidebar();
		echo '<div id="page-content">';
		require_once self::getContent( 'list', $name );
		echo '</div>';
		echo '</div>';

		require_once self::getFooter();
	}



	public static function actionPage( $part, $action = false, $id = false, $intype = null )
	{
		//echo "\r\n" . 'Admin_View::actionPage()' . "\r\n";
		if ( $action )
		{
			$name = $action;
		}
		else
		{
			$name = $part;
		}

		require_once self::getTemplate() . 'functions.php';

		require_once self::getHeader();

		echo '<div id="page" class="content-fl-l">';
		require_once self::getSidebar();
		echo '<div id="page-content">';
		require_once self::getContent( 'page', $name );
		echo '</div>';
		echo '</div>';

		require_once self::getFooter();
	}

	
	public static function actionLogin()
	{

		require_once self::getTemplate() . 'functions.php';

		require_once self::getHeader();

		echo '<div id="page-content">';
		require_once self::getContent( 'page', 'login' );
		echo '</div>';

		require_once self::getFooter();
	}





	private static function getHeader()
	{
		return self::getTemplate() . 'header.php';
	}


	private static function getSidebar()
	{
		return self::getTemplate() . 'sidebar.php';
	}


	private static function getFooter()
	{
		return self::getTemplate() . 'footer.php';
	}


	private static function getContent( $type, $name )
	{

		if ( file_exists( self::getTemplate() . $type . '/' . $name . '.php' ) )
		{
			return self::getTemplate() . $type . '/' . $name . '.php';
		}
		else
		{
			return self::getTemplate() . $type . '.php';
		}
	}



	/*public static function getPage( $name )
	{
		$path =  self::getTemplate() . 'page/' . $name . '.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
		else
		{
			require_once self::getTemplate() . 'page.php';
		}
	}



	public static function getList( $name )
	{
		$path =  self::getTemplate() . 'list/' . $name . '.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
		else
		{
			require_once self::getTemplate() . 'list.php';
		}
	}



	public static function getPost( $id, $name )
	{
		$path =  self::getTemplate() . 'post/' . $name . '.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
		else
		{
			require_once self::getTemplate() . 'post.php';
		}
	}



	public static function get404()
	{
		require_once self::getTemplate() . '404.php';
	}



	public static function getSidebar()
	{
		require_once self::getTemplate() . 'sidebar.php';
	}



	public static function getHeader()
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



	public static function getFooter()
	{
		$path = self::getTemplate() . 'footer.php';
		if ( file_exists( $path ) )
		{
			require_once $path;
		}
	}




	public static function viewPage( $name )
	{
		//echo 'viewPage(' . $name . ')<br>';

		self::getHeader();
		self::getSidebar();
		self::getPage( $name );
		self::getFooter();
	}
	public static function viewList( $name )
	{
		//echo 'viewList(' . $name . ')<br>';

		self::getHeader();
		self::getSidebar();
		self::getList( $name );
		self::getFooter();
	}
	public static function viewPost( $id, $name )
	{
		//echo 'viewPost(' . $id . ', ' . $name . ')<br>';

		self::getHeader();
		self::getSidebar();
		self::getPost( $id, $name );
		self::getFooter();
	}
	public static function viewLogin()
	{
		self::getHeader();
		self::getPage( 'login' );
		self::getFooter();
	}
	public static function view404()
	{
		//echo 'view404()<br>';

		self::getHeader();
		self::getSidebar();
		self::get404(  );
		self::getFooter();
	}*/



}