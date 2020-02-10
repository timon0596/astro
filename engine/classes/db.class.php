<?php


/**
 * 	Класс подключения к базе данных
 */
class Db
{
	private
		$_db;
	private static
		$mysqli = null;
	
	function __construct()
	{
		require_once CONFIG_DIR . 'mysql.php';
		try {
			$obj_pdo = new PDO("mysql:host=$HOST;dbname=$BASE;charset=utf8", $USER, $PASS);
			$obj_pdo->exec("set names utf8");
			$obj_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			echo 'ErRoR: ' . $e->getMessage();
		}

		$this->_db = $obj_pdo;
		return $this->_db;
		/*
			$obj_mysqli = @new mysqli($HOST, $USER, $PASS, $BASE);
			if ( !$obj_mysqli->connect_error ) {
				$this->_db = $obj_mysqli;
				$this->_db->query("SET NAMES 'utf8'");		//	Задаем кодировку UTF8
				return $this->_db;
			}
			else {
				throw new Exception("Не удалось подключиться к базе данных");
		}*/
	}




	/**
	 *	-
	 */
	private static function getObject()
	{
		if ( self::$mysqli == null )
		{
			$obj = new Db();
			self::$mysqli = $obj->_db;
			unset($obj);

		}
		return self::$mysqli;
	}




	/**
	 *	-
	 */
	public static function db_query($string, $key=null)
	{
		//echo $string . "\r\n";
		$obj = self::getObject();
		$result = $obj->query($string);

		$return = array();
		while ($row = $result->fetch(PDO::FETCH_ASSOC))
		{
			if ( $key == null )
			{
				array_push($return, $row);
			}
			else
			{
				$return[$row[$key]] = $row;
			}
			//var_dump( $row );
		}

		if ( count($return) > 0 )
		{
			return $return;
		}
		else
		{
			return false;
		}
	}




	/**
	 *	Функция получения строки условий отборки для sql запроса
	 */
	public static function get_where($in)
	{
		$return = '';
		$implode = array();
		//	Если массив
		if ( is_array( $in ) )
		{
			//	Если массив имеет не более 3х значений
			if ( count( $in ) <= 3 )
			{
				//	Проверка ключей массива на последовательность [0,1,2];
				if ( array_keys($in) === range(0, count($in) - 1) )
				{
					$single = true;
					//	Перебираем массив
					foreach ($in as $k => $el) {
						//	Если текущий элемент является массивом
						if ( is_array( $el )  )
						{
							//	Завершаем проверку со значением false
							$single = false;
							break;
						}
						else
						{
							//	Если
							//		не состит только из цифр и букв
							//		и
							//		не является вторым элементом состоящим из знаков = < >
							if ( !preg_match("/^[A-z0-9_\-%@#$;]+$/", (string) $el) && !( $k == 1 && ( preg_match("/^[LlIiKkEe\=\<\>\!]+$/", (string) $el) ) ) )
							{
								//	Завершаем проверку со значением false
								$single = false;
								break;
							}
						}
					}
				}
				else
				{
					$single = false;
				}
			}
			else
			{
				$single = false;
			}
			//var_dump($single);



			if ( $single )
			{
				$tmp = '`' . $in[0] . '`';

				$val = null;
				if ( count( $in ) == 2 )
				{
					$sign = '=';
					$val = $in[1];
				}
				if ( count( $in ) == 3 )
				{
					$sign = ' ' . $in[1] . ' ';
					$val = $in[2];
				}

				if ( $val === null || $val === false )
				{
					$tmp .= ' IS NULL';
				}
				else
				{
					$tmp .= $sign . ( is_int($val) ? $val : "'" . $val . "'" );
				}

				array_push( $implode, $tmp );
			}
			else
			{
				foreach ($in as $k => $el)
				{
					if ( is_array( $el ) )
					{
						array_push( $implode, self::get_where($el) );
					}
					else
					{
						if ( is_int($k) )
						{
							if ( preg_match("/^[0-9]+$/", (string) $el) )
							{
								array_push( $implode, '`id`=' . ( is_int($el) ? $el : "'" . $el . "'" ) );
							}
							else
							{
								array_push( $implode, $el );
							}
						}
						else
						{
							if ( $el === null || $el === false )
							{
								array_push( $implode, '`' . $k . '` IS NULL' );
							}
							else
							{
								array_push( $implode, '`' . $k . '`=' . ( is_int($el) ? $el : "'" . $el . "'" ) );
							}
						}
					}
				}
			}
			$return .= implode( ' && ', $implode );
		}
		else
		{
			if ( preg_match("/^[0-9]+$/", (string) $in) )
			{
				$return .= '`id`=' . $in;
			}
			else
			{
				$return .= $in;
			}
		}
		//echo "\r\n" . $return . "\r\n";
		return $return;
	}




	/**
	 *	Функция получения методом SELECT данных ($col) из таблицы базы данных $from с условием $where
	 */
	public static function db_select($from, $where=null, $col=null, $key=null)
	{
		if ( $col == null )
		{
			$col = '*';
		}

		$query = "SELECT ";
		if ( is_array($col) )
		{
			$col = implode("`,`", $col);
		}
		if (!$col) $col = '*';
		if ($col != '*')
		{
			$col = "`" . $col . "`";
		}
		$query .= $col;
		$query .= " FROM `" . $from . "` ";

		//print_r( $where );
		if ( $where != null )
		{
			$query .= " WHERE ";
			
			/*if ( is_array($where) )
			{
				foreach ($where as $k => $wh) {
					if ( is_array($wh) )
					{
						if ( count($wh) == 1 )
						{
							$wh[2] = $wh[0];
							$wh[1] = '=';
							$wh[0] = 'id';
							//print_r($wh);
						}
						if ( count($wh) == 2 )
						{
							$wh[2] = $wh[1];
							$wh[1] = '=';
							//print_r($wh);
						}
						$where[$k] = "`" . $wh[0] . "`" . $wh[1] . ( ($wh[2] === (int) $wh[2]) ? $wh[2] : "'" . $wh[2] . "'" );
					}
				}
				$where = implode(" && ", $where);
			}
			$query .= $where;*/
			$query .= self::get_where( $where );
		}
		//echo $query . '<br>';
		$return = self::db_query($query, $key);
		return $return;
	}




	/**
	 *	Функция добавления новой записи в таблицу
	 */
	public static function db_insert($into,$values)
	{
		$query = "INSERT INTO `" . $into . "` ";
		$tmpNames = [];
		$tmpVals = [];
		foreach ($values as $key => $value) {
			array_push( $tmpNames, ( "`" . $key . "`" ) );
			if ( $value !== (int) $value )
			{
				if ( $value === null || $value === false )
				{
					$value = 'NULL';
				}
				else
				{
					$value = "'" . $value . "'";
				}
			}
			//$value = ( $value === null ? 'IS NULL' : $value );
			//$value = ( ( $value === (int) $value) ? $value : "'" . $value . "'" );
			array_push( $tmpVals, $value );
		}
		$query .= "(" . implode(",", $tmpNames) . ")";
		$query .= " VALUES ";
		$query .= "(" . implode(",", $tmpVals) . ")";

		//echo "\r\n" . $query . "\r\n";
		$obj = self::getObject();
		$return = $obj->query($query);
		return $return;
	}




	/**
	 *	Функция изменения записи в таблице
	 */
	public static function db_update($update,$values,$where)
	{
		//var_dump( $values );
		$query = "UPDATE `" . $update . "` ";
		$tmpSet = [];
		foreach ($values as $key => $value) {
			//var_dump($value);
			if ( $value === null || $value === '' || $value === false )
			{
				$value = 'NULL';
			}
			else
			{
				if ( is_array( $value ) ) var_dump($value);
				if ( (string) $value !== (string) (int) $value )
				{
					$value = "'" . $value . "'";
				}
			}
			array_push( $tmpSet, ( "`" . $key . "`=" . $value ) );
		}
		$query .= " SET ";
		$query .= implode(",", $tmpSet);

		$query .= " WHERE ";
		/*if ( is_array($where) )
		{
			foreach ($where as $k => $wh) {
				if ( is_array($wh) )
				{
					if ( count($wh == 2) )
					{
						$wh[2] = $wh[1];
						$wh[1] = '=';
					}
					$where[$k] = "`" . $wh[0] . "`" . $wh[1] . ( ($wh[2] === (int) $wh[2]) ? $wh[2] : "'" . $wh[2] . "'" );
				}
			}
			$where = implode(" && ", $where);
		}*/
		$query .= self::get_where($where);

		//	echo "\r\n" . $query . "\r\n";
		$obj = self::getObject();
		$return = $obj->query($query);
		return $return;
	}




	/**
	 *	Функция даления записи из таблицы
	 */
	public static function db_delete($from,$where)
	{
		$query = "DELETE FROM `" . $from . "` WHERE ";
		/*if ( is_array($where) )
		{
			foreach ($where as $k => $wh) {
				if ( is_array($wh) )
				{
					if ( count($wh == 2) )
					{
						$wh[2] = $wh[1];
						$wh[1] = '=';
					}
					$where[$k] = "`" . $wh[0] . "`" . $wh[1] . ( ($wh[2] === (int) $wh[2]) ? $wh[2] : "'" . $wh[2] . "'" );
				}
			}
			$where = implode(" && ", $where);
		}
		$query .= $where;*/
		$query .= self::get_where($where);

		//echo "\r\n" . $query . "\r\n";
		$obj = self::getObject();
		$return = $obj->query($query);
		return $return;
	}




	/**
	 *	Функция получения столбцов таблицы
	 */
	public static function db_show($from)
	{
		$query = "SHOW FIELDS FROM `" . $from . "`";
		$return = self::db_query($query, 'Field');
		return $return;
	}
}