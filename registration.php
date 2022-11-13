<?php 

session_start(); // не понятно пока

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма регистрации</title>
	<link rel="stylesheet" href="style.css">
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/form.js"></script>
</head>
<body>
	<div>
		<form action="signup.php" method="post" class="registration"> 
			<div>
				<h1>Форма регистрации</h1>
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
				<label>Повторите пароль</label>
			</div>
			<div>
				<input type="password" name="confirm_password" placeholder="Enter your password again">
			</div>
			<br>
			<div>
				<label>Email</label>
			</div>
			<div>
				<input type="email" name="email" placeholder="Enter your email">
			</div>
			<br>
			<div>
				<label>Имя</label>
			</div>
			<div>
				<input type="text" name="name" placeholder="Enter your name">
			</div>
			<br>
			<div>
				<button id='reg-btn' type="submit" class="login-btn" style="display: none">Войти</button>
			</div>
			<div>
				<p>У вас есть аккаунт? - <a href="index.php"> Авторизация </a></p>
			</div>
		</form>
		 <p class="msg none">Lorem</p>
	</div>
</body>
<script type="text/javascript">
  document.getElementById( 'reg-btn' ).style.display = 'block';
</script>
</html>