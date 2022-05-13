<?php
if(isset($_POST['login'], $_POST['email'], $_POST['password'])) {
	$errors = [];
	$link = mysqli_connect("localhost", "root", "root", "agrodb");
	if(empty($_POST['login'])) {
		$errors['login'] = 'Вы не заполнили логин';
	}
	if(empty($_POST['password'])) {
		$errors['password'] = 'Вы не заполнили пароль';
	}
	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Вы не заполнили email';
	}
	if(!count($errors)) {
		mysqli_query($link, "
		INSERT INTO `users` SET
		`login` = '".mysqli_real_escape_string($link, $_POST['login'])."',
		`password` = '".mysqli_real_escape_string($link, $_POST['password'])."',
		`email` = '".mysqli_real_escape_string($link, $_POST['email'])."',
		`age` = ".(int)$_POST['age']."
		") or exit(mysqli_error($link)); //вывод ошибок БД
		$_SESSION['regok'] = 'OK';
		header("Location: index.php?module=auth&page=regin");
		$_SESSION['access'] = 1;
		$_SESSION['login'] = $_POST['login'];
		setcookie('access', 1, time() + 3600, '/');
		exit();
	}
}
