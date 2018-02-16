<?php

include 'includes/db.php';
?>
<?php /*
$user=$_SESSION['customer_email'];
$qry="select * from customers where customer_email='$user'";
$run_qry=mysqli_query($con,$qry);
while($row=mysqli_fetch_assoc($run_qry)){
    $c_id=$row['customer_id'];
}*/
?>
<form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="500"  bgcolor="orange">
			<tr>
				<td colspan="2" align="center"><h2>Update your account </h2></td>
			</tr>
      <tr>
            <th align="center">customer name: </th>
			<td><input type="text" name='User_name' required /></td>
			</tr>
            
            <tr>
            <th align="center">customer Password: </th>
			<td><input type="password" name='User_pass' required /></td>
			</tr>
            
            <tr>
            <th align="center">customer email: </th>
	<td><input type="text" name="User_email"> </td>
			</tr>
            <tr>
            <th align="center">customer country: </th>
			<td><select name="customer_country">
			    <option>Egypt</option>
			    <option>America</option>
			    <option>Canda</option>
			    <option>Dubai</option>
			   
			</select></td>
			</tr>
      <tr>
            <th align="center">customer city: </th>
			<td><input type="text" name='customer_city' required /></td>
			</tr>
          <tr>
            <th align="center">customer image: </th>
			<td><input type="file" name='customer_image' /></td>
			</tr>
           <tr>
            <th align="center">customer contact: </th>
			<td><input type="text" name='customer_contact' required /></td>
			</tr>
      <tr>
            <th align="center">customer address: </th>
          <td><textarea cols="50" rows="6" name='customer_address' required ></textarea></td>
			</tr>
      
       
          
            
            <tr>
<td colspan="4"><input type="submit" name='update_account' value="Update Account"/></td>
			</tr>
 
        </table>
    </form>
       
   
    <?php
        if(isset($_POST['update_account'])){
            $ip=getIp();
           // $customer_id=$c_id;
            $c_name=$_POST['User_name'];
             $c_pass=$_POST['User_pass'];
             $c_email=$_POST['User_email'];
             $c_country=$_POST['customer_country'];
             $c_city=$_POST['customer_city'];
             $c_img=$_FILES['customer_image']['name'];
             $c_img_tmp=$_FILES['customer_image']['tmp_name'];
            move_uploaded_file($c_img_tmp,"customer_images/$c_img");
             $c_contact=$_POST['customer_contact'];
             $c_add=$_POST['customer_address'];
            $update_customer="update customers set customer_name='$c_name',customer_pass='$c_pass',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',
            customer_image='$c_img',customer_contact='$c_contact',customer_address='$c_add' where customer_ip= '$ip'";
            $run_update=mysqli_query($con,$update_customer);
           
           if($run_update){
                 echo"<script>alert('Account has been updated successfully')</script>";
                 echo"<script>window.open('my_account.php','_self')</script>";
            }
       }
        
        ?>
   
    
  


 