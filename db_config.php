<?php
//БД
$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASS, DB_NAME);
mysqli_set_charset($link,'utf8');