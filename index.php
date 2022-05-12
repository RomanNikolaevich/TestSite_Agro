<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once __DIR__ . '/vendor/autoload.php';
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

// Роутер
$link = mysqli_connect("localhost", "root", "root", "agrodb");
mysqli_set_charset($link,'utf8');
include './skins/'.SKIN.'/index.tpl'; //шаблон
