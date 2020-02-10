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


*/

/**
* 
*/
class Compilation_Model
{
	
	function __construct()
	{
		# code...
	}


	public static function rest()
	{
					if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['orderId'])) {
					}
					/**
					 *
					 */
					else if ($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$data = array(
							'userName' => Pay::get('USERNAME'),
							'password' => Pay::get('PASSWORD'),
							'orderNumber' => urlencode($_POST['orderNumber']),
							'amount' => urlencode($_POST['amount']),
							'returnUrl' => Pay::get('RETURN_URL')
						);
						$response = Pay::gateway('register.do', $data);


						if (isset($response['errorCode']))
						{
							echo ' #' . $response['errorCode'] . ': ' . $response['errorMessage'];
						}
						else
						{
							header('Location: ' . $response['formUrl']);
							die();
						}
					}
					/**
					 *
					 */
					else if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['orderId']))
					{
						$data = array(
							'userName' => Pay::get('USERNAME'),
							'password' => Pay::get('PASSWORD'),
							'orderId' => $_GET['orderId']
						);

						$response = Pay::gateway('getOrderStatus.do', $data);

						//
						echo '
						<b>Error code:</b> ' . $response['ErrorCode'] . '<br />
						<b>Order status:</b> ' . $response['OrderStatus'] . '<br />
						';
						//var_dump($response);
					}
	}

}