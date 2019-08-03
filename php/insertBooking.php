​
<?PHP
$mysqli = new mysqli("localhost", "root", "", "travelexperts");

​
$query = $mysqli->query("SELECT * FROM packages");
​

while($array[] = $query->fetch_object());
​

array_pop($array);
​
$bookingTime = time();

​
​
​
​
?>
​
<h1>Select your Destination</h1>
	
 <div class="container">
    <div class="row">
	<form method="POST" action="index.php">
		<select name="travelPackages" >
			<?php foreach($array as $option): ?>
			<option value="<?PHP echo $option->ID; ?>"><?PHP echo $option->PkgName; ?></option>
			<?PHP endforeach; ?>
		</select> 
		<input type="submit" name="submit" value="submit">
	</form>
<?php

​
$sql = "INSERT INTO products (ProdName) values ('$ProdName')";
	print($sql);
	$result = mysqli_query($dbh, $sql);
	if ($result)
	{
	   print("Row was inserted");
	}
	else
	{
	   print("Error inserting row");
	} 
​
?>