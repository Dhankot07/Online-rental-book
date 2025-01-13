<?php
    include('config.php');
    //session_start();
    if(isset($_POST['submit'])){
        $seller_email = $_POST['seller_email'];
        $seller_password=$_POST['seller_password'];

        $sql = "SELECT * FROM seller_list WHERE seller_email='".$seller_email."'";
        $query = $con->query($sql);
        $result = $query->fetch_assoc();
        $pass = $result['seller_password'];
        $emailid = $result['seller_email'];

        $count = $query->num_rows;
        
        if($count>0){
            if($_POST['seller_password'] === $pass ){
                //$_SESSION['seller_email'] = $emailid;
                echo"<script> alert('Login Successfully. '); </script>";
                echo"<script> location.href = 'index.php';</script>";
            }
            else{
                echo"<script> alert('Incorrect Password. Retry! '); </script>";
            }
        }
        else{
            echo"<script> alert('Invalid User! Create a user profile. '); </script>";
            echo"<script> location.href = 'sign_up.php'; </script>";
        }
    }
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

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Have an account?</h3>
                        <form action="" method="post" class="login-form">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-left" placeholder="Email"
                                    name="seller_email" required>
                            </div>
                            <div class="form-group d-flex">
                                <input type="password" class="form-control rounded-left" placeholder="Password"
                                    name="seller_password" required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#">Forgot Password</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="submit"
                                    class="btn btn-primary rounded submit p-3 px-5">Login</button>
                            </div>
                        </form>
                    </div>
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