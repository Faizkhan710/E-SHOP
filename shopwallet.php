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
<html lang="en">


<!-- molla/category-list.html  22 Nov 2019 10:02:52 GMT -->

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
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<style>
    .row {
        margin-bottom: 20px;
    }

    .product.product-list .btn-product.btn-cart{
        color:#363A5D;
        border: none;
    }
    .product.product-list .btn-product.btn-cart:hover{
        background-color:#363A5D;
    }

    .left,
    .right {
        position: absolute;
        height: 100%;
        width: 50%;
    }
    .product.product-list .btn-product:before {
    margin-right: 0.5rem;
    color: #363a5d;



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

    .logo {
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

  

  


    /* The sidebar menu */
    .sidebar1 {
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
        background-color: #d3d9dd;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidebar */
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
    /* The sidebar links */
    .sidebar1 a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #363a5d;
        display: block;
        transition: 0.3s;
    }

    /* When you mouse over the navigation links, change their color */
    .sidebar1 a:hover {
        color: black;
    }

    /* Position and style the close button (top right corner) */
    .sidebar1 .closebtn {
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
    .product-price {
        color:#363A5D;
    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
    #main {
        transition: margin-left .5s;
        /* If you want a transition effect */
        padding: 20px;
    }

    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidebar1 {
            padding-top: 15px;
        }

        .sidebar1 a {
            font-size: 18px;
        }
    }





    @media (min-width: 768px) {

        .col-md-12 {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
            width: 100%;
            flex-wrap: wrap;
            gap: 10px;
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
    .cate{
        color:black !important;
        font-size:16px;
    }
    .cate:hover{

        font-weight:500;
        color:#363a5d !important;
    }
</style>

<body>


<div style="z-index: 5;" class="nav">
            <div style="color: #d3d9dd; background-color:#363a5d; margin-top:17px; padding:5px 30px;" class="logo shadow ">E-shop<span class="reg">&reg;</span></div>

            <!-- <div class="menu"><i class="fa fa-bars"></i></div> -->
            <div id="mySidebar" class="sidebar1">
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






























    <div class="page-wrapper">



        <main class="main">
            <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
                <div class="container">
                    <h1 class="page-title">List<span style="color:#363a5d;">Shop</span></h1>
                </div><!-- End .container -->
            </div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="shop.php">Shop</a></li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                           
                            <div class="products mb-3">
                                <div class="product product-list">
                                    <?php
                                    $select_products = mysqli_query($conn, "SELECT * FROM `products` where categroy = 'Wallet'") or die('query failed');
                                    if (mysqli_num_rows($select_products) > 0) {
                                        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                                    ?>
                                            <form action="" method="POST">
                                                <div class="row shadow">


                                                    <div class="col-6 col-lg-3">
                                                        <figure class="product-media">
                                                            <a href="product.php?productid=<?php echo $fetch_products['id'] ?>">
                                                                <img src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="Product image" class="product-image">
                                                            </a>
                                                        </figure><!-- End .product-media -->
                                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                                    <div class="col-6 col-lg-3 order-lg-last">
                                                        <div class="product-list-action">
                                                            <div class="product-price">
                                                                <span>$</span>
                                                                <?php  echo $fetch_products['price']; ?>
                                                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
                                                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
                                                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
                                                            </div><!-- End .product-price -->
                                                            <div class="ratings-container">
                                                                <div class="ratings">
                                                                    <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                                                </div><!-- End .ratings -->
                                                                <span class="ratings-text">( 2 Reviews )</span>
                                                            </div><!-- End .rating-container -->

                                                            

                                                            <button type="submit" name="add_to_cart" class="btn-product btn-cart"><span>add to cart</span></button>
                                                        </div><!-- End .product-list-action -->
                                                    </div><!-- End .col-sm-6 col-lg-3 -->

                                                    <div class="col-lg-6">
                                                        <div class="product-body product-action-inner">
                                                            <a href="#" class="btn-product btn-wishlist" title="Add to wishlist"><span>add to wishlist</span>
                                                        </a>
                                                            <div class="product-cat">
                                                                <a href=""><?php echo $fetch_products['categroy']; ?></a>
                                                            </div>
                                                          
                                                            <!-- End .product-cat -->
                                                            <h3 class="product-title"><a href="product.php?productid=<?php echo $fetch_products['id'] ?>"><?php echo $fetch_products['name']; ?></a></h3><!-- End .product-title -->
                                                            <input type="hidden" min="1" name="product_quantity" value="1" class="qty">

                                                            <div class="product-content">
                                                                <p><?php echo $fetch_products['discription']; ?></p>
                                                            </div><!-- End .product-content -->


                                                        </div><!-- End .product-body -->
                                                    </div><!-- End .col-lg-6 -->
                                                </div><!-- End .row -->
                                            </form>
                                    <?php
                                        }
                                    } else {
                                        echo '<p class="empty">no products added yet!</p>';
                                    }
                                    ?>

                                </div><!-- End .product -->

                            </div><!-- End .products -->

                           
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3 order-lg-first">
                            <div class="sidebar sidebar-shop">
                               
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            Category
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                        <a class="cate"  href="shopdress.php">Dress</a>
                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopshirt.php">Shirts</a>

                                                </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate "  href="shopbags.php">Bags</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopsandal.php">Sandals</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopshoes.php">Shoes</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopwatch.php">Watches</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->

                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a   class="cate"  href="shopCosmetics.php">Cosmetics</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopJewellery.php">Jewellery</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopdoll.php">Dolls</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                                
                                                <!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a style="color:#363a5d !important ; font-weight:600;" class="cate"  href="shopwallet.php">Wallets</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div>
                                               <!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->


                                <br>
                                
                                <div class="widget widget-collapsible">
                                    <h3 class="widget-title">
                                        <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                            For
                                        </a>
                                    </h3><!-- End .widget-title -->

                                    <div class="collapse show" id="widget-1">
                                        <div class="widget-body">
                                            <div class="filter-items filter-items-count">
                                                

                                              
                                               <!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopmen.php">Mens</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div><!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopwomen.php">Womens</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div>
                                                <!-- End .filter-item -->
                                                <div class="filter-item">
                                                    <div class="custom-control custom-checkbox">
                                                    <a class="cate"  href="shopkid.php">Kids</a>

                                                    </div><!-- End .custom-checkbox -->
                                                </div>
                                                <!-- End .filter-item -->
                                            </div><!-- End .filter-items -->
                                        </div><!-- End .widget-body -->
                                    </div><!-- End .collapse -->
                                </div><!-- End .widget -->




                            </div><!-- End .sidebar sidebar-shop -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
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
                            <ul class="nav nav-pills nav-fill" role="tablist">
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
                                                    <i class="icon-google"></i>
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
                                                    <i class="icon-google"></i>
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

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wNumb.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/category-list.html  22 Nov 2019 10:02:52 GMT -->

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