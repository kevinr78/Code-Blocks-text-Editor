
<?php

$servername  = "shareddb-y.hosting.stackcp.net";
$username= "usersDB-31353903d3";
$password = "";
$DBname = "usersDB-31353903d3";

$connection = mysqli_connect($servername , $username, $password,$DBname);

if(!$connection){
    die("Error in connecting to Database".mysqli_connect_error());
}

   


?>