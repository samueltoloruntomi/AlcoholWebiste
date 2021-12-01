<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="./font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="MDB-Free/css/bootstrap.min.css">
    <link rel="stylesheet" href="MDB-Free/css/mdb.min.css">
    <link rel="stylesheet" href="MDB-Free/css/style.min.css">
    <link rel="stylesheet" href="MDB5-STANDARD-UI-KIT-Free-3.9.0/css/mdb.dark.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>TravisLiquor | Dashboard</title>
</head>
<body>
  <nav class="navbar navbar-blue  justify-content-between">
    <a class="navbar-brand" href="homepage.html">TravisLiquor</a>
    <form class="form-inline my-1">
      <a href="order.html" class="btn btn-outline-success btn-sm my-0" type="submit">My Order</a>
      <a href="logout.php" class="btn btn-outline-danger btn-sm my-0" type="submit">Signout</a>
    </form>
  </nav>


    <div class="container" style="margin-top: 50px; margin-bottom: 50px; padding: 10px;">
        <div class="row row-cols-1 row-cols-md-3 g-4" >
            <div class="col">
              <div class="card">
                <img
                  src="images/acohol1.jpg"
                  class="card-img-top"
                  alt="..."
                  style="height: 400px;"
                />
                <div class="card-body">
                  <h5 class="card-title">Vodka</h5>
                  <p class="card-text">
                    £50.00
                  </p>
                </div>
                <div class="card-footer  text-center">
                  <small class="text-muted">Add to cart <i class="fa fa-shopping-cart"></i></small>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <img
                  src="images/alcohol2.jpg"
                  class="card-img-top"
                  alt="..."
                  style="height: 400px;"
                />
                <div class="card-body">
                  <h5 class="card-title">Heineken</h5>
                  <p class="card-text">
                    £70.00
                  </p>
                </div>
                <div class="card-footer  text-center">
                  <small class="text-muted">Add to cart <i class="fa fa-shopping-cart"></i></small>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card">
                <img
                  src="images/alcohol3.jpg"
                  class="card-img-top"
                  alt="..."
                  style="height: 400px;"
                />
                <div class="card-body">
                  <h5 class="card-title">Jameson</h5>
                  <p class="card-text">
                    £40.00
                  </p>
                </div>
                <div class="card-footer  text-center">
                  <small class="text-muted">Add to cart <i class="fa fa-shopping-cart"></i></small>
                </div>
              </div>
            </div>
    
            <div class="col">
                <div class="card h-100">
                  <img
                    src="images/alcohol4.jpg"
                    class="card-img-top"
                    alt="..."
                    style="height: 400px;"
                  />
                  <div class="card-body">
                    <h5 class="card-title">Bacardi</h5>
                    <p class="card-text">
                      £80.00
                    </p>
                  </div>
                  <div class="card-footer  text-center">
                    <small class="text-muted">Add to cart <i class="fa fa-shopping-cart"></i></small>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card">
                  <img
                    src="images/alcohol5.jpg"
                    class="card-img-top"
                    alt="..."
                    style="height: 400px;"
                  />
                  <div class="card-body">
                    <h5 class="card-title">Platinium</h5>
                    <p class="card-text">
                      £65.10
                    </p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted">Add to cart</small>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="card">
                  <img
                    src="images/alcoho6.jpg"
                    class="card-img-top"
                    alt="..."
                    style="height: 400px;"
                  />
                  <div class="card-body">
                    <h5 class="card-title">Taylor</h5>
                    <p class="card-text">
                      £30.50
                    </p>
                  </div>
                  <div class="card-footer  text-center">
                    <small class="text-muted">Add to cart <i class="fa fa-shopping-cart"></i></small>
                  </div>
                </div>
              </div>
          </div>
    </div>

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

    
    <script src="./MDB5-STANDARD-UI-KIT-Free-3.9.0/js/mdb.min.js"></script>
    <script src="./MDB-Free/js/bootstrap.min.js"></script>
    <script src="./MDB-Free/js/mdb.min.js"></script>
    <script src="./MDB-Free/js/pay.js"></script>
    <script src="./MDB-Free/js/jquery-3.3.1.min.js"></script>
    <script src="./MDB-Free/js/popper.min.js"></script>
    <script src="./MDB-Free/js/modules/scrolling-navbar.js"></script> 
    <script src="./MDB-Free/js/modules/velocity.min.js"></script> 
</body>
</html>