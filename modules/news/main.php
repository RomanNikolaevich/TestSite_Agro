<?php
//удаление новости:
if (isset($_POST['delete'])){
    $_POST['ids'] = array();
    //циклом прогоняем массив, чтобы привести его к типу число (int):
    foreach($_POST['ids'] as $k=>$v) {
        $_POST['ids'][$k]
            = (int)$v;
    }
    //wtf($_POST['ids'],1); //выведет на экран массив
    $ids = implode(',', $_POST['ids']);
    //wtf($ids); // выведет на экран 3, 2, 1
    mysqli_query($link,"
			DELETE FROM `news`
			WHERE `id` IN ".$ids."
		") or exit(mysqli_error());
}

if(isset($_GET['action']) && $_GET['action']=='delete'){
    mysqli_query($link,"
		DELETE FROM `news`
		WHERE `id` = ".(int)$_GET['id']."
	") or exit(mysqli_error());
    $_SESSION['info'] = 'Новости были удалены';
    header("Location: /index.php?module=news&page=main");
    exit();
}

$news = mysqli_query($link, "
SELECT *
FROM `news`
ORDER BY `id` DESC
");

//делаем проверку сессии
if(isset($_SESSION['info'])) {
    $info = $_SESSION['info']; //передаем содержимое сессии в переменную инфо
    unset($_SESSION['info']); //удаляем сессию за ненужностью.
}


