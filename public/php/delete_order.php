<?php
    session_start();
    if(isset($_POST['delete'])){
        $xml = new DomDocument();
        $xml->load('order_info.xml');
        
        $orderNum = $_POST['order_num'];
        
        $xpath = new DOMXPath($xml);
        
        foreach($xpath -> query("/order_list/order[order_num = '$orderNum']") as $node){
            $node->parentNode->removeChild($node);
            
        }
        $xml -> formatoutput = true;
        $xml -> save('order_info.xml');

        setcookie("order_user", $newUser, time() + 86400, "/");
        setcookie("order_order_num", $newOrderNum,time() + 86400, "/" );
        setcookie("order_orderList", $newOrderList,time() + 86400, "/");
            header("Location: ../../index.php");
        
        echo ("Your order has been successfully deleted!");
    
    }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>McJawz | Order List </title>
        <link rel="stylesheet" href="../../public/css/bootstrap.css">
        <link rel="stylesheet" href="../../public/css/backstore.css">
        <link rel="icon" href="../../images/favicon.ico" type="image/x-icon" />
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="../html/index.html">
            <img style="margin-right: 5px;" class="icon-logo" src="../../images/mcJawz_logo_no_txt.png" width="40" height="40" alt="">
            McJawz
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../html/index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/signup.html">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../html/login.html">Log in</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="page-name">
        <div>
           Order List
        </div>
    </div>



    <div class="flex-wrapper">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 align-self-center mx-auto mt-5  mb-5">
          <div class="card text-center">
                <div class="card-header bg-dark text-white">
                    <h1>Delete an order</h1>
                </div>
            </div>
        </div>
    </div>
            
    <form method = "POST" action = "delete_order.php">
        Order wished to be deleted </br>
        Order Number <input type = "text" name = "order_num"></br>
        <input type="submit" name = "delete" value = "Delete" class="btn btn-primary mt-3 mb-3">
        <button type="button"  class="btn btn-danger mt-3 mb-3">Reset</button>
    </form>
 


    <div class="footer">
        <div class="footer-item ml-3">
            <a href="admin.html"><p>Admin</p></a>
        </div>
        <div class="footer-item mr-3">
            <p class="font-italic"></p>
        </div>
    </div>
</body>
</html>