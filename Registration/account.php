<?php
session_start();
require_once("user_session.php");
require_once("config.php");
$url !='https://shareradio.in/Registration/account.php';
if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: login.php'); //redirect to some other page
  exit();
}
?>
<?php
$query = " SELECT * FROM `users` WHERE id = '{$_SESSION['user']}' ";
$run_query = mysqli_query($dbc, $query);
    
if(mysqli_num_rows($run_query) == 1){
while($result = mysqli_fetch_assoc($run_query)){
$firstname=$result['firstname'];
$lastname=$result['lastname'];
$email=$result['email'];
$id=$result['id'];
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>My Account - Share_Radio</title>
<script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="rstyle.css">
 </head>
 <body>
 <div class="container">
 <div class="row">
 <div class="col-sm-3">
 </div>
 <div class="col-sm-6">
 <form action="login_process.php" method="POST">
 <div class="login_form">
 <img src="#" alt="Share_Radio" class="logo"> <br>
 <p><a href="logout.php"><span style="color:red; float: right;">Logout</span> </a></p>
 <script>
 function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this account?');
   if(conf)
      window.location=anchor.attr("href");
      
}
</script>
<script>
 function changepassword(anchor)
{
   var conf = confirm('Are you sure want to change password?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>
          <p> Welcome! <span style="color:#33CC00"><?php echo $firstname; ?></span> </p>
          <table class="table">
          <tr>
              <th>First Name </th>
              <td><?php echo $firstname; ?></td>
          </tr>
          <tr>
              <th>Last Name </th>
              <td><?php echo $lastname; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
          <tr>
                 <?php echo "<td><a onclick='javascript:changepassword($(this));return false;' href='changepassword.php?id=$id'>Update Password</a></td>"; ?>
                 <?php echo "<td><a onclick='javascript:confirmationDelete($(this));return false;' href='deleteaccount.php?id=$id'>Delete Account</a></td>"; ?>
          </tr>
          </table>
        </div>
        <div class="col-sm-3">
        </div>
    </div>
</div> 
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
</html>