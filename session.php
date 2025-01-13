<?php
    include('config.php');
    session_start();
    if(!empty($_SESSION)){
        $session_id=$_SESSION['user_id'];
    }
    else{
        $session_id = null;
    }
?>