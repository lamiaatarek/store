<?php include 'includes/db.php';?>
        <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="600">
			<tr>
				<td colspan="2" align="center"><h2>Change Your Password </h2></td>
			</tr>
      <tr>
            <th align="right">Enter current password </th>
			<td><input type="password" name='current_pass' required /></td>
			</tr>
            
            <tr>
            <th align="right">Enter new password: </th>
			<td><input type="password" name='new_pass' required /></td>
			</tr>
			<tr>
            <th align="right">Confirm new password: </th>
			<td><input type="password" name='new_passs' required /></td>
			</tr>
			<tr >
			    <td align="center" colspan="10"><button type="submit" name="change_password">Change password</button></td>
			</tr>
    </table></form>
    <?php 
$user=$_SESSION['customer_email'];
  if(isset($_POST['change_password'])){
       $current_pass=$_POST['current_pass'];
      $new_pass=$_POST['new_pass'];
       $confirm_pass=$_POST['new_passs'];
      $qry="select * from customers where customer_pass='$current_pass' AND customer_email='$user'";
      $sel_cust=mysqli_query($con,$qry);
      $row=mysqli_num_rows( $sel_cust);
      if($row==0){
          echo"<script>alert('your current password is wrong')</script>";
          exit();
      }
      if( $new_pass!=$confirm_pass){
          echo"<script>alert('password do not match')</script>";
          exit();
      }
      else{ 
         $update_pass="update customers set customer_pass='$new_pass'";
          $run_update=mysqli_query($con,$update_pass);
          echo"<script>alert('your password updated successfully')</script>";
          echo"<script>window.open('my_account.php','_self')</script>";
      }
  }
?>