<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
  header('location:login.php');
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

  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<style>
  .statistic-block {
    padding: 36px;
    background: #2d3035;
    color: #8a8d93;
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
        <div class="list-inline-item logout"> <a id="logout" href="
        logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
      </div>
      </div>
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
        <li class="active" ><a href="admin_page.php"> <i class="icon-home"></i>Home </a></li>
        <li ><a href="admin_orders.php"> <i class="icon-grid"></i>Orders </a></li>
        <li><a href="admin_users.php"> <i class="fa fa-bar-chart"></i>Users </a></li>
        <li ><a href="admin_products.php"> <i class="icon-padnote"></i>Products </a></li>

        <li><a href="admin_contacts.php"> <i class="icon-padnote"></i>Messages </a></li>
      </ul>
    </nav>
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
        <center>
            <h2 style="font-size: 27px; letter-spacing: 3px; " class="h5 no-margin-bottom">Dashboard</h2>
          </center>
      </div>
      </div>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-bar-chart"></i></div><strong>Total Pendings</strong>
                  </div>
                  <?php
                  $total_pendings = 0;
                  $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                  if (mysqli_num_rows($select_pending) > 0) {
                    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                      $total_price = $fetch_pendings['total_price'];
                      $total_pendings += $total_price;
                    };
                  };
                  ?>
                  <h3>$<?php echo $total_pendings; ?>/-</h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-contract"></i></div><strong>Completed Payments</strong>
                  </div>
                  <?php
                  $total_completed = 0;
                  $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                  if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                      $total_price = $fetch_completed['total_price'];
                      $total_completed += $total_price;
                    };
                  };
                  ?>
                  <h3>$<?php echo $total_completed; ?>/-</h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-paper-and-pencil"></i></div><strong>order placed</strong>
                  </div>
                  <?php
                  $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
                  $number_of_orders = mysqli_num_rows($select_orders);
                  ?>
                  <h3><?php echo $number_of_orders; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-3"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>products added </strong>
                  </div>
                  <?php
                  $select_products = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                  $number_of_products = mysqli_num_rows($select_products);
                  ?>
                  <h3><?php echo $number_of_products; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">

                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong> normal users </strong>
                  </div>
                  <?php
                  $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'user'") or die('query failed');
                  $number_of_users = mysqli_num_rows($select_users);
                  ?>
                  <h3><?php echo $number_of_users; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">

                    <div class="icon"><i class="icon-writing-whiteboard"></i></div><strong>admin users</strong>
                  </div>
                  <?php
                  $select_admins = mysqli_query($conn, "SELECT * FROM `users` WHERE user_type = 'admin'") or die('query failed');
                  $number_of_admins = mysqli_num_rows($select_admins);
                  ?>
                  <h3><?php echo $number_of_admins; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="fa fa-bar-chart"></i></div><strong>total accounts </strong>
                  </div>
                  <?php
                  $select_account = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
                  $number_of_account = mysqli_num_rows($select_account);
                  ?>
                  <h3><?php echo $number_of_account; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-1"></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="statistic-block block">
                <div class="progress-details d-flex align-items-end justify-content-between">
                  <div class="title">
                    <div class="icon"><i class="icon-contract"></i></div><strong>new messages </strong>
                  </div>
                  <?php
                  $select_messages = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
                  $number_of_messages = mysqli_num_rows($select_messages);
                  ?>
                  <h3><?php echo $number_of_messages; ?></h3>
                </div>
                <div class="progress progress-template">
                  <div role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="no-padding-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="bar-chart block no-margin-bottom">
                <canvas id="barChartExample1"></canvas>
              </div>
              <div class="bar-chart block">
                <canvas id="barChartExample2"></canvas>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="line-cahrt block">
                <canvas id="lineCahrt"></canvas>
              </div>
            </div>
          </div>
        </div>
      </section>

    
      <section class="margin-bottom-sm">
        <div class="container-fluid">
          <div class="row d-flex align-items-stretch">
            <div class="col-lg-6">
              <div class="stats-with-chart-1 block">
                <div class="title"> <strong class="d-block">Total Pendings</strong></div>
                <div class="row d-flex align-items-end justify-content-between">
                  <div class="col-5">
                    <div class="text"><strong class="d-block dashtext-3"> <?php
                  $total_pendings = 0;
                  $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
                  if (mysqli_num_rows($select_pending) > 0) {
                    while ($fetch_pendings = mysqli_fetch_assoc($select_pending)) {
                      $total_price = $fetch_pendings['total_price'];
                      $total_pendings += $total_price;
                    };
                  };
                  ?>
                  <h3>$<?php echo $total_pendings; ?>/-</h3></strong></div>
                  </div>
                  <div class="col-7">
                    <div class="bar-chart chart">
                      <canvas id="salesBarChart1"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="stats-with-chart-1 block">
                <div class="title"> <strong class="d-block">Completed Payments</strong></div>
                <div class="row d-flex align-items-end justify-content-between">
                  <div class="col-4">
                    <div class="text"><strong class="d-block dashtext-1"><?php
                  $total_completed = 0;
                  $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
                  if (mysqli_num_rows($select_completed) > 0) {
                    while ($fetch_completed = mysqli_fetch_assoc($select_completed)) {
                      $total_price = $fetch_completed['total_price'];
                      $total_completed += $total_price;
                    };
                  };
                  ?>
                  <h3>$<?php echo $total_completed; ?>/-</h3></strong></div>
                  </div>
                  <div class="col-8">
                    <div class="bar-chart chart">
                      <canvas id="visitPieChart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
      </section>

      
  <!-- JavaScript files-->
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