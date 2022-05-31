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

	//Делаем проверку логина и email на уникальность:
	if (!count($errors)) {
		$res = q("
				SELECT `id`
				FROM `users`
				WHERE `login` = '".mres($_POST['login'])."'
				LIMIT 1
			");
		if(mysqli_num_rows($res)) {
			$errors['login'] = 'Такой логин уже занят';
		}
		$res = q("
				SELECT `id`
				FROM `users`
				WHERE `email` = '".mres($_POST['email'])."'
				LIMIT 1
			");
		if(mysqli_num_rows($res)) {
			$errors['email'] = 'Такой email уже занят';
		}
	}

	if(empty($user)) {
		if(!count($errors)) {
			q("
		INSERT INTO `users` SET
		`login`    = '".mres($login)."',
		`password` = '".myHash($password)."',
		`email`    = '".mres($email)."',
		`age`      = ".(int)$_POST['age'].",
		`hash`     = '".myHash($_POST['login'].$_POST['age'])."'
		");// or exit(mysqli_error($link)); //вывод ошибок БД нам не нужен - есть в функции
			$id = mysqli_insert_id($link);

			$_SESSION['regok'] = 'OK';
			class_Mail::$to = $_POST['email'];
			class_Mail::$subject = 'Вы зарегистрировались на сайте';
			class_Mail::$text = '
			...Если вы не регистрировались, то не отвечайте на данное письмо. Если это все-таки
			вы регистрировались, то пройдите по ссылке для активации вашего аккаунта:
			'.Core::$DOMAIN.'index.php?module?cab&page=activate&id='.$id.'hash='.myHash($_POST['login'].$_POST['age']).'
			';
			class_Mail::send();
			header("Location: /index.php?module=auth&page=activate");
			//$_SESSION['access'] = 1;
			//$_SESSION['login'] = $login;
			//setcookie('access', 1, time() + 3600, '/');
			exit();
		}
	} /*else {
		$errors['loginwrong'] = 'такой логин уже зарегистрирован на сайте, выберите другой';
	}*/
}

