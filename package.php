<?PHP
//Created by John Liu
//Connect to our databse
$mysqli = new mysqli("localhost", "root", "", "travelexperts");
//Return an error if connect databse with issues
if ($mysqli->connect_error){
	die('Connect Error('.$mysqli->connect_errno.')'.$mysqli->connect_error);
}
//Query the database for the results we want
$query = $mysqli->query("SELECT * FROM packages where PkgEndDate >= CURTIME()");
//create an array of objects for each returned row
while($array[] = $query->fetch_object());
//Remove the blank entry at end of array
array_pop($array);

?>
	<section class="features">
    <h1>Future Destination</h1>
	<div class="container">
    <div class="row">
<?php 
	$i = 0;
	//list all packages in table packages in database
	foreach($array as $option){
		$imgName = $option->PkgName; //get image name
		$basePrice = round($option->PkgBasePrice); //get package price
		$starttime = strtotime($option->PkgStartDate); //get start time of the package
		$endtime = strtotime($option->PkgEndDate);	//get end time of the package
		$period = round(($endtime-$starttime)/(60*60*24)); //calculate the period of the package
		$startdate = date("Y/m/d", $starttime); //convert start time to date
		//display package images
		print ("<div class='col-lg-3 col-md-6'>
					<div class='feature-box'>
						<div class='feature-img'>
						<img src='./img/$imgName.jpg' alt = $imgName>
						<div class = 'price'>
							<p>$$basePrice</p> 
						</div>
					<div class='rating'>
					<i class='fa fa-star' aria-hidden='true'></i>
					<i class='fa fa-star' aria-hidden='true'></i>
					<i class='fa fa-star' aria-hidden='true'></i>
					<i class='fa fa-star' aria-hidden='true'></i>
					<i class='fa fa-star-half-o' aria-hidden='true'></i>
					</div>
				</div>
				<div class='feature-details'>
					<h4>$option->PkgName</h4>
					<p>$option->PkgDesc</p>");
		//check if the start time is earlier than current time. If yes, use red and bold font.
		If ($starttime < time()){
		print ("<div style='color:red;'><span><i class='fa fa-calendar-check-o' aria-hidden='true'></i><strong>$startdate</strong> </span>");}
		else{print ("<div><span><b><i class='fa fa-calendar-check-o' aria-hidden='true'></i>$startdate</b></span>");}
		//display period of the package and a link button to the order page.
		print ("<span><b> <i class='fa fa-sun-o'></i>$period days</b></span>
				
				</div>
				</div>
				<a class='btn btn-secondary' href='order.php' role='button'>Order Now</a>
				</div>
				</div>");
		
		$i++;
	  }
?>
</div></div></section>
