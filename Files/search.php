<!DOCTYPE html>
<html>

<TITLE> Check It Out!</TITLE>
<header> 
<!-- Latest compiled and minified CSS -->


</header>
<style type="text/css">



</style>
<body>
<?php require 'header.php'; ?>
<br>
<br>

<div class="jumbotron">
  <h1 align="center">Find Your Dream Drink!</h1>
  <p align="center">Perfect Way To Unwind</p>

</div>


<div class="row">
<div class = "col-lg-2"> </div>
  <div class="col-lg-8">
  <form class ="form-inline" method = "post" style = "margin: auto; width: 60%;" >
    <div class="input-group">

        <select class = "form-control" name = "db">

        <option  value = "Name">Name</option>
        <option  value = "Type">Type</option>
        <option  value = "Color">Color</option>
          
        </select>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" id = "inp" name = "inp" >
      <button type="submit" name = "Add" class="btn btn-default" value = "Submit">Search</button>
      
      <button type="submit" name = "All" class="btn btn-default" value = "Submit">View All</button>
    </div><!-- /input-group -->

  </div><!-- /.col-lg-6 -->
  <div class = "col-lg-2"> </div>
 </form>
<br>

<?php
$query = " ";
$Attr = "";
$Content = "";



if(isset($_POST['Add'])){
    $Attr = $_POST['db'];
    $Content = $_POST['inp'];

switch ($Attr) {
  case "Name":
    $query = "SELECT * FROM cocktails
  WHERE Name = '$Content'";
    break;
  case "Type":
    $query = "SELECT * FROM cocktails 
  WHERE Type = '$Content'";
    break;
    case "Color":
    $query = "SELECT * FROM cocktails INNER JOIN liquor ON cocktails.LiquorId = liquor.LiquorId 
  WHERE liquor.Color = '$Content'";
    break; 
}

$result = $connection->query($query);
if($result){
echo "<table class = 'table table-hover' align = 'center' margin:'auto' width = 60% >";
 echo"<thead>";
      echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Type</th>";
        echo"<th>Color</th>";
        echo"<th>Flavor</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
       

while( $row = $result->fetch_assoc() ){
echo "<tr><td>".$row['Name']."</td><td>".$row['Type']."</td><td>".$row['Color']."</td><td>". $row['Flavor']."</td></tr>";
}
echo "</tbody>";
echo "</table>";

}


}
/*
else if (isset($_POST['Delete']))
{
  $Attr = $_POST['db'];
    $Content = $_POST['inp'];

switch ($Attr) {
  case "Name":
    $query = "DELETE FROM liquor
  WHERE Name = '$Content'";
    break;
  case "Type":
    $query = "DELETE FROM liquor 
  WHERE Type = '$Content'";
    break;
    case "Color":
    $query = "DELETE FROM liquor 
  WHERE Color = '$Content'";
    break; 
  }

}
*/

else if(isset($_POST['All']))
{

$query = "SELECT * FROM cocktails";

$result = $connection->query($query);
if($result){
echo "<table class = 'table table-hover' align = 'center' margin:'auto' width = 60% >";
 echo"<thead>";
      echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Type</th>";
        echo"<th>Color</th>";
        echo"<th>Flavor</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
       

while( $row = $result->fetch_assoc() ){
echo "<tr><td>".$row['Name']."</td><td>".$row['Type']."</td><td>".$row['Color']."</td><td>". $row['Flavor']."</td></tr>";
}
echo "</tbody>";
echo "</table>";

}

}




?>

</body>
</html>