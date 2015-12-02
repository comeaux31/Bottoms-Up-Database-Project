<!DOCTYPE html>
<html>

<TITLE> Add Your Own Mix </TITLE>
<header> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</header>

<body>
<?php require 'header.php'; ?>


<form  method = "post" style = "margin: auto; width: 60%;" >
  <div class="form-group">
    <label for="Name">Name</label>
    <input type="text" class="form-control" id="Name" name = "Name" placeholder="Name of Your Drink">
  </div>
  <div class="form-group">
  <label for="Ingredients">Ingredients:</label>
  <textarea class="form-control" rows="5" name="ingredients" placeholder = "What Do You Need"></textarea>
</div>
<div class="form-group">
  <label for="Instructions">Instructions:</label>
  <textarea class="form-control" rows="5" name="instructions" placeholder  = "How Do You Do It"></textarea>
</div>
<div class="radio">
  <label><input type="radio" name="Type1" value = 0>Cocktail</label>
</div>
<div class="radio">
  <label><input type="radio" name="Type1" value = 1>Shot</label>
</div>

<p> Please Identify The Primary Alcohol For Your Drink </p>
<div class="form-group">
    <label for="Brand">Brand</label>
    <input type="text" class="form-control" id="Brand" name = "Brand" placeholder="Hennessy">
  </div>
  <div class="form-group">
    <label for="Type">Type</label>
    <input type="text" class="form-control" id="Type" name = "Type" placeholder="Cognac">
  </div>

  <div class = "form-group">
  <label for ="Flavor"> Flavor </label>
  <input type="text" class="form-control" id="Flavor" name = "Flavor" placeholder="Original">
  </div>

  <div class="radio">
  <label><input type="radio" name="Color" value = 0>Clear</label>
</div>
<div class="radio">
  <label><input type="radio" name="Color" value = 1>Dark</label>
</div>
<p class="help-block">Choose the color of the alcohol</p>
  <button type="submit" name = "Add" class="btn btn-default" value = "Submit">Add</button>

</form>






<?php


if($connection){
//echo "<p align=center> The database is connected </p>";

	$Name;
	$ins;
	$ing;
	$id;
  	$Brand;
  	$Type;
	$Color;
	$Flavor;


   //echo "<p align=center> The data is updated successfully </p>";
if(isset($_POST['Add'])) {
 

	$Name = $_POST['Name'];
	$ins = $_POST['instructions'];
	$ing = $_POST['ingredients'];
	$id;
	$row;
  	$Brand = $_POST['Brand'];
  	$Type = $_POST['Type'];
	$Color = $_POST['Color'];
	$Flavor = $_POST['Flavor'];
	$CS = $_POST['Type1'];

	if($Flavor == ''){
		$Flavor = "Original";
	}
	else{ $Flavor = $_POST['Flavor'];}	

	if($_POST['Color'] == 0)
	{
		$Color = "Clear";
	
	}
	else if($_POST['Color'] == 1){

		$Color = "Dark";
	
	}
	else{

		echo "Error";
	}

	if($_POST['Type1'] == 0)
	{
		$CS = "Cocktail";
	
	}
	else if($_POST['Type1'] == 1){

		$CS = "Shot";
	
	}
	else{

		echo "Error";
	}

	$query = "SELECT LiquorId FROM liquor WHERE Name = '$Brand' AND Type = '$Type' AND Color = '$Color' AND Flavor = '$Flavor' ";
	$result = mysqli_query($connection, $query);
	
	$row = mysqli_fetch_row($result);
	

	if(!(mysqli_affected_rows($connection) > 0)){
		$idd = str_shuffle(substr(uniqid($Type[0], true), 0, 4));
	$query =  "INSERT INTO liquor (LiquorId, Name, Type, Color, Flavor)
		VALUES ('$idd', '$Brand', '$Type', '$Color', '$Flavor')";
		$result = $connection->query($query);
		echo "check 2";
		if(mysqli_affected_rows($connection) > 0){
		$query1 = "SELECT LiquorId FROM liquor WHERE Name = '$Brand' AND Type = '$Type' AND Color = '$Color' AND Flavor = '$Flavor' ";
	$result = $connection->query($query1);
	$ui = $_SESSION['userid'];
		$row = mysqli_fetch_row($result);
		$id = $row[0];
		$query =  "INSERT INTO customs (Name, Ingredients, Instructions, Drink, LiquorId, UserId)
		VALUES ('$Name', '$ing', '$ins', '$CS' '$id', '$ui')";
		echo "check 3";
		$result = $connection->query($query);
		if(mysqli_fetch_row($result)){echo " Uploaded";}
		else{echo "Bad Query";}

}
	}
	else{
		
		$ui = $_SESSION['userid'];
		$id = $row[0];
		
		
		
		$query =  "INSERT INTO customs (Name, Ingredients, Instructions, Drink, LiquorId, UserId)
		VALUES ('$Name', '$ing', '$ins', '$CS', '$id', '$ui')";
		mysqli_query($connection, $query);
		if(mysqli_affected_rows($connection) > 0){echo " Uploaded";}
		else{echo "Bad Query";}
		echo "Check 4";
		
	}
	
	

}
}

	else{
		echo "Bad Connection";
	}





mysqli_close($connection);

?>

</body>
</html>