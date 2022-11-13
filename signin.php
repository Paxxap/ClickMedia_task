<?php
session_start();

require('signin_class.php');

$new_autorization = new SignIn($_POST['login'], $_POST['password']);
$new_autorization->signin();