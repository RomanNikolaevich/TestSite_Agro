<?php
session_start();
if($_SESSION['server'] < 1) {
	echo 'Игрок победил';
} elseif($_SESSION['client'] < 1) {
	echo 'Компьютер победил';
}

//unset($_SESSION['client']);
//unset($_SESSION['server']);

if(!empty ($_POST['regame'])) {
	session_destroy();
	header("Location: main.php");
	//header("Location: http://".$_SERVER['HTTP_HOST']."/index.php?module=games&page=game");
	//exit;
}
