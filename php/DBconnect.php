<?php
include("DBcredentials.php");

/* Connect to a database */
$DBcon = mysqli_connect($servername,$Username,$DBpass,$DBname);

if(!$DBcon){
    die("Error in connecting to database");

}


?>