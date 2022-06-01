<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 1) {
	exit();
}

if(isset($_POST['login'], $_POST['password'], $_POST['do_login'])) {
	if(!empty($_POST['login'])) {
		$res = q("
		SELECT *
		FROM `users`
		WHERE `login` = '".mres($_POST['login'])."'
			AND `password` = '".myHash($_POST['pass'])."'
			AND `active` = 1
			LIMIT 1
	");

		if(mysqli_num_rows($res)) {
			$_SESSION['user'] = mysqli_fetch_assoc($res);
			$status = 'OK!';
		} else {
			$error = 'Нет пользователя с таким логином и паролем';
		}


}
}

/*if(($_POST['login'] === Core::$ADMINLOGIN)
	&& ($_POST['password'] === Core::$ADMINPASS)
	) {
		$_SESSION['access'] = 1;
		$_SESSION['login'] = $_POST['login'];
		setcookie('access', 1, time() + 3600, '/');
		header('Location: /index.php');
} else {
	$errorForm['enterError'] = $_POST['login'].' не найден в базе данных. Введите правильные данные или пройдите регистрацию';
}*/