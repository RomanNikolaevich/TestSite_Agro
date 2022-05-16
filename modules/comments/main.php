<?php
/**
 * @var $link
 */
//Информацию из форм отправляем в БД:
if(isset($_POST['username'], $_POST['comment'], $_POST['do_signup'])) {
	$errors = [];
	if(empty($_POST['username'])) {
		$errors['username'] = 'Вы не заполнили логин';
	}
	if(empty($_POST['comment'])) {
		$errors['comment'] = 'Вы не заполнили комментарий';
	} elseif(mb_strlen($_POST['comment'], 'UTF-8') < 50) {
		$errors['comment'] = 'Длинна комментария меньше 50 символов!';
	}
	if(!empty($_POST['username']) and !empty($_POST['comment'])) {
		if(!count($errors)) {
			if(!empty($_SESSION['login'])) {
				$username = $_SESSION['login'];
			} else {
				$username = $_POST['username'];
			}
			$comment = $_POST['comment'];
			$query = "INSERT INTO comments SET name='$username', text='$comment'";
			mysqli_query($link, $query) or exit(mysqli_error($link));
			$_SESSION['commentOk'] = 'OK';
			header("Location: index.php?module=comments&action=main");
			exit();
		}
	}
}

//пагинатор - поверка, есть ли GET запрос
$pageno = $_GET['page'] ?? 1;
// LIMIT задаёт лимит записей
$limit = 5;
//OFFSET задает количество строк, которые нужно пропустить.
$offset = ($pageno - 1) * $limit;

$comments = getComments($link, $limit, $offset);

function getComments($link, int $limit, int $offset) {
	$commentQuery = "SELECT * FROM `comments` ORDER BY `date` DESC LIMIT $limit OFFSET $offset";
	$commentResult = mysqli_query($link, $commentQuery);
	$comments = mysqli_fetch_all($commentResult, MYSQLI_ASSOC);

	return $comments;
}

//счетчик комментариев:
$commentResult = mysqli_query($link, "SELECT * FROM `comments`");
$commentCount = mysqli_num_rows ($commentResult);

//Считаем количество страниц:
$total_pages = ceil($commentCount/$limit);

mysqli_close($link);
