<?php
if(isset($_POST['login'], $_POST['email'], $_POST['password'], $_POST['do_login'])) {
	if(!empty($_POST['login'])) {
		if (!preg_match("/^[a-zA-Z]*$/", $_POST['login'])) {
			$errorForm['loginError'] = "В логине допускаются только латинские буквы";
		}
	}
	if(!empty($_POST['email'])) {
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errorForm['emailError'] = "Почтовый адресс введен не верно!";
		}
	}
	if(($_POST['login'] === ADMINLOGIN)
		&& ($_POST['email'] === ADMINEMAIL)
		&& ($_POST['password'] === ADMINPASS)
	) {
		$_SESSION['access'] = 1;
		$_SESSION['login'] = $_POST['login'];
		setcookie('access', 1, time() + 3600, '/');
		header('Location: /index.php');
	} else {
		$errorForm['enterError'] = $_POST['login'].' не найден в базе данных. Введите правильные данные или пройдите регистрацию';
	}
}
