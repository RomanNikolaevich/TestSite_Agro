<?php
//удаление новости:
if (isset($_POST['delete'])){
    foreach($_POST['ids'] as $k=>$v) {
        q("
		DELETE FROM `news`
		WHERE `id` = ".(int)$v."
	");
    }
}

if(isset($_GET['action']) && $_GET['action']=='delete'){
    q("
		DELETE FROM `news`
		WHERE `id` = ".(int)$_GET['id']."
	");
    $_SESSION['info'] = 'Новости были удалены';
    header("Location: /index.php?module=news&page=main");
    exit();
}

$news = q("
SELECT *
FROM `news`
ORDER BY `id` DESC
");

//делаем проверку сессии
if(isset($_SESSION['info'])) {
    $info = $_SESSION['info']; //передаем содержимое сессии в переменную инфо
    unset($_SESSION['info']); //удаляем сессию за ненужностью.
}
