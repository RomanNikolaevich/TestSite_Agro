<?php
/**
 * @var $link
 */
if(isset($_POST['loginComm'], $_POST['textComm'], $_POST['do_signup'])) {
	$errors = [];
	if(empty($_POST['loginComm'])) {
		$errors['loginComm'] = 'Вы не заполнили логин';
	}
	if(empty($_POST['textComm'])) {
		$errors['textComm'] = 'Вы не заполнили комментарий';
	}
	if (!empty($_POST['loginComm']) and !empty($_POST['textComm'])) {
		if(!count($errors)) {
			$loginComm = $_POST['loginComm'];
			$textComm = $_POST['textComm'];
			$query = "INSERT INTO comments SET name='$loginComm', text='$textComm'";
			mysqli_query($link, $query) or exit(mysqli_error($link));
			$_SESSION['commentOk'] = 'OK';
			header("Location: index.php?module=comments&page=comments");
			exit();
		}
	}
}
