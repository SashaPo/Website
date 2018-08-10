<?php
// Страница авторизации
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php";
// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = db("SELECT user_id, user_password FROM users WHERE user_login = :user_login LIMIT 1", ['user_login' => $_POST['login']]);
    echo "<pre>" . print_r($_POST, true) . "</pre>";
    echo "<pre>" . print_r($query, true) . "</pre>";
    //die();
    // Сравниваем пароли
    if($query[0]['user_password'] === $_POST['password'])
    {

        // Ставим куки
        setcookie("id", $query[0]['user_id'], time()+60*60*24*30, '/');
        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: ../views/check.php"); exit();

    }
    else
    {
        print "Вы ввели неправильный логин/пароль";
    }
}
?>