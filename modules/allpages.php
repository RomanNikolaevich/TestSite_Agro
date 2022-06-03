<?php
//для авторизированных:
if(isset($_SESSION['user'])) {
	$res = q("
        SELECT *
        FROM `users`
        WHERE `id` = ".$_SESSION['user']['id']."
        LIMIT 1
    ");
	$_SESSION['user'] = mysqli_fetch_assoc($res);
	if($_SESSION['user']['active'] !=1) { //0 - не активирован, 1 - активирован, 2- забанен.
		header("Location: index.php?module=auth&page=logout");
		exit();
	}
} elseif(isset($_COOKIE['autoauthhash'], $_COOKIE['autoauthid'])) {
	//
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


//для неавторизированных