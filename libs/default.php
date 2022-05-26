<?php
//Функция вывода на экран:
function wtf($variable, $stop = false) {
	echo '<pre>'.print_r($variable, 1).'</pre>';
	if($stop) {
		exit();
	}
}
//
function q($quary) {
    global $link;
    $return = mysqli_query($link, $quary);
    if($res === false) {
        //$info = debug_backtrace();
        //wtf($info);//распечатка ошибки на экран
        echo 'Запрос: .$query.'<br>'.mysqli_error($link)';//дебаг(перехват ошибки)
        //отправляем на почту письмо об ошибке (учить будем это в последующих уроках)
        //записываем ошибку в логи:
        //file_put_contents('./logs/mysql.log', strip_tags($query)."\n\n", FILE_APPEND);
        exit(); //остановим код
    } else {
        return $res; // запрос составлен верно, то вернем на страницу $result
    }
}
// пример применения: $res = q("SELECT * FROM `users` ORDER BY `id`");
