<?php
    include('config.php');
?>

<div class="main-header">
    <nav class="navbar navbar-header navbar-expand-lg">
        <div class="container-fluid" style="padding-top: 2%; ">
            <h4>Admin Dashboard</h4>
        </div>
    </nav>
</div>
<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item <?php if($current_page=='home'){echo'active';} ?>">
                <a href="index.php">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item <?php if($current_page=='user'){echo'active';} ?>">
                <?php
                    $user_select=mysqli_query($con,"SELECT * FROM user_list WHERE is_deleted='0'");
                    $count = mysqli_num_rows($user_select);
                ?>
                <a href="user_list.php">
                    <i class="la la-table"></i>
                    <p>User list</p>
                    <span class="badge badge-warning"><?= $count ?></span>
                </a>
            </li>
            <?php
                $book_select=mysqli_query($con,"SELECT * FROM book_list WHERE is_deleted='0'");
                $count = mysqli_num_rows($book_select);
            ?>
            <li class="nav-item <?php if($current_page=='book'){echo'active';} ?>">
                <a href="book_list.php">
                    <i class="la la-keyboard-o"></i>
                    <p>Book List</p>
                    <span class="badge badge-success"><?= $count ?></span>
                </a>
            </li>
            <?php
                        $user_select=mysqli_query($con,"SELECT * FROM book_order");
                        $count = mysqli_num_rows($user_select);
                    ?>
            <li class="nav-item <?php if($current_page=='order'){echo'active';} ?>">
                <a href="order.php">
                    <i class="la la-th"></i>
                    <p>Orders</p>
                    <span class="badge badge-danger"><?= $count ?></span>
                </a>
            </li>
            <li class="nav-item <?php if($current_page=='payment'){echo'active';} ?>">
                <a href="payment.php">
                    <i class="la la-bell"></i>
                    <p>Payments</p>
                    <span class="badge badge-primary">
                        <?php
                            echo $count." - ";
                            $total="0";
                            while($row=mysqli_fetch_assoc($user_select)){
                                $num = $row['payment'];
                                $total=$total+$num;
                            }
                            echo "₹ ".$total;
                        ?>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>