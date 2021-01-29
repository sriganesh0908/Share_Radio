<?php 
require_once("config.php"); 
?>
<?php
if(isset($_POST['sublogin'])){ 
$login_email =$_POST['email'];
$password =$_POST['password'];
$query = "select * from users where email='$login_email' AND password='$password'";
$res = mysqli_query($dbc,$query);
if(mysqli_num_rows($res) == 1){
session_start();
                
while($result = mysqli_fetch_assoc($res)){
$user_id = $result['id'];
$_SESSION['user'] = $user_id;
header("Location:account.php");
}
}else{
header("location:login.php?loginerror=".$login_email);
}
}
?>