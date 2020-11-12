
<?php
/* 
$servername = "localhost";
$username = "root";
$password = "";
$DBname = "epiz_27170276_users";
 */
$servername  = "sql203.epizy.com";
$username= "epiz_27170276";
$password = "CI9dD9WPHjF";
$DBname = "epiz_27170276_users";

$connection = mysqli_connect($servername , $username, $password,$DBname);

if(!$connection){
    die("Error in connecting to Database".mysqli_connect_error());
}

   


?>