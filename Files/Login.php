<!DOCTYPE html>
<TITLE> Log In!</TITLE>
<header>  </header>


<body>
<?php require 'header.php'; ?>

<?php 
//session_start();
if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      
}
else{
	header('Location: index.php');
}
?>
<title>Login Here!</title>
<h1 style = "margin: auto; width: 60%;" align = "center">Login Page</h1>
<br>
<br>
<form  method='post' style = "margin: auto; width: 60%;">

<div class="form-group">
  <label for="usr">UserName:</label>
  <input type="text" class="form-control" name = "usrnme" id="usr">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name = "pwd" id="pwd">
</div>

<button type="submit" name = "Add" class="btn btn-default" value = "Submit">Login</button> <button type="submit" name = "SignUp" class="btn btn-default" value = "Submit">Register</button>
</form>

<?php

$user = NULL;
$pass = NULL;
if(isset($_POST['Add'])){

$user =  $_POST['usrnme'];
$pass =  $_POST['pwd'];

$sql = "SELECT * FROM user WHERE Username = '$user' AND Password = '$pass'";
$rs= $connection->query($sql);
           
            if(mysqli_fetch_row($rs)==false) {
            	
                echo "Invalid Login";
            } else {
                session_start();
                 
                $_SESSION['username'] = $user; 
                $val = $_SESSION['username'];

$result = $connection->query("SELECT UserId FROM user WHERE Username = '$val' ");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysqli_fetch_row($result);

$_SESSION['userid'] = $row[0];
 				echo "success";
       			header('Location: index.php');
                // put other things in the session if you like
                echo "<br><b> <a>Welcome <font size=2>" .mysql_result($rs,0,"login")."</font></b></a><br><br><br>";     
            }
       
}
else if(isset($_POST['SignUp'])){

  header('Location: Register.php');
}


        



    mysqli_close($connection);

    
?>



</body>
</html>