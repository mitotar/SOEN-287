<?php
session_start();


$product_code = $_GET["product_code"];
$products = simplexml_load_file("../../product_info_test.xml");
foreach ($products->fruits_vegetables_aisle->product as $product) {
    if ($product->code == $product_code) {
        $name = $product->name;
        $brand = $product->brand;
        $weight = $product->weight;
        $price = $product->price;
        $description = $product->description;
        $calorie = $product->calorie;
        $unit = $product->unit;
        $s_des = $product->s_des;
        break;
    }
}


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
    <title>McJawz | Fruit & Veg | <?= $name ?></title>
    <link rel="stylesheet" href="../../../public/css/bootstrap.css">
    <link rel="stylesheet" href="../../../public/css/allproducts.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="icon" href="../../../images/favicon.ico" type="image/x-icon" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <script src="../../../public/js/fruitsandveg-moredescription.js"></script>
    <script src="../../../public/js/fruitsandveg-aisle.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body onload="updateValue('amount-<?=$product_code?>')">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../../../public/html/index.html">
            <img style="margin-right: 5px;" class="icon-logo" src="../../../images/mcJawz_logo_no_txt.png" width="40"
                height="40" alt="">
            McJawz
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../../public/html/index.html">Home</a>
                </li>
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
                <h2>Fruits and Vegetables | <?=$name?></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 aisles">
                <a href="../../../public/html/aisles/bakery.html">Bakery</a>
                |
                <a href="../../../public/html/aisles/beverages-aisle.html">Beverages</a>
                |
                <a href="../../../public/html/aisles/dairyandeggs-aisle.html">Dairy & Eggs</a>
                |
                <a href="../../../public/php/fruitsandveg-aisle.php">Fruits & Vegetables</a>
                |
                <a href="../../../public/php/poultry-aisle.php">Meat, Poultry & Fish</a>
                |
                <a href="../../../public/php/snack_aisle.php">Snacks</a> 
            </div>

            <div class="col-lg-6 col-md-12 myCartContainer">
                <img class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                <a href="../../../public/html/cart.html">
                    <p>My Cart</p>
                </a>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="../../../images/<?=$product_code?>.jpg" class="card-img" alt="Apples">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title"><?=$name?></h2>
                    <p class="card-text"><?=$s_des?></p>
                    <p class="card-text"><small class="text-muted"><?=$calorie?></small></p>

                    <div class="row quantity">
                        <p class="pricing">$<?=$price?>/<?=$unit?></p>
                        <p class="pricing" style="font-size: medium;" id="totalPrice">Sub-total: $<?=$price?></p>
                        <div class="col-lg-12 incDecButton">
                            <span class="input-group-btn">
                                <button onclick="decrement('amount-<?=$product_code?>'); getTotal('amount-<?=$product_code?>')" type="button" class="quantity-left-minus btn btn-danger btn-number"
                                    data-type="minus" data-field="">
                                    -
                                </button>
                            </span>
                            <input id="amount-<?=$product_code?>" size=3 value=1>
                            <span class="input-group-btn">
                                <button onclick="increment('amount-<?=$product_code?>'); getTotal('amount-<?=$product_code?>')" type="button" class="quantity-right-plus btn btn-success btn-number"
                                    data-type="plus" data-field="">
                                    +
                                </button>
                            </span>
                            <button type="button" class="btn btn-info">
                                <img style="margin-right: 10px;" class="shoppingcarticon" src="../../../images/shoppingcarticon.png" alt="">
                                Add to cart
                            </button>
                        </div>
                    </div>

                </div>

                <div class="accordian">
                    <input type="checkbox" id="title1" />
                    <label onclick="displayText()" for="title1">More Description</label>

                    <p id="description-text" style="display:none;"><?=$description?></p>
                    
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php include('footer.php'); ?>


</body>

</html>