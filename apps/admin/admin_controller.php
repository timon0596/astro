<?php



require_once 'admin_model.php';
require_once 'admin_view.php';



/**
* 
*/
class Admin_Controller
{
	private static
		$_auth = false;
	
	function __construct()
	{
		if ( isset( $_GET['logout'] ) )
		{
			User::logout();
			header( 'Location: /' . trim( parse_url($_SERVER['REQUEST_URI'])['path'], '/' ) );
		}
		else
		{
			self::$_auth = User::auth();
		}
	}



	public function actionStart($name, $action = false, $id = false )
	{
		if ( self::$_auth )
		{
			Admin_Model::setInfo( [ 'name' => $name, 'action' => $action, 'id' => $id ] );
			$info = Admin_Model::getInfo();
			//print_r( $info );
			$action = Admin_Model::getAction();
			//var_dump( User::im('rank') );
			if ( $action && User::im('rank') >= 3 )
			{
				self::$action();
			}
			else
			{
				self::actionLogin();
				/*require_once APPS_DIR . 'main/main_controller.php';
				@Main_Controller::action404();*/
			}
		}
		else
		{
			self::actionLogin();
		}


	}



	/*public static function actionAdd()
	{
		echo 'Admin_Controller::actionAdd()' . "\r\n";
		Admin_View::actionAdd();
	}



	public static function actionEdit()
	{
		echo 'Admin_Controller::actionEdit()' . "\r\n";
		Admin_View::actionEdit( Admin_Model::getInfo( 'id' ) );
	}



	public static function actionDel()
	{
		echo 'Admin_Controller::actionDel()' . "\r\n";
		Admin_View::actionDel( Admin_Model::getInfo( 'id' ) );
	}



	public static function actionComplete()
	{
		echo 'Admin_Controller::actionComplete()' . "\r\n";
		Admin_View::actionComplete();
	}*/



	public static function actionList()
	{
		//echo "\r\n" . 'Admin_Controller::actionList()' . "\r\n";
		$name = Admin_Model::getInfo('name');
		Admin_View::actionList( $name );
	}



	public static function actionPage()
	{
		//echo "\r\n" . 'Admin_Controller::actionPage()' . "\r\n";
		$par = Admin_Model::getInfo();
		Admin_View::actionPage( $par['name'], $par['action'], $par['id'], @$par['intype'] );
	}



	public static function action404()
	{
		echo "\r\n" . 'Admin_Controller::action404()' . "\r\n";
	}



	public function actionLogin()
	{
		Admin_View::actionLogin();
	}



	/*public function actionPart($name)
	{
		if ( self::$_auth )
		{
			$action = Admin_Model::getAction($name);
			self::$action($name);
		}
		else
		{
			self::actionLogin();
		}
	}



	public function actionItem($id, $name)
	{
		if ( self::$_auth )
		{
			$action = Admin_Model::getAction($name,$id);
			self::$action($id, $name);
		}
		else
		{
			self::actionLogin();
		}
	}



	public function actionList($name)
	{
		//echo 'actionList(' . $name . ')<br>';
		Admin_View::viewList($name);
	}



	public function actionPage($name)
	{
		//echo 'actionPage(' . $name . ')<br>';
		Admin_View::viewPage( $name );
	}



	public function actionPost($id, $name)
	{
		//echo 'actionPost(' . $id . ', ' . $name . ')<br>';
		Admin_View::viewPost($id, $name);
	}



	public function actionLogin()
	{
		//echo 'actionLogin()<br>';
		Admin_View::viewLogin();
	}


	public function action404($name=null)
	{
		//echo 'action404(' . $name . ')<br>';
		Admin_View::view404();
	}*/

}