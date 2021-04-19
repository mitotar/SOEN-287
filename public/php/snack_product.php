<?php
session_start();

$product_code = $_GET["product_code"];
$products = simplexml_load_file("../../product_info.xml");
foreach ($products->snack_aisle->product as $product) {
    if ($product->code == $product_code) {
        $name = $product->name;
        $brand = $product->brand;
        $weight = $product->weight;
        $price = $product->price;
        $description = $product->description;
        break;
    }
}

$product_code = $_GET["product_code"];
if (isset($_POST["product-qty-" . $product_code])) {
    $_SESSION["product-qty-cart-" . $product_code] = $_POST["product-qty-" . $product_code];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>McJawz | Snacks | <?= $name ?></title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/michael_snacks.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>

<body onload="updateQuantities(); updateProductInfo()">
    <script type="text/javascript" src="../../public/js/michael.js"></script>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../../../public/html/index.html">
            <img style="margin-right: 5px;" class="icon-logo" src="../../../images/mcJawz_logo_no_txt.png" width="40" height="40" alt="">
            McJawz
        </a>

        <div class="navbar-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../../public/html/signup.html">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../../public/html/login.html">Log in</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Subheader -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 title">
                <h2 id="product-page-name-<?= $product_code ?>"><?= $name ?></h2>
            </div>
        </div>

        <div class="row subheader">
            <div class="col-lg-8 aisles text-dark">
                <a href="../../../public/php/bakery-aisle.php">Bakery</a>
                |
                <a href="../../../public/html/aisles/beverages-aisle.html">Beverages</a>
                |
                <a href="../../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
                |
                <a href="../../../public/html/aisles/fruitsandveg-aisle.html">Fruits & Vegetables</a>
                |
                <a href="../../../public/php/poultry-aisle.php">Meat, Poultry & Fish</a>
                |
                <a href="../../../public/php/snack_aisle.php">Snacks</a>
            </div>

            <div class="col-lg-4 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>

    <!-- Product Info -->
    <div class="product-info card text-center my-5">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="../../../images/product_<?= $product_code ?>.jpg" class="card-img" alt="Bars">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title" id="product-name-<?= $product_code ?>"><?= $name ?></h2>
                    <p class="card-text text-muted" id="product-brand-<?= $product_code ?>"><?= $brand ?></p>
                    <p class="card-text text-muted" id="product-weight-<?= $product_code ?>"><small><?= $weight ?></small></p>

                    <p class="more-description text-muted" id="product-description-<?= $product_code ?>"><?= $description ?></p>

                    <button class="btn btn-more-descr mt-3" onclick="moreDescription()">More Description</button>

                    <form action="./snack_product.php?product_code=<?= $product_code ?>" method="post">
                        <div class="row quantity mt-5">
                            <div class="pricing m-auto">
                                <p class="base-price d-inline" id="product-price-<?= $product_code ?>">$<?= $price ?></p>
                                <p class="d-inline ml-3" id="product-subtotal-<?= $product_code ?>">(Subtotal: $<?= $price ?>)</p>
                            </div>

                            <div class="col-lg-12 incDecButton d-flex flex-row justify-content-around">
                                <div class="d-flex-inline">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-minus btn btn-danger btn-number" onclick="minus(<?= $product_code ?>); updateProductSubtotal(<?= $product_code ?>)" data-type="minus" data-field="">
                                            -
                                        </button>
                                    </span>

                                    <input class="quantity-input mx-1" name="product-qty-<?= $product_code ?>" id="product-qty-<?= $product_code ?>" size="3" type="text" value="1">

                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-plus btn btn-success btn-number" onclick="plus(<?= $product_code ?>); updateProductSubtotal(<?= $product_code ?>)" data-type="plus" data-field="">
                                            +
                                        </button>
                                    </span>
                                    <button type="submit" class="btn btn-info ml-3">
                                        <img style="margin-right: 10px;" class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                                        Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-text">
            <a href="../../../public/html/admin.html">Admin</a>
        </div>
    </div>




</body>

</html>