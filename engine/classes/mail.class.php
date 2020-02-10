<?php

/**
 *	Класс mail
 */
class Mail
{

	private static
		$LOGIN = 'snedifedi@yandex.ru',
		$PASSWORD = 'Mj5vaWGP',
		$HOST = 'ssl://smtp.yandex.ru',
		$PORT = 465;


	
	function __construct()
	{
		# code...
	}

	public static function send($to, $sbj, $msg, $from=null)
	{
		
		$semi_rand = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: multipart/mixed; boundary=\"{$mime_boundary}\"\r\n"; // в заголовке указываем разделитель
		$headers .= "From: ".$from;

		$type = 'text/plain';
		//$kod = 'koi8-r';  
		//$kod = 'windows-1251';
		$kod = 'utf-8';
		$enkod = 'Quot-Printed';
		//$enkod = '8bit';
		$subject = $sbj;

		$message = "--{$mime_boundary}\r\n";
		$message .= "Content-Type:text/plain; charset=\"$kod\"\r\n"; // кодировка письма
		$message .= "Content-Transfer-Encoding: $enkod\r\n\r\n"; // задаем конвертацию письма
		$message .= $msg."\r\n\r\n";

		$message .= "\r\n--{$mime_boundary}\r\n";

		$mailResult = mail($to, $subject, $message, $headers);
		return $mailResult;
	}



	/*
	public static function reg($to, $sbj, $msg, $file_path, $from=null)
	{
		$mulmail = new multipartmail($to, $from, $sbj);
		$cid = $mulmail->addattachment($file_path, 'card.jpg', "octet-stream");
		$mulmail->addmessage($msg);
		$mulmail->sendmail();
	}
	*/



	public static function smtp($to, $from=null, $sbj, $msg, $files=null)
	{
		$mailSMTP = new SendMailSmtpClass(self::$LOGIN, self::$PASSWORD, self::$HOST, self::$PORT, "utf-8");
		if ( empty($from) )
		{
			$from = array
			(
				siteinfo('sitename'),
				self::$LOGIN
			);
		}

		//	добавляем файлы
		if ( !empty($files) )
		{
			if ( is_array($files) )
			{
				foreach ($files as $file)
				{
					if (file_exists($file))
					{
						$mailSMTP->addFile($file);
					}
				}
			}
			else
			{
				if (file_exists($files))
				{
					$mailSMTP->addFile($files);
				}
			}
		}
		
		$result = $mailSMTP->send($to, $sbj, $msg, $from);
		// $result =  $mailSMTP->send('Кому письмо', 'Тема письма', 'Текст письма', 'Отправитель письма');
		
		if (!$result === true)
		{
			echo "Send Mail Error: " . $result;
			$result = false;
		}
		
		return $result;
	}

}