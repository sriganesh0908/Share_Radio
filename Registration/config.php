<?php
$dbhost='localhost';
$dbname='sharerad_loginsystem';
$dbusername='sharerad_sharera';
$dbpassword='Ganesh@2000';
$dbc=mysqli_connect($dbhost,$dbusername,$dbpassword,$dbname);
if(!$dbc){
	   die("ERROR: could not connect." . mysqli_connect_error());
  }
?>