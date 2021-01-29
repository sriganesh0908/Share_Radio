<?php 
session_start();
include ("config.php");
$url !='https://shareradio.in/Registration/changepassword.php';
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php'); //redirect to some other page
  exit();
}
$id=  $_GET['id'];
if(count($_POST)>0){
    $result = mysqli_query($dbc,"SELECT * from users WHERE id='$id'");
$row=mysqli_fetch_array($result);
   if($_POST["currentpassword"] == $row["password"] && $_POST["newpassword"] == $_POST["cnewpassword"] ) {
mysqli_query($dbc,"UPDATE users set password='" . $_POST["newpassword"] . "' where id='$id'");
    echo '<script type="text/javascript">alert("your password updated successfully");window.location= "login.php";</script>';
}
else
{
    echo '<script type="text/javascript">alert("Failed to change your Password");window.location= "login.php";</script>';
}
}
?>
<!DOCTYPE html>
<html>
<head><br>
<title> Update Password - Share_Radio</title>
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"> 
<link rel="stylesheet" href="rstyle.css">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-4">
		</div>
		<div class="col-sm-4">
			<div class="login_form">
 	<form method="POST">
  <div class="form-group">
 <img src="#" alt="Share_Radio" class="logo img-fluid"> <br>
    <label class="label_txt">Current Password</label>
    <input type="password" name="currentpassword" class="form-control" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">New Password </label>
    <input type="password" name="newpassword" class="form-control" required="">
  </div>
  <div class="form-group">
    <label class="label_txt">Confirm New Password </label>
    <input type="password" name="cnewpassword" class="form-control" required="">
  </div>
  <button type="submit" name="submit" class="btn btn-primary btn-group-lg form_btn">Update Password</button>
</form>
		</div>
		<div class="col-sm-4">
		</div>
		</div>
	</div>
</div> 
</body>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
 </html>