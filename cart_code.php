<?php
    include('config.php'); //
    include('session.php');
    
    $book_id=$_GET['id'];
    $user_id = $session_id;
    $cart_btn=$_POST['cart_btn'];
    
    if(isset($session_id) == null){
        header("location:login.php");
        die();
    }
    else{
        if(isset($cart_btn)){
            $book_order_select=mysqli_query($con,"SELECT * FROM book_order WHERE user_id='$user_id' AND b_id='$book_id' AND is_deleted='0'");
            if(mysqli_num_rows($book_order_select)==0){
                $sql = mysqli_query($con,"SELECT * FROM book_cart WHERE user_id='$user_id' AND book_id = '$book_id' AND is_deleted=0");
                if(mysqli_num_rows($sql) == 0){
                    $insert = mysqli_query($con,"INSERT INTO book_cart(user_id,book_id) VALUES('$user_id','$book_id')");
                    header("Location: cart.php?error=Book Added to the Cart !");
                }else{
                    header("Location: cart.php?error=Book already Added to the Cart !");
                }
            }
            else{
                header("location: my_ebook.php");
            }
        }
    }
?>