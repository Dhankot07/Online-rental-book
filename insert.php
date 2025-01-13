<?php
    include('config.php');

    if(isset($_POST['submit'])){
        $b_title = $_POST['book_title'];
        $b_lang = $_POST['book_lang'];
        $b_author = $_POST['book_author'];
        $b_publication = $_POST['book_publication'];
        $b_mrp = $_POST['book_mrp'];
        $b_date = $_POST['book_date'];
        $b_description = $_POST['description'];
        $b_mp=$_POST['checkbox'];

        // Escape special characters
        $b_title = mysqli_real_escape_string($con, $b_title);
        $b_lang = mysqli_real_escape_string($con, $b_lang);
        $b_author = mysqli_real_escape_string($con, $b_author);
        $b_publication = mysqli_real_escape_string($con, $b_publication);
        $b_mrp = mysqli_real_escape_string($con, $b_mrp);
        $b_date = mysqli_real_escape_string($con, $b_date);
        $b_description = mysqli_real_escape_string($con, $b_description);
        $b_mp = mysqli_real_escape_string($con, $b_mp);
        
        
        $sql =mysqli_query($con,"SELECT * FROM book_list WHERE book_title = '".$b_title."'");
        $count = $sql->num_rows;
        if($count == 0){
            $insert = mysqli_query($con,"INSERT INTO book_list(book_title , book_lang , book_author , publication , mrp , date , book_detail) VALUES ('$b_title','$b_lang','$b_author','$b_publication','$b_mrp','$b_date','$b_description')");
            if($sql =mysqli_query($con,"SELECT * FROM book_list WHERE most_pop='1'")<3){
                $update = mysqli_query($con,"UPDATE book_list SET most_pop='$b_mp' WHERE book_title = '".$b_title."'");
            }
            else{
                echo "<script> alert('There is already 3 Books Registered as Most Popular');</script>";
            }
            if($insert == TRUE && $update == TRUE && $insert_img == TRUE){
                echo "<script> alert('Data inserted Successfully');</script>";
                header("location:book_list.php");
            }
            else{
                echo "<script> alert('ERROR.');</scrip>";
                exit;
            }
        }
        else{
            echo "<script> alert('Book Already Exists.');</script>" ;
            header("location:add_book.php");
        }
    }

    if(isset($_POST['upload_image'])){
        $b_id = $_POST['book_id'];
        
        $b_file = $_FILES['book_img']['name'];
        $b_file_tmp = $_FILES["book_img"]["tmp_name"];
        $upload_dir = "uploads/";
        $upload_file = $upload_dir .basename($b_file);
        $uploadOk = 1;
        $file = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
        $check = getimagesize($b_file_tmp);
        
        if($check !== false) {
            
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            // echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "<script> alert('Sorry, your file was not uploaded.');</script>";
            // if everything is ok, try to upload file
        }
        else {
            if(move_uploaded_file($b_file_tmp, $upload_file)) {
                echo "<script> alert('The file ". htmlspecialchars( basename( $b_file)). " has been uploaded.');</script>";
            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.');</script>".$uploadOk .$con->error;
            }
        }
        
        $sql =mysqli_query($con,"SELECT * FROM book_image WHERE image='$b_file' AND is_deleted='0'");
        if(mysqli_num_rows($sql) == 0){
            $insert_img = mysqli_query($con,"INSERT INTO book_image(book_id,image) VALUES('$b_id','$b_file')");
            if($insert_img == TRUE){
                header("location:images.php?id=$b_id");
            }
        }
        else{
            header("location:images.php?id=$b_id");
        }
        
    }
?>