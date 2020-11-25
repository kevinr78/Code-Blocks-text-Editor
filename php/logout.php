<?php
session_start();
/* CHECKING IF SEESIONOR COOKIE EXISTS */
if(isset($_SESSION['email']) OR isset($_COOKIE['email'])){
    /* DESTROYING SESSION AND COOKIE */
    unset($_SESSION);
    setcookie("email", "", time() - 60*60);
    $_COOKIE["email"] = "";  
    session_destroy();
    /* REDIRECT TO HOME PAGE */
    header('location:../index.html');

}else{
    ?>
    <script>alert("There was some error :Please try again")</script>
    <?php
}
?>
