<?php
// Скрипт проверки
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php";

if (isset($_COOKIE['id']))
{
    $query = db("SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");

    if(($query[0]['user_id'] !== $_COOKIE['id']))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        print "Хм, что-то не получилось";
    }
    else
    {
        setcookie("login", $query[0]['user_login'], time() - 3600*24*30*12, "/");
        print "Привет, ".$query[0]['user_login'].". Всё работает!";

        // header("Location: /srcs/views/site/check.php"); exit();
        // redirect on success page
    }
}
else
{
    print "Включите куки";
}
?>