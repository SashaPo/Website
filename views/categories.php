<?php include '../views/layout/header.php'; ?>

<?php
    $catName = $_GET["cat"] ?? NULL;
    $catName ? $products = db('SELECT * FROM products WHERE category = "'.$catName.'"') : $products = db("SELECT * FROM products");
    $categorie = array_unique(array_column($products, 'category'));
?>

    <div class="content">
        <div class="center-block">
            <div class="title">Categories</div>
            <h1 style="text-align: center"><? if (isset($catName)) { echo $catName; } else { echo "Categories"; }?></h1>
            <?php if (isset($catName)): ?>
                <?php foreach ($products as $product): ?>
                    <p>
                        <?php echo $product['title']; ?> - <strong><?php echo $product['price']; ?> $</strong>
                    <form action="cart.php" method="POST">
                        <input type="hidden" name="product" value='<?php echo json_encode($product); ?>' />
                        <button type="submit" name="submit_button" value="addcart">Add to cart</button>
                    </form>
                    </p>
                <?php endforeach; ?>
            <?php else: ?>
                <?php foreach ($categories as $category): ?>
                    <h2>
                        <?php echo $category; ?>
                    </h2>
                    <?php foreach ($products as $product): ?>
                        <?php if($product['category'] == $category): ?>
                            <p>
                                <?php echo $product['title']; ?> - <strong><?php echo $product['price']; ?> $</strong>
                            <form action="cart.php" method="POST">
                                <input type="hidden" name="product" value='<?php echo json_encode($product); ?>' />
                                <button type="submit" name="submit_button" value="addcart">Add to cart</button>
                            </form>
                            </p>

                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

<?php include '../views/layout/footer.php'; ?>