<?php
/**
 * @var $link
 */
if(isset($_POST['login'], $_POST['email'], $_POST['password'])) {
	$errors = [];
	$login = $_POST['login'];
	$password = $_POST['password'];
	$email = $_POST['email'];
	$query = "SELECT * FROM users WHERE login='$login'";

	$user = mysqli_fetch_assoc(q($query));

	if(empty($login)) {
		$errors['login'] = 'Вы не заполнили логин';
	} elseif (mb_strlen($login) < 2) {
		$errors['login'] = 'Логин слишком короткий';
	} elseif (mb_strlen($login) > 18) {
		$errors['login'] = 'Логин слишком длинный';
	}

	if(empty($password)) {
		$errors['password'] = 'Вы не заполнили пароль';
	} elseif (mb_strlen($password) < 5) {
		$errors['login'] = 'Пароль слишком короткий, не меньше 4 символов';
	}

	if(empty($email) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Вы не заполнили email';
	}

	if(empty($user)) {
		if(!count($errors)) {
			q("
		INSERT INTO `users` SET
		`login`    = '".mres($login)."',
		`password` = '".mres($password)."',
		`email`    = '".mres($email)."',
		`age`      = ".(int)$_POST['age']."
		");// or exit(mysqli_error($link)); //вывод ошибок БД нам не нужен - есть в функции
			$_SESSION['regok'] = 'OK';
			header("Location: /index.php?module=auth&page=regin");
			$_SESSION['access'] = 1;
			$_SESSION['login'] = $login;
			setcookie('access', 1, time() + 3600, '/');
			exit();
		}
	} else {
		$errors['loginwrong'] = 'такой логин уже зарегистрирован на сайте, выберите другой';
	}
}
