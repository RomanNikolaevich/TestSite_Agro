<?php
/**
 * @var $link
 */

//Информацию из форм отправляем в БД:
if (isset($_POST['do_signup'])) {
    $errors = [];
    $username = $_SESSION['username'] ?? $_POST['username'] ?? '';
    $comment = $_POST['comment'] ?? '';

    if (empty($username)) {
        $errors['username'] = 'Вы не заполнили логин';
    }
    if (empty($comment)) {
        $errors['comment'] = 'Вы не заполнили комментарий';
    } elseif (mb_strlen($comment) < 50) {
        $errors['comment'] = 'Длинна комментария меньше 50 символов!';
    }

     validateName($comment);

    if (!count($errors)) {
        $username = mysqli_real_escape_string($link, $username);
        if (empty($_SESSION['username'])) {
            $_SESSION['username'] = $username;
        }
        $comment = mysqli_real_escape_string($link, $comment);
        $query = "INSERT INTO `comments` SET `name`='$username', `text`='$comment'";
        mysqli_query($link, $query) or exit(mysqli_error($link));
        $_SESSION['commentOk'] = 'OK';
        header("Location: /index.php?module=comments&page=main");
        exit();
    }
}
if (isset($_POST['relogin'])) {
    unset ($_SESSION['username']);
    header("Location: /index.php?module=comments&page=main");
}

//пагинатор - поверка, есть ли GET запрос
$pageno = $_GET['pageno'] ?? 1;
// LIMIT задаёт лимит записей
$limit = 5;
//OFFSET задает количество строк, которые нужно пропустить.
$offset = ($pageno - 1) * $limit;

$comments = getComments($link, $limit, $offset);

//счетчик комментариев:
$commentResult = q("SELECT * FROM `comments`"); //запрос к БД комментов
$commentCount = mysqli_num_rows($commentResult); // Получаем количество строк в БД

//Считаем количество страниц:
$totalPages = ceil($commentCount / $limit);
//Для расчета нумерации комментариев с учетом смены страниц пагинатором.
$currentCommentNumber = $commentCount - $offset;
