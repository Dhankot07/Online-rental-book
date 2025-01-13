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
        $current_page="home";
        include ('header.php');
    ?>
    <!-- Main -->
    <div id="main">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/slider-image-1-1920x700.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slider-image-2-1920x700.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/slider-image-3-1920x700.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br>
        <br>

        <div class="inner">
            <!-- About Us -->
            <header id="inner">
                <h1>Find your new book!</h1>
                <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus
                    arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros
                    aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>
            </header>
            <br>
            <h2 class="h2">Most Popular Book</h2>
            <!-- Most popular book -->
            <section class="tiles">

                <?php
                        $sql = mysqli_query($con,"SELECT * FROM book_list bl JOIN book_image bi ON bl.book_id = bi.book_id WHERE bl.most_pop ='1' AND bi.is_deleted='0' AND bl.is_deleted='0' limit 3 ");
                        while($row = mysqli_fetch_assoc($sql)){
                    ?>

                <article class="style1">
                    <div class="col-sm-12 text-center">
                        <a href="product-details.php?id=<?php echo $row['book_id']; ?>">
                            <span class="image">
                                <img src="admin/uploads/<?= $row['image'] ?>" alt="" />
                            </span>
                            <h2 class="m-n"><?php echo $row['book_title']; ?></h2>

                            <p>
                                <?php echo $row['book_author']; ?> &nbsp;|&nbsp; <?php echo $row['publication']; ?>
                                <br>
                                <?php echo $row['book_lang']; ?> &nbsp;|&nbsp; <b> ₹<?php echo $row['mrp']; ?></b>
                            </p>
                            <input type="hidden" name="hidden_id" value="<?= $row['book_id']; ?>">
                        </a>
                    </div>
                </article>
                <?php } ?>
            </section>

            <p class="text-center">
                <a href="products.php">More Books &nbsp; <i class="fa fa-long-arrow-right"></i></a>
            </p>
            <br>
            <h2 class="h2">Best Seller Book</h2>

            <!--Best Seller book -->
            <section class="tiles">
                <?php
                    $sql= mysqli_query($con,"SELECT bl.book_id,bl.book_title,bl.book_lang,bl.book_author,bl.publication,bl.mrp,bi.image, count(bo.b_id) AS total_sold FROM book_list bl JOIN book_order bo ON bl.book_id = bo.b_id JOIN book_image bi ON bi.book_id = bl.book_id WHERE bl.is_deleted='0' AND bi.is_deleted='0' GROUP BY bo.b_id ORDER BY total_sold desc  LIMIT 6");
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
                                <?php echo $row['book_author']; ?> &nbsp;|&nbsp; <?php echo $row['publication']; ?>
                                <br>
                                <?php echo $row['book_lang']; ?> &nbsp;|&nbsp; <b> ₹<?php echo $row['mrp']; ?></b>
                            </p>
                            <input type="hidden" name="hidden_id" value="<?= $row['book_id']; ?>">
                        </a>
                    </div>
                </article>
                <?php } ?>
            </section>
            <p class="text-center">
                <a href="products.php">More Books &nbsp; <i class="fa fa-long-arrow-right"></i></a>
            </p>
            <br>
            <!-- <h2 class="h2">Testimonials</h2>
                <div class="row">
                    <div class="col-sm-6 text-center">
                        <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus
                                mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique,
                                delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas
                                reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em>
                        </p>
                        <p><strong> - John Doe</strong></p>
                    </div>
                    <div class="col-sm-6 text-center">
                        <p class="m-n"><em>"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus
                                mollitia, debitis architecto recusandae? Quidem ipsa, quo, labore minima enim similique,
                                delectus ullam non laboriosam laborum distinctio repellat quas deserunt voluptas
                                reprehenderit dignissimos voluptatum deleniti saepe. Facere expedita autem quos."</em>
                        </p>
                        <p><strong>- John Doe</strong> </p>
                    </div>
                </div>
                <p class="text-center"><a href="testimonials.php">Read More &nbsp;<i
                            class="fa fa-long-arrow-right"></i></a></p>
                -->

            <br>
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