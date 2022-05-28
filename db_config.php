<?php
//БД
mysqli_report(MYSQLI_REPORT_OFF); // нужно писать перед mysqli_connect
//Начиная с PHP 8.1 работа немного изменилась, сейчас перехватить нельзя, сразу Fatal Error кидает без этой настройки.
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
mysqli_set_charset($link,'utf8');
