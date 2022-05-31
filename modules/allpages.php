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
		header("Location: index.php?module=auth&page=exit");
		exit();
	}
}

//для неавторизированных