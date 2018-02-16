<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Log IN Form</title>
  
  
  
      <link rel="stylesheet" href="styles/main.css" media="all">

  
</head>

<body>
  <div class="login">
	<h1>Login</h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" name="login" class="btn btn-primary btn-block btn-large ">Log in</button>
    </form>
</div>
  
    <script  src="js/index.js"></script>

   

</body>
</html>
<?php 
session_start();
include 'includes/db.php';

if(isset($_POST['login'])){
    $mail=mysqli_real_escape_string($con,$_POST['u']);
    $pass=mysqli_real_escape_string($con,$_POST['p']);
    $search="select * from admins where admin_email='$mail' AND admin_pass='$pass'";
    $run_search=mysqli_query($con,$search);
    $row=mysqli_num_rows($run_search);
    if($row==0){
        echo"<script>alert('email or pass is wrong')</script>";
       
    }
    else{
        $_SESSION['admin_email']=$mail;
        echo"<script>window.open('index.php','_self')</script>";
    }
}

?>























