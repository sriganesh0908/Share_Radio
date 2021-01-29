<!DOCTYPE html>
<?php require_once("config.php"); ?>
<html>
<head>
  <title>Signup - Share_Radio</title>
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
 <img src="#" alt="Share_Radio" class="logo">
 </div>
 <div class="col-sm-4">
 </div>
 <div class="row">
 <?php
 if(isset($_POST['signup']))
 {
	extract($_POST);
	if(strlen($firstname)<1)
	{
		$error[]='please enter first name using 1 character atleast';
	}
	if(strlen($firstname)>50){
		$error[]='Max length 50 characters not allowed';
	}
	if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $firstname)){
		$error[]='Invalid entry firstname. Please enter letters without any digit or special symbols like (1,2,3#,$,%,&,*,!,~,^,-,)';
	}
	if(strlen($lastname)<1){
		$error[]= 'please enter first name using 1 character atleast';
	}
	if(strlen($lastname)>50)
	{
		$error[]='Max length 50 characters not allowed';
	}
	if(!preg_match("/^[A-Za-z _]*[A-Za-z ]+[A-Za-z _]*$/", $lastname)){
		$error[]='Invalid entry lastname. Please enter letters without any digit or special symbols like (1,2,3#,$,%,&,*,!,~,^,-,)';
	}		
    if(strlen($email)>100){
          $error[]='Max length 100 characters Not allowed';
    }
    if($cpassword==''){
	  $error[]='please confirm the password';
    }
	if($password != $cpassword){
		$error[]='Passwords do not match.';
	}
	if(strlen($password)<5){
		$error[]='The password should be min 5 characters';
	}
	if(strlen($password)>20){
		$error[]='Max length 20 characters Not allowed';
	}
 $sql="select * from users where (email='$email');";
 $res=mysqli_query($dbc,$sql);
    if (mysqli_num_rows($res) > 0){
	 $row=mysqli_fetch_assoc($res);
	  if($email==$row['email'])
	  {
		 $error[]='Email already exists.';
	  }
    }
    if(!isset($error)){
	 $date=date("Y-m-d H:i:s");
      $result=mysqli_query($dbc,"INSERT into users values('','$firstname','$lastname','$dateofbirth','$gender','$email','$password','$country','$state','$mobilenumber','$date')");
      if($result)
       {
	     $done=2;
       }
      else{
	    $error[]='Failed : Something went wrong';
      }
    }
 }
?>
 <div class="col-sm-4">
 <?php
 if(isset($error))
 {
	 foreach($error as $error)
	 {
		 echo '<p class="errmsg">&#x26A0;'.$error.'</p>';
	 }
 }
 ?>
 </div>
 <div class="col-sm-4">
 <?php if(isset($done))
 { ?>
 <div class="successmsg"><span style="font-size:100px;">&#9989;</span><br> You have registered successfully. <br> <a href="login.php" style="color:#fff;">Login here...</a> </div>
 <?php } else { ?>
 <div class="signup_form">
 <form action="" method="POST">
 <div class="form-group">
 
 <label class="label_txt">First Name</label>
<input type="text" class="form-control" value="<?php if(isset($error)) { echo $firstname;} ?>" name="firstname" required="">
</div>
<div class="form-group">
 
 <label class="label_txt">Last Name</label>
<input type="text" class="form-control" value="<?php if(isset($error)) { echo $lastname;} ?>" name="lastname" required="">
</div>
<div class="form-group">
			   <label class="label_txt" for="Date of Birth">Date of Birth</label>
			   <input type="date" min="1950-01-01" max="2003-12-31" value="<?php if(isset($error)) { echo $dateofbirth;} ?>" class="form-control"name="dateofbirth" required="">
              </div>
              <div class="form-group">
                <label class="label_txt" for="Gender">Gender</label>
                <div>
                  <label for="male" class="label_txt"
                    ><input
                      type="radio"
                      name="gender"
                      value="Male"
                      id="Male"
					  required
                    />Male</label
                  >
                  <label for="Female" class="label_txt"
                    ><input
                      type="radio"
                      name="gender"
                      value="Female"
                      id="Female"
					  required
                    />Female</label
                  >
                  <label for="other" class="label_txt"
                    ><input
                      type="radio"
                      name="gender"
                      value="Other"
                      id="Other"
					  required
                    />Other</label>
                </div>
              </div>
<div class="form-group">
 
 <label class="label_txt">Email</label>
<input type="email" class="form-control" value="<?php if(isset($error)) { echo $email;} ?>" name="email"  required="">
</div>
<div class="form-group">
 
 <label class="label_txt">Password</label>
<input type="password" class="form-control" name="password" required="">
</div>
<div class="form-group">
 <label class="label_txt">Confirm Password</label>
<input type="password" class="form-control" name="cpassword" required="">
</div>
</br>
<div class="form-group">
               <label class="label_txt">Country</label>			  
			   <select class="form-control" name="country">			    
				<option value="India">India</option>
               </select>
			  </div>
			  </br>
			  <div class="form-group">
               <label class="label_txt">State</label>			  
			   <select class="form-control" name="state">
			       <option></option>			    
				<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chattisgarh">Chattisgarh</option>
                <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="Delhi">Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujarat">Gujarat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Lakshdweep">Lakshdweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
               </select>
			  </div>
              <div class="form-group">
                <label class="label_txt">Mobile Number</label>
                <input
                  type="tel"
				  pattern="^\d{3}\d{3}\d{4}$"
				  value="<?php if(isset($error)) { echo $mobilenumber;} ?>"
				  title="This field can only contain numeric value of 10 digits"
				  class="form-control"
                  name="mobilenumber"
				  required
                />
              </div>
              </br>
<button type="submit" name="signup" class="btn btn-primary btn-group-lg form_btn">Signup</button>
<p>Have an account? <a href="login.php">Login</a></p>
</form>
<?php } ?>
</div>
</div>
<div class="col-sm-4">
</div>
</div>
</div>
 </body>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
 </html>