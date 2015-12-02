<?php

session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   header('Location: Login.php');   
}
else{
	$_SESSION['username'] = NULL;
	$_SESSION['userid'] = NULL;
	unset($_SESSION['userid']);
	unset($_SESSION['username']);
	session_destroy();
   header('Location: Login.php');   

}
?>


