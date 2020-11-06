<?php
session_start();
if(isset($_SESSION['id']) OR isset($_COOKIE['id'])){
    unset($_SESSION);
    setcookie("id", "", time() - 60*60);
    $_COOKIE["id"] = "";  
    
    session_destroy();
    header('location:landingPage.html');

}else{
    ?>
    <script>alert("There was some error :Please try again")</script>
    <?php
}
?>
