<?php

include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];


    $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($check_cart_numbers) > 0) {
        $message[] = 'already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, quantity , image) VALUES('$user_id', '$product_name', '$product_price',  '$product_quantity', '$product_image')") or die('query failed');
        $message[] = 'product added to cart!';
    }
}
?>

<!DOCTYPE html>
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
<link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
<!-- Main CSS File -->
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/skins/skin-demo-8.css">
<link rel="stylesheet" href="assets/css/demos/demo-8.css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>
<link rel="stylesheet" href="style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


<!-- molla/index-8.html  22 Nov 2019 09:56:59 GMT -->

<head>

</head>
<style>

    
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




    .left,
    .right {
        position: absolute;
        height: 100%;
        width: 50%;
    }

    .banner-big .btn {
        padding-top: 1.15rem;
        padding-bottom: 1.15rem;
        min-width: 160px;
        text-transform: uppercase;
        border: .2rem solid #fff;
        color: white;
        letter-spacing: .1em
    }

    .left {
        background: #363A5D;
    }

    .right {
        left: 50%;
        background: #D3D9DD;
    }

    .left-strip {
        position: absolute;
        width: 1px;
        height: 100vh;
        background: #fff;
        left: 120px;
        opacity: .5;
    }

    .right-strip {
        position: absolute;
        width: 1px;
        height: 100vh;
        background: #fff;
        right: 120px;
        opacity: .5;
    }

    .nav {
        position: fixed;
        width: 100%;
        height: 100px;
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
    .icon-box-card .icon-box-icon {
    font-size: 3rem;
    color: #363a5d;
}
.icon-box:hover{
    background-color:#363a5d;
    border:none;
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
        background-color: #363A5D !important;
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
</style>


<body>

    <div class="wrapper">
        <div class="left"></div>
        <div class="right"></div>


        <div style="z-index: 5;" class="nav">
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










        <img class="product-img" src="3d-balloons-present-box-removebg-preview.png" alt="" width="100%">

        <div class="product-text1">
            <h1 style="color: white;font-size: 55px;
    letter-spacing: 7px;
    opacity: 5;
    z-index: 5;
    transform: matrix(1, 0, 0, 1, 0, 0);
    font-weight: 700;" class="product-title1">E-Shop</h1>
            <p style="color: black;opacity: 5;
    letter-spacing: 6px;" class="product-subtitle1">Do You Need Anything Else?</p>
        </div>

        <div class="dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>

    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>


    <div class="page-wrapper">


        <main class="main">



            <div class="pt-2 pb-2">
                <div class="container brands">
                    <div class="banner-group">
                        <div class="row">
                            <div class="col-sm-6 col-lg-4">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/demos/demo-8/banners/banner-1.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 style="color:#363a5d;" class="banner-subtitle"><a href="#">Final reduction</a></h4><!-- End .banner-subtitle -->
                                        <h3 style="color:#363a5d;" class="banner-title"><a href="#"><strong>Sandals & <br>Flip Flops</strong> <br>up to 60% off</a></h3><!-- End .banner-title -->
                                        <a href="shop.php" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-lg-4 -->

                            <div class="col-sm-6 col-lg-4">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/demos/demo-8/banners/banner-2.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 style="color:#363a5d;" class="banner-subtitle"><a href="#">Limited time only.</a></h4><!-- End .banner-subtitle -->
                                        <h3 style="color:#363a5d;" class="banner-title"><a href="#"><strong>Trainers & <br>Sportwear</strong> <br>40 -70% off</a></h3><!-- End .banner-title -->
                                        <a href="shop.php" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-lg-4 -->

                            <div class="col-sm-6 col-lg-4 d-none d-lg-block">
                                <div class="banner banner-overlay">
                                    <a href="#">
                                        <img src="assets/images/demos/demo-8/banners/banner-3.jpg" alt="Banner">
                                    </a>

                                    <div class="banner-content">
                                        <h4 style="color:#363a5d;" class="banner-subtitle"><a href="#">This week we love...</a></h4><!-- End .banner-subtitle -->
                                        <h3 style="color:#363a5d;" class="banner-title"><a href="#"><strong>Women's <br>  Accessories </strong> <br>from $6.99</a></h3><!-- End .banner-title -->
                                        <a href="shop.php" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                                    </div><!-- End .banner-content -->
                                </div><!-- End .banner -->
                            </div><!-- End .col-lg-4 -->
                        </div><!-- End .row -->
                    </div><!-- End .banner-group -->

                    <div class="owl-carousel mt-3 mb-3 owl-simple" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": false,
                            "margin": 30,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":2
                                },
                                "420": {
                                    "items":3
                                },
                                "600": {
                                    "items":4
                                },
                                "900": {
                                    "items":5
                                },
                                "1024": {
                                    "items":6
                                }
                            }
                        }'>
                        <a href="#" class="brand">
                            <img src="assets/images/brands/1.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/2.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/3.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/4.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/5.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/6.png" alt="Brand Name">
                        </a>

                        <a href="#" class="brand">
                            <img src="assets/images/brands/7.png" alt="Brand Name">
                        </a>
                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .bg-lighter -->

            <div class="mb-3"></div><!-- End .mb-6 -->
            <div class="container">
                <div class="tab-content tab-content-carousel">
                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                        $select_products = mysqli_query($conn, "SELECT * FROM `products`  LIMIT 5") or die('query failed');
                        if (mysqli_num_rows($select_products) > 0) {
                            while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                        ?>
                                <form action="" method="post">
                                    <div class="product product-2 text-center shadow ">
                                        <figure class="product-media">
                                            <a href="product.php?productid=<?php echo $fetch_products['id'] ?>">
                                                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="Product image" class="product-image">

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
                                                <a style="font-size: 17px" href=""><?php echo $fetch_products['categroy']; ?></a>
                                            </div><!-- End .product-cat -->


                                            <h3 class="product-title"><a style="text-decoration: none ; font-size:20px;" href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['name']; ?></a></h3><!-- End .product-title -->

                                            <input type="hidden" min="1" name="product_quantity" value="1" class="qty">


                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->

                                            <div style="text-decoration: none ; font-size:17px;" class="product-price">$<?php echo $fetch_products['price']; ?>/-

                                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
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







                    </div><!-- End .owl-carousel -->

                </div><!-- End .tab-content -->
            </div><!-- End .container -->

            <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner banner-overlay">
                        <a href="#">
                            <img src="assets/images/demos/demo-14/banners/banner-7.jpg" alt="Banner img desc">
                        </a>

                        <div class="banner-content">
                            <h4 style="color:#363a5d;" class="banner-subtitle text-white d-none d-sm-block"><a style="color:#d3d9dd;z-index:5;"href="#">Spring Sale is Coming</a></h4><!-- End .banner-subtitle -->
                            <h3  class="banner-title text-white"><a style="color:#d3d9dd;" href="#">Floral T-shirts and Vests  <br><span>Spring Sale</span></a></h3><!-- End .banner-title -->
                            <a  style="color:#d3d9dd; border:2px solid #d3d9dd;" href="shop.php" class="btn nw underline btn-outline-white-3 banner-link">Shop Now</a>

                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-md-6 -->
            </div>
            </div><!-- End .mb-3 -->
           
        
            <div class="container-fluid new-arrivals">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-7/banners/banner-3.jpg" alt="Banner">
                            </a>

                         <div class="banner-content banner-content-right">
                                <h4 style="color:#363a5d;" class="banner-subtitle"><a href="#">Flip Flop</a></h4><!-- End .banner-subtitle -->
                                <h3 style="color:#363a5d;" class="banner-title"><a href="#">Summer<br>sale -70% off</a></h3><!-- End .banner-title -->
                                <a href="shop.php" class="btn underline btn-outline-white-3 banner-link">Shop Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-7/banners/banner-4.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 style="color:#363a5d;" class="banner-subtitle"><a href="#">Accessories</a></h4><!-- End .banner-subtitle -->
                                <h3 style="color:#363a5d;" class="banner-title"><a href="#">Winter sale<br>up to 50% off</a></h3><!-- End .banner-title -->
                                <a href="shop.php" class="btn underline banner-link">Shop Now</a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->


            <div class="mb-5"></div><!-- End .mb-5 -->


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 prd">
                        <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` limit 5,8 ") or die('query failed');
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
                                            <a style="font-size: 17px" href=""><?php echo $fetch_products['categroy']; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a style="text-decoration: none ; font-size:20px;" href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['name']; ?></a></h3><!-- End .product-title -->
                                        
                                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->

                                            <div style="text-decoration: none ; font-size:17px;" class="product-price">
                                                $<?php echo $fetch_products['price']; ?>/-

                                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
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

                    </div>
                </div>
            </div>


<br>
<br>
<br>


<div class="container-fluid new-arrivals">
                <div class="row">
                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-8/banners/banner-5.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4  class="banner-subtitle d-none d-lg-block"><a style="color:#363a5d;" href="#">New Arrivals</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title"><a style="color:#363a5d;" href="#">Women’s</a></h3><!-- End .banner-title -->
                                <a href="shop.php" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="banner banner-overlay">
                            <a href="#">
                                <img src="assets/images/demos/demo-8/banners/banner-6.jpg" alt="Banner">
                            </a>

                            <div class="banner-content">
                                <h4 class="banner-subtitle d-none d-lg-block"><a style="color:#363a5d;" href="#">New Arrivals</a></h4><!-- End .banner-subtitle -->
                                <h3 class="banner-title "><a style="color:#363a5d;" href="#">Men’s</a></h3><!-- End .banner-title -->
                                <a href="shop.php" class="btn btn-outline-white banner-link">Shop Now <i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .banner-content -->
                        </div><!-- End .banner -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            

      <div class="mb-7"></div><!-- End .mb-5 -->
      <div class="container">
                <div class="row">
                    <div class="col-md-12 prd">
                        <?php
                        $select_products = mysqli_query($conn, "SELECT * FROM `products` limit 17,4 ") or die('query failed');
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
                                            <a style="font-size: 17px" href=""><?php echo $fetch_products['categroy']; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a style="text-decoration: none ; font-size:20px;" href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['name']; ?></a></h3><!-- End .product-title -->

                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                            </div><!-- End .rating-container -->

                                            <div style="text-decoration: none ; font-size:17px;" class="product-price">
                                                $<?php echo $fetch_products['price']; ?>/-

                                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
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

                    </div>
                </div>
            </div>

      <div class="mb-7"></div><!-- End .mb-5 -->

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-rocket"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Payment & Delivery</h3><!-- End .icon-box-title -->
                                <p>Free shipping for orders over $50</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->

                    

                    <div class="col-lg-4 col-sm-6">
                        <div class="icon-box icon-box-card text-center">
                            <span class="icon-box-icon">
                                <i class="icon-life-ring"></i>
                            </span>
                            <div class="icon-box-content">
                                <h3 class="icon-box-title">Quality Support</h3><!-- End .icon-box-title -->
                                <p>Alway online feedback 24/7</p>
                            </div><!-- End .icon-box-content -->
                        </div><!-- End .icon-box -->
                    </div><!-- End .col-lg-4 col-sm-6 -->
                </div><!-- End .row -->
            </div><!-- End .container -->

            <div class="container instagram">
                <div class="heading text-center">
                    <h2 class="title title-lg">Follow Us On Instagram</h2><!-- End .title -->
                    <p class="title-desc">Wanna share your style with us?</p><!-- End .title-desc -->
                </div><!-- End .heading -->
            </div><!-- End .container -->

            <div class="owl-carousel owl-simple" data-toggle="owl" data-owl-options='{
                    "nav": false, 
                    "dots": false,
                    "items": 6,
                    "margin": 0,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "360": {
                            "items":2
                        },
                        "600": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":5
                        },
                        "1500": {
                            "items":6
                        }
                    }
                }'>
                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/1.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>466</a>
                        <a href="#"><i class="icon-comments"></i>65</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->

                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/2.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>39</a>
                        <a href="#"><i class="icon-comments"></i>78</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->

                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/3.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>691</a>
                        <a href="#"><i class="icon-comments"></i>87</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->

                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/4.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>508</a>
                        <a href="#"><i class="icon-comments"></i>124</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->

                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/5.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>433</a>
                        <a href="#"><i class="icon-comments"></i>27</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->

                <div class="instagram-feed">
                    <img src="assets/images/demos/demo-8/instagram/6.jpg" alt="img">

                    <div class="instagram-feed-content">
                        <a href="#"><i class="icon-heart-o"></i>122</a>
                        <a href="#"><i class="icon-comments"></i>55</a>
                    </div><!-- End .instagram-feed-content -->
                </div><!-- End .instagram-feed -->
            </div><!-- End .owl-carousel -->
        </main><!-- End .main -->

        <footer style="background-color:#363a5d;" class="footer footer-2">
            <div class="footer-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-6">
                            <div class="widget widget-about">
                            <div style="color: #d3d9dd; background-color:#363a5d; margin-top:-60px!important; margin-left:-75px!important; font-weight:bold; padding:5px 50px;" class="logo shadow ">E-shop<span class="reg">&reg;</span></div>
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
                                <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                                <ul class="widget-list">
                                    <li><a style="color:#d3d9dd;" href="#">Terms and conditions</a></li>
                                    <li><a style="color:#d3d9dd;" href="#">Privacy Policy</a></li>
                                </ul><!-- End .widget-list -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-sm-4 col-lg-3 -->

                        <div class="col-sm-4 col-lg-2">
                            <div class="widget">
                                <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

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

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="index.html">Home</a>

                        <ul>
                            <li><a href="index-1.html">01 - furniture store</a></li>
                            <li><a href="index-2.html">02 - furniture store</a></li>
                            <li><a href="index-3.html">03 - electronic store</a></li>
                            <li><a href="index-4.html">04 - electronic store</a></li>
                            <li><a href="index-5.html">05 - fashion store</a></li>
                            <li><a href="index-6.html">06 - fashion store</a></li>
                            <li><a href="index-7.html">07 - fashion store</a></li>
                            <li><a href="index-8.html">08 - fashion store</a></li>
                            <li><a href="index-9.html">09 - fashion store</a></li>
                            <li><a href="index-10.html">10 - shoes store</a></li>
                            <li><a href="index-11.html">11 - furniture simple store</a></li>
                            <li><a href="index-12.html">12 - fashion simple store</a></li>
                            <li><a href="index-13.html">13 - market</a></li>
                            <li><a href="index-14.html">14 - market fullwidth</a></li>
                            <li><a href="index-15.html">15 - lookbook 1</a></li>
                            <li><a href="index-16.html">16 - lookbook 2</a></li>
                            <li><a href="index-17.html">17 - fashion store</a></li>
                            <li><a href="index-18.html">18 - fashion store (with sidebar)</a></li>
                            <li><a href="index-19.html">19 - games store</a></li>
                            <li><a href="index-20.html">20 - book store</a></li>
                            <li><a href="index-21.html">21 - sport store</a></li>
                            <li><a href="index-22.html">22 - tools store</a></li>
                            <li><a href="index-23.html">23 - fashion left navigation store</a></li>
                            <li><a href="index-24.html">24 - extreme sport store</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="category.html">Shop</a>
                        <ul>
                            <li><a href="category-list.html">Shop List</a></li>
                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                            <li><a href="category-boxed.html"><span>Shop Boxed No Sidebar<span class="tip tip-hot">Hot</span></span></a></li>
                            <li><a href="category-fullwidth.html">Shop Fullwidth No Sidebar</a></li>
                            <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                            <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="#">Lookbook</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Product</a>
                        <ul>
                            <li><a href="product.html">Default</a></li>
                            <li><a href="product-centered.html">Centered</a></li>
                            <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                            <li><a href="product-gallery.html">Gallery</a></li>
                            <li><a href="product-sticky.html">Sticky Info</a></li>
                            <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                            <li><a href="product-fullwidth.html">Full Width</a></li>
                            <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li>
                                <a href="about.html">About</a>

                                <ul>
                                    <li><a href="about.html">About 01</a></li>
                                    <li><a href="about-2.html">About 02</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>

                                <ul>
                                    <li><a href="contact.html">Contact 01</a></li>
                                    <li><a href="contact-2.html">Contact 02</a></li>
                                </ul>
                            </li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="#">Grid</a>
                                <ul>
                                    <li><a href="blog-grid-2cols.html">Grid 2 columns</a></li>
                                    <li><a href="blog-grid-3cols.html">Grid 3 columns</a></li>
                                    <li><a href="blog-grid-4cols.html">Grid 4 columns</a></li>
                                    <li><a href="blog-grid-sidebar.html">Grid sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Masonry</a>
                                <ul>
                                    <li><a href="blog-masonry-2cols.html">Masonry 2 columns</a></li>
                                    <li><a href="blog-masonry-3cols.html">Masonry 3 columns</a></li>
                                    <li><a href="blog-masonry-4cols.html">Masonry 4 columns</a></li>
                                    <li><a href="blog-masonry-sidebar.html">Masonry sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Mask</a>
                                <ul>
                                    <li><a href="blog-mask-grid.html">Blog mask grid</a></li>
                                    <li><a href="blog-mask-masonry.html">Blog mask masonry</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Single Post</a>
                                <ul>
                                    <li><a href="single.html">Default with sidebar</a></li>
                                    <li><a href="single-fullwidth.html">Fullwidth no sidebar</a></li>
                                    <li><a href="single-fullwidth-sidebar.html">Fullwidth with sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="elements-list.html">Elements</a>
                        <ul>
                            <li><a href="elements-products.html">Products</a></li>
                            <li><a href="elements-typography.html">Typography</a></li>
                            <li><a href="elements-titles.html">Titles</a></li>
                            <li><a href="elements-banners.html">Banners</a></li>
                            <li><a href="elements-product-category.html">Product Category</a></li>
                            <li><a href="elements-video-banners.html">Video Banners</a></li>
                            <li><a href="elements-buttons.html">Buttons</a></li>
                            <li><a href="elements-accordions.html">Accordions</a></li>
                            <li><a href="elements-tabs.html">Tabs</a></li>
                            <li><a href="elements-testimonials.html">Testimonials</a></li>
                            <li><a href="elements-blog-posts.html">Blog Posts</a></li>
                            <li><a href="elements-portfolio.html">Portfolio</a></li>
                            <li><a href="elements-cta.html">Call to Action</a></li>
                            <li><a href="elements-icon-boxes.html">Icon Boxes</a></li>
                        </ul>
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->

            <div class="social-icons">
                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google-plus-g"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google-plus-g"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
    <!-- 
    <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row no-gutters bg-white newsletter-popup-content">
                    <div class="col-xl-3-5col col-lg-7 banner-content-wrap">
                        <div class="banner-content text-center">
                            <img src="assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">
                            <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>
                            <p>Subscribe to the Molla eCommerce newsletter to receive timely updates from your favorite products.</p>
                            <form action="#">
                                <div class="input-group input-group-round">
                                    <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit"><span>go</span></button>
                                    </div>
                                </div>
                            </form>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="register-policy-2" required>
                                <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2-5col col-lg-5 ">
                        <img src="assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-8.js"></script>
</body>


<!-- molla/index-8.html  22 Nov 2019 09:57:25 GMT -->

</html>

<script type="text/javascript">
    TweenMax.from(".left", 1.1, {
        delay: 0.6,
        width: 0,
        ease: Expo.easeInOut
    })

    TweenMax.from(".right", 1.1, {
        delay: 0.6,
        width: 0,
        ease: Expo.easeInOut
    })

    TweenMax.from(".logo", 1.1, {
        delay: 1,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    })

    TweenMax.from(".menu", 1, {
        delay: 1.2,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".categories", 1, {
        delay: 1.4,
        opacity: 0,
        x: -150,
        ease: Expo.easeInOut
    });

    TweenMax.from(".search", .8, {
        delay: 1.6,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".bag", 1, {
        delay: 1.6,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.staggerFrom(".media ul li", 1, {
        delay: 2,
        opacity: 0,
        x: -20,
        ease: Power3.easeInOut
    }, 0.08);

    TweenMax.from(".size", 1, {
        delay: 1.8,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.staggerFrom(".size ul li", .3, {
        delay: 2,
        opacity: 0,
        y: 20,
        ease: Power3.easeInOut
    }, 0.08);

    TweenMax.staggerFrom(".dot", 1, {
        delay: 2.4,
        opacity: 0,
        x: 20,
        ease: Power3.easeInOut
    }, 0.08);

    TweenMax.from(".bottomnav", 1, {
        delay: 2.4,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".bottomnav ul li:first-child", .5, {
        delay: 2.4,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".bottomnav ul li:last-child", .6, {
        delay: 2.4,
        opacity: 0,
        x: -20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".product-img", 1.1, {
        delay: 2,
        opacity: 0,
        y: 20,
        ease: Expo.easeInOut
    });

    TweenMax.from(".product-title1", 1, {
        delay: 2.2,
        opacity: 0,
        y: 50,
        ease: Expo.easeInOut
    });

    TweenMax.from(".product-subtitle1", 1, {
        delay: 2.4,
        opacity: 0,
        y: 50,
        ease: Expo.easeInOut
    });
</script>
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