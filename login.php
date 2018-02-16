<?php
include 'includes/db.php';

?>
   <div id="products">
    <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="500" border="2" bgcolor="orange">
			<tr>
				<td colspan="2" align="center"><h2>Login or register </h2></td>
			</tr>
           
              <tr>
             <th align="right">Email </th>
			<td><input type="text" name='email'  placeholder="Enter email" required /></td>
			</tr>
        <tr>
            <th align="right">Password </th>
			<td><input type="password" name='pass' placeholder="Enter password" required/></td>
			</tr>
      <tr>
          <td colspan="3"><a href="checkout.php?forget_pass" style="text-decoration:none">Forget Password</a></td>
      </tr>
       <tr>
            
			<td colspan="3"><input type="submit" name='login' value="login" /></td>
			</tr>
        </table>
        <h2 style="float:left"><a href="register.php" style="text-decoration:none">New?Register Here</a></h2>
    </form>
</div>
<?php
if(isset($_POST['login'])){
   
    $c_mail=$_POST['email'];
    $c_pass=$_POST['pass'];
    $sel_c="select * from customers where customer_email='$c_mail' AND customer_pass='$c_pass'";
    $run_cus=mysqli_query($con,$sel_c);
    $check_cus=mysqli_num_rows( $run_cus);
    if($check_cus==0){
        echo"<script>alert('email or password is incorrect,please try again later')</script>";
       
       exit();
    }
           $ip=getIp();
           $check_cart="select * from cart where ip_address='$ip'";
            $run_cart=mysqli_query($con,$check_cart);
            $count_row=mysqli_num_rows($run_cart);
    if($check_cus>0 && $count_row==0){
        $_SESSION['customer_email']= $c_mail;
                echo"<script>alert('Account has been loggedin successfully')</script>";
                echo"<script>window.open('customer/my_account.php','_self')</script>";
    }
   else{
        $_SESSION['customer_email']= $c_mail;
                echo"<script>alert('Account has been loggedin successfully')</script>";
                echo"<script>window.open('checkout.php','_self')</script>";
   }
}

?>