
<?php

$servername = "localhost";
$username = "root";
$password = "";
$DBname = "users";


$connection = mysqli_connect($servername , $username, $password,$DBname);

if(!$connection){
    die("Error in connecting to Database".mysqli_connect_error());
}

   


?>