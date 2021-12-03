<?php
  require_once "db_config/database.php";

  if(isset($_SESSION['user'])!="") {
    header("Location: dashboard.php");
  }

    if (isset($_POST['signup'])) {
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']); 
        if (!preg_match("/^[a-zA-Z ]+$/",$fullname)) {
            $name_error = "Name must contain only alphabets and space";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email ID";
        }
        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
        }       
        if(strlen($phone) < 10) {
            $mobile_error = "Mobile number must be minimum of 10 characters";
        }
        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
        }
        if (!$error) {
            if(mysqli_query($conn, "INSERT INTO users(fullname, email, phone ,password, dob) VALUES('" . $fullname . "', '" . $email . "', '" . $phone . "', '" . md5($password) . "', " . $dob . ")")) {
             header("location: login.php");
             exit();
            } else {
               echo "Error: " . $sql . "" . mysqli_error($conn);
            }
        }
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <link rel="stylesheet" href="style.css"> 
  <title>SignUp</title>
</head>

<body>
  <nav class="card" style="background-color:yellow" >
    <button type="button" class="signupbtn">Travis Liquor</button>
    <span class="psw"><a href="#">Sign In</a></span>
    <span class="psw"><a href="#">Sign Up</a></span>
    
  </nav>
<div id="id01">
<p style="text-align: center; font-family: Arial, Helvetica, sans-serif; font-weight: bold;">Please fill all fields in the form</p>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="container">
    <label for="uname"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
      
      <label for="uname"><b>Fullname</b></label>
      <input type="text" placeholder="Enter your fullname" name="fullname" required>
      <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
      
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
      
      <label for="psw-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="cpassword" required>
      
      <label for="psw"><b>Date of Birth</b></label>
      <input type="date" placeholder="Enter Date of Birth" name="dob" required>
      
      <br><br>
      
      <label for="psw"><b>Phone</b></label>
      <input type="text" placeholder="Enter mobile number" name="phone">
      <span class="text-danger"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>

      <label for="psw"><b>Address</b></label>
      <input type="text" placeholder="Enter Password" name="address">
        
      <button type="submit"  name="signup">Sign Up</button>
      
      <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
      Remember me
    	</label>

    <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">
    Terms & Privacy</a>.</p>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="signupbtn">Log in</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>



</body>
</html>
