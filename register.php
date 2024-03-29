<?php 

  require_once "db_config/database.php";
  
  session_start();

  if(isset($_SESSION['user'])) {
    header("location: dashboard.php");
  }

  if(isset($_REQUEST['register_Btn'])) {

    $fullname = filter_var($_REQUEST['fullname'], FILTER_SANITIZE_STRING);
    $email = filter_var( strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $password =strip_tags( $_REQUEST['password']);
    $dob = $_REQUEST['dob'];
    $phone = $_REQUEST['phone'];

    if(empty($fullname)) {
      $errorMsg[0][] = "Fullname required";
    }

    if(empty($email)) {
      $errorMsg[1][] = "Email required";
    }

    if(empty($dob)) {
      $errorMsg[2][] = "Fullname required";
    }

    if(empty($phone)) {
      $errorMsg[3][] = "Fullname required";
    }

    if(empty($password)) {
      $errorMsg[4][] = "Password required";
    }

    if(strlen($password < 6)) {
      $errorMsg[4][] = "Password must be atleast six";
    }

    if(empty($errorMsg)) {
      try {
        $select_stmt = $db->prepare("SELECT fullname, email FROM users WHERE email = :email");
        $select_stmt->execute([':email' => $email]);
        $row = $select_stmt->fetch(PDO::FETCH_ASSOC);

        if(isset($row['email']) ==  $email) {
          $errorMsg[1][] = "Email already exist";
        }
        else {
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          $insert_stmt = $db->prepare("INSERT INTO users (fullname, email, password, phone, dob) VALUES (:fullname, :email, :password, :phone, :dob)");

          if(
            $insert_stmt->execute(
              [
                ":fullname" => $fullname,
                ":email" => $email,
                ":password" => $hashed_password,
                ":phone" => $phone,
                ":dob" => $dob
              ]
            )
          ){
            header("location: dashboard.php");
          }
        }
      } catch (PDOException $e) {
        $pdoError = $e->getMessage();
      }
    }

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
    
                    <form action="register.php" method="post">
    
                      <div class="d-flex align-items-center mb-3 pb-1">
                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                        <span class="h1 fw-bold mb-0">TravisLiquor</span>
                      </div>
    
                      <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                      <div class="form-outline mb-4">
                        <input type="text" id="form2Example17" name="fullname" class="form-control form-control-lg" 
                         
                        />
                        <label class="form-label" for="form2Example17">Fullnaame</label>
                      </div>

                      <div class="form-outline mb-4">
                        <input type="date" id="form2Example17" name="dob" class="form-control form-control-lg"
                       
                        />
                        
                      </div>

                      <div class="form-outline mb-4">
                        <input type="email" id="form2Example17"name="email" class="form-control form-control-lg" 
                       
                        />
                        <label class="form-label" for="form2Example17">Email address</label>
                      </div>
    
                      <div class="form-outline mb-4">
                        <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" 
                        
                        />
                        <label class="form-label" for="form2Example27">Password</label>
                      </div>
    
                      <div class="pt-1 mb-4">
                        <button  class="btn btn-dark btn-lg btn-block" type="submit" name="'register_Btn">Register</button>
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