<?php
    session_start();
    if (isset($_GET['remove']))
    {

        unset($_SESSION['products'][$_GET['remove']]);
        header('location: ../views/cart.php');
    }
?>