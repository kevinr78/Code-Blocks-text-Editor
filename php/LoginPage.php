<!--  <?php
session_start();
 $error = "";

 if(isset($_SESSION['id']) or isset($_COOKIE['id'])){
   header("Location:Editor.php");
 }
include('DBconnection.php');
if(isset($_POST['email'])){
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $error .= "<span class='error error-box'>Invalid email format</span>";
  }
  $email = trim(mysqli_real_escape_string($connection,$_POST['email']));
}
if(isset($_POST['password'])){
  $password = trim(mysqli_real_escape_string($connection,$_POST['password']));
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if(empty($email)&&empty($password)){
        $error .= "<span class='error error-box'>Please fill all the fields  </span>";
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
              $error .="<span class='error error-box'>Password/email is incorrect </span>";
            }
         }else{
            $error .="<span class='error error-box'>That password/email does not exist  </span>";
         }
      }
  }


?>  -->
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
        <div class="input-field">
          <p><i class="fa fa-envelope"></i> <label for="email">Email</label></p>
          <input type="email" id="email" name="email" autocomplete="off" />
          <span class="error" id="email-err"></span>
        </div>

        <div class="input-field">
          <p>
            <i class="fa fa-envelope"></i>
            <label for="password">Password</label>
          </p>
          <input type="password" id="password" name="password" />
          <span class="error" id="pass-err"></span>
        </div>

        <div id="login-checkbox">
          <input type="checkbox" name="login-checkbox" value="1" />
          <span>Stay logged in</span>
        </div>

        <button onclick="validate()">Login</button>
      </form>
      <?php 
      if($error!="")
      echo $error;
       ?>
    </div>
    <script src="../javascript/index.js"></script>
  </body>
</html>
