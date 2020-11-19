<?php
session_start();
if(isset($_SESSION['email']) OR isset($_COOKIE['email'])){
    unset($_SESSION);
    setcookie("email", "", time() - 60*60);
    $_COOKIE["emai"] = "";  
    
    session_destroy();
    header('location:../index.html');

}else{
    ?>
    <script>alert("There was some error :Please try again")</script>
    <?php
}
?>
