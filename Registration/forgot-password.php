<?php
include_once 'config.php';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $result = mysqli_query($dbc,"SELECT * FROM users where email='" . $_POST['email'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_email=$row['email'];
	$password=$row['password'];
	if($email==$fetch_email) {
	    
				$to = $fetch_email;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: shareradio@shareradio.in" . "\r\n" .
                "CC: shareradio@shareadio.in";
                mail($to,$subject,$txt,$headers);
            
                	echo '<script type="text/javascript">alert("your password send to '.$row['email'].' successfully (Note: Check messages in spam box also)");window.location= "login.php";</script>';
			}
				else{
					echo '<script type="text/javascript">alert("user doesnot exist with '.$email.' please register");window.location= "signup.php";</script>';
				}
}
?>
<html>
<head>
<title> Forgot-Password - Share_Radio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
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
<img src="#" class="logo">
<label class="label_txt">Email</label>
<input type="text" name="email" class="form-control" required="" placeholder="example@gmail.com">
</div>
<br/>
<button type="submit" name="submit" class="btn btn-primary btn-group-lg form_btn">Send</button>
</form>
<br>
<p>Have an account? <a href="login.php">Login</a> </p>
<p>Don't have an account? <a href="signup.php">Sign up</a> </p>
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