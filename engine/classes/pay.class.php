<?php
/*
Поле orderStatus может принимать следующие значения:

0 Заказ зарегистрирован, но не оплачен
1 Предавторизованная сумма захолдирована (для двухстадийных платежей)
2 Проведена полная авторизация суммы заказа
3 Авторизация отменена
4 По транзакции была проведена операция возврата
5 Инициирована авторизация через ACS банка-эмитента
6 Авторизация отклонена


Коды ошибок (поле errorCode):

0 Обработка запроса прошла без системных ошибок
5 Не заполнено одно из обязательных полей
5 Неверный формат параметра transactionStates
5 Доступ запрещён
7 Системная ошибка
10 Значение параметра size превышает максимально допустимое
10 Недостаточно прав для просмотра транзакций указанного мерчанта






В качестве Cardholder name указывать от 2 слов в английской раскладке.
Для всех карт, вовлечённых в 3-D Secure (veres=y, pares=y или a) пароль на ACS: 12345678.

Cardholder name
KONOVALCHUK EDUARD
12345678


PAN					CVC		Expiration	Processing Response

4444444444446666	123		2019/12		Блокировка по лимиту.
4111111111111111	123		2019/12		Запрос успешно обработан.
4563960122001999	347		2019/12		Запрос успешно обработан.
5555555555555557	123		2019/12		Банк-эмитент не смог провести авторизацию 3dsecure-карты.
5555555555555599	123		2019/12		Запрос успешно обработан.
639002000000000003	123		2019/12		Запрос успешно обработан.
4444444444444422	123		2019/12		Неверный формат сообщения.
4444444411111111	123		2019/12		Отказ сети проводить транзакцию.
4444444499999999	123		2019/12		Ошибка связи 3DS





test

4444444444446666
Не получен ответ от банка. Повторите позже

4111111111111111
Please submit your Verified by Visa password.
Не получен ответ от банка. Повторите позже.

4563960122001999
Операция невозможна. Аутентификация держателя карты завершена неуспешно.

5555555555555557
Please submit your MasterCard SecureCode.
Ошибка 3-D Secure авторизации.
Error code: 2
Error message: Платеж отклонен
Order status: 6

5555555555555599
Не получен ответ от банка. Повторите позже.

639002000000000003
Не получен ответ от банка. Повторите позже.

4444444444444422
Не получен ответ от банка. Повторите позже
Не получен ответ от банка. Повторите позже
Error code: 2
Error message: Платеж отклонен
Order status: 6

4444444411111111
Не получен ответ от банка. Повторите позже.
Не получен ответ от банка. Повторите позже.
Error code: 2
Error message: Платеж отклонен
Order status: 6

4444444499999999
Не получен ответ от банка. Повторите позже.
*/

/**
* 
*/
class Pay
{

	private static
		/*$USERNAME = 'BANKA-DELIVERY-api',
		$PASSWORD = 'BANKA-DELIVERY',
		$GATEWAY_URL = 'https://web.rbsuat.com/ucs/payment/rest/',
		$RETURN_URL = 'http://mvc-banka/complete';*/
		$USERNAME = 'banka-delivery-api',
		$PASSWORD = 'B988!c16e47',
		$GATEWAY_URL = 'https://ucs.rbsgate.com/payment/rest/',
		$RETURN_URL = null;
	
	function __construct()
	{
	}

	public static function gateway($method, $data)
	{
		$curl = curl_init(); //
		curl_setopt_array($curl, array(
		//CURLOPT_URL => self::$GATEWAY_URL.$method, //
		CURLOPT_URL => self::$GATEWAY_URL.$method, //
		CURLOPT_RETURNTRANSFER => true, //
		CURLOPT_POST => true, // POST
		CURLOPT_POSTFIELDS => http_build_query($data) //
		));
		$response = curl_exec($curl); //

		$response = json_decode($response, true); // JSON

		curl_close($curl); //
		return $response; //
	}

	public static function get($name)
	{
		switch ($name) {
			case 'USERNAME':
				return self::$USERNAME;
				break;
			case 'PASSWORD':
				return self::$PASSWORD;
				break;
			case 'GATEWAY_URL':
				return self::$GATEWAY_URL;
				break;
			case 'RETURN_URL':
				if ( self::$RETURN_URL == null )
				{
					self::$RETURN_URL = 'http://' . $_SERVER['HTTP_HOST'] . '/complete';
				}
				return self::$RETURN_URL;
				break;
			
			default:
				return false;
				break;
		}
	}
}