<?php
//мои настройки
$page = $_GET['page'] ?? 'main';
$adminIp = '127.0.0.1';
$adminVisability = $_SERVER['REMOTE_ADDR'] === $adminIp;

if($_SERVER['REMOTE_ADDR'] !== $adminIp && $page === 'login') {
	$page = '404';
}

$path = 'skins/default/static/pages/'.$page.'.tpl';

//проверка допустимых имен страниц
$allowed = ['index', 'main', 'contacts', 'aboutus', 'partners', 'products', 'services', 'regin', 'login', 'logout', 'admin'];
if(!in_array($page, $allowed)) {
	header("Location: /index.php?module=errors&page=404");
	exit();
} else {
	$modulePath = __DIR__ . '/modules/static/pages/'.$page. '.php';
	if(file_exists($modulePath)) {
		include_once $modulePath;
	}
}

//настройки Стаса
if(!isset($_GET['module'])) {
	$_GET['module'] = 'static';
}

if(!isset($_GET['page'])) {
	$_GET['page'] = 'main';
}
