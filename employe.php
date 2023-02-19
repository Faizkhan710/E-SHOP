
<?php

include 'config.php';

session_start();

$user_id = $_SESSION['emp_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

if (isset($_POST['add_product'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $discription = $_POST['discription'];
    $productId = $_POST['productId'];
    $productcode = $_POST['productcode'];
    $categroy = $_POST['categroy'];
    $for = $_POST['`for`'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;

    $select_product_name = mysqli_query($conn, "SELECT name FROM `products` WHERE name = '$name'") or die('query failed');

    if (mysqli_num_rows($select_product_name) > 0) {
        $message[] = 'product name already added';
    } else {
        $add_product_query = mysqli_query($conn, "INSERT INTO `products`(name, price, image, productId, productcode, discription,categroy,`for`) VALUES('$name', '$price', '$image', '$productId', '$productcode', '$discription', '$categroy','$for')") or die('query failed');
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `products` WHERE id = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    unlink('uploaded_img/' . $fetch_delete_image['image']);
    mysqli_query($conn, "DELETE FROM `products` WHERE id = '$delete_id'") or die('query failed');
    header('location:admin_products.php');
}

if (isset($_POST['update_product'])) {

    $update_p_id = $_POST['update_p_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];
    $update_dis = $_POST['update_dis'];
    $update_cat = $_POST['update_cat'];
    $update_for = $_POST['update_for'];

    mysqli_query($conn, "UPDATE `products` SET name = '$update_name', price = '$update_price' , discription = '$update_dis' , categroy = '$update_cat', `for` = '$update_for' WHERE id = '$update_p_id'") or die('query failed');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_img/' . $update_image;
    $update_old_image = $_POST['update_old_image'];

    if (!empty($update_image)) {
        if ($update_image_size > 2000000) {
            $message[] = 'image file size is too large';
        } else {
            mysqli_query($conn, "UPDATE `products` SET image = '$update_image' WHERE id = '$update_p_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploaded_img/' . $update_old_image);
        }
    }

    header('location:admin_products.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Employe </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">

    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>


<style>
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: white;
    }

    th {
        font-size: 15px;
    }

    td {
        font-size: 15px;
    }

    .a {
        margin-left: 40px;
        width: 70% !important;

    }

    .option-btn {
        font-size: 15px;
        padding: 5px 20px;
        border: none;
        color: white;
        background-color: #6a6c70;
        text-align: center;
        border-radius: 20px;
        font-weight: bolder;



    }

    .bt {
        margin-left: 55px;
        margin-top: 9px;
    }
    @media (max-width: 1091px) {
.table{
margin-left:-50px;
}
}
@media (max-width: 1010px) {
.table{
margin-left:-10px !important;
}
}
@media (max-width: 991px) {
.table{
margin-left:-90px !important;
}
}

@media (max-width: 880px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -10px !important;}
}


@media (max-width: 776px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -30px !important;}
}

@media (max-width: 767px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -80px !important;}
    th{
    font-size: 10px !important;
}
td{
    font-size: 10px !important;
}
.option-btn{
font-size: 8px;
}

.delete-btn{
font-size: 8px;
}
}

@media (max-width: 692px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -40px !important;}
    th{
    font-size: 8px !important;
}
td{
    font-size: 8px !important;
}
.option-btn{
font-size: 7px;
}

.delete-btn{
font-size: 7px;
}
}




@media (max-width: 649px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -40px !important;}
    th{
    font-size: 7px !important;
}
td{
    font-size: 7px !important;
}
.option-btn{
font-size: 6px;
}

.delete-btn{
font-size: 6px;
}
}






@media (max-width: 588px) {
.table{
display: flex;
    flex-direction: column;
    margin-left: -20px !important;}
    th{
    font-size: 6px !important;
}
td{
    font-size: 6px !important;
}
.option-btn{
font-size: 5px;
}

.delete-btn{
font-size: 5px;
}
}







@media (max-width: 1027px) {
.table{
margin-left:-40px;
}
th{
    font-size: 12px;
}
td{
    font-size: 12px;
}
.option-btn{
font-size: 8px;
}

.delete-btn{
font-size: 8px;
}
}

    hr {
    margin-top: 4px;
    border-top: 1px solid rgba(0, 0, 0, 0.1);
}

    .edit-product-form form .box {
        padding: 0rem 1rem !important;
        border-radius: 0.5rem !important;
        background-color: var(--light-bg);
        font-size: 16px !important;
        color: var(--black);
        border: none;
        width: 100%;
    }

    h4,
    .h4 {
        font-size: 15px !important;
    }

    .delete-btn {
        font-size: 15px;
        padding: 5px 20px;
        background-color: #6a6c70;
        border: none;
        color: white;
        text-align: center;
        border-radius: 20px;
    }

    .delete-btn:hover {
        background-color: red;
        color: white;
        text-decoration: none;

    }

    .option-btn:hover {
        background-color: green;
        color: white;
        text-decoration: none;

    }

    p {
        color: black;

    }

    span {
        color: #6a6c70;
        font-weight: 500 !important;
    }

    select {
        border-radius: .5rem;
        margin: .5rem 0;
        width: 100%;
        font-weight: 400;
        border: 1px solid #6a6c70;
        padding: 1.2rem 1.4rem;
        font-size: 19px;
        color: black !important;
    }

    .add-products form .box {
        width: 100%;
        background-color: var(--light-bg);
        border-radius: .5rem;
        margin: 1rem 0;
        padding: 1.2rem 1.4rem;
        color: var(--black);
        font-size: 1.8rem;
        border: var(--border);
    }

    form {
        background-color: var(--white);
        border-radius: .5rem;
        padding: 2rem;
        text-align: center;
        box-shadow: var(--box-shadow);
        border: var(--border);
        max-width: 50rem;
        margin: 0 auto;
    }

    .show-products .box-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, 30rem);
        justify-content: center;
        gap: 1.5rem;
        max-width: 1200px;

        margin: 0 auto;
        align-items: flex-start;
    }

    .btn1 {
        position: absolute;
        top: 58%;
        left: 40%
    }
</style>

<body>

    <header class="header">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid d-flex align-items-center justify-content-between">
                <div class="navbar-header">
                    <!-- Navbar Header--><a href="index.html" class="navbar-brand">
                        <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Employe</strong></div>
                        <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div>
                    </a>
                    <!-- Sidebar Toggle Btn-->
                    <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
                </div>

                <div class="list-inline-item logout"> <a id="logout" href="logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>

        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <div class="avatar"><img src="img/avatar-6.jpg" alt="..." class="img-fluid rounded-circle"></div>
                <div class="title">
                    <h1 class="h5"><span><?php echo $_SESSION['emp_name']; ?></span></h1>
                    <p style=" color: #8a8d93;"> <span><?php echo $_SESSION['emp_email']; ?></span></p>
                </div>
            </div>
            <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
            <ul class="list-unstyled">
                <li class="active"><a href="employe.php"> <i class="icon-padnote"></i>Products </a></li>
                <li><a href="forms.php"> <i class="icon-padnote"></i>form </a></li>
            </ul>
        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            <!-- Page Header-->
            <div class="page-header no-margin-bottom">
                <div class="container-fluid">
                    <center>
                        <h2 style="font-size: 27px; letter-spacing: 3px; " class="h5 no-margin-bottom">Products</h2>
                    </center>
                </div>
            </div>
            <!-- Breadcrumb-->
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Products </li>
                </ul>
            </div>
        




            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table   table-hover">
                            <thead>
                                <tr class="success">
                                    
                                    <th> productCode</th>
                                    <th>Name</th>
                                    <th>description</th>

                                    <th> Categrory </th>
                                    <th> For </th>
                                    <th> Price</th>
                                    
                                </tr>
                            </thead>

                            <?php
                            $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                            if (mysqli_num_rows($select_products) > 0) {
                                while ($fetch_products = mysqli_fetch_assoc($select_products)) {
                            ?>
                                    <tbody>
                                        <tr>
                                            
                                            <td>
                                                <div class="name"><?php echo $fetch_products['productcode']; ?></div>
                                            </td>

                                            <td>
                                                <div class="name"><?php echo $fetch_products['name']; ?></div>
                                            </td>


                                            <td>
                                                <div class="name"><?php echo $fetch_products['discription']; ?></div>
                                            </td>
                                            <td>
                                                <div class="name"><?php echo $fetch_products['categroy']; ?></div>
                                            </td>

                                            <td>
                                                <div class="name"><?php echo $fetch_products['for']; ?></div>
                                            </td>

                                            <td>
                                                <div class="name"><?php echo $fetch_products['price']; ?></div>
                                            </td>

                                          
                                        </tr>



                                    </tbody>
                            <?php
                                }
                            } else {
                                echo '<p class="empty">no products added yet!</p>';
                            }
                            ?>
                        </table>
                    </div>

                </div>

            </div>
        </div>




        <section class="edit-product-form">

            <?php
            if (isset($_GET['update'])) {
                $update_id = $_GET['update'];
                $update_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = '$update_id'") or die('query failed');
                if (mysqli_num_rows($update_query) > 0) {
                    while ($fetch_update = mysqli_fetch_assoc($update_query)) {
            ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">

                            <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
                            <input type="file" class="box a " name="update_image" accept="image/jpg, image/jpeg, image/png">
                            <h4 style="color: #6a6c70 ; margin-left: -350px; margin-top: 10px;">Name</h4>
                            <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
                            <hr>
                            <h4 style="color: #6a6c70 ; margin-left: -350px; margin-top: 10px;">Discription</h4>
                            <input type="text" name="update_dis" value="<?php echo $fetch_update['discription']; ?>" class="box" required placeholder="enter product name">
                            <hr>
                            <h4 style="color: #6a6c70 ; margin-left: -350px; margin-top: 10px;">Categroy</h4>
                            <input type="text" name="update_cat" value="<?php echo $fetch_update['categroy']; ?>" class="box" required placeholder="enter product name">
                            <hr>
                            <h4 style="color: #6a6c70 ; margin-left: -350px; margin-top: 10px;">For</h4>
                            <input type="text" name="update_for" value="<?php echo $fetch_update['for']; ?>" class="box" required placeholder="enter product name">
                            <hr>
                            <h4 style="color: #6a6c70 ; margin-left: -350px; margin-top: 10px;">Price</h4>

                            <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
                            <hr>
                            <input type="submit" value="update" name="update_product" class="option-btn">
                            <input type="reset" value="cancel" id="close-update" class="delete-btn">
                        </form>
            <?php
                    }
                }
            } else {
                echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
            }
            ?>

        </section>





        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper.js/umd/popper.min.js"> </script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="vendor/chart.js/Chart.min.js"></script>
        <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="js/charts-home.js"></script>
        <script src="js/front.js"></script>
</body>

</html>






<style>
    .edit-product-form {
        min-height: 100vh;
        background-color: rgba(0, 0, 0, .7);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem;
        overflow-y: scroll;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1200;
        width: 100%;
    }

    .edit-product-form form {
        width: 30rem;
        padding: 2rem;
        border-radius: .5rem;

    }

    .edit-product-form form .box {
        margin-top: 10px;
        padding: 1rem 1rem;
        border-radius: .5rem;
        background-color: var(--light-bg);
        font-size: 1.4rem;
        color: var(--black);

        border: none;
        width: 100%;

    }
</style>

<script>
    document.querySelector('#close-update').onclick = () => {
        document.querySelector('.edit-product-form').style.display = 'none';
        window.location.href = 'admin_products.php';
    }
</script>