<?php 

session_start(); 
require('check_cookie.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма авторизации</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/form.js"></script>
</head>
<body>
	<div>
		<form action="signin.php" method="post"> 
			<div>
				<h1>Форма авторизации</h1>
			</div>
			<br>
			<div>
				<label>Логин</label>
			</div>
			<div>
				<input type="text" name="login" placeholder="Enter your login">
			</div>
			<br>
			<div>
				<label>Пароль</label>
			</div>
			<div>
				<input type="password" name="password" placeholder="Enter your password">
			</div>
			<br>
			<div>
				<button id='aut-btn' type="submit" class="login-btn" style="display: none" >Войти</button>
			</div>
			<div>
				<p>У вас нет аккаунта? - <a href="registration.php"> Регистрация </a></p>
			</div>
		</form>
		 <p class="msg none">Lorem</p>
	</div>
</body>
<script type="text/javascript">
  document.getElementById( 'aut-btn' ).style.display = 'block';
</script>
</html>
