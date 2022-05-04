<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

$page = $_GET['page'] ?? 'main';
$adminIp = '127.0.0.1';
$adminVisability = $_SERVER['REMOTE_ADDR'] === $adminIp;

if($_SERVER['REMOTE_ADDR'] !== $adminIp && $page === 'login') {
	$page = '404';
}

$path = 'pages/'.$page.'.php';

//проверка допустимых имен страниц
$allowed = ['index', 'main', 'contacts', 'aboutus', 'partners', 'products', 'services', 'regin', 'login', 'logout', 'admin'];
if(!in_array($page, $allowed)) {
	$page = '404';
} else {
	$modulePath = __DIR__ . '/modules/'.$page. '.php';
	if(file_exists($modulePath)) {
		include_once $modulePath;
	}
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Roma Agro test site</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/normalize.css" rel="stylesheet"/>
	<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div class="block">
	<?php include 'components/header.php'; ?>

	<?php include $path; ?>

	<div class="conteiner-content">
		<?php include 'components/footer.php'; ?>
	</div>
</div>
</body>
</html>
