<?php 

require('json_answer.php');

class SignIn extends JSON_Answer
{
	private $login; 
	private $password;

	function __construct($login, $password)
	{
		$this->login = $login; 
		$this->password = $password;
	}
	function presence_in_db()
	{
		$flag = 0;
	 	if(file_exists('bd.xml'))
		{
			$xml = simplexml_load_file('bd.xml');
			foreach($xml as $value)
			{
				if ($value->login == $this->login &&
				$value->password == md5($this->password."kakfoaf3gdrgopdk4543gwgmdmvv2mpss211pe1wgw"))
				{
					$flag++;
					break; 
				}
				else
				{
					$answer = new JSON_Answer(false, 'Неверный логин или пароль');
				}
			}
			return $flag;
		}
		else
		{
			$answer = new JSON_Answer(false, 'Не удалось открыть базу данных');
		}
	}
	function signin()
	{
		$presence = $this->presence_in_db(); 
		if($presence != 0)
		{
			session_start();
			$_SESSION['user_login'] =  $this->login; 
			$_SESSION['auth'] = true;
			$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
			$salt = substr(str_shuffle($permitted_chars), 0, 10);
			setcookie('login', $this->login, time()+60*60*24*30);
			setcookie('key', $salt, time()+60*60*24*30);
			$xml = simplexml_load_file('bd.xml');
			if(isset($xml->person[$presence-1]->key))
			{
				$xml->person[$presence-1]->key = $salt;
			}
			else
			{
				$key = $xml->person[$presence-1]->addChild('key', $salt);
			}
			$xml->asXML('bd.xml');
			$answer = new JSON_Answer(1);
		}
	}
}