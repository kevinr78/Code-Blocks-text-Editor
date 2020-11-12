<!-- <?php
session_start();

include('DBConnection.php');
$error= "";
if(isset($_POST['name'])){
  $name = mysqli_real_escape_string($connection,$_POST['name']);
}
if(isset($_POST['email'])){
  $email = mysqli_real_escape_string($connection,$_POST['email']);
}
if(isset($_POST['password'])){
  $password = mysqli_real_escape_string($connection,$_POST['password']);
}
$Hashedpassword = password_hash($password , PASSWORD_DEFAULT);


if($_SERVER['REQUEST_METHOD']== 'POST'){

    if( empty($name) || empty($email) ||empty($password)){
      $error .= "<span class='error error-box'>Please fill all the fields<span>";
      
    }
    else
    {
      $query = 'SELECT id FROM `users details` WHERE `email` ="'.$email.'" LIMIT 1';
      $result =mysqli_query($connection, $query);
      
      if(mysqli_num_rows($result)>0 ){
        $error .= "<span class='error error-box' >Email already taken</span>"; 
      }
      else{
        $query = 'INSERT INTO`users details`(`name`,`email`,`password`)   VALUES ("'.$name.'" , "'.$email.'","'.    $Hashedpassword.'") ';
          if(mysqli_query($connection, $query)){
            $_SESSION['id'] = mysqli_insert_id($connection);

            if(isset($_POST['login-checkbox'])){
              setcookie('id', $_SESSION['id'],time()+60*60*24);
            }
          
            header('Location:Editor.php');
          }else{
            $error .="<span class='error error-box' >Error:Please try again</span>";
          }
      }
    }
  }

?>



 -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sign In Page</title>
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
    <div class="back-button">
      <a href="javascript:history.go(-1)"
        ><i class="fas fa-chevron-left"> BACK</i></a
      >
    </div>
    <div class="signin-form-container animate" id="modal">
      <div class="form-heading">
        <span>Sign-Up </span>
      </div>
      <form class="signin-form" method="POST">
        <div class="input-field">
          <p><i class="fa fa-user"></i> <label for="name">Name</label></p>
          <input type="text" id="name" name="name" />
        </div>

        <div class="input-field">
          <p><i class="fa fa-envelope"></i> <label for="email">Email</label></p>
          <input
            type="email"
            id="email"
            name="email"
            autocomplete="off"
            onkeydown=" emailValidation(document.querySelector('.signin-form') , document.querySelector('#email-err'), document.querySelector('#email').value)"
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
            name="password"
            onkeydown="passValidation(document.querySelector('.signin-form') , document.querySelector('#pass-err'), document.querySelector('#password').value)"
          />
          <span class="error" id="pass-err"></span>
        </div>
        <div id="login-checkbox">
          <input type="checkbox" name="login-checkbox" value="1" />
          <span>Stay logged in</span>
        </div>

        <button>Sign Up</button>
      </form>
      <?php echo $error;?>
    </div>

    <script src="../javascript/index.js"></script>
  </body>
</html>
