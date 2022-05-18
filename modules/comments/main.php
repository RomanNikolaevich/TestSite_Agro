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
    } elseif (mb_strlen($comment, 'UTF-8') < 50) {
        $errors['comment'] = 'Длинна комментария меньше 50 символов!';
    }

    if (!count($errors)) {
        $username = mysqli_real_escape_string($link, $username);
        if (empty($_SESSION['username'])) {
            $_SESSION['username'] = $username;
        }
        $comment = mysqli_real_escape_string($link, $comment);
        $query = "INSERT INTO `comments` SET `name`='$username', `text`='$comment'";
        mysqli_query($link, $query) or exit(mysqli_error($link));
        $_SESSION['commentOk'] = 'OK';
        header("Location: index.php?module=comments&action=main");
        exit();
    }
}
if (isset($_POST['relogin'])) {
    unset ($_SESSION['username']);
    header("Location: index.php?module=comments&action=main");
}

//пагинатор - поверка, есть ли GET запрос
$pageno = $_GET['page'] ?? 1;
// LIMIT задаёт лимит записей
$limit = 5;
//OFFSET задает количество строк, которые нужно пропустить.
$offset = ($pageno - 1) * $limit;

$comments = getComments($link, $limit, $offset);

function getComments($link, int $limit, int $offset)
{
    $commentQuery = "SELECT * FROM `comments` ORDER BY `date` DESC LIMIT $limit OFFSET $offset";
    $commentResult = mysqli_query($link, $commentQuery);
    $comments = mysqli_fetch_all($commentResult, MYSQLI_ASSOC);

    return $comments;
}

//счетчик комментариев:
$commentResult = mysqli_query($link, "SELECT * FROM `comments`"); //запрос к БД комментов
$commentCount = mysqli_num_rows($commentResult); // Получаем количество строк в БД

//Считаем количество страниц:
$totalPages = ceil($commentCount / $limit);

mysqli_close($link);
