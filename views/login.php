<?php session_start(); ?>
<?php

// for logout button
// setcookie('id', null, -1, '/');
// setcookie('hash', null, -1, '/');
// var_dump($_COOKIE);
$logut_action = $_GET["logout"] ?? "no";

if ($logut_action === "yes") {
    setcookie('id', "", -1, '/');
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Minishop</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../template/css/login_register.css"/>
</head>
<body>
<body>
<div class="content">
    <span class="cart">Products in cart:</span>
    <div class="basket form">
        <p class="menu_cart"><a href="cart.php" title="Cart"><img class="menu_cart" src="../template/images/cart.png"></a></p>
    </div>
    <div class="header-block">
        <div class="menu">
            <table>
                <tr class="nav">
                    <td><a href="index.php" title="Home"><span>Home</span></a></td>
                    <td><a href="categories.php" title="Categories">Categories</a></td>
                    <td><a href="about.php" title="About">About Us</a></td>
                    <td><a href="blog.php" title="Blog">Blog</a></td>
                    <td><a href="contacts.php" title="Contacts">Contacts</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="content">
    <div class="content">
        <div class="login-block">
            <div class="login">Log in</div>
            <form action="login_c.php" method="POST">
                <input type="text" class="data" name="login" placeholder=" Login">
                <input type="password" class="data2" name="password" placeholder=" Password">
                <input type="submit" name="submit" class="log" value="Log in">
            </form>
            <div><img src = "http://www.stickpng.com/assets/images/587e32329686194a55adab75.png" class="pusheen"</a></div>
        </div>
        <div class="register-block">
            <div class="register">Registration</div>
            <form action="register.php" method="POST">
                <input type="text" class="data" name="login" placeholder=" Create Login">
                <input type="password" class="data2" name="password" placeholder=" Create Password">
                <input type="email" class="data3" name="email" placeholder=" Your email">
                <input type="submit" name="submit" class="reg" value="Register">
            </form>
        </div>
    </div>
</body>
</html>