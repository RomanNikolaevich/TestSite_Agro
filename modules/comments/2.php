<?php
$commentQuery = 'SELECT * FROM `comments` ORDER BY `date` DESC LIMIT 5 OFFSET 2'
or exit(mysqli_error());
// Отправляем SQL запрос
$commentResult = mysqli_query($link, $commentQuery);
