<?php

include 'config.php';

if (empty($_GET['productid']) || !isset($_GET['productid'])) {
    header("location:index.php");
} else {
    $productid = $_GET['productid'];

    $query = "SELECT * FROM products where id = {$productid}";

    $result = mysqli_query($conn, $query);

    $productdata = mysqli_fetch_assoc($result);
}







include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['productname'];
    $product_price = $_POST['productprice'];
    $product_image = $_POST['productimage'];
    $product_quantity = $_POST['product_quantity'];


   

    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity , image) VALUES('$user_id', '$product_name', '$product_price', $product_quantity, '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla - Bootstrap eCommerce Template</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   

</head>

<style>
    .logo{
        position: absolute;
        padding: 10px;
        margin-top: 10px;
    }
    






    .logo {
        left: 70px;
        top: 8px;
        font-size: 20px;
        font-weight: bolder;
    }

    .logo .reg {
        font-size: 14px;
        vertical-align: super;
    }


  
    .btn-product {
        border:none !important;
        color: #363A5D !important;
        padding-top: 1.1rem !important;
        background-color: #D3D9DD !important;
        text-decoration: none;
        padding-bottom: 1.1rem !important; 
    }

   
    .btn-product:hover {
        background-color: #363a5d !important;
        color: #D3D9DD !important;
    }


    /* The sidebar menu */
    .sidebar {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        left: 0;
        color: #363A5D;
        background-color: #d3d9dd;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidebar */
    }

    /* The sidebar links */
    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #363a5d;
        display: block;
        transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        color: black;
    }

    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    /* The button used to open the sidebar */
    .openbtn {
        font-size: 20px;
        cursor: pointer;
        /* background-color: #111; */
        /* color: white; */
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        color: white;
        background-color: #111;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* If you want a transition effect */
        padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }

    @media (min-width: 768px) {

        .prd {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
            width: 100%;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: center;
        }
    }


    .delete-btn {
        font-size: 20px;
        padding: 5px 40px;

        color: white;
        border: 1px solid white;

        text-decoration: none;
        text-align: center;
        border-radius: 20px;
    }

    .delete-btn:hover {
        border: none;
        background-color: red;
        color: white;
        text-decoration: none;
        text-decoration: none;

    }

    .user-box {
        position: absolute;
        top: 10%;
        right: 2rem;
        color: white;
        background-color: #363A5D;
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
        border: var(--border);
        padding: 2rem;
        text-align: center;
        width: 30rem;
        display: none;
        animation: fadeIn .2s linear;
    }

    .user-box.active {
        display: inline-block;
    }

 
    a:hover {
        color: #363a5d;
    }

    .product-title a:hover {
        color: #363a5d;
        font-weight: 500;
    }

    .banner .banner-link.btn {
        padding-left: 1rem;
        padding-right: 1rem;
        min-width: 140px;
        color: #363a6d;
        border: 0.2rem solid #363a5d;
    }

    .banner .banner-link.btn:hover {
        background-color: #D3D9DD;
        color: #363a5d;
        border: none
    }



    .banner-big .btn {
        padding-top: 1.15rem;
        padding-bottom: 1.15rem;
        min-width: 160px;
        text-transform: uppercase;
        border: none !important;
        color: white;
        background-color: #363A5D;
        letter-spacing: .1em;
    }

    .banner-big .btn:hover {
        color: #363a5d;
    }


    .btn-product {
        background-color: #363A5D;
        border: none;
        padding-top: 1.1rem;
        padding-bottom: 1.1rem;
    }

    .product.product-2 .btn-product:hover {
        background-color: #D3D9DD;
        color: #363A5D;
    }

    .logo,
    .menu,
    .categories,
    .search,
    .bag {
        position: absolute;
        padding: 10px;
        margin-top: 10px;
    }

    .product.product-2 .btn-product-icon {
    background-color: #363A5D;
    text-decoration: none;
    color: #fff;
}

.product.product-2 .btn-product-icon:hover{
    background-color: #363A5D;
}
    .logo {
        left: 70px;
        top: 8px;
        font-size: 20px;
        font-weight: bolder;
    }

    .logo .reg {
        font-size: 14px;
        vertical-align: super;
    }

    .menu {
        left: 150px;
        line-height: 1.2;
        font-size: 20px;
    }

    .search,
    .bag {
        background: #fff;
        color: #363A5D;
        border-radius: 50%;
        height: 20px;
        width: 20px;
        text-align: center;
        /* border: 2px solid black; */
    }

    .search {
        top: 8px;
        right: 100px;
    }

    .bag {
        right: 40px;
        top: 8px;
    }
    .btn-expandable span {
    background-color: #363a5d;
}


    .categories {
        left: 50%;
        top: 30%;
        transform: translate(-50%, -50%);
        border: 2px solid #fff;
        border-radius: 50px;
        background: #fff;
        color: #363A5D;
        font-weight: 500;
    }

    .categories ul {
        list-style: none;
    }

    .categories ul li {
        display: inline-block;
        padding: 5px 20px;
    }

    .media {
        position: absolute;
        left: -100px;
        top: 50%;
        transform: rotate(-90deg);
    }

    .media ul {
        list-style: none;
    }

    .media ul li {
        display: inline-block;
        font-weight: 500;
    }

    .media ul li:not(:last-child) {
        padding-right: 60px;
    }

    .size {
        position: absolute;
        left: 150px;
        bottom: 20px;
    }

    .size ul {
        list-style: none;
    }

    .size ul li {
        display: inline-block;
        font-weight: 500;
        border: 1px solid #fff;
        padding: 5px;
        border-radius: 50%;
        margin-left: 10px;
        height: 20px;
        width: 20px;
        text-align: center;
        line-height: 1.5;
        transition: .3s ease-in-out;
        cursor: pointer;
    }

    .size ul li:hover {
        background: #fff;
        color: #363A5D;
    }

    .size span {
        font-weight: 500;
    }

    .size span::after {
        display: inline-block;
        content: "";
        border: .5px solid #fff;
        opacity: .5;
        width: 50px;
        margin: 0 0 0 10px;
        transform: translateY(-4px);
    }

    .product-img {
        width: 500px;
        max-width: 100%;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -40%);
        animation: fly 4s ease-in-out infinite;
    }

    @keyframes fly {
        0% {
            transform: translate(-50%, -46%);
        }

        50% {
            transform: translate(-50%, -54%);
        }

        100% {
            transform: translate(-50%, -46%);
        }
    }

    .product-text1 {
        position: absolute;
        top: 75%;
        z-index: 5;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .product-title1 {
        font-size: 100px;
        color: black;
    }

    .product-title1::after {
        content: ".";
        color: #363A5D;
    }

    .product-subtitle1 {
        font-size: 25px;
        font-weight: 500;
    }

    .dots {
        position: absolute;
        top: 43%;
        right: -25px;
        transform: rotate(90deg);
    }



    .dot {
        display: inline-block;
        height: 7px;
        width: 7px;
        background: transparent;
        border: 2px solid #363A5D;
        border-radius: 50%;
        margin: 0 18px;
    }
 
    .dot:first-child {
        background: #363A5D;
        margin-left: 0;
    }

    .bottomnav {
        position: absolute;
        bottom: 0;
        right: 0;
    }

    .bottomnav-img {
        background: url('levi-shirt.jpg') no-repeat;
        background-position: top;
        background-size: cover;
        width: 250px;
        height: 150px;
    }

    .bottomnav ul {
        list-style: none;
    }

    .bottomnav ul li {
        display: inline-block;
        padding: 10px 15px;
        margin: 20px 20px 20px 0;
        background: #363A5D;
        color: #fff;
        transition: .3s ease-in-out;
        cursor: pointer;
    }

    .bottomnav ul li:hover {
        background: #fff;
        color: #363A5D;
    }


    /* The sidebar menu */
    .sidebar {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        left: 0;
        color: #363A5D;
        background-color: #d3d9dd;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidebar */
    }

    /* The sidebar links */
    .sidebar a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #363a5d;
        display: block;
        transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidebar a:hover {
        color: black;
    }

    /* Position and style the close button (top right corner) */
    .sidebar .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    /* The button used to open the sidebar */
    .openbtn {
        font-size: 20px;
        cursor: pointer;
        /* background-color: #111; */
        /* color: white; */
        padding: 10px 15px;
        border: none;
    }

    .openbtn:hover {
        color: white;
        background-color: #111;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* If you want a transition effect */
        padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar {
            padding-top: 15px;
        }

        .sidebar a {
            font-size: 18px;
        }
    }

    @media (min-width: 768px) {

        .prd {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
            width: 100%;
            flex-wrap: wrap;
            gap: 40px;
            justify-content: center;
        }
    }


    @media (max-width: 985px) {
.icon{
    left:82% !important;

}
}





@media (max-width: 826px) {
.icon{
    left:80% !important;

}
}

@media (max-width: 741px) {
.icon{
    left:78% !important;

}
}

@media (max-width: 650px) {
.icon{
    left:74% !important;

}
}
@media (max-width: 551px) {
.icon{
    left:70% !important;

}
}


@media (max-width: 767px) {
.pe{
margin-left:268px;
}
}
@media (max-width: 640px) {
.pe{
margin-left:170px;
}
}





.pe{
    width: 235px;

}

    .delete-btn {
        font-size: 20px;
        padding: 5px 40px;

        color: white;
        border: 1px solid white;

        text-decoration: none;
        text-align: center;
        border-radius: 20px;
    }

    .delete-btn:hover {
        border: none;
        background-color: red;
        color: white;
        text-decoration: none;
        text-decoration: none;

    }

    .user-box {
        position: absolute;
        top: 60%;
        right: 2rem;
        color: white;
        background-color: #363A5D;
        border-radius: .5rem;
        box-shadow: var(--box-shadow);
        border: var(--border);
        padding: 2rem;
        text-align: center;
        width: 30rem;
        display: none;
        animation: fadeIn .2s linear;
    }

    .user-box.active {
        display: inline-block;
    }

    .header {
        background-color: transparent
    }

    .header-2 {
        background-color: transparent
    }

    .nw:hover{
        background-color:#363a5d !important;
        border:none !important;
        color:#d3d9dd;
    }

    .nav1 {
    position: fixed;
    width: 100%;
    height: 100px;
}
</style>

<body>



<div style="z-index: 5;" class="nav1">
            <div style="color: #d3d9dd; background-color:#363a5d; margin-top:17px; padding:5px 30px;" class="logo shadow ">E-shop<span class="reg">&reg;</span></div>

            <!-- <div class="menu"><i class="fa fa-bars"></i></div> -->
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div style="color: #d3d9dd; background-color:#363a5d;  margin-left:-40px !important ;  margin-top:5px; padding:5px 30px;" class="logo shadow ">E-shop<span class="reg">&reg;</span></div>
                <a href="index.php">Home</a>
                <a href="shop.php">Shop</a>
                <a href="shopmen.php">Mens</a>
                <a href="shopwomen.php">Women</a>
                <a href="shopkid.php">Kids</a>
                <a href="order.php">Orders</a>

                <a href="about.php">About Us</a>
                <a href="contact.php">Contact</a>
            </div>
            <div id="main">
                <button class="openbtn" onclick="openNav()">&#9776;</button>
            </div>
            <!-- ico -->
            <div class="header">
                <div class="header-2">
                    <div style="display: flex; gap: 13px; position: absolute; left: 85%; top: 10px;" class="icon">
                           
                        <div class="login-icon">
                            <i style="font-size: 30px; color: #363A5D;margin-top: 3px;" id="user-btn" class="bi bi-person-circle"></i>
                        </div>

                        <?php
                        $select_cart_number = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                        $cart_rows_number = mysqli_num_rows($select_cart_number);
                        ?>
                        <a href="search.php">
                        <i style="font-size: 30px; color: #363A5D;margin-top: 0px;" id="user-btn" class="bi bi-search"></i>

                        </a>
                        
                        <div id="cart" class=" login-icon cart" data-totalitems="0">

                            <a href="cart.php">

                                <i style="font-size: 30px; color: #363A5D;" class="bi bi-basket"> <span style="position: absolute; font-size:20px; left:116px;">(<?php echo $cart_rows_number; ?>)</span> </i>

                            </a>

                        </div>

                    </div>
                    <div class="user-box">
                        <p style="color:white;">username : <span><?php echo $_SESSION['user_name']; ?></span></p>
                        <p style="color:white;">email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                        <a href="logout.php" class="delete-btn">logout</a>
                    </div>
                </div>

            </div>



        </div>



<br>
<br>
<br>


    <div class="page-wrapper">

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="product.php">Products</a></li>
                    </ol>


                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img src="uploaded_img/<?php echo $productdata['image']; ?>" alt="">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title"><?php echo $productdata['name']  ?></h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->


                                    <div class="product-price">
                                        $<?php echo $productdata['price']  ?>
                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p><?php echo $productdata['discription'] ?></p>
                                    </div><!-- End .product-content -->
                                    <input type="hidden" min="1" name="product_quantity" value="1" class="qty">


                                    <!-- End .details-filter-row -->
                                    <form action="product.php?productid=<?php echo $productid ?>" method="post">
                                        <input type="hidden" value="<?php echo $productdata['name']; ?>" name="productname">
                                        <input type="hidden" value="<?php echo $productdata['image']; ?>" name="productimage">
                                        <input type="hidden" value="<?php echo $productdata['price']; ?>" name="productprice">
                                        <input type="hidden" min="1" name="product_quantity" value="1" class="qty">

                                     
                                        <div class="product-details-action">
                                            <input type="submit" value="add to cart" name="add_to_cart" class="btn-product btn-cart">
                                            <!-- End .details-action-wrapper -->
                                        </div>
                                        
                                        <div class="product-details-action">
                                            <a href="contact.php" input type="submit"  class="btn-product btn-cart">Message us</a>
                                           
                                            <!-- End .details-action-wrapper -->
                                        </div>


                                    </form>
                                    <!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <a href="#"><?php echo $productdata['categroy']; ?></a>
                                           
                                        </div><!-- End .product-cat -->

                                        <div class="social-icons social-icons-color">
                        <span style="color:#d3d9dd;" class="social-label">Social Media</span>
                        <a href="https://www.facebook.com/" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="https://www.twitter.com/" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="https://www.instagram.com/" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        </div>
                     

                        <!-- End .soial-icons -->
                                </div><!-- End .product-details -->
                               <h4>Subscription packages</h4> 
                              <u> Basic Package:</u> This package includes the product at its standard price.
                              
<br>
<u> Deluxe Package: </u>    This package includes the product at its standard price

 <br>
<u> Premium Package:</u> This package includes the product at a premium price,
 along with a lifetime warranty.
  <br>
<u> Starter Package:</u> This package includes the product at a discounted price.

  <br>
<u> Family Package:</u> This package includes multiple units of the product at
 a discounted price.


                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->

                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>
                         
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p><?php echo $productdata['discription']; ?> </p>
                                   

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                           
                          
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                            <div class="container">
   
    	<div class="mt-5" id="review_content"></div>
       
    </div>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` limit 4,4 ") or die('query failed');
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        ?>
                                <form class="pe" action="" method="post">
                                    <div class="product product-2 text-center shadow ">
                                        <figure class="product-media">
                                            <a href="product.php?productid=<?php echo $fetch_products['id'] ?>">
                                                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="Product image"   class="product-image">

                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                            </div><!-- End .product-action-vertical -->
                                            <div class="product-action ">
                                                <input type="submit" value="add to cart" name="add_to_cart" class="btn-product btn-cart">
                                                
                                            </div>
                                            <!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                            <a style="font-size: 17px" href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['categroy']; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a style="text-decoration: none ; font-size:20px;" href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['name']; ?></a></h3><!-- End .product-title -->

                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->

                                            <div style="text-decoration: none ; font-size:17px;" class="product-price">
                                                $<?php echo $fetch_products['price']; ?>/-
                                                <input type="hidden" min="1" name="product_quantity" value="1" class="qty">

                                                <input type="hidden" name="productname" value="<?php echo $fetch_products['name']; ?>">
                                                <input type="hidden" name="productprice" value="<?php echo $fetch_products['price']; ?>">
                                                <input type="hidden" name="productimage" value="<?php echo $fetch_products['image']; ?>">
                                            </div><!-- End .product-price -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                </form>
                        <?php
                            }
                        } else {
                            echo '<p class="empty">no products added yet!</p>';
                        }
                        ?>


                      

                   <!-- End .product -->
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <footer style="background-color:#363a5d;" class="footer footer-2">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="widget widget-about">
                            <div style="color: #d3d9dd; background-color:#363a5d; margin-top:-40px!important; margin-left:-75px!important; font-weight:bold; padding:5px 50px;" class="logo shadow ">E-shop<span class="reg">&reg;</span></div>
                            <br>
                            <p style="color:#d3d9dd;">It typically contains a copyright notice, link to a privacy policy, sitemap, logo, contact information, social media icons, and an email sign-up form. In short, a footer contains information that improves a website's overall usability</p>

                                <div class="widget-about-info">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-4">
                                            <span class="widget-about-title">Got Question? Call us 24/7</span>
                                            <a style="color:#d3d9dd;" href="tel:123456789">+92 3253483787</a>
                                        </div><!-- End .col-sm-6 -->
                                        <div class="col-sm-6 col-md-8">
                                            <span class="widget-about-title">Payment Method</span>
                                            <figure class="footer-payments">
                                                <img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
                                            </figure><!-- End .footer-payments -->
                                        </div><!-- End .col-sm-6 -->
                                    </div><!-- End .row -->
                                </div><!-- End .widget-about-info -->
                            </div><!-- End .widget about-widget -->
                        </div><!-- End .col-sm-12 col-lg-3 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 style="color:white;" class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a style="color:#d3d9dd;" href="#">Terms and conditions</a></li>
                                    <li><a style="color:#d3d9dd;" href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 style="color:white;" class="widget-title">My Account</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a style="color:#d3d9dd;" href="login.php">Sign In</a></li>
                                    <li><a style="color:#d3d9dd;" href="cart.php">View Cart</a></li>
                                    <li><a style="color:#d3d9dd;" href="aboutus.php">Help</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-64 col-lg-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .footer-middle -->

            <div class="footer-bottom">
                <div class="container">
                    <p style="color:#d3d9dd;" class="footer-copyright">Copyright © 2019 Molla Store. All Rights Reserved.</p><!-- End .footer-copyright -->
                    <ul class="footer-menu">
                        <li><a style="color:#d3d9dd;" href="#">Terms Of Use</a></li>
                        <li><a style="color:#d3d9dd;" href="#">Privacy Policy</a></li>
                    </ul><!-- End .footer-menu -->

                    <div class="social-icons social-icons-color">
                        <span style="color:#d3d9dd;" class="social-label">Social Media</span>
                        <a href="https://www.facebook.com/" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                        <a href="https://www.twitter.com/" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="https://www.instagram.com/" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                        <a href="https://www.youtube.com/" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                        
                    </div><!-- End .soial-icons -->
                </div><!-- End .container -->
            </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

  
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.elevateZoom.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->

</html>
<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<script>
    let userBox = document.querySelector('.header .header-2 .user-box');

    document.querySelector('#user-btn').onclick = () => {
        userBox.classList.toggle('active');
        navbar.classList.remove('active');
    }

    let navbar = document.querySelector('.header .header-2 .navbar');

    document.querySelector('#menu-btn').onclick = () => {
        navbar.classList.toggle('active');
        userBox.classList.remove('active');
    }

    window.onscroll = () => {
        userBox.classList.remove('active');
        navbar.classList.remove('active');

        if (window.scrollY > 60) {
            document.querySelector('.header .header-2').classList.add('active');
        } else {
            document.querySelector('.header .header-2').classList.remove('active');
        }
    }
</script>


<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
	      		<h4 class="text-center mt-2 mb-4">
	        		<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                    <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
	        	</h4>
	        	<div class="form-group">
	        		<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
	        	</div>
	        	<div class="form-group">
	        		<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
	        	<div class="form-group text-center mt-4">
	        		<button type="button" class="btn btn-primary" id="save_review">Submit</button>
	        	</div>
	      	</div>
    	</div>
  	</div>
</div>

<style>
.progress-label-left
{
    float: left;
    margin-right: 0.5em;
    line-height: 1em;
}
.progress-label-right
{
    float: right;
    margin-left: 0.3em;
    line-height: 1em;
}
.star-light
{
	color:#e9ecef;
}
</style>

<script>

$(document).ready(function(){

	var rating_data = 0;

    $('#add_review').click(function(){

        $('#review_modal').modal('show');

    });

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();

        var user_review = $('#user_review').val();

        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review},
                success:function(data)
                {
                    $('#review_modal').modal('hide');

                    load_rating_data();

                    alert(data);
                }
            })
        }

    });

    load_rating_data();

    function load_rating_data()
    {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data)
            {
                $('#average_rating').text(data.average_rating);
                $('#total_review').text(data.total_review);

                var count_star = 0;

                $('.main_star').each(function(){
                    count_star++;
                    if(Math.ceil(data.average_rating) >= count_star)
                    {
                        $(this).addClass('text-warning');
                        $(this).addClass('star-light');
                    }
                });

                $('#total_five_star_review').text(data.five_star_review);

                $('#total_four_star_review').text(data.four_star_review);

                $('#total_three_star_review').text(data.three_star_review);

                $('#total_two_star_review').text(data.two_star_review);

                $('#total_one_star_review').text(data.one_star_review);

                $('#five_star_progress').css('width', (data.five_star_review/data.total_review) * 100 + '%');

                $('#four_star_progress').css('width', (data.four_star_review/data.total_review) * 100 + '%');

                $('#three_star_progress').css('width', (data.three_star_review/data.total_review) * 100 + '%');

                $('#two_star_progress').css('width', (data.two_star_review/data.total_review) * 100 + '%');

                $('#one_star_progress').css('width', (data.one_star_review/data.total_review) * 100 + '%');

                if(data.review_data.length > 0)
                {
                    var html = '';

                    for(var count = 0; count < data.review_data.length; count++)
                    {
                        html += '<div class="row mb-3">';

                        html += '<div class="col-sm-1"><div class="rounded-circle bg-danger text-white pt-2 pb-2"><h3 class="text-center">'+data.review_data[count].user_name.charAt(0)+'</h3></div></div>';

                        html += '<div class="col-sm-11">';

                        html += '<div class="card">';

                        html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';

                        html += '<div class="card-body">';

                        for(var star = 1; star <= 5; star++)
                        {
                            var class_name = '';

                            if(data.review_data[count].rating >= star)
                            {
                                class_name = 'text-warning';
                            }
                            else
                            {
                                class_name = 'star-light';
                            }

                            html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                        }

                        html += '<br />';

                        html += data.review_data[count].user_review;

                        html += '</div>';

                        html += '<div class="card-footer text-right">On '+data.review_data[count].datetime+'</div>';

                        html += '</div>';

                        html += '</div>';

                        html += '</div>';
                    }

                    $('#review_content').html(html);
                }
            }
        })
    }

});

</script>