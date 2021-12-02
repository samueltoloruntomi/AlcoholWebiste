<?php 

  require_once "db_config/database.php";
  $fullname = $email = $password = $dob = "";
  $fullname_err = $email_err = $password_err = $dob_err = "";

  if($_SERVER["REQUEST_METHOD"] == "POST") {

    // email validations
    if(empty(trim($_POST["email"]))) {
      $fullname_err = "Please enter your email address.";
    }
    else {
      $sql = "SELECT id FROM users WHERE email = ?";

      if($stmt = mysli_prepare($link, $sql)) {
        // Bind variables
        mysqli_stmt_bind_param($stmt, "s", $param_email);

        //set parameters
        $param_email = trim($_POST["email"]);
        // Execute the prepared statement
        if(mysqli_stmt_execute($stmt)) {
          // store result
          mysqli_stmt_store_result($stmt);
          if(mysqli_stmt_num_rows($stmt) == 1) {
            $email_err = "This email is already in use";
          }
          else {
            $email = trim($_POST["email"]);
          }
        }
        else {
          echo "Oops! Something went wrong. Please try again later.";
        }
        // end statement
        mysqli_stmt_close($stmt);
      }
    }

    // fullname validation
    if(empty(trim($_POST["fullname"]))) {
      $fullname_err = "Please enter your fullname";
    }
    else {
      $fullname = trim($_POST["fullname"]);
    }

    // DOB validation 
    if(empty($_POST["dob"])) {
      $dob_err = "Please enter your date of birth";
    }
    else {
      $dob = $_POST["dob"];
    }

    // Password validation 
    if(empty(trim($_POST["password"]))) {
      $password_err = "Please enter your password";
    }
    elseif(strlen(trim($_POST["password"])) < 6) {
      $password_err = "Password must be atlease 6";
    }
    else {
      $password = trim($_POST["password"]);
    }

    // Check input errors before inserting in database
    if(empty($fullname_err) && empty($password_err) && empty($dob_err) && empty($email_err)) {
       // Prepare an insert statement
       $sql = "INSERT INTO users (fullname, password, dob, email) VALUES (?, ?)";
         
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ss", $param_fullname, $param_password, $param_email, $param_dob);
           
           // Set parameters
           $param_fullname = $fullname;
           $param_email = $email;
           $param_dob = $dob;
           $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Redirect to login page
               header("location: login.php");
           } else{
               echo "Oops! Something went wrong. Please try again later.";
           }

           // Close statement
           mysqli_stmt_close($stmt);
       }
    }
     // Close connection
     mysqli_close($link);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
   <link rel="stylesheet" href="/indexcss/css/index.css">
    <link rel="stylesheet" href="indexcss/css/stylely.css">
    <link rel="stylesheet" href="css/css/style.min.css">
    
    <title>TravisLiquor | Register</title>
</head>
<body>
 <!-- Navbar -->
 <nav class="navbar navbar-blue  justify-content-between">
  <a class="navbar-brand" href="homepage.html">TravisLiquor</a>
  <form class="form-inline my-1">
    <a href="login.html" class="btn btn-outline-primary btn-sm my-0" type="submit">Signin</a>
    <a href="register.html" class="btn btn-outline-danger btn-sm my-0" type="submit">Signup</a>
  </form>
</nav>
<!-- Navbar -->

  <section class="vh-100" style="margin-bottom: 20px;" >
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-xl-10">
            <div class="card" style="border-radius: 1rem;">
              <div class="row g-0">
                <div class="col-md-6 col-lg-5 d-none d-md-block">
                  <img
                    src="images/acohol1.jpg"
                    alt="login form"
                    class="img-fluid" style="border-radius: 1rem 0 0 1rem;"
                  />
                </div>
                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                  <div class="card-body p-4 p-lg-5 text-black">
    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">TravisLiquor</span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17" name="fullname" class="form-control form-control-lg" 
                        <?php echo (!empty($fullname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fullname; ?>" 
                        />
                        <label class="form-label" for="form2Example17">Fullnaame</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="date" id="form2Example17" name="dob" class="form-control form-control-lg" 
                        <?php echo (!empty($dob_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dob; ?>"
                        />
                        
                      </div>

                      <div class="form-outline mb-4">
                        <input type="email" id="form2Example17"name="email" class="form-control form-control-lg" 
                        <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"
                        />
                        <label class="form-label" for="form2Example17">Email address</label>
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" 
                        <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>"
                        />
                        <label class="form-label" for="form2Example27">Password</label>
                      </div>
    
                      <div class="pt-1 mb-4">
                        <button  class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                      </div>
    
                      <a class="small text-muted" href="#!">Forgot password?</a>
                      <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.html" style="color: #393f81;">Register here</a></p>
                      <a href="#!" class="small text-muted">Terms of use.</a>
                      <a href="#!" class="small text-muted">Privacy policy</a>
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <section class="">
      <footer class="bg-dark text-white text-center text-lg-start">
        <!-- Grid container -->
        <div class="container p-4">
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase">Opening hours</h5>
      
              <p>
                Wed to Fri: 10pm – 6am<br/>
                Saturday: 8pm – 6am<br/>
                Sunday: 9pm – 3am
              </p>
            </div>
            <!--Grid column-->
      
            <!--Grid column-->
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase">Contacts</h5>
      
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#!" class="text-white">Phone: +44(0)7565257936</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Office address: Waterfront Park, Edinburgh
                    EH5 1FZ</a>
                </li>
                <li>
                  <a href="#!" class="text-white">Email:  40500521@live.napier.co.uk</a>
                </li>
                
              </ul>
            </div>
            <!--Grid column-->
    
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2021 Copyright:
          <a class="text-white" href="https://google.com/">TravisLiquor.com</a>
        </div>
        <!-- Copyright -->
      </footer>
      <!-- Footer -->
    </section>


     
</body>
</html>