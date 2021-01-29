<?php 
$url !='https://shareradio.in/Registration/deleteaccount.php';
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php'); //redirect to some other page
  exit();
}

include ("config.php");
   $id=  $_GET['id'];
   $sql = "DELETE FROM users WHERE id='$id'";
  $data= mysqli_query($dbc,$sql);
if($data)
{
    echo '<script type="text/javascript">alert("your account deleted successfully");window.location= "login.php";</script>';
}
else
{
    echo '<script type="text/javascript">alert("Failed to delete your account");window.location= "account.php";</script>';
}
?>