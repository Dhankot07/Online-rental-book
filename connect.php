<?php
    include('config.php');
    session_start();
    
    $user_email = $_POST['user_email'];
    $user_password=$_POST['user_password'];
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $user_email = validate($user_email);
    $user_password = validate($user_password);
    
    if(isset($_POST['login'])){
        $sql = mysqli_query($con,"SELECT * FROM user_list WHERE user_email='$user_email'");
        if(mysqli_num_rows($sql) === 1 ){
            $row = mysqli_fetch_assoc($sql);
            if($user_email === $row['user_email'] && $user_password === $row['user_password']){
                $_SESSION['user_id'] = $row['user_id'];
                echo"<script> location.href = 'index.php';</script>";
            }
            else{
                header("Location: login.php?error=Incorect User Email or password");
                //echo "<script>location.href='login.php';</script>";
            }
        }
    }
?>