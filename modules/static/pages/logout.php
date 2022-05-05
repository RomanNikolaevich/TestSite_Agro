<?php
unset ($_SESSION['access']);
unset ($_SESSION['login']);
setcookie('access', 1, time() - 3600, '/');

// Редирект на главную страницу
header('Location: index.php', true, 303);//переход на главную
