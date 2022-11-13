<?php 

require('signup_class.php');

$new_registration = new SignUp($_POST['login'], $_POST['password'], $_POST['confirm_password'], $_POST['email'],$_POST['name']);
$new_registration->signup();