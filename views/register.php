<?php
// Страница регистрации нового пользователя
require_once $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php";
// Соединямся с БД
// $link = new mysqli("localhost", "root", "<V3RXO7=cksv", "unicorn");
?>

<?php
if(isset($_POST['submit']))
{
    $err = [];
    // проверям логин
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login']))
    {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    }

    if(strlen($_POST['login']) < 3 || strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    // проверяем, не сущестует ли пользователя с таким именем
    $query = db("SELECT user_id FROM users WHERE user_login='".$_POST['login']."'");
    
    if(count($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {

        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // mysqli_query($link,"INSERT INTO users SET user_login='login', user_password='password'");
        $result = db("INSERT INTO users (user_id, user_login, user_password, email) VALUES (NULL, '".$login."', '".$password."', '".$email."');");

        // header("Location: /srcs/views/site/login.php"); exit();
        print "<b>Регистрация прошла успешно</b><br>";

    }
    else
    {
        print "<b>При регистрации произошли следующие ошибки:</b><br>";
        foreach($err AS $error)
        {
            print $error."<br>";
        }
    }
}
?>