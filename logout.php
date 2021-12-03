<?php
ob_start();
session_start();
if(isset($_SESSION['user'])) {
	session_destroy();
	unset($_SESSION['id']);
	unset($_SESSION['fullname']);
	unset($_SESSION['email']);
	unset($_SESSION['phone']);
	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>