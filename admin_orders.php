<?php

include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:login.php');
}

if (isset($_POST['update_order'])) {

  $order_update_id = $_POST['order_id'];
  $update_payment = $_POST['update_payment'];
  mysqli_query($conn, "UPDATE `orders` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('query failed');
  $message[] = 'payment status has been updated!';
}
if (isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `orders` WHERE id = '$delete_id'") or die('query failed');
  header('location:admin_orders.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dark Bootstrap Admin </title>
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

</head>
<style>
  .box-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, 30rem);
    justify-content: center;
    gap: 1.5rem;
    max-width: 1200px;
    margin: 0 auto;
    align-items: flex-start;
  }

  section {
    padding: 3rem 2rem;
  }

  .box {
    padding: 2rem;
    background-color: white;
    border: var(--border);
    box-shadow: var(--box-shadow);
    border-radius: .5rem;
  }

  form {
    text-align: center !important;
  }

  .option-btn {
    font-size: 20px;
    padding: 5px 40px;
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

  .delete-btn {
    font-size: 20px;
    padding: 5px 40px;
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
</style>

<body>
  <header class="header">
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="index.html" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">Dark</strong><strong>Admin</strong></div>
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
          <h1 class="h5"><span><?php echo $_SESSION['admin_name']; ?></span></h1>
          <p style=" color: #8a8d93;"> <span><?php echo $_SESSION['admin_email']; ?></span></p>
        </div>
      </div>
      <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
      <ul class="list-unstyled">
        <li><a href="admin_page.php"> <i class="icon-home"></i>Home </a></li>
        <li class="active"><a href="admin_orders.php"> <i class="icon-grid"></i>Orders </a></li>
        <li><a href="admin_users.php"> <i class="fa fa-bar-chart"></i>Users </a></li>
        <li ><a href="admin_products.php"> <i class="icon-padnote"></i>Products </a></li>

        <li><a href="admin_contacts.php"> <i class="icon-padnote"></i>Messages </a></li>
      </ul>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <!-- Page Header-->
      <div class="page-header no-margin-bottom">
        <div class="container-fluid">
          <center>
            <h2 style="font-size: 27px; letter-spacing: 3px; " class="h5 no-margin-bottom">Orders</h2>
          </center>
        </div>
      </div>
      <!-- Breadcrumb-->
      <div class="container-fluid">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Orders </li>
        </ul>
      </div>
      <section class="no-padding-top">

        <table>

          <div class="box-container">
            <?php
            $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            if (mysqli_num_rows($select_orders) > 0) {
              while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
            ?>
                <div class="box">

                  <p> User Id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
                  <p> Placed On : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
                  <p> Name : <span><?php echo $fetch_orders['name']; ?></span> </p>
                  <p> Number : <span><?php echo $fetch_orders['number']; ?></span> </p>
                  <p> Email : <span><?php echo $fetch_orders['email']; ?></span> </p>
                  <p> Address : <span><?php echo $fetch_orders['address']; ?></span> </p>
                  <p>Total Products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
                  <p> Total Price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
                  <p> Payment Method : <span><?php echo $fetch_orders['method']; ?></span> </p>
                  <form action="" method="post">
                    <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                    <select name="update_payment">
                      <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                      <option value="pending">Pending</option>
                      <option value="completed">Completed</option>
                    </select>
                    <div class="bt">
                      <input type="submit" value="Update" name="update_order" class="option-btn">
                      <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">Delete</a>
                    </div>
                  </form>

                </div>
            <?php
              }
            } else {
              echo '<p class="empty">no orders placed yet!</p>';
            }
            ?>
        </table>

      </section>
      <footer class="footer">
        <div class="footer__block block no-margin-bottom">
          <div class="container-fluid text-center">
            <p class="no-margin-bottom">2018 &copy; Your company. Download From <a target="_blank" href="https://templateshub.net">Templates Hub</a>.</p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="js/front.js"></script>
</body>

</html>