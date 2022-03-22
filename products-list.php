<?php
require('app/Customer.php');
require('app/Product.php');
require('app/FileUtility.php');

$products_data = FileUtility::openCSV('products.csv');

$products = Product::convertArrayToProducts($products_data);

$customer = new Customer('John Doe', 'john@mail.com');
?>
<html>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<head>
<div class="container-fluid">
    <img class="navbar-brand" src="https://toppng.com/uploads/preview/shopping-cart-png-image-shopping-cart-icon-sv-11562865326ta92uix1ak.png" height="54" width="40" padding="2px,10px" class="d-inline-block align-text-top">
    <title>My Cart</title>
</div>
</head>
<body style="background: url(https://img1.wallspic.com/previews/1/7/1/7/5/157171/157171-entertainment-art-arm-wheel-shopping_cart-x350.jpg) no-repeat; background-size: 100% 100%;">
<h1 class="text-center">Welcome <?php echo $customer->getName() ?>!</h1>
<h2 class="text-center">Products</h2>
<h4>
    <a href="shopping-cart.php">Shopping Cart</a>
</h4>

<?php foreach ($products as $product): ?>

<form action="add-to-cart.php" method="POST" class="text-center">
    <input type="hidden" name="product_id" value="<?php echo $product->getId(); ?>" />
    <h3><?php echo $product->getName(); ?></h3>
    <img src="<?php echo $product->getImage(); ?>" height="100px" />
    <p>
        <?php echo $product->getDescription(); ?><br/>
        <span style="color: blue">PHP <?php echo $product->getPrice(); ?></span>
        Qty <input type="number" name="quantity" class="quantity" value="0" />
        <button type="submit">
            ADD TO CART
        </button>
    </p>
</form>

<?php endforeach; ?>

</body>
</html>