<?php

/**
 *	-
 */
class Site
{
	private static
		$options = null,
		$scripts = null,
		$styles = null;

	function __construct()
	{
		self::$options = self::getOptions();
		print_r(self::$options);
	}




	/**
	 *	-
	 */
	public static function getOptions($name=null,string $column=null)
	{
		if ( self::$options == null )
		{
			self::$options = Db::db_select('options',null,null,'name');

		}
		if ($name != null) {
			if (!isset(self::$options[$name][$column])) $column = 'value';
			return self::$options[$name][$column];
		}
		return self::$options;
	}




	/**
	 *	-
	 */
	public static function setScript($name, $src, $ver, $top, $jquery)
	{
		//if ( self::$scripts == null) self::$scripts = array();

		if ( $jquery )
		{
			self::$scripts[1]['jquery'] = true;
		}

		if ( $top )
		{
			$top = 1;
		}
		else
		{
			$top = 0;
		}

		$script = $src . ( $ver ? '?' . $ver : null ); 
		self::$scripts[$top][$name] = $script;
	}




	/**
	 *	-
	 */
	public static function setStyle($name, $src, $ver, $top)
	{
		//if ( self::$style == null) self::$scripts = array();

		if ( $top )
		{
			$top = 1;
		}
		else
		{
			$top = 0;
		}

		$style = $src . ( $ver ? '?' . $ver : null );
		/*array
		(
			'src'		=>	$src,
			'ver'		=>	$ver
		);*/

		self::$styles[$top][$name] = $style;
	}




	/**
	 *	-
	 */
	public static function getLInks($top)
	{
		if ( $top )
		{
			$top = 1;
		}
		else
		{
			$top = 0;
		}

		$return = false;

		if ( isset( self::$styles[$top] ) )
		{
			$return['styles'] = self::$styles[$top];
		}
		if ( isset( self::$scripts[$top] ) )
		{
			$return['scripts'] = self::$scripts[$top];
		}

		return $return;
	}
}