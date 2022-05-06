<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');
session_start();

// Конфиг сайта
include_once './config.php';
include_once './libs/default.php';
include_once './variables.php';

// Роутер
include './skins/'.SKIN.'/index.tpl'; //шаблон

//include_once __DIR__ . '/vendor/autoload.php';
