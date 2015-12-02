<!DOCTYPE html>
<TITLE> GameTime!</TITLE>


<body>
<?php require 'header.php'; ?>

<div class="jumbotron">
  <h1 align="center">Check Out Our Games!</h1>
  <p align="center">The List Will Be At The Bottom</p>

</div>

<?php 

$query = "SELECT * FROM games INNER JOIN liquor ON games.LiquorId = liquor.LiquorId ORDER BY Type, Flavor";

$result = $connection->query($query);

if($result){
echo "<table class = 'table table-hover' align = 'center' margin:'auto' width = 60% >";
 echo"<thead>";
      echo"<tr>";
        echo"<th>Name</th>";
        echo"<th>Ingredients</th>";
        echo"<th>Instructions</th>";
        echo"<th>Type</th>";
        echo"<th>Flavor</th>";
      echo"</tr>";
    echo"</thead>";
    echo"<tbody>";
       

while( $row = $result->fetch_assoc() ){
echo "<tr><td>".$row['Title']."</td><td>".$row['Item1']."</td><td>".$row['Instruction1']."</td><td>".$row['Type']."</td><td>". $row['Flavor']."</td></tr>";
}
echo "</tbody>";
echo "</table>";

}


?>
</body>
</html>