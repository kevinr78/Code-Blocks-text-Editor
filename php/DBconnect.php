<?php

/* Hosting Server DB Connection variable */
/* $servername= "shareddb-y.hosting.stackcp.net";
$Username= "UsersDB-3135390ade";
$DBpass= "Kevinr@78";
$DBname= "UsersDB-3135390ade"; */

/*Local DB Connection variable */

$servername= "localhost";
$Username= "root";
$DBpass= "";
$DBname= "users";


/* Connect to a database */
$DBcon = mysqli_connect($servername,$Username,$DBpass,$DBname);

if(!$DBcon){
    die("Error in connecting to database");

}


?>