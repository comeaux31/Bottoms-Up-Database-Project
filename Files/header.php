<!DOCTYPE html>
<html>
<TITLE> Bottoms Up!</TITLE>
<header>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</header>


<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">
        <img alt="Bottoms Up" src="...">
      </a>
    </div>
     <ul class="nav nav-pills">
  <li role="presentation"><a href="index.php">Home</a></li>
  <li role="presentation"><a href="search.php">Search</a></li>
  
  <li role="presentation"  id = "member"><a href="games.php">Games</a></li>
   <p class="navbar-text navbar-right"> <?php session_start();  if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
   echo "<a href = 'Login.php'> To Login or Register Click Here </a>"; }
   else{ 
    $User = $_SESSION['username'];
   echo " <div class='btn-group'>
  <button class='btn btn-primary dropdown-toggle' type='button' data-toggle='dropdown'> Welcome ".$User."
  <span class='caret'></span></button>

  <ul class='dropdown-menu'>
    <li><a href='addition.php'>Add a Mix to Your Collection</a></li>
    <li><a href='Csearch.php'>Search Your Collection</a></li>
    <li><a href='logout.php'>Logout</a></li>
  </ul>
</div>";

    }  
   ?> 

</p>  
</ul>

  </div>

</nav>


<br>
<br>
<br>

<br>
<br>




<?php
$user = "root";
$password = "Taurus#31";
$host = "localhost";
$database = "turn up";

$connection = mysqli_connect($host, $user, $password, $database);







?>

<style>
.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 40px;
  background-color: #f5f5f5;
  font-size: 15px;
  text-align: right;
  font-family: font-family: "Times New Roman", Times, serif;   
}





</style>

<audio autoplay>
  <source src="pictures/drank.m4a" type="audio/mp3">
  
  Your browser does not support the audio element.
</audio>


<footer class = "footer">
  <p> Created by: Anthony Comeaux, Justin Pflughaupt, Bisoye Olaleye </p>
</footer>

</body>

</html>