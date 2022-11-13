<?php 

require('json_answer.php');

 class SignUp extends JSON_Answer
 {
 	private $login; 
 	private $password;
	private $password_confirm;
	private $name;
	private $email;

	function __construct ($login, $password, $password_confirm, $email, $name)
    {
		$this->login = $login;
		$this->password = $password;
		$this->password_confirm = $password_confirm;
		$this->name = $name;
		$this->email = $email;
	}

	function check_unique_info()
	{
		if(file_exists('bd.xml'))
		{
			$flag = 0;
			$xml = simplexml_load_file('bd.xml');
			foreach($xml as $value)
			{
				if ($value->login == $this->login || $value->email == $this->email)
				{
					 $flag++; 
				}
			}
			return $flag;
		}
		else
		{
			$answer = new JSON_Answer(false, 'Не удалось открыть файл bd.xml');
		}
	}
	function validation()
	{
		if($this->login != '' && $this->password != '' && $this->password_confirm != '' && $this->name != '' && $this->email != '')
		{
			if(!filter_var($this->email, FILTER_VALIDATE_EMAIL))
			{
				$answer = new JSON_Answer(false, 'Неверный email');
			}
			$unique = $this->check_unique_info(); 
			if($unique == 0)
			{
				if($this->password === $this->password_confirm)
				{
					return true;
				}
				else
				{
					$answer = new JSON_Answer(false, 'Введенные пароли не совпадают');
				}
			}
			else
			{
				$answer = new JSON_Answer(false, 'Введены не уникальные данные');
			}
		}
		else
		{
			$answer = new JSON_Answer(false, 'Проверьте введенные данные');
		}
	}
	function signup()
	{
		$validate = $this->validation(); 
		if($validate)
		{
			$this->password  = md5($this->password."kakfoaf3gdrgopdk4543gwgmdmvv2mpss211pe1wgw"); 
			$result = array( 
				login=>$this->login, 
				password=>$this->password, 
				email=>$this->email, 
				name=>$this->name
			);


			$xml = simplexml_load_file('bd.xml');
			$person = $xml->addChild('person'); 
			foreach ($result as $key=>$value)
			{
				$person->addChild($key, $value);
			}
			$xml->asXML('bd.xml');
			$answer = new JSON_Answer(2);
		}
	}
 }