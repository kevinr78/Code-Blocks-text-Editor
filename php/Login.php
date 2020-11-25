<?php
session_start();
include('DBconnect.php');
/* INITIALIZING VARIABLES */
$error= $LoginPassword=$LoginEmail="";

/* CHECK IF SEESION OR COOKIE ALREADY EXISTS */
if(isset($_SESSION['email']) or isset($_COOKIE['email'])){
   header("Location:./Editor.php");
 }
/* CONDITIONS TO SEE IF INPUT FIELD ARE FILLED  */

if(isset($_POST['LoginEmail'])){
  /* EMAIL VALIDATION */
  if (!filter_var($_POST['LoginEmail'], FILTER_VALIDATE_EMAIL)) {
    $error .= "<span class='error error-box'>Invalid email format</span>";
  }
  $LoginEmail = trim(mysqli_real_escape_string($DBcon,$_POST['LoginEmail']));
}
if(isset($_POST['LoginPassword'])){
  $LoginPassword = mysqli_real_escape_string($DBcon,$_POST['LoginPassword']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
       /* CONDITIONS TO SEE IF INPUT FIELD ARE EMPTY  */

      if(empty($LoginEmail)|| empty($LoginPassword)){
        $error .= "<span class='error error-box'>Please fill all the fields  </span>";
      }
      else{
         /* QUERY TO SELECT USER FROM DB*/
        $query = 'SELECT * FROM `users_details` WHERE `email` = "'.$LoginEmail.'"';

         $result = mysqli_query($DBcon,$query);
         /* GET ROW OF USER IN DB */
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                  
          if(isset($row)){
            /*VERIFY HASHED PASSWORD AND LOGIN PASSWORD */
            if(password_verify($LoginPassword, $row['password'])){
               $_SESSION['email'] = $LoginEmail;
               /* SET COOKIE IF BOX IS CLICKED */
                if(isset($_POST['login-checkbox'])){
                  setcookie('email', $_SESSION['email'],time()+60*60*24);
                }
              
              header("Location:./Editor.php");
            }else{
              $error .="<span class='error error-box'>Password/email is incorrect </span>";
            }
         }else{
            $error .="<span class='error error-box'>That password/email does not exist  </span>";
         }
      }
  }


?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/forms.css" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <script
      src="https://kit.fontawesome.com/0000f17b81.js"
      crossorigin="anonymous"
    ></script>
  </head>

  <body>
   <!-- BUTTON TO GO TO PREVIOUS PAGE -->
    <div class="back-button" onclick="GoBack()">
      <a href="javascript:history.go(-1)"
        ><i class="fas fa-chevron-left"> BACK</i></a
      >
    </div>
    <div class="login-form-container animate">
      <div class="form-heading">
        <span>Login </span>
      </div>
      <form class="login-form" method="POST">
      <!-- LOGIN FORM INPUT FIELDS -->
        <div class="input-field">
          <p><i class="fa fa-envelope"></i> <label for="email">Email</label></p>
          <input type="email" id="email" name="LoginEmail" autocomplete="off" />
          
        </div>

        <div class="input-field">
          <p>
            <i class="fa fa-envelope"></i>
            <label for="password">Password</label>
          </p>
          <input type="password" id="password" name="LoginPassword" />
           
         
        </div>

        <div id="login-checkbox">
          <input type="checkbox" name="login-checkbox" value="1" />
          <span>Stay logged in</span>
        </div>

        <button>Login</button>
      </form>
      <?php 
      if($error!="")
      echo $error;
       ?>
    </div>
    <script src="../javascript/index.js"></script>
  </body>
</html>
