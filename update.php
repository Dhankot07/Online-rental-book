<?php
    include('config.php');
        $b_id= $_POST['book_id'];
        $b_title = $_POST['book_title'];
        $b_lang = $_POST['book_lang'];
        $b_author = $_POST['book_author'];
        $b_publication = $_POST['book_publication'];
        $b_mrp = $_POST['book_mrp'];
        $b_date = $_POST['book_date'];
        $b_description = $_POST['description'];
        $most_pop=$_POST['checkbox'];
        
        // Escape special characters
        $b_title = mysqli_real_escape_string($con, $b_title);
        $b_lang = mysqli_real_escape_string($con, $b_lang);
        $b_author = mysqli_real_escape_string($con, $b_author);
        $b_publication = mysqli_real_escape_string($con, $b_publication);
        $b_mrp = mysqli_real_escape_string($con, $b_mrp);
        $b_date = mysqli_real_escape_string($con, $b_date);
        $b_description = mysqli_real_escape_string($con, $b_description);
        $most_pop= mysqli_real_escape_string($con, $most_pop);
        
        $update = mysqli_query($con,"UPDATE book_list SET book_title='$b_title',book_lang='$b_lang' ,book_author='$b_author' ,publication='$b_publication',mrp='$b_mrp' ,date='$b_date' ,book_detail='$b_description' ,most_pop='$most_pop' WHERE book_id = '$b_id' ");
        if($update == true){
            header("location:book_list.php");
        }
        else{
            echo "unsccessfull";
        }
?>