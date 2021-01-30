<?php
$dbhost='localhost';
$dbname='';
$dbusername='';
$dbpassword='';
$dbc=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
if(!$dbc){
	   die("ERROR: could not connect." . mysqli_connect_error());
  }
?>
