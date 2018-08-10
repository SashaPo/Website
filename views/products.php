<?php include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php"; ?>

<?php //if (isset($_POST['password']) && $_POST['password'] == '123456'): ?>

<?php
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'delete') {
            db("DELETE FROM `products` WHERE `id` = :id", [
                    'id' => $_POST['id'],
            ]);
        } else if ($_POST['action'] == 'save') {
            if (isset($_POST['id'])) {
                db("UPDATE `products` SET `title` = :title, `price` = :price, `category`= :category, `image`= :image WHERE `id` = :id", [
                    'id' => $_POST['id'],
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'category' => $_POST['category'],
                    'image' => $_POST['image'],
                ]);
            } else {
                db("INSERT INTO `products` (`title`, `price`, `category`, `image`) VALUES (:title, :price, :category, :image)", [
                    'title' => $_POST['title'],
                    'price' => $_POST['price'],
                    'category' => $_POST['category'],
                    'image' => $_POST['image'],
                ]);
            }
        }
    }
?>


<?php include 'administr.php'; ?>
    <div class="adminblock">
        <div class="title">Categories</div>
<?php
    $products = db("SELECT * FROM products");
    $categories = array_unique(array_column($products, 'category'));
?>
<?php foreach ($categories as $category): ?>
    <h2><?php echo $category; ?></h2>
    <?php foreach ($products as $product): ?>
        <?php if($product['category'] == $category): ?>
            <div class="content">
                <form class="adminform" action="products.php" method="POST">
                    <input type="hidden" name="password" value="123456" />
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>" />
                    <input type="text" name="title" value="<?php echo $product['title']; ?>"  />
                    <input type="text" name="price" value="<?php echo $product['price']; ?>" />
                    <input type="text" name="category" value="<?php echo $product['category']; ?>" />
                    <input type="text" name="image" value="<?php echo $product['image']; ?>" />
                    <button type="submit" name="action" value="save">Save Product</button>
                    <button type="submit" name="action" value="delete">Delete Product</button>
                </form>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>
        <hr />
        <form class="adminform" action="products.php" method="POST">
            <input type="hidden" name="password" value="123456" />
            <input type="text" name="title" value=""  />
            <input type="text" name="price" value="" />
            <input type="text" name="category" value="" />
            <input type="text" name="image" value="" />
            <button type="submit" name="action" value="save">Save Product</button>
        </form>
     </div>



<?php include 'admin_footer.php'; ?>

<?php //else: ?>
<!--    <form method="POST">-->
<!--        <input type="password" name="password" value="" />-->
<!--        <input type="submit" title="Enter password" />-->
<!--    </form>-->
<?php //endif; ?>
