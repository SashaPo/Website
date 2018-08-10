<?php include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/config.php"; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/rush_00/db.php"; ?>

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
                        <form class="adminform" action="cart.php" method="POST">
                            <input type="text" name="name" value="<?php echo $product['id']; ?>" title="" />
                            <input type="text" name="name" value="<?php echo $product['title']; ?>" title="" />
                            <input type="text" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="hidden" name="product" value='<?php echo json_encode($product); ?>' title="" />
                            <button type="submit" name="add">Add Product</button>
                            <button type="submit" name="save">Save Product</button>
                            <button type="submit" name="dell">Delete Product</button>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>


<?php include 'admin_footer.php'; ?>