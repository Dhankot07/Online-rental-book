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
    <style>
    .preview-pic {
        -webkit-box-flex: 1;
        -webkit-flex-grow: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }

    .tab-content {
        overflow: hidden;
    }

    .tab-content img {
        width: 60%;
        -webkit-animation-name: opacity;
        animation-name: opacity;
        -webkit-animation-duration: .3s;
        animation-duration: .3s;
    }

    .preview-thumbnail.nav-tabs {
        border: none;
        margin-top: 15px;
    }

    .preview-thumbnail.nav-tabs li {
        width: 18%;
        margin-right: 2.5%;
    }

    .preview-thumbnail.nav-tabs li img {
        max-width: 100%;
        display: block;
    }

    .preview-thumbnail.nav-tabs li a {
        padding: 0;
        margin: 0;
    }

    .preview-thumbnail.nav-tabs li:last-of-type {
        margin-right: 0;
    }
    </style>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">

    </div>
    <?php
        $current_page='book';
        include('header.php');
        if($session_id != 0){
            $user_id=$session_id;
        }
        else{
            $user_id=0;
        }
    ?>
    <!-- Main -->
    <?php
        $id="";
        if(isset ($_GET['id'])){
            $id = $_GET['id'];
            $b_detail = mysqli_query($con , "SELECT * FROM book_list WHERE book_id =$id");
    ?>

    <div id="main">
        <div class="inner">
            <?php
                if($b_detail->num_rows >0){
                    while($row=$b_detail->fetch_assoc()){
            ?>

            <h1>
                <?php echo $row['book_title']; ?>
                <span class="pull-right">₹ <?= $row['mrp'] ?></span>
            </h1>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <?php
                            $b_img = mysqli_query($con,"SELECT * FROM book_image WHERE book_id ='$id' AND is_deleted='0'");
                            $count = mysqli_num_rows($b_img);
                            $img=mysqli_fetch_all($b_img);
                        ?>
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active">
                                <img src="admin/uploads/<?= $img[0][2] ?>" id="image" />
                            </div>
                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                                for($i=0;$count>$i;$i++){
                            ?>
                            <li class="active">
                                <a data-target="#pic-<?= $i ?>" style="cursor: pointer; " data-toggle="tab">
                                    <img src="admin/uploads/<?= $img[$i][2] ?>" onclick="change(<?=$i?>)"
                                        id="img<?=$i?>" />
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class=" col-md-7">
                        <p>
                            <span style="font-family: 'Times New Roman', Times, serif; font-weight: bold; ">
                                Author : </span><?= $row['book_author']; ?>
                            <br>

                            <span style=" font-family: 'Times New Roman' , Times, serif; font-weight: bold; ">
                                Published by : </span><?= $row['publication']; ?>
                            <br>

                            <span style=" font-family: 'Times New Roman' , Times, serif; font-weight: bold; ">
                                Language : </span><?= $row['book_lang']; ?>
                            <br>

                            <span style=" font-family: 'Times New Roman' , Times, serif; font-weight: bold; ">
                                Date of published : </span><?= $row['date']; ?>
                            <br>
                        </p>

                        <p><?= $row['book_detail']; ?></p>

                        <div class=" row">
                            <div class="col-sm-8">
                                <?php
                                    $query_os=mysqli_query($con,"SELECT * FROM book_order WHERE b_id=$id AND user_id='$user_id' AND is_deleted='0'") ;
                                    $sql_of=mysqli_fetch_assoc($query_os);
                                    if($sql_of == TRUE){
                                ?>
                                <button class="primary" onclick="location.href='my_ebook.php'">My
                                    E-Book</button>
                                <?php
                                    }
                                    else{
                                        $query=mysqli_query($con,"SELECT * FROM book_list WHERE book_id =$id AND
                                        available='0'");
                                        $row=mysqli_fetch_assoc($query);
                                        if(isset($row)==TRUE){
                                ?>
                                <form action="cart_code.php?id=<?php echo $row['book_id']; ?>" method="post">
                                    <input type="submit" name="cart_btn" id="cart_btn" method="post" class="primary"
                                        value="Add to Cart">
                                </form>
                                <?php
                                        }
                                        else{
                                ?>
                                <span
                                    style="font-family: 'Times New Roman', Times, serif;color:black; font-weight: bold; ">
                                    <?php
                                        $date_query=mysqli_query($con,"SELECT * FROM book_order WHERE b_id='$id' AND is_deleted='0'");
                                        $fetch_date=mysqli_fetch_assoc($date_query);
                                    ?>
                                    Sorry, Book is not available. This book will be available soon
                                    <strong style="color:green;">Date :
                                        <?php echo $fetch_date['ending_date']; ?>.</strong>
                                    <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
                }}}
            ?>
    <br>
    <br>

    <div class="container-fluid">
        <h2 class="h2">Similar Books</h2>

        <!-- Products -->
        <section class="tiles">
            <?php
                $fetch = mysqli_query($con , "SELECT * FROM book_list WHERE book_id =$id");
                $publisher=mysqli_fetch_assoc($fetch)['publication'];
                $sql = mysqli_query($con,"SELECT * FROM book_list bl JOIN book_image bi ON bl.book_id = bi.book_id WHERE bl.book_id != $id AND bl.publication !='$publisher' AND bl.is_deleted='0' AND bi.is_deleted='0'  limit 3 ");
                while($row = mysqli_fetch_assoc($sql)){
            ?>
            <article class="style3">
                <div class="col-sm-12 text-center">
                    <a href="product-details.php?id=<?php echo $row['book_id']; ?>">
                        <span class="image">
                            <img src="admin/uploads/<?= $row['image'] ?>" alt="" />
                        </span>
                        <h2 class="m-n"><?php echo $row['book_title']; ?></h2>

                        <p>
                            <?php echo $row['book_author']; ?> &nbsp;|&nbsp;
                            <?php echo $row['publication']; ?>
                            <br>
                            <?php echo $row['book_lang']; ?> &nbsp;|&nbsp;<b>
                                ₹<?php echo $row['mrp']; ?></b>
                        </p>
                        <input type="hidden" name="hidden_id" value="<?= $row['book_id']; ?>">
                    </a>
                </div>
            </article>
            <?php } ?>
        </section>
    </div>
    </div>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <ul class="icons">
                    <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a>
                    </li>
                    <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a>
                    </li>
                    <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a>
                    </li>
                </ul>

                &nbsp;
            </section>

            <ul class="copyright">
                <li>Copyright © 2020 Company Name </li>
                <li>Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a></li>
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
    function change(value) {
        var y = document.getElementById('img' + value);
        var ypath = y.src;
        document.getElementById('image').src = ypath;
    }
    </script>

</body>

</html>