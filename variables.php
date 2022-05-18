<?php
$module = $_GET['module'] ?? 'static';
$page = $_GET['action'] ?? 'main';
$adminIp = '127.0.0.1';
$adminVisability = $_SERVER['REMOTE_ADDR'] === $adminIp;

if($_SERVER['REMOTE_ADDR'] !== $adminIp && $page === 'login') {
	$page = '404';
}

$modulePath = __DIR__.'/modules/'.$module.'/'.$page.'.php';
$pagePath = __DIR__.'/skins/'.SKIN.'/'.$module.'/'.$page.'.tpl';

if(!file_exists($modulePath)) {
	$modulePath = __DIR__.'/modules/errors/404.php';
	$pagePath = __DIR__.'/skins/'.SKIN.'/errors/404.tpl';
}

include_once $modulePath;
