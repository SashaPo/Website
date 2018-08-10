<?php
    session_start();
    if (isset($_POST['submit_button']) && $_POST['submit_button'] == "addcart")
{
    $_SESSION['products'][] = json_decode($_POST['product'], true);
    header('location: ../views/cart.php');
}
?>


<?php include '../views/layout/header.php'; ?>

    <div class="content">
        <div class="center-block">
            <div class="title">Shopping Cart</div>
                <?php foreach ($_SESSION['products'] as $index => $product): ?>
                    <p>
                        <?php echo $product['title']; ?> - <strong><?php echo $product['price']; ?> $</strong>
                        <a href="../views/manage_cart.php?remove=<?php echo $index; ?>">remove</a>
                    </p>
                <?php endforeach; ?>
        </div>
    </div>

<?php include '../views/layout/footer.php'; ?>