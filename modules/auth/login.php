<?php
//Создание доступа к странице
/*if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 1) {
	exit();
}*/

if(!empty($_POST['login']) && !empty($_POST['password'])) {
	$login = $_POST['login'];
	$password = $_POST['password'];
		//Сверка даннх из формы авторизации с данными в БД:
		$res = q("
		SELECT *
		FROM `users`
		WHERE `login`      = '".mres($login)."'
			&& `password` = '".myHash($password)."'
			&& `active`   = 1
			LIMIT 1
	");

	if(mysqli_num_rows($res)) {
		//если галочку согласия с автоавторизацией пользователь НЕ отметил:
		if (empty($_POST['autoauthconfirm'])) {
			$_SESSION['user'] = mysqli_fetch_assoc($res);

			//$error = 'Вы авторизированы';
		} /*else {
			$error =  'Неверно введен логин или пароль';
		}*/
		//если галочку согласия с автоавторизацией пользователь отметил:
		if (!empty($_POST['autoauthconfirm'])) {
			$_SESSION['user'] = mysqli_fetch_assoc($res);
			if($_SESSION['user']['active'] !=1) { //0 - не активирован, 1 - активирован, 2 - забанен.
				$error = 'Вы не авторизированы';
			}
		}
		//echo 'Вы прошли авто-авторизацию';
		/*$user = $_SESSION['user'];
		setcookie('my_array[0]', 'value1' , time()+3600);
		setcookie('my_array[1]', 'value2' , time()+3600);
		setcookie('my_array[2]', 'value3' , time()+3600);*/
		/*wtf($_SESSION['user']);
		exit();*/
	}

	/*if(mysqli_num_rows($res)) {
		$_SESSION['user'] = mysqli_fetch_assoc($res['login']);
		$status = 'OK!';
		$error = 'всё нормально!!!';
		//setcookie("user", 'user', time() + 3600, '/');
	} else {
		$error = 'Нет пользователя с таким логином и паролем';
	}*/


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