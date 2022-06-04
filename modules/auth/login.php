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
		}

		//если галочку согласия с автоавторизацией пользователь отметил:
		if (!empty($_POST['autoauthconfirm'])) {
			$_SESSION['user'] = mysqli_fetch_assoc($res);
			$autoauthhash = myHash($_SESSION['user']['id'].$_SESSION['user']['login'].$_SESSION['user']['email']);
			setcookie('autoauthid', $_COOKIE['PHPSESSID'], time()+3600*30);
			setcookie('autoauthhash', $autoauthhash , time()+3600*30);
			q("
			UPDATE `users` SET
				`hash` = '".mres($autoauthhash)."'
				WHERE `users`.`id` = ".(int)$_SESSION['user']['id']."
			");
			if($_SESSION['user']['active'] !=1) { //0 - не активирован, 1 - активирован, 2 - забанен.
				$error = 'Вы не авторизированы';
			}
		}
	}
}
