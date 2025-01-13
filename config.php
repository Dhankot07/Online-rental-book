<?php
// Enter Host, username, password, database below.
$con = mysqli_connect("localhost","root","","rental_book");
// Check connection
if($con === false){
    die("ERROR: Could not connect.". mysqli_connect_error());
}
/*else{
    echo "Connected";
}*/
?>