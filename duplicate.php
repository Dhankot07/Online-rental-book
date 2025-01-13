<?php
    if(isset($_POST['submit'])){
        $b_title = $_POST['book_title'];
        $b_lang = $_POST['book_lang'];
        $b_author = $_POST['book_author'];
        $b_publication = $_POST['book_publication'];
        $b_mrp = $_POST['book_mrp'];
        $b_date = $_POST['book_date'];
        $b_description = $_POST['description'];
                    
        $b_file = $_FILES['book_img']['name'];
        $b_file_tmp = $_FILES["book_img"]["tmp_name"];
        $upload_dir = "uploads/";
        $upload_file = $upload_dir .basename($b_file);
        $uploadOk = 1;
        $file = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
        $check = getimagesize($b_file_tmp);
        
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        }
        else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($uploadOk == 0) {
            echo "<script> alert('Sorry, your file was not uploaded.');</script>";
            // if everything is ok, try to upload file
        } else {
            if(move_uploaded_file($b_file_tmp, $upload_file)) {
                echo "<script> alert('The file ". htmlspecialchars( basename( $b_file)). " has been uploaded.');</script>";
            } else {
                echo "<script> alert('Sorry, there was an error uploading your file.');</script>".$uploadOk .$con->error;
            }
        }
        
        
        $sql =mysqli_query($con,"SELECT * FROM book_list WHERE book_title = '".$b_title."'");
        $count = mysqli_num_rows($sql);
        if($count == 0){
            $insert = mysqli_query($con,"INSERT INTO book_list(book_title , book_lang , book_author , publication , mrp , date , book_detail , book_file) VALUES ('$b_title','$b_lang','$b_author','$b_publication','$b_mrp','$b_date','$b_description','$b_file' )");
            if($insert == TRUE){
                echo "<script> alert('Data inserted Successfully');</script>" ;
                echo "<script> location.href = 'book_list.php';</script>" ;
            }
            else{
                echo "<script> alert('ERROR.');</script>".$insert .$con->error ;
            }
        }
        else{
            echo "<script> alert('Book Already Exists.');</script>" ;
            echo "<script> location.href = 'add_book.php';</script>" ;
        }
                    
    }
?>