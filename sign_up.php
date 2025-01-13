<?php
    include('config.php');
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];

        $sql=mysqli_query($con,"SELECT * FROM user_list WHERE user_email='".$user_email."'");

        $count=mysqli_num_rows($sql);
        if($count == 0){
            $query="INSERT INTO user_list (username,user_email,user_password) VALUES('$username','$user_email','$user_password')";
            if(mysqli_query($con,$query) == 1){
                echo "<script> alert('User created successfully.');</script>" ;
                echo "<script> location.href = 'login.php';</script>" ;
            }
            else{
                echo"ERROR";
            }
        }
        else{
            echo "<script> alert('User Already Exists.');</script>" ;
            echo "<script> location.href = 'login.php';</script>" ;
        }
    }
?>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Forms - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" />
    <link rel="stylesheet" href="assets/css/ready.css">
    <link rel="stylesheet" href="assets/css/demo.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class=" content">
        <div class="container-fluid ">
            <form method="post" action="">
                <section class="ftco-section">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-5">
                                <div class="login-wrap p-4 p-md-5">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="fa fa-user-o"></span>
                                    </div>
                                    <h3 class="text-center mb-4">Sign Up</h3>
                                    <action action="#" class="login-form">
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-left" name="username"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-left" name="user_email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" class="form-control rounded-left"
                                                name="user_password" placeholder="Password" id="id_password" required>
                                            <i class="fa fa-eye" id="showpass" onclick="spass(this)"
                                                style="margin-left: -30px; cursor: pointer;"></i>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit"
                                                class="btn btn-primary rounded submit p-3 px-5">Sign Up</button>
                                        </div>
                                    </action>
                                </div>
                                <p class="text-center login mb-4" style="padding-top:8%;">Already having an account ?
                                    <a href="login.php"><span style="cursor: pointer;">login</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                </section>

                <script src="js/jquery.min.js"></script>
                <script src="js/popper.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/main.js"></script>
            </form>
        </div>
    </div>
</body>

</html>
<script>
function spass(x) {
    var a = document.getElementById("id_password");
    if (a.type === "password") {
        a.type = "text";
        x.className = "fa fa-eye-slash";
    } else {
        a.type = "password";
        x.className = "fa fa-eye";
    }
}

function onlyNumberKey(evt) {

    // Only ASCII character in that range allowed
    let ASCIICode = (evt.which) ? evt.which : evt.keyCode
    if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
    return true;
}
</script>