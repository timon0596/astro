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

	public function policy ()
	{
		$_SESSION['policy'] = true;
		return true;
	}
}