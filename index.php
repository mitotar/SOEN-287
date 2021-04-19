<?php //Starting the session
session_start();
//$firstName = $_SESSION['user_firstName'];
//$lastName = $_SESSION['user_lastName'];
//$email = $_SESSION['user_email'];
//$password = $_SESSION['user_password'];
//$address = $_SESSION['user_address'];
//$city = $_SESSION['user_city'];
//$stateOrProvince = $_SESSION['user_stateOrProvince'];
//$postalCode =  $_SESSION['user_postalCode'];
//if(count($_COOKIE) > 0) {
  //echo "Cookies are enabled.";
//} else {
//  echo "Cookies are disabled.";
//}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>McJawz | Home</title>
  <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="../../public/css/bootstrap.css">
  <link rel="stylesheet" href="../../public/css/index.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/73052f6f18.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


  <section id="title">
    <div class="container-fluid">
      <!-- Nav Bar -->
      <nav class="navbar navbar-expand-lg navbar-dark">

        <!-- Brand Name -->
        <a class="navbar-brand" href="../../public/html/index.html">
          McJawz
        </a>

        <!-- Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Nav Bar Contents -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="../../public/html/index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aisles">Aisles</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:none;";}?>">
              <a class="nav-link" href="../../public/html/signup.html">Sign Up</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:none;";} ?>">
              <a class="nav-link" href="../../public/html/login.html">Log in</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:block;";} else{echo "display:none;";}?>">
              <a class="nav-link" href="public/php/edit_user.php">Welcome, <?php echo $_COOKIE["user_firstName"]; ?>!</a>
            </li>
            <li class="nav-item" style="<?php if(isset($_COOKIE['user_firstName'])){echo "display:block;";} else{echo "display:none;";}?>">
              <a class="nav-link" href="public/php/logout.php">Log Out</a>
            </li>
          </ul>


        </div>


      </nav>



      <!-- Title -->
      <div class="row">
        <div class="col-lg-6">
          <h2 style="font-size:4rem;">Top of the food chain!</h2>
          <a href="#aisles" class="btn btn-outline-light btn-lg download-button">Shop Now</a>


          <a href="../../public/html/cart.html" class="btn btn-dark btn-lg download-button">
            <img style="max-width: 20px;" class="shoppingcarticon" src="../../images/shoppingcarticon.png" alt="">
            <div class="addTocartButtonText">
              My Cart
            </div>
          </a>

          <div class="col-lg-6">
            <img class="title-image" src="../../images/mcJawz_logo_no_txt.png" alt="logo">
          </div>

        </div>
      </div>
    </div>
  </section>


  <section id="features">

    <div class="container-fluid">

      <div class="row">

        <div class="feature-box col-lg-4 col-md-12">

          <i class="fa fa-check-circle feature-img" aria-hidden="true"></i>
          <h3 class="feature-heading">Easy to browse.</h3>
          <p class="feature-desc">McJawz is your one stop shop for all your groceries.</p>

        </div>

        <div class="feature-box col-lg-4 col-md-12">

          <i class="fa fa-bullseye feature-img" aria-hidden="true"></i>
          <h3 class="feature-heading">Wide Variety.</h3>
          <p class="feature-desc">From Snacks to Poultry, We've got it all.</p>

        </div>

        <div class="feature-box col-lg-4 col-md-12">

          <i class="fas fa-shopping-basket feature-img"></i>
          <h3 class="feature-heading">Fresh Products.</h3>
          <p class="feature-desc">Finest products, from the Finest Suppliers.</p>

        </div>
      </div>
    </div>

  </section>

  <div class="card-deck">

    <h1 style="text-align: center; color: white; width: 100%; font-size: 6rem">AISLES</h1>

    <a id="aisles"></a>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <a href="../../public/html/aisles/fruitsandveg-aisle.html">
          <div class="card">
            <img class="card-img-top" src="../../images/fruitsandveggy.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Fruits & Vegetables</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="../../public/html/php/snack_aisle.php">
          <div class="card">
            <img class="card-img-top" src="../../images/snacks.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Snacks</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="../../public/html/aisles/dairyandeggs-aisle.html">
          <div class="card">
            <img class="card-img-top" src="../../images/dAIRY.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Dairy & Eggs</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="public/php/poultry-aisle.php">
          <div class="card">
            <img class="card-img-top" src="../../images/meat.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Meat, Poultry & Fish</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="../../public/html/aisles/beverages-aisle.html">
          <div class="card">
            <img class="card-img-top" src="../../images/beverages.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Beverages</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 col-md-6">
        <a href="../../public/html/aisles/bakery.html">
          <div class="card">
            <img class="card-img-top" src="../../images/bakery.jpg" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title" style="text-align: center; font-size: x-large;">Bakery</h5>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>


  <div class="footer" style="margin-top: 5%;">
    <div class="footer-text">
      <a href="../../public/php/admin.php" style="color: white;">Admin</a>
    </div>
  </div>


</body>

</html>
