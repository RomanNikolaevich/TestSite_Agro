<?php
if($_SESSION['server'] < 1) {
	echo 'Игрок победил';
} elseif($_SESSION['client'] < 1) {
	echo 'Компьютер победил';
}

if(!empty ($_POST['regame'])) {
	session_destroy();
	header('Location: index.php?module=game&page=game', true, 303);
	exit;
}
