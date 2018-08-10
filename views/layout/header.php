<?php
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php";
include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php";

$products = db('SELECT * FROM products');
$categories = array_unique(array_column($products, 'category'));
$products_number = isset($_SESSION['products']) ? count($_SESSION['products']) : 0;

$USERID = $_COOKIE["id"] ?? null;
if ($USERID) {
    $userdata = db("SELECT user_login FROM users WHERE user_id='".$USERID."' LIMIT 1");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Minishop</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../template/css/ft_minishop.css"/>
</head>
<body>
<div class="content">
    <span class="cart">Привет,
        <?php if((!empty($userdata[0]["user_login"]))) {
            echo $userdata[0]["user_login"];
        } else {
            echo "Гость";
        } ?>!
     Products in cart: <?php echo $products_number; ?> </span>
    <div class="basket form">
        <p class="menu_cart"><a href="cart.php" title="Cart"><img class="menu_cart" src="../template/images/cart.png"></a></p>
    </div>
    <form action="#" method="get" class="reg-action-buttons">
        <?php if (!empty($userdata[0]["user_login"])):?>
            <div class="login form">
                <p><a class="auth-button" href="login.php?logout=yes">Logout</a></p></div>
        <?php  else: ?>
            <div class="login form">
                <p><a class="auth-button" href="login.php">Login</a></p></div>
            <div class="register form">
                <p><a class="auth-button" href="login.php">Register</a></p></div>
        <?php endif; ?>
    </form>
    <div class="header-block">
        <div class="menu">
            <table>
                <tr class="nav">
                    <td><a href="index.php" title="Home"><span>Home</span></a></td>
                    <td><a href="categories.php" title="Categories">Categories</a>
                        <table class="table2">
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td class="submenu"><a href="categories.php?cat=<?php echo $category?>" title="<?php=$category?>"><?php echo $category?></a></td>
                                </tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                    <td><a href="about.php" title="About">About Us</a></td>
                    <td><a href="blog.php" title="Blog">Blog</a></td>
                    <td><a href="contacts.php" title="Contacts">Contacts</a></td>
                </tr>
            </table>
        </div>
    </div>
</div>