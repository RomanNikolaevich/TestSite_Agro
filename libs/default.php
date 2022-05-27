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
    $result = mysqli_query($link, $quary);
    if($result === false) {
        //$info = debug_backtrace();
        //wtf($info);//распечатка ошибки на экран
        echo "Запрос: ".$quary.'<br>'.mysqli_error($link);//дебаг(перехват ошибки)
        //отправляем на почту письмо об ошибке (учить будем это в последующих уроках)
        //записываем ошибку в логи:
        //file_put_contents('./logs/mysql.log', strip_tags($query)."\n\n", FILE_APPEND);
        exit(); //остановим код
    } else {
        return $result; // запрос составлен верно, то вернем на страницу $result
    }
}
// пример применения: $res = q("SELECT * FROM `users` ORDER BY `id`");

//Удаляет пробелы (или другие символы) из начала и конца строки
function trim_array($elem) {
    if(!is_array($elem)) { //если это не массив
        $elem = trim($elem); //то мы его обработаем тримом
    } else {
        $elem = array_map('trimAll', $elem); // делаем замыкание функции смой себя и каждый раз залазит глубже в массив
    }
    return $elem; //массив не будем трогать
}

//Приводим к числу
function int_array($elem) {
    if(!is_array($elem)) {
        $elem = (int)$elem; //приводим к типу int
    } else {
        $elem = array_map('int_array', $elem);
        // делаем замыкание функции самой себя и каждый раз залазит глубже в массив
    }
    return $elem; //массив не будем трогать
}

//Приводим к float
function float_array($elem) {
    if(!is_array($elem)) {
        $elem = (float)$elem; //приводим к типу float
    } else {
        $elem = array_map('float_array', $elem);
    }
    return $elem; //массив не будем трогать
}

//Экранирует специальные символы в строке для использования в SQL-выражении,
// используя текущий набор символов соединения
function mres($elem) {
    global $link;
    if(!is_array($elem)) {
        $elem = mysqli_real_escape_string ($link, $elem);
    } else {
        $elem = array_map('mres', $elem);
    }
    return $elem;
}

//Преобразует специальные символы в HTML-сущности
function hsc($elem) {
    if(!is_array($elem)) {
        $elem = htmlspecialchars ($elem);
    } else {
        $elem = array_map('hsc', $elem);
    }
    return $elem;
}