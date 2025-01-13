<?php

    include('config.php');

    /*session_start();
    if (empty($_SESSION)){
        header("location:login.php");
    }*/
    
?>



<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/ready.css">
    <link rel="stylesheet" href="assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <?php
            $current_page="home";
            include ('a_header.php');
        ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-stats card-warning" onclick=" location.href='user_list.php'">
                                <div class=" card-body ">
                                    <div class=" row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-users"></i>
                                            </div>
                                        </div>
                                        <?php
                                            $user_select=mysqli_query($con,"SELECT * FROM user_list");
                                            $count = mysqli_num_rows($user_select);
                                        ?>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">User List</p>
                                                <h4 class="card-title"><?= $count; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-success book_list" onclick="location.href='book_list.php'">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-bar-chart"></i>
                                            </div>
                                        </div>
                                        <?php
                                            $book_select=mysqli_query($con,"SELECT * FROM book_list WHERE is_deleted='0'");
                                            $count = mysqli_num_rows($book_select);
                                        ?>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Book List</p>
                                                <h4 class="card-title"><?php echo $count; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-danger" onclick=" location.href='order.php'">
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-newspaper-o"></i>
                                            </div>
                                        </div>
                                        <?php
                                            $order_select=mysqli_query($con,"SELECT * FROM book_order");
                                            $count=mysqli_num_rows($order_select);
                                        ?>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Order List</p>
                                                <h4 class="card-title"><?=$count; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-primary" onclick="location.href='payment.php'">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-check-circle"></i>
                                            </div>
                                        </div>

                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Payment List</p>
                                                <h4 class="card-title">
                                                    <?php
                                                        echo $count." - ";
                                                        $total="0";
                                                        while($row=mysqli_fetch_assoc($order_select)){
                                                            $num = $row['payment'];
                                                            $total=$total+$num;
                                                        }
                                                        echo "₹ ".$total;
                                                    ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="main-panel">
                <div class="content">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="http://www.themekita.com">
                                        ThemeKita
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        Help
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="https://themewagon.com/license/#free-item">
                                        Licenses
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright ml-auto">
                            2018, made with <i class="la la-heart heart text-danger"></i> by <a
                                href="http://www.themekita.com">ThemeKita</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
<script src="assets/js/core/jquery.3.2.1.min.js"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/demo.js"></script>

</html>