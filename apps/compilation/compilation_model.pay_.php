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


	public static function rest()
	{

					$orderNumber = substr( md5( User::im('id') . time() ), 24 ) . time();
					$totalSum = 30;

					/**
					 *
					 *
					 * USERNAME , .
					 * PASSWORD , .
					 * GATEWAY_URL .
					 * RETURN_URL ,
					 * .
					 */
					define('USERNAME', 'BANKA-DELIVERY-api');
					define('PASSWORD', 'BANKA-DELIVERY');
					define('GATEWAY_URL', 'https://web.rbsuat.com/ucs/payment/rest/');
					//define('RETURN_URL', 'http://mvc-banka/compilation/pay/rest');
					define('RETURN_URL', 'http://mvc-banka/complete');
					/**
					 *
					 *
					 * POST
					 * cURL.
					 *
					 *
					 * method API.
					 * data .
					 *
					 *
					 * response .
					 */
					function gateway($method, $data) {
						$curl = curl_init(); //
						curl_setopt_array($curl, array(
						CURLOPT_URL => GATEWAY_URL.$method, //
						CURLOPT_RETURNTRANSFER => true, //
						CURLOPT_POST => true, // POST
						CURLOPT_POSTFIELDS => http_build_query($data) //
						));
						$response = curl_exec($curl); //

						$response = json_decode($response, true); // JSON
						curl_close($curl); //
						return $response; //
					}
					/**
					 *
					 */
					if ($_SERVER['REQUEST_METHOD'] == 'GET' && !isset($_GET['orderId'])) {
						?>
						<form method="post">
							<p>Заказ №<?php echo $orderNumber; ?></p>
							<input type="hidden" name="orderNumber" value="<?php echo $orderNumber; ?>" />
							<p>Сумма заказа: <?php echo $totalSum; ?> руб.</p>
							<input type="hidden" name="amount" value="<?php echo $totalSum; ?>" />
							<input type="submit" value="Перейти к оплате"></input>
						</form>
						<?php
					}
					/**
					 *
					 */
					else if ($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$data = array(
							'userName' => USERNAME,
							'password' => PASSWORD,
							'orderNumber' => urlencode($_POST['orderNumber']),
							'amount' => urlencode($_POST['amount']),
							'returnUrl' => RETURN_URL
						);
						/**
						 *
						 * register.do
						 *
						 *
						 * userName .
						 * password .
						 * orderNumber .
						 * amount .
						 * returnUrl , .
						 *
						 *
						 * :
						 * errorCode . .
						 * errorMessage .
						 *
						 * :
						 * orderId . .
						 * formUrl URL , .
						 *
						 *
						 * 0 .
						 * 1 .
						 * 3 () .
						 * 4 .
						 * 5 .
						 * 7 .
						 */
						$response = gateway('register.do', $data);

						/**
						 *
						 * registerPreAuth.do
						 *
						 * , .
						 * register.do, registerPreAuth.do.
						 */
						 // $response = gateway('registerPreAuth.do', $data);

						if (isset($response['errorCode']))
						{ //
							echo ' #' . $response['errorCode'] . ': ' . $response['errorMessage'];
						}
						else
						{ //
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
							'userName' => USERNAME,
							'password' => PASSWORD,
							'orderId' => $_GET['orderId']
						);

						/**
						 *
						 * getOrderStatus.do
						 *
						 *
						 * userName .
						 * password .
						 * orderId . .
						 *
						 *
						 * ErrorCode . .
						 * OrderStatus .
						 * . , .
						 *
						 *
						 * 0 .
						 * 2 .
						 * 5 ;
						 * ;
						 * .
						 * 6 .
						 * 7 .
						 *
						 *
						 * 0 , .
						 * 1 ( ).
						 * 2 .
						 * 3 .
						 * 4 .
						 * 5 ACS -.
						 * 6 .
						 */
						$response = gateway('getOrderStatus.do', $data);

						//
						echo '
						<b>Error code:</b> ' . $response['ErrorCode'] . '<br />
						<b>Order status:</b> ' . $response['OrderStatus'] . '<br />
						';
						var_dump($response);
					}
	}

}