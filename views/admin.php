<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
    <title>Minishop</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../rush_00/template/css/admin.css"/>
</head>
<body>
<div class="content">
    <div class="header-block">
        <div class="title">Admin Panel</div>
        <div class="title">
        <form method="POST">
            <input type="password" name="password" value="" />
            <input type="submit" title="Enter password" />
        </form>
        </div>
        <?php if (isset($_POST['password']) && $_POST['password'] == '123456'): ?>
            <?php header('Location: ../views/products.php'); ?>
        <?php endif; ?>
        <?php if (isset($_POST['password']) && $_POST['password'] != '123456'): ?>
            <form method="POST">
                <input type="password" name="password" value="" />
                <input type="submit" title="Enter password" />
            </form>
        <?php endif; ?>
    </div>
</div>
</div>
</body></html>