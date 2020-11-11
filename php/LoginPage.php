<?php
session_start();
 $error = "";

 if(isset($_SESSION['id']) or isset($_COOKIE['id'])){
   header("Location:Editor.php");
 }
include('DBconnection.php');
if(isset($_POST['email'])){
  $email = mysqli_real_escape_string($connection,$_POST['email']);
}
if(isset($_POST['password'])){
  $password = mysqli_real_escape_string($connection,$_POST['password']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(empty($email)&&empty($password)){
        $error .= "Please fill all the fields";
      }
      else{
        $query = 'SELECT * FROM `users details` WHERE `email` = "'.$email.'"';

         $result = mysqli_query($connection , $query);
         $row = mysqli_fetch_row($result);
         
         if(isset($row)){
            if(password_verify($password, $row[3])){
               $_SESSION['id'] = $row['id'];
                if(isset($_POST['login-checkbox'])){
                  setcookie('id', $row['id'],time()+60*60*24);
                }
              
              header("Location:Editor.php");
            }else{
              $error .="Password/email is incorrect";
            }
         }else{
            $error .="That password/email does not exist";
         }
      }
  }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
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
    
    <div class="login-form-container animate" >
      <div class="form-heading">
        <span>Login </span>
      </div>
      <form class="login-form" method= "POST">
        <div class="input-field">
          <p><i class="fa fa-envelope"></i> <label for="email">Email</label></p>
          <input
            type="email"
            id="email"
            name = email
           
            autocomplete="off"
          />
          <span class="error" id="email-err"></span>
        </div>

        <div class="input-field">
          <p>
            <i class="fa fa-envelope"></i>
            <label for="password">Password</label>
          </p>
          <input
            type="password"
            id="password"
            name = "password"
           
          />
          <span class="error" id="pass-err"></span>
        </div>

        <div id ="login-checkbox">
          <input type="checkbox" name="login-checkbox" value=1>
          <span>Stay logged in</span>
        </div>

        <button onclick="validate()">Login</button>

      </form>

      <span class="error" style="color:red;margin-top:20px; ">
      <?php 
      if($error!="")
      echo $error;
       ?>
       </span>
 
    </div>
    <script src="../javascript/index.js"></script>
  </body>
</html>
