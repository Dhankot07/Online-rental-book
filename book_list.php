<?php

    include('config.php');

    /*session_start();
    if (empty($_SESSION)){
        header("location:login.php");
    }*/
    
    $sql =mysqli_query($con,"SELECT * FROM book_list WHERE is_deleted='0'");
    
?>



<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/css/ready.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
    <div class="wrapper">
        <?php
            $current_page="book";
            include('a_header.php');
        ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">
                        <span onclick="location.href='index.php';" style="cursor:pointer;">Dashboard</span> . Book List
                    </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="card-title">Book Registerd</h4>
                                    <p>
                                        <span onclick="location.href='add_book.php';"
                                            style=" cursor: pointer; color: blue;">Click here -</span> Add Book
                                    </p>
                                </div>
                                <div class=" card-body">
                                    <table class="table table-head-bg-success table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Language</th>
                                                <th scope="col">Author</th>
                                                <th scope="col">Publication</th>
                                                <th scope="col">MRP ₹</th>
                                                <th scope="col">Most Pop.</th>
                                                <th scope="col">Date of Published</th>
                                                <th scope="col">Book Detail</th>
                                                <th scope="col">Images</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Remove</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            while($rows = mysqli_fetch_assoc($sql)){
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $rows['book_id'];?></td>
                                                <td><?php echo $rows['book_title'];?></td>
                                                <td><?php echo $rows['book_lang'];?></td>
                                                <td><?php echo $rows['book_author'];?></td>
                                                <td><?php echo $rows['publication'];?></td>
                                                <td>₹<?php echo $rows['mrp'];?></td>
                                                <td style="color:green; font-weight: bolder; ">
                                                    <?php
                                                        if($rows['most_pop'] == 1){
                                                            echo "YES";
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo $rows['date'];?></td>
                                                <td><?php echo substr($rows['book_detail'],0,75)."..."?></td>
                                                <td>
                                                    <span
                                                        onclick="location.href='images.php?id=<?php echo $rows['book_id']; ?>';"
                                                        style=" cursor: pointer; color: blue;">
                                                        Image
                                                    </span>
                                                </td>
                                                <td>
                                                    <h6>
                                                        <span
                                                            onclick="location.href='update_book.php?id=<?php echo $rows['book_id']; ?>';"
                                                            style=" cursor: pointer; color: blue;">EDIT</span>
                                                    </h6>
                                                </td>
                                                <td>
                                                    <form action="remove.php" method="post">
                                                        <input type="hidden" name="book_id"
                                                            value="<?php echo $rows['book_id']; ?>">
                                                        <button type="submit" name="remove_book"
                                                            style="cursor: pointer; color: red;">Remove</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>