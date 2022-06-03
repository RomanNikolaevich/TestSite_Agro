<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['access'] != 1) {
	//exit();
}

if(isset($_POST['login'], $_POST['pass'], $_POST['do_login'])) {
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