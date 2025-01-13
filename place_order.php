<?php
    include('config.php');
    include('session.php');

    // $count = $_POST['count_item'];//Count number of book from the cart table
    $user_id = $session_id; 
    $amount=$_POST['amount'];
    $order_btn=$_POST['order_btn'];
    $sql=mysqli_query($con,"SELECT * FROM book_cart bc JOIN book_list bl ON bc.book_id = bl.book_id WHERE bc.user_id ='$user_id' AND bc.is_deleted = '0' ");
    if(mysqli_num_rows($sql)>0){
        while($row=mysqli_fetch_assoc($sql)){
            $book_id=$row['book_id'];
        }
    }
    else{
        echo "0 books";
    }
    if(isset($session_id) == null){
        header("location:login.php");
        die();
    }
    else{
        if(isset($order_btn)){
            $select=mysqli_query($con,"SELECT * FROM book_order WHERE user_id='$user_id' AND b_id='$book_id' AND is_deleted='0'");
            if(mysqli_num_rows($select)==0){
                $sel=mysqli_query($con,"SELECT * FROM book_cart bc JOIN book_list bl ON bc.book_id = bl.book_id WHERE bc.user_id ='$user_id' AND bc.is_deleted = '0' ");
                while($row=mysqli_fetch_assoc($sel)){
                    
                    $book_amt=$row['mrp'];
                    $book_id = $row['book_id'];
                    
                        $date_str = strtotime("today");
                    $access_start = date('y-m-d',$date_str);
                    
                    $date_end = strtotime("+15 days");
                    $access_end = date('y-m-d',$date_end);
                    $quantity=1;
                    $order_item_insert = mysqli_query($con,"INSERT INTO book_order (user_id,b_id,quantity,payment,starting_date,ending_date)VALUES('$user_id','$book_id','$quantity','$book_amt','$access_start','$access_end')");
                    if(isset($order_item_insert)== TRUE){
                        $order_select_query=mysqli_query($con,"SELECT * FROM book_order WHERE user_id='$user_id' AND b_id='$book_id' AND is_deleted='0'");
                        if(mysqli_num_rows($order_select_query)==1){
                            $rows=mysqli_fetch_assoc($order_select_query);
                            $order_id=$rows['order_id'];
                            $payment=$rows['payment'];
                            $order_payment_insert = mysqli_query($con,"INSERT INTO order_payment (order_id,user_id,payment_amount) VALUES($order_id,$user_id,$payment)");
                        }
                    }
                }
                if(isset($order_item_insert)== TRUE){
                    $update_query = mysqli_query($con,"UPDATE book_cart SET is_deleted= '1' WHERE user_id='$user_id'");
                    $update_query2= mysqli_query($con,"UPDATE book_list SET available= '1' WHERE book_id='$book_id'");
                }
                header("location: my_ebook.php");
            }
        }
    }
    
?>