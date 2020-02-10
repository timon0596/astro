<?php

/**
 * 
 */
class User
{
	public static
		$im = null;
	
	function __construct()
	{
		//$auth = $this->auth();
	}



	public static function login($login, $pass, $col='login', $passcol = 'password') {
		//echo 'User::login()';
		if ( $passcol == 'password' ) $pass = md5($pass);
		if ( $passcol == 'id' ) $pass = (int) $pass;
		$result = Db::db_select('users', [ [$col => $login], [$passcol, $pass] ]);
		//var_dump($result);
		if ( $result )
		{
			$login = Db::db_insert('auth', array
				(
					//'user'		=>	self::$im['id'],
					'user'		=>	$result[0]['id'],
					'session'	=>	session_id(),
					'client'	=>	$_SERVER['HTTP_USER_AGENT'],
					'ip'		=>	$_SERVER['REMOTE_ADDR'],
					'date'		=>	date('Y-m-d')
				)
			);

			if ( $login )
			{
				self::$im = $result[0];
				$_SESSION['user']['id'] = (int) self::$im['id'];
				$return = true;
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

		return $return;
	}


	public static function logout() {
		self::$im = null;
		unset($_SESSION['user']);
		//session_regenerate_id();
	}


	public static function auth()
	{
		//echo 'User::auth()';
		self::reg();
		Form::login();

		if ( isset($_SESSION['user']) )
		{
			$result = Db::db_select('auth', [ 'user'=> $_SESSION['user']['id'], 'session'=>session_id(), 'ip'=>$_SERVER['REMOTE_ADDR'] ]);
			//echo 'result: ';
			//var_dump( $result );
			if ( $result )
			{
				$user = Db::db_select('users', $result[0]['user'])[0];
				self::$im = $user;
				$return = true;
			}
			else
			{
				self::logout();
				$return = false;
			}
		}
		else
		{
			self::logout();
			$return = false;
		}

		return $return;
	}



	public static function im( $name = null )
	{
		//if ( self::$im == null )
		//{
			self::auth();
		//}

		$return = self::$im;

		if ( $name !== null )
		{
			if ( isset( $return[$name] ) )
			{
				$return = $return[$name];
			}
			else
			{
				$return = false;
			}
		}

		return $return;
	}



	public static function get($id)
	{
		$result = Db::db_select('users', $id);
		//var_dump( $result );
		if ( $result )
		{
			$return = $result[0];
		}
		else
		{
			$return = false;
		}
		return $return;
	}



	public static function getFio($id)
	{
		$user = self::get($id);
		$return = mb_substr( $user['firstname'], 0, 1,'UTF-8') . '.' . mb_substr( $user['middlename'], 0, 1,'UTF-8') . '.' . ' ' . $user['lastname'] ;
		return $return;
	}




	public static function set( $id = null, $values )
	{
		if ( $id == null )
		{
			$id = self::im( 'id' );
			self::$im = null;
		}

		$return = Db::db_update('users', $values, $id);
		return $return;
	}




	public static function reg()
	{
		$values = $_POST;
		$reg = true;

		if ( isset($values['reg']) ) unset($values['reg']);

		if ( isset($values['email']) )
		{
			$result = Db::db_select('users',['email'=>$values['email']]);
			if ($result)
			{
				$reg = false;
			}
		}
		if ( isset($values['login']) )
		{
			$result = Db::db_select('users',['login'=>$values['login']]);
			if ($result)
			{
				$reg = false;
			}
		}
		if ( isset($values['phone']) )
		{
			$result = Db::db_select('users',['phone'=>$values['phone']]);
			if ($result)
			{
				$reg = false;
			}
		}

		
		if ($reg && ( isset($values['login']) || isset($values['email']) || isset($values['phone']) ) /*&& isset($values['password'])*/ )
		{
			if ( isset($values['password']) )
			{
				$values['password'] = md5($values['password']);
			}
			foreach ($values as $key => $value)
			{
				if ( is_array($value) )
					$values[$key] = json_encode($value, JSON_UNESCAPED_UNICODE);
			};
			$return = Db::db_insert('users', $values) ? true : false;

			$user = false;
			if ( isset($values['login']) && !$user )	$user = Db::db_select('users',['login'=>$values['login']]);
			if ( isset($values['email']) && !$user )	$user = Db::db_select('users',['email'=>$values['email']]);
			if ( isset($values['phone']) && !$user )	$user = Db::db_select('users',['phone'=>$values['phone']]);
			$user = @$user[0];

			$card = (string) $user['id'];
			$cardlen = strlen($card);
			for ($i=0; $i < 6 - $cardlen; $i++) {
				$card = '0' . $card;
			}
			Db::db_update('users',['value'=>$card],$user['id']);
			//var_dump($card);

			$fileCard = ROOT_DIR . self::generate_card(@$values['firstname'], @$values['lastname'], $card);
			//var_dump($fileCard);
			
			if ($return)
			{
				$to = siteinfo('email');
				/*$sbj = 'Бюро Развлечений Mania. Регистрация. '. @$values['firstname'] . ' ' . @$values['lastname'] . '. Карта #' . $card;
				$msg = 'Новый пользователь: ' . @$values['firstname'] . ' ' . @$values['lastname'] . ' получил номер карты: ' . $card . "\r\n\r\n";
				foreach ($values as $key => $value) 
				{
					$msg .= $key . ': ' . $value . "\r\n";
				};

				//Mail::send($to, $sbj, $msg);
				Mail::reg($to, $sbj, $msg, $fileCard, 'server224.hosting.reg.ru');

				$to = $values['email'] . ',' . siteinfo('email');
				$msg = 'Спасибо за Регистрацию, ' . @$values['firstname'] . ' ' . @$values['lastname'] . "\r\n" . 'Ваша карта: ' . $card . "\r\n\r\n";

				Mail::reg($to, $sbj, $msg, $fileCard, 'server224.hosting.reg.ru');

				self::login($values['email'], $card, $col='email', $passcol = 'id');*/
				//$mailSMTP = new SendMailSmtpClass('info@br-mania.com', 'TYcDdmB6', 'ssl://smtp.yandex.ru', 'Бюро Развлечений Mania', 465); // создаем экземпляр класса
				// $mailSMTP = new SendMailSmtpClass(‘логин’, ‘пароль’, ‘хост’, ‘имя отправителя’);
				 
				// заголовок письма
				//$headers= "MIME-Version: 1.0\r\n";
				//$headers .= "Content-type: text/html; charset=utf-8\r\n"; // кодировка письма
				$from = array(
						siteinfo('sitename'), // Имя отправителя
						siteinfo('email') // почта отправителя
					);
				$sbj = 'Бюро Развлечений Mania. Регистрация. '. @$values['firstname'] . ' ' . @$values['lastname'] . '. Карта #' . $card;
				$msg = 'Новый пользователь: ' . @$values['firstname'] . ' ' . @$values['lastname'] . ' получил номер карты: ' . $card . "\r\n\r\n";
				foreach ($values as $key => $value)
				{
					if ( is_json($value) ) 
					{
						$value = json( $value, false );
						$msg .= self::array_to_plain( $value );
					}
					else
					{
						$msg .= $key . ': ' . $value . "\r\n";
					};
				};
				mail::smtp( $to, $from, $sbj, $msg, $fileCard );
				$to = $values['email'];
				$msg = 'Спасибо за Регистрацию на нашем сайте ' . $_SERVER['HTTP_HOST'] . ', ' . @$values['firstname'] . ' ' . @$values['lastname'] . "\r\n" . 'Ваша карта: ' . $card . "\r\n\r\n";
				mail::smtp( $to, $from, $sbj, $msg, $fileCard );
				self::login($values['email'], $card, $col='email', $passcol = 'id');
			}
		}
		else
		{
			$return = false;
		}
		
		return $return;
	}

	public static function array_to_plain( $arr )
		{
			$res = "";
			if ( is_array($arr) )
			{
				foreach ( $arr as $key => $value )
				{
					$res .= ( is_array($value) ? null : "\t" ) . $key . (is_array($value) ? ":\r\n" : ":\t");
					$res .= self::array_to_plain( $value );
				};
			}
			else
			{
				$res .= $arr . "\r\n";
			}
			return $res;
		}

	public static function generate_card($firstname, $lastname, $card_number) {
		$text = $firstname . ' ' . $lastname . '       ' . $card_number;
		$name = mb_strtoupper($firstname . ' ' . $lastname);
		//echo '<pre>';
		$card_arr = str_split($card_number);
		$string = '';
		foreach ($card_arr as $key => $value)
		{
			$string .= $value;
			if ($key < count($card_arr) - 1)
			{
				$string .= ' ';
				if ($key % 3 == 2)
				{
					$string .= ' ';
				}
			}
		}
		//$card_number = $string;
		//echo '</pre>';

		$file = RESOURCES_DIR.'card/empty.jpg';
		if (!file_exists($file)) {return false;}

		$imgWidth = 1016; $imgHeight = 639;
		$startWidth = 81; // %
		//$delta = 7; // %
		$delta = 3; // %
		$topText = 460;

		$paragraphs = preg_split('/\n|\r\n?/', $text);

		//$img = imagecreatefrompng($file);
		$img = imagecreatefromjpeg($file);

		$box = new testBox($img);
		//$box = new Box($img);
		//$box->setFontFace(RESOURCES_DIR.'fonts/MuseoSansCyrl/MuseoSansCyrl-Regular.otf');
		$box->setFontFace(RESOURCES_DIR.'fonts/ProximaNovaCondensed/ProximaNovaCondensed-Extrabold.otf');
		$box->setFontSize(32);
		$box->setLineHeight(1.5);

		$colorIndex = imagecolorresolve($img, 255,255,255);
		$newColor = imagecolorsforindex($img, $colorIndex);

		$c = new Color($newColor['red'], $newColor['green'], $newColor['blue']);
		$box->setFontColor($c);

	//    $box->enableDebug();
		$box->setTextAlign('left', 'center');

		$lineHeightPx = $box->lineHeight * $box->fontSize;
		$blockWidth = round($imgWidth * $startWidth / 100);



			$left = $imgWidth*.1;
			$blockWidth = $imgWidth*.8/2;
			$topText = $imgHeight*.75;

			$box->setBox($left, $topText, $blockWidth, $imgHeight*.1);
			$lines = $box->wrapTextWithOverflow($name);
			$blockHeight = count($lines) * $lineHeightPx;
			$box->setBox($left, $topText, $blockWidth, $blockHeight);
			$box->draw($name);


			$box->setTextAlign('right', 'center');
			$left = $imgWidth*.5;
			$blockWidth = $imgWidth*.8/2;
			$topText = $imgHeight*.75;

			$box->setBox($left, $topText, $blockWidth, $imgHeight*.1);
			$lines = $box->wrapTextWithOverflow($string);
			$blockHeight = count($lines) * $lineHeightPx;
			$box->setBox($left, $topText, $blockWidth, $blockHeight);
			$box->draw($string);


	   /* foreach ($paragraphs as $paragraph) {
			//var_dump($blockWidth);
			$left = round(($imgWidth - $blockWidth)/2);
			$box->setBox($left, $topText, $blockWidth, 700);

			$lines = $box->wrapTextWithOverflow($paragraph);

			$blockHeight = count($lines) * $lineHeightPx;
			$box->setBox($left, $topText, $blockWidth, $blockHeight);

			$box->draw($paragraph);

			$topText += $blockHeight;

			if (!empty($paragraph)) {
				$blockWidth = $blockWidth - $delta * $blockWidth / 100;
			}
		}*/
		$newFileName = 'card-'.$card_number.'.jpg';
		imagejpeg($img, RESOURCES_DIR.'card/'.$newFileName, 100);
		//return base64_encode(imagepng($img));
		return RESOURCES_URI.'card/'.$newFileName;
	}
}