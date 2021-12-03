<?php
session_start();

require_once "db_config/database.php";

if(isset($_SESSION['user'])!="") {
    header("Location: dashboard.php");
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
    }  

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password). "'");
    
   if(!empty($result)){
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            header("Location: dashboard.php");
             exit();
        } 
        else {
          $error_message = "Incorrect Email or Password!!!";
      }
    }else {
        $error_message = "Incorrect Email or Password!!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <nav class="card" style="background-color:yellow" >
        <button type="button" class="signupbtn">Travis Liquor</button>
        <span class="psw"><a href="#">Sign In</a></span>
        <span class="psw"><a href="#">Sign Up</a></span>
        
      </nav>
<div id="id01">
<span class="text-danger"><?php if (isset($error_message)) echo $error_message; ?></span>
<p style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">Please fill all fields with your credentials</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    

    <div class="container">
      <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

      <button type="submit" name="login">Sign In</button>
      
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="signupbtn">Log in</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



</body>
</html>

</body>
</html>