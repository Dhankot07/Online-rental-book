<?php
    include('config.php');
    include('session.php');
    $user_id = $session_id;
    $id="";
    $date = strtotime("today");
    $end = date('y-m-d',$date);
    
    if(isset ($_GET['id'])){
        $id = $_GET['id'];
        $sql= mysqli_query($con,"UPDATE book_order SET is_deleted='1' , ending_date='$end' WHERE b_id='$id' AND user_id='$user_id'");
        $sql2 = mysqli_query($con,"UPDATE book_list SET available='0' WHERE book_id='$id'");
        header("location:my_ebook.php");
    }
?>