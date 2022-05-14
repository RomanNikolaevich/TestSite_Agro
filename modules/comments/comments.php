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
	if(!empty($_POST['loginComm']) and !empty($_POST['textComm'])) {
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

$commentResult = mysqli_query($link, 'SELECT * FROM `comments` ORDER BY `date` DESC')
or exit(mysqli_error());
$commentOutput = mysqli_fetch_assoc($commentResult);
$commentCount = mysqli_num_rows($commentResult);
//счетчик комментариев:
if($commentCount) {
	$commentCountSumm = 'Всего '.$commentCount.' коментариев:<br>';
} else {
	$commentCountNull = 'Комментариев пока еще нет, вы будете первым';
}

// вывод комментариев на экран:
function comment_output() {
	$query = 'SELECT * FROM `comments` ORDER BY `date` DESC';
	$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
	$commentResult = mysqli_query($link, $query);
	while($row = mysqli_fetch_assoc($commentResult)) {
		echo '<div>'.$row['name'].' ';
		echo '('.$row['date'].')'.' : '.'<br>';
		echo '<i>'.$row['text'].'</i>'.'<br>';
		echo '</div>'.'<p> </p>';
	}
}
