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
                        <h3 class="text-center mb-4">The Password of your email</h3>

                        <?php
                            $email=$_POST['user_email'];
                            
                            $query=mysqli_query($con,"SELECT * FROM user_list WHERE user_email");
                            $row=mysqli_num_rows($query);
                            if (isset($row)>0) {
                        ?>
                        <?php } ?>

                        <form action="login.php" method="post" class="login-form">
                            <div class="form-group" style="text-align:center;">
                                <?php
                            $email=$_POST['user_email'];
                            
                            $query=mysqli_query($con,"SELECT * FROM user_list WHERE user_email='$email'");
                            $row=mysqli_num_rows($query);
                            if (isset($row)>0) {
                                $sql=mysqli_fetch_assoc($query);
                        ?>
                                <lable><?php echo $sql['user_password'] ?></lable>
                                <?php
                                }
                                else{
                                ?>
                                <lable>No such email exits</lable>
                                <?php
                                        
                                }
                                
                                ?>
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