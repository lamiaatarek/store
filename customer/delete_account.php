<form action="" method="post" >
    <h2>Do you want to delete your account</h2>
    <input type="submit" name="yes" value="Yes I do">
</form>
<?php 
include'includes/db.php';
 $user=$_SESSION['customer_email'];
if(isset($_POST['yes'])){
   
    $qry="delete from customers where customer_email='$user'";
    $run=mysqli_query($con,$qry);
   
        echo"<script>alert('your account deleted')</script>";
     echo"<script>window.open('../index.php','_self')</script>";
   
}
?>