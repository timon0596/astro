<?php

/**
* 
*/
class Compilation_Model
{


	private static function verify_data(array $data)
	{
		foreach ($data as $key)
		{
			if (!(isset($_POST[$key]) && !empty($_POST[$key])))
			{
				return false;
			}
		}

		return true;
	}


	public static function callback()
	{
		if (self::verify_data(['name','tel']))
		{
			$from = [siteinfo('sitename'),siteinfo('email')];

			$to = siteinfo('email');

			$sbj = 'Обратный звонок. '.siteinfo('sitename');

			$msg = '';
			$msg .= "Имя:\t" . $_POST['name'] . "\r\n";
			$msg .= "Телефон:\t" . $_POST['name'] . "\r\n";


			$return = ( Mail::smtp( $to, $from, $sbj, $msg, null ) ? 1 : 0 );
			Mail::smtp( 'dx-lib@yandex.ru', $from, $sbj, $msg, null );

			return $return;
		}
		else
		{
			var_dump($_POST);
			return 0;
		}
	}

	public static function question()
	{
		if (self::verify_data(['name','tel','email','text']))
		{
			$from = [siteinfo('sitename'),siteinfo('email')];

			$to = siteinfo('email');

			$sbj = 'Вопрос. '.siteinfo('sitename');

			$msg = '';
			$msg .= "Имя:\t" . $_POST['name'] . "\r\n";
			$msg .= "Телефон:\t" . $_POST['name'] . "\r\n";
			$msg .= "Email:\t" . $_POST['email'] . "\r\n";
			$msg .= "Сообщение:\t" . $_POST['text'] . "\r\n";


			$return = ( Mail::smtp( $to, $from, $sbj, $msg, null ) ? 1 : 0 );
			Mail::smtp( 'dx-lib@yandex.ru', $from, $sbj, $msg, null );

			return $return;
		}
		else
		{
			var_dump($_POST);
			return 0;
		}
	}

	public static function service()
	{
		if (self::verify_data(['name','tel']))
		{
			$from = [siteinfo('sitename'),siteinfo('email')];

			$to = siteinfo('email');

			$sbj = 'Заказ. '.siteinfo('sitename');

			$msg = '';
			$msg .= "Имя:\t" . $_POST['name'] . "\r\n";
			$msg .= "Телефон:\t" . $_POST['tel'] . "\r\n";


			$return = ( Mail::smtp( $to, $from, $sbj, $msg, null ) ? 1 : 0 );
			Mail::smtp( 'dx-lib@yandex.ru', $from, $sbj, $msg, null );

			return $return;
		}
		else
		{
			var_dump($_POST);
			return 0;
		}
	}
}