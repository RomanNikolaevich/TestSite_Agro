<?php
//для неавторизированных, но которые согласились на авто-авторизацию:
if(isset($_COOKIE['autoauthhash'], $_COOKIE['autoauthid'])) {
	$res = q("
		SELECT * 
		FROM `users` 
		WHERE `hash` = '".$_COOKIE['autoauthhash']."'
    ");
	$_SESSION['user'] = mysqli_fetch_assoc($res);
}

//запрет доступа для забаненых по 'active'=2 в БД:
if(isset($_SESSION['user'])) {
	$res = q("
        SELECT *
        FROM `users`
        WHERE `id` = " . $_SESSION['user']['id'] . "
        LIMIT 1
    ");
	$_SESSION['user'] = mysqli_fetch_assoc($res);
	if ($_SESSION['user']['active'] != 1) { //0 - не активирован, 1 - активирован, 2- забанен.
		header("Location: index.php?module=auth&page=logout");
		exit();
	}
}
//Ограничение доступа для забаненых:
if(isset($_SESSION['user'])) {
	$res = q("
        SELECT *
        FROM `users`
        WHERE `id` = " . $_SESSION['user']['id'] . "
        AND `access` = 5
        LIMIT 1
    ");
	$_SESSION['blockeduser'] = mysqli_fetch_assoc($res);
}

//Расширенный доступ для админов:
if(isset($_SESSION['user'])) {
	$res = q("
        SELECT *
        FROM `users`
        WHERE `id` = " . $_SESSION['user']['id'] . "
        AND `access` = 2
        LIMIT 1
    ");
	$_SESSION['adminuser'] = mysqli_fetch_assoc($res);
}

