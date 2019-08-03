<?php 
// Created by John Liu.

	session_start(); //get username from login.php
	if(!isset($_SESSION['CustUserName'])){
	header("Location: login.php");
	exit();
	}
	$CustUserName = $_SESSION['CustUserName'];
	
	//clear login info and return to main page after logout
  if (isset($_POST['logout'])) {
  	session_destroy();
  	unset($_SESSION['CustUserName']);
  	header("location: index.php");
  }
  	//load common header with Nav bar.
	include_once("header.php");
  	//connect to database.
$mysqli = new mysqli("localhost", "root", "", "travelexperts");

if ($mysqli->connect_error){
	die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
}
//Query the database for the results we want
// Only display the packages whose the end date is later than current date.
$query = $mysqli->query("SELECT * FROM packages where PkgEndDate >= CURTIME()");
while($array[] = $query->fetch_object());
//Get infomation from database for logged in user.
$customers = $mysqli->query("SELECT CustomerId, CustFirstName, CustLastName FROM customers where CustUserName = '"."$CustUserName"."'");
//create an array of objects for each returned row
while($custinfo[] = $customers->fetch_object());
//Get CustomerId from the array
$customerId = $custinfo[0]->CustomerId;
//Remove the blank entry at end of array for packages
array_pop($array);
//create a random booking number.
$j = rand(10,99);
$custFirstName = $custinfo[0]->CustFirstName;
$custLastName = $custinfo[0]->CustLastName;
$BookingNo = $custFirstName[0].$custLastName[0].$customerId.$j;
$BookingDate = date('Y-m-d H:i:s');
?>
<body>
	<!-- package select form -->
<div class="container col-md-4 orderheader">
    <div class="row d-flex justify-content-center">
		<div class = "col-sm-10">
			<form method="POST" action="">
				<select id = "packegeName"name="travelPackages" class = "input-group" >
					<!-- create select options from database list -->
					<?php foreach($array as $option): ?>
					<option value="<?PHP echo $option->PackageId; ?>"><?PHP echo $option->PkgName; ?></option>
					<?PHP endforeach; ?>
				</select> 
				<input class = "input-group"type="text" name= "TravelerCount" id = "travellers" placeholder = "How many travellers?">
				<select name = "tripTypeId" id = "tripType" class = "input-group">
				<option value = "B">Business</option>
				<option value = "L">Leisure</option>
				<option value = "G">Group</option>
				<input type="submit" name="submit" class="btn" value="submit" >
			</form>
		</div>
</div>

<?php

$mysqli = new mysqli("localhost", "root", "", "travelexperts");
//insert new booking record to table bookings in database.
if (!empty($_POST["submit"])){
	$TravelerCount = $_POST["TravelerCount"]; //get traverler number from the form
	$PackageId = $_POST['travelPackages'];	// get the package id from the form
	$tripTypeId = $_POST['tripTypeId'];		//get the trip type from the form 
	$columns = array('BookingDate','BookingNo','TravelerCount','CustomerId','TripTypeId','PackageId');
	$columns = implode(",",$columns);	// convert columns list from array to a string.
	$values = array($BookingDate, $BookingNo, $TravelerCount, $customerId, $tripTypeId, $PackageId);
	$values = implode('","',$values);	// convert values list from array to a string.
	$sql = sprintf('INSERT INTO bookings'.'(%s) VALUES ("%s")',$columns,$values); // insert data to table bookings.
	$result = mysqli_query($mysqli, $sql) or die("SQL Error");
	//display a feedback after the purchase is made and clear the session.
	if ($result){
		print("<div class = 'container'><p>Thank you for your purchase</p>");
		print ("<a href='index.php'>Homepage</a> </div>");
		session_destroy();
		unset($_SESSION['CustUserName']);
}}
				   
?>
</div>

