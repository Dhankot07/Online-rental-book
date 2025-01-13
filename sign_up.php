<?php
    include('config.php');
    if(isset($_POST['submit'])){
        $seller_name=$_POST['seller-name'];
        $seller_gender=$_POST['seller-gender'];
        $seller_phone=$_POST['seller-phone'];
        $seller_address=$_POST['seller-address'];
        $seller_pincode=$_POST['seller-pincode'];
        $seller_email=$_POST['seller-email'];
        $seller_password=$_POST['seller-password'];

        $sql="SELECT * FROM seller_list WHERE seller_email='".$seller_email."'";

        $result=mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count == 0){
            $query="INSERT INTO seller_list (seller_name,seller_gender,seller_email,seller_phone,seller_address,seller_pincode,seller_password) VALUES('$seller_name','$seller_gender','$seller_email','$seller_phone','$seller_address','$seller_pincode','$seller_password')";
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
                                            <input type="text" class="form-control rounded-left" name="seller-name"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control rounded-left" name="seller-gender" required>
                                                <option value="">--Select Gender--</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>

                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control rounded-left" name=" seller-phone"
                                                onkeypress="return onlyNumberKey(event)" placeholder="Phone"
                                                maxlength="10" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-left" name="seller-address"
                                                placeholder="Address" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" class="form-control rounded-left" name="seller-pincode"
                                                onkeypress="return onlyNumberKey(event)" placeholder="Pincode"
                                                maxlength="6" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control rounded-left" name="seller-email"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="form-group d-flex">
                                            <input type="password" class="form-control rounded-left"
                                                name="seller-password" placeholder="Password" id="id_password" required>
                                            <i class="fa fa-eye" id="showpass" onclick="spass(this)"
                                                style="margin-left: -30px; cursor: pointer;"></i>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="submit"
                                                class="btn btn-primary rounded submit p-3 px-5">Sign Up</button>
                                        </div>
                                    </action>
                                </div>
                                <p class="text-center login mb-4" style="padding-top:5%;">Already having an account ?
                                    <a href="login.php"><span style="cursor: pointer;">login</span></a>
                                </p>
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