<?php 

require('json_answer.php');

if (empty($_SESSION['auth']) || $_SESSION['auth'] == false)
{
	if ( !empty($_COOKIE['login']) && !empty($_COOKIE['key']) ) 
	{
		$login = $_COOKIE['login']; 
		$key = $_COOKIE['key'];
		$xml = simplexml_load_file('bd.xml'); 
		foreach($xml as $value)
		{
			if ($value->login == $login &&
			$value->key == $key)
			{
				$result = $value;
			}
			if (!empty($result)) 
			{
				session_start(); 
				$_SESSION['auth'] = true; 
				$_SESSION['user_login'] =  $login;
			}
		}
	}
}