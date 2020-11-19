
<?php

$host  = "localhost";
$username= "root";
$password = '';
$DBname = "users";
/* 
$host  = "localhost";
$username= "id15356956_kevin";
$password = "57c4BSIRi4v!&_bA";
$DBname = "id15356956_users"; */
/* 
$host  = "shareddb-y.hosting.stackcp.net";
$username= "usersDB-31353903d3";
$password = "g61s0s3lrq"; 
 $DBname = "usersDB-31353903d3";  */

$connection = mysqli_connect($host , $username, $password ,$DBname);

if(!$connection){
    die("Error in connecting to Database".mysqli_connect_error());

}

?>

