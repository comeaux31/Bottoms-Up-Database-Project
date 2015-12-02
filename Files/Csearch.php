<!DOCTYPE html>
<html>

<TITLE> Check It Out!</TITLE>
<header> 
<!-- Latest compiled and minified CSS -->


</header>

<body>
<?php require 'header.php'; ?>

<div class="jumbotron">
  <h1 align="center">Search Your Concoctions!</h1>
  <p align="center">View Your Masterpieces!</p>

</div>

<div class="row">
<div class = "col-lg-2"> </div>
  <div class="col-lg-8">
  <form class ="form-inline" method = "post" style = "margin: auto; width: 60%;" >
    <div class="input-group">

        <select class = "form-control" name = "db">

        <option  value = "Name">Name</option>
        <option  value = "Type">Type</option>
          
        </select>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id = "inp" name = "inp" >
      <button type="submit" name = "Add" class="btn btn-default" value = "Submit">Search</button>
      <button type="submit" name = "Delete" class="btn btn-default" value = "Delete">Delete</button>
      <button type="submit" name = "All" class="btn btn-default" value = "Submit">View All</button>
    </div><!-- /input-group -->

  </div><!-- /.col-lg-6 -->
  <div class = "col-lg-2"> </div>
 </form>
<br>
<br>
<br>
<?php

$query = " ";
$Attr = "";
$Content = "";
$uid = $_SESSION['userid'];


if(isset($_POST['Add'])){
    $Attr = $_POST['db'];
    $Content = $_POST['inp'];

switch ($Attr) {
  case "Name":
    $query = "SELECT * FROM customs
  WHERE Name = '$Content'";
    break;
  case "Type":
    $query = "SELECT * FROM customs
  WHERE Drink = '$Content'";
    break;
    
}

$result = $connection->query($query);
if($result){
echo "<table class = 'table table-hover' align = 'center' margin:'auto' width = 60% >";
 echo"<thead>";
      echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Ingredients</th>";
        echo"<th>Instructions</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
       

while( $row = $result->fetch_assoc() ){
echo "<tr><td>".$row['Name']."</td><td>".$row['Ingredients']."</td><td>".$row['Instructions']."</td></tr>";
}
echo "</tbody>";
echo "</table>";

}


}

else if (isset($_POST['Delete']))
{
  $Attr = $_POST['db'];
    $Content = $_POST['inp'];
    

switch ($Attr) {
  case "Name":
    $query = "DELETE FROM customs
  WHERE Name = '$Content' AND UserId = '$uid' ";
    break;
  case "Type":
    $query = "DELETE FROM customs 
  WHERE Drink = '$Content' AND UserId = '$uid'";
    break;
    
  }
  $result = $connection->query($query);
if($result){ }

}


else if(isset($_POST['All']))
{

$query = "SELECT * FROM customs WHERE UserId = '$uid'";

$result = $connection->query($query);
if($result){
echo "<table class = 'table table-hover' align = 'center' margin:'auto' width = 60% >";
 echo"<thead>";
      echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Ingredients</th>";
        echo"<th>Instructions</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
       

while( $row = $result->fetch_assoc() ){
echo "<tr><td>".$row['Name']."</td><td>".$row['Ingredients']."</td><td>".$row['Instructions']."</td><td>". "</td></tr>";
}
echo "</tbody>";
echo "</table>";

}


}





?>

</body>
</html>