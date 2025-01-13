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
</head>

<body class="is-preload">

    <?php
        $current_page="book";
        include('header.php');
    ?>

    <!-- Main -->
    <div id="main">
        <div class="inner">
            <h1>BOOKS</h1>

            <div class="image main">
                <img src="images/banner-image-6-1920x500.jpg" class="img-fluid" alt="" />
            </div>

            <!-- Products -->
            <section class="tiles">
                <?php
                    $sql= mysqli_query($con,"SELECT * FROM book_list WHERE is_deleted='0'");
                    $count = mysqli_num_rows($sql);
                    $img = mysqli_fetch_assoc($sql);
                    while($row = mysqli_fetch_assoc($sql)){
                    $id=$row['book_id'];
                ?>
                <article class="style3">
                    <div class="col-sm-12 text-center">
                        <a href="product-details.php?id=<?= $id ?>">
                            <?php
                                $img_sel = mysqli_query($con,"SELECT * FROM book_image WHERE book_id='$id' AND is_deleted='0'");
                                $img = mysqli_fetch_array($img_sel);
                            ?>
                            <span class="image">
                                <img src="admin/uploads/<?= $img['image'] ?>" alt="" />
                            </span>
                            <?php  ?>
                            <h2 class="m-n"><?php echo $row['book_title']; ?></h2>

                            <p>
                                <?php echo $row['book_author']; ?> &nbsp;|&nbsp; <?php echo $row['publication']; ?>
                                <br>
                                <?php echo $row['book_lang']; ?> &nbsp;|&nbsp;<b> ₹<?php echo $row['mrp']; ?></b>
                            </p>
                            <input type="hidden" name="hidden_id" value="<?= $row['book_id']; ?>">
                        </a>
                    </div>
                </article>
                <?php } ?>
            </section>
        </div>
    </div>

    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>