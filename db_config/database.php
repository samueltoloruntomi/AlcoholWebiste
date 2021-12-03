
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

?>
