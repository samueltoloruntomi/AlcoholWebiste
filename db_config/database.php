
<<<<<<< HEAD
<?php 

// database parameters
$db_host = "localhost";
$db_user = "root";
$db_password = '';
$db_name = "travis_liquor";

try {
    // try connect to database
    $db = new PDO("mysql:host={$db_host};dbname={$db_name},$db_user,$db_password");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOEXCEPTION $e) {
    echo $e->getMessage();
}

=======
<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "travis_liquor";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
>>>>>>> 30c92c88c09341edc8f738ceb3b18e2a37e95cb7
?>
