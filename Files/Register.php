<!DOCTYPE html>

<Title> SignUp! </Title>

<body>
<?php require ('header.php'); ?>

<h1 style = "margin: auto; width: 60%;" align="center">Become A Member!</h1>
<br>
<br>
<form  method='post' style = "margin: auto; width: 60%;">

<div class="form-group">
  <label for="Name">Full Name:</label>
  <input type="text" class="form-control" name = "Name" id="Name">
</div>


<div class="form-group">
  <label for="usr">UserName:</label>
  <input type="text" class="form-control" name = "usrnme" id="usr">
</div>
<div class="form-group">
  <label for="pwd">Password:</label>
  <input type="password" class="form-control" name = "pwd" id="pwd">
</div>


<div class="form-group">
  <label for="age">Age:</label>
  <input type="number" class="form-control" name = "Age" id="Age">
  </div>
  <button type="submit" name = "SignUp" class="btn btn-default" value = "Submit">Register</button>
  </form>


<?php
$user = "root";
$password = "Taurus#31";
$host = "localhost";
$database = "turn up";

$connection = mysqli_connect($host, $user, $password, $database);

$uid = NULL;
$fname = NULL;
$uName = NULL;
$pwd = NULL;
$age = NULL;
$query = NULL;
$result = NULL;
if(isset($_POST['SignUp'])){
$fname = $_POST['Name'];
$uName = $_POST['usrnme'];
$pwd = $_POST['pwd'];
$age = $_POST['Age'];
$uid =str_shuffle(substr(uniqid($uName[0],true), 0, 6));

if($age>=21){



mysqli_query($connection, "INSERT INTO user (UserId, Name, UserName, Password, Age)
		VALUES ('$uid', '$fname', '$uName', '$pwd', '$age')");


if(mysqli_affected_rows($connection) > 0){
	$sql = "SELECT * FROM user WHERE Username = '$uName' AND Password = '$pwd'";
$rs= $connection->query($sql);
           
                session_start();
                 
                $_SESSION['username'] = $uName; 
                $val = $_SESSION['username'];

$result = $connection->query("SELECT UserId FROM user WHERE Username = '$val' ");
$row = mysqli_fetch_row($result);

$_SESSION['userid'] = $row[0];
 				echo "success";
       			header('Location: index.php');
                // put other things in the session if you like
                echo "<br><b> <a>Welcome <font size=2>" .mysql_result($rs,0,"login")."</font></b></a><br><br><br>";

}
else{echo "<h1> User Name is already taken </h1>";}
	
}
else{
	echo "Under Age";
	header('Location: ad.html');
}

}





?>
</body>
</html>