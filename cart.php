<?php
    include('config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>PHPJabbers.com | Free Book Online Store Website Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>
<style>
@media (min-width: 1025px) {
    .h-custom {
        height: auto !important;
    }
}

.error {
    background-color: green;
    color: white;

}

.alert {
    background-color: Green;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <?php
            $current_page="cart";
            include ('header.php');
        ?>
        <!-- Main -->
        <div id="main">
            <div class="inner">
                <h1>Cart</h1>
            </div>
            <!--cart page-->
            <section class="h-100 h-custom" style="background-color: #eee;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100%">
                        <div class="col">
                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-lg-11">
                                            <h5 class="mb-3">
                                                <?php
                                                    //$sql=mysqli_query($con,"SELECT * FROM book_list");
                                                    //$row=mysqli_fetch_array($sql)
                                                ?>
                                                <a href="products.php" class="text-body">
                                                    <i class="fa fa-caret-left"></i>
                                                    Continue shopping
                                                </a>
                                            </h5>
                                            <hr>
                                            <?php
                                                    if(isset($_GET['error'])){
                                            ?>
                                            <div class="alert">
                                                <span class="closebtn"
                                                    onclick="this.parentElement.style.display='none';">&times;</span>
                                                <p class="error"><?php echo $_GET['error']; ?></p>
                                            </div>

                                            <?php
                                                    }
                                                
                                                $sql =mysqli_query($con,"SELECT * FROM book_cart bc JOIN book_list bl ON bc.book_id = bl.book_id WHERE bc.user_id ='$user_id' AND bc.is_deleted = '0' ");
                                                $count=mysqli_num_rows($sql);
                                            ?>
                                            <div class="d-flex justify-content-between align-items-center mb-4">
                                                <div>
                                                    <p class="mb-1">Shopping cart</p>
                                                    <p class="mb-0">You have <?= $count ?>items in your cart</p>
                                                </div>
                                                <!--<div>
                                                    <p class="mb-0"><span class="text-muted">Sort by:</span> <a
                                                            href="#!" class="text-body">price <i
                                                                class="fas fa-angle-down mt-1"></i></a></p>
                                                </div>-->
                                            </div>
                                            <div class="cart-items">
                                                <?php
                                                    $total=0;
                                                    if($sql->num_rows >0){
                                                        while($row=$sql->fetch_assoc()){
                                                ?>
                                                <div class="card mb-3 cart-row">
                                                    <div class="card-body">
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div class="md-4">
                                                                    <img src=" admin/uploads/<?= $row['book_file'] ?>"
                                                                        class="img-fluid rounded-3" alt="Shopping item"
                                                                        style="width: 65px;">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h5>
                                                                        <?= $row['book_title'] ?>
                                                                    </h5>
                                                                    <p class=" small mb-0"><?= $row['book_author'] ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex flex-row align-items-center">
                                                                <div style="width: 80px;">
                                                                    <h5 class="mb-0">₹<?= $row['mrp'] ?></h5>
                                                                </div>

                                                                <a onclick="location.href='remove_item.php?id=<?php echo $row['cart_id']; ?>'"
                                                                    style="cursor:pointer;"><i class=" fa fa-trash-o"
                                                                        style="color: #d93434;"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                    $num = $row['mrp'];
                                                    $total= $total+$num;
                                                    }
                                                }
                                                else{
                                                    echo "No Books are Stored in cart.";
                                                }
                                                $sql=mysqli_query($con,"SELECT * FROM book_cart bc JOIN book_list bl ON bc.book_id = bl.book_id WHERE bc.user_id ='$user_id' AND bc.is_deleted = '0' ");
                                            ?>
                                            </div>
                                            <div class="col-md-12 align-right">
                                                <div class="col-md-12">
                                                    <?php
                                                        if($count == 0){
                                                    ?>
                                                    <h2>Total :
                                                        <span
                                                            class="cart-total-price">₹<?= number_format($total) ?></span>
                                                    </h2>
                                                    <?php
                                                        }
                                                        else{
                                                    ?>
                                                    <form action="place_order.php" method="post">
                                                        <h2>Total :
                                                            <span
                                                                class="cart-total-price">₹<?= number_format($total) ?></span>
                                                        </h2>
                                                        <input type="hidden" name="amount"
                                                            value="<?= number_format($total) ?>">
                                                        <!--count number of books in the cart-->
                                                        <button type="submit" name="order_btn">Place Order</button>
                                                    </form>
                                                    <?php
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
        </div>

        <!-- Footer -->
        <footer id="footer">
            <div class="inner">
                <section>
                    <h2>Contact Info</h2>

                    <ul class="alt">
                        <li><span class="fa fa-envelope-o"></span> <a href="#">contact@company.com</a></li>
                        <li><span class="fa fa-phone"></span> +1 333
                            4040 5566
                        </li>
                        <li><span class="fa fa-map-pin"></span> 212
                            Barrington
                            Court New York, ABC 10001 United
                            States
                            of America</li>
                    </ul>

                    <h2>Follow Us</h2>

                    <ul class="icons">
                        <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a>
                        </li>
                        <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a>
                        </li>
                        <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a>
                        </li>
                        <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a>
                        </li>
                    </ul>
                </section>

                <ul class="copyright">
                    <li>Copyright © 2020 Company Name </li>
                    <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </li>
                </ul>
            </div>
        </footer>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
    function removeItem(id) {
        // Find the item element by ID
        const itemElement = document.getElementById('item-' + id);
        if (itemElement) {
            // Remove the element from the DOM
            itemElement.remove();
        }
    }
    </script>
</body>

</html>