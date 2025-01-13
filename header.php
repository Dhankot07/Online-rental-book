<?php
    include('session.php');
?>
<!-- Wrapper -->
<div id="wrapper">

    <!-- Header -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href=" index.php" class="logo">
                <span class="fa fa-book"></span> <span class="title">Book Online Store Website</span>
            </a>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>

    <!-- Menu -->
    <nav id="menu">
        <?php
            if(isset($session_id)!=null){
            $user_id=$session_id;
            $user = mysqli_query($con,"SELECT * FROM user_list WHERE user_id='$user_id'");
            $row = mysqli_fetch_assoc($user);
        ?>
        <h2 style="color: white;">Hello <?= $row['username'] ?></h2>
        <?php
            }else{
        ?>
        <h2 style="color: white;">Hello User</h2>
        <?php } ?>
        <h3>Menu</h3>
        <ul>
            <li><a href=" index.php" class="<?php if($current_page=='home'){echo'active';} ?>">Home</a></li>
            <li><a href="products.php" class="<?php if($current_page=='book'){echo'active';} ?>">Books</a></li>
            <?php
                if(isset($session_id) == null){
                    $count='';
                }else{
                    $user_id = $session_id;
                    $sql =mysqli_query($con,"SELECT * FROM book_cart WHERE user_id ='$user_id' AND is_deleted='0' ");
                    $count=mysqli_num_rows($sql);
                }
            ?>
            <li>
                <?php
                    if(isset($session_id)==null){
                ?>
                <a href="login.php">Cart</a>
                <?php
                    }
                    else{
                ?>
                <a href=" cart.php" class="<?php if($current_page=='cart'){echo'active';} ?>">Cart
                    <span class="badge badge-success"><?= $count ?></span></a>
                <?php
                }
                ?>
            </li>
            <?php
                if(isset($session_id)!=null){
                    $user_id=$session_id;
                    $sqle= mysqli_query($con,"SELECT * FROM book_order WHERE user_id='$user_id' AND is_deleted='0' ");
                    $counte=mysqli_num_rows($sqle);
                }
            ?>
            <li>
                <?php
                    if(isset($session_id)==null){
                ?>
                <a href="login.php">My E-Book</a>
                <?php
                    }
                    else{
                ?>
                <a href=" my_ebook.php" class="<?php if($current_page=='ebook'){echo'active';} ?>">My
                    E-Book <span class="badge badge-success"><?= $counte ?></span></a>
                <?php
                }
                ?>
            </li>
            <li><a href="contact.php" class="<?php if($current_page=='contact'){echo'active';} ?>">Contact Us</a>
            </li>
        </ul>
        <?php
            if(isset($session_id)==null){
            ?>
        <a href="login.php"><button type="button" style="background-color: White;">Login/Sign Up</button></a>
        <?php
            }
            else{
            ?>
        <a href="logout.php"><button type="button" style="background-color: White;">Logout</button></a>
        <?php
            }
            ?>
    </nav>