<?php
/**
 * @var $link
 */
//Информацию из форм отправляем в БД:
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

//пагинатор - поверка, есть ли GET запрос
$pageno = $_GET['page'] ?? 1;
// Назначаем количество данных на одной странице
$limit = 5;
// Вычисляем с какого объекта начать выводить
$offset = ($pageno - 1) * $limit;

// Создаём SQL запрос для получения данных:
$commentQuery = 'SELECT * FROM `comments` ORDER BY `date` DESC LIMIT $offset, $limit';
//or exit(mysqli_error());
// Отправляем SQL запрос
$commentResult = mysqli_query($link, $commentQuery);

//Выбирает следующую строку из набора результатов и помещает её в ассоциативный массив:
$commentOutput = mysqli_fetch_assoc($commentResult);

//Получает количество строк в наборе результатов:
$commentCount = mysqli_num_rows($commentResult);
//счетчик комментариев:
if($commentCount) {
	$commentCountSumm = 'Всего '.$commentCount.' коментариев:<br>';
} else {
	$commentCountNull = 'Комментариев пока еще нет, вы будете первым';
}

//цикл вывода комменнтариев:
while($commentOutput) {
	$commentOutputBlock = '<div>'.$commentOutput['name'].' '.'('.$commentOutput['date'].')'.' : '.'<br>'.
	'<i>'.$commentOutput['text'].'</i>'.'<br>'.
	'</div>'.'<p> </p>';
}
mysqli_close($link);
