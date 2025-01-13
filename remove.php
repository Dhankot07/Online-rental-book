<?php
    include('config.php');
    
    
    if(isset($_POST['remove_user'])){
        $u_id = $_POST['user_id'];
        $sql= mysqli_query($con,"UPDATE user_list SET is_deleted='1' WHERE user_id=$u_id ");
        header("Location: user_list.php");
    }
    
    if(isset($_POST['remove_book'])){
        $b_id = $_POST['book_id'];
        $sql= mysqli_query($con,"UPDATE book_list SET is_deleted= '1'  ,most_pop='0' WHERE book_id= $b_id");
        header("Location: book_list.php");
    }

    if(isset($_POST['remove_image'])){
        $b_id = $_POST['book_id'];
        $i_id = $_POST['image_id'];
        $sql= mysqli_query($con,"UPDATE book_image SET is_deleted= '1' WHERE image_id= $i_id");
        header("location:images.php?id=$b_id");
    }
?>