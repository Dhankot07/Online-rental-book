<?php
    include('config.php');
    $id="";
    if(isset ($_GET['id'])){
        $id = $_GET['id'];
        $sql= mysqli_query($con,"UPDATE book_cart SET is_deleted=1 WHERE cart_id=$id ");
        header("Location: cart.php?error=Book removed from the cart !");
    }
?>