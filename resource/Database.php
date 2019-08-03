<?php
// $db = new PDO('mysql:host=localhost; dbname=travelexperts', 'root', '');
$username = 'root';
$dsn = 'mysql:host=localhost; dbname=travelexperts';
$password='';

try   //Error Handling 
{
 $db = new PDO($dsn, $username, $password);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Setting up error mode to exception as it is silent by default
//  echo "Connected to the Travel Expert database";
}

catch (PDOException $ex) 
{
  echo "Connection Failed".$ex->getMessage();
}
?>