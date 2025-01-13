<?php
    include('config.php');
?>

<!doctype html>
<html lang="en">

<head>
    <title>Login 08</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
.error {
    background: #F2DEDE;
    color: #A94442;
    padding: 10px;
    width: 95%;
    border-radius: 5px;
    margin: 20px auto;
}
</style>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Forgotten Password Confirmation</h3>

                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <form action="pass_conf.php" method="post" class="login-form">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Email"
                                    name="user_email" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login"
                                    class="btn btn-primary rounded submit p-3 px-5">Confirm</button>
                            </div>
                        </form>
                    </div>
                    <br>
                    <p class="text-center login mb-4">Remember the password
                        <a href="login.php"><span style="cursor: pointer;">Login</span></a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>